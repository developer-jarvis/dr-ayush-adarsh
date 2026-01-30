<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>
<!DOCTYPE html>

<html lang="en" class="light-style customizer-hide" dir="ltr" data-theme="theme-default" data-assets-path="../assets/"
  data-template="vertical-menu-template-free">
<?php include 'common/head.php'; ?>

<style>
  /* Premium Register Page Styling - Bootstrap Responsive */
  body {
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%) !important;
    min-height: 100vh;
    display: flex;
    align-items: center;
    justify-content: center;
  }

  .container-xxl {
    padding-right: 15px;
    padding-left: 15px;
  }

  .row {
    display: flex;
    align-items: center;
    justify-content: center;
    min-height: 100vh;
  }

  .authentication-wrapper {
    padding: 0 !important;
    background: transparent;
    width: 100%;
  }

  .authentication-inner {
    background: transparent;
    width: 100%;
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
    font-size: 1.6rem;
    font-weight: 700;
    margin: 0 0 0.5rem 0;
    letter-spacing: -0.5px;
  }

  .auth-header p {
    font-size: 0.9rem;
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
    font-size: 0.9rem;
    display: block;
    margin-bottom: 0.6rem;
  }

  .form-control {
    border: 2px solid #e0e0e0 !important;
    border-radius: 8px !important;
    padding: 0.75rem 1rem !important;
    font-size: 0.95rem !important;
    transition: all 0.3s ease !important;
    background-color: #f9f9f9 !important;
  }

  .form-control:focus {
    border-color: #667eea !important;
    background-color: white !important;
    box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.1) !important;
  }

  .btn-register {
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%) !important;
    border: none !important;
    padding: 0.85rem !important;
    border-radius: 8px !important;
    font-weight: 600 !important;
    color: white !important;
    font-size: 1rem !important;
    width: 100% !important;
    cursor: pointer;
    transition: all 0.3s ease;
    letter-spacing: 0.5px;
  }

  .btn-register:hover {
    transform: translateY(-2px);
    box-shadow: 0 10px 25px rgba(102, 126, 234, 0.4) !important;
  }

  .btn-register:active {
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
    margin: 0 0.3rem;
  }

  .auth-footer a:hover {
    color: #764ba2;
  }

  .alert {
    border-radius: 8px;
    border: none !important;
    margin-bottom: 1rem;
    padding: 0.9rem 1.2rem;
    font-size: 0.9rem;
  }

  .alert-danger {
    background-color: #fee !important;
    color: #c33 !important;
  }

  .alert-success {
    background-color: #efe !important;
    color: #3c3 !important;
  }

  .password-requirements {
    font-size: 0.8rem;
    color: #666;
    margin-top: 0.5rem;
    padding: 0.75rem;
    background: #f5f5f5;
    border-radius: 6px;
    display: none;
  }

  .password-requirements.show {
    display: block;
  }

  /* Tablet and up */
  @media (min-width: 768px) {
    .col-md-5 {
      max-width: 420px;
      flex: 0 0 auto;
    }
    .auth-header h2 {
      font-size: 1.8rem;
    }
  }

  /* Mobile */
  @media (max-width: 767px) {
    body {
      padding: 1rem;
    }
    .row {
      min-height: auto;
      padding: 1rem 0;
    }
    .auth-body {
      padding: 1.5rem;
    }
    .auth-header {
      padding: 1.5rem 1rem;
    }
    .auth-header h2 {
      font-size: 1.4rem;
    }
    .auth-header p {
      font-size: 0.85rem;
    }
    .col-md-5 {
      max-width: 100% !important;
      flex: 0 0 100%;
      padding: 0;
    }
  }
</style>

<body>
  <?php
  require 'common/config.php';

  $error = '';
  $success = '';

  if (isset($_POST['submit'])) {
    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $password = $_POST['password'];
    $confirm = $_POST['confirm_password'];

    if (strlen($password) < 6) {
      $error = "Password must be at least 6 characters.";
    } elseif ($password !== $confirm) {
      $error = "Passwords do not match.";
    } else {

      $check = $conn->prepare("SELECT id FROM users WHERE email = ?");
      $check->bind_param("s", $email);
      $check->execute();
      $check->store_result();

      if ($check->num_rows > 0) {
        $error = "Email already registered.";
      } else {
        $hashed = password_hash($password, PASSWORD_DEFAULT);

        $stmt = $conn->prepare("INSERT INTO users (name, email, password, role) VALUES (?, ?, ?, 'user')");
        $stmt->bind_param("sss", $name, $email, $hashed);

        if ($stmt->execute()) {
          $_SESSION['user_id'] = $stmt->insert_id;
          $_SESSION['name'] = $name;
          $_SESSION['login_type'] = "user";

          header("Location: ../index.php");
          exit;
        } else {
          $error = "Registration failed. Please try again.";
        }
      }
    }
  }
  ?>

  <div class="container-xxl">
    <div class="row justify-content-center align-items-center">
      <div class="col-md-5">
        <div class="authentication-wrapper authentication-basic container-p-y">
          <div class="authentication-inner">
            <!-- Register Card -->
            <div class="auth-card">
              <div class="auth-header">
                <h2 class="text-white">Create Account</h2>
                <p>Join BizReach and grow your business</p>
              </div>
              <div class="auth-body">
                <?php if (!empty($error)): ?>
                  <div class="alert alert-danger">
                    <i class="bi bi-exclamation-circle me-2"></i><?= htmlspecialchars($error) ?>
                  </div>
                <?php endif; ?>

                <form id="formAuthentication" method="POST">

                  <div class="form-group">
                    <label class="form-label">Full Name</label>
                    <input type="text" class="form-control" name="name" placeholder="Prince Singh" required />
                  </div>

                  <div class="form-group">
                    <label class="form-label">Email Address</label>
                    <input type="email" class="form-control" name="email" placeholder="you@example.com" required />
                  </div>

                  <div class="form-group">
                    <label class="form-label">Password</label>
                    <input type="password" class="form-control" id="passwordInput" name="password" placeholder="••••••••" required />
                    <div class="password-requirements" id="passwordReq">
                      ✓ At least 6 characters
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="form-label">Confirm Password</label>
                    <input type="password" class="form-control" name="confirm_password" placeholder="••••••••" required />
                  </div>

                  <button class="btn-register" type="submit" name="submit">Create Account</button>

                </form>
              </div>
              <div class="auth-footer">
                <span>Already have an account?</span>
                <a href="login.php">Sign in here</a>
              </div>
            </div>
            <!-- Register Card -->
          </div>
        </div>
      </div>
    </div>
  </div>

  <?php include 'common/footer.php'; ?>

  <script>
    document.getElementById('passwordInput').addEventListener('focus', function() {
      document.getElementById('passwordReq').classList.add('show');
    });
    document.getElementById('passwordInput').addEventListener('blur', function() {
      document.getElementById('passwordReq').classList.remove('show');
    });
  </script>
</body>

</html>