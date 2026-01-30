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
        ['label' => 'Gallery', 'url' => null]
    ];
    $pageTitle = "Our Gallery";
    $pageSubtitle = "See Our Transformation Stories";
    include 'common/breadcrumb.php';
    ?>

    <!-- Gallery Section -->
    <section class="section-padding">
        <div class="container">
            <div class="section-title">
                <h2>Before & After Transformations</h2>
                <p>Witness the remarkable results of our advanced dermatological treatments</p>
            </div>

            <div class="row" style="margin-bottom: 60px;">
                <?php
                // Use mysqli connection for consistency
                include_once 'admin/common/config.php';
                $gallery_result = $conn->query('SELECT * FROM gallery ORDER BY id DESC');

                if ($gallery_result && $gallery_result->num_rows > 0) {
                    while ($g = $gallery_result->fetch_assoc()):
                ?>
                        <div class="col-lg-4 col-md-6" style="margin-bottom: 40px;">
                            <div class="gallery-card" style="
                        background: #fff; 
                        border-radius: 24px; 
                        overflow: hidden; 
                        box-shadow: 0 8px 32px rgba(0,0,0,0.08); 
                        transition: all 0.4s cubic-bezier(0.25, 0.46, 0.45, 0.94);
                        position: relative;
                        height: 100%;
                        border: 1px solid rgba(233, 30, 99, 0.1);
                    " onmouseover="this.style.transform='translateY(-8px)'; this.style.boxShadow='0 16px 48px rgba(233, 30, 99, 0.15)'" onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='0 8px 32px rgba(0,0,0,0.08)'">

                                <!-- Image Container -->
                                <div style="position: relative; height: 320px; overflow: hidden;">
                                    <?php if ($g['image']): ?>
                                        <img src="admin/<?= htmlspecialchars($g['image']) ?>"
                                            alt="<?= htmlspecialchars($g['title']) ?>"
                                            style="width: 100%; height: 100%; object-fit: cover; transition: transform 0.6s ease;"
                                            onmouseover="this.style.transform='scale(1.08)'"
                                            onmouseout="this.style.transform='scale(1)'">
                                    <?php else: ?>
                                        <div style="
                                    display: flex; 
                                    align-items: center; 
                                    justify-content: center; 
                                    height: 100%;
                                    background: linear-gradient(135deg, #f8bbd0 0%, #fce4ec 100%);
                                ">
                                            <i class="fa-solid fa-image" style="font-size: 60px; color: #e91e63; opacity: 0.4;"></i>
                                        </div>
                                    <?php endif; ?>

                                    <!-- Category Badge -->
                                    <?php if ($g['category']): ?>
                                        <div style="
                                position: absolute; 
                                top: 20px; 
                                left: 20px; 
                                background: rgba(255, 255, 255, 0.95); 
                                color: #e91e63; 
                                padding: 10px 18px; 
                                border-radius: 30px; 
                                font-size: 13px; 
                                font-weight: 700;
                                text-transform: capitalize;
                                letter-spacing: 0.3px;
                                backdrop-filter: blur(10px);
                                box-shadow: 0 4px 20px rgba(0,0,0,0.1);
                            ">
                                            <?= htmlspecialchars($g['category']) ?>
                                        </div>
                                    <?php endif; ?>
                                </div>

                            </div>
                        </div>
                <?php
                    endwhile;
                } else {
                    // Enhanced placeholder message
                    echo '
                    <div class="col-12 text-center" style="padding: 100px 20px;">
                        <div style="
                            background: linear-gradient(135deg, #fff 0%, #f8f9fa 100%);
                            border-radius: 24px;
                            padding: 80px 40px;
                            max-width: 600px;
                            margin: 0 auto;
                            box-shadow: 0 8px 32px rgba(0,0,0,0.08);
                            border: 1px solid rgba(233, 30, 99, 0.1);
                        ">
                            <div style="
                                width: 120px;
                                height: 120px;
                                background: linear-gradient(135deg, #e91e63, #d81b60);
                                border-radius: 50%;
                                display: flex;
                                align-items: center;
                                justify-content: center;
                                margin: 0 auto 30px;
                                box-shadow: 0 8px 32px rgba(233, 30, 99, 0.3);
                            ">
                                <i class="fa-solid fa-images" style="font-size: 50px; color: white;"></i>
                            </div>
                            <h3 style="color: #2c3e50; font-weight: 700; margin-bottom: 15px; font-size: 24px;">Gallery Coming Soon</h3>
                            <p style="color: #6c757d; font-size: 16px; line-height: 1.6; margin: 0;">
                                Our amazing treatment results and transformation stories will be showcased here.
                            </p>
                        </div>
                    </div>';
                }
                ?>
            </div>

            <div class="text-center">
                <p style="color: #666; font-size: 16px; margin-bottom: 30px; line-height: 1.8;">
                    <strong>Every treatment is customized based on individual needs and goals.</strong><br>
                    These results reflect the expertise of Ayush Adarsh and the advanced technology available at Ayush Adarsh Clinic.
                </p>
            </div>
        </div>
    </section>

    <!-- CTA -->
    <section style="padding: 60px 0; background: linear-gradient(135deg, #e91e63 0%, #d81b60 100%); color: #fff; text-align: center;">
        <div class="container">
            <h2 style="font-size: 36px; font-weight: 700; margin-bottom: 15px;">See Your Transformation</h2>
            <a href="contact.php#appointment" class="btn-secondary-custom" style="background-color: #fff; color: #e91e63; border: none;">Book Consultation</a>
        </div>
    </section>

    <?php include 'common/footer.php' ?>
</body>

</html>