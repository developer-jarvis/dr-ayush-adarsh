<?php
session_start();
include 'common/config.php';

if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit();
}

$user_id = (int) $_SESSION['user_id'];

// Fetch admin info
$stmt = $conn->prepare("SELECT id, name, email, created_at FROM users WHERE id = ?");
$stmt->bind_param("i", $user_id);
$stmt->execute();
$res = $stmt->get_result();
$user = $res->fetch_assoc();
$stmt->close();

if (!$user) {
    die("User not found.");
}
?>

<!DOCTYPE html>

<html lang="en" class="light-style layout-menu-fixed" dir="ltr" data-theme="theme-default" data-assets-path="assets/"
    data-template="vertical-menu-template-free">
<?php include 'common/head.php'; ?>

<body>
    <div class="layout-wrapper layout-content-navbar">
        <div class="layout-container">
            <?php include 'common/sidebar.php'; ?>

            <div class="layout-page">
                <?php include 'common/header.php'; ?>

                <div class="content-wrapper">
                    <div class="container-xxl flex-grow-1 container-p-y">
                        <h4 class="mb-4">My Profile</h4>

                        <div class="card shadow-sm border-0">
                            <div class="card-body">
                                <div class="row g-4 align-items-center">
                                    <div class="col-md-3 text-center">
                                        <?php if (!empty($user['photo'])): ?>
                                            <img src="../admin/assets/uploads/guardians/<?= htmlspecialchars($user['photo']) ?>"
                                                alt="Profile Photo" class="img-thumbnail rounded">
                                        <?php else: ?>
                                            <img src="../admin/assets/img/avatars/1.png"
                                                class="img-thumbnail rounded-circle" width="150">
                                        <?php endif; ?>

                                        <h5 class="mt-3 mb-0"><?= htmlspecialchars($user['name']) ?></h5>
                                        <small class="text-muted">Admin</small>
                                    </div>

                                    <div class="col-md-9">
                                        <table class="table table-bordered mb-0">
                                            <tr>
                                                <th width="25%">Email</th>
                                                <td><?= htmlspecialchars($user['email']) ?></td>
                                            </tr>
                                            <tr>
                                                <th>Member Since</th>
                                                <td><?= date('d M Y', strtotime($user['created_at'])) ?></td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>

                                <div class="mt-4 text-end">
                                    <a href="edit-profile.php" class="btn btn-primary">Edit Profile</a>
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
<?php
$conn->close();
?>