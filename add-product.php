<?php
include("database.php"); // Connect to the database

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $productName = $_POST['productName'];
    $color = $_POST['color'];
    $size = $_POST['size'];
    $price = $_POST['price'];

    $sql = "INSERT INTO products (productName, color, size, price) VALUES ('$productName', '$color', '$size', '$price')";

    if ($conn->query($sql) === TRUE) {
        $conn->close();
        echo 'Product added successfully!';
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
} else {
    echo "Invalid request!";
}


?>
