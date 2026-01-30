<?php
// view-user.php
session_start();
include '../admin/common/config.php';
if (!isset($_SESSION['user_id']) || ($_SESSION['role'] ?? '') !== 'admin') {
    header('Location: ../login.php');
    exit();
}

$id = isset($_GET['id']) ? (int) $_GET['id'] : 0;
if ($id <= 0) {
    header('Location: account-verify.php');
    exit();
}

$stmt = $conn->prepare("SELECT * FROM users WHERE id = ?");
$stmt->bind_param("i", $id);
$stmt->execute();
$res = $stmt->get_result();
$user = $res->fetch_assoc();
$stmt->close();

if (!$user) {
    header('Location: account-verify.php');
    exit();
}
?>
<!DOCTYPE html>

<html lang="en" class="light-style layout-menu-fixed" dir="ltr" data-theme="theme-default" data-assets-path="assets/"
    data-template="vertical-menu-template-free">
<?php include 'common/head.php'; ?>

<body>

    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
        <div class="layout-container">
            <!-- Menu -->

            <?php include 'common/sidebar.php'; ?>

            <!-- Layout container -->
            <div class="layout-page">
                <!-- Navbar -->

                <?php include 'common/header.php'; ?>
                <!-- / Navbar -->

                <!-- Content wrapper -->
                <div class="content-wrapper px-3">
                    <div class="container-xxl flex-grow-1 container-p-y">
                        <div class="row align-items-center">
                            <div class="col-md-4">
                                <?php if (!empty($user['photo'])): ?>
                                    <img src="../admin/assets/uploads/guardians/<?= htmlspecialchars($user['photo']) ?>"
                                        class="img-fluid rounded shadow" alt="">
                                <?php else: ?>
                                    <div class="border rounded p-5 text-center text-muted">No Photo</div>
                                <?php endif; ?>
                            </div>

                            <div class="col-md-8">
                                <h4 class="bg-white text-dark p-2 rounded"><?= htmlspecialchars($user['name']) ?> <small
                                        class="text-dark">(#<?= $user['id'] ?>)</small></h4>
                                <p class="bg-white text-dark p-2 rounded"><strong>Email:</strong> <?= htmlspecialchars($user['email']) ?></p>
                                <p class="bg-white text-dark p-2 rounded"><strong>Mobile:</strong> <?= htmlspecialchars($user['mobile']) ?></p>
                                <p class="bg-white text-dark p-2 rounded"><strong>Job:</strong> <?= htmlspecialchars($user['job_type']) ?> —
                                    <?= htmlspecialchars($user['designation']) ?>
                                </p>
                                <p class="bg-white text-dark p-2 rounded"><strong>Posting Address:</strong>
                                    <?= nl2br(htmlspecialchars($user['posting_address'])) ?></p>
                                <p class="bg-white text-dark p-2 rounded"><strong>Home Address:</strong> <?= nl2br(htmlspecialchars($user['home_address'])) ?>
                                </p>
                                <p class="bg-white text-dark p-2 rounded"><strong>Children:</strong> <?= (int) $user['daughters'] ?> daughters,
                                    <?= (int) $user['sons'] ?> sons
                                </p>
                                <p class="bg-white text-dark p-2 rounded"><strong>Registered:</strong> <?= htmlspecialchars($user['created_at']) ?></p>

                                <div class="mt-3">
                                    <form method="POST" action="admin-verify.php" style="display:inline">
                                        <input type="hidden" name="id" value="<?= $user['id'] ?>">
                                        <button class="btn btn-success" name="action" value="approve"
                                            onclick="return confirm('Approve this user?')">Approve</button>
                                    </form>
                                    <form method="POST" action="admin-verify.php" style="display:inline">
                                        <input type="hidden" name="id" value="<?= $user['id'] ?>">
                                        <button class="btn btn-danger" name="action" value="reject"
                                            onclick="return confirm('Reject this user?')">Reject</button>
                                    </form>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="content-backdrop fade"></div>
                </div>
                <!-- Content wrapper -->
            </div>
            <!-- / Layout page -->
        </div>

        <!-- Overlay -->
        <div class="layout-overlay layout-menu-toggle"></div>
    </div>
    <!-- / Layout wrapper -->
    <?php include 'common/footer.php'; ?>
</body>

</html>
<?php $conn->close(); ?>