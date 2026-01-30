<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);
include 'common/config.php';

?>

<!DOCTYPE html>
<html lang="en" class="light-style layout-menu-fixed" dir="ltr" data-theme="theme-default" data-assets-path="assets/"
    data-template="vertical-menu-template-free">
<?php include 'common/head.php'; ?>
<?php include 'common/session.php'; ?>

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
                        <!-- Welcome Section -->
                        <div class="row mb-4">
                            <div class="col-12">
                                <div class="card" style="background: linear-gradient(135deg, #e91e63 0%, #d81b60 100%); border: none;">
                                    <div class="card-body text-white">
                                        <div class="row align-items-center">
                                            <div class="col-md-8">
                                                <h2 class="mb-2 text-white" style="font-weight: 700;">Welcome to Admin Dashboard</h2>
                                                <p class="mb-0" style="opacity: 0.9;">Manage your clinic's content, gallery, and about sections from here.</p>
                                            </div>
                                            <div class="col-md-4 text-end">
                                                <i class="bx bx-user-circle" style="font-size: 80px; opacity: 0.3;"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Statistics Cards -->
                        <div class="row mb-4">
                            <?php
                            // Get statistics
                            $gallery_count = $conn->query("SELECT COUNT(*) as count FROM gallery")->fetch_assoc()['count'] ?? 0;
                            $about_count = $conn->query("SELECT COUNT(*) as count FROM about_sections")->fetch_assoc()['count'] ?? 0;
                            ?>
                            
                            <div class="col-lg-3 col-md-6 mb-4">
                                <div class="card h-100" style="border-left: 4px solid #e91e63;">
                                    <div class="card-body">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div>
                                                <h3 class="mb-1" style="color: #e91e63; font-weight: 700;"><?= $gallery_count ?></h3>
                                                <p class="mb-0 text-muted">Gallery Items</p>
                                            </div>
                                            <div class="avatar">
                                                <span class="avatar-initial rounded bg-label-primary">
                                                    <i class="bx bx-image fs-4"></i>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-3 col-md-6 mb-4">
                                <div class="card h-100" style="border-left: 4px solid #2196f3;">
                                    <div class="card-body">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div>
                                                <h3 class="mb-1" style="color: #2196f3; font-weight: 700;"><?= $about_count ?></h3>
                                                <p class="mb-0 text-muted">About Sections</p>
                                            </div>
                                            <div class="avatar">
                                                <span class="avatar-initial rounded bg-label-info">
                                                    <i class="bx bx-user-circle fs-4"></i>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-3 col-md-6 mb-4">
                                <div class="card h-100" style="border-left: 4px solid #4caf50;">
                                    <div class="card-body">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div>
                                                <h3 class="mb-1" style="color: #4caf50; font-weight: 700;">Active</h3>
                                                <p class="mb-0 text-muted">Website Status</p>
                                            </div>
                                            <div class="avatar">
                                                <span class="avatar-initial rounded bg-label-success">
                                                    <i class="bx bx-check-circle fs-4"></i>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-3 col-md-6 mb-4">
                                <div class="card h-100" style="border-left: 4px solid #ff9800;">
                                    <div class="card-body">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div>
                                                <h3 class="mb-1" style="color: #ff9800; font-weight: 700;"><?= date('M Y') ?></h3>
                                                <p class="mb-0 text-muted">Current Month</p>
                                            </div>
                                            <div class="avatar">
                                                <span class="avatar-initial rounded bg-label-warning">
                                                    <i class="bx bx-calendar fs-4"></i>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Quick Actions -->
                        <div class="row mb-4">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-header d-flex justify-content-between align-items-center">
                                        <h5 class="mb-0">Quick Actions</h5>
                                        <small class="text-muted">Manage your content</small>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-lg-3 col-md-6 mb-3">
                                                <a href="add-gallery.php" class="btn btn-outline-primary w-100 h-100 d-flex flex-column align-items-center justify-content-center" style="min-height: 120px; text-decoration: none;">
                                                    <i class="bx bx-plus-circle mb-2" style="font-size: 32px;"></i>
                                                    <span>Add Gallery Item</span>
                                                </a>
                                            </div>
                                            <div class="col-lg-3 col-md-6 mb-3">
                                                <a href="gallery.php" class="btn btn-outline-success w-100 h-100 d-flex flex-column align-items-center justify-content-center" style="min-height: 120px; text-decoration: none;">
                                                    <i class="bx bx-image mb-2" style="font-size: 32px;"></i>
                                                    <span>Manage Gallery</span>
                                                </a>
                                            </div>
                                            <div class="col-lg-3 col-md-6 mb-3">
                                                <a href="add-about-section.php" class="btn btn-outline-info w-100 h-100 d-flex flex-column align-items-center justify-content-center" style="min-height: 120px; text-decoration: none;">
                                                    <i class="bx bx-user-plus mb-2" style="font-size: 32px;"></i>
                                                    <span>Add About Section</span>
                                                </a>
                                            </div>
                                            <div class="col-lg-3 col-md-6 mb-3">
                                                <a href="about-sections.php" class="btn btn-outline-warning w-100 h-100 d-flex flex-column align-items-center justify-content-center" style="min-height: 120px; text-decoration: none;">
                                                    <i class="bx bx-user-circle mb-2" style="font-size: 32px;"></i>
                                                    <span>Manage About</span>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Recent Activity -->
                        <div class="row">
                            <div class="col-lg-8 mb-4">
                                <div class="card">
                                    <div class="card-header d-flex justify-content-between align-items-center">
                                        <h5 class="mb-0">Recent Gallery Items</h5>
                                        <a href="gallery.php" class="btn btn-sm btn-outline-primary">View All</a>
                                    </div>
                                    <div class="card-body">
                                        <?php
                                        $recent_gallery = $conn->query("SELECT * FROM gallery ORDER BY id DESC LIMIT 5");
                                        if ($recent_gallery && $recent_gallery->num_rows > 0) {
                                            while ($item = $recent_gallery->fetch_assoc()) {
                                                echo '
                                                <div class="d-flex align-items-center mb-3 pb-3 border-bottom">
                                                    <div class="avatar me-3">
                                                        <img src="' . $item['image'] . '" alt="' . htmlspecialchars($item['title']) . '" class="rounded" style="width: 50px; height: 50px; object-fit: cover;">
                                                    </div>
                                                    <div class="flex-grow-1">
                                                        <h6 class="mb-1">' . htmlspecialchars($item['title']) . '</h6>
                                                        <small class="text-muted">' . htmlspecialchars($item['category']) . '</small>
                                                    </div>
                                                    <div>
                                                        <a href="edit-gallery.php?id=' . $item['id'] . '" class="btn btn-sm btn-outline-primary">Edit</a>
                                                    </div>
                                                </div>';
                                            }
                                        } else {
                                            echo '<p class="text-muted text-center py-4">No gallery items found. <a href="add-gallery.php">Add your first item</a></p>';
                                        }
                                        ?>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-4 mb-4">
                                <div class="card">
                                    <div class="card-header">
                                        <h5 class="mb-0">System Info</h5>
                                    </div>
                                    <div class="card-body">
                                        <div class="mb-3">
                                            <small class="text-muted">Server Time</small>
                                            <div class="fw-semibold"><?= date('Y-m-d H:i:s') ?></div>
                                        </div>
                                        <div class="mb-3">
                                            <small class="text-muted">PHP Version</small>
                                            <div class="fw-semibold"><?= phpversion() ?></div>
                                        </div>
                                        <div class="mb-3">
                                            <small class="text-muted">Database</small>
                                            <div class="fw-semibold">MySQL Connected</div>
                                        </div>
                                        <div class="mb-0">
                                            <small class="text-muted">Admin Panel</small>
                                            <div class="fw-semibold text-success">Active</div>
                                        </div>
                                    </div>
                                </div>

                                <div class="card mt-4">
                                    <div class="card-header">
                                        <h5 class="mb-0">Quick Links</h5>
                                    </div>
                                    <div class="card-body">
                                        <div class="list-group list-group-flush">
                                            <a href="../index.php" target="_blank" class="list-group-item list-group-item-action d-flex align-items-center">
                                                <i class="bx bx-globe me-2"></i>
                                                View Website
                                            </a>
                                            <a href="../gallery.php" target="_blank" class="list-group-item list-group-item-action d-flex align-items-center">
                                                <i class="bx bx-image me-2"></i>
                                                View Gallery
                                            </a>
                                            <a href="../about.php" target="_blank" class="list-group-item list-group-item-action d-flex align-items-center">
                                                <i class="bx bx-info-circle me-2"></i>
                                                View About Page
                                            </a>
                                            <a href="setup-tables.php" class="list-group-item list-group-item-action d-flex align-items-center">
                                                <i class="bx bx-cog me-2"></i>
                                                Database Setup
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="content-backdrop fade"></div>
                </div>
            </div>
        </div>

        <!-- Overlay -->
        <div class="layout-overlay layout-menu-toggle"></div>
    </div>
    <!-- / Layout wrapper -->
    <?php include 'common/footer.php'; ?>
</body>

</html>