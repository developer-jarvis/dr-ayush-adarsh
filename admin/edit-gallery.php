<?php
include 'common/config.php';

// Get gallery item
if (!isset($_GET['id'])) {
    header("Location: gallery.php");
    exit();
}

$id = intval($_GET['id']);
$result = $conn->query("SELECT * FROM gallery WHERE id = $id");
if ($result->num_rows == 0) {
    header("Location: gallery.php");
    exit();
}
$gallery_item = $result->fetch_assoc();

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $conn->real_escape_string($_POST['title']);
    $description = $conn->real_escape_string($_POST['description']);
    $category = $conn->real_escape_string($_POST['category']);
    
    // Check if new image is uploaded
    if (!empty($_FILES['image']['name'])) {
        $imageName = $_FILES['image']['name'];
        $imageTmp = $_FILES['image']['tmp_name'];
        $imagePath = "uploads/gallery/" . time() . '_' . basename($imageName);
        
        if (move_uploaded_file($imageTmp, $imagePath)) {
            // Delete old image
            if (file_exists($gallery_item['image'])) {
                unlink($gallery_item['image']);
            }
            
            // Update with new image
            $stmt = $conn->prepare("UPDATE gallery SET image = ?, title = ?, description = ?, category = ? WHERE id = ?");
            $stmt->bind_param("ssssi", $imagePath, $title, $description, $category, $id);
        } else {
            echo "<div class='alert alert-danger'>Image upload failed.</div>";
        }
    } else {
        // Update without changing image
        $stmt = $conn->prepare("UPDATE gallery SET title = ?, description = ?, category = ? WHERE id = ?");
        $stmt->bind_param("sssi", $title, $description, $category, $id);
    }
    
    if (isset($stmt) && $stmt->execute()) {
        echo "<script>alert('Gallery item updated successfully!');window.location.href='gallery.php';</script>";
    } else {
        echo "<div class='alert alert-danger'>Something went wrong while updating.</div>";
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
                                <h4 class="mb-4">Edit Gallery Item</h4>
                                
                                <form action="" method="POST" enctype="multipart/form-data">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="image" class="form-label">Gallery Image (Leave empty to keep current)</label>
                                                <input type="file" name="image" id="image" class="form-control" accept="image/*">
                                            </div>

                                            <!-- <div class="mb-3">
                                                <label for="title" class="form-label">Title</label>
                                                <input type="text" name="title" id="title" class="form-control"
                                                    value="<?= htmlspecialchars($gallery_item['title']) ?>" required>
                                            </div>

                                            <div class="mb-3">
                                                <label for="description" class="form-label">Description</label>
                                                <textarea name="description" id="description" class="form-control" rows="3" required><?= htmlspecialchars($gallery_item['description']) ?></textarea>
                                            </div> -->

                                            <div class="mb-3">
                                                <label for="category" class="form-label">Category</label>
                                                <select name="category" id="category" class="form-control" required>
                                                    <option value="">Select Category</option>
                                                    <?php
                                                    $categories = ["Acne Treatment", "Hair Transplant", "Laser Treatment", "Chemical Peel", "PRP Therapy", "Microdermabrasion", "Pigmentation", "Wrinkles", "Hair Loss", "Wart Removal", "Vitiligo", "Hair Removal", "Skin Glow", "Hair Density", "Doctor", "Other"];
                                                    foreach ($categories as $cat) {
                                                        $selected = ($gallery_item['category'] == $cat) ? 'selected' : '';
                                                        echo "<option value='$cat' $selected>$cat</option>";
                                                    }
                                                    ?>
                                                </select>
                                            </div>

                                            <button type="submit" class="btn btn-success">Update Gallery Item</button>
                                            <a href="gallery.php" class="btn btn-secondary">Cancel</a>
                                        </div>
                                        
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label">Current Image</label>
                                                <div class="card">
                                                    <img src="<?= $gallery_item['image'] ?>" class="card-img-top" style="height: 300px; object-fit: cover;" alt="Current Image">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
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