<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>mua hàng trực tuyến</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css">
    <link rel="stylesheet" href="./assets/css/main2.css">
    <link rel="stylesheet" href="./assets/css/base.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</head>

<body>
    <div class="app">
        <header class="header">
            <div class="grid">
                <nav class="header__navbar">
                    <ul class="header__navbar-list">
                        <li class="header__navbar-item"><a href="index.php?page=home" style="text-decoration: none;color: white;font-size:large;">Music.com</a></li>
                        <li class="header__navbar-item"><a href="" style="text-decoration: none;color: white;font-size:large;">Hotline Contact : 0923432345</a></li>
                        <?php
                        $page = isset($_GET['page']) ? $_GET['page'] : 'home';
                        $pagenumber = isset($_GET['pagenum']) ;
                        if (($page === 'products') || ($pagenumber) ||(isset($_GET['search']))) :
                        ?>
                            <!-- Include the search box only for products.php -->
                            <li class="header__navbar-item header__navbar-item--search">
                                <div class="search-box">
                                    <form action="products.php" method="GET">
                                        <input type="text" name="search" class="search-input" placeholder="Search...">
                                        <button type="submit" class="search-btn"><i class="fa fa-search"></i></button>
                                    </form>
                                </div>
                            </li>
                        <?php endif; ?>
                    </ul>
                    <ul class="header__navbar-list">
                        <?php
                        session_start();
                        if (isset($_SESSION['username'])) {
                            echo '<li class="header__navbar-item">
                            <a href="index.php?page=products" class="header__navbar-item-link" style="font-size: large;">Products</a>
                          </li>
                            <li class="header__navbar-item">
                                    <a href="dashboard.php" class="header__navbar-item-link" style="font-size: large;">' . $_SESSION['username'] . '</a>
                                  </li>
                                  
                                  <li class="header__navbar-item">
                                    <a href="index.php?page=logout" class="header__navbar-item header__navbar-item--bold" style="font-size: large;">Logout</a>
                                  </li>';
                        } else {
                            echo '<li class="header__navbar-item">
                                <a href="index.php?page=home" class="header__navbar-item-link" style="font-size:large;">Home</a>
                            </li>
                            <li class="header__navbar-item">
                                <a href="index.php?page=products" class="header__navbar-item-link" style="font-size:large;">Products</a>
                            </li>
                            <li class="header__navbar-item">
                                <a href="index.php?page=login" class="header__navbar-item header__navbar-item--bold" style="font-size:large;">Log in</a>
                            </li>
                            <li class="header__navbar-item">
                                <a href="index.php?page=register" class="header__navbar-item header__navbar-item--bold" style="font-size:large;">Register</a>
                            </li>';
                        }
                        ?>
                    </ul>
                </nav>
                <main>
                </main>
            </div>
        </header>
    </div>
</body>
</html>