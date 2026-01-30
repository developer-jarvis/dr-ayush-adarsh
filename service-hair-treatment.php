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
        ['label' => 'Hair Analysis', 'url' => null]
    ];
    $pageTitle = "Hair Treatment";
    $pageSubtitle = "Comprehensive Hair Health Diagnostic Assessment";
    include 'common/breadcrumb.php';
    ?>

    <style>
        .image-overlay-wrapper {
            position: relative;
            border-radius: 12px;
            overflow: hidden;
        }

        .icon-overlay {
            position: absolute;
            inset: 0;
            background: linear-gradient(135deg, rgba(216, 67, 21, 0.5) 0%, rgba(255, 183, 77, 0.5) 100%);
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            text-align: center;
        }

        .icon-overlay i {
            font-size: 70px;
            color: #ffff !important;
            opacity: 0.8;
        }

        .icon-overlay p {
            margin-top: 12px;
            color: white;
            font-weight: 600;
        }
    </style>
    <!-- Service Content -->
    <section class="section-padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">

                    <div class="image-overlay-wrapper mb-3">
                        <img src="assets/images/services/hair-analysis.jpg" alt="Professional Hair Treatment"
                            class="img-fluid w-100">

                        <div class="icon-overlay">
                            <i class="fa-solid fa-syringe"></i>
                            <p>Advanced Hair Treatment Solutions</p>
                        </div>
                    </div>

                    <h2 style="font-size: 32px; font-weight: 700; color: #d84315; margin-bottom: 20px;">
                        Professional Hair Treatment
                    </h2>

                    <p style="color: #555; line-height: 1.8; margin-bottom: 15px;">
                        Our professional hair treatment services are designed to effectively manage hair fall, thinning,
                        scalp disorders, and weak hair roots. Each treatment plan is personalized to restore hair
                        strength,
                        improve growth, and maintain long-term scalp health using clinically proven techniques.
                    </p>

                    <h3 style="color: #333; font-weight: 600; margin-top: 30px; margin-bottom: 15px; font-size: 20px;">
                        Hair Conditions We Treat
                    </h3>

                    <ul style="color: #555; line-height: 2; margin-bottom: 25px; padding-left: 25px;">
                        <li><strong>Hair Fall & Thinning:</strong> Excessive daily shedding and volume loss</li>
                        <li><strong>Pattern Hair Loss:</strong> Male and female genetic hair loss</li>
                        <li><strong>Weak & Damaged Hair:</strong> Brittle, dry, and chemically treated hair</li>
                        <li><strong>Scalp Disorders:</strong> Dandruff, itching, and infections</li>
                        <li><strong>Patchy Hair Loss:</strong> Alopecia-related conditions</li>
                        <li><strong>Slow Hair Growth:</strong> Reduced growth cycle activity</li>
                    </ul>

                    <h3 style="color: #333; font-weight: 600; margin-bottom: 15px; font-size: 20px;">
                        Our Hair Treatment Approach
                    </h3>

                    <div style="background: #f8f9fa; padding: 20px; border-radius: 8px; margin-bottom: 25px;">
                        <ul style="color: #555; line-height: 2; padding-left: 25px; margin: 0;">
                            <li>Root cause based treatment planning</li>
                            <li>Combination of medical and advanced therapies</li>
                            <li>Customized treatment duration and dosage</li>
                            <li>Non-surgical and surgical solutions if required</li>
                            <li>Continuous monitoring for optimal results</li>
                            <li>Long-term hair maintenance guidance</li>
                        </ul>
                    </div>

                    <h3 style="color: #333; font-weight: 600; margin-top: 30px; margin-bottom: 15px; font-size: 20px;">
                        Hair Treatment Options Available
                    </h3>

                    <ul style="color: #555; line-height: 2; margin-bottom: 25px; padding-left: 25px;">
                        <li><strong>Medical Hair Therapy:</strong> Topical and oral medications</li>
                        <li><strong>PRP Therapy:</strong> Platelet-rich plasma for hair regrowth</li>
                        <li><strong>Growth Factor Therapy:</strong> Advanced regenerative treatment</li>
                        <li><strong>Mesotherapy:</strong> Nutrient infusion for hair follicles</li>
                        <li><strong>Scalp Treatments:</strong> Anti-dandruff and scalp detox therapies</li>
                        <li><strong>Hair Transplant Planning:</strong> Suitability and density assessment</li>
                    </ul>

                    <h3 style="color: #333; font-weight: 600; margin-bottom: 15px; font-size: 20px;">
                        Benefits of Hair Treatment
                    </h3>

                    <div
                        style="background: linear-gradient(135deg, #ffd7a8 0%, #ffb74d 100%); padding: 20px; border-radius: 8px;">
                        <ul style="color: #555; line-height: 2; padding-left: 25px; margin: 0;">
                            <li>Noticeable reduction in hair fall</li>
                            <li>Improved hair thickness and strength</li>
                            <li>Healthier and balanced scalp</li>
                            <li>Better hair growth cycle</li>
                            <li>Long-lasting and natural results</li>
                            <li>Personalized care and guidance</li>
                        </ul>
                    </div>

                    <h3 style="color: #333; font-weight: 600; margin-top: 30px; margin-bottom: 15px; font-size: 20px;">
                        Treatment Duration & Follow-Up
                    </h3>

                    <p style="color: #555; line-height: 1.8; margin-bottom: 15px;">
                        Most hair treatments show visible improvement within 8–12 weeks, with optimal results seen over
                        3–6 months. Regular follow-ups help track progress, adjust therapies, and maintain long-term
                        hair
                        health.
                    </p>

                </div>

                <div class="col-lg-4">
                    <div
                        style="background: linear-gradient(135deg, #d84315 0%, #bf360c 100%); color: #fff; border-radius: 12px; padding: 30px; margin-bottom: 30px; box-shadow: 0 10px 30px rgba(216, 67, 21, 0.3);">
                        <h3 style="font-size: 20px; font-weight: 700; margin-bottom: 15px;">
                            Start Hair Treatment
                        </h3>
                        <p style="margin-bottom: 20px;">
                            Restore your hair health with expert care.
                        </p>
                        <a href="contact.php#appointment" class="btn-secondary-custom"
                            style="background-color: #fff; color: #d84315; border: none; display: block; text-align: center; width: 100%; padding: 12px; border-radius: 8px; font-weight: 600;">
                            Book Treatment
                        </a>
                    </div>

                    <div style="background: #f5f5f5; border-radius: 12px; padding: 25px;">
                        <h4 style="color: #d84315; font-weight: 700; margin-bottom: 15px;">
                            Treatment Includes
                        </h4>
                        <ul style="list-style: none; padding: 0; margin: 0;">
                            <li style="margin-bottom: 10px;">✓ Condition evaluation</li>
                            <li style="margin-bottom: 10px;">✓ Personalized treatment plan</li>
                            <li style="margin-bottom: 10px;">✓ Medical therapies</li>
                            <li style="margin-bottom: 10px;">✓ Advanced procedures</li>
                            <li style="margin-bottom: 10px;">✓ Progress monitoring</li>
                            <li>✓ Expert consultation</li>
                        </ul>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <?php include 'common/footer.php' ?>
</body>

</html>