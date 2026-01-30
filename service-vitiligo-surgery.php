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
        ['label' => 'Vitiligo Surgery', 'url' => null]
    ];
    $pageTitle = "Vitiligo Surgery";
    $pageSubtitle = "Advanced Surgical & Non-Surgical Pigmentation Restoration";
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
            background: linear-gradient(135deg, rgba(46, 125, 50, 0.5) 0%, rgba(0, 100, 0, 0.5) 100%);
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
                        <img src="assets/images/services/electro-surgery.jpg" alt="Professional Skin Exfoliation"
                            class="img-fluid w-100">

                        <div class="icon-overlay">
                            <i class="fa-solid fa-wand-magic-sparkles"></i>
                            <p>Vitiligo Surgery</p>
                        </div>
                    </div>
                    

                    <h2 style="font-size: 32px; font-weight: 700; color: #2e7d32; margin-bottom: 20px;">Comprehensive
                        Vitiligo Treatment</h2>
                    <p style="color: #555; line-height: 1.8; margin-bottom: 15px;">Vitiligo is a depigmentation disorder
                        characterized by loss of skin color. We offer advanced surgical and medical treatments to
                        restore pigmentation and improve skin appearance, helping patients regain confidence and skin
                        tone.</p>

                    <h3 style="color: #333; font-weight: 600; margin-top: 30px; margin-bottom: 15px; font-size: 20px;">
                        Surgical Techniques</h3>
                    <ul style="color: #555; line-height: 2; margin-bottom: 25px; padding-left: 25px;">
                        <li><strong>Autologous Skin Grafting:</strong> Transplanting normal skin to affected areas</li>
                        <li><strong>Melanocyte Transplantation:</strong> Transfer of pigment-producing cells</li>
                        <li><strong>Punch Grafting:</strong> Small grafts for localized patches</li>
                        <li><strong>Suction Blister Grafting:</strong> Minimal scarring technique</li>
                        <li><strong>Micro-pigmentation:</strong> Tattooing effect for small patches</li>
                    </ul>

                    <h3 style="color: #333; font-weight: 600; margin-bottom: 15px; font-size: 20px;">Non-Surgical
                        Treatments</h3>
                    <div style="background: #f8f9fa; padding: 20px; border-radius: 8px; margin-bottom: 25px;">
                        <ul style="color: #555; line-height: 2; padding-left: 25px; margin: 0;">
                            <li>Topical corticosteroids</li>
                            <li>Phototherapy (PUVA/UVA)</li>
                            <li>Excimer laser treatment</li>
                            <li>Immunomodulators</li>
                            <li>Combination therapies</li>
                        </ul>
                    </div>

                    <h3 style="color: #333; font-weight: 600; margin-top: 30px; margin-bottom: 15px; font-size: 20px;">
                        Treatment Success Rates</h3>
                    <ul style="color: #555; line-height: 2; margin-bottom: 25px; padding-left: 25px;">
                        <li><strong>Surgical Grafting:</strong> 75-95% success rate for pigment restoration</li>
                        <li><strong>Phototherapy:</strong> 60-75% improvement in repigmentation</li>
                        <li><strong>Combination Approach:</strong> Best results with surgery + medical therapy</li>
                        <li><strong>Early Intervention:</strong> Better outcomes when treated within 1-2 years</li>
                    </ul>

                    <h3 style="color: #333; font-weight: 600; margin-bottom: 15px; font-size: 20px;">Recovery & Timeline
                    </h3>
                    <ul style="color: #555; line-height: 2; margin-bottom: 25px; padding-left: 25px;">
                        <li><strong>Immediate:</strong> Graft site bandaged, donor site healed</li>
                        <li><strong>1-2 Weeks:</strong> Scabs form and fall off</li>
                        <li><strong>2-4 Weeks:</strong> Initial pigmentation begins</li>
                        <li><strong>3-6 Months:</strong> Gradual pigment spread and maturation</li>
                        <li><strong>6-12 Months:</strong> Full color matching achieved</li>
                    </ul>

                    <h3 style="color: #333; font-weight: 600; margin-bottom: 15px; font-size: 20px;">Why Our Approach
                        Works</h3>
                    <div
                        style="background: linear-gradient(135deg, #c8e6c9 0%, #a5d6a7 100%); padding: 20px; border-radius: 8px;">
                        <ul style="color: #555; line-height: 2; padding-left: 25px; margin: 0;">
                            <li>Specialized vitiligo expertise</li>
                            <li>Customized treatment plans</li>
                            <li>Advanced surgical techniques</li>
                            <li>Post-operative phototherapy</li>
                            <li>Long-term follow-up care</li>
                            <li>High success rates</li>
                        </ul>
                    </div>
                </div>

                <div class="col-lg-4">
                    <div
                        style="background: linear-gradient(135deg, #2e7d32 0%, #1b5e20 100%); color: #fff; border-radius: 12px; padding: 30px; margin-bottom: 30px; box-shadow: 0 10px 30px rgba(46, 125, 50, 0.3);">
                        <h3 style="font-size: 20px; font-weight: 700; margin-bottom: 15px;">Restore Pigmentation</h3>
                        <p style="margin-bottom: 20px;">Expert vitiligo treatment specialists.</p>
                        <a href="contact.php#appointment" class="btn-secondary-custom"
                            style="background-color: #fff; color: #2e7d32; border: none; display: block; text-align: center; width: 100%; padding: 12px; border-radius: 8px; font-weight: 600;">Book
                            Consultation</a>
                    </div>

                    <div style="background: #f5f5f5; border-radius: 12px; padding: 25px;">
                        <h4 style="color: #2e7d32; font-weight: 700; margin-bottom: 15px;">We Offer</h4>
                        <ul style="list-style: none; padding: 0; margin: 0;">
                            <li style="margin-bottom: 10px;">✓ Surgical grafting</li>
                            <li style="margin-bottom: 10px;">✓ Phototherapy</li>
                            <li style="margin-bottom: 10px;">✓ Laser treatment</li>
                            <li style="margin-bottom: 10px;">✓ Medical therapy</li>
                            <li style="margin-bottom: 10px;">✓ Expert care</li>
                            <li>✓ Life-changing results</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <?php include 'common/footer.php' ?>
</body>

</html>