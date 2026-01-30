<footer class="footer">
    <div class="container">
        <div class="row">
            <!-- About Column -->
            <div class="col-lg-3 col-md-6 footer-column">
                <h4>About Adarsh Clinic</h4>
                <p>Ayush Adarsh Skin Care Clinic is a state-of-the-art dermatological center led by Ayush Adarsh. We
                    provide comprehensive skin and hair care solutions with the latest technology and international
                    standards.</p>
                <div class="footer-social mt-20">
                    <a href="https://www.facebook.com/profile.php?id=61587302186363" target="_blank" title="Facebook"><i class="fa-brands fa-facebook"></i></a>
                    <a href="https://www.instagram.com/theskindoctor.in/" target="_blank" title="Instagram"><i class="fa-brands fa-instagram"></i></a>
                    <a href="https://www.linkedin.com/in/ayush-adarsh-1b71b83a9/" target="_blank" title="LinkedIn"><i class="fa-brands fa-linkedin"></i></a>
                    <a href="https://wa.me/919113300981" target="_blank" title="WhatsApp"><i class="fa-brands fa-whatsapp"></i></a>
                </div>
            </div>

            <!-- Quick Links -->
            <div class="col-lg-3 col-md-6 footer-column">
                <h4>Quick Links</h4>
                <ul>
                    <li><a href="index.php">Home</a></li>
                    <li><a href="about.php">About Us</a></li>
                    <li><a href="gallery.php">Gallery</a></li>
                    <li><a href="testimonials.php">Testimonials</a></li>
                    <li><a href="blog.php">Blog</a></li>
                    <li><a href="contact.php">Contact</a></li>
                </ul>
            </div>

            <!-- Services -->
            <div class="col-lg-3 col-md-6 footer-column">
                <h4>Our Services</h4>
                <ul>
                    <li><a href="service-hair-transplant.php">Hair Transplant</a></li>
                    <li><a href="service-cosmetic-surgery.php">Cosmetic Surgery</a></li>
                    <li><a href="service-laser-treatment.php">Laser Treatment</a></li>
                    <li><a href="service-prp-therapy.php">PRP Therapy</a></li>
                    <li><a href="service-skin-analysis.php">Skin Analysis</a></li>
                    <li><a href="service-hair-analysis.php">Hair Analysis</a></li>
                </ul>
            </div>

            <!-- Contact Info -->
            <div class="col-lg-3 col-md-6 footer-column">
                <h4>Contact Us</h4>
                <p><strong>Patna Address:</strong><br>Saraswati medical hall
                    Nala road number 1
                    Rajendra Nagar Patna 800016</p>
                <p><strong>Gaya Address:</strong><br>Adarsh Skin Care Clinic, House No. 40, West Church Road, Professor
                    Colony, Gandhi Maidan, Gaya, Bihar 823001</p>
                <p><strong>Phone:</strong><br><a href="tel:+919113300981">+91 91133 00981</a></p>
                <p><strong>Email:</strong><br><a
                        href="mailto:info@adarshskincareclinic.com">info@adarshskincareclinic.com</a></p>
                <p><strong>Hours:</strong><br>Mon–Sun: 10:00 AM – 7:00 PM<br>Sunday: By Appointment</p>
            </div>
        </div>

        <div class="footer-bottom">
            <p>&copy; <?php echo date('Y'); ?> Adarsh Skin Care Clinic, Patna. All rights reserved. | <a
                    href="privacy-policy.php" class="text-white">Privacy Policy</a> | <a href="terms-and-conditions.php"
                    class="text-white">Terms & Conditions</a></p>
            <p style="margin-top: 10px; font-size: 12px;">Designed & Developed by <a
                    href="https://coralwebtechnology.com/" target="_blank" style="color: var(--primary-color);">Coral
                    Web Technology</a></p>
        </div>
    </div>
</footer>

<!-- Scroll to Top Button -->
<button id="scrollTopBtn" class="scroll-top-btn" onclick="scrollToTop()">
    <i class="fa-solid fa-arrow-up"></i>
</button>

<script>
    // Show/Hide Scroll Top Button
    window.addEventListener('scroll', function () {
        const btn = document.getElementById('scrollTopBtn');
        if (window.pageYOffset > 300) {
            btn.style.display = 'block';
        } else {
            btn.style.display = 'none';
        }
    });

    // Scroll to Top Function
    function scrollToTop() {
        window.scrollTo({
            top: 0,
            behavior: 'smooth'
        });
    }

    // Navbar scroll effect
    window.addEventListener('scroll', function () {
        const navbar = document.querySelector('.main-navbar');
        if (window.pageYOffset > 50) {
            navbar.classList.add('scrolled');
        } else {
            navbar.classList.remove('scrolled');
        }
    });
</script>