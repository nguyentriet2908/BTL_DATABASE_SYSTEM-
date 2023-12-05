<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "OnlineStore";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if tables exist
$result = $conn->query("SHOW TABLES LIKE 'products'");
if ($result->num_rows == 0) {
    // Table 'products' does not exist, create it
    $sql = "CREATE TABLE products (
        productID INT AUTO_INCREMENT PRIMARY KEY,
        productName VARCHAR(255) NOT NULL,
        color VARCHAR(255) NOT NULL,
        size VARCHAR(255) NOT NULL,
        price DECIMAL(10, 2) NOT NULL,
        image VARCHAR(255) NOT NULL
    )";
    if ($conn->query($sql) === TRUE) {
        echo "Table 'products' created successfully\n";
        
        // Insert sample products
        $sql = "INSERT INTO products (productName, color, size, price, image) VALUES 
            ('VIOLIN ELECTRIC', 'Brown', 'Medium', 5900, 'img/violin-electric-brown.webp'),
            ('VIOLIN BAROQUE', 'Brown', 'Large', 7900, 'img/violin-baroque.jpg'),
            ('PIANO ELECTRIC', 'Black', 'Large', 9890, 'img/piano-electric.jpg'),
            ('PIANO GRAND', 'Black', 'Large', 98890, 'img/grand-piano.webp'),
            ('DAN BAU', 'Brown', 'Medium', 1890, 'img/dan-bau.jpg'),
            ('DAN TY BA', 'Brown', 'Medium', 890, 'img/ty-ba.jpg'),
            ('DAN TRANH', 'Dark', 'Large', 1590, 'img/dan-tranh.jpg'),
            ('GUITAR', 'Brown', 'Large', 2890, 'img/Dan-guitar-thung.jpg')";
        if ($conn->query($sql) === TRUE) {
            echo "Sample products inserted successfully\n";
        } else {
            echo "Error inserting products: " . $conn->error . "\n";
        }
    } else {
        echo "Error creating table: " . $conn->error . "\n";
    }
} else {
    //echo "Table 'products' already exists\n";
}

$result = $conn->query("SHOW TABLES LIKE 'users'");
if ($result->num_rows == 0) {
    // Table 'users' does not exist, create it
    $sql = "CREATE TABLE users (
        userID INT AUTO_INCREMENT PRIMARY KEY,
        username VARCHAR(255) UNIQUE,
        email VARCHAR(255) NOT NULL,
        password VARCHAR(555) NOT NULL
    )";
    if ($conn->query($sql) === TRUE) {
        //echo "Table 'users' created successfully\n";
        
        // Insert sample user (with hashed password)
        $username = "sampleuser";
        $email = "sample@example.com"; // Add a sample email
        $password = password_hash("password123", PASSWORD_DEFAULT);
        $sql = "INSERT INTO users (username, email, password) VALUES ('$username', '$email', '$password')";
        if ($conn->query($sql) === TRUE) {
            echo "Sample user inserted successfully\n";
        } else {
            echo "Error inserting user: " . $conn->error . "\n";
        }
    } else {
        echo "Error creating table: " . $conn->error . "\n";
    }
} else {
    //echo "Table 'users' already exists\n";
}
?>
