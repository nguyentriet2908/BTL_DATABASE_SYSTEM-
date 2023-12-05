<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>mua hàng truc tuyến</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="./assets/css/main2.css">
    <link rel="stylesheet" href="./assets/css/base.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap" rel="stylesheet">
    <!--boostrap responsive-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</head>
<body>
    <div class="app">
        <header class="header">
            <div class="grid">
                <nav class="header__navbar">
                     <ul class="header__navbar-list" >
                        <li class="header__navbar-item">SOS.com</li>
                        <li class="header__navbar-item">Hotline Contact</li>
                    </ul>
                    <ul class="header__navbar-list">
                        <li class="header__navbar-item">
                            <a href="" class="header__navbar-item-link">Notice</a>
                        </li>
                        <li class="header__navbar-item">
                            <a href="" class="header__navbar-item-link">Help</a>
                        </li>
                        <li class="header__navbar-item header__navbar-item--bold">Log in</li>
                        <li class="header__navbar-item header__navbar-item--bold">Register</li>
                        <!-- <button class="button">Tieen</button> -->
                    </ul>
                </nav>
            </div>
        </header>
        <div style="background-image: linear-gradient(0,#221dac,rgb(22, 8, 103), 149, 248);height: 1000px;font-size: larger;">
        <div id="databaseData"></div>
        </div>
        
    </div>
</body>

<footer class="footer">
</footer>
<script>
    $(document).ready(function() {
        // Use AJAX to fetch data from the server
        $.ajax({
            url: 'getDB.php', // Adjust the path to your PHP script
            type: 'GET',
            dataType: 'xml', // Set data type to XML
            success: function(xml) {
                // Process the XML data and display it on the page
                var databaseData = $('#databaseData');
                databaseData.append('<h2>Database Data:</h2>');

                // Loop through the XML data and append it to the container
                $(xml).find('product').each(function() {
                    var productName = $(this).find('productName').text();
                    var price = $(this).find('price').text();
                    databaseData.append('<p>' + productName + ' - $' + price + '</p>');
                });
            },
            error: function(error) {
                console.log('Error:', error);
            }
        });
    });
</script>
</html>