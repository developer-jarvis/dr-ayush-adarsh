<?php
// admin/view-business.php
ini_set('display_errors', 1);
error_reporting(E_ALL);
include 'common/config.php';
session_start();
if (!isset($_SESSION['user_id']) || ($_SESSION['role'] ?? '') !== 'admin') {
    header('Location: ../login.php');
    exit();
}

$id = isset($_GET['id']) ? (int) $_GET['id'] : 0;
if ($id <= 0) {
    header('Location: users.php');
    exit();
}

// Handle approve/reject
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action'])) {
    $action = $_POST['action'];
    $newStatus = ($action === 'approve') ? 'approved' : 'rejected';
    $stmt = $conn->prepare("UPDATE business_list SET status = ? WHERE id = ?");
    $stmt->bind_param('si', $newStatus, $id);
    $stmt->execute();
    $stmt->close();
    $_SESSION['flash'] = "Business #$id has been " . ($newStatus === 'approved' ? 'approved' : 'rejected') . ".";
    header('Location: users.php');
    exit();
}

$stmt = $conn->prepare("SELECT * FROM business_list WHERE id = ?");
$stmt->bind_param('i', $id);
$stmt->execute();
$res = $stmt->get_result();
$business = $res->fetch_assoc();
$stmt->close();

if (!$business) {
    header('Location: users.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="en" class="light-style layout-menu-fixed" dir="ltr" data-theme="theme-default" data-assets-path="assets/" data-template="vertical-menu-template-free">
<?php include 'common/head.php'; ?>
<?php include 'common/session.php'; ?>

<body>
  <div class="layout-wrapper layout-content-navbar">
    <div class="layout-container">
      <?php include 'common/sidebar.php'; ?>
      <div class="layout-page">
        <?php include 'common/header.php'; ?>

        <div class="content-wrapper px-3">
          <div class="container-xxl flex-grow-1 container-p-y">
            <?php if (!empty($_SESSION['flash'])): ?>
              <div class="alert alert-success"><?= htmlspecialchars($_SESSION['flash']) ?></div>
              <?php unset($_SESSION['flash']); ?>
            <?php endif; ?>

            <div class="card mb-4">
              <div class="card-body">
                <h4 class="card-title"><?= htmlspecialchars($business['business_name'] ?? '') ?> <small class="text-muted">#<?= intval($business['id']) ?></small></h4>
                <p><strong>Owner:</strong> <?= htmlspecialchars($business['owner_name'] ?? '') ?></p>
                <p><strong>Phone:</strong> <?= htmlspecialchars($business['phone'] ?? '') ?></p>
                <p><strong>Email:</strong> <?= htmlspecialchars($business['email'] ?? '') ?></p>
                <p><strong>Service:</strong> <?= htmlspecialchars($business['service'] ?? '') ?></p>
                <p><strong>Department / Specialization:</strong> <?= htmlspecialchars($business['department'] ?? '') ?></p>
                <p><strong>State:</strong> <?= htmlspecialchars($business['state'] ?? '') ?> <strong>City:</strong> <?= htmlspecialchars($business['city'] ?? '') ?></p>
                <p><strong>Address:</strong><br> <?= nl2br(htmlspecialchars($business['address'] ?? '')) ?></p>
                <p><strong>Listed At:</strong> <?= htmlspecialchars($business['created_at'] ?? '') ?></p>
                <p><strong>Status:</strong> <span class="badge bg-info text-dark"><?= htmlspecialchars($business['status'] ?? '') ?></span></p>

                <div class="mt-3">
                  <?php if (($business['status'] ?? '') === 'rejected'): ?>
                    <form method="POST" style="display:inline">
                      <input type="hidden" name="action" value="approve">
                      <button class="btn btn-success" onclick="return confirm('Accept (approve) this rejected listing?')">Accept</button>
                    </form>
                  <?php endif; ?>

                  <?php if (($business['status'] ?? '') !== 'approved'): ?>
                    <form method="POST" style="display:inline; margin-left:6px">
                      <input type="hidden" name="action" value="approve">
                      <button class="btn btn-primary" onclick="return confirm('Approve this listing?')">Approve</button>
                    </form>
                  <?php endif; ?>

                  <?php if (($business['status'] ?? '') !== 'rejected'): ?>
                    <form method="POST" style="display:inline; margin-left:6px">
                      <input type="hidden" name="action" value="reject">
                      <button class="btn btn-danger" onclick="return confirm('Reject this listing?')">Reject</button>
                    </form>
                  <?php endif; ?>

                  <a href="users.php" class="btn btn-secondary ms-2">Back</a>
                </div>

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
</body>

</html>
