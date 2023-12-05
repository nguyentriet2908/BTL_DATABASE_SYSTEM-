<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<!-- Boostrap -->
<?php
include("store.php");
include("database.php");
?>
<?php
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $_SESSION['specificID'] = $id;
} else {
    $id = '';
}
$sql_detail = mysqli_query($conn, "SELECT * FROM products WHERE productID='$id'");
?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

<?php

while ($row_detail = mysqli_fetch_array($sql_detail)) {
?>
<div class="col-md-12">
        <?php
        if (isset($_SESSION['updateSuccess'])) {
            if ($_SESSION['updateSuccess']) { ?>
                <div class="alert alert-success" style="font-size: 20px;">You've just updated address successfully</div>
              <?php  $_SESSION['updateSuccess'] = false;
            }
        }
        ?>
    </div>
    <section class="product">
        
        <div class="resscontainer">
            <div class="product-content rowing">
                <div class="product-content-left rowing">
                    <div class="product-content-left-big-img">
                        <img src="<?php echo $row_detail['image'] ?>">
                    </div>
                    <div class="product-content-left-small-img">
                        <img src="<?php echo $row_detail['image'] ?>">
                        <img src="<?php echo $row_detail['image'] ?>">
                        <img src="<?php echo $row_detail['image'] ?>">
                        <img src="<?php echo $row_detail['image'] ?>">
                    </div>
                </div>
                <div class="product-content-right">
                    <div class="product-content-right-product-name">
                        <h1><?php echo $row_detail['productName'] ?></h1>
                    </div>
                    <div class="product-content-right-product-price">
                        <p><?php echo $row_detail['price'] ?> <sup>$</sup></p>
                    </div>
                    <div class="product-content-right-product-color">
                        <p style="font-size: 13px;"> <span style="font-weight: bold; font-size: 13px;">Color</span>: <?php echo $row_detail['color'] ?><span style="color : red;">*</span></p>
                        <div class="product-content-right-product-color-img">
                            <img src="img/brown.jpg">
                        </div>
                    </div>
                    <div class="product-content-right-product-size">
                        <p style="font-weight: bold; font-size: 13px;">Size</p>
                        <div class="size">
                            <span>Medium</span>
                            <span>Large</span>
                        </div>
                    </div>
                    <div class="quantity">
                        <p style="font-weight: bold; margin-top: 10px; margin-right: 6px; font-size: 13px;">Quantity :</p>
                        <input type="number" min="0" value="1">

                    </div>
                    <div class="product-content-right-product-button">
                        <button class="lookatyou"><i class="fa fa-shopping-cart"></i>
                            <p style="margin: 0.1px 0px 0px 10px ; font-size: 13px;">BUY</p>
                        </button>
                        <button class="lookatme" onclick="showMap()">
                            <p style="margin: 0.1px 0px 0px 0px ; font-size: 13px;">FIND DIRECTLY AT</p>
                        </button>
                    </div>
                    <div id="mapContainer" style="display: none;">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2046.5192422326704!2d106.65690861992293!3d10.772420648932444!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31752ec3c161a3fb%3A0xef77cd47a1cc691e!2sHo%20Chi%20Minh%20City%20University%20of%20Technology%20(HCMUT)!5e0!3m2!1sen!2s!4v1665920802261!5m2!1sen!2s" width=100% height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade" frameborder="0" scrolling="no" onload="resizeIframe(this)">
                        </iframe>
                    </div>
                    <div class="product-content-right-product-icon">
                        <div class="product-content-right-product-icon-item">
                            <i class="fa fa-phone"></i>
                            <p>Hotline</p>
                        </div>
                        <div class="product-content-right-product-icon-item">
                            <i class="fa fa-comments"></i>
                            <p>Chat</p>
                        </div>
                        <div class="product-content-right-product-icon-item">
                            <i class="fa fa-envelope"></i>
                            <p>Mail</p>
                        </div>
                    </div>



                </div>
            </div>
        </div>

    </section>
    <div class="modal" id="MyModal">
        <div class="modal-dialog">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title" style="font-size:17px;">Select your address to deliver the product :</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <form action="updateAddress.php" method="post" style="font-size: 19px;">
                                <div class="mb-3">
                                    <select class="form-select form-select-lg mb-3" style="font-size: 15px;" name="city" id="city" aria-label=".form-select-lg">
                                        <option value="" selected>Chọn tỉnh thành</option>
                                    </select>

                                    <select class="form-select form-select-lg mb-3" style="font-size: 15px;" name="district" id="district" aria-label=".form-select-lg">
                                        <option value="" selected>Chọn quận huyện</option>
                                    </select>

                                    <select class="form-select form-select-lg" style="font-size: 15px;" name="ward" id="ward" aria-label=".form-select-lg">
                                        <option value="" selected>Chọn phường xã</option>
                                    </select>
                                </div>
                                <div class="form-group mb-2">
                                    <label for="houseaddress" style="font-size: 16px;">The house number:</label>
                                    <input required type="text" name="houseaddress" id="houseaddress" class="form-control" style="font-size: 15px;">
                                </div>
                                <div class="form-group">
                                    <button class="btn btn-primary btn-lg" type="submit" name="cancel">Confirm</button>
                                    <button type="button" class="btn btn-danger btn-lg" data-bs-dismiss="modal">Close</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php
}
?>
<footer class="footer">
</footer>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
<script>
    $(".lookatyou").click(function() {
        $("#MyModal").modal("show");
    });
    function showMap() {
        var mapContainer = document.getElementById("mapContainer");
        mapContainer.style.display = "block";
    }
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.21.1/axios.min.js"></script>
<!-- <script>
    var citis = document.getElementById("city");
    var districts = document.getElementById("district");
    var wards = document.getElementById("ward");
    var Parameter = {
        url: "https://raw.githubusercontent.com/kenzouno1/DiaGioiHanhChinhVN/master/data.json",
        method: "GET",
        responseType: "application/json",
    };
    var promise = axios(Parameter);
    promise.then(function(result) {
        renderCity(result.data);
    });

    function renderCity(data) {
        for (const x of data) {
            citis.options[citis.options.length] = new Option(x.Name, x.Id);
        }
        citis.onchange = function() {
            district.length = 1;
            ward.length = 1;
            if (this.value != "") {
                const result = data.filter(n => n.Id === this.value);

                for (const k of result[0].Districts) {
                    district.options[district.options.length] = new Option(k.Name, k.Id);
                }
            }
        };
        district.onchange = function() {
            ward.length = 1;
            const dataCity = data.filter((n) => n.Id === citis.value);
            if (this.value != "") {
                const dataWards = dataCity[0].Districts.filter(n => n.Id === this.value)[0].Wards;

                for (const w of dataWards) {
                    wards.options[wards.options.length] = new Option(w.Name, w.Id);
                }
            }
        };
    }
