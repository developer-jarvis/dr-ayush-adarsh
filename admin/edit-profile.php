<?php
session_start();
include 'common/config.php';

if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit();
}

$user_id = (int) $_SESSION['user_id'];

// Get user data
$stmt = $conn->prepare("SELECT name, email FROM users WHERE id = ?");
$stmt->bind_param("i", $user_id);
$stmt->execute();
$res = $stmt->get_result();
$user = $res->fetch_assoc();
$stmt->close();

if (!$user) {
    die("User not found.");
}

// Handle form submit
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);



    // password update only if user entered something
    if (!empty($password)) {
        $password = password_hash($password, PASSWORD_BCRYPT);
        $stmt = $conn->prepare("UPDATE users SET name=?, email=?, password=? WHERE id=?");
        $stmt->bind_param("sssi", $name, $email, $password, $user_id);
    } else {
        $stmt = $conn->prepare("UPDATE users SET name=?, email=? WHERE id=?");
        $stmt->bind_param("ssi", $name, $email, $user_id);
    }

    if ($stmt->execute()) {
        $_SESSION['flash'] = "Profile updated successfully!";
        header("Location: my-profile.php");
        exit();
    }

    $error = "Something went wrong.";
}
?>

<!DOCTYPE html>
<html lang="en" class="light-style layout-menu-fixed" dir="ltr" data-theme="theme-default">
<?php include 'common/head.php'; ?>

<style>
    .tick::before {
        content: "\2713";
        margin-right: 5px;
        color: green;
    }
</style>

