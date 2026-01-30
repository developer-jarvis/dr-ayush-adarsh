<?php
session_start();
include '../admin/common/config.php';

if (!isset($_SESSION['user_id']) || ($_SESSION['role'] ?? '') !== 'admin') {
    header('Location: ../login.php');
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id'], $_POST['action'])) {
    $id = (int) $_POST['id'];
    $action = $_POST['action'] === 'approve' ? 'approved' : 'rejected';
    $admin_id = (int) $_SESSION['user_id'];

    if ($action === 'approved') {
        // Set approval + expiry (2 hours)
        $stmt = $conn->prepare("
            UPDATE post_view_requests 
            SET status = ?, acted_by = ?, acted_at = NOW(), 
                approved_at = NOW(), 
                expires_at = DATE_ADD(NOW(), INTERVAL 2 HOUR)
            WHERE id = ?
        ");
    } else {
        // Normal reject
        $stmt = $conn->prepare("
            UPDATE post_view_requests 
            SET status = ?, acted_by = ?, acted_at = NOW()
            WHERE id = ?
        ");
    }

    $stmt->bind_param("sii", $action, $admin_id, $id);
    $stmt->execute();
    $stmt->close();

    $_SESSION['flash'] = "Request has been " . ucfirst($action) . ".";
    header('Location: admin-requests.php');
    exit();
}


// ---- Auto-expire old approvals ----
$conn->query("UPDATE post_view_requests 
              SET status = 'expired' 
              WHERE status = 'approved' 
              AND expires_at IS NOT NULL 
              AND NOW() > expires_at");

// ---- Fetch pending requests ----
$q = $conn->query("
    SELECT 
        r.*, 
        p.child_name, 
        u.name AS requester_name, 
        u.job_type AS requester_job, 
        g.name AS guardian_name, 
        g.job_type AS guardian_job
    FROM post_view_requests r
    JOIN posts p ON r.post_id = p.id
    JOIN register u ON r.requester_id = u.id
    JOIN register g ON p.guardian_id = g.id
    WHERE r.status = 'pending'
    ORDER BY r.requested_at ASC
");
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
                        <h3 class="mb-4 fw-semibold text-primary">Pending View Requests</h3>

                        <?php if (isset($_SESSION['flash'])): ?>
                            <div class="alert alert-success alert-dismissible fade show">
                                <?= htmlspecialchars($_SESSION['flash']);
                                unset($_SESSION['flash']); ?>
                                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                            </div>
                        <?php endif; ?>

                        <div class="table-responsive shadow-sm">
                            <table class="table table-bordered align-middle text-center">
                                <thead class="table-dark">
                                    <tr>
                                        <th>#</th>
                                        <th>Requester Name</th>
                                        <th>Requester Job</th>
                                        <th>Guardian Name (Post Owner)</th>
                                        <th>Guardian Job</th>
                                        <th>Child Name</th>
                                        <th>Requested Date</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $i = 1;
                                    if ($q->num_rows > 0):
                                        while ($row = $q->fetch_assoc()):
                                            ?>
                                            <tr>
                                                <td><?= $i++; ?></td>
                                                <td><?= htmlspecialchars($row['requester_name']); ?></td>
                                                <td><?= htmlspecialchars($row['requester_job']); ?></td>
                                                <td><?= htmlspecialchars($row['guardian_name']); ?></td>
                                                <td><?= htmlspecialchars($row['guardian_job']); ?></td>
                                                <td><?= htmlspecialchars($row['child_name']); ?></td>
                                                <td><?= date('d M Y, h:i A', strtotime($row['requested_at'])); ?></td>
                                                <td>
                                                    <span class="badge bg-warning text-dark text-capitalize">
                                                        <?= htmlspecialchars($row['status']); ?>
                                                    </span>
                                                </td>
                                                <td>
                                                    <form method="POST" class="d-inline">
                                                        <input type="hidden" name="id" value="<?= $row['id']; ?>">
                                                        <input type="hidden" name="action" value="approve">
                                                        <button class="btn btn-success btn-sm" type="submit">
                                                            <i class="bi bi-check-circle"></i> Approve
                                                        </button>
                                                    </form>
                                                    <form method="POST" class="d-inline">
                                                        <input type="hidden" name="id" value="<?= $row['id']; ?>">
                                                        <input type="hidden" name="action" value="reject">
                                                        <button class="btn btn-danger btn-sm" type="submit">
                                                            <i class="bi bi-x-circle"></i> Reject
                                                        </button>
                                                    </form>
                                                </td>
                                            </tr>
                                            <?php
                                        endwhile;
                                    else:
                                        ?>
                                        <tr>
                                            <td colspan="9" class="text-muted py-3">No pending requests found.</td>
                                        </tr>
                                    <?php endif; ?>
                                </tbody>
                            </table>
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
<?php
$q->close();
$conn->close();
?>