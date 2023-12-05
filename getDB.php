<?php
include("database.php"); 


$sql = "SELECT productName, price FROM products";
$result = $conn->query($sql);

// Create a new XML document
$xmlDoc = new DOMDocument();
$xmlDoc->formatOutput = true;

// Create the root element
$root = $xmlDoc->createElement("products");
$xmlDoc->appendChild($root);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        // Create product element
        $product = $xmlDoc->createElement("product");
        
        // Create child elements for product details
        $productName = $xmlDoc->createElement("productName", $row['productName']);
        $price = $xmlDoc->createElement("price", $row['price']);
        
        // Append child elements to the product element
        $product->appendChild($productName);
        $product->appendChild($price);
        
        // Append the product element to the root
        $root->appendChild($product);
    }
}

$conn->close();

// Set the content type to XML
header("Content-type: text/xml");

// Output the XML content
echo $xmlDoc->saveXML();
?>
