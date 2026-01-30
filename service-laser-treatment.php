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
        ['label' => 'Laser Treatment', 'url' => null]
    ];
    $pageTitle = "Laser Treatment";
    $pageSubtitle = "Advanced Laser Therapy for Skin Transformation";
    include 'common/breadcrumb.php';
    ?>

    <!-- Service Content -->
    <section class="section-padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="image-overlay-wrapper mb-3">
                        <img src="assets/images/services/laser-treatment.jpg" alt="laser treatment in patna"
                            class="img-fluid w-100">

                        <div class="icon-overlay">
                            <i class="fa-solid fa-droplet"></i>
                            <p>Laser Treatment Services</p>
                        </div>
                    </div>


                    <h2 style="font-size: 32px; font-weight: 700; color: #e91e63; margin-bottom: 20px;">Cutting-Edge
                        Laser Therapy</h2>
                    <p style="color: #555; line-height: 1.8; margin-bottom: 15px;">Our state-of-the-art laser technology
                        offers comprehensive solutions for various dermatological concerns. From pigmentation and scars
                        to hair removal and skin rejuvenation, laser therapy delivers precise, effective results with
                        minimal downtime. We utilize international-standard laser systems that ensure safety and
                        efficacy in every treatment.</p>

                    <h3 style="color: #333; font-weight: 600; margin-top: 30px; margin-bottom: 15px; font-size: 20px;">
                        Laser Treatment Applications</h3>
                    <ul style="color: #555; line-height: 2; margin-bottom: 25px; padding-left: 25px;">
                        <li><strong>Acne Scar Removal:</strong> Fractional CO2 laser for deep scar treatment and skin
                            resurfacing</li>
                        <li><strong>Pigmentation Control:</strong> Precise pigment removal for dark spots and melasma
                        </li>
                        <li><strong>Hair Removal:</strong> Permanent hair reduction with advanced diode laser technology
                        </li>
                        <li><strong>Skin Rejuvenation:</strong> Anti-aging treatment for fine lines and wrinkles</li>
                        <li><strong>Tattoo Removal:</strong> Complete or partial tattoo elimination</li>
                        <li><strong>Vascular Lesions:</strong> Treatment for red spots and broken capillaries</li>
                    </ul>

                    <h3 style="color: #333; font-weight: 600; margin-bottom: 15px; font-size: 20px;">Why Choose Our
                        Laser Treatment?</h3>
                    <div style="background: #f8f9fa; padding: 20px; border-radius: 8px; margin-bottom: 25px;">
                        <ul style="color: #555; line-height: 2; padding-left: 25px; margin: 0;">
                            <li><strong>FDA Approved Equipment:</strong> Latest technology with proven results</li>
                            <li><strong>Expert Administration:</strong> Ayush Adarsh's expertise ensures optimal
                                treatment</li>
                            <li><strong>Customized Plans:</strong> Tailored treatments for individual skin types</li>
                            <li><strong>Minimal Downtime:</strong> Return to normal activities immediately</li>
                            <li><strong>Visible Results:</strong> Noticeable improvements after first session</li>
                        </ul>
                    </div>

                    <h3 style="color: #333; font-weight: 600; margin-top: 30px; margin-bottom: 15px; font-size: 20px;">
                        Treatment Process</h3>
                    <p style="color: #555; line-height: 1.8; margin-bottom: 15px;"><strong>Consultation:</strong> Ayush
                        Adarsh evaluates your skin condition and determines the best laser approach for your specific
                        concerns.</p>
                    <p style="color: #555; line-height: 1.8; margin-bottom: 15px;"><strong>Preparation:</strong> The
                        area is cleansed and numbed if necessary. Protective eyewear is provided.</p>
                    <p style="color: #555; line-height: 1.8; margin-bottom: 15px;"><strong>Treatment:</strong> The laser
                        is applied systematically, targeting problem areas. Sessions typically last 20-60 minutes
                        depending on area size.</p>
                    <p style="color: #555; line-height: 1.8;"><strong>Aftercare:</strong> Sunscreen and moisturizer are
                        applied. Most patients resume activities immediately, though sun exposure should be avoided.</p>

                    <h3 style="color: #333; font-weight: 600; margin-top: 30px; margin-bottom: 15px; font-size: 20px;">
                        Expected Results Timeline</h3>
                    <p style="color: #555; line-height: 1.8; margin-bottom: 10px;"><strong>Immediate:</strong> Mild
                        redness (reduces within hours to days)</p>
                    <p style="color: #555; line-height: 1.8; margin-bottom: 10px;"><strong>1-2 Weeks:</strong> Initial
                        improvement becomes visible</p>
                    <p style="color: #555; line-height: 1.8; margin-bottom: 10px;"><strong>4-6 Weeks:</strong>
                        Significant results observable</p>
                    <p style="color: #555; line-height: 1.8;"><strong>3-6 Months:</strong> Full results achieved
                        (multiple sessions may be required)</p>

                    <h3 style="color: #333; font-weight: 600; margin-top: 30px; margin-bottom: 15px; font-size: 20px;">
                        Safety & Side Effects</h3>
                    <p style="color: #555; line-height: 1.8;">Laser treatment is safe when performed by experienced
                        professionals using calibrated equipment. Minor side effects like temporary redness or mild
                        swelling are normal and resolve quickly. More serious complications are extremely rare with
                        proper technique and aftercare compliance.</p>
                </div>

                <div class="col-lg-4">
                    <!-- Sidebar CTA -->
                    <div
                        style="background: linear-gradient(135deg, #e91e63 0%, #d81b60 100%); color: #fff; border-radius: 12px; padding: 30px; margin-bottom: 30px; box-shadow: 0 10px 30px rgba(233, 30, 99, 0.3);">
                        <h3 style="font-size: 20px; font-weight: 700; margin-bottom: 15px;">Schedule Your Laser Session
                        </h3>
                        <p style="margin-bottom: 20px; line-height: 1.8;">Start your skin transformation journey with
                            our advanced laser technology.</p>
                        <a href="contact.php#appointment" class="btn-secondary-custom"
                            style="background-color: #fff; color: #e91e63; border: none; display: block; text-align: center; width: 100%; padding: 12px; border-radius: 8px; font-weight: 600; transition: all 0.3s ease;">Book
                            Session</a>
                    </div>

                    <!-- Benefits Box -->
                    <div style="background: #f5f5f5; border-radius: 12px; padding: 25px; margin-bottom: 30px;">
                        <h4 style="color: #e91e63; font-weight: 700; margin-bottom: 15px; font-size: 16px;">Quick
                            Benefits</h4>
                        <ul style="list-style: none; padding: 0; margin: 0;">
                            <li style="margin-bottom: 12px; padding-bottom: 12px; border-bottom: 1px solid #ddd;">✓
                                Immediate visible results</li>
                            <li style="margin-bottom: 12px; padding-bottom: 12px; border-bottom: 1px solid #ddd;">✓ No
                                downtime required</li>
                            <li style="margin-bottom: 12px; padding-bottom: 12px; border-bottom: 1px solid #ddd;">✓
                                Long-lasting effects</li>
                            <li style="margin-bottom: 12px; padding-bottom: 12px; border-bottom: 1px solid #ddd;">✓ Safe
                                for all skin types</li>
                            <li style="margin-bottom: 12px; padding-bottom: 12px; border-bottom: 1px solid #ddd;">✓
                                Multiple applications</li>
                            <li>✓ Expert supervision</li>
                        </ul>
                    </div>

                    <!-- Related Services -->
                    <div style="background: #fff; border-radius: 12px; padding: 25px; border: 2px solid #f0f0f0;">
                        <h4 style="color: #e91e63; font-weight: 700; margin-bottom: 15px; font-size: 16px;">
                            Complementary Services</h4>
                        <ul style="list-style: none; padding: 0;">
                            <li style="margin-bottom: 10px;"><a href="service-microdermabrasion.php"
                                    style="color: #555; text-decoration: none; transition: all 0.3s ease;">→
                                    Microdermabrasion</a></li>
                            <li style="margin-bottom: 10px;"><a href="service-chemical-peeling.php"
                                    style="color: #555; text-decoration: none; transition: all 0.3s ease;">→ Chemical
                                    Peeling</a></li>
                            <li style="margin-bottom: 10px;"><a href="service-skin-analysis.php"
                                    style="color: #555; text-decoration: none; transition: all 0.3s ease;">→ Skin
                                    Analysis</a></li>
                            <li><a href="services.php"
                                    style="color: #e91e63; font-weight: 600; text-decoration: none; transition: all 0.3s ease;">View
                                    All Services →</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <?php include 'common/footer.php' ?>
</body>

</html>