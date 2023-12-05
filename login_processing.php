<?php
session_start();
include("database.php"); // Connect to the database

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE username='$username'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        // Verify the entered password with the stored hashed password
        if (password_verify($password, $row['password'])) {
            $_SESSION['username'] = $username;
            // Add cookies after successful login
            setcookie('username', $username, time() + 3600, '/');
            $conn->close();
            header('Location: dashboard.php'); // Redirect to the dashboard
            exit();
        }
    }
    $_SESSION['message'] = 'Incorrect username or password!';
    $_SESSION['entered_username'] = $username;
    header('Location: index.php?page=login'); // Redirect back to the login page
    exit();
} else {
    echo "Invalid request!";
}
$conn->close();
?>
