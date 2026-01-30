<!DOCTYPE html>
<html lang="en">

<head>
    <?php include 'common/head.php'; ?>
</head>

<body>
    <?php include 'common/header.php' ?>

    <?php 
    $breadcrumbs = [
        ['label' => 'Home', 'url' => 'index.php'],
        ['label' => 'About Us', 'url' => null]
    ];
    $pageTitle = "About Adarsh Skin Care Clinic";
    $pageSubtitle = "Delivering Excellence in Dermatological Care";
    include 'common/breadcrumb.php'; 
    ?>

    <!-- Clinic Overview -->
    <section class="section-padding" style="background: #fff;">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6" style="margin-bottom: 30px;">
                    <img src="assets/images/about/modern-clinic.jpeg" alt="clinic in patna" class="img-fluid rounded">
                    <!-- <div
                        style="background: linear-gradient(135deg, #f8bbd0 0%, #fce4ec 100%); border-radius: 12px; padding: 60px 40px; text-align: center; min-height: 400px; display: flex; align-items: center; justify-content: center;">
                        <div>
                            <i class="fa-solid fa-hospital" style="font-size: 80px; color: #e91e63; opacity: 0.5;"></i>
                            <p style="margin-top: 20px; color: #555; font-size: 18px; font-weight: 600;">Modern Clinic
                                Facility</p>
                        </div>
                    </div> -->
                </div>
                <div class="col-lg-6">
                    <h2 style="font-size: 36px; font-weight: 700; color: #e91e63; margin-bottom: 20px;">Welcome to
                        Adarsh Skin Care Clinic</h2>
                    <p style="color: #555; line-height: 1.8; margin-bottom: 15px; font-size: 15px;">Adarsh Skin Care
                        Clinic is a premier dermatological center dedicated to providing cutting-edge skin and hair care
                        solutions. Established with a vision to deliver world-class medical services, we combine
                        advanced technology with compassionate patient care.</p>

                    <p style="color: #555; line-height: 1.8; margin-bottom: 15px; font-size: 15px;">Led by Ayush Adarsh,
                        a
                        highly experienced and certified dermatologist, our clinic is equipped with state-of-the-art
                        facilities and follows international standards of practice. We are committed to helping our
                        patients achieve their aesthetic and therapeutic goals with personalized treatment plans.</p>

                    <h4
                        style="color: #e91e63; font-weight: 700; margin-top: 25px; margin-bottom: 15px; font-size: 18px;">
                        Our Mission</h4>
                    <p style="color: #555; line-height: 1.8; margin-bottom: 20px; font-size: 15px;">To provide
                        comprehensive, ethical, and evidence-based dermatological care that transforms lives and boosts
                        confidence.</p>

                    <h4 style="color: #e91e63; font-weight: 700; margin-bottom: 15px; font-size: 18px;">Our Vision</h4>
                    <p style="color: #555; line-height: 1.8; font-size: 15px;">To be recognized as the leading
                        dermatological center in Patna, known for innovation, expertise, and patient satisfaction.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Why Choose Us -->
    <section class="section-padding" style="background: #f5f5f5;">
        <div class="container">
            <div class="section-title">
                <h2>Why Choose Adarsh Clinic?</h2>
                <p>Excellence in Every Aspect of Care</p>
            </div>

            <div class="row">
                <div class="col-lg-4 col-md-6">
                    <div
                        style="background: #fff; border-radius: 12px; padding: 30px; margin-bottom: 30px; box-shadow: 0 5px 20px rgba(0,0,0,0.05); text-align: center;">
                        <div style="font-size: 48px; color: #e91e63; margin-bottom: 15px;"><i
                                class="fa-solid fa-user-doctor"></i></div>
                        <h3 style="font-size: 18px; font-weight: 600; color: #333; margin-bottom: 12px;">Expert Doctors
                        </h3>
                        <p style="color: #555; font-size: 14px; line-height: 1.8;">Highly qualified dermatologists with
                            years of international experience.</p>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6">
                    <div
                        style="background: #fff; border-radius: 12px; padding: 30px; margin-bottom: 30px; box-shadow: 0 5px 20px rgba(0,0,0,0.05); text-align: center;">
                        <div style="font-size: 48px; color: #e91e63; margin-bottom: 15px;"><i
                                class="fa-solid fa-microscope"></i></div>
                        <h3 style="font-size: 18px; font-weight: 600; color: #333; margin-bottom: 12px;">Latest
                            Technology</h3>
                        <p style="color: #555; font-size: 14px; line-height: 1.8;">State-of-the-art equipment and
                            cutting-edge treatment procedures.</p>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6">
                    <div
                        style="background: #fff; border-radius: 12px; padding: 30px; margin-bottom: 30px; box-shadow: 0 5px 20px rgba(0,0,0,0.05); text-align: center;">
                        <div style="font-size: 48px; color: #e91e63; margin-bottom: 15px;"><i
                                class="fa-solid fa-heart"></i></div>
                        <h3 style="font-size: 18px; font-weight: 600; color: #333; margin-bottom: 12px;">Patient Care
                        </h3>
                        <p style="color: #555; font-size: 14px; line-height: 1.8;">Personalized treatment plans and
                            compassionate patient support.</p>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6">
                    <div
                        style="background: #fff; border-radius: 12px; padding: 30px; margin-bottom: 30px; box-shadow: 0 5px 20px rgba(0,0,0,0.05); text-align: center;">
                        <div style="font-size: 48px; color: #e91e63; margin-bottom: 15px;"><i
                                class="fa-solid fa-flask"></i></div>
                        <h3 style="font-size: 18px; font-weight: 600; color: #333; margin-bottom: 12px;">Lab Services
                        </h3>
                        <p style="color: #555; font-size: 14px; line-height: 1.8;">Comprehensive in-clinic laboratory
                            testing for accurate diagnosis.</p>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6">
                    <div
                        style="background: #fff; border-radius: 12px; padding: 30px; margin-bottom: 30px; box-shadow: 0 5px 20px rgba(0,0,0,0.05); text-align: center;">
                        <div style="font-size: 48px; color: #e91e63; margin-bottom: 15px;"><i
                                class="fa-solid fa-star"></i></div>
                        <h3 style="font-size: 18px; font-weight: 600; color: #333; margin-bottom: 12px;">Proven Results
                        </h3>
                        <p style="color: #555; font-size: 14px; line-height: 1.8;">Thousands of satisfied patients with
                            remarkable transformations.</p>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6">
                    <div
                        style="background: #fff; border-radius: 12px; padding: 30px; margin-bottom: 30px; box-shadow: 0 5px 20px rgba(0,0,0,0.05); text-align: center;">
                        <div style="font-size: 48px; color: #e91e63; margin-bottom: 15px;"><i
                                class="fa-solid fa-clock"></i></div>
                        <h3 style="font-size: 18px; font-weight: 600; color: #333; margin-bottom: 12px;">24/7 Support
                        </h3>
                        <p style="color: #555; font-size: 14px; line-height: 1.8;">Round-the-clock availability for
                            emergencies and consultations.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Dynamic About Sections (Doctor & Father) -->
    <?php
    include_once 'admin/common/config.php';
    $about_result = $conn->query("SELECT * FROM about_sections ORDER BY ordering, id");
    if ($about_result && $about_result->num_rows > 0):
        $index = 0;
        while ($section = $about_result->fetch_assoc()):
    ?>
    <section class="section-padding doctor-profile" style="background: <?= $index % 2 == 0 ? '#fff' : '#f5f5f5' ?>;">
        <div class="container">
            <div class="row align-items-center">
                <?php if ($section['image']): ?>
                <div class="col-lg-5 <?= $index % 2 == 0 ? '' : 'order-lg-2' ?>" style="margin-bottom: 30px;">
                    <img src="admin/<?= htmlspecialchars($section['image']) ?>"
                        alt="<?= htmlspecialchars($section['name']) ?>" class="img-fluid rounded shadow">
                </div>
                <?php endif; ?>
                <div class="col-lg-<?= $section['image'] ? '7' : '12' ?> <?= $index % 2 == 0 ? '' : 'order-lg-1' ?>">
                    <h2 style="font-size: 32px; font-weight: 700; color: #e91e63; margin-bottom: 20px;">
                        <?= htmlspecialchars($section['name']) ?>
                    </h2>
                    <div style="color: #555; line-height: 1.8; margin-bottom: 15px; font-size: 15px;">
                        <?php 
                        $content = $section['content'];
                        // Clean up all types of escaped line breaks
                        $content = str_replace(['\\r\\n', '\\r\\r', '\\n\\n', '\\r', '\\n'], "\n", $content);
                        // Remove extra whitespace and normalize line breaks
                        $content = preg_replace('/\n\s*\n/', "\n\n", $content);
                        $content = trim($content);
                        // Convert to HTML with proper paragraph breaks
                        $paragraphs = explode("\n\n", $content);
                        foreach ($paragraphs as $paragraph) {
                            if (trim($paragraph)) {
                                echo '<p style="margin-bottom: 15px;">' . htmlspecialchars(trim($paragraph)) . '</p>';
                            }
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php 
        $index++;
        endwhile;
    endif; 
    ?>

    <?php include 'common/footer.php' ?>
</body>

</html>