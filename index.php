<!DOCTYPE html>
<html lang="en">

<head>
    <?php include 'common/head.php'; ?>
    <style>
        .scroll-top-btn {
            position: fixed;
            bottom: 30px;
            right: 30px;
            width: 50px;
            height: 50px;
            background-color: #e91e63;
            color: #fff;
            border: none;
            border-radius: 50%;
            cursor: pointer;
            display: none;
            align-items: center;
            justify-content: center;
            z-index: 1000;
            box-shadow: 0 6px 18px rgba(233, 30, 99, 0.35);
            transition: all 0.3s ease;
            font-size: 20px;
        }

        .scroll-top-btn:hover {
            background-color: #d81b60;
            transform: translateY(-5px);
            box-shadow: 0 10px 26px rgba(233, 30, 99, 0.45);
        }
    </style>
</head>

<body>
    <?php include 'common/header.php' ?>

    <!-- CAROUSEL HERO BANNER -->
    <section class="carousel-banner">
        <div class="carousel-slides">
            <!-- Slide 1 -->
            <div class="carousel-slide active"
                style="background: linear-gradient(135deg, rgba(0, 0, 0, 0.1) 0%, rgba(0, 0, 0, 0.1) 100%), url('assets/images/banner/1.jpeg')">
                <!-- <div class="carousel-slide-content">
                    <h1>Advanced Skin Care Solutions</h1>
                    <p>Experience cutting-edge dermatological treatments with Ayush Adarsh at Ayush Adarsh Skin Care
                        Clinic</p>
                </div> -->
            </div>

            <!-- Slide 2 -->
            <div class="carousel-slide"
                style="background: linear-gradient(135deg, rgba(0, 0, 0, 0.1) 0%, rgba(0, 0, 0, 0.1) 100%), url('assets/images/banner/2.jpeg')">
                <!-- <div class="carousel-slide-content">
                    <h1>Hair Restoration Excellence</h1>
                    <p>Transform your look with advanced hair transplant and restoration techniques</p>
                </div> -->
            </div>

            <!-- Slide 3 -->
            <div class="carousel-slide"
                style="background: linear-gradient(135deg, rgba(0, 0, 0, 0.1) 0%, rgba(0, 0, 0, 0.1) 100%), url('assets/images/banner/3.jpeg')">
                <!-- <div class="carousel-slide-content">
                    <h1>Your Beauty, Our Expertise</h1>
                    <p>Premium cosmetic procedures tailored to enhance your natural beauty</p>
                </div> -->
            </div>
        </div>

        <!-- Navigation Controls -->
        <button class="carousel-arrows carousel-prev" onclick="previousSlide()">
            <i class="fa-solid fa-chevron-left"></i>
        </button>
        <button class="carousel-arrows carousel-next" onclick="nextSlide()">
            <i class="fa-solid fa-chevron-right"></i>
        </button>

        <!-- Slide Indicators -->
        <div class="carousel-controls">
            <span class="carousel-dot active" onclick="currentSlide(0)"></span>
            <span class="carousel-dot" onclick="currentSlide(1)"></span>
            <span class="carousel-dot" onclick="currentSlide(2)"></span>
        </div>
    </section>

    <script>
        let currentSlideIndex = 0;
        const autoSlideDelay = 5000;
        let autoSlideTimer;

        function showSlide(index) {
            const slides = document.querySelectorAll('.carousel-slide');
            const dots = document.querySelectorAll('.carousel-dot');

            if (index >= slides.length) currentSlideIndex = 0;
            if (index < 0) currentSlideIndex = slides.length - 1;

            slides.forEach(slide => slide.classList.remove('active'));
            dots.forEach(dot => dot.classList.remove('active'));

            slides[currentSlideIndex].classList.add('active');
            dots[currentSlideIndex].classList.add('active');

            resetAutoSlide();
        }

        function nextSlide() {
            currentSlideIndex++;
            showSlide(currentSlideIndex);
        }

        function previousSlide() {
            currentSlideIndex--;
            showSlide(currentSlideIndex);
        }

        function currentSlide(index) {
            currentSlideIndex = index;
            showSlide(currentSlideIndex);
        }

        function autoSlide() {
            currentSlideIndex++;
            showSlide(currentSlideIndex);
        }

        function resetAutoSlide() {
            clearInterval(autoSlideTimer);
            autoSlideTimer = setInterval(autoSlide, autoSlideDelay);
        }

        // Start auto-slide on page load
        autoSlideTimer = setInterval(autoSlide, autoSlideDelay);
    </script>

    <!-- USP FEATURES SECTION -->
    <section class="features-section">
        <div class="container">
            <div class="row justify-content-center">
                <!-- <div class="col-lg-4 col-md-6">
                    <div class="feature-item">
                        <div class="feature-icon">
                            <i class="fa-solid fa-clock"></i>
                        </div>
                        <div class="feature-content">
                            <h4>24 Hour Emergency</h4>
                            <p>Open round the clock for convenience and quick access to medical care.</p>
                        </div>
                    </div>
                </div> -->
                <div class="col-lg-4 col-md-6">
                    <div class="feature-item">
                        <div class="feature-icon">
                            <i class="fa-solid fa-flask"></i>
                        </div>
                        <div class="feature-content">
                            <h4>Complete Lab Test</h4>
                            <p>Advanced laboratory testing for accurate diagnosis and treatment planning.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="feature-item">
                        <div class="feature-icon">
                            <i class="fa-solid fa-hospital"></i>
                        </div>
                        <div class="feature-content">
                            <h4>Multiple Clinics</h4>
                            <p>Multiple clinic locations for your convenience across the city.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- SERVICES SECTION -->
    <section class="services-section">
        <div class="container">
            <div class="section-title">
                <h2>Our Services</h2>
                <p>Comprehensive dermatological and cosmetic services tailored to your needs</p>
            </div>

            <div class="row">
                <div class="col-lg-4 col-md-6">
                    <div class="service-card">
                        <div class="service-card-image">
                            <img src="assets/images/services/hair-transplant.jpg" alt="Hair Transplant" style="width: 100%; height: 200px; object-fit: cover; border-radius: 8px 8px 0 0;">
                        </div>
                        <div class="service-card-content">
                            <div class="service-card-icon">
                                <i class="fa-solid fa-spa"></i>
                            </div>
                            <h3>Hair Transplant</h3>
                            <p>Advanced hair restoration techniques using latest technology for natural-looking results.</p>
                            <a href="service-hair-transplant.php">Know More →</a>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6">
                    <div class="service-card">
                        <div class="service-card-image">
                            <img src="assets/images/services/advanced-cosmetic-procedure.jpg" alt="Cosmetic Surgery" style="width: 100%; height: 200px; object-fit: cover; border-radius: 8px 8px 0 0;">
                        </div>
                        <div class="service-card-content">
                            <div class="service-card-icon">
                                <i class="fa-solid fa-wand-magic-sparkles"></i>
                            </div>
                            <h3>Cosmetic Surgery</h3>
                            <p>Expert cosmetic procedures to enhance your natural beauty with precision.</p>
                            <a href="service-cosmetic-surgery.php">Know More →</a>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6">
                    <div class="service-card">
                        <div class="service-card-image">
                            <img src="assets/images/services/allergy-treatment.jpg" alt="Allergy Test" style="width: 100%; height: 200px; object-fit: cover; border-radius: 8px 8px 0 0;">
                        </div>
                        <div class="service-card-content">
                            <div class="service-card-icon">
                                <i class="fa-solid fa-flask-vial"></i>
                            </div>
                            <h3>Allergy Test</h3>
                            <p>Comprehensive allergy testing to identify and treat skin allergies effectively.</p>
                            <a href="service-allergy-test.php">Know More →</a>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6">
                    <div class="service-card">
                        <div class="service-card-image">
                            <img src="assets/images/services/phototherapy-treatment.jpg" alt="Phototherapy" style="width: 100%; height: 200px; object-fit: cover; border-radius: 8px 8px 0 0;">
                        </div>
                        <div class="service-card-content">
                            <div class="service-card-icon">
                                <i class="fa-solid fa-lightbulb"></i>
                            </div>
                            <h3>Phototherapy</h3>
                            <p>Light-based therapeutic treatments for various skin conditions.</p>
                            <a href="service-phototherapy.php">Know More →</a>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6">
                    <div class="service-card">
                        <div class="service-card-image">
                            <img src="assets/images/services/laser-treatment.jpg" alt="Laser Treatment" style="width: 100%; height: 200px; object-fit: cover; border-radius: 8px 8px 0 0;">
                        </div>
                        <div class="service-card-content">
                            <div class="service-card-icon">
                                <i class="fa-solid fa-droplet"></i>
                            </div>
                            <h3>Laser Treatment</h3>
                            <p>Cutting-edge laser technology for skin rejuvenation and hair removal.</p>
                            <a href="service-laser-treatment.php">Know More →</a>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6">
                    <div class="service-card">
                        <div class="service-card-image">
                            <img src="assets/images/services/prp-therapy.jpg" alt="PRP Therapy" style="width: 100%; height: 200px; object-fit: cover; border-radius: 8px 8px 0 0;">
                        </div>
                        <div class="service-card-content">
                            <div class="service-card-icon">
                                <i class="fa-solid fa-syringe"></i>
                            </div>
                            <h3>PRP Therapy</h3>
                            <p>Platelet-rich plasma therapy for natural skin and hair restoration.</p>
                            <a href="service-prp-therapy.php">Know More →</a>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6">
                    <div class="service-card">
                        <div class="service-card-image">
                            <img src="assets/images/services/dermatopathology.jpg" alt="Dermato Pathology" style="width: 100%; height: 200px; object-fit: cover; border-radius: 8px 8px 0 0;">
                        </div>
                        <div class="service-card-content">
                            <div class="service-card-icon">
                                <i class="fa-solid fa-microscope"></i>
                            </div>
                            <h3>Dermato Pathology</h3>
                            <p>Expert pathological analysis for precise diagnosis of skin conditions.</p>
                            <a href="service-dermato-pathology.php">Know More →</a>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6">
                    <div class="service-card">
                        <div class="service-card-image">
                            <img src="assets/images/services/cryotherapy.jpg" alt="Cryotherapy" style="width: 100%; height: 200px; object-fit: cover; border-radius: 8px 8px 0 0;">
                        </div>
                        <div class="service-card-content">
                            <div class="service-card-icon">
                                <i class="fa-solid fa-snowflake"></i>
                            </div>
                            <h3>Cryotherapy</h3>
                            <p>Cold therapy treatment for skin lesions and warts removal.</p>
                            <a href="service-cryotherapy.php">Know More →</a>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6">
                    <div class="service-card">
                        <div class="service-card-image">
                            <img src="assets/images/services/microdermabrasion-treatment.jpg" alt="Chemical Peeling" style="width: 100%; height: 200px; object-fit: cover; border-radius: 8px 8px 0 0;">
                        </div>
                        <div class="service-card-content">
                            <div class="service-card-icon">
                                <i class="fa-solid fa-vial"></i>
                            </div>
                            <h3>Chemical Peeling</h3>
                            <p>Advanced chemical peels for skin renewal and brightening.</p>
                            <a href="service-chemical-peeling.php">Know More →</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="text-center mt-40">
                <a href="services.php" class="btn-primary-custom">View All Services</a>
            </div>
        </div>
    </section>

    <!-- TESTIMONIALS SECTION -->
    <section class="testimonials-section">
        <div class="container">
            <div class="section-title">
                <h2>Patient Testimonials</h2>
                <p>See what our satisfied patients have to say about their experience</p>
            </div>

            <div class="row">
                <div class="col-lg-4 col-md-6">
                    <div class="testimonial-card">
                        <div class="testimonial-rating">
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                        </div>
                        <p class="testimonial-text">"Ayush Adarsh is an excellent dermatologist. The treatment was
                            professional and the results exceeded my expectations. Highly recommended!"</p>
                        <div class="testimonial-author">
                            <div class="testimonial-avatar">RK</div>
                            <div>
                                <div class="testimonial-name">Rajesh Kumar</div>
                                <div class="testimonial-role">Hair Transplant Patient</div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6">
                    <div class="testimonial-card">
                        <div class="testimonial-rating">
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                        </div>
                        <p class="testimonial-text">"Amazing clinic with state-of-the-art facilities. Ayush Adarsh's
                            expertise and caring nature made me feel comfortable throughout the treatment."</p>
                        <div class="testimonial-author">
                            <div class="testimonial-avatar">PS</div>
                            <div>
                                <div class="testimonial-name">Priya Sharma</div>
                                <div class="testimonial-role">Skin Treatment Patient</div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6">
                    <div class="testimonial-card">
                        <div class="testimonial-rating">
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                        </div>
                        <p class="testimonial-text">"Best decision to visit Ayush Adarsh Clinic. Professional staff,
                            modern equipment, and excellent results. Thank you Ayush Adarsh!"</p>
                        <div class="testimonial-author">
                            <div class="testimonial-avatar">AV</div>
                            <div>
                                <div class="testimonial-name">Amit Verma</div>
                                <div class="testimonial-role">Cosmetic Surgery Patient</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="text-center mt-40">
                <a href="testimonials.php" class="btn-primary-custom">View More Testimonials</a>
            </div>
        </div>
    </section>

    <!-- DOCTOR PROFILE SECTION -->
    <section class="doctor-profile">
        <div class="container">

            <div class="row align-items-center">
                <div class="col-lg-5">
                    <div class="doctor-image">
                        <img src="assets/images/about/father.jpeg" alt="best skin doctor in patna" class="img-fluid">

                    </div>
                </div>
                <div class="col-lg-7">
                    <div class="doctor-info">
                        <h2>Dr. Ramawatar singh</h2>
                        <div class="title">Head Of Department, Nalanda Medical College, Patna</div>

                        <p>Dr Ramawatar singh was the founding inspiration behind Adarsh Skin Care Clinic. A visionary
                            who believed in serving the community through quality healthcare, his values and principles
                            continue to guide our practice today. His dedication to helping others and commitment to
                            excellence laid the foundation for what Adarsh Skin Care Clinic represents today. His legacy
                            lives on through our continued commitment to providing compassionate, ethical, and
                            high-quality dermatological care to all our patients. The clinic honors his memory by
                            maintaining the highest standards of medical practice and patient care, ensuring that his
                            vision of accessible and quality healthcare continues to benefit the community.</p>

                        <!-- <h4 style="margin-top: 25px; color: #e91e63; font-weight: 700;">Qualifications & Certifications:
                        </h4>
                        <ul class="qualifications-list">
                            <li>MD Dermatology</li>
                            <li>Certified Hair Transplant Specialist</li>
                            <li>Advanced Laser & Cosmetic Surgery Training</li>
                            <li>Member of Indian Academy of Dermatology</li>
                            <li>International Experience in Dermatological Practices</li>
                        </ul>

                        <p style="margin-top: 25px;"><strong>Areas of Expertise:</strong></p>
                        <p style="margin-top: 10px; color: #555; line-height: 2;">Hair Transplant • Cosmetic Surgery •
                            Laser Treatment • PRP Therapy • Acne & Scar Treatment • Phototherapy • Skin Analysis • Hair
                            Analysis</p> -->


                    </div>
                </div>
            </div>

            <div class="row align-items-center">
                <div class="col-lg-5 order-lg-2">
                    <div class="doctor-image">
                        <img src="assets/images/about/doctor.jpeg" alt="best skin doctor in patna" class="img-fluid">

                    </div>
                </div>
                <div class="col-lg-7">
                    <div class="doctor-info">
                        <h2>Dr. Ayush Adarsh</h2>
                        <div class="title">Senior Dermatologist & Cosmetic Surgeon</div>

                        <p>Ayush Adarsh is a renowned dermatologist with extensive experience in treating various skin,
                            hair, and cosmetic conditions. With a passion for delivering exceptional results, he has
                            successfully helped thousands of patients achieve their aesthetic and therapeutic goals.</p>

                        <p>Specializing in advanced dermatological procedures including hair transplantation, laser
                            therapy, and cosmetic surgery, Ayush Adarsh stays updated with the latest international
                            standards and techniques in the field.</p>

                        <!-- <h4 style="margin-top: 25px; color: #e91e63; font-weight: 700;">Qualifications & Certifications:
                        </h4>
                        <ul class="qualifications-list">
                            <li>MD Dermatology</li>
                            <li>Certified Hair Transplant Specialist</li>
                            <li>Advanced Laser & Cosmetic Surgery Training</li>
                            <li>Member of Indian Academy of Dermatology</li>
                            <li>International Experience in Dermatological Practices</li>
                        </ul>

                        <p style="margin-top: 25px;"><strong>Areas of Expertise:</strong></p>
                        <p style="margin-top: 10px; color: #555; line-height: 2;">Hair Transplant • Cosmetic Surgery •
                            Laser Treatment • PRP Therapy • Acne & Scar Treatment • Phototherapy • Skin Analysis • Hair
                            Analysis</p> -->

                        <a href="about.php" class="btn-primary-custom" style="margin-top: 25px;">Read Full Profile</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- FAQ SECTION -->
    <section style="padding: 80px 0; background: #f9f9f9;">
        <div class="container">
            <div class="section-title">
                <h2>Frequently Asked Questions</h2>
                <p>Find answers to common questions about our services and treatments</p>
            </div>

            <div class="row">
                <div class="col-lg-8 mx-auto">
                    <div class="accordion" id="faqAccordion">
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#faq1">
                                    <i class="fa-solid fa-circle-check" style="color: #e91e63; margin-right: 15px;"></i>
                                    Is hair transplant permanent?
                                </button>
                            </h2>
                            <div id="faq1" class="accordion-collapse collapse show" data-bs-parent="#faqAccordion">
                                <div class="accordion-body">
                                    Yes, hair transplant results are permanent. The transplanted hair is taken from
                                    areas resistant to hair loss, ensuring long-lasting results. You can expect 90-95%
                                    of transplanted hair to survive and grow naturally.
                                </div>
                            </div>
                        </div>

                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#faq2">
                                    <i class="fa-solid fa-circle-check" style="color: #e91e63; margin-right: 15px;"></i>
                                    How many sessions of laser treatment are needed?
                                </button>
                            </h2>
                            <div id="faq2" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                                <div class="accordion-body">
                                    Usually 6-8 sessions of laser treatment are recommended for optimal results.
                                    Sessions are spaced 4-6 weeks apart. The exact number depends on your skin type,
                                    hair color, and the target area.
                                </div>
                            </div>
                        </div>

                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#faq3">
                                    <i class="fa-solid fa-circle-check" style="color: #e91e63; margin-right: 15px;"></i>
                                    What is the recovery time after cosmetic surgery?
                                </button>
                            </h2>
                            <div id="faq3" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                                <div class="accordion-body">
                                    Recovery time varies depending on the procedure. Most cosmetic surgeries require 1-2
                                    weeks for initial recovery, though complete healing may take 4-6 weeks. We provide
                                    detailed post-surgery care instructions for optimal results.
                                </div>
                            </div>
                        </div>

                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#faq4">
                                    <i class="fa-solid fa-circle-check" style="color: #e91e63; margin-right: 15px;"></i>
                                    Are there any side effects to PRP therapy?
                                </button>
                            </h2>
                            <div id="faq4" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                                <div class="accordion-body">
                                    PRP therapy is a natural treatment using your own blood, making side effects
                                    minimal. You may experience slight redness or swelling at the injection site, which
                                    resolves within 24-48 hours. No allergic reactions as it uses your own platelets.
                                </div>
                            </div>
                        </div>

                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#faq5">
                                    <i class="fa-solid fa-circle-check" style="color: #e91e63; margin-right: 15px;"></i>
                                    Can chemical peeling damage my skin?
                                </button>
                            </h2>
                            <div id="faq5" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                                <div class="accordion-body">
                                    When performed by a qualified dermatologist, chemical peeling is safe and effective.
                                    We use appropriate peel strengths based on your skin type. Post-peel care is
                                    crucial, and we provide complete guidelines to ensure optimal healing without
                                    damage.
                                </div>
                            </div>
                        </div>

                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#faq6">
                                    <i class="fa-solid fa-circle-check" style="color: #e91e63; margin-right: 15px;"></i>
                                    How can I know if I have a skin allergy?
                                </button>
                            </h2>
                            <div id="faq6" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                                <div class="accordion-body">
                                    Common signs of skin allergies include itching, redness, rashes, swelling, or
                                    burning sensation. Our comprehensive allergy tests can identify specific allergens.
                                    We recommend getting tested if you experience persistent skin reactions to determine
                                    the cause.
                                </div>
                            </div>
                        </div>

                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#faq7">
                                    <i class="fa-solid fa-circle-check" style="color: #e91e63; margin-right: 15px;"></i>
                                    How long do results last after phototherapy?
                                </button>
                            </h2>
                            <div id="faq7" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                                <div class="accordion-body">
                                    Phototherapy results typically last 3-6 months depending on the condition being
                                    treated. Maintenance sessions may be recommended to sustain results. For chronic
                                    conditions, regular treatment schedules ensure continuous improvement.
                                </div>
                            </div>
                        </div>

                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#faq8">
                                    <i class="fa-solid fa-circle-check" style="color: #e91e63; margin-right: 15px;"></i>
                                    What makes Adarsh Skin Care Clinic different?
                                </button>
                            </h2>
                            <div id="faq8" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                                <div class="accordion-body">
                                    Ayush Adarsh Skin Care Clinic combines advanced technology, experienced
                                    professionals, and personalized patient care. Ayush Adarsh has extensive
                                    international training, state-of-the-art equipment, and a commitment to delivering
                                    exceptional results while ensuring patient comfort and safety.
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- CONTACT US SECTION -->
    <section style="padding: 80px 0; background: #fff;">
        <div class="container">
            <div class="section-title">
                <h2>Get In Touch With Us</h2>
                <p>Have questions? We're here to help and answer any question you might have</p>
            </div>

            <div class="row">
                <!-- Contact Info -->
                <div class="col-lg-4 col-md-6 mb-40">
                    <div
                        style="background: linear-gradient(135deg, #e91e63 0%, #d81b60 100%); padding: 35px; border-radius: 12px; color: #fff; box-shadow: 0 8px 30px rgba(233, 30, 99, 0.2);">
                        <h4 style="margin-bottom: 25px; font-weight: 700; font-size: 18px;">Contact Information</h4>

                        <div style="margin-bottom: 25px;">
                            <div style="display: flex; align-items: flex-start; gap: 15px;">
                                <i class="fa-solid fa-map-location-dot"
                                    style="font-size: 20px; margin-top: 5px; min-width: 24px;"></i>
                                <div>
                                    <h6 style="margin-bottom: 5px; font-weight: 600;">Patna Address </h6>
                                    <p style="margin: 0; font-size: 14px; line-height: 1.6;">Saraswati medical hall Nala
                                        road number 1 Rajendra Nagar Patna 800016</p>
                                </div>

                            </div>
                        </div>

                        <div style="margin-bottom: 25px;">
                            <div style="display: flex; align-items: flex-start; gap: 15px;">
                                <i class="fa-solid fa-map-location-dot"
                                    style="font-size: 20px; margin-top: 5px; min-width: 24px;"></i>

                                <div>
                                    <h6 style="margin-bottom: 5px; font-weight: 600;">Address</h6>
                                    <p style="margin: 0; font-size: 14px; line-height: 1.6;">Adarsh Skin Care Clinic,
                                        House No. 40, West Church Road, Professor Colony, Gandhi Maidan, Gaya, Bihar
                                        823001</p>
                                </div>
                            </div>
                        </div>

                        <div style="margin-bottom: 25px;">
                            <div style="display: flex; align-items: flex-start; gap: 15px;">
                                <i class="fa-solid fa-phone"
                                    style="font-size: 20px; margin-top: 5px; min-width: 24px;"></i>
                                <div>
                                    <h6 style="margin-bottom: 5px; font-weight: 600;">Phone</h6>
                                    <p style="margin: 0; font-size: 14px;">
                                        <a href="tel:+919113300981" style="color: #fff; text-decoration: none;">
                                            +91 91133 00981
                                        </a>
                                    </p>
                                </div>
                            </div>
                        </div>

                        <div style="margin-bottom: 25px;">
                            <div style="display: flex; align-items: flex-start; gap: 15px;">
                                <i class="fa-solid fa-envelope"
                                    style="font-size: 20px; margin-top: 5px; min-width: 24px;"></i>
                                <div>
                                    <h6 style="margin-bottom: 5px; font-weight: 600;">Email</h6>
                                    <p style="margin: 0; font-size: 14px;">
                                        <a href="mailto:info@adarshskincareclinic.com"
                                            style="color: #fff; text-decoration: none;">
                                            info@adarshskincareclinic.com
                                        </a>
                                    </p>
                                </div>
                            </div>
                        </div>

                        <div style="margin-bottom: 0;">
                            <div style="display: flex; align-items: flex-start; gap: 15px;">
                                <i class="fa-solid fa-clock"
                                    style="font-size: 20px; margin-top: 5px; min-width: 24px;"></i>
                                <div>
                                    <h6 style="margin-bottom: 5px; font-weight: 600;">Hours</h6>
                                    <p style="margin: 0; font-size: 14px; line-height: 1.6;">Monday to Sunday<br>10:00
                                        AM - 7:00 PM<br><span style="opacity: 0.8; font-size: 12px;">Sunday: By
                                            Appointment</span></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Contact Form -->
                <div class="col-lg-8 col-md-6">
                    <form method="POST" action="contact.php"
                        style="background: #f9f9f9; padding: 40px; border-radius: 12px; box-shadow: 0 4px 15px rgba(0, 0, 0, 0.08);">
                        <div class="row">
                            <div class="col-md-6 mb-25">
                                <input type="text" name="name" placeholder="Your Full Name" required
                                    style="width: 100%; padding: 12px 15px; border: 1px solid #ddd; border-radius: 6px; font-size: 14px; font-family: 'Poppins', sans-serif;" />
                            </div>
                            <div class="col-md-6 mb-25">
                                <input type="email" name="email" placeholder="Your Email Address" required
                                    style="width: 100%; padding: 12px 15px; border: 1px solid #ddd; border-radius: 6px; font-size: 14px; font-family: 'Poppins', sans-serif;" />
                            </div>
                            <div class="col-md-6 mb-25">
                                <input type="tel" name="phone" placeholder="Your Phone Number" required
                                    style="width: 100%; padding: 12px 15px; border: 1px solid #ddd; border-radius: 6px; font-size: 14px; font-family: 'Poppins', sans-serif;" />
                            </div>
                            <div class="col-md-6 mb-25">
                                <select name="service" required
                                    style="width: 100%; padding: 12px 15px; border: 1px solid #ddd; border-radius: 6px; font-size: 14px; font-family: 'Poppins', sans-serif;">
                                    <option value="">Select Service</option>
                                    <option value="hair-transplant">Hair Transplant</option>
                                    <option value="laser-treatment">Laser Treatment</option>
                                    <option value="cosmetic-surgery">Cosmetic Surgery</option>
                                    <option value="prp-therapy">PRP Therapy</option>
                                    <option value="skin-analysis">Skin Analysis</option>
                                    <option value="allergy-test">Allergy Test</option>
                                    <option value="other">Other</option>
                                </select>
                            </div>
                            <div class="col-12 mb-25">
                                <textarea name="message" placeholder="Your Message" rows="5" required
                                    style="width: 100%; padding: 12px 15px; border: 1px solid #ddd; border-radius: 6px; font-size: 14px; font-family: 'Poppins', sans-serif;"></textarea>
                            </div>
                            <div class="col-12">
                                <button type="submit" class="btn-primary-custom"
                                    style="width: 100%; padding: 14px 20px; font-size: 16px; font-weight: 600; border: none; cursor: pointer;">
                                    Send Message <i class="fa-solid fa-arrow-right" style="margin-left: 8px;"></i>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA SECTION -->
    <section
        style="padding: 60px 0; background: linear-gradient(135deg, #e91e63 0%, #d81b60 100%); color: #fff; text-align: center;">
        <div class="container">
            <h2 style="font-size: 36px; font-weight: 700; margin-bottom: 15px;">Ready to Transform Your Skin?</h2>
            <p style="font-size: 16px; margin-bottom: 30px; opacity: 0.9;">Schedule your consultation with Ayush Adarsh
                today and start your journey to beautiful, healthy skin.</p>
            <a href="contact.php#appointment" class="btn-secondary-custom"
                style="background-color: #fff; color: #e91e63; border: none;">Book Your Appointment Now</a>
        </div>
    </section>

    <?php include 'common/footer.php' ?>
</body>

</html>