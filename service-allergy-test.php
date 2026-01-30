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
        ['label' => 'Allergy Test', 'url' => null]
    ];
    $pageTitle = "Allergy Test";
    $pageSubtitle = "Comprehensive Allergy Testing Services";
    include 'common/breadcrumb.php';
    ?>

    <section class="section-padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">

                    <div class="image-overlay-wrapper mb-3">
                        <img src="assets/images/services/allergy-treatment.jpg" alt="PRP Therapy" class="img-fluid w-100">

                        <div class="icon-overlay">
                            <i class="fas fa-allergies"></i>
                            <p>Allergy Testing Services</p>
                        </div>
                    </div>

                    <h2 style="font-size: 32px; font-weight: 700; color: #e91e63; margin-bottom: 20px;">Comprehensive
                        Allergy Testing & Diagnosis</h2>
                    <p style="color: #555; line-height: 1.8; margin-bottom: 15px;">Our advanced allergy testing services
                        help identify allergens causing your skin reactions and discomfort. Using cutting-edge
                        diagnostic techniques, we pinpoint specific triggers and develop personalized treatment plans to
                        prevent future allergic reactions and manage your skin health effectively.</p>

                    <h3 style="color: #333; font-weight: 600; margin-top: 30px; margin-bottom: 15px; font-size: 20px;">
                        Types of Allergens We Test For:</h3>
                    <ul style="color: #555; line-height: 2; margin-bottom: 25px; padding-left: 25px;">
                        <li><strong>Contact Allergens:</strong> Nickel, chromium, rubber, and other direct skin
                            contactants</li>
                        <li><strong>Cosmetic Ingredients:</strong> Fragrances, preservatives, dyes, and emulsifiers</li>
                        <li><strong>Topical Medications:</strong> Antibiotics and other medicinal compounds</li>
                        <li><strong>Natural Allergens:</strong> Plant oils, essential oils, and botanical extracts</li>
                        <li><strong>Occupational Allergens:</strong> Work-related substances causing dermatitis</li>
                        <li><strong>Food-Related Reactions:</strong> Oral allergic syndrome and food-triggered
                            dermatitis</li>
                    </ul>

                    <h3 style="color: #333; font-weight: 600; margin-bottom: 15px; font-size: 20px;">Allergy Testing
                        Methods</h3>
                    <p style="color: #555; line-height: 1.8; margin-bottom: 15px;"><strong>Patch Testing:</strong> Gold
                        standard for contact allergen identification. Small amounts of suspected allergens are applied
                        to the skin under patches and observed for reactions over 48-96 hours.</p>
                    <p style="color: #555; line-height: 1.8; margin-bottom: 15px;"><strong>Prick Testing:</strong> Quick
                        test for IgE-mediated allergies. Small amounts of allergen are pricked into the skin to observe
                        immediate reactions.</p>
                    <p style="color: #555; line-height: 1.8;">Ayush Adarsh selects the appropriate testing method based
                        on your symptoms and medical history.</p>

                    <h3 style="color: #333; font-weight: 600; margin-top: 30px; margin-bottom: 15px; font-size: 20px;">
                        Benefits of Allergy Testing</h3>
                    <div style="background: #f8f9fa; padding: 20px; border-radius: 8px; margin-bottom: 25px;">
                        <ul style="color: #555; line-height: 2; padding-left: 25px; margin: 0;">
                            <li><strong>Identify Triggers:</strong> Discover exactly what's causing your allergic
                                reactions</li>
                            <li><strong>Prevent Reactions:</strong> Avoid offending substances in the future</li>
                            <li><strong>Treatment Planning:</strong> Develop targeted treatment strategies</li>
                            <li><strong>Workplace Safety:</strong> Essential for occupational dermatitis management</li>
                            <li><strong>Product Selection:</strong> Make informed choices about skincare and cosmetics
                            </li>
                        </ul>
                    </div>

                    <h3 style="color: #333; font-weight: 600; margin-bottom: 15px; font-size: 20px;">The Testing Process
                    </h3>
                    <p style="color: #555; line-height: 1.8; margin-bottom: 15px;"><strong>Initial
                            Consultation:</strong> Detailed discussion of your allergy symptoms, suspected triggers, and
                        medical history.</p>
                    <p style="color: #555; line-height: 1.8; margin-bottom: 15px;"><strong>Test Application:</strong>
                        Based on your history, Ayush Adarsh applies appropriate allergen panels.</p>
                    <p style="color: #555; line-height: 1.8; margin-bottom: 15px;"><strong>Observation Period:</strong>
                        Reactions are evaluated at 48 and 96 hours for patch tests.</p>
                    <p style="color: #555; line-height: 1.8;"><strong>Results & Recommendations:</strong> Detailed
                        report with allergen identification and avoidance strategies.</p>

                    <h3 style="color: #333; font-weight: 600; margin-top: 30px; margin-bottom: 15px; font-size: 20px;">
                        Common Allergens Detected</h3>
                    <p style="color: #555; line-height: 1.8; margin-bottom: 10px;"><strong>Most Frequent
                            Allergens:</strong> Nickel (jewelry, watches), fragrance mix, preservatives (parabens,
                        formaldehyde), PPD (hair dye), cobalt, lanolin, and neomycin.</p>
                    <p style="color: #555; line-height: 1.8;">Identifying your specific allergens helps you make better
                        personal care choices and prevents chronic allergic dermatitis.
                </div>

                <div class="col-lg-4">
                    <div
                        style="background: linear-gradient(135deg, #e91e63 0%, #d81b60 100%); color: #fff; border-radius: 12px; padding: 30px; margin-bottom: 30px;">
                        <h3 style="font-size: 20px; font-weight: 700; margin-bottom: 15px;">Get Tested Today</h3>
                        <a href="contact.php#appointment" class="btn-secondary-custom"
                            style="background-color: #fff; color: #e91e63; border: none; display: block; text-align: center; width: 100%;">Book
                            Test</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <?php include 'common/footer.php' ?>
</body>

</html>