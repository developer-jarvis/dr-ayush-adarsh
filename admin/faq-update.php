<!DOCTYPE html>

<html lang="en" class="light-style layout-menu-fixed" dir="ltr" data-theme="theme-default" data-assets-path="assets/"
    data-template="vertical-menu-template-free">
<?php include 'common/head.php'; ?>
<?php include 'common/session.php'; ?>

<body>
    <?php
    include 'common/config.php';

    if (!isset($_GET['id'])) {
        die("Invalid FAQ ID");
    }

    $faq_id = intval($_GET['id']);
    $result = $conn->query("SELECT * FROM faqs WHERE id = $faq_id");

    if ($result->num_rows == 0) {
        die("FAQ not found.");
    }

    $faq = $result->fetch_assoc();

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $question = $conn->real_escape_string($_POST['question']);
        $answer = $conn->real_escape_string($_POST['answer']);

        $stmt = $conn->prepare("UPDATE faqs SET question = ?, answer = ? WHERE id = ?");
        $stmt->bind_param("ssi", $question, $answer, $faq_id);
        $stmt->execute();

        if ($stmt->affected_rows > 0) {
            echo "<script>alert('FAQ updated successfully!'); window.location.href='faq.php';</script>";
        } else {
            echo "<div class='alert alert-warning'>No changes made or error occurred.</div>";
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
                                <form action="" method="POST">
                                    <div class="mb-3">
                                        <label>Question</label>
                                        <input type="text" name="question" class="form-control"
                                            value="<?= htmlspecialchars($faq['question']) ?>" required>
                                    </div>

                                    <div class="mb-3">
                                        <label>Answer</label>
                                        <textarea name="answer" class="form-control" rows="4"
                                            required><?= htmlspecialchars($faq['answer']) ?></textarea>
                                    </div>

                                    <button type="submit" class="btn btn-success">Update FAQ</button>
                                </form>

                                <script>
                                    function addFaq() {
                                        const container = document.getElementById('faq-container');
                                        const html = `
    <div class="faq-item border p-3 mb-3">
        <label>Question</label>
        <input type="text" name="question[]" class="form-control mb-2" required>

        <label>Answer</label>
        <textarea name="answer[]" class="form-control" rows="3" required></textarea>
        
        <button type="button" class="btn btn-danger mt-2" onclick="this.parentElement.remove()">Remove</button>
    </div>
    `;
                                        container.insertAdjacentHTML('beforeend', html);
                                    }
                                </script>

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