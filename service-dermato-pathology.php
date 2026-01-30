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
        ['label' => 'Dermato Pathology', 'url' => null]
    ];
    $pageTitle = "Dermato Pathology";
    $pageSubtitle = "Advanced Microscopic Tissue Analysis & Diagnosis";
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
            background: linear-gradient(135deg, rgba(81, 45, 168, 0.5) 0%, rgba(63, 44, 112, 0.5) 100%);
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            text-align: center;
        }

        .icon-overlay i {
            font-size: 70px;
            color: #512da8 !important;
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
                        <img src="assets/images/services/dermatopathology.jpg" alt="Professional Skin Exfoliation"
                            class="img-fluid w-100">

                        <div class="icon-overlay">
                            <i class="fa-solid fa-flask-vial"></i>
                            <p>Expert Pathological Tissue
                                Examination</p>
                        </div>
                    </div>
                    

                    <h2 style="font-size: 32px; font-weight: 700; color: #512da8; margin-bottom: 20px;">Professional
                        Dermatopathology</h2>
                    <p style="color: #555; line-height: 1.8; margin-bottom: 15px;">Dermatopathology is the microscopic
                        examination of skin tissue samples under magnification to diagnose skin diseases and conditions.
                        This specialized field combines dermatology with pathology to provide definitive diagnoses for
                        complex or unclear skin conditions.</p>

                    <h3 style="color: #333; font-weight: 600; margin-top: 30px; margin-bottom: 15px; font-size: 20px;">
                        Sampling Techniques</h3>
                    <ul style="color: #555; line-height: 2; margin-bottom: 25px; padding-left: 25px;">
                        <li><strong>Punch Biopsy:</strong> 3-4mm circular tissue sample using specialized tool</li>
                        <li><strong>Shave Biopsy:</strong> Superficial tissue removal for surface lesions</li>
                        <li><strong>Excisional Biopsy:</strong> Complete removal of lesion with margins</li>
                        <li><strong>Incisional Biopsy:</strong> Partial removal of large lesions</li>
                        <li><strong>Curette Biopsy:</strong> Scraping technique for specific conditions</li>
                    </ul>

                    <h3 style="color: #333; font-weight: 600; margin-bottom: 15px; font-size: 20px;">Conditions
                        Diagnosed</h3>
                    <div style="background: #f8f9fa; padding: 20px; border-radius: 8px; margin-bottom: 25px;">
                        <ul style="color: #555; line-height: 2; padding-left: 25px; margin: 0;">
                            <li><strong>Malignant Lesions:</strong> Melanoma, basal cell carcinoma, squamous cell
                                carcinoma</li>
                            <li><strong>Benign Tumors:</strong> Nevi, seborrheic keratosis, lipomas</li>
                            <li><strong>Inflammatory Conditions:</strong> Dermatitis, psoriasis, lichen planus</li>
                            <li><strong>Infections:</strong> Fungal, bacterial, viral skin infections</li>
                            <li><strong>Autoimmune Diseases:</strong> Lupus, pemphigus, bullous pemphigoid</li>
                            <li><strong>Hair Disorders:</strong> Alopecia patterns, folliculitis</li>
                        </ul>
                    </div>

                    <h3 style="color: #333; font-weight: 600; margin-top: 30px; margin-bottom: 15px; font-size: 20px;">
                        Processing & Analysis</h3>
                    <ul style="color: #555; line-height: 2; margin-bottom: 25px; padding-left: 25px;">
                        <li><strong>Tissue Preparation:</strong> Fixation, embedding, sectioning</li>
                        <li><strong>Histological Staining:</strong> H&E and specialized stains applied</li>
                        <li><strong>Microscopic Examination:</strong> Expert analysis at various magnifications</li>
                        <li><strong>Immunohistochemistry:</strong> Special staining for antigen detection when needed
                        </li>
                        <li><strong>Detailed Report:</strong> Comprehensive findings and diagnostic conclusions</li>
                    </ul>

                    <h3 style="color: #333; font-weight: 600; margin-bottom: 15px; font-size: 20px;">Diagnostic Report
                        Contents</h3>
                    <div
                        style="background: linear-gradient(135deg, #ede7f6 0%, #d1c4e9 100%); padding: 20px; border-radius: 8px;">
                        <ul style="color: #555; line-height: 2; padding-left: 25px; margin: 0;">
                            <li>Clinical presentation summary</li>
                            <li>Gross specimen description</li>
                            <li>Microscopic findings detail</li>
                            <li>Pathological diagnosis</li>
                            <li>Differential diagnosis considerations</li>
                            <li>Clinical correlation recommendations</li>
                        </ul>
                    </div>

                    <h3 style="color: #333; font-weight: 600; margin-top: 30px; margin-bottom: 15px; font-size: 20px;">
                        Why Dermatopathology Matters</h3>
                    <ul style="color: #555; line-height: 2; margin-bottom: 25px; padding-left: 25px;">
                        <li><strong>Definitive Diagnosis:</strong> Confirms or rules out specific conditions</li>
                        <li><strong>Early Detection:</strong> Identifies malignancy at earliest stages</li>
                        <li><strong>Treatment Planning:</strong> Guides appropriate therapy decisions</li>
                        <li><strong>Prognostic Information:</strong> Helps predict disease course</li>
                        <li><strong>Legal Documentation:</strong> Provides formal medical record</li>
                        <li><strong>Peace of Mind:</strong> Conclusive answers to skin concerns</li>
                    </ul>
                </div>

                <div class="col-lg-4">
                    <div
                        style="background: linear-gradient(135deg, #512da8 0%, #3f2c70 100%); color: #fff; border-radius: 12px; padding: 30px; margin-bottom: 30px; box-shadow: 0 10px 30px rgba(81, 45, 168, 0.3);">
                        <h3 style="font-size: 20px; font-weight: 700; margin-bottom: 15px;">Get Biopsy Done</h3>
                        <p style="margin-bottom: 20px;">Expert pathological diagnosis.</p>
                        <a href="contact.php#appointment" class="btn-secondary-custom"
                            style="background-color: #fff; color: #512da8; border: none; display: block; text-align: center; width: 100%; padding: 12px; border-radius: 8px; font-weight: 600;">Schedule
                            Biopsy</a>
                    </div>

                    <div style="background: #f5f5f5; border-radius: 12px; padding: 25px;">
                        <h4 style="color: #512da8; font-weight: 700; margin-bottom: 15px;">We Diagnose</h4>
                        <ul style="list-style: none; padding: 0; margin: 0;">
                            <li style="margin-bottom: 10px;">✓ Skin cancer</li>
                            <li style="margin-bottom: 10px;">✓ Benign lesions</li>
                            <li style="margin-bottom: 10px;">✓ Infections</li>
                            <li style="margin-bottom: 10px;">✓ Inflammation</li>
                            <li style="margin-bottom: 10px;">✓ Auto-immune</li>
                            <li>✓ Hair disorders</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <?php include 'common/footer.php' ?>
</body>

</html>