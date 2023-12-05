<?php
include("database.php");

if (isset($_POST['input'])) {
    $input = $_POST['input'];
    $sql = "SELECT * FROM products WHERE productName LIKE '%$input%'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo '<div class="category-right-content rowing">';
        while ($row = $result->fetch_assoc()) {
            echo '<div class="category-right-content-item">';
            echo '<a href="productdetail.php?id=' . $row['productID'] . '">';
            echo '<img src="' . $row['image'] . '" alt="">';
            echo '</a>';
            echo '<h1>' . $row['productName'] . '</h1>';
            echo '<p>' . $row['price'] . ' <sub>$</sub></p>';
            echo '</div>';
        }
        echo '</div>';
    } else {
        echo '<div class="category-right-bottom rowing">';
        echo '<h1>No products found</h1>';
        echo '</div>';
    }
    $conn->close();
}
?>

