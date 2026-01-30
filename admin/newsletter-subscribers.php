<?php
session_start();
include 'common/config.php';

// Check if admin is logged in - using correct session variables
if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'admin') {
    header('Location: login.php');
    exit;
}

// Handle actions (delete, toggle status)
if (isset($_POST['action'])) {
    $action = $_POST['action'];
    $subscriber_id = (int)$_POST['subscriber_id'];

    if ($action === 'delete') {
        $deleteStmt = $conn->prepare("DELETE FROM newsletter_subscribers WHERE id = ?");
        $deleteStmt->bind_param("i", $subscriber_id);
        if ($deleteStmt->execute()) {
            $success_message = "Subscriber deleted successfully";
        } else {
            $error_message = "Failed to delete subscriber";
        }
    } elseif ($action === 'toggle_status') {
        $toggleStmt = $conn->prepare("UPDATE newsletter_subscribers SET status = CASE WHEN status = 'active' THEN 'inactive' ELSE 'active' END WHERE id = ?");
        $toggleStmt->bind_param("i", $subscriber_id);
        if ($toggleStmt->execute()) {
            $success_message = "Subscriber status updated successfully";
        } else {
            $error_message = "Failed to update subscriber status";
        }
    }
}

// Pagination
$page = max(1, (int)($_GET['page'] ?? 1));
$limit = 20;
$offset = ($page - 1) * $limit;

// Search functionality
$search = $_GET['search'] ?? '';
$searchCondition = '';
$searchParam = '';

if (!empty($search)) {
    $searchCondition = "WHERE email LIKE ?";
    $searchParam = "%$search%";
}

// Count total subscribers
$countQuery = "SELECT COUNT(*) as total FROM newsletter_subscribers $searchCondition";
if (!empty($searchParam)) {
    $countStmt = $conn->prepare($countQuery);
    $countStmt->bind_param("s", $searchParam);
    $countStmt->execute();
    $countResult = $countStmt->get_result();
} else {
    $countResult = $conn->query($countQuery);
}
$totalSubscribers = $countResult->fetch_assoc()['total'];
$totalPages = max(1, ceil($totalSubscribers / $limit));

// Get subscribers
$query = "SELECT * FROM newsletter_subscribers $searchCondition ORDER BY subscribed_at DESC LIMIT ? OFFSET ?";
if (!empty($searchParam)) {
    $stmt = $conn->prepare($query);
    $stmt->bind_param("sii", $searchParam, $limit, $offset);
} else {
    $stmt = $conn->prepare($query);
    $stmt->bind_param("ii", $limit, $offset);
}
$stmt->execute();
$subscribers = $stmt->get_result();

// Get statistics
$statsQuery = "SELECT 
    COUNT(*) as total,
    SUM(CASE WHEN status = 'active' THEN 1 ELSE 0 END) as active,
    SUM(CASE WHEN status = 'inactive' THEN 1 ELSE 0 END) as inactive,
    SUM(CASE WHEN DATE(subscribed_at) = CURDATE() THEN 1 ELSE 0 END) as today
    FROM newsletter_subscribers";
$statsResult = $conn->query($statsQuery);
$stats = $statsResult->fetch_assoc();
?>



<!-- =================================================================== -->
<!DOCTYPE html>

<html lang="en" class="light-style layout-menu-fixed" dir="ltr" data-theme="theme-default" data-assets-path="assets/"
    data-template="vertical-menu-template-free">
