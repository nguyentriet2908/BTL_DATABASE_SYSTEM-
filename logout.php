<?php
//session_start();
session_destroy();
header('Location: index.php?page=login'); // Redirect to login page after logout
exit();
?>
