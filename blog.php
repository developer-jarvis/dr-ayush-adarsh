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
        ['label' => 'Blog', 'url' => null]
    ];
    $pageTitle = "Our Blog";
    $pageSubtitle = "Skincare Tips, Insights & Expert Advice";
    include 'common/breadcrumb.php'; 
    ?>

    <!-- Blog Posts -->
    <section class="section-padding" style="background: #fff;">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-6" style="margin-bottom: 40px;">
                    <div style="background: #f5f5f5; border-radius: 12px; overflow: hidden; box-shadow: 0 5px 20px rgba(0,0,0,0.05); transition: all 0.3s ease;">
                        <div style="background: linear-gradient(135deg, #f8bbd0 0%, #fce4ec 100%); height: 200px; display: flex; align-items: center; justify-content: center;">
                            <i class="fa-solid fa-image" style="font-size: 48px; color: #e91e63; opacity: 0.5;"></i>
                        </div>
                        <div style="padding: 20px;">
                            <p style="color: #888; font-size: 12px; margin-bottom: 8px;">January 18, 2026 | Hair Care</p>
                            <h3 style="color: #333; font-weight: 700; font-size: 18px; margin-bottom: 12px;">How to Increase Hair Thickness Naturally</h3>
                            <p style="color: #555; font-size: 14px; line-height: 1.8; margin-bottom: 15px;">Hair thickness is crucial for overall appearance and confidence. Modern dermatology offers multiple solutions ranging from natural remedies to advanced treatments. Learn how to boost your hair volume with professional guidance and proven techniques that work...</p>
                            <a href="#" style="color: #e91e63; font-weight: 600; text-decoration: none;">Read More →</a>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6" style="margin-bottom: 40px;">
                    <div style="background: #f5f5f5; border-radius: 12px; overflow: hidden; box-shadow: 0 5px 20px rgba(0,0,0,0.05); transition: all 0.3s ease;">
                        <div style="background: linear-gradient(135deg, #f8bbd0 0%, #fce4ec 100%); height: 200px; display: flex; align-items: center; justify-content: center;">
                            <i class="fa-solid fa-image" style="font-size: 48px; color: #e91e63; opacity: 0.5;"></i>
                        </div>
                        <div style="padding: 20px;">
                            <p style="color: #888; font-size: 12px; margin-bottom: 8px;">January 16, 2026 | Hair Transplant</p>
                            <h3 style="color: #333; font-weight: 700; font-size: 18px; margin-bottom: 12px;">Hair Transplantation: Types & Benefits</h3>
                            <p style="color: #555; font-size: 14px; line-height: 1.8; margin-bottom: 15px;">Hair transplantation is one of the most effective permanent solutions for baldness. With advances in technology, FUE and DHI techniques now offer natural-looking results with minimal downtime. Understand which method suits your hair loss pattern...</p>
                            <a href="#" style="color: #e91e63; font-weight: 600; text-decoration: none;">Read More →</a>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6" style="margin-bottom: 40px;">
                    <div style="background: #f5f5f5; border-radius: 12px; overflow: hidden; box-shadow: 0 5px 20px rgba(0,0,0,0.05); transition: all 0.3s ease;">
                        <div style="background: linear-gradient(135deg, #f8bbd0 0%, #fce4ec 100%); height: 200px; display: flex; align-items: center; justify-content: center;">
                            <i class="fa-solid fa-image" style="font-size: 48px; color: #e91e63; opacity: 0.5;"></i>
                        </div>
                        <div style="padding: 20px;">
                            <p style="color: #888; font-size: 12px; margin-bottom: 8px;">January 14, 2026 | Skin Care</p>
                            <h3 style="color: #333; font-weight: 700; font-size: 18px; margin-bottom: 12px;">Winter Skin Care Tips You Must Follow</h3>
                            <p style="color: #555; font-size: 14px; line-height: 1.8; margin-bottom: 15px;">Winter weather can damage your skin through dryness, irritation, and sensitivity. Discover professional dermatologist-recommended tips to maintain healthy, glowing skin during the cold season with proper hydration and protection...</p>
                            <a href="#" style="color: #e91e63; font-weight: 600; text-decoration: none;">Read More →</a>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6" style="margin-bottom: 40px;">
                    <div style="background: #f5f5f5; border-radius: 12px; overflow: hidden; box-shadow: 0 5px 20px rgba(0,0,0,0.05); transition: all 0.3s ease;">
                        <div style="background: linear-gradient(135deg, #f8bbd0 0%, #fce4ec 100%); height: 200px; display: flex; align-items: center; justify-content: center;">
                            <i class="fa-solid fa-image" style="font-size: 48px; color: #e91e63; opacity: 0.5;"></i>
                        </div>
                        <div style="padding: 20px;">
                            <p style="color: #888; font-size: 12px; margin-bottom: 8px;">January 12, 2026 | Laser Treatment</p>
                            <h3 style="color: #333; font-weight: 700; font-size: 18px; margin-bottom: 12px;">Benefits of Laser Treatment for Skin</h3>
                            <p style="color: #555; font-size: 14px; line-height: 1.8; margin-bottom: 15px;">Laser technology has revolutionized dermatology with precision treatments for various skin conditions. From pigmentation to scars and wrinkles, understand how lasers work and why they're considered the gold standard in modern skin treatment...</p>
                            <a href="#" style="color: #e91e63; font-weight: 600; text-decoration: none;">Read More →</a>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6" style="margin-bottom: 40px;">
                    <div style="background: #f5f5f5; border-radius: 12px; overflow: hidden; box-shadow: 0 5px 20px rgba(0,0,0,0.05); transition: all 0.3s ease;">
                        <div style="background: linear-gradient(135deg, #f8bbd0 0%, #fce4ec 100%); height: 200px; display: flex; align-items: center; justify-content: center;">
                            <i class="fa-solid fa-image" style="font-size: 48px; color: #e91e63; opacity: 0.5;"></i>
                        </div>
                        <div style="padding: 20px;">
                            <p style="color: #888; font-size: 12px; margin-bottom: 8px;">January 10, 2026 | Acne Treatment</p>
                            <h3 style="color: #333; font-weight: 700; font-size: 18px; margin-bottom: 12px;">Effective Acne Treatment Solutions</h3>
                            <p style="color: #555; font-size: 14px; line-height: 1.8; margin-bottom: 15px;">Acne is a common skin condition affecting millions worldwide. Modern treatments go beyond traditional methods to offer targeted solutions. Learn about prescription treatments, laser therapy, and professional procedures that deliver clear, healthy skin results...</p>
                            <a href="#" style="color: #e91e63; font-weight: 600; text-decoration: none;">Read More →</a>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6" style="margin-bottom: 40px;">
                    <div style="background: #f5f5f5; border-radius: 12px; overflow: hidden; box-shadow: 0 5px 20px rgba(0,0,0,0.05); transition: all 0.3s ease;">
                        <div style="background: linear-gradient(135deg, #f8bbd0 0%, #fce4ec 100%); height: 200px; display: flex; align-items: center; justify-content: center;">
                            <i class="fa-solid fa-image" style="font-size: 48px; color: #e91e63; opacity: 0.5;"></i>
                        </div>
                        <div style="padding: 20px;">
                            <p style="color: #888; font-size: 12px; margin-bottom: 8px;">January 8, 2026 | General Health</p>
                            <h3 style="color: #333; font-weight: 700; font-size: 18px; margin-bottom: 12px;">Understanding Skin Types & Care</h3>
                            <p style="color: #555; font-size: 14px; line-height: 1.8; margin-bottom: 15px;">Knowing your skin type is essential for proper skincare. Oily, dry, combination, and sensitive skin types each require specialized care routines. Discover how to identify your skin type and choose appropriate products and professional treatments...</p>
                            <a href="#" style="color: #e91e63; font-weight: 600; text-decoration: none;">Read More →</a>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6" style="margin-bottom: 40px;">
                    <div style="background: #f5f5f5; border-radius: 12px; overflow: hidden; box-shadow: 0 5px 20px rgba(0,0,0,0.05); transition: all 0.3s ease;">
                        <div style="background: linear-gradient(135deg, #f8bbd0 0%, #fce4ec 100%); height: 200px; display: flex; align-items: center; justify-content: center;">
                            <i class="fa-solid fa-image" style="font-size: 48px; color: #e91e63; opacity: 0.5;"></i>
                        </div>
                        <div style="padding: 20px;">
                            <p style="color: #888; font-size: 12px; margin-bottom: 8px;">January 6, 2026 | Cosmetic Surgery</p>
                            <h3 style="color: #333; font-weight: 700; font-size: 18px; margin-bottom: 12px;">Cosmetic Surgery: Art & Science</h3>
                            <p style="color: #555; font-size: 14px; line-height: 1.8; margin-bottom: 15px;">Modern cosmetic surgery combines artistic vision with medical precision. From facial restructuring to body contouring, understand the latest techniques that deliver natural-looking results while maintaining your unique features...</p>
                            <a href="#" style="color: #e91e63; font-weight: 600; text-decoration: none;">Read More →</a>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6" style="margin-bottom: 40px;">
                    <div style="background: #f5f5f5; border-radius: 12px; overflow: hidden; box-shadow: 0 5px 20px rgba(0,0,0,0.05); transition: all 0.3s ease;">
                        <div style="background: linear-gradient(135deg, #f8bbd0 0%, #fce4ec 100%); height: 200px; display: flex; align-items: center; justify-content: center;">
                            <i class="fa-solid fa-image" style="font-size: 48px; color: #e91e63; opacity: 0.5;"></i>
                        </div>
                        <div style="padding: 20px;">
                            <p style="color: #888; font-size: 12px; margin-bottom: 8px;">January 4, 2026 | PRP Therapy</p>
                            <h3 style="color: #333; font-weight: 700; font-size: 18px; margin-bottom: 12px;">PRP Therapy: Regenerative Treatment</h3>
                            <p style="color: #555; font-size: 14px; line-height: 1.8; margin-bottom: 15px;">Platelet-rich plasma therapy uses your body's natural healing factors to stimulate hair growth and skin rejuvenation. Learn how this advanced regenerative treatment works and why it's becoming the preferred choice for natural restoration...</p>
                            <a href="#" style="color: #e91e63; font-weight: 600; text-decoration: none;">Read More →</a>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6" style="margin-bottom: 40px;">
                    <div style="background: #f5f5f5; border-radius: 12px; overflow: hidden; box-shadow: 0 5px 20px rgba(0,0,0,0.05); transition: all 0.3s ease;">
                        <div style="background: linear-gradient(135deg, #f8bbd0 0%, #fce4ec 100%); height: 200px; display: flex; align-items: center; justify-content: center;">
                            <i class="fa-solid fa-image" style="font-size: 48px; color: #e91e63; opacity: 0.5;"></i>
                        </div>
                        <div style="padding: 20px;">
                            <p style="color: #888; font-size: 12px; margin-bottom: 8px;">January 2, 2026 | Phototherapy</p>
                            <h3 style="color: #333; font-weight: 700; font-size: 18px; margin-bottom: 12px;">Phototherapy for Skin Conditions</h3>
                            <p style="color: #555; font-size: 14px; line-height: 1.8; margin-bottom: 15px;">Light-based therapy has proven effectiveness in treating various skin conditions including vitiligo, psoriasis, and eczema. Discover how different light wavelengths are used therapeutically and what to expect from phototherapy treatment...</p>
                            <a href="#" style="color: #e91e63; font-weight: 600; text-decoration: none;">Read More →</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA -->
    <section style="padding: 60px 0; background: linear-gradient(135deg, #e91e63 0%, #d81b60 100%); color: #fff; text-align: center;">
        <div class="container">
            <h2 style="font-size: 36px; font-weight: 700; margin-bottom: 15px;">Have Questions About Your Skin?</h2>
            <a href="contact.php#appointment" class="btn-secondary-custom" style="background-color: #fff; color: #e91e63; border: none;">Consult with Ayush Adarsh</a>
        </div>
    </section>

    <?php include 'common/footer.php' ?>
</body>
</html>