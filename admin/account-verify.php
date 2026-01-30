<?php
session_start();
include '../admin/common/config.php';

// Only admin allowed
if (!isset($_SESSION['user_id']) || ($_SESSION['role'] ?? '') !== 'admin') {
    header('Location: ../login.php');
    exit();
}

// Approve / Reject
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $id = (int) $_POST['id'];
    $action = $_POST['action'];

    if ($action === "approve") {
        $status = "approved";
    } else {
        $status = "rejected";
    }

    $stmt = $conn->prepare("UPDATE business_list SET status = ? WHERE id = ?");
    $stmt->bind_param("si", $status, $id);
    $stmt->execute();
    $stmt->close();

    $_SESSION['flash'] = "Business ID #$id is " . ($action === "approve" ? "approved" : "rejected") . ".";
    header("Location: account-verify.php");
    exit();
}

$i = 1;
$q = $conn->prepare("SELECT id, business_name, owner_name, phone, email, service, department, state, city, address, created_at 
                     FROM business_list 
                     WHERE status='pending' 
                     ORDER BY created_at ASC");
$q->execute();
$res = $q->get_result();
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
                <div class="content-wrapper">
                    <div class="container-xxl flex-grow-1 container-p-y">
                        <?php if (!empty($_SESSION['flash'])): ?>
                            <div class="alert alert-success"><?= htmlspecialchars($_SESSION['flash']) ?></div>
                            <?php unset($_SESSION['flash']); ?>
                        <?php endif; ?>

                        <?php if ($res->num_rows === 0): ?>
                            <div class="alert alert-info">No pending registrations.</div>
                        <?php else: ?>
                            <div class="table-responsive">
                                <table class="table table-bordered table-hover align-middle">
                                    <thead class="table-light">
                                        <tr>
                                            <th class="no-sort">#</th>
                                            <th class="text-nowrap">Business Name</th>
                                            <th class="text-nowrap">Owner Name</th>
                                            <th class="text-nowrap">Mobile</th>
                                            <th class="text-nowrap">Email</th>
                                            <th class="text-nowrap">Service</th>
                                            <th class="text-nowrap">Specialization</th>
                                            <th class="text-nowrap">State</th>
                                            <th class="text-nowrap">City</th>
                                            <th class="text-nowrap">Address</th>
                                            <th class="text-nowrap">Date Listed</th>
                                            <th class="text-nowrap">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php while ($row = $res->fetch_assoc()): ?>
                                            <tr>
                                                <td><?= $i++ ?></td>
                                                <td class="text-nowrap"><?= htmlspecialchars($row['business_name']) ?></td>
                                                <td class="text-nowrap"><?= htmlspecialchars($row['owner_name']) ?></td>
                                                <td class="text-nowrap"><?= htmlspecialchars($row['phone']) ?></td>
                                                <td class="text-nowrap"><?= htmlspecialchars($row['email']) ?></td>
                                                <td class="text-nowrap"><?= htmlspecialchars($row['service']) ?></td>
                                                <td class="text-nowrap"><?= htmlspecialchars($row['department'] ?? '') ?></td>
                                                <td class="text-nowrap"><?= htmlspecialchars($row['state']) ?></td>
                                                <td class="text-nowrap"><?= htmlspecialchars($row['city']) ?></td>
                                                <td class="text-nowrap"><?= htmlspecialchars($row['address']) ?></td>
                                                <td class="text-nowrap"><?= htmlspecialchars($row['created_at']) ?></td>

                                                <td class="text-nowrap">


                                                    <form method="POST" style="display:inline"
                                                        onsubmit="return confirm('Approve this user?');">
                                                        <input type="hidden" name="id" value="<?= $row['id'] ?>">
                                                        <button type="submit" name="action" value="approve"
                                                            class="btn btn-sm btn-success action-btn">Approve</button>
                                                    </form>

                                                    <form method="POST" style="display:inline"
                                                        onsubmit="return confirm('Reject this user?');">
                                                        <input type="hidden" name="id" value="<?= $row['id'] ?>">
                                                        <button type="submit" name="action" value="reject"
                                                            class="btn btn-sm btn-danger">Reject</button>
                                                    </form>
                                                </td>
                                            </tr>
                                        <?php endwhile; ?>
                                    </tbody>
                                </table>
                            </div>
                        <?php endif; ?>
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
<?php
$q->close();
$conn->close();
?>