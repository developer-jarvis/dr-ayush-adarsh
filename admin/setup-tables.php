<?php
include 'common/config.php';

echo "<h2>Setting up Database Tables</h2>";

// Create gallery table
$gallery_sql = "CREATE TABLE IF NOT EXISTS `gallery` (
    `id` INT AUTO_INCREMENT PRIMARY KEY,
    `image` VARCHAR(255) NOT NULL,
    `title` VARCHAR(255) NOT NULL,
    `description` TEXT,
    `category` VARCHAR(100),
    `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)";

if ($conn->query($gallery_sql) === TRUE) {
    echo "<p>✅ Gallery table created successfully</p>";
} else {
    echo "<p>❌ Error creating gallery table: " . $conn->error . "</p>";
}

// Create about_sections table
$about_sql = "CREATE TABLE IF NOT EXISTS `about_sections` (
    `id` INT AUTO_INCREMENT PRIMARY KEY,
    `section_type` ENUM('doctor','father') NOT NULL,
    `name` VARCHAR(255) NOT NULL,
    `image` VARCHAR(255),
    `content` TEXT,
    `ordering` INT DEFAULT 0,
    `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)";

if ($conn->query($about_sql) === TRUE) {
    echo "<p>✅ About sections table created successfully</p>";
} else {
    echo "<p>❌ Error creating about sections table: " . $conn->error . "</p>";
}

// Check if about sections exist
$check = $conn->query("SELECT COUNT(*) as count FROM about_sections");
$count = $check->fetch_assoc()['count'];

if ($count == 0) {
    // Insert default about sections
    $doctor_content = "Dr. Ayush Adarsh is a highly qualified and experienced dermatologist with over 10 years of expertise in treating various skin and hair conditions. He completed his MBBS from a prestigious medical college and further specialized in dermatology.

Dr. Adarsh is known for his patient-centric approach and has successfully treated thousands of patients with various skin conditions including acne, pigmentation, hair loss, and cosmetic concerns. He regularly updates his knowledge with the latest advancements in dermatological treatments and technologies.

His expertise includes laser treatments, chemical peels, PRP therapy, hair transplantation, and various cosmetic procedures. Dr. Adarsh believes in providing personalized treatment plans that deliver optimal results while ensuring patient safety and comfort.";
    
    $father_content = "Late Shri Ram Naresh Adarsh was the founding inspiration behind Adarsh Skin Care Clinic. A visionary who believed in serving the community through quality healthcare, his values and principles continue to guide our practice today.

His dedication to helping others and commitment to excellence laid the foundation for what Adarsh Skin Care Clinic represents today. His legacy lives on through our continued commitment to providing compassionate, ethical, and high-quality dermatological care to all our patients.

The clinic honors his memory by maintaining the highest standards of medical practice and patient care, ensuring that his vision of accessible and quality healthcare continues to benefit the community.";
    
    $stmt1 = $conn->prepare("INSERT INTO about_sections (section_type, name, content, ordering) VALUES (?, ?, ?, ?)");
    $section_type = 'doctor';
    $name = 'Dr. Ayush Adarsh';
    $ordering = 1;
    $stmt1->bind_param("sssi", $section_type, $name, $doctor_content, $ordering);
    
    if ($stmt1->execute()) {
        echo "<p>✅ Doctor section added successfully</p>";
    }
    
    $stmt2 = $conn->prepare("INSERT INTO about_sections (section_type, name, content, ordering) VALUES (?, ?, ?, ?)");
    $section_type = 'father';
    $name = 'Late Shri Ram Naresh Adarsh';
    $ordering = 2;
    $stmt2->bind_param("sssi", $section_type, $name, $father_content, $ordering);
    
    if ($stmt2->execute()) {
        echo "<p>✅ Father section added successfully</p>";
    }
} else {
    echo "<p>ℹ️ About sections already exist</p>";
}

echo "<h3>✅ Setup Complete!</h3>";
echo "<p><a href='gallery.php'>Go to Gallery Management</a> | <a href='about-sections.php'>Go to About Sections</a></p>";
?>