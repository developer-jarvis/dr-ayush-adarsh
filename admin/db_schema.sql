-- Database schema for dynamic gallery, about sections, and admin user

CREATE TABLE IF NOT EXISTS admin_users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(100) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE IF NOT EXISTS gallery (
    id INT AUTO_INCREMENT PRIMARY KEY,
    image VARCHAR(255) NOT NULL,
    title VARCHAR(255) NOT NULL,
    description TEXT,
    category VARCHAR(100),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE IF NOT EXISTS about_sections (
    id INT AUTO_INCREMENT PRIMARY KEY,
    section_type ENUM('doctor','father') NOT NULL,
    name VARCHAR(255) NOT NULL,
    image VARCHAR(255),
    content TEXT,
    ordering INT DEFAULT 0,
    is_active TINYINT(1) DEFAULT 1,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Insert default about sections
INSERT INTO about_sections (section_type, name, content, ordering) VALUES 
('doctor', 'Dr. Ayush Adarsh', 'Dr. Ayush Adarsh is a highly qualified and experienced dermatologist with over 10 years of expertise in treating various skin and hair conditions. He completed his MBBS from a prestigious medical college and further specialized in dermatology.\n\nDr. Adarsh is known for his patient-centric approach and has successfully treated thousands of patients with various skin conditions including acne, pigmentation, hair loss, and cosmetic concerns. He regularly updates his knowledge with the latest advancements in dermatological treatments and technologies.\n\nHis expertise includes laser treatments, chemical peels, PRP therapy, hair transplantation, and various cosmetic procedures. Dr. Adarsh believes in providing personalized treatment plans that deliver optimal results while ensuring patient safety and comfort.', 1),
('father', 'Late Shri Ram Naresh Adarsh', 'Late Shri Ram Naresh Adarsh was the founding inspiration behind Adarsh Skin Care Clinic. A visionary who believed in serving the community through quality healthcare, his values and principles continue to guide our practice today.\n\nHis dedication to helping others and commitment to excellence laid the foundation for what Adarsh Skin Care Clinic represents today. His legacy lives on through our continued commitment to providing compassionate, ethical, and high-quality dermatological care to all our patients.\n\nThe clinic honors his memory by maintaining the highest standards of medical practice and patient care, ensuring that his vision of accessible and quality healthcare continues to benefit the community.', 2)
ON DUPLICATE KEY UPDATE id=id;