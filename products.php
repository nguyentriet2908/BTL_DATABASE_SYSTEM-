<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<!-- Boostrap -->
<?php
// session_start();
$_SESSION['lastID'] = 0;
if ((isset($_GET['search'])) || (isset($_GET['pagenum']))) {
    include("store.php");
}
?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

<section class="category">

    <div class="containersssa" style="padding-right: 20px;">
        <div class="rowing">
            <div class="category-left">
                <ul>
                    <li class="category-left-li"><a href="#" style="text-decoration : none;">Europe Instrument</a>
                        <ul>
                            <li><a href="">V</a></li>
                            <li><a href="">Trendy world</a></li>
                            <li><a href="">Jeans for join</a></li>
                        </ul>
                    </li>

                    <li class="category-left-li"><a href="#" style="text-decoration : none;">Asia Instrument</a>
                        <ul>
                            <li><a href="">New Men Packet</a></li>
                            <li><a href="">Trendy world</a></li>
                            <li><a href="">Jeans for join</a></li>
                        </ul>
                    </li>
                    <li class="category-left-li"><a href="" style="text-decoration : none;">Antique Instrument</a></li>
                    <li class="category-left-li"><a href="" style="text-decoration : none;">New Instrument</a></li>
                </ul>
            </div>
            <div class="category-right rowing">
                <div class="category-right-top-item">
                    <p>NEW INSTRUMENTS
                    </p>
                </div>
                <div class="category-right-top-item">
                    <button><span>Filter</span><i class="fa fa-sort-down"></i></button>
                </div>
                <div class="category-right-top-item">
                    <select name="" id="">
                        <option value="">Arrange</option>
                        <option value="">Price from low to high</option>
                        <option value="">Price down high to low</option>
                    </select>
                    <!-- <div class="dropdown">
                        <button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown" style="color: black;">
                        Arrange
                        </button>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">Price from low to high</a></li>
                            <li><a class="dropdown-item" href="#">Price down high to low</a></li>
                        </ul>
                    </div> -->
                </div>
                <div class="category-right-bottom" id="searchresult">
                    <?php
                    // Assuming $conn is your database connection
                    include("database.php");
                    if (isset($_GET['pagenum'])) {
                        $pagenumber = $_GET['pagenum'];
                    } else $pagenumber = '';
                    if ($pagenumber == '' || $pagenumber == 1) {
                        $begin = 0;
                    } else {
                        $begin = ($pagenumber * 4) - 4;
                    }
                    if (isset($_GET['search'])) {
                        // Search query is present, filter products based on the search term
                        $search = $_GET['search'];
                        $sql = "SELECT * FROM products WHERE productName LIKE '%$search%' LIMIT $begin,4";
                    } else {
                        // No search query, fetch all products
                        $sql = "SELECT * FROM products LIMIT $begin,4"; //{$_SESSION['lastID']}
                    }

                    // Fetch data from the 'products' table
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        // Output data of each row
                        echo '<div class="category-right-content rowing" >';

                        while ($row = $result->fetch_assoc()) {
                            $_SESSION['lastID'] = $row['productID'];
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
                        echo '<div class="category-right-bottom rowing" style="justify-content: center;">';
                        echo '<br>';
                        echo '<h1>';
                        echo "No products found";
                        echo '</h1>';
                        echo '</div>';
                    }
                    // Close the database connection
                    //$conn->close();
                    ?></div>
                <div class="category-right-bottom rowing">
                    <div class="category-right-bottom-items">
                        <p>Show product 4 <span>|</span> 8 ones</p>
                    </div>
                    
                    <div class="category-right-bottom-items">
                        <button class="btn btn-success btn-xs slot-btn loadingmore">Load More</button>
                    </div>
                    <div class="category-right-bottom-items">
                        <?php
                        $sql_page = "SELECT * FROM products";
                        $resultpage = $conn->query($sql_page);
                        $pagenum = ceil($resultpage->num_rows / 4);
                        ?>
                        <ul class="pagination">
                            <li class="page-item disabled"><a class="page-link" href="#">Page: </a></li>
                            <?php for ($i = 1; $i <= $pagenum; $i++) { ?>
                                <li class="page-item <?php if ($pagenumber == $i) echo "active";
                                                        else "" ?>"><a class="page-link" href="products.php?pagenum=<?php echo $i;
                                                                                                                                                            $_SESSION['page'] = true; ?>"><?php echo $i; ?></a></li>
                            <?php  } ?>
                        </ul>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <?php if ((isset($_GET['search'])) || (isset($_GET['pagenum']))) {
        include("footer.php");
    }
    ?>
</section>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

<script type="text/javascript">
    $(document).ready(function() {
        $("#live_search").keyup(function() {
            var input = $(this).val();

            if (input != "") {
                $.ajax({
                    url: "livesearch.php",
                    method: "POST",
                    data: {
                        input: input
                    },
                    success: function(data) {
                        $("#searchresult").html(data);
                    }
                });
            } else {
                $("#searchresult").css("display", "none");
            }
        });
    });
</script>
<script>
    $(".loadingmore").click(function() {
        alert("ok");
    })
</script>