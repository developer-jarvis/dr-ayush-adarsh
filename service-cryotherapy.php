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
        ['label' => 'Cryotherapy', 'url' => null]
    ];
    $pageTitle = "Cryotherapy";
    $pageSubtitle = "Advanced Cold Therapy for Skin Lesions & Rejuvenation";
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
    background: linear-gradient(135deg, rgba(2, 136, 209, 0.1) 0%, rgba(2, 119, 189, 0.2) 100%);
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    text-align: center;
}

.icon-overlay i {
    font-size: 70px;
    color: #0288d1 !important;
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
                        <img src="assets/images/services/cryotherapy.jpg"
                            alt="Professional Skin Exfoliation" class="img-fluid w-100">

                        <div class="icon-overlay">
                            <i class="fa-solid fa-snowflake"></i>
                            <p>Targeted Cold Therapy Treatment</p>
                        </div>
                    </div>
                    

                    <h2 style="font-size: 32px; font-weight: 700; color: #0288d1; margin-bottom: 20px;">Advanced Cryotherapy Solutions</h2>
                    <p style="color: #555; line-height: 1.8; margin-bottom: 15px;">Cryotherapy harnesses the power of extreme cold to safely remove unwanted skin lesions, warts, and age spots. This precise, effective treatment uses controlled freezing to destroy abnormal skin cells while preserving surrounding healthy tissue.</p>

                    <h3 style="color: #333; font-weight: 600; margin-top: 30px; margin-bottom: 15px; font-size: 20px;">Conditions Treated</h3>
                    <ul style="color: #555; line-height: 2; margin-bottom: 25px; padding-left: 25px;">
                        <li><strong>Warts:</strong> Common, plantar, and flat warts removal</li>
                        <li><strong>Age Spots:</strong> Sun spots and lentigos</li>
                        <li><strong>Seborrheic Keratosis:</strong> Brown growth lesions</li>
                        <li><strong>Moles:</strong> Benign moles and skin tags</li>
                        <li><strong>Skin Tags:</strong> Painless removal</li>
                        <li><strong>Actinic Keratosis:</strong> Precancerous growths</li>
                    </ul>

                    <h3 style="color: #333; font-weight: 600; margin-bottom: 15px; font-size: 20px;">How Cryotherapy Works</h3>
                    <p style="color: #555; line-height: 1.8; margin-bottom: 15px;">Using liquid nitrogen at extremely low temperatures (-196°C), we freeze abnormal skin cells causing controlled cell death and tissue destruction. The body naturally eliminates the treated cells, allowing healthy skin to emerge. This targeted approach destroys lesions while minimizing damage to surrounding tissue.</p>

                    <h3 style="color: #333; font-weight: 600; margin-top: 30px; margin-bottom: 15px; font-size: 20px;">Treatment Process</h3>
                    <div style="background: #f8f9fa; padding: 20px; border-radius: 8px; margin-bottom: 25px;">
                        <p style="color: #555; line-height: 1.8; margin: 0;"><strong>Step 1:</strong> Local anesthesia applied if needed<br><strong>Step 2:</strong> Precise application of liquid nitrogen to lesion<br><strong>Step 3:</strong> Controlled freezing for 15-30 seconds<br><strong>Step 4:</strong> Natural thawing cycle allows cell destruction</p>
                    </div>

                    <h3 style="color: #333; font-weight: 600; margin-bottom: 15px; font-size: 20px;">Recovery & Results Timeline</h3>
                    <ul style="color: #555; line-height: 2; margin-bottom: 25px; padding-left: 25px;">
                        <li><strong>Immediate:</strong> Mild redness and swelling</li>
                        <li><strong>1-3 Days:</strong> Blister forms, area may throb slightly</li>
                        <li><strong>1-2 Weeks:</strong> Blister dries and falls off naturally</li>
                        <li><strong>2-4 Weeks:</strong> New pink skin appears beneath</li>
                        <li><strong>4-6 Weeks:</strong> Skin returns to normal pigmentation</li>
                    </ul>

                    <h3 style="color: #333; font-weight: 600; margin-bottom: 15px; font-size: 20px;">Why Choose Cryotherapy</h3>
                    <div style="background: linear-gradient(135deg, #e3f2fd 0%, #bbdefb 100%); padding: 20px; border-radius: 8px;">
                        <ul style="color: #555; line-height: 2; padding-left: 25px; margin: 0;">
                            <li>Quick, single session treatment</li>
                            <li>Minimal scarring</li>
                            <li>No need for stitches</li>
                            <li>Effective for stubborn lesions</li>
                            <li>Can treat multiple lesions in one visit</li>
                            <li>Proven track record of success</li>
                        </ul>
                    </div>
                </div>

                <div class="col-lg-4">
                    <div style="background: linear-gradient(135deg, #0288d1 0%, #0277bd 100%); color: #fff; border-radius: 12px; padding: 30px; margin-bottom: 30px; box-shadow: 0 10px 30px rgba(2, 136, 209, 0.3);">
                        <h3 style="font-size: 20px; font-weight: 700; margin-bottom: 15px;">Get Treatment</h3>
                        <p style="margin-bottom: 20px;">Precise lesion removal in minutes.</p>
                        <a href="contact.php#appointment" class="btn-secondary-custom" style="background-color: #fff; color: #0288d1; border: none; display: block; text-align: center; width: 100%; padding: 12px; border-radius: 8px; font-weight: 600;">Schedule Now</a>
                    </div>

                    <div style="background: #f5f5f5; border-radius: 12px; padding: 25px;">
                        <h4 style="color: #0288d1; font-weight: 700; margin-bottom: 15px;">Ideal For</h4>
                        <ul style="list-style: none; padding: 0; margin: 0;">
                            <li style="margin-bottom: 10px;">✓ Warts & growths</li>
                            <li style="margin-bottom: 10px;">✓ Age spots</li>
                            <li style="margin-bottom: 10px;">✓ Moles</li>
                            <li style="margin-bottom: 10px;">✓ Skin tags</li>
                            <li style="margin-bottom: 10px;">✓ Lesion removal</li>
                            <li>✓ All skin types</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <?php include 'common/footer.php' ?>
</body>
</html>