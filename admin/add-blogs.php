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

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $uploadDir = 'uploads/blogs/';
        if (!is_dir($uploadDir)) {
            mkdir($uploadDir, 0777, true);
        }

        function uploadImage($fileInputName)
        {
            global $uploadDir;

            if (!isset($_FILES[$fileInputName]) || $_FILES[$fileInputName]['error'] !== UPLOAD_ERR_OK) {
                return '';
            }

            $fileTmpPath = $_FILES[$fileInputName]['tmp_name'];
            $fileName = $_FILES[$fileInputName]['name'];

            $imageInfo = @getimagesize($fileTmpPath);
            if ($imageInfo === false) {
                return '';
            }

            $safeFileName = time() . '_' . preg_replace('/[^a-zA-Z0-9-_\.]/', '', $fileName);
            $targetFile = $uploadDir . $safeFileName;

            if (move_uploaded_file($fileTmpPath, $targetFile)) {
                return $safeFileName;
            }

            return '';
        }

        // SEO Fields
        $google_tag = $conn->real_escape_string($_POST['google_tag']);
        $json_tag = $conn->real_escape_string($_POST['json_tag']);
        $page_title = $conn->real_escape_string($_POST['page_title']);
        $slug = $conn->real_escape_string($_POST['slug']);
        $meta_title = $conn->real_escape_string($_POST['meta_title']);
        $meta_description = $conn->real_escape_string($_POST['meta_description']);
        $meta_keywords = $conn->real_escape_string($_POST['meta_keywords']);
        $canonical_url = $conn->real_escape_string($_POST['canonical_url']);

        // Open Graph (OG) Tags
        $og_title = $conn->real_escape_string($_POST['og_title']);
        $og_description = $conn->real_escape_string($_POST['og_description']);
        $og_image = uploadImage('og_image');
        $og_alt = $conn->real_escape_string($_POST['og_alt']);

        // Twitter Card Tags
        $twitter_title = $conn->real_escape_string($_POST['twitter_title']);
        $twitter_description = $conn->real_escape_string($_POST['twitter_description']);
        $twitter_image = uploadImage('twitter_image');
        $twitter_alt = $conn->real_escape_string($_POST['twitter_alt']);

        // Other Content Sections
        $banner = uploadImage('banner');
        $banner_alt = $conn->real_escape_string($_POST['banner_alt']);

        $cover_image = uploadImage('cover_image');
        $cover_alt = $conn->real_escape_string($_POST['cover_alt']);
        $cover_title = $conn->real_escape_string($_POST['cover_title']);
        $cover_desc = $conn->real_escape_string($_POST['cover_desc']);

        $content_title = $conn->real_escape_string($_POST['content_title']);
        $long_content = $_POST['long_content'];

        $sql = "INSERT INTO blogs (
        google_tag, json_tag, page_title, slug, meta_title, meta_description, meta_keywords, 
        canonical_url, og_title, og_description, og_image, og_alt, 
        twitter_title, twitter_description, twitter_image, twitter_alt, 
        cover_title, cover_desc, cover_image, cover_alt, 
        banner, banner_alt, content_title, long_content
    ) VALUES (
        '$google_tag', '$json_tag', '$page_title', '$slug', '$meta_title', '$meta_description', '$meta_keywords',
        '$canonical_url', '$og_title', '$og_description', '$og_image', '$og_alt',
        '$twitter_title', '$twitter_description', '$twitter_image', '$twitter_alt',
        '$cover_title', '$cover_desc', '$cover_image', '$cover_alt',
        '$banner', '$banner_alt', '$content_title', '$long_content'
    )";

        if ($conn->query($sql) === TRUE) {
            echo "<script>alert('Blog added successfully!'); window.location.href = 'index.php';</script>";
        } else {
            echo "<div class='alert alert-danger text-center'>Error: " . $conn->error . "</div>";
        }

        $conn->close();
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
                                        <label for="google tag" class="form-label">Google Tag <span
                                                class="text-danger">*</span></label>
                                        <textarea name="google_tag" id="google_tag" class="form-control"
                                            placeholder="Google Tag"></textarea>
                                    </div>

                                    <div class="mb-3">
                                        <label for="json_tag" class="form-label">Json Tag <span
                                                class="text-danger">*</span></label>
                                        <textarea name="json_tag" id="json_tag" class="form-control"
                                            placeholder="json_tag"></textarea>
                                    </div>
                                    <div class="mb-3">
                                        <label for="page_title" class="form-label">Page Title <span
                                                class="text-danger">*</span></label>
                                        <input type="text" name="page_title" id="page_title" class="form-control"
                                            placeholder="Enter page name" required>
                                    </div>

                                    <div class="mb-3">
                                        <label for="slug" class="form-label">Custom Slug (URL)</label>
                                        <input type="text" name="slug" id="slug" class="form-control"
                                            placeholder="e.g. about-us" required>
                                        <small class="text-muted">URL will be:
                                            <code>yourdomain.com/slug</code></small>
                                    </div>


                                    <div class="mb-3">
                                        <label for="meta_title" class="form-label">Meta Title</label>
                                        <input type="text" name="meta_title" id="meta_title" class="form-control"
                                            placeholder="Best services in India | TaskBlessings">
                                    </div>

                                    <div class="mb-3">
                                        <label for="meta_description" class="form-label">Meta Description</label>
                                        <textarea name="meta_description" id="meta_description" class="form-control"
                                            rows="3" placeholder="Short page summary for search engines..."></textarea>
                                    </div>

                                    <div class="mb-3">
                                        <label for="meta_keywords" class="form-label">Meta Keywords</label>
                                        <input type="text" name="meta_keywords" id="meta_keywords" class="form-control"
                                            placeholder="seo, services, taskblessings, etc">
                                    </div>

                                    <div class="mb-3">
                                        <label for="canonical_url" class="form-label">Canonical URL
                                            (Optional)</label>
                                        <input type="text" name="canonical_url" id="canonical_url" class="form-control"
                                            placeholder="https://www.yourdomain.com/page-slug">
                                    </div>

                                    <div class="mb-3">
                                        <label for="og_title" class="form-label">OG Title</label>
                                        <input type="text" name="og_title" id="og_title" class="form-control"
                                            placeholder="Open Graph Title for social media">
                                    </div>

                                    <div class="mb-3">
                                        <label for="og_description" class="form-label">OG Description</label>
                                        <textarea name="og_description" id="og_description" class="form-control"
                                            rows="2"
                                            placeholder="Used when shared on Facebook, WhatsApp, etc."></textarea>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6 mb-5">
                                            <label for="og_image" class="form-label">OG Image</label>
                                            <input type="file" name="og_image" id="og_image" class="form-control">
                                            <small class="text-muted">Recommended size: 1200x630 (JPG/PNG)</small>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="alt1" class="form-label">Alt Text for OG Image</label>
                                            <input type="text" name="og_alt" class="form-control"
                                                placeholder="OG Alt Text" required>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="mb-3">
                                        <label for="twitter_title" class="form-label">Twitter Card Title</label>
                                        <input type="text" name="twitter_title" id="twitter_title" class="form-control"
                                            placeholder="Title shown on Twitter share">
                                    </div>

                                    <div class="mb-3">
                                        <label for="twitter_description" class="form-label">Twitter Card
                                            Description</label>
                                        <textarea name="twitter_description" id="twitter_description"
                                            class="form-control" rows="2"
                                            placeholder="Short description for Twitter card"></textarea>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6 mb-5">
                                            <label for="twitter_image" class="form-label">Twitter Card Image</label>
                                            <input type="file" name="twitter_image" id="twitter_image"
                                                class="form-control">
                                            <small class="text-muted">Recommended size: 1200x628 (JPG/PNG)</small>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="twitter_alt" class="form-label">Alt Text for Twitter
                                                Image</label>
                                            <input type="text" name="twitter_alt" id="twitter_alt" class="form-control"
                                                placeholder="Twitter Image Alt Text">
                                        </div>
                                    </div>

                                    <hr>
                                    <div class="card mb-4">
                                        <div class="card-header"> Cover Section</div>
                                        <div class="card-body">
                                            <!-- Title 1 -->
                                            <div class="mb-3">
                                                <label for="cover_title" class="form-label">Cover Title</label>
                                                <input type="text" name="cover_title" id="cover_title"
                                                    class="form-control"
                                                    placeholder="e.g. Book Trusted Home Services Online" required>
                                            </div>

                                            <!-- Title 2 -->
                                            <div class="mb-3">
                                                <label for="cover_desc" class="form-label">Cover Description</label>
                                                <input type="text" name="cover_desc" id="cover_desc"
                                                    class="form-control"
                                                    placeholder="e.g.  Book Trusted Home Services Online" required>
                                            </div>

                                            <!-- Title 3 -->
                                            <div class="row">
                                                <div class="col-6">
                                                    <div class="mb-3">
                                                        <label for="cover_image" class="form-label">Cover
                                                            Image</label>
                                                        <input type="file" name="cover_image" id="cover_section_image"
                                                            class="form-control" required>
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="mb-3">
                                                        <label for="cover_alt" class="form-label">Alt</label>
                                                        <input type="text" name="cover_alt" id="cover_alt"
                                                            class="form-control" required>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="card mb-4">
                                        <div class="card-header"> Banner Carousel Images (Max 3)</div>
                                        <div class="card-body">
                                            <!-- Banner 1 -->
                                            <div class="row mb-3">
                                                <div class="col-md-6">
                                                    <label for="banner" class="form-label">Banner Image </label>
                                                    <input type="file" name="banner" id="banner" class="form-control"
                                                        required>
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="alt1" class="form-label">Alt Text for Image
                                                        1</label>
                                                    <input type="text" name="banner_alt" id="banner_alt"
                                                        class="form-control" required>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <hr>


                                    <div class="card mb-4">
                                        <div class="card-header"> First Headings Title (Shown Below
                                            slide)
                                        </div>
                                        <div class="card-body">

                                            <div class="mb-3">
                                                <label for="title3" class="form-label">First Content Title
                                                </label>
                                                <input type="text" name="content_title" id="content_title"
                                                    class="form-control">
                                            </div>
                                        </div>
                                    </div>

                                    <hr>

                                    <div class="card mb-4">
                                        <div class="card-header"> Long Content Section</div>
                                        <div class="card-body">
                                            <div class="mb-3">
                                                <label for="long_content" class="form-label">Page
                                                    Content</label>
                                                <textarea name="long_content" id="content" rows="10"
                                                    class="form-control"></textarea>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="text-start">
                                        <button type="submit" class="btn btn-success">Save Page</button>
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
<script src="https://cdn.ckeditor.com/4.16.0/standard/ckeditor.js"></script>
<script>
    const editorConfig = {
        allowedContent: true,
        extraPlugins: 'sourcearea',
        height: 500,
        removePlugins: 'stylesheetparser',
    };

    CKEDITOR.replace('long_content', editorConfig);
    CKEDITOR.replace('short_content', editorConfig);
</script>

</html>