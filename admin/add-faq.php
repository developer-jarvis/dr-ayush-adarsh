<!DOCTYPE html>

<html lang="en" class="light-style layout-menu-fixed" dir="ltr" data-theme="theme-default" data-assets-path="assets/"
    data-template="vertical-menu-template-free">
<?php include 'common/head.php'; ?>
<?php include 'common/session.php'; ?>

<body>
    <?php
    include 'common/config.php';

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        $questions = $_POST['question'];
        $answers = $_POST['answer'];

        $total = count($questions);

        for ($i = 0; $i < $total; $i++) {
            $q = $conn->real_escape_string($questions[$i]);
            $a = $conn->real_escape_string($answers[$i]);

            if (!empty($q) && !empty($a)) {
                $stmt = $conn->prepare("INSERT INTO faqs (question, answer) VALUES (?, ?)");
                $stmt->bind_param("ss", $q, $a);
                $stmt->execute();
            }
        }

        echo "<script>alert('All FAQs Added Successfully!'); window.location.href='faq.php';</script>";
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
                                    <div id="faq-container">
                                        <div class="faq-item border p-3 mb-3">
                                            <label>Question</label>
                                            <input type="text" name="question[]" class="form-control mb-2" required>

                                            <label>Answer</label>
                                            <textarea name="answer[]" class="form-control" rows="3" required></textarea>
                                        </div>
                                    </div>

                                    <button type="button" class="btn btn-secondary mb-3" onclick="addFaq()">+ Add
                                        More</button>
                                    <br>
                                    <button type="submit" class="btn btn-success">Save FAQs</button>
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