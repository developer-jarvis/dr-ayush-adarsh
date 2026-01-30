<?php
// Migration script to set up gallery and about sections tables
include 'common/config.php';

echo "<h2>Database Migration - Gallery & About Sections</h2>";

// Create gallery table
$gallery_sql = "CREATE TABLE IF NOT EXISTS gallery (
    id INT AUTO_INCREMENT PRIMARY KEY,
    image VARCHAR(255) NOT NULL,
    title VARCHAR(255) NOT NULL,
    description TEXT,
    category VARCHAR(100),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)";

if ($conn->query($gallery_sql) === TRUE) {
    echo "<p>✅ Gallery table created successfully</p>";
} else {
    echo "<p>❌ Error creating gallery table: " . $conn->error . "</p>";
}

// Create about_sections table
$about_sql = "CREATE TABLE IF NOT EXISTS about_sections (
    id INT AUTO_INCREMENT PRIMARY KEY,
    section_type ENUM('doctor','father') NOT NULL,
    name VARCHAR(255) NOT NULL,
    image VARCHAR(255),
    content TEXT,
    ordering INT DEFAULT 0,
    is_active TINYINT(1) DEFAULT 1,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)";

if ($conn->query($about_sql) === TRUE) {
    echo "<p>✅ About sections table created successfully</p>";
} else {
    echo "<p>❌ Error creating about sections table: " . $conn->error . "</p>";
}

// Insert default about sections
$check_about = $conn->query("SELECT COUNT(*) as count FROM about_sections");
$count = $check_about->fetch_assoc()['count'];

if ($count == 0) {
    $default_sections = [
        [
            'section_type' => 'doctor',
            'name' => 'Dr. Ayush Adarsh',
            'content' => "Dr. Ayush Adarsh is a highly qualified and experienced dermatologist with over 10 years of expertise in treating various skin and hair conditions. He completed his MBBS from a prestigious medical college and further specialized in dermatology.\n\nDr. Adarsh is known for his patient-centric approach and has successfully treated thousands of patients with various skin conditions including acne, pigmentation, hair loss, and cosmetic concerns. He regularly updates his knowledge with the latest advancements in dermatological treatments and technologies.\n\nHis expertise includes laser treatments, chemical peels, PRP therapy, hair transplantation, and various cosmetic procedures. Dr. Adarsh believes in providing personalized treatment plans that deliver optimal results while ensuring patient safety and comfort.",
            'ordering' => 1
        ],
        [
            'section_type' => 'father',
            'name' => 'Late Shri Ram Naresh Adarsh',
            'content' => "Late Shri Ram Naresh Adarsh was the founding inspiration behind Adarsh Skin Care Clinic. A visionary who believed in serving the community through quality healthcare, his values and principles continue to guide our practice today.\n\nHis dedication to helping others and commitment to excellence laid the foundation for what Adarsh Skin Care Clinic represents today. His legacy lives on through our continued commitment to providing compassionate, ethical, and high-quality dermatological care to all our patients.\n\nThe clinic honors his memory by maintaining the highest standards of medical practice and patient care, ensuring that his vision of accessible and quality healthcare continues to benefit the community.",
            'ordering' => 2
        ]
    ];
    
    foreach ($default_sections as $section) {
        $stmt = $conn->prepare("INSERT INTO about_sections (section_type, name, content, ordering) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("sssi", $section['section_type'], $section['name'], $section['content'], $section['ordering']);
        
        if ($stmt->execute()) {
            echo "<p>✅ Default about section '{$section['name']}' added</p>";
        } else {
            echo "<p>❌ Error adding default section: " . $conn->error . "</p>";
        }
    }
} else {
    echo "<p>ℹ️ About sections already exist, skipping default data insertion</p>";
}

// Create upload directories
$directories = ['uploads/gallery', 'uploads/about'];
foreach ($directories as $dir) {
    if (!file_exists($dir)) {
        if (mkdir($dir, 0777, true)) {
            echo "<p>✅ Directory '$dir' created successfully</p>";
        } else {
            echo "<p>❌ Failed to create directory '$dir'</p>";
        }
    } else {
        echo "<p>ℹ️ Directory '$dir' already exists</p>";
    }
}

echo "<h3>Migration completed!</h3>";
echo "<p><a href='gallery.php'>Go to Gallery Management</a> | <a href='about-sections.php'>Go to About Sections Management</a></p>";
?>