<body>
    <div class="layout-wrapper layout-content-navbar">
        <div class="layout-container">
            <?php include 'common/sidebar.php'; ?>
            <div class="layout-page">
                <?php include 'common/header.php'; ?>

                <div class="content-wrapper">
                    <div class="container-xxl flex-grow-1 container-p-y">
                        <h4 class="mb-4">Edit Profile</h4>

                        <?php if (!empty($error)): ?>
                            <div class="alert alert-danger"><?= htmlspecialchars($error) ?></div>
                        <?php endif; ?>

                        <div class="card shadow-sm border-0">
                            <div class="card-body">
                                <form method="POST" enctype="multipart/form-data">
                                    <div class="row g-3">

                                        <div class="col-md-6">
                                            <label class="form-label">Full Name</label>
                                            <input type="text" name="name" class="form-control"
                                                value="<?= htmlspecialchars($user['name']) ?>" required>
                                        </div>

                                        <div class="col-md-6">
                                            <label class="form-label">Email</label>
                                            <input type="email" name="email" class="form-control"
                                                value="<?= htmlspecialchars($user['email']) ?>" required>
                                        </div>

                                        <div class="col-md-12">
                                            <label class="form-label">New Password (optional)</label>
                                            <div class="input-group">
                                                <input type="password" name="password" id="passwordInput"
                                                    class="form-control" placeholder="Enter new password">
                                                <button class="btn btn-outline-secondary" type="button"
                                                    id="togglePassword">
                                                    <i class="bx bx-hide"></i>
                                                </button>
                                            </div>

                                            <!-- Password Strength Meter -->
                                            <div id="passwordStrengthContainer" style="display: none;" class="mt-2">
                                                <div class="d-flex justify-content-between align-items-center mb-2">
                                                    <small class="text-muted">Password Strength:</small>
                                                    <small id="strengthText" class="fw-bold">-</small>
                                                </div>
                                                <div class="progress" style="height: 6px;">
                                                    <div id="strengthBar" class="progress-bar" role="progressbar"
                                                        style="width: 0%"></div>
                                                </div>
                                            </div>

                                            <!-- Requirements Checklist -->
                                            <div id="requirementsContainer" style="display: none;" class="mt-3">
                                                <small class="text-muted d-block mb-2">Password must contain:</small>
                                                <div class="row g-2">
                                                    <div class="col-6">
                                                        <small class="d-flex align-items-center">
                                                            <i class="bx bx-x me-1" id="req-length"
                                                                style="color: #dc3545;"></i>
                                                            <span id="text-length">At least 8 characters</span>
                                                        </small>
                                                    </div>
                                                    <div class="col-6">
                                                        <small class="d-flex align-items-center">
                                                            <i class="bx bx-x me-1" id="req-upper"
                                                                style="color: #dc3545;"></i>
                                                            <span id="text-upper">Uppercase letter</span>
                                                        </small>
                                                    </div>
                                                    <div class="col-6">
                                                        <small class="d-flex align-items-center">
                                                            <i class="bx bx-x me-1" id="req-lower"
                                                                style="color: #dc3545;"></i>
                                                            <span id="text-lower">Lowercase letter</span>
                                                        </small>
                                                    </div>
                                                    <div class="col-6">
                                                        <small class="d-flex align-items-center">
                                                            <i class="bx bx-x me-1" id="req-number"
                                                                style="color: #dc3545;"></i>
                                                            <span id="text-number">Number (0-9)</span>
                                                        </small>
                                                    </div>
                                                    <div class="col-6">
                                                        <small class="d-flex align-items-center">
                                                            <i class="bx bx-x me-1" id="req-special"
                                                                style="color: #dc3545;"></i>
                                                            <span id="text-special">Special character (!@#$%^&*)</span>
                                                        </small>
                                                    </div>
                                                </div>
                                            </div>

                                            <small class="text-muted d-block mt-2">Leave blank to keep current
                                                password</small>
                                        </div>

                                    </div>

                                    <div class="mt-4 text-end">
                                        <button type="submit" class="btn btn-primary">Save Changes</button>
                                        <a href="my-profile.php" class="btn btn-secondary">Cancel</a>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="content-backdrop fade"></div>
                </div>
            </div>
        </div>
        <div class="layout-overlay layout-menu-toggle"></div>
    </div>
    <?php include 'common/footer.php'; ?>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const toggleBtn = document.getElementById('togglePassword');
            const passwordInput = document.getElementById('passwordInput');
            const strengthContainer = document.getElementById('passwordStrengthContainer');
            const strengthBar = document.getElementById('strengthBar');
            const strengthText = document.getElementById('strengthText');
            const requirementsContainer = document.getElementById('requirementsContainer');

            // Requirement checks
            const requirements = {
                length: { regex: /.{8,}/, element: 'req-length' },
                upper: { regex: /[A-Z]/, element: 'req-upper' },
                lower: { regex: /[a-z]/, element: 'req-lower' },
                number: { regex: /[0-9]/, element: 'req-number' },
                special: { regex: /[!@#$%^&*()_+\-=\[\]{};':"\\|,.<>\/?]/, element: 'req-special' }
            };

            function checkRequirements(password) {
                let met = 0;
                for (const [key, req] of Object.entries(requirements)) {
                    const isMet = req.regex.test(password);
                    const element = document.getElementById(req.element);
                    const icon = element.querySelector('i');

                    if (isMet) {
                        icon.classList.remove('bx-x');
                        icon.classList.add('bx-check');
                        icon.style.color = '#28a745';
                        met++;
                    } else {
                        icon.classList.remove('bx-check');
                        icon.classList.add('bx-x');
                        icon.style.color = '#dc3545';
                    }
                }
                return met;
            }

            function updatePasswordStrength() {
                const password = passwordInput.value;

                if (password.length === 0) {
                    strengthContainer.style.display = 'none';
                    requirementsContainer.style.display = 'none';
                    return;
                }

                strengthContainer.style.display = 'block';
                requirementsContainer.style.display = 'block';

                const met = checkRequirements(password);
                const strength = (met / Object.keys(requirements).length) * 100;

                strengthBar.style.width = strength + '%';

                if (strength < 40) {
                    strengthBar.className = 'progress-bar bg-danger';
                    strengthText.textContent = 'Weak';
                    strengthText.style.color = '#dc3545';
                } else if (strength < 80) {
                    strengthBar.className = 'progress-bar bg-warning';
                    strengthText.textContent = 'Medium';
                    strengthText.style.color = '#ffc107';
                } else {
                    strengthBar.className = 'progress-bar bg-success';
                    strengthText.textContent = 'Strong';
                    strengthText.style.color = '#28a745';
                }

                // Update tick marks
                const lowercaseCheck = /[a-z]/.test(password);
                const uppercaseCheck = /[A-Z]/.test(password);
                const numberCheck = /[0-9]/.test(password);
                const specialCheck = /[!@#$%^&*()_+\-=\[\]{};':"\\|,.<>\/?]/.test(password);

                lowercaseTick.classList.toggle('tick', lowercaseCheck);
                uppercaseTick.classList.toggle('tick', uppercaseCheck);
                numberTick.classList.toggle('tick', numberCheck);
                specialTick.classList.toggle('tick', specialCheck);
            }

            // Toggle password visibility
            if (toggleBtn && passwordInput) {
                toggleBtn.addEventListener('click', function () {
                    const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
                    passwordInput.setAttribute('type', type);

                    const icon = this.querySelector('i');
                    if (type === 'password') {
                        icon.classList.remove('bx-show');
                        icon.classList.add('bx-hide');
                    } else {
                        icon.classList.remove('bx-hide');
                        icon.classList.add('bx-show');
                    }
                });

                // Update strength on input
                passwordInput.addEventListener('input', updatePasswordStrength);
            }
        });
    </script>
</body>

</html>