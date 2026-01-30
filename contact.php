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
        ['label' => 'Contact Us', 'url' => null]
    ];
    $pageTitle = "Contact Us";
    $pageSubtitle = "Get in Touch with Adarsh Skin Care Clinic";
    include 'common/breadcrumb.php'; 
    ?>

    <!-- Contact Section -->
    <section class="section-padding contact-section">
        <div class="container">
            <div class="row">
                <!-- Contact Info -->
                <div class="col-lg-4 col-md-6" style="margin-bottom: 40px;">
                    <div class="contact-card">
                        <div class="contact-icon-wrapper">
                            <i class="fa-solid fa-phone"></i>
                        </div>
                        <h3>Phone</h3>
                        <p class="contact-link"><a href="tel:+919113300981">+91 91133 00981</a></p>
                   
                    </div>

                    <div class="contact-card">
                        <div class="contact-icon-wrapper">
                            <i class="fa-solid fa-envelope"></i>
                        </div>
                        <h3>Email</h3>
                        <p class="contact-link"><a href="mailto:info@adarshskincareclinic.com">info@adarshskincareclinic.com</a></p>
                        <p class="contact-desc">Quick response within 2 hours</p>
                    </div>

                    <div class="contact-card">
                        <div class="contact-icon-wrapper">
                            <i class="fa-solid fa-clock"></i>
                        </div>
                        <h3>Hours</h3>
                        <p class="contact-desc">Mon–Sun: 10:00 AM – 7:00 PM<br><span style="opacity: 0.7;">Sunday: By Appointment</span></p>
                    </div>
                </div>

                <!-- Contact Map -->
                <div class="col-lg-4 col-md-6" style="margin-bottom: 40px;">
                    <div class="map-container">
                        <iframe width="100%" height="100%" style="border: none;" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3573.8923877614236!2d85.1396!3d25.5941!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39ed58a7e5e5e5e5%3A0x5e5e5e5e5e5e5e5e!2sPatna!5e0!3m2!1sen!2sin" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
                    <div class="address-badge">
                        <i class="fa-solid fa-location-dot"></i>
                        <span><strong>Address:</strong> Saraswati medical hall Nala road number 1 Rajendra Nagar Patna 800016</span>
                    </div>

                    <div class="address-badge">
                        <i class="fa-solid fa-location-dot"></i>
                        <span><strong>Address:</strong> Adarsh Skin Care Clinic, House No. 40, West Church Road, Professor Colony, Gandhi Maidan, Gaya, Bihar 823001</span>
                    </div>
                </div>

                <!-- Appointment Form -->
                <div class="col-lg-4" style="margin-bottom: 40px;">
                    <div id="appointment" class="appointment-form-card">
                        <div class="form-header">
                            <h3><i class="fa-solid fa-calendar-check"></i> Book Appointment</h3>
                            <p>Schedule your consultation with our experts</p>
                        </div>
                        <form method="POST">
                            <div class="form-group">
                                <label>Full Name *</label>
                                <input type="text" name="name" class="form-control" placeholder="Enter Your Name" required>
                            </div>

                            <div class="form-group">
                                <label>Email *</label>
                                <input type="email" name="email" class="form-control" placeholder="Enter Your Email" required>
                            </div>

                            <div class="form-group">
                                <label>Phone *</label>
                                <input type="tel" name="phone" class="form-control" placeholder="Enter Your Phone" required>
                            </div>

                            <div class="form-group">
                                <label>Service *</label>
                                <select name="service" class="form-control" required>
                                    <option value="">Select Service</option>
                                    <option value="Hair Transplant">Hair Transplant</option>
                                    <option value="Cosmetic Surgery">Cosmetic Surgery</option>
                                    <option value="Laser Treatment">Laser Treatment</option>
                                    <option value="PRP Therapy">PRP Therapy</option>
                                    <option value="Skin Analysis">Skin Analysis</option>
                                    <option value="Other">Other</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label>Preferred Date *</label>
                                <input type="date" name="date" class="form-control" required>
                            </div>

                            <div class="form-group">
                                <label>Message</label>
                                <textarea name="message" class="form-control" placeholder="Enter Your Message" rows="3"></textarea>
                            </div>

                            <button type="submit" class="btn-submit-enhanced">Book Appointment</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <?php include 'common/footer.php' ?>
</body>
</html>