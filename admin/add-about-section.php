<?php
include 'common/config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $section_type = $conn->real_escape_string($_POST['section_type']);
    $name = $conn->real_escape_string($_POST['name']);
    $content = $conn->real_escape_string($_POST['content']);
    $ordering = intval($_POST['ordering']);
    
    $imagePath = '';
    
    // Handle image upload
    if (!empty($_FILES['image']['name'])) {
        $imageName = $_FILES['image']['name'];
        $imageTmp = $_FILES['image']['tmp_name'];
        $imagePath = "uploads/about/" . time() . '_' . basename($imageName);
        
        // Create directory if it doesn't exist
        if (!file_exists("uploads/about/")) {
            mkdir("uploads/about/", 0777, true);
        }
        
        if (!move_uploaded_file($imageTmp, $imagePath)) {
            echo "<div class='alert alert-danger'>Image upload failed.</div>";
            $imagePath = '';
        }
    }
    
    // Insert into database
    $stmt = $conn->prepare("INSERT INTO about_sections (section_type, name, image, content, ordering) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssi", $section_type, $name, $imagePath, $content, $ordering);
    
    if ($stmt->execute()) {
        echo "<script>alert('About section added successfully!');window.location.href='about-sections.php';</script>";
    } else {
        echo "<div class='alert alert-danger'>Something went wrong while saving to the database.</div>";
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
                        <div class="row justify-content-center">
                            <div class="col-12 col-lg-11 order-2 order-md-3 order-lg-2 mb-4">
                                <h4 class="mb-4">Add About Section</h4>
                                
                                <form action="" method="POST" enctype="multipart/form-data">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="section_type" class="form-label">Section Type</label>
                                                <select name="section_type" id="section_type" class="form-control" required>
                                                    <option value="">Select Type</option>
                                                    <option value="doctor">Doctor</option>
                                                    <option value="father">Father</option>
                                                </select>
                                            </div>

                                            <div class="mb-3">
                                                <label for="name" class="form-label">Name</label>
                                                <input type="text" name="name" id="name" class="form-control"
                                                    placeholder="Enter name" required>
                                            </div>

                                            <div class="mb-3">
                                                <label for="image" class="form-label">Image (Optional)</label>
                                                <input type="file" name="image" id="image" class="form-control" accept="image/*">
                                            </div>

                                            <div class="mb-3">
                                                <label for="ordering" class="form-label">Display Order</label>
                                                <input type="number" name="ordering" id="ordering" class="form-control" value="0" min="0">
                                                <small class="text-muted">Lower numbers appear first</small>
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="content" class="form-label">Content</label>
                                                <textarea name="content" id="content" class="form-control" rows="15"
                                                    placeholder="Enter detailed content about the person" required></textarea>
                                            </div>
                                        </div>
                                    </div>

                                    <button type="submit" class="btn btn-success">Add About Section</button>
                                    <a href="about-sections.php" class="btn btn-secondary">Cancel</a>
                                </form>
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