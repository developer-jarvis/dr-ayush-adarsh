-- Add these tables to your dr-ayush-adarsh database for dynamic gallery and about sections

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
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE IF NOT EXISTS about_section_contents (
    id INT AUTO_INCREMENT PRIMARY KEY,
    about_section_id INT NOT NULL,
    content TEXT,
    image VARCHAR(255),
    ordering INT DEFAULT 0,
    FOREIGN KEY (about_section_id) REFERENCES about_sections(id) ON DELETE CASCADE
);