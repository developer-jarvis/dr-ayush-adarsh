<?php
include 'common/config.php';

// Handle Delete Request
if (isset($_GET['delete_id'])) {
    $delete_id = intval($_GET['delete_id']);
    $stmt = $conn->prepare("DELETE FROM faqs WHERE id = ?");
    $stmt->bind_param("i", $delete_id);
    $stmt->execute();

    if ($stmt->affected_rows > 0) {
        echo "<script>alert('FAQ deleted successfully!'); window.location.href='faq.php';</script>";
    } else {
        echo "<div class='alert alert-danger'>Failed to delete FAQ.</div>";
    }
}
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
                        <div class="row">
                            <div class="py-2">
                                <div class="row justify-content-end">
                                    <div class="col-md-3 text-end">
                                        <a href="add-faq.php" class="btn btn-primary">Add New FAQ</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-lg-12 order-2 order-md-3 order-lg-2 mb-4">
                                <div class="card shadow">
                                    <div class="card-body">
                                        <h5 class="card-title mb-3">blogs List</h5>
                                        <div class="table-responsive">
                                            <table class="table table-bordered table-striped text-center">
                                                <thead class="table-dark">
                                                    <tr>
                                                        <th>#</th>
                                                        <th>Question</th>
                                                        <th>Answer</th>
                                                        <th>Actions</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    $i = 1;
                                                    $result = $conn->query("SELECT * FROM faqs ORDER BY id DESC");

                                                    if ($result->num_rows > 0) {
                                                        while ($row = $result->fetch_assoc()) {
                                                            echo '<tr>';
                                                            echo '<td>' . $i++ . '</td>';
                                                            echo '<td>' . htmlspecialchars($row['question']) . '</td>';
                                                            echo '<td>' . htmlspecialchars($row['answer']) . '</td>';
                                                            echo '<td>
                    <a href="faq-update.php?id=' . $row['id'] . '" class="btn btn-sm btn-warning me-2">Edit</a>
                    <a href="?delete_id=' . $row['id'] . '" class="btn btn-sm btn-danger" onclick="return confirm(\'Are you sure you want to delete this FAQ?\')">Delete</a>
                </td>';
                                                            echo '</tr>';
                                                        }
                                                    } else {
                                                        echo '<tr><td colspan="4">No FAQs found.</td></tr>';
                                                    }
                                                    ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
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