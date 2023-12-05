<?php
include("database.php"); // Connect to the database

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT); // Hash the password

    // Check if the username already exists
    $checkUsernameQuery = "SELECT * FROM users WHERE username = '$username'";
    $resultUsername = $conn->query($checkUsernameQuery);

    // Check if the email already exists
    $checkEmailQuery = "SELECT * FROM users WHERE email = '$email'";
    $resultEmail = $conn->query($checkEmailQuery);

    if ($resultUsername->num_rows > 0) {
        echo 'Username already exists. Please choose a different username.';
    } elseif ($resultEmail->num_rows > 0) {
        echo 'Email already exists. Please use a different email address.';
    } else {
        // Both username and email are unique, proceed with registration
        $sql = "INSERT INTO users (username, email, password) VALUES ('$username', '$email', '$password')";

        if ($conn->query($sql) === TRUE) {
            // Registration successful, redirect to index.php?page=home
            $conn->close(); // Close the connection after the operation
            session_start();
            echo 'Registration successful!';
            exit();
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
} else {
    echo "Invalid request!";
}
?>
