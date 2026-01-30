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
        ['label' => 'Services', 'url' => null]
    ];
    $pageTitle = "Our Services";
    $pageSubtitle = "Comprehensive Dermatological Solutions";
    include 'common/breadcrumb.php'; 
    ?>

    <!-- Services Grid -->
    <section class="services-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-6">
                    <div class="service-card">
                        <div class="service-card-image">
                            <img src="assets/images/services/hair-transplant.jpg" alt="Hair Transplant" style="width: 100%; height: 200px; object-fit: cover; border-radius: 8px 8px 0 0;">
                        </div>
                        <div class="service-card-content">
                            <div class="service-card-icon"><i class="fa-solid fa-spa"></i></div>
                            <h3>Hair Transplant</h3>
                            <p>Advanced hair restoration techniques using latest technology for natural-looking results.</p>
                            <a href="service-hair-transplant.php">Learn More →</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="service-card">
                        <div class="service-card-image">
                            <img src="assets/images/services/advanced-cosmetic-procedure.jpg" alt="Cosmetic Surgery" style="width: 100%; height: 200px; object-fit: cover; border-radius: 8px 8px 0 0;">
                        </div>
                        <div class="service-card-content">
                            <div class="service-card-icon"><i class="fa-solid fa-wand-magic-sparkles"></i></div>
                            <h3>Cosmetic Surgery</h3>
                            <p>Expert cosmetic procedures to enhance your natural beauty with precision.</p>
                            <a href="service-cosmetic-surgery.php">Learn More →</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="service-card">
                        <div class="service-card-image">
                            <img src="assets/images/services/allergy-treatment.jpg" alt="Allergy Test" style="width: 100%; height: 200px; object-fit: cover; border-radius: 8px 8px 0 0;">
                        </div>
                        <div class="service-card-content">
                            <div class="service-card-icon"><i class="fa-solid fa-flask-vial"></i></div>
                            <h3>Allergy Test</h3>
                            <p>Comprehensive allergy testing to identify and treat skin allergies effectively.</p>
                            <a href="service-allergy-test.php">Learn More →</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="service-card">
                        <div class="service-card-image">
                            <img src="assets/images/services/phototherapy-treatment.jpg" alt="Phototherapy" style="width: 100%; height: 200px; object-fit: cover; border-radius: 8px 8px 0 0;">
                        </div>
                        <div class="service-card-content">
                            <div class="service-card-icon"><i class="fa-solid fa-lightbulb"></i></div>
                            <h3>Phototherapy</h3>
                            <p>Light-based therapeutic treatments for various skin conditions.</p>
                            <a href="service-phototherapy.php">Learn More →</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="service-card">
                        <div class="service-card-image">
                            <img src="assets/images/services/microdermabrasion-treatment.jpg" alt="Microdermabrasion" style="width: 100%; height: 200px; object-fit: cover; border-radius: 8px 8px 0 0;">
                        </div>
                        <div class="service-card-content">
                            <div class="service-card-icon"><i class="fa-solid fa-sparkles"></i></div>
                            <h3>Microdermabrasion</h3>
                            <p>Advanced skin exfoliation technique for skin rejuvenation and renewal.</p>
                            <a href="service-microdermabrasion.php">Learn More →</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="service-card">
                        <div class="service-card-image">
                            <img src="assets/images/services/cryotherapy.jpg" alt="Cryotherapy" style="width: 100%; height: 200px; object-fit: cover; border-radius: 8px 8px 0 0;">
                        </div>
                        <div class="service-card-content">
                            <div class="service-card-icon"><i class="fa-solid fa-snowflake"></i></div>
                            <h3>Cryotherapy</h3>
                            <p>Cold therapy treatment for skin lesions and warts removal.</p>
                            <a href="service-cryotherapy.php">Learn More →</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="service-card">
                        <div class="service-card-image">
                            <img src="assets/images/services/dermatopathology.jpg" alt="Dermato Pathology" style="width: 100%; height: 200px; object-fit: cover; border-radius: 8px 8px 0 0;">
                        </div>
                        <div class="service-card-content">
                            <div class="service-card-icon"><i class="fa-solid fa-microscope"></i></div>
                            <h3>Dermato Pathology</h3>
                            <p>Expert pathological analysis for precise diagnosis of skin conditions.</p>
                            <a href="service-dermato-pathology.php">Learn More →</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="service-card">
                        <div class="service-card-image">
                            <img src="assets/images/services/prp-therapy.jpg" alt="PRP Therapy" style="width: 100%; height: 200px; object-fit: cover; border-radius: 8px 8px 0 0;">
                        </div>
                        <div class="service-card-content">
                            <div class="service-card-icon"><i class="fa-solid fa-syringe"></i></div>
                            <h3>PRP Therapy</h3>
                            <p>Platelet-rich plasma therapy for natural skin and hair restoration.</p>
                            <a href="service-prp-therapy.php">Learn More →</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="service-card">
                        <div class="service-card-image">
                            <img src="assets/images/services/laser-treatment.jpg" alt="Laser Treatment" style="width: 100%; height: 200px; object-fit: cover; border-radius: 8px 8px 0 0;">
                        </div>
                        <div class="service-card-content">
                            <div class="service-card-icon"><i class="fa-solid fa-droplet"></i></div>
                            <h3>Laser Treatment</h3>
                            <p>Cutting-edge laser technology for skin rejuvenation and hair removal.</p>
                            <a href="service-laser-treatment.php">Learn More →</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="service-card">
                        <div class="service-card-image">
                            <img src="assets/images/services/microdermabrasion-treatment.jpg" alt="Chemical Peeling" style="width: 100%; height: 200px; object-fit: cover; border-radius: 8px 8px 0 0;">
                        </div>
                        <div class="service-card-content">
                            <div class="service-card-icon"><i class="fa-solid fa-vial"></i></div>
                            <h3>Chemical Peeling</h3>
                            <p>Advanced chemical peels for skin renewal and brightening.</p>
                            <a href="service-chemical-peeling.php">Learn More →</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="service-card">
                        <div class="service-card-image">
                            <img src="assets/images/services/electro-surgery.jpg" alt="Electro Surgery" style="width: 100%; height: 200px; object-fit: cover; border-radius: 8px 8px 0 0;">
                        </div>
                        <div class="service-card-content">
                            <div class="service-card-icon"><i class="fa-solid fa-bolt"></i></div>
                            <h3>Electro Surgery</h3>
                            <p>Electrical surgical techniques for precise skin lesion removal.</p>
                            <a href="service-electro-surgery.php">Learn More →</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="service-card">
                        <div class="service-card-image">
                            <img src="assets/images/services/vitiligo-surgery.jpg" alt="Vitiligo Surgery" style="width: 100%; height: 200px; object-fit: cover; border-radius: 8px 8px 0 0;">
                        </div>
                        <div class="service-card-content">
                            <div class="service-card-icon"><i class="fa-solid fa-palette"></i></div>
                            <h3>Vitiligo Surgery</h3>
                            <p>Advanced surgical treatments for vitiligo and depigmentation disorders.</p>
                            <a href="service-vitiligo-surgery.php">Learn More →</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="service-card">
                        <div class="service-card-image">
                            <img src="assets/images/services/hair-analysis.jpg" alt="Hair Treatment" style="width: 100%; height: 200px; object-fit: cover; border-radius: 8px 8px 0 0;">
                        </div>
                        <div class="service-card-content">
                            <div class="service-card-icon"><i class="fa-solid fa-magnifying-glass"></i></div>
                            <h3>Hair Treatment</h3>
                            <p>Comprehensive hair treatment to address root causes of hair problems and restore health.</p>
                            <a href="service-hair-treatment.php">Learn More →</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="service-card">
                        <div class="service-card-image">
                            <img src="assets/images/services/skin-analysis.jpg" alt="Skin Treatment" style="width: 100%; height: 200px; object-fit: cover; border-radius: 8px 8px 0 0;">
                        </div>
                        <div class="service-card-content">
                            <div class="service-card-icon"><i class="fa-solid fa-face-smile"></i></div>
                            <h3>Skin Treatment</h3>
                            <p>Professional skin treatment using advanced diagnostic tools for personalized care and healing.</p>
                            <a href="service-skin-treatment.php">Learn More →</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section style="padding: 60px 0; background: linear-gradient(135deg, #e91e63 0%, #d81b60 100%); color: #fff; text-align: center;">
        <div class="container">
            <h2 style="font-size: 36px; font-weight: 700; margin-bottom: 15px;">Need a Consultation?</h2>
            <p style="font-size: 16px; margin-bottom: 30px; opacity: 0.9;">Our experts are ready to help you. Schedule your appointment today.</p>
            <a href="contact.php#appointment" class="btn-secondary-custom" style="background-color: #fff; color: #e91e63; border: none;">Book Appointment</a>
        </div>
    </section>

    <?php include 'common/footer.php' ?>
</body>
</html>