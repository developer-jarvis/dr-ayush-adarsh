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
        ['label' => 'Electro Surgery', 'url' => null]
    ];
    $pageTitle = "Electro Surgery";
    $pageSubtitle = "Precision Electrical Surgical Lesion Removal";
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
            background: linear-gradient(135deg, rgba(245, 124, 0, 0.5) 0%, rgba(229, 81, 0, 0.5) 100%);
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            text-align: center;
        }

        .icon-overlay i {
            font-size: 70px;
            color: #f57c00 !important;
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
                        <img src="assets/images/services/electro-surgery.jpg" alt="Professional Skin Exfoliation"
                            class="img-fluid w-100">

                        <div class="icon-overlay">
                            <i class="fa-solid fa-bolt"></i>
                            <p>Expert Pathological Tissue
                                Examination</p>
                        </div>
                    </div>
`

                    <h2 style="font-size: 32px; font-weight: 700; color: #f57c00; margin-bottom: 20px;">Precision
                        Electrosurgery</h2>
                    <p style="color: #555; line-height: 1.8; margin-bottom: 15px;">Electrosurgery uses controlled
                        electrical current to precisely remove skin lesions, growths, and other abnormalities. This
                        advanced technique provides excellent hemostasis and minimal scarring while offering remarkable
                        precision for dermatological procedures.</p>

                    <h3 style="color: #333; font-weight: 600; margin-top: 30px; margin-bottom: 15px; font-size: 20px;">
                        Electrosurgical Techniques</h3>
                    <ul style="color: #555; line-height: 2; margin-bottom: 25px; padding-left: 25px;">
                        <li><strong>Cutting Mode:</strong> Incision with minimal tissue damage</li>
                        <li><strong>Coagulation Mode:</strong> Hemostasis and tissue destruction</li>
                        <li><strong>Desiccation:</strong> Surface lesion removal</li>
                        <li><strong>Fulguration:</strong> Sparking technique for deeper penetration</li>
                        <li><strong>Blend Mode:</strong> Combined cutting and coagulation</li>
                    </ul>

                    <h3 style="color: #333; font-weight: 600; margin-bottom: 15px; font-size: 20px;">Conditions
                        Successfully Treated</h3>
                    <div style="background: #f8f9fa; padding: 20px; border-radius: 8px; margin-bottom: 25px;">
                        <ul style="color: #555; line-height: 2; padding-left: 25px; margin: 0;">
                            <li>Verrucae (warts)</li>
                            <li>Seborrheic keratosis</li>
                            <li>Angiomas (blood vessel lesions)</li>
                            <li>Xanthelasma (cholesterol deposits)</li>
                            <li>Benign skin tags</li>
                            <li>Pyogenic granulomas</li>
                        </ul>
                    </div>

                    <h3 style="color: #333; font-weight: 600; margin-top: 30px; margin-bottom: 15px; font-size: 20px;">
                        Procedure Advantages</h3>
                    <ul style="color: #555; line-height: 2; margin-bottom: 25px; padding-left: 25px;">
                        <li><strong>Precision Control:</strong> Exact depth and extent of tissue removal</li>
                        <li><strong>Hemostasis:</strong> Built-in bleeding control</li>
                        <li><strong>Minimal Scarring:</strong> Precise technique reduces scar formation</li>
                        <li><strong>Rapid Healing:</strong> Clean wound edges promote fast recovery</li>
                        <li><strong>Reduced Infection:</strong> Cauterization sterilizes tissue</li>
                    </ul>

                    <h3 style="color: #333; font-weight: 600; margin-bottom: 15px; font-size: 20px;">Treatment Process
                    </h3>
                    <div style="background: #f8f9fa; padding: 20px; border-radius: 8px; margin-bottom: 25px;">
                        <p style="color: #555; line-height: 1.8; margin: 0;"><strong>Step 1:</strong> Local anesthesia
                            application<br><strong>Step 2:</strong> Area cleansing and sterile
                            preparation<br><strong>Step 3:</strong> Precise electrical current
                            application<br><strong>Step 4:</strong> Dressing application and aftercare instructions</p>
                    </div>

                    <h3 style="color: #333; font-weight: 600; margin-bottom: 15px; font-size: 20px;">Recovery Timeline
                    </h3>
                    <ul style="color: #555; line-height: 2; margin-bottom: 25px; padding-left: 25px;">
                        <li><strong>Immediate:</strong> Minimal bleeding due to hemostasis</li>
                        <li><strong>1-3 Days:</strong> Scab formation (protective layer)</li>
                        <li><strong>1-2 Weeks:</strong> Scab naturally falls off</li>
                        <li><strong>2-3 Weeks:</strong> Minimal pink skin appears</li>
                        <li><strong>1-3 Months:</strong> Final scar maturation and fading</li>
                    </ul>

                    <h3 style="color: #333; font-weight: 600; margin-bottom: 15px; font-size: 20px;">Safety & Aftercare
                    </h3>
                    <div
                        style="background: linear-gradient(135deg, #fff3e0 0%, #ffe0b2 100%); padding: 20px; border-radius: 8px;">
                        <ul style="color: #555; line-height: 2; padding-left: 25px; margin: 0;">
                            <li>FDA-approved and dermatologically tested</li>
                            <li>Suitable for all skin types</li>
                            <li>Keep wound clean and dry</li>
                            <li>Use provided wound care cream</li>
                            <li>Avoid water immersion for 24 hours</li>
                            <li>Sun protection for healed area</li>
                        </ul>
                    </div>
                </div>

                <div class="col-lg-4">
                    <div
                        style="background: linear-gradient(135deg, #f57c00 0%, #e65100 100%); color: #fff; border-radius: 12px; padding: 30px; margin-bottom: 30px; box-shadow: 0 10px 30px rgba(245, 124, 0, 0.3);">
                        <h3 style="font-size: 20px; font-weight: 700; margin-bottom: 15px;">Schedule Surgery</h3>
                        <p style="margin-bottom: 20px;">Expert precision lesion removal.</p>
                        <a href="contact.php#appointment" class="btn-secondary-custom"
                            style="background-color: #fff; color: #f57c00; border: none; display: block; text-align: center; width: 100%; padding: 12px; border-radius: 8px; font-weight: 600;">Book
                            Now</a>
                    </div>

                    <div style="background: #f5f5f5; border-radius: 12px; padding: 25px;">
                        <h4 style="color: #f57c00; font-weight: 700; margin-bottom: 15px;">Treats</h4>
                        <ul style="list-style: none; padding: 0; margin: 0;">
                            <li style="margin-bottom: 10px;">✓ Warts</li>
                            <li style="margin-bottom: 10px;">✓ Skin tags</li>
                            <li style="margin-bottom: 10px;">✓ Growths</li>
                            <li style="margin-bottom: 10px;">✓ Lesions</li>
                            <li style="margin-bottom: 10px;">✓ Angiomas</li>
                            <li>✓ Safe & precise</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <?php include 'common/footer.php' ?>
</body>

</html>