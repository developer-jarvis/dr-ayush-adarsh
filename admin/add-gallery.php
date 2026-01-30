<!DOCTYPE html>

<html lang="en" class="light-style layout-menu-fixed" dir="ltr" data-theme="theme-default" data-assets-path="assets/"
    data-template="vertical-menu-template-free">
<?php include 'common/head.php'; ?>
<?php include 'common/session.php'; ?>

<body>
    <?php
    include 'common/config.php';

    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        // Image Handling
        $imageName = $_FILES['image']['name'];
        $imageTmp = $_FILES['image']['tmp_name'];
        $imagePath = "uploads/gallery/" . time() . '_' . basename($imageName); // Safe file name
    
        // Form data
        $title = $conn->real_escape_string($_POST['title']);
        $description = $conn->real_escape_string($_POST['description']);
        $category = $conn->real_escape_string($_POST['category']);

        // Upload Image
        if (move_uploaded_file($imageTmp, $imagePath)) {

            // Insert into database
            $stmt = $conn->prepare("INSERT INTO gallery (image, title, description, category) VALUES (?, ?, ?, ?)");
            $stmt->bind_param("ssss", $imagePath, $title, $description, $category);
            $stmt->execute();

            if ($stmt->affected_rows > 0) {
                echo "<script>alert('Gallery item added successfully!');window.location.href='gallery.php';</script>";
            } else {
                echo "<div class='alert alert-danger'>Something went wrong while saving to the database.</div>";
            }

        } else {
            echo "<div class='alert alert-danger'>Image upload failed.</div>";
        }
    }
    ?>


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
                                <form action="" method="POST" enctype="multipart/form-data">
                                    <div class="mb-3">
                                        <label for="image" class="form-label">Gallery Image</label>
                                        <input type="file" name="image" id="image" class="form-control" accept="image/*" required>
                                    </div>

                                    <!-- <div class="mb-3">
                                        <label for="title" class="form-label">Title</label>
                                        <input type="text" name="title" id="title" class="form-control"
                                            placeholder="Enter image title" >
                                    </div>

                                    <div class="mb-3">
                                        <label for="description" class="form-label">Description</label>
                                        <textarea name="description" id="description" class="form-control" rows="3"
                                            placeholder="Enter image description" ></textarea>
                                    </div> -->

                                    <div class="mb-3">
                                        <label for="category" class="form-label">Category</label>
                                        <select name="category" id="category" class="form-control" required>
                                            <option value="">Select Category</option>
                                            <option value="Acne Treatment">Acne Treatment</option>
                                            <option value="Hair Transplant">Hair Transplant</option>
                                            <option value="Laser Treatment">Laser Treatment</option>
                                            <option value="Chemical Peel">Chemical Peel</option>
                                            <option value="PRP Therapy">PRP Therapy</option>
                                            <option value="Microdermabrasion">Microdermabrasion</option>
                                            <option value="Pigmentation">Pigmentation</option>
                                            <option value="Wrinkles">Wrinkles</option>
                                            <option value="Hair Loss">Hair Loss</option>
                                            <option value="Wart Removal">Wart Removal</option>
                                            <option value="Vitiligo">Vitiligo</option>
                                            <option value="Hair Removal">Hair Removal</option>
                                            <option value="Skin Glow">Skin Glow</option>
                                            <option value="Hair Density">Hair Density</option>
                                            <option value="Doctor">Doctor</option>
                                            <option value="Other">Other</option>
                                        </select>
                                    </div>

                                    <button type="submit" class="btn btn-success">Add Gallery Item</button>
                                    <a href="gallery.php" class="btn btn-secondary">Cancel</a>
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