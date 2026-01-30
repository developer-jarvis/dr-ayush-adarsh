<?php
require 'common/config.php';

if (session_status() === PHP_SESSION_NONE) {
  session_start();
}

$error = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

  $email = trim($_POST['email']);
  $password = $_POST['password'];

  // CHECK IN USERS TABLE (Admin / Vendor / Normal User)
  $stmt = $conn->prepare("SELECT id, name, email, password, role FROM users WHERE email = ? LIMIT 1");
  $stmt->bind_param("s", $email);
  $stmt->execute();
  $res = $stmt->get_result();

  if ($res->num_rows === 1) {

    $user = $res->fetch_assoc();

    if (!password_verify($password, $user['password'])) {
      $error = "Invalid email or password";
    } else {
      // SET SESSION FOR USERS TABLE
      $_SESSION['user_id'] = $user['id'];
      $_SESSION['name'] = $user['name'];
      $_SESSION['role'] = $user['role'];

      // ADMIN
      if ($user['role'] === 'admin') {
        $_SESSION['login_type'] = "admin";
        header("Location: index.php");
        exit;
      }

      // VENDOR
      if ($user['role'] === 'vendor') {
        $_SESSION['login_type'] = "vendor";
        header("Location: index.php");
        exit;
      }

      // NORMAL USER
      $_SESSION['login_type'] = "user";
      header("Location: ../");
      exit;
    }
  } else {
    // CHECK BUSINESS OWNER TABLE
    $stmt2 = $conn->prepare("SELECT id, business_name, owner_name, email, password FROM business_list WHERE email = ? LIMIT 1");
    $stmt2->bind_param("s", $email);
    $stmt2->execute();
    $res2 = $stmt2->get_result();

    if ($res2->num_rows === 1) {

      $biz = $res2->fetch_assoc();

      if (!password_verify($password, $biz['password'])) {
        $error = "Invalid email or password";
      } else {
        // SET SESSION FOR BUSINESS USER
        $_SESSION['login_type'] = "business";
        $_SESSION['business_id'] = $biz['id'];
        $_SESSION['business_name'] = $biz['business_name'];
        $_SESSION['owner_name'] = $biz['owner_name'];

        header("Location: ../");
        exit;
      }
    } else {
      $error = "Account not found";
    }
  }
}
?>
<!DOCTYPE html>
<html lang="en" class="light-style customizer-hide" dir="ltr" data-theme="theme-default" data-assets-path="../assets/"
  data-template="vertical-menu-template-free">

<?php include('common/head.php'); ?>

<style>
  /* Premium Login Page Styling - Bootstrap Responsive */
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
    color: white;
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

  .input-group-merge {
    position: relative;
    display: flex;
  }

  .input-group-text {
    border: 2px solid #e0e0e0 !important;
    border-left: none !important;
    border-radius: 0 8px 8px 0 !important;
    background: white !important;
    cursor: pointer;
    color: #667eea;
    transition: all 0.3s ease;
  }

  .input-group-merge .form-control {
    border-radius: 8px 0 0 8px !important;
  }

  .form-control:focus ~ .input-group-text {
    border-color: #667eea !important;
    color: #667eea;
  }

  .form-footer {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 1.5rem;
    font-size: 0.9rem;
    flex-wrap: wrap;
    gap: 0.5rem;
  }

  .form-footer a {
    color: #667eea;
    text-decoration: none;
    font-weight: 500;
    transition: color 0.3s ease;
  }

  .form-footer a:hover {
    color: #764ba2;
  }

  .btn-login {
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

  .btn-login:hover {
    transform: translateY(-2px);
    box-shadow: 0 10px 25px rgba(102, 126, 234, 0.4) !important;
  }

  .btn-login:active {
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
    .form-footer {
      flex-direction: column;
      align-items: flex-start;
    }
    .col-md-5 {
      max-width: 100% !important;
      flex: 0 0 100%;
      padding: 0;
    }
  }
</style>

<body>

  <div class="container-xxl">
    <div class="row justify-content-center align-items-center">
      <div class="col-md-5">
        <div class="authentication-wrapper authentication-basic container-p-y">
          <div class="authentication-inner">
            <!-- Login Card -->
            <div class="auth-card">
              <div class="auth-header">
                <h2>Welcome Back</h2>
                <p>Sign in to your BizReach account</p>
              </div>
              <div class="auth-body">
                <?php if (!empty($error)): ?>
                  <div class="alert alert-danger">
                    <i class="bi bi-exclamation-circle me-2"></i><?= htmlspecialchars($error) ?>
                  </div>
                <?php endif; ?>

                <form id="formAuthentication" method="POST">

                  <div class="form-group">
                    <label class="form-label">Email Address</label>
                    <input type="email" class="form-control" name="email" placeholder="you@example.com" required />
                  </div>

                  <div class="form-group">
                    <div class="form-footer">
                      <label class="form-label mb-0">Password</label>
                      <a href="forget-password.php">Forgot Password?</a>
                    </div>
                    <div class="input-group input-group-merge">
                      <input type="password" class="form-control" name="password" placeholder="••••••••" required />
                      <span class="input-group-text toggle-password" style="cursor: pointer;"><i class="bx bx-hide"></i></span>
                    </div>
                  </div>

                  <button class="btn-login" type="submit">Sign In</button>

                </form>
              </div>
              <div class="auth-footer">
                <span>New here?</span>
                <a href="register.php">Create an account</a>
              </div>
            </div>
            <!-- /Login Card -->
          </div>
        </div>
      </div>
    </div>
  </div>

  <?php include 'common/footer.php'; ?>

  <script>
    // Toggle password visibility
    document.querySelector('.toggle-password').addEventListener('click', function() {
      const input = this.parentElement.querySelector('.form-control');
      const icon = this.querySelector('i');
      if (input.type === 'password') {
        input.type = 'text';
        icon.className = 'bx bx-show';
      } else {
        input.type = 'password';
        icon.className = 'bx bx-hide';
      }
    });
  </script>

  <?php include 'common/footer.php'; ?>

</html>