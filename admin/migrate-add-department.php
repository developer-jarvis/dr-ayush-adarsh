<?php
/**
 * Auto-migration: Add department column to business_list table
 * Run this once or include it in your config
 */
require 'common/config.php';

// Check if column exists
$checkCol = $conn->query("SHOW COLUMNS FROM business_list LIKE 'department'");

if ($checkCol->num_rows === 0) {
    // Column doesn't exist, add it
    $alterSql = "ALTER TABLE business_list ADD COLUMN department VARCHAR(255) NULL AFTER service";
    
    if ($conn->query($alterSql)) {
        echo "✓ Successfully added 'department' column to business_list table.\n";
    } else {
        echo "✗ Error adding column: " . $conn->error . "\n";
    }
} else {
    echo "✓ Column 'department' already exists.\n";
}

$conn->close();
?>

