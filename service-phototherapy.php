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
        ['label' => 'Phototherapy', 'url' => null]
    ];
    $pageTitle = "Phototherapy";
    $pageSubtitle = "Advanced Light-Based Therapeutic Treatment";
    include 'common/breadcrumb.php'; 
    ?>

    <!-- Service Content -->
    <section class="section-padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">

                
                    <div class="image-overlay-wrapper mb-3">
                        <img src="assets/images/services/phototherapy-treatment.jpg" alt="Phototherapy Treatment" class="img-fluid w-100">

                        <div class="icon-overlay">
                            <i class="fa-solid fa-lightbulb"></i>
                            <p>Therapeutic Light Treatment</p>
                        </div>
                    </div>

                   
                    <h2 style="font-size: 32px; font-weight: 700; color: #e91e63; margin-bottom: 20px;">Advanced Phototherapy</h2>
                    <p style="color: #555; line-height: 1.8; margin-bottom: 15px;">Phototherapy uses specific wavelengths of light to treat various dermatological conditions. This non-invasive, pain-free treatment stimulates healing and reduces inflammation, making it ideal for patients seeking natural therapeutic solutions for chronic skin conditions.</p>

                    <h3 style="color: #333; font-weight: 600; margin-top: 30px; margin-bottom: 15px; font-size: 20px;">Conditions Treated with Phototherapy</h3>
                    <ul style="color: #555; line-height: 2; margin-bottom: 25px; padding-left: 25px;">
                        <li><strong>Vitiligo:</strong> Stimulates melanocyte activity for repigmentation</li>
                        <li><strong>Psoriasis:</strong> Reduces scaling and inflammation</li>
                        <li><strong>Eczema:</strong> Alleviates itching and controls inflammation</li>
                        <li><strong>Hair Loss:</strong> Promotes hair growth</li>
                        <li><strong>Acne:</strong> Kills bacteria and reduces sebum production</li>
                        <li><strong>Lichen Planus:</strong> Controls oral and skin manifestations</li>
                    </ul>

                    <h3 style="color: #333; font-weight: 600; margin-bottom: 15px; font-size: 20px;">Types of Phototherapy</h3>
                    <p style="color: #555; line-height: 1.8; margin-bottom: 15px;"><strong>UVB Phototherapy:</strong> Most common form, effective for widespread conditions.</p>
                    <p style="color: #555; line-height: 1.8; margin-bottom: 15px;"><strong>PUVA Therapy:</strong> Combines photosensitizing medication with UVA light.</p>
                    <p style="color: #555; line-height: 1.8;">Excimer Laser: Targeted treatment for localized conditions.</p>

                    <h3 style="color: #333; font-weight: 600; margin-top: 30px; margin-bottom: 15px; font-size: 20px;">Treatment Process</h3>
                    <p style="color: #555; line-height: 1.8; margin-bottom: 15px;">Sessions are typically 2-3 times per week, lasting 15-30 minutes. Gradual improvement is expected over 8-12 weeks of consistent treatment. Each session is pain-free with no downtime.</p>
                </div>

                <div class="col-lg-4">
                    <div style="background: linear-gradient(135deg, #e91e63 0%, #d81b60 100%); color: #fff; border-radius: 12px; padding: 30px; margin-bottom: 30px; box-shadow: 0 10px 30px rgba(233, 30, 99, 0.3);">
                        <h3 style="font-size: 20px; font-weight: 700; margin-bottom: 15px;">Start Phototherapy</h3>
                        <p style="margin-bottom: 20px;">Experience effective light therapy treatment.</p>
                        <a href="contact.php#appointment" class="btn-secondary-custom" style="background-color: #fff; color: #e91e63; border: none; display: block; text-align: center; width: 100%; padding: 12px; border-radius: 8px; font-weight: 600;">Schedule Session</a>
                    </div>

                    <div style="background: #f5f5f5; border-radius: 12px; padding: 25px;">
                        <h4 style="color: #e91e63; font-weight: 700; margin-bottom: 15px;">Benefits</h4>
                        <ul style="list-style: none; padding: 0; margin: 0;">
                            <li style="margin-bottom: 10px;">✓ Non-invasive</li>
                            <li style="margin-bottom: 10px;">✓ Pain-free</li>
                            <li style="margin-bottom: 10px;">✓ No downtime</li>
                            <li style="margin-bottom: 10px;">✓ Safe & proven</li>
                            <li style="margin-bottom: 10px;">✓ All skin types</li>
                            <li>✓ Effective results</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <?php include 'common/footer.php' ?>
</body>
</html>