</script> -->
<script>
    var citis = document.getElementById("city");
    var districts = document.getElementById("district");
    var wards = document.getElementById("ward");
    var Parameter = {
        url: "https://raw.githubusercontent.com/kenzouno1/DiaGioiHanhChinhVN/master/data.json",
        method: "GET",
        responseType: "application/json",
    };
    var promise = axios(Parameter);
    promise.then(function(result) {
        renderCity(result.data);
    });

    function renderCity(data) {
        for (const x of data) {
            citis.options[citis.options.length] = new Option(x.Name, x.Name); // Set Name as the value
        }
        citis.onchange = function() {
            districts.length = 1;
            ward.length = 1;
            if (this.value != "") {
                const result = data.filter(n => n.Name === this.value); // Compare with Name

                for (const k of result[0].Districts) {
                    districts.options[districts.options.length] = new Option(k.Name, k.Name); // Set Name as the value
                }
            }
        };
        district.onchange = function() {
            ward.length = 1;
            const dataCity = data.filter((n) => n.Name === citis.value); // Compare with Name
            if (this.value != "") {
                const dataWards = dataCity[0].Districts.filter(n => n.Name === this.value)[0].Wards;

                for (const w of dataWards) {
                    wards.options[wards.options.length] = new Option(w.Name, w.Name); // Set Name as the value
                }
            }
        };
    }
</script>