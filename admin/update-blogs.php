<!DOCTYPE html>

<html lang="en" class="light-style layout-menu-fixed" dir="ltr" data-theme="theme-default" data-assets-path="assets/"
    data-template="vertical-menu-template-free">
<?php include 'common/head.php'; ?>
<?php include 'common/session.php'; ?>

<body>

    <?php
    ini_set('display_errors', 1);
    error_reporting(E_ALL);
    include 'common/config.php';

    if (isset($_GET['id'])) {
        $blog_id = intval($_GET['id']);

        // Fetch existing blog data
        $sql = "SELECT * FROM blogs WHERE id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $blog_id);
        $stmt->execute();
        $result = $stmt->get_result();
        $blog = $result->fetch_assoc();

        if (!$blog) {
            die("Blog not found!");
        }
    } else {
        die("Invalid Blog ID");
    }

    // Handle form submit
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        $uploadDir = 'uploads/blogs/';

        function uploadImage($inputName, $oldFile = '')
        {
            global $uploadDir;

            if (isset($_FILES[$inputName]) && $_FILES[$inputName]['error'] === UPLOAD_ERR_OK) {
                $tmpName = $_FILES[$inputName]['tmp_name'];
                $fileName = time() . '_' . preg_replace('/[^a-zA-Z0-9-_\.]/', '', $_FILES[$inputName]['name']);
                $targetPath = $uploadDir . $fileName;

                if (move_uploaded_file($tmpName, $targetPath)) {
                    if (!empty($oldFile) && file_exists($uploadDir . $oldFile)) {
                        unlink($uploadDir . $oldFile);
                    }
                    return $fileName;
                }
            }
            return $oldFile;
        }

        // Sanitize Fields
        $google_tag = $conn->real_escape_string($_POST['google_tag']);
        $json_tag = $conn->real_escape_string($_POST['json_tag']);
        $page_title = $conn->real_escape_string($_POST['page_title']);
        $slug = $conn->real_escape_string($_POST['slug']);
        $meta_title = $conn->real_escape_string($_POST['meta_title']);
        $meta_description = $conn->real_escape_string($_POST['meta_description']);
        $meta_keywords = $conn->real_escape_string($_POST['meta_keywords']);
        $canonical_url = $conn->real_escape_string($_POST['canonical_url']);
        $og_title = $conn->real_escape_string($_POST['og_title']);
        $og_description = $conn->real_escape_string($_POST['og_description']);
        $og_alt = $conn->real_escape_string($_POST['og_alt']);
        $cover_title = $conn->real_escape_string($_POST['cover_title']);
        $cover_desc = $conn->real_escape_string($_POST['cover_desc']);
        $cover_alt = $conn->real_escape_string($_POST['cover_alt']);
        $banner_alt = $conn->real_escape_string($_POST['banner_alt']);
        $content_title = $conn->real_escape_string($_POST['content_title']);
        $long_content = $_POST['long_content'];

        // Twitter Card
        $twitter_title = $conn->real_escape_string($_POST['twitter_title']);
        $twitter_description = $conn->real_escape_string($_POST['twitter_description']);
        $twitter_alt = $conn->real_escape_string($_POST['twitter_alt']);

        // Handle Images
        $og_image = uploadImage('og_image', $blog['og_image']);
        $cover_image = uploadImage('cover_image', $blog['cover_image']);
        $banner = uploadImage('banner', $blog['banner']);
        $twitter_image = uploadImage('twitter_image', $blog['twitter_image']);

        // Update Query
        $sql = "UPDATE blogs SET 
        google_tag = ?, json_tag = ?, page_title = ?, slug = ?, meta_title = ?, meta_description = ?, meta_keywords = ?, canonical_url = ?,
        og_title = ?, og_description = ?, og_image = ?, og_alt = ?, 
        twitter_title = ?, twitter_description = ?, twitter_image = ?, twitter_alt = ?, 
        cover_title = ?, cover_desc = ?, cover_image = ?, cover_alt = ?, 
        banner = ?, banner_alt = ?, content_title = ?, long_content = ?
    WHERE id = ?";

        $stmt = $conn->prepare($sql);
        $stmt->bind_param(
            "ssssssssssssssssssssssssi",
            $google_tag,
            $json_tag,
            $page_title,
            $slug,
            $meta_title,
            $meta_description,
            $meta_keywords,
            $canonical_url,
            $og_title,
            $og_description,
            $og_image,
            $og_alt,
            $twitter_title,
            $twitter_description,
            $twitter_image,
            $twitter_alt,
            $cover_title,
            $cover_desc,
            $cover_image,
            $cover_alt,
            $banner,
            $banner_alt,
            $content_title,
            $long_content,
            $blog_id
        );

        if ($stmt->execute()) {
            echo "<script>alert('Blog updated successfully!');window.location.href='index.php';</script>";
        } else {
            echo "<div class='alert alert-danger'>Error updating blog: " . $conn->error . "</div>";
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
                                <form method="POST" enctype="multipart/form-data">
                                    <div class="row">

                                        <!-- Page Title -->
                                        <div class="col-md-6 mb-3">
                                            <label class="form-label">Page Title</label>
                                            <input type="text" class="form-control" name="page_title"
                                                value="<?= htmlspecialchars($blog['page_title']) ?>" required>
                                        </div>

                                        <!-- Slug -->
                                        <div class="col-md-6 mb-3">
                                            <label class="form-label">Slug (URL)</label>
                                            <input type="text" class="form-control" name="slug"
                                                value="<?= htmlspecialchars($blog['slug']) ?>" required>
                                        </div>

                                        <!-- Cover Title -->
                                        <div class="col-md-6 mb-3">
                                            <label class="form-label">Cover Title</label>
                                            <input type="text" class="form-control" name="cover_title"
                                                value="<?= htmlspecialchars($blog['cover_title']) ?>" required>
                                        </div>

                                        <!-- Cover Description -->
                                        <div class="col-md-6 mb-3">
                                            <label class="form-label">Cover Description</label>
                                            <input type="text" class="form-control" name="cover_desc"
                                                value="<?= htmlspecialchars($blog['cover_desc']) ?>" required>
                                        </div>

                                        <!-- Cover Image -->
                                        <div class="col-md-6 mb-3">
                                            <label class="form-label">Cover Image (Leave blank to keep old)</label>
                                            <input type="file" class="form-control" name="cover_image">
                                            <?php if (!empty($blog['cover_image'])): ?>
                                                <p class="mt-2">Current: <img
                                                        src="uploads/blogs/<?= $blog['cover_image'] ?>" width="100">
                                                </p>
                                            <?php endif; ?>
                                        </div>

                                        <!-- Cover Alt -->
                                        <div class="col-md-6 mb-3">
                                            <label class="form-label">Cover Image Alt Text</label>
                                            <input type="text" class="form-control" name="cover_alt"
                                                value="<?= htmlspecialchars($blog['cover_alt']) ?>" required>
                                        </div>

                                        <!-- Main Banner -->
                                        <div class="col-md-6 mb-3">
                                            <label class="form-label">Main Banner Image</label>
                                            <input type="file" class="form-control" name="banner">
                                            <?php if (!empty($blog['banner'])): ?>
                                                <p class="mt-2">Current: <img
                                                        src="uploads/blogs/<?= $blog['banner'] ?>" width="100"></p>
                                            <?php endif; ?>
                                        </div>

                                        <!-- Banner Alt -->
                                        <div class="col-md-6 mb-3">
                                            <label class="form-label">Banner Alt Text</label>
                                            <input type="text" class="form-control" name="banner_alt"
                                                value="<?= htmlspecialchars($blog['banner_alt']) ?>" required>
                                        </div>

                                        <!-- OG Title -->
                                        <div class="col-md-6 mb-3">
                                            <label class="form-label">OG Title</label>
                                            <input type="text" class="form-control" name="og_title"
                                                value="<?= htmlspecialchars($blog['og_title']) ?>">
                                        </div>

                                        <!-- OG Description -->
                                        <div class="col-md-6 mb-3">
                                            <label class="form-label">OG Description</label>
                                            <textarea class="form-control" name="og_description"
                                                rows="2"><?= htmlspecialchars($blog['og_description']) ?></textarea>
                                        </div>

                                        <!-- OG Image -->
                                        <div class="col-md-6 mb-3">
                                            <label class="form-label">OG Image</label>
                                            <input type="file" class="form-control" name="og_image">
                                            <?php if (!empty($blog['og_image'])): ?>
                                                <p class="mt-2">Current: <img src="uploads/blogs/<?= $blog['og_image'] ?>"
                                                        width="100"></p>
                                            <?php endif; ?>
                                        </div>

                                        <!-- OG Alt -->
                                        <div class="col-md-6 mb-3">
                                            <label class="form-label">OG Image Alt Text</label>
                                            <input type="text" class="form-control" name="og_alt"
                                                value="<?= htmlspecialchars($blog['og_alt']) ?>">
                                        </div>

                                        <!-- Twitter Card Fields -->
                                        <div class="col-md-6 mb-3">
                                            <label class="form-label">Twitter Title</label>
                                            <input type="text" class="form-control" name="twitter_title"
                                                value="<?= htmlspecialchars($blog['twitter_title']) ?>">
                                        </div>

                                        <div class="col-md-6 mb-3">
                                            <label class="form-label">Twitter Description</label>
                                            <textarea class="form-control" name="twitter_description"
                                                rows="2"><?= htmlspecialchars($blog['twitter_description']) ?></textarea>
                                        </div>

                                        <div class="col-md-6 mb-3">
                                            <label class="form-label">Twitter Image</label>
                                            <input type="file" class="form-control" name="twitter_image">
                                            <?php if (!empty($blog['twitter_image'])): ?>
                                                <p class="mt-2">Current: <img
                                                        src="uploads/blogs/<?= $blog['twitter_image'] ?>" width="100"></p>
                                            <?php endif; ?>
                                        </div>

                                        <div class="col-md-6 mb-3">
                                            <label class="form-label">Twitter Image Alt</label>
                                            <input type="text" class="form-control" name="twitter_alt"
                                                value="<?= htmlspecialchars($blog['twitter_alt']) ?>">
                                        </div>

                                        <!-- Meta Fields -->
                                        <div class="col-md-6 mb-3">
                                            <label class="form-label">Meta Title</label>
                                            <input type="text" class="form-control" name="meta_title"
                                                value="<?= htmlspecialchars($blog['meta_title']) ?>">
                                        </div>

                                        <div class="col-md-6 mb-3">
                                            <label class="form-label">Meta Description</label>
                                            <textarea class="form-control" name="meta_description"
                                                rows="2"><?= htmlspecialchars($blog['meta_description']) ?></textarea>
                                        </div>

                                        <div class="col-md-6 mb-3">
                                            <label class="form-label">Meta Keywords</label>
                                            <input type="text" class="form-control" name="meta_keywords"
                                                value="<?= htmlspecialchars($blog['meta_keywords']) ?>">
                                        </div>

                                        <div class="col-md-6 mb-3">
                                            <label class="form-label">Canonical URL</label>
                                            <input type="text" class="form-control" name="canonical_url"
                                                value="<?= htmlspecialchars($blog['canonical_url']) ?>">
                                        </div>

                                        <!-- Google Tag -->
                                        <div class="col-md-12 mb-3">
                                            <label class="form-label">Google Tag (Script)</label>
                                            <textarea class="form-control" name="google_tag"
                                                rows="3"><?= htmlspecialchars($blog['google_tag']) ?></textarea>
                                        </div>

                                        <!-- JSON Tag -->
                                        <div class="col-md-12 mb-3">
                                            <label class="form-label">JSON Tag (Script)</label>
                                            <textarea class="form-control" name="json_tag"
                                                rows="3"><?= htmlspecialchars($blog['json_tag']) ?></textarea>
                                        </div>

                                        <!-- First Content Title -->
                                        <div class="col-md-12 mb-3">
                                            <label class="form-label">First Content Title</label>
                                            <input type="text" class="form-control" name="content_title"
                                                value="<?= htmlspecialchars($blog['content_title']) ?>">
                                        </div>

                                        <!-- Long Content -->
                                        <div class="col-md-12 mb-3">
                                            <label class="form-label">Detailed Content</label>
                                            <textarea class="form-control" name="long_content" id="content"
                                                rows="10"><?= htmlspecialchars($blog['long_content']) ?></textarea>
                                        </div>

                                    </div>

                                    <button type="submit" class="btn btn-primary">Update Blog</button>
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
<script src="https://cdn.ckeditor.com/4.22.1/standard/ckeditor.js"></script>
<script>
    const editorConfig = {
        allowedContent: true,
        extraPlugins: 'sourcearea',
        height: 500,
        removePlugins: 'stylesheetparser',
    };
    CKEDITOR.replace('content');
</script>

</html>