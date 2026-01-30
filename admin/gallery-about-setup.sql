-- Gallery and About Sections Setup SQL
-- Run this in phpMyAdmin or MySQL command line

-- Create gallery table
CREATE TABLE IF NOT EXISTS `gallery` (
    `id` INT AUTO_INCREMENT PRIMARY KEY,
    `image` VARCHAR(255) NOT NULL,
    `title` VARCHAR(255) NOT NULL,
    `description` TEXT,
    `category` VARCHAR(100),
    `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Create about_sections table
CREATE TABLE IF NOT EXISTS `about_sections` (
    `id` INT AUTO_INCREMENT PRIMARY KEY,
    `section_type` ENUM('doctor','father') NOT NULL,
    `name` VARCHAR(255) NOT NULL,
    `image` VARCHAR(255),
    `content` TEXT,
    `ordering` INT DEFAULT 0,
    `is_active` TINYINT(1) DEFAULT 1,
    `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Insert default about sections
INSERT INTO `about_sections` (`section_type`, `name`, `content`, `ordering`) VALUES 
('doctor', 'Dr. Ayush Adarsh', 'Dr. Ayush Adarsh is a highly qualified and experienced dermatologist with over 10 years of expertise in treating various skin and hair conditions. He completed his MBBS from a prestigious medical college and further specialized in dermatology.\n\nDr. Adarsh is known for his patient-centric approach and has successfully treated thousands of patients with various skin conditions including acne, pigmentation, hair loss, and cosmetic concerns. He regularly updates his knowledge with the latest advancements in dermatological treatments and technologies.\n\nHis expertise includes laser treatments, chemical peels, PRP therapy, hair transplantation, and various cosmetic procedures. Dr. Adarsh believes in providing personalized treatment plans that deliver optimal results while ensuring patient safety and comfort.', 1),
('father', 'Late Shri Ram Naresh Adarsh', 'Late Shri Ram Naresh Adarsh was the founding inspiration behind Adarsh Skin Care Clinic. A visionary who believed in serving the community through quality healthcare, his values and principles continue to guide our practice today.\n\nHis dedication to helping others and commitment to excellence laid the foundation for what Adarsh Skin Care Clinic represents today. His legacy lives on through our continued commitment to providing compassionate, ethical, and high-quality dermatological care to all our patients.\n\nThe clinic honors his memory by maintaining the highest standards of medical practice and patient care, ensuring that his vision of accessible and quality healthcare continues to benefit the community.', 2)
ON DUPLICATE KEY UPDATE `id`=`id`;

-- Sample gallery data (you can add your existing images here)
INSERT INTO `gallery` (`image`, `title`, `description`, `category`) VALUES 
('uploads/gallery/1752838391_1.jpg', 'Acne Treatment Result', 'Complete acne clearance with advanced laser therapy', 'Acne Treatment'),
('uploads/gallery/1752838398_2.jpg', 'Hair Transplant Success', 'Natural hair restoration with FUE technique', 'Hair Transplant'),
('uploads/gallery/1752838404_3.jpg', 'Pigmentation Treatment', 'Even skin tone achieved with laser treatment', 'Pigmentation'),
('uploads/gallery/1752838411_4.jpg', 'Chemical Peel Results', 'Glowing skin with professional chemical peeling', 'Chemical Peel'),
('uploads/gallery/1752838420_5.jpg', 'PRP Therapy Results', 'Hair regrowth with platelet-rich plasma therapy', 'PRP Therapy')
ON DUPLICATE KEY UPDATE `id`=`id`;