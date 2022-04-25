<!-- Php code for starting session, making database connection and setting form values to database variables -->
<?php
session_start();
$connect = mysqli_connect("localhost", "celtnlfi_admin", "tVoq=ly!=2W6", "celtnlfi_case");

if (isset($_POST["add_to_cart"])) {
    if (isset($_SESSION["shopping_cart"])) {
        $item_array_id = array_column($_SESSION["shopping_cart"], "item_id");
        if (!in_array($_GET["SAMSUNG_ID"], $item_array_id)) {
            $count = count($_SESSION["shopping_cart"]);
            $item_array = array(
                'item_id'            =>    $_GET["SAMSUNG_ID"],
                'item_name'            =>    $_POST["hidden_name"],
                'item_price'        =>    $_POST["hidden_price"],
                'item_quantity'        =>    $_POST["quantity"]
            );
            $_SESSION["shopping_cart"][$count] = $item_array;
        } else {
            echo '<script>alert("Item Already Added")</script>';
        }
    } else {
        $item_array = array(
            'item_id'            =>    $_GET["SAMSUNG_ID"],
            'item_name'            =>    $_POST["hidden_name"],
            'item_price'        =>    $_POST["hidden_price"],
            'item_quantity'        =>    $_POST["quantity"]
        );
        $_SESSION["shopping_cart"][0] = $item_array;
    }
}

if (isset($_GET["action"])) {
    if ($_GET["action"] == "delete") {
        foreach ($_SESSION["shopping_cart"] as $keys => $values) {
            if ($values["item_id"] == $_GET["SAMSUNG_ID"]) {
                unset($_SESSION["shopping_cart"][$keys]);
                echo '<script>alert("Item Removed")</script>';
                echo '<script>window.location="samsung.php"</script>';
            }
        }
    }
}

?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <!-- Other CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- Styles CSS -->
    <link rel="stylesheet" href="css/styles.css">


    <title>Samsung</title>
</head>
<!-- Body -->

<body class="bg-dark" data-bs-scrollspy="scroll" data-bs-target=".navbar">

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-light bg-dark  nav-nav">
        <div class="container-fluid">
            <a class="navbar-brand text-white" href="index.php"><img src="img/animated_logo/logo2.gif" alt="site logo"></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ">
                    <li class="nav-item">
                        <a class="nav-link active  text-white" href="samsung.php"><i class="fa-solid fa-mobile-screen"></i> Samsung Cases</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link  text-white" href="iphone.php"><i class="fa-solid fa-mobile-screen"></i> iPhone Cases</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="huawei.php"><i class="fa-solid fa-mobile-screen"></i> Huawei Cases</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="contact_us.php"><i class="fa-solid fa-address-card"></i> About/Contact Us</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link  text-white" href="checkout.php"><i class="fa-solid fa-cart-shopping"></i> Checkout</a>
                    </li>
                </ul>
            </div>
            <div style="clear:both"></div>
            <br />
            <h3>Order Details</h3>
            <div class="table-responsive ">
                <table class="table table-bordered text-white">
                    <thead class="thead-light">
                        <tr>
                            <th width="40%">Item Name</th>
                            <th width="10%">Quantity</th>
                            <th width="20%">Price</th>
                            <th width="15%">Total</th>
                            <th width="5%">Action</th>
                        </tr>
                    </thead>
                    <!-- Php Code for displaying shopping cart -->
                    <?php
                    if (!empty($_SESSION["shopping_cart"])) {
                        $total = 0;
                        foreach ($_SESSION["shopping_cart"] as $keys => $values) {
                    ?>
                            <tr>
                                <td><?php echo $values["item_name"]; ?></td>
                                <td><?php echo $values["item_quantity"]; ?></td>
                                <td>€ <?php echo $values["item_price"]; ?></td>
                                <td>€ <?php echo number_format($values["item_quantity"] * $values["item_price"], 2); ?></td>
                                <td><a href="samsung.php?action=delete&SAMSUNG_ID=<?php echo $values["item_id"]; ?>"><span class="text-danger">Remove</span></a></td>
                            </tr>
                        <?php
                            $total = $total + ($values["item_quantity"] * $values["item_price"]);
                        }
                        ?>
                        <tr>
                            <td colspan="3" align="right">Total</td>
                            <td align="right">€ <?php echo number_format($total, 2); ?></td>
                            <td></td>
                        </tr>
                    <?php
                    }
                    ?>

                </table>
            </div>
    </nav>



    <!-- Carousel Section -->
    <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="image/hero_samsung.png" class="car d-block w-100" alt="hero2">
                <div class="carousel-caption text-center text-white">
                </div>
            </div>
        </div>

    </div>


    <!-- Main Content -->
    <div class="container">
        <h2 class="text-white text-center mt-4">Samsung Phone Cases</h2>


        <!-- iPhone Section -->

        <!-- Php Code for dispalying product images from database -->
        <?php
        $query = "SELECT * FROM SAMSUNG ORDER BY SAMSUNG_ID ASC";
        $result = mysqli_query($connect, $query);
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_array($result)) {
        ?>
                <div class="col-lg-3 col-md-6 float-start">
                    <form method="post" action="samsung.php?action=add&SAMSUNG_ID=<?php echo $row["SAMSUNG_ID"]; ?>">


                        <div class="row justify-content-center ">
                            <div class="card-banner m-3">
                                <div class="card  shadow m-4">
                                    <div class="inner ">
                                        <img src="image/<?php echo $row["SAMSUNG_IMAGE"]; ?>" class="card-img-top" />
                                    </div>
                                    <div class="card-body text-center ">
                                        <h5 class="text-dark"><?php echo $row["SAMSUNG_TYPE"]; ?></i>
                                        </h5>
                                        <input type="text" name="quantity" value="1" class="form-control" />
                                        <p class="text-danger">€ <?php echo $row["SAMSUNG_PRICE"]; ?></p>
                                        <input type="hidden" name="hidden_name" value="<?php echo $row["SAMSUNG_TYPE"]; ?>" />
                                        <input type="hidden" name="hidden_price" value="<?php echo $row["SAMSUNG_PRICE"]; ?>" />
                                        <input type="submit" name="add_to_cart" style="margin-top:5px;" class="btn btn-dark btn-more" value="Add to Cart" />
                                    </div>
                                </div>
                            </div>
                        </div>

                    </form>
                </div>

        <?php
            }
        }
        ?>
        <div style="clear:both"></div>








    </div>

    <!-- Footer -->
    <footer id="abc" class="footer  py-3">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 mr-1 social">
                    <div class="fa-icons  mt-4">
                        <img class="footer-img " src="img/logo/logo_png.png" alt="">
                        <a href="https://www.facebook.com/Fly-High-Clothing-100354295489281 " class="fa fa-facebook "></a>
                        <a href="https://twitter.com/FlyHighClothin1 " class="fa fa-twitter "></a>
                        <a href="https://www.youtube.com/channel/UCK3xnmEreP6rSC9Lcr31YwA/videos " class="fa fa-youtube "></a>
                        <a href="https://www.instagram.com/flyhighclothing2021/ " class="fa fa-instagram "></a>
                    </div>
                </div>

                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 mr-1 social d-flex justify-content-center">
                    <div class="footer-links d-flex justify-content-center align-items-center">
                        <ul>
                            <li><a class="mt-4" href="contactus.html">Contact Us</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </footer>




















    <!-- Font Awesome Icons -->
    <script src="https://kit.fontawesome.com/2dcf8b1812.js" crossorigin="anonymous"></script>


    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->

    <script src="js/site.js"></script>
</body>

</html>