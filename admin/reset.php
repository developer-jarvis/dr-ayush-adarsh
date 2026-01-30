

<!-- ================================================================== -->
<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

require 'common/config.php';

$error = '';
$success = '';

if (!isset($_GET['token']) && $_SERVER['REQUEST_METHOD'] !== 'POST') {
    die("Invalid request");
}

$token = $_GET['token'] ?? ($_POST['token'] ?? '');

if (empty($token)) {
    die("Invalid token");
}

// Fetch record from users table
$stmt = $conn->prepare("SELECT id, token_expiry FROM users WHERE reset_token=? LIMIT 1");
$stmt->bind_param("s", $token);
$stmt->execute();
$res = $stmt->get_result();

$table = 'users';
$userId = null;

if ($res->num_rows === 0) {
    // Try business_list table
    $stmt2 = $conn->prepare("SELECT id, token_expiry FROM business_list WHERE reset_token=? LIMIT 1");
    $stmt2->bind_param("s", $token);
    $stmt2->execute();
    $res2 = $stmt2->get_result();
    
    if ($res2->num_rows === 0) {
        die("Invalid or expired token.");
    }
    $data = $res2->fetch_assoc();
    $table = 'business_list';
} else {
    $data = $res->fetch_assoc();
}

$userId = $data['id'];

// Check expiry
if (strtotime($data['token_expiry']) < time()) {
    die("Token expired.");
}

// Update password
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $pass = $_POST['password'] ?? "";
    $confirm = $_POST['confirm_password'] ?? "";

    if (strlen($pass) < 6) {
        $error = "Password must be at least 6 characters.";
    } elseif ($pass !== $confirm) {
        $error = "Passwords do not match.";
    } else {
        $hash = password_hash($pass, PASSWORD_DEFAULT);

        $upd = $conn->prepare("UPDATE $table SET password=?, reset_token=NULL, token_expiry=NULL WHERE id=?");
        $upd->bind_param("si", $hash, $userId);

        if ($upd->execute()) {
            $success = "Password updated successfully!";
        } else {
            $error = "Server error. Please try again.";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en" class="light-style customizer-hide" dir="ltr" data-theme="theme-default" data-assets-path="../assets/"
    data-template="vertical-menu-template-free">
<?php include 'common/head.php'; ?>

<style>
  /* Premium Reset Password Page Styling */
  body {
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    min-height: 100vh;
    display: flex;
    align-items: center;
    justify-content: center;
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
  }

  .container-xxl { max-width: 100%; padding: 0; }

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
    width: 100%;
    box-sizing: border-box;
  }

  .form-control:focus {
    border-color: #667eea;
    background-color: white;
    box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.1);
    outline: none;
  }

  .btn-reset {
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

  .btn-reset:hover {
    transform: translateY(-2px);
    box-shadow: 0 10px 25px rgba(102, 126, 234, 0.4);
  }

  .btn-reset:active {
    transform: translateY(0);
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

  .success-message {
    text-align: center;
  }

  .success-message a {
    display: inline-block;
    margin-top: 1.5rem;
    padding: 0.85rem 2rem;
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    color: white;
    text-decoration: none;
    border-radius: 8px;
    font-weight: 600;
    transition: all 0.3s ease;
  }

  .success-message a:hover {
    transform: translateY(-2px);
    box-shadow: 0 10px 25px rgba(102, 126, 234, 0.4);
  }

  .col-md-5 {
    max-width: 420px;
  }

  /* Responsive */
  @media (max-width: 576px) {
    .auth-body { padding: 1.5rem; }
    .auth-header { padding: 1.5rem 1rem; }
    .auth-header h2 { font-size: 1.5rem; }
    .col-md-5 { max-width: 100%; padding: 1rem; }
  }
</style>

<body>
    <div class="container-xxl">
        <div class="row justify-content-center align-items-center">
            <div class="col-md-5">
                <div class="authentication-wrapper authentication-basic container-p-y">
                    <div class="authentication-inner">
                        <!-- Reset Password Card -->
                        <div class="auth-card">
                            <div class="auth-header">
                                <h2>Create New Password</h2>
                                <p>Enter your new password below</p>
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
                                    <div class="success-message">
                                        <p style="color: #666; margin-bottom: 1rem;">Your password has been successfully reset. You can now log in with your new password.</p>
                                        <a href="login.php">← Back to Login</a>
                                    </div>
                                <?php else: ?>
                                    <form method="POST">
                                        <input type="hidden" name="token" value="<?= htmlspecialchars($token) ?>">
                                        
                                        <div class="form-group">
                                            <label class="form-label">New Password</label>
                                            <input type="password" name="password" class="form-control" placeholder="••••••••" required>
                                        </div>

                                        <div class="form-group">
                                            <label class="form-label">Confirm Password</label>
                                            <input type="password" name="confirm_password" class="form-control" placeholder="••••••••" required>
                                        </div>

                                        <button type="submit" class="btn-reset">Reset Password</button>
                                    </form>
                                <?php endif; ?>
                            </div>
                        </div>
                        <!-- Reset Password Card -->
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php include 'common/footer.php'; ?>
</body>
                            </div>
                        </div>
                        <!-- Register Card -->
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- / Content -->


    <?php include 'common/footer.php'; ?>
</body>

</html>