<?php include 'common/head.php'; ?>
<!-- Bootstrap Icons -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">

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
                        <section class="section">
                            <!-- Statistics Cards -->
                            <div class="row mb-4">
                                <div class="col-lg-3 col-md-6">
                                    <div class="card info-card sales-card">
                                        <div class="card-body">
                                            <h5 class="card-title">Total Subscribers</h5>
                                            <div class="d-flex align-items-center">
                                                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                                    <i class="bi bi-people"></i>
                                                </div>
                                                <div class="ps-3">
                                                    <h6><?= number_format($stats['total']); ?></h6>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-3 col-md-6">
                                    <div class="card info-card revenue-card">
                                        <div class="card-body">
                                            <h5 class="card-title">Active Subscribers</h5>
                                            <div class="d-flex align-items-center">
                                                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                                    <i class="bi bi-check-circle"></i>
                                                </div>
                                                <div class="ps-3">
                                                    <h6><?= number_format($stats['active']); ?></h6>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-3 col-md-6">
                                    <div class="card info-card customers-card">
                                        <div class="card-body">
                                            <h5 class="card-title">Inactive Subscribers</h5>
                                            <div class="d-flex align-items-center">
                                                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                                    <i class="bi bi-x-circle"></i>
                                                </div>
                                                <div class="ps-3">
                                                    <h6><?= number_format($stats['inactive']); ?></h6>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-3 col-md-6">
                                    <div class="card info-card">
                                        <div class="card-body">
                                            <h5 class="card-title">Today's Subscriptions</h5>
                                            <div class="d-flex align-items-center">
                                                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                                    <i class="bi bi-calendar-check"></i>
                                                </div>
                                                <div class="ps-3">
                                                    <h6><?= number_format($stats['today']); ?></h6>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Subscribers Table -->
                            <div class="card">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between align-items-center mb-3">
                                        <h5 class="card-title">All Subscribers</h5>

                                        <!-- Search Form -->
                                        <form method="GET" class="d-flex">
                                            <input type="text" name="search" class="form-control me-2"
                                                placeholder="Search by email..." value="<?= htmlspecialchars($search); ?>">
                                            <button type="submit" class="btn btn-primary">
                                               
                                                Search
                                            </button>
                                            <?php if (!empty($search)): ?>
                                                <a href="newsletter-subscribers.php" class="btn btn-secondary ms-2">
                                                    <i class="bi bi-x"></i>
                                                </a>
                                            <?php endif; ?>
                                        </form>
                                    </div>

                                    <?php if (isset($success_message)): ?>
                                        <div class="alert alert-success alert-dismissible fade show">
                                            <?= $success_message; ?>
                                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                                        </div>
                                    <?php endif; ?>

                                    <?php if (isset($error_message)): ?>
                                        <div class="alert alert-danger alert-dismissible fade show">
                                            <?= $error_message; ?>
                                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                                        </div>
                                    <?php endif; ?>

                                    <div class="table-responsive">
                                        <table class="table table-striped">
                                            <thead>
                                                <tr>
                                                    <th>ID</th>
                                                    <th>Email</th>
                                                    <th>Status</th>
                                                    <th>Subscribed Date</th>
                                                    <th>IP Address</th>
                                                    <th>Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php if ($subscribers->num_rows > 0): ?>
                                                    <?php while ($subscriber = $subscribers->fetch_assoc()): ?>
                                                        <tr>
                                                            <td><?= $subscriber['id']; ?></td>
                                                            <td><?= htmlspecialchars($subscriber['email']); ?></td>
                                                            <td>
                                                                <span class="badge bg-<?= $subscriber['status'] === 'active' ? 'success' : 'secondary'; ?>">
                                                                    <?= ucfirst($subscriber['status']); ?>
                                                                </span>
                                                            </td>
                                                            <td><?= date('M d, Y H:i', strtotime($subscriber['subscribed_at'])); ?></td>
                                                            <td><?= htmlspecialchars($subscriber['ip_address']); ?></td>
                                                            <td>
                                                                <div class="btn-group" role="group">
                                                                    <!-- Toggle Status -->
                                                                    <form method="POST" style="display: inline;">
                                                                        <input type="hidden" name="action" value="toggle_status">
                                                                        <input type="hidden" name="subscriber_id" value="<?= $subscriber['id']; ?>">
                                                                        <button type="submit" class="btn btn-sm <?= $subscriber['status'] === 'active' ? 'btn-success' : 'btn-secondary'; ?>"
                                                                            title="Toggle Status">
                                                                            <i class="bi bi-toggle-<?= $subscriber['status'] === 'active' ? 'on' : 'off'; ?>"></i>
                                                                            <?= $subscriber['status'] === 'active' ? ' Active' : ' Inactive'; ?>
                                                                        </button>
                                                                    </form>

                                                                    <!-- Delete -->
                                                                    <form method="POST" style="display: inline;"
                                                                        onsubmit="return confirm('Are you sure you want to delete this subscriber?')">
                                                                        <input type="hidden" name="action" value="delete">
                                                                        <input type="hidden" name="subscriber_id" value="<?= $subscriber['id']; ?>">
                                                                        <button type="submit" class="btn btn-sm btn-danger ms-1"
                                                                            title="Delete Subscriber">
                                                                            <i class="bi bi-trash"></i> Delete
                                                                        </button>
                                                                    </form>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    <?php endwhile; ?>
                                                <?php else: ?>
                                                    <tr>
                                                        <td colspan="6" class="text-center py-4">
                                                            <i class="bi bi-inbox display-4 text-muted"></i>
                                                            <p class="mt-2 text-muted">
                                                                <?= !empty($search) ? 'No subscribers found matching your search.' : 'No newsletter subscribers yet.'; ?>
                                                            </p>
                                                        </td>
                                                    </tr>
                                                <?php endif; ?>
                                            </tbody>
                                        </table>
                                    </div>

                                    <!-- Pagination -->
                                    <?php if ($totalPages > 1): ?>
                                        <nav aria-label="Subscribers pagination" class="mt-4">
                                            <ul class="pagination justify-content-center">
                                                <?php
                                                $prevPage = max(1, $page - 1);
                                                $nextPage = min($totalPages, $page + 1);
                                                $baseUrl = "newsletter-subscribers.php?";
                                                if (!empty($search)) {
                                                    $baseUrl .= "search=" . urlencode($search) . "&";
                                                }
                                                $baseUrl .= "page=";
                                                ?>

                                                <?php if ($page > 1): ?>
                                                    <li class="page-item">
                                                        <a class="page-link" href="<?= $baseUrl . $prevPage; ?>">Previous</a>
                                                    </li>
                                                <?php endif; ?>

                                                <?php
                                                $startPage = max(1, $page - 2);
                                                $endPage = min($totalPages, $page + 2);

                                                for ($i = $startPage; $i <= $endPage; $i++):
                                                ?>
                                                    <li class="page-item <?= $i == $page ? 'active' : ''; ?>">
                                                        <a class="page-link" href="<?= $baseUrl . $i; ?>"><?= $i; ?></a>
                                                    </li>
                                                <?php endfor; ?>

                                                <?php if ($page < $totalPages): ?>
                                                    <li class="page-item">
                                                        <a class="page-link" href="<?= $baseUrl . $nextPage; ?>">Next</a>
                                                    </li>
                                                <?php endif; ?>
                                            </ul>
                                        </nav>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </section>
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