<?php
// Connect to database
$conn = new mysqli("localhost", "root", "", "book_management");

// Create tables
$conn->query("CREATE TABLE IF NOT EXISTS users (
    user_id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(100),
    password VARCHAR(255),
    role ENUM('teacher', 'student')
)");

$conn->query("CREATE TABLE IF NOT EXISTS books (
    book_id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255),
    description TEXT,
    cover_image VARCHAR(255)
)");

$conn->query("CREATE TABLE IF NOT EXISTS assignments (
    assignment_id INT AUTO_INCREMENT PRIMARY KEY,
    book_id INT,
    user_id INT
)");

echo "Database setup done.";
?>