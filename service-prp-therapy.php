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
        ['label' => 'PRP Therapy', 'url' => null]
    ];
    $pageTitle = "PRP Therapy";
    $pageSubtitle = "Platelet-Rich Plasma Regenerative Treatment";
    include 'common/breadcrumb.php';
    ?>

    <!-- Service Content -->
    <section class="section-padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">

                    <div class="image-overlay-wrapper mb-3">
                        <img src="assets/images/services/prp-therapy.jpg" alt="PRP Therapy" class="img-fluid w-100">

                        <div class="icon-overlay">
                            <i class="fa-solid fa-syringe"></i>
                            <p>PRP Therapy Services</p>
                        </div>
                    </div>
                    

                    <h2 style="font-size: 32px; font-weight: 700; color: #e91e63; margin-bottom: 20px;">Platelet-Rich
                        Plasma Therapy</h2>
                    <p style="color: #555; line-height: 1.8; margin-bottom: 15px;">PRP therapy is a revolutionary
                        regenerative treatment that harnesses your body's natural healing factors to stimulate hair
                        growth and rejuvenate the skin. This cutting-edge therapy uses your own platelet-rich plasma to
                        activate growth factors and promote cellular regeneration, delivering natural and long-lasting
                        results.</p>

                    <h3 style="color: #333; font-weight: 600; margin-top: 30px; margin-bottom: 15px; font-size: 20px;">
                        How PRP Works</h3>
                    <p style="color: #555; line-height: 1.8; margin-bottom: 15px;">PRP is extracted from your blood
                        through a simple centrifugation process. The concentrated platelets release growth factors that
                        stimulate hair follicles, promote collagen production, and accelerate tissue repair. This
                        completely natural approach works with your body's own healing mechanisms.</p>

                    <h3 style="color: #333; font-weight: 600; margin-bottom: 15px; font-size: 20px;">PRP Applications
                    </h3>
                    <ul style="color: #555; line-height: 2; margin-bottom: 25px; padding-left: 25px;">
                        <li><strong>Hair Loss Treatment:</strong> Stimulates dormant hair follicles for natural regrowth
                        </li>
                        <li><strong>Hair Density Enhancement:</strong> Increases hair volume and thickness</li>
                        <li><strong>Skin Rejuvenation:</strong> Promotes collagen production for youthful skin</li>
                        <li><strong>Acne Scar Treatment:</strong> Accelerates skin healing and remodeling</li>
                        <li><strong>Fine Lines Reduction:</strong> Natural anti-aging effects</li>
                        <li><strong>Under-Eye Treatment:</strong> Rejuvenates delicate under-eye area</li>
                    </ul>

                    <h3 style="color: #333; font-weight: 600; margin-bottom: 15px; font-size: 20px;">Why Choose PRP
                        Therapy?</h3>
                    <div style="background: #f8f9fa; padding: 20px; border-radius: 8px; margin-bottom: 25px;">
                        <ul style="color: #555; line-height: 2; padding-left: 25px; margin: 0;">
                            <li><strong>100% Natural:</strong> Uses your own blood - no synthetic substances</li>
                            <li><strong>Safe & Tested:</strong> FDA-approved procedure with proven efficacy</li>
                            <li><strong>Minimal Side Effects:</strong> Few allergies or adverse reactions</li>
                            <li><strong>Long-Lasting Results:</strong> Effects improve over time</li>
                            <li><strong>Customizable Treatment:</strong> Tailored to your specific needs</li>
                        </ul>
                    </div>

                    <h3 style="color: #333; font-weight: 600; margin-top: 30px; margin-bottom: 15px; font-size: 20px;">
                        Treatment Process</h3>
                    <p style="color: #555; line-height: 1.8; margin-bottom: 15px;"><strong>Blood Collection:</strong> A
                        small amount of blood is drawn. PRP is processed through centrifugation. Concentrated PRP is
                        injected into target areas. No downtime required.</p>

                    <h3 style="color: #333; font-weight: 600; margin-top: 30px; margin-bottom: 15px; font-size: 20px;">
                        Results Timeline</h3>
                    <p style="color: #555; line-height: 1.8; margin-bottom: 10px;"><strong>1-2 Weeks:</strong> Initial
                        response begins</p>
                    <p style="color: #555; line-height: 1.8; margin-bottom: 10px;"><strong>4-8 Weeks:</strong>
                        Noticeable improvement</p>
                    <p style="color: #555; line-height: 1.8;"><strong>3-6 Months:</strong> Full results achieved</p>
                </div>

                <div class="col-lg-4">
                    <div
                        style="background: linear-gradient(135deg, #e91e63 0%, #d81b60 100%); color: #fff; border-radius: 12px; padding: 30px; margin-bottom: 30px; box-shadow: 0 10px 30px rgba(233, 30, 99, 0.3);">
                        <h3 style="font-size: 20px; font-weight: 700; margin-bottom: 15px;">Start PRP Therapy</h3>
                        <p style="margin-bottom: 20px;">Experience natural regeneration today.</p>
                        <a href="contact.php#appointment" class="btn-secondary-custom"
                            style="background-color: #fff; color: #e91e63; border: none; display: block; text-align: center; width: 100%; padding: 12px; border-radius: 8px; font-weight: 600;">Book
                            Now</a>
                    </div>

                    <div style="background: #f5f5f5; border-radius: 12px; padding: 25px;">
                        <h4 style="color: #e91e63; font-weight: 700; margin-bottom: 15px;">Benefits</h4>
                        <ul style="list-style: none; padding: 0; margin: 0;">
                            <li style="margin-bottom: 10px;">✓ Natural hair regrowth</li>
                            <li style="margin-bottom: 10px;">✓ Enhanced volume</li>
                            <li style="margin-bottom: 10px;">✓ Skin rejuvenation</li>
                            <li style="margin-bottom: 10px;">✓ No side effects</li>
                            <li style="margin-bottom: 10px;">✓ Quick recovery</li>
                            <li>✓ Long-lasting</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <?php include 'common/footer.php' ?>
</body>

</html>