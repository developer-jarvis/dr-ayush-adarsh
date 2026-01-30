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
        ['label' => 'Services', 'url' => 'services.php'],
        ['label' => 'Cosmetic Surgery', 'url' => null]
    ];
    $pageTitle = "Cosmetic Surgery";
    $pageSubtitle = "Expert Cosmetic Procedures for Natural Enhancement";
    include 'common/breadcrumb.php'; 
    ?>

    <section class="section-padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="image-overlay-wrapper mb-3">
                        <img src="assets/images/services/advanced-cosmetic-procedure.jpg" alt="best cosmetic surgery in patna"
                            class="img-fluid w-100">

                        <div class="icon-overlay">
                            <i class="fa-solid fa-wand-magic-sparkles"></i>
                            <p>Cosmetic Surgery Services</p>
                        </div>
                    </div>
                   
                    <h2 style="font-size: 32px; font-weight: 700; color: #e91e63; margin-bottom: 20px;">Professional
                        Cosmetic Surgery</h2>
                    <p style="color: #555; line-height: 1.8; margin-bottom: 15px;">We offer comprehensive cosmetic
                        surgical procedures performed by experienced surgeons using advanced techniques. Ayush Adarsh
                        combines artistic vision with surgical precision to enhance and refine your natural features,
                        delivering results that look natural and boost your confidence.</p>

                    <h3 style="color: #333; font-weight: 600; margin-top: 30px; margin-bottom: 15px; font-size: 20px;">
                        Our Cosmetic Procedures Include:</h3>
                    <ul style="color: #555; line-height: 2; margin-bottom: 25px; padding-left: 25px;">
                        <li><strong>Rhinoplasty (Nose Reshaping):</strong> Precise nose contouring for balanced facial
                            aesthetics</li>
                        <li><strong>Otoplasty (Ear Surgery):</strong> Ear reshaping and repositioning</li>
                        <li><strong>Chin Augmentation:</strong> Enhancement for facial balance and definition</li>
                        <li><strong>Facial Rejuvenation:</strong> Comprehensive facial enhancement procedures</li>
                        <li><strong>Eyelid Surgery:</strong> Correction of drooping eyelids and under-eye bags</li>
                        <li><strong>Lip Enhancement:</strong> Natural lip augmentation and reshaping</li>
                    </ul>

                    <h3 style="color: #333; font-weight: 600; margin-bottom: 15px; font-size: 20px;">Why Ayush Adarsh for
                        Cosmetic Surgery?</h3>
                    <div style="background: #f8f9fa; padding: 20px; border-radius: 8px; margin-bottom: 25px;">
                        <ul style="color: #555; line-height: 2; padding-left: 25px; margin: 0;">
                            <li><strong>Expert Surgeon:</strong> Extensive training and experience in cosmetic
                                procedures</li>
                            <li><strong>Natural Results:</strong> Focus on enhancing your unique beauty, not overdoing
                            </li>
                            <li><strong>Latest Techniques:</strong> Minimally invasive procedures with faster recovery
                            </li>
                            <li><strong>Personalized Approach:</strong> Customized treatment plans for each patient</li>
                            <li><strong>Safety First:</strong> Advanced surgical facilities meeting international
                                standards</li>
                        </ul>
                    </div>

                    <h3 style="color: #333; font-weight: 600; margin-bottom: 15px; font-size: 20px;">Pre-Surgery
                        Consultation</h3>
                    <p style="color: #555; line-height: 1.8; margin-bottom: 15px;">We understand that cosmetic surgery
                        is a personal decision. During your consultation, Ayush Adarsh will discuss your goals, assess
                        your facial structure, and explain the procedure in detail. You'll see 3D simulations of
                        potential results and have all your questions answered before proceeding.</p>

                    <h3 style="color: #333; font-weight: 600; margin-bottom: 15px; font-size: 20px;">Recovery &
                        Aftercare</h3>
                    <p style="color: #555; line-height: 1.8; margin-bottom: 15px;">Recovery time varies by procedure.
                        Most patients can resume light activities within 1-2 weeks. Complete healing typically takes 4-6
                        weeks. Ayush Adarsh provides detailed aftercare instructions and regular follow-up to ensure
                        optimal results.</p>

                    <h3 style="color: #333; font-weight: 600; margin-top: 30px; margin-bottom: 15px; font-size: 20px;">
                        Results & Satisfaction</h3>
                    <p style="color: #555; line-height: 1.8;">Our goal is to deliver natural-looking results that
                        enhance your confidence and appearance. Most patients report high satisfaction with their
                        cosmetic surgery outcomes. Results continue to improve as healing progresses over the first few
                        months.</p>
                </div>

                <div class="col-lg-4">
                    <div
                        style="background: linear-gradient(135deg, #e91e63 0%, #d81b60 100%); color: #fff; border-radius: 12px; padding: 30px; margin-bottom: 30px; box-shadow: 0 10px 30px rgba(233, 30, 99, 0.3);">
                        <h3 style="font-size: 20px; font-weight: 700; margin-bottom: 15px;">Schedule Consultation</h3>
                        <p style="margin-bottom: 20px; line-height: 1.8;">Discuss your cosmetic goals with Ayush Adarsh
                            today.</p>
                        <a href="contact.php#appointment" class="btn-secondary-custom"
                            style="background-color: #fff; color: #e91e63; border: none; display: block; text-align: center; width: 100%; padding: 12px; border-radius: 8px; font-weight: 600;">Book
                            Consultation</a>
                    </div>

                    <div style="background: #f5f5f5; border-radius: 12px; padding: 25px; margin-bottom: 30px;">
                        <h4 style="color: #e91e63; font-weight: 700; margin-bottom: 15px; font-size: 16px;">Surgery
                            Benefits</h4>
                        <ul style="list-style: none; padding: 0; margin: 0;">
                            <li style="margin-bottom: 12px; padding-bottom: 12px; border-bottom: 1px solid #ddd;">✓
                                Natural-looking results</li>
                            <li style="margin-bottom: 12px; padding-bottom: 12px; border-bottom: 1px solid #ddd;">✓
                                Expert surgeon</li>
                            <li style="margin-bottom: 12px; padding-bottom: 12px; border-bottom: 1px solid #ddd;">✓
                                Personalized treatment</li>
                            <li style="margin-bottom: 12px; padding-bottom: 12px; border-bottom: 1px solid #ddd;">✓ Safe
                                procedures</li>
                            <li style="margin-bottom: 12px; padding-bottom: 12px; border-bottom: 1px solid #ddd;">✓ Fast
                                recovery</li>
                            <li>✓ Boosted confidence</li>
                        </ul>
                    </div>

                    <div style="background: #fff; border-radius: 12px; padding: 25px; border: 2px solid #f0f0f0;">
                        <h4 style="color: #e91e63; font-weight: 700; margin-bottom: 15px; font-size: 16px;">Related
                            Services</h4>
                        <ul style="list-style: none; padding: 0;">
                            <li style="margin-bottom: 10px;"><a href="service-skin-analysis.php"
                                    style="color: #555; text-decoration: none;">→ Skin Analysis</a></li>
                            <li style="margin-bottom: 10px;"><a href="service-laser-treatment.php"
                                    style="color: #555; text-decoration: none;">→ Laser Treatment</a></li>
                            <li style="margin-bottom: 10px;"><a href="service-chemical-peeling.php"
                                    style="color: #555; text-decoration: none;">→ Chemical Peeling</a></li>
                            <li><a href="services.php"
                                    style="color: #e91e63; font-weight: 600; text-decoration: none;">View All Services
                                    →</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <?php include 'common/footer.php' ?>
</body>

</html>