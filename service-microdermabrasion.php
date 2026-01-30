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
        ['label' => 'Microdermabrasion', 'url' => null]
    ];
    $pageTitle = "Microdermabrasion";
    $pageSubtitle = "Advanced Mechanical Skin Exfoliation & Rejuvenation";
    include 'common/breadcrumb.php'; 
    ?>

    <!-- Service Content -->
    <section class="section-padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">

                    <div class="image-overlay-wrapper mb-3">
                        <img src="assets/images/services/microdermabrasion-treatment.jpg"
                            alt="Professional Skin Exfoliation" class="img-fluid w-100">

                        <div class="icon-overlay">
                            <i class="fa-solid fa-spa"></i>
                            <p>Professional Skin Exfoliation</p>
                        </div>
                    </div>

                    <h2 style="font-size: 32px; font-weight: 700; color: #e91e63; margin-bottom: 20px;">Professional
                        Microdermabrasion</h2>
                    <p style="color: #555; line-height: 1.8; margin-bottom: 15px;">Microdermabrasion is a non-invasive
                        mechanical exfoliation procedure that removes the outermost layer of dead skin cells, revealing
                        fresh, youthful skin underneath. This effective treatment promotes natural skin renewal and
                        reveals brighter, smoother skin texture.</p>

                    <h3 style="color: #333; font-weight: 600; margin-top: 30px; margin-bottom: 15px; font-size: 20px;">
                        Microdermabrasion Benefits</h3>
                    <ul style="color: #555; line-height: 2; margin-bottom: 25px; padding-left: 25px;">
                        <li><strong>Acne Scar Treatment:</strong> Significant improvement in scar appearance</li>
                        <li><strong>Fine Lines & Wrinkles:</strong> Reduces appearance and promotes collagen</li>
                        <li><strong>Pigmentation Control:</strong> Fades age spots and uneven skin tone</li>
                        <li><strong>Skin Texture:</strong> Smooths rough skin and improves overall texture</li>
                        <li><strong>Pore Refinement:</strong> Minimizes enlarged pores</li>
                        <li><strong>Brightening:</strong> Reveals glowing, radiant skin</li>
                    </ul>

                    <h3 style="color: #333; font-weight: 600; margin-bottom: 15px; font-size: 20px;">How
                        Microdermabrasion Works</h3>
                    <p style="color: #555; line-height: 1.8; margin-bottom: 15px;">A handheld device with a
                        diamond-coated tip gently abrades the skin surface using controlled mechanical action. This
                        controlled exfoliation removes dead skin cells and stimulates collagen production beneath the
                        surface, encouraging natural skin renewal and rejuvenation.</p>

                    <h3 style="color: #333; font-weight: 600; margin-top: 30px; margin-bottom: 15px; font-size: 20px;">
                        Treatment Advantages</h3>
                    <div style="background: #f8f9fa; padding: 20px; border-radius: 8px; margin-bottom: 25px;">
                        <ul style="color: #555; line-height: 2; padding-left: 25px; margin: 0;">
                            <li>Non-invasive - no incisions or injections</li>
                            <li>No downtime - resume activities immediately</li>
                            <li>Safe for all skin types</li>
                            <li>No anesthesia required</li>
                            <li>Painless procedure</li>
                            <li>Immediate visible results</li>
                        </ul>
                    </div>

                    <h3 style="color: #333; font-weight: 600; margin-bottom: 15px; font-size: 20px;">Treatment Sessions
                        & Recovery</h3>
                    <p style="color: #555; line-height: 1.8; margin-bottom: 15px;">Each session lasts 30-45 minutes.
                        Most patients see results after the first treatment, with optimal results after 4-6 sessions
                        spaced 2-3 weeks apart. Minimal downtime with slight redness that fades within hours. Regular
                        maintenance sessions keep skin looking fresh and youthful.</p>
                </div>

                <div class="col-lg-4">
                    <div
                        style="background: linear-gradient(135deg, #e91e63 0%, #d81b60 100%); color: #fff; border-radius: 12px; padding: 30px; margin-bottom: 30px; box-shadow: 0 10px 30px rgba(233, 30, 99, 0.3);">
                        <h3 style="font-size: 20px; font-weight: 700; margin-bottom: 15px;">Schedule Exfoliation</h3>
                        <p style="margin-bottom: 20px;">Reveal your best skin today.</p>
                        <a href="contact.php#appointment" class="btn-secondary-custom"
                            style="background-color: #fff; color: #e91e63; border: none; display: block; text-align: center; width: 100%; padding: 12px; border-radius: 8px; font-weight: 600;">Book
                            Now</a>
                    </div>

                    <div style="background: #f5f5f5; border-radius: 12px; padding: 25px;">
                        <h4 style="color: #e91e63; font-weight: 700; margin-bottom: 15px;">Perfect For</h4>
                        <ul style="list-style: none; padding: 0; margin: 0;">
                            <li style="margin-bottom: 10px;">✓ Acne scars</li>
                            <li style="margin-bottom: 10px;">✓ Fine lines</li>
                            <li style="margin-bottom: 10px;">✓ Dark spots</li>
                            <li style="margin-bottom: 10px;">✓ Rough texture</li>
                            <li style="margin-bottom: 10px;">✓ Dull skin</li>
                            <li>✓ All ages</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <?php include 'common/footer.php' ?>
</body>

</html>