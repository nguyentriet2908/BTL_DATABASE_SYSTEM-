<?php
session_start();
include("database.php");
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!isset($_SESSION['username'])) {
        $_SESSION['notice']=true;
        echo "<script>Please login to continue booking product</script>";
        header('Location: index.php?page=login'); 
    }
    else {
    if (isset($_POST['city']) && isset($_POST['district'])  && isset($_POST['ward']) && isset($_POST['houseaddress'])) {
        $update = $conn->query("UPDATE users SET userAddress = CONCAT('{$_POST['houseaddress']}', ' ', '{$_POST['ward']}', ' ', '{$_POST['district']}', ' ', '{$_POST['city']}') WHERE username='{$_SESSION['username']}'");
        $_SESSION['updateSuccess'] = true;
        header('Location: productdetail.php?id=' . $_SESSION['specificID']);
    } else {
        echo "Please input full values";    
        //header('Location: productdetail.php?id=' . $_SESSION['specificID'].''); 
    }}
}