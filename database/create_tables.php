<?php
$host = 'localhost';
$username = 'root';
$password = '';
$database = 'project_store';

// Step 1: Connect to MySQL (no DB yet)
$conn = new mysqli($host, $username, $password);
if ($conn->connect_error) {
    die(" Connection failed: " . $conn->connect_error);
}

// Step 2: Create database if not exists
if ($conn->query("CREATE DATABASE IF NOT EXISTS $database") !== TRUE) {
    die(" Failed to create database: " . $conn->error);
}

// Step 3: Select database
$conn->select_db($database);

//  Step 4: SAFETY CHECK — skip if 'users' table exists
$check = $conn->query("SHOW TABLES LIKE 'users'");
if ($check && $check->num_rows > 0) {
    die("Setup already completed. Tables exist — skipping setup.");
}

// Step 5: Create tables
$sqlTables = "
CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(100),
    email VARCHAR(100) UNIQUE,
    password VARCHAR(255),
    shipping_address TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE IF NOT EXISTS products (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100),
    description TEXT,
    image VARCHAR(255),
    price DECIMAL(10,2),
    shipping_cost DECIMAL(10,2)
);

CREATE TABLE IF NOT EXISTS comments (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT,
    product_id INT,
    rating INT,
    image VARCHAR(255),
    text TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE IF NOT EXISTS cart (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT,
    product_id INT,
    quantity INT
);

CREATE TABLE IF NOT EXISTS orders (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT,
    total_amount DECIMAL(10,2),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
";

if (!$conn->multi_query($sqlTables)) {
    die("❌ Table creation failed: " . $conn->error);
}

// Clear results between multiple queries
while ($conn->more_results() && $conn->next_result()) {;}

// Step 6: Insert seed data
$sqlSeed = "
INSERT INTO users (username, email, password, shipping_address)
VALUES 
('harvi', 'harvi@example.com', 'hashedpass1', '123 Maple St, Ontario'),
('Jieliang', 'jieliang@example.com', 'hashedpass2', '456 Oak St, Toronto'),
('joban', 'joban@example.com', 'hashedpass3', '789 Pine St, Waterloo');

INSERT INTO products (name, description, image, price, shipping_cost)
VALUES 
('Coffee Mug', 'Ceramic mug for hot drinks', 'https://via.placeholder.com/150', 9.99, 2.50),
('Notebook', 'Hardcover ruled notebook', 'https://via.placeholder.com/150', 5.49, 1.20),
('Wireless Mouse', 'Compact ergonomic mouse', 'https://via.placeholder.com/150', 15.99, 3.00),
('USB-C Charger', 'Fast 25W USB-C charger', 'https://via.placeholder.com/150', 18.99, 2.75),
('Water Bottle', 'Stainless steel insulated bottle', 'https://via.placeholder.com/150', 12.50, 2.00);

INSERT INTO cart (user_id, product_id, quantity)
VALUES 
(1, 1, 2),
(1, 3, 1),
(2, 2, 3);

INSERT INTO orders (user_id, total_amount)
VALUES 
(1, 35.97),
(2, 16.47);

INSERT INTO comments (user_id, product_id, rating, image, text)
VALUES 
(1, 1, 5, 'https://via.placeholder.com/100', 'Amazing mug! Keeps coffee warm.'),
(2, 2, 4, '', 'Notebook pages are smooth, great quality.'),
(3, 3, 3, '', 'Mouse works well but feels a bit too light.');
";

if ($conn->multi_query($sqlSeed)) {
    echo "All tables created and seed data inserted.";
} else {
    echo "Error inserting seed data: " . $conn->error;
}

$conn->close();
?>
