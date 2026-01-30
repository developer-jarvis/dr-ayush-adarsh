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
        ['label' => 'Skin Analysis', 'url' => null]
    ];
    $pageTitle = "Skin Treatment";
    $pageSubtitle = "Advanced Digital Skin Diagnostic Assessment";
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
            background: linear-gradient(135deg, rgba(0, 151, 167, 0.5) 0%, rgba(0, 96, 100, 0.5) 100%);
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            text-align: center;
        }

        .icon-overlay i {
            font-size: 70px;
            color: white !important;
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
                        <img src="assets/images/services/skin-analysis.jpg" alt="Professional Skin Treatment"
                            class="img-fluid w-100">

                        <div class="icon-overlay">
                            <i class="fa-solid fa-spa"></i>
                            <p>Advanced Skin Treatment Solutions</p>
                        </div>
                    </div>

                    <h2 style="font-size: 32px; font-weight: 700; color: #0097a7; margin-bottom: 20px;">
                        Professional Skin Treatment
                    </h2>

                    <p style="color: #555; line-height: 1.8; margin-bottom: 15px;">
                        Our professional skin treatment services are designed to improve skin texture, tone, hydration,
                        and overall health. Using clinically proven techniques and customized treatment protocols, we
                        address both surface-level concerns and underlying skin conditions for long-lasting results.
                    </p>

                    <h3 style="color: #333; font-weight: 600; margin-top: 30px; margin-bottom: 15px; font-size: 20px;">
                        Skin Concerns We Treat
                    </h3>

                    <ul style="color: #555; line-height: 2; margin-bottom: 25px; padding-left: 25px;">
                        <li><strong>Acne & Acne Marks:</strong> Active breakouts and post-acne pigmentation</li>
                        <li><strong>Pigmentation & Dark Spots:</strong> Uneven skin tone and sun damage</li>
                        <li><strong>Dull & Dehydrated Skin:</strong> Loss of glow and moisture imbalance</li>
                        <li><strong>Aging Skin:</strong> Fine lines, wrinkles, and reduced elasticity</li>
                        <li><strong>Sensitive Skin:</strong> Redness, irritation, and barrier damage</li>
                        <li><strong>Uneven Texture:</strong> Rough skin and enlarged pores</li>
                    </ul>

                    <h3 style="color: #333; font-weight: 600; margin-bottom: 15px; font-size: 20px;">
                        Our Skin Treatment Approach
                    </h3>

                    <div style="background: #f8f9fa; padding: 20px; border-radius: 8px; margin-bottom: 25px;">
                        <ul style="color: #555; line-height: 2; padding-left: 25px; margin: 0;">
                            <li>Personalized treatment planning based on skin condition</li>
                            <li>Combination of medical and aesthetic procedures</li>
                            <li>Use of dermatologist-approved products and techniques</li>
                            <li>Safe, non-invasive and minimally invasive options</li>
                            <li>Step-by-step improvement focused care</li>
                            <li>Ongoing monitoring and treatment adjustment</li>
                        </ul>
                    </div>

                    <h3 style="color: #333; font-weight: 600; margin-top: 30px; margin-bottom: 15px; font-size: 20px;">
                        Skin Treatment Options Available
                    </h3>

                    <ul style="color: #555; line-height: 2; margin-bottom: 25px; padding-left: 25px;">
                        <li><strong>Medical Facials:</strong> Deep cleansing and skin rejuvenation</li>
                        <li><strong>Chemical Peels:</strong> Treatment for pigmentation and acne</li>
                        <li><strong>Laser Treatments:</strong> Skin resurfacing and tone correction</li>
                        <li><strong>Hydra & Glow Therapies:</strong> Intense hydration and radiance</li>
                        <li><strong>Anti-Aging Procedures:</strong> Collagen boosting treatments</li>
                        <li><strong>Acne Control Therapy:</strong> Oil regulation and breakout prevention</li>
                    </ul>

                    <h3 style="color: #333; font-weight: 600; margin-bottom: 15px; font-size: 20px;">
                        Benefits of Skin Treatment
                    </h3>

                    <div
                        style="background: linear-gradient(135deg, #b3e5fc 0%, #80deea 100%); padding: 20px; border-radius: 8px;">
                        <ul style="color: #555; line-height: 2; padding-left: 25px; margin: 0;">
                            <li>Clearer and healthier-looking skin</li>
                            <li>Improved texture and even skin tone</li>
                            <li>Reduced acne, pigmentation, and marks</li>
                            <li>Enhanced hydration and natural glow</li>
                            <li>Delayed signs of aging</li>
                            <li>Customized long-term skin care plan</li>
                        </ul>
                    </div>

                    <h3 style="color: #333; font-weight: 600; margin-top: 30px; margin-bottom: 15px; font-size: 20px;">
                        Treatment Duration & Follow-Up
                    </h3>

                    <p style="color: #555; line-height: 1.8; margin-bottom: 15px;">
                        Skin treatment results vary based on skin type and concern. Visible improvement is usually noticed
                        within a few sessions, while optimal results develop over 3–6 months. Regular follow-ups ensure
                        consistent progress and help maintain healthy skin.
                    </p>
                </div>

                <div class="col-lg-4">
                    <div
                        style="background: linear-gradient(135deg, #0097a7 0%, #006064 100%); color: #fff; border-radius: 12px; padding: 30px; margin-bottom: 30px; box-shadow: 0 10px 30px rgba(0, 151, 167, 0.3);">
                        <h3 style="font-size: 20px; font-weight: 700; margin-bottom: 15px;">
                            Start Skin Treatment
                        </h3>
                        <p style="margin-bottom: 20px;">
                            Achieve healthy, glowing skin with expert care.
                        </p>
                        <a href="contact.php#appointment" class="btn-secondary-custom"
                            style="background-color: #fff; color: #0097a7; border: none; display: block; text-align: center; width: 100%; padding: 12px; border-radius: 8px; font-weight: 600;">
                            Book Treatment
                        </a>
                    </div>

                    <div style="background: #f5f5f5; border-radius: 12px; padding: 25px;">
                        <h4 style="color: #0097a7; font-weight: 700; margin-bottom: 15px;">
                            Treatment Includes
                        </h4>
                        <ul style="list-style: none; padding: 0; margin: 0;">
                            <li style="margin-bottom: 10px;">✓ Skin condition evaluation</li>
                            <li style="margin-bottom: 10px;">✓ Personalized treatment plan</li>
                            <li style="margin-bottom: 10px;">✓ Professional procedures</li>
                            <li style="margin-bottom: 10px;">✓ Product & care guidance</li>
                            <li style="margin-bottom: 10px;">✓ Follow-up sessions</li>
                            <li>✓ Expert dermatology support</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <?php include 'common/footer.php' ?>
</body>

</html>