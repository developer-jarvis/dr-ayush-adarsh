<?php
require 'common/config.php';

$error = '';
$success = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = trim($_POST['email']);

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error = "Please enter a valid email address.";
    } else {
        // Check email in users table
        $stmt = $conn->prepare("SELECT id, name FROM users WHERE email = ? LIMIT 1");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $res = $stmt->get_result();

        if ($res->num_rows === 0) {
            // Also check business_list
            $stmt2 = $conn->prepare("SELECT id, owner_name FROM business_list WHERE email = ? LIMIT 1");
            $stmt2->bind_param("s", $email);
            $stmt2->execute();
            $res2 = $stmt2->get_result();

            if ($res2->num_rows === 0) {
                $error = "Email not found in our system.";
            } else {
                $user = $res2->fetch_assoc();
                $userId = $user['id'];
                $userName = $user['owner_name'];
                $table = 'business_list';
            }
        } else {
            $user = $res->fetch_assoc();
            $userId = $user['id'];
            $userName = $user['name'];
            $table = 'users';
        }

        if (empty($error)) {
            // Token generate
            $token = bin2hex(random_bytes(32));
            $expiry = date("Y-m-d H:i:s", strtotime("+1 hour"));

            // Ensure required columns exist: reset_token (VARCHAR), token_expiry (DATETIME)
            $requiredCols = [
                'reset_token' => 'VARCHAR(255) NULL',
                'token_expiry' => 'DATETIME NULL'
            ];
            foreach ($requiredCols as $col => $definition) {
                $chk = $conn->prepare("SELECT COUNT(*) as cnt FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_SCHEMA = DATABASE() AND TABLE_NAME = ? AND COLUMN_NAME = ?");
                if ($chk) {
                    $chk->bind_param('ss', $table, $col);
                    $chk->execute();
                    $res_chk = $chk->get_result();
                    $row_chk = $res_chk->fetch_assoc();
                    $chk->close();
                    if (intval($row_chk['cnt']) === 0) {
                        // Try to add the missing column. Use a safe ALTER TABLE. If this fails (permissions), ignore and let the update fail later with a helpful error.
                        $alterSql = "ALTER TABLE `" . $conn->real_escape_string($table) . "` ADD COLUMN `" . $conn->real_escape_string($col) . "` " . $definition;
                        @mysqli_query($conn, $alterSql);
                    }
                }
            }

            // Save token
            $upd = $conn->prepare("UPDATE $table SET reset_token=?, token_expiry=? WHERE id=?");
            if ($upd) {
                $upd->bind_param("ssi", $token, $expiry, $userId);
                $upd->execute();
                $upd->close();
            } else {
                $error = "Unable to prepare database statement. Please check database schema or permissions.";
            }

            // Reset link
            $baseUrl = (isset($_SERVER['HTTPS']) ? "https://" : "http://") . $_SERVER['HTTP_HOST'];
            $resetLink = $baseUrl . "/admin/reset.php?token=" . $token;

            // Mail content
            $subject = "Password Reset Link - BizReach";
            $message = "
Hello $userName,

You requested a password reset for your BizReach account.

Click the link below to reset your password:
$resetLink

This link will expire in 1 hour.

If you didn't request this, please ignore this email.

Best regards,
BizReach Team
            ";

            // Prepare email headers using configured from address when available
            $fromEmail = isset($smtp_config['from_email']) && $smtp_config['from_email'] ? $smtp_config['from_email'] : 'noreply@bizreach.local';
            $fromName = isset($smtp_config['from_name']) && $smtp_config['from_name'] ? $smtp_config['from_name'] : 'BizReach';

            $headers = "From: " . $fromName . " <" . $fromEmail . ">\r\n";
            $headers .= "Reply-To: " . $fromEmail . "\r\n";
            $headers .= "Content-Type: text/plain; charset=UTF-8\r\n";

            $sent = false;
            $mailerError = '';

            // First try PHP mail() (may not work on local XAMPP without SMTP configured)
            try {
                if (@mail($email, $subject, $message, $headers)) {
                    $sent = true;
                }
            } catch (Exception $e) {
                // ignore and fallback to PHPMailer if available/configured
            }

            // If PHP mail failed and SMTP is enabled in config, try PHPMailer via SMTP
            if (!$sent && !empty($smtp_config) && !empty($smtp_config['enabled'])) {
                // Composer autoload is expected at project root `vendor/autoload.php`
                $autoloadPaths = [__DIR__ . '/../vendor/autoload.php', __DIR__ . '/vendor/autoload.php', __DIR__ . '/../../vendor/autoload.php'];
                $loaded = false;
                foreach ($autoloadPaths as $p) {
                    if (file_exists($p)) {
                        require_once $p;
                        $loaded = true;
                        break;
                    }
                }

                if ($loaded && class_exists('PHPMailer\\PHPMailer\\PHPMailer')) {
                    try {
                        $mail = new PHPMailer\PHPMailer\PHPMailer;
                        $mail->isSMTP();
                        $mail->Host = $smtp_config['host'];
                        $mail->SMTPAuth = true;
                        $mail->Username = $smtp_config['username'];
                        $mail->Password = $smtp_config['password'];
                        $mail->SMTPSecure = $smtp_config['secure'];
                        $mail->Port = $smtp_config['port'];
                        $mail->setFrom($fromEmail, $fromName);
                        $mail->addAddress($email, $userName);
                        $mail->Subject = $subject;
                        $mail->Body = $message;
                        $mail->AltBody = strip_tags($message);
                        // Optional: use SMTP options if needed (self-signed)
                        $mail->SMTPOptions = [
                            'ssl' => [
                                'verify_peer' => false,
                                'verify_peer_name' => false,
                                'allow_self_signed' => true
                            ]
                        ];
                        if ($mail->send()) {
                            $sent = true;
                        }
                    } catch (Exception $e) {
                        $mailerError = $mail->ErrorInfo ?? $e->getMessage();
                    }
                } else {
                    $mailerError = 'PHPMailer not found. Install it via Composer: run `composer require phpmailer/phpmailer` in project root.';
                }
            }

            if ($sent) {
                $success = "Password reset link has been sent to your email. Please check your inbox.";
            } else {
                $error = "Unable to send email. " . ($mailerError ? $mailerError : 'Please check your server mail configuration or enable SMTP in admin/common/config.php');
            }
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en" class="light-style customizer-hide" dir="ltr" data-theme="theme-default" data-assets-path="../assets/"
    data-template="vertical-menu-template-free">

<?php include('common/head.php'); ?>

<style>
    /* Premium Forgot Password Page Styling */
    body {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        min-height: 100vh;
        display: flex;
        align-items: center;
        justify-content: center;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }

   
    .authentication-wrapper {
        padding: 0 !important;
        background: transparent;
    }

    .authentication-inner {
        background: transparent;
    }

    .auth-card {
        border-radius: 16px;
        box-shadow: 0 20px 60px rgba(0, 0, 0, 0.3);
        overflow: hidden;
        animation: slideUp 0.6s ease-out;
        border: 1px solid rgba(255, 255, 255, 0.2);
    }

    @keyframes slideUp {
        from {
            opacity: 0;
            transform: translateY(30px);
        }

        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .auth-header {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        padding: 2rem 1.5rem;
        text-align: center;
        color: white;
    }

    .auth-header h2 {
        font-size: 1.8rem;
        font-weight: 700;
        margin: 0 0 0.5rem 0;
        letter-spacing: -0.5px;
        color: white;
    }

    .auth-header p {
        font-size: 0.95rem;
        opacity: 0.9;
        margin: 0;
    }

    .auth-body {
        padding: 2rem;
        background: white;
    }

    .form-group {
        margin-bottom: 1.5rem;
    }

    .form-label {
        font-weight: 600;
        color: #2c3e50;
        font-size: 0.95rem;
        display: block;
        margin-bottom: 0.6rem;
    }

    .form-control {
        border: 2px solid #e0e0e0;
        border-radius: 8px;
        padding: 0.75rem 1rem;
        font-size: 0.95rem;
        transition: all 0.3s ease;
        background-color: #f9f9f9;
    }

    .form-control:focus {
        border-color: #667eea;
        background-color: white;
        box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.1);
        outline: none;
    }

    .btn-submit {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        border: none;
        padding: 0.85rem;
        border-radius: 8px;
        font-weight: 600;
        color: white;
        font-size: 1rem;
        width: 100%;
        cursor: pointer;
        transition: all 0.3s ease;
        letter-spacing: 0.5px;
    }

    .btn-submit:hover {
        transform: translateY(-2px);
        box-shadow: 0 10px 25px rgba(102, 126, 234, 0.4);
    }

    .btn-submit:active {
        transform: translateY(0);
    }

    .auth-footer {
        padding: 1.5rem 2rem;
        background: #f9f9f9;
        border-top: 1px solid #e0e0e0;
        text-align: center;
        font-size: 0.9rem;
        color: #666;
    }

    .auth-footer a {
        color: #667eea;
        text-decoration: none;
        font-weight: 600;
        transition: color 0.3s ease;
    }

    .auth-footer a:hover {
        color: #764ba2;
    }

    .alert {
        border-radius: 8px;
        border: none;
        margin-bottom: 1rem;
        padding: 0.9rem 1.2rem;
        font-size: 0.9rem;
    }

    .alert-danger {
        background-color: #fee;
        color: #c33;
        font-weight: 500;
    }

    .alert-success {
        background-color: #efe;
        color: #3c3;
        font-weight: 500;
    }

    .info-text {
        background: #f0f7ff;
        border-left: 4px solid #667eea;
        padding: 0.9rem 1rem;
        border-radius: 4px;
        font-size: 0.9rem;
        color: #333;
        margin-bottom: 1.5rem;
        line-height: 1.5;
    }

    .col-md-5 {
        max-width: 420px;
    }

    /* Responsive */
    @media (max-width: 576px) {
        .auth-body {
            padding: 1.5rem;
        }

        .auth-header {
            padding: 1.5rem 1rem;
        }

        .auth-header h2 {
            font-size: 1.5rem;
        }

        .col-md-5 {
            max-width: 100%;
            padding: 1rem;
        }
    }
</style>

<body>
    <div class="container-xxl">
        <div class="row justify-content-center align-items-center">
            <div class="col-md-5">
                <div class="authentication-wrapper authentication-basic container-p-y">
                    <div class="authentication-inner">
                        <!-- Forgot Password Card -->
                        <div class="auth-card">
                            <div class="auth-header">
                                <h2>Reset Password</h2>
                                <p>Enter your email to receive reset instructions</p>
                            </div>
                            <div class="auth-body">
                                <?php if (!empty($error)): ?>
                                    <div class="alert alert-danger">
                                        <i class="bi bi-exclamation-circle me-2"></i><?= htmlspecialchars($error) ?>
                                    </div>
                                <?php endif; ?>

                                <?php if (!empty($success)): ?>
                                    <div class="alert alert-success">
                                        <i class="bi bi-check-circle me-2"></i><?= htmlspecialchars($success) ?>
                                    </div>
                                    <div class="info-text">
                                        <strong>What's next?</strong><br>
                                        Please check your email for the password reset link.
                                        The link will expire in 1 hour.
                                    </div>
                                    <div class="text-center">
                                        <a href="login.php" class="btn btn-primary w-100"
                                            style="padding: 0.85rem; border-radius: 8px; text-decoration: none;">
                                            Back to Login
                                        </a>
                                    </div>
                                <?php else: ?>
                                    <div class="info-text">
                                        <strong>How it works:</strong><br>
                                        Enter your email address and we'll send you a link to reset your password.
                                    </div>

                                    <form method="POST" id="forgotForm">
                                        <div class="form-group">
                                            <label class="form-label">Email Address</label>
                                            <input type="email" name="email" class="form-control"
                                                placeholder="you@example.com" required>
                                        </div>

                                        <button type="submit" class="btn-submit">Send Reset Link</button>
                                    </form>
                                <?php endif; ?>
                            </div>
                            <div class="auth-footer">
                                <a href="login.php">← Back to Login</a>
                            </div>
                        </div>
                        <!-- /Forgot Password Card -->
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php include 'common/footer.php'; ?>
</body>

</html>

</html>