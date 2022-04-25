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
    <!-- PWA code -->

    <head>
        <title>Celticcases</title>
        <meta name="description" content="">

        <link href="css/addtohomescreen.min.css" rel="stylesheet">

        <meta name="mobile-web-app-capable" content="yes">
        <meta name="apple-mobile-web-app-capable" content="yes">
        <meta name="application-name" content="Celticcases">
        <meta name="apple-mobile-web-app-title" content="Celticcases">
        <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">

        <link rel="apple-touch-icon" href="meta/ios/ios-appicon-120-120.png">
        <link rel="apple-touch-icon" sizes="152x152" href="meta/ios/ios-appicon-152-152.png">
        <link rel="apple-touch-icon" sizes="180x180" href="meta/ios/ios-appicon-180-180.png">
        <link rel="apple-touch-icon" sizes="120x120" href="meta/ios/ios-appicon-120-120.png">
        <link href="meta/ios/apple-touch-startup-image-320x460.png" media="(device-width: 320px)" rel="apple-touch-startup-image">
        <!-- iPhone (Retina) SPLASHSCREEN-->
        <link href="meta/ios/apple-touch-startup-image-640x920.png" media="(device-width: 320px) and (-webkit-device-pixel-ratio: 2)" rel="apple-touch-startup-image">
        <!-- iPad (portrait) SPLASHSCREEN-->
        <link href="meta/ios/apple-touch-startup-image-768x1004.png" media="(device-width: 768px) and (orientation: portrait)" rel="apple-touch-startup-image">
        <!-- iPad (landscape) SPLASHSCREEN-->
        <link href="meta/ios/apple-touch-startup-image-748x1024.png" media="(device-width: 768px) and (orientation: landscape)" rel="apple-touch-startup-image">
        <!-- iPad (Retina, portrait) SPLASHSCREEN-->
        <link href="meta/ios/apple-touch-startup-image-1536x2008.png" media="(device-width: 1536px) and (orientation: portrait) and (-webkit-device-pixel-ratio: 2)" rel="apple-touch-startup-image">
        <!-- iPad (Retina, landscape) SPLASHSCREEN-->
        <link href="meta/ios/apple-touch-startup-image-2048x1496.png" media="(device-width: 1536px)  and (orientation: landscape) and (-webkit-device-pixel-ratio: 2)" rel="apple-touch-startup-image">
        <!-- iPhone 6/7/8 -->
        <link href="/meta/ios/apple-touch-startup-image-750x1334.png" media="(device-width: 375px) and (-webkit-device-pixel-ratio: 2)" rel="apple-touch-startup-image" />
        <!-- iPhone 6 Plus/7 Plus/8 Plus -->
        <link href="/meta/ios/apple-touch-startup-image-1242x2208.png" media="(device-width: 414px) and (-webkit-device-pixel-ratio: 3)" rel="apple-touch-startup-image" />

        <meta name="msapplication-starturl" content="/?utm_source=homescreen">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <link href="favicon.ico" rel="shortcut icon">
        <link rel="icon" type="image/png" href="meta/favicon-16x16.png" sizes="16x16">
        <link rel="icon" type="image/png" href="meta/favicon-32x32.png" sizes="32x32">
        <link rel="icon" type="image/png" href="meta/favicon-96x96.png" sizes="96x96">

        <meta name="theme-color" content="">

        <link rel="manifest" href="manifest.json">
        <meta name="generator" content="PWA Starter">

        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

        <!-- Other CSS -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


        <!-- Styles CSS -->
        <link rel="stylesheet" href="css/styles.css">


        <title>Home</title>
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
                        <a class="nav-link  text-white" href="samsung.php"><i class="fa-solid fa-mobile-screen"></i> Samsung Cases</a>
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
                <img src="img/hero/hero2.png" class="car d-block w-100" alt="hero2">
                <div class="carousel-caption text-center text-white">
                    <h1 class=" mt-3">Great Cases At Affordable Prices</h1>
                    <p>Protect your phone....save your money</p>
                </div>
            </div>
        </div>

    </div>


    <!-- Main Content -->
    <div class="container-fluid">

        <!-- Phone Section -->
        <section id="phone">
            <div class="container">
                <h1 class="text-white text-center mt-4">Phone Cases</h1>
                <div class="row justify-content-center ">
                    <div class="col-sm-12 col-md-6 col-lg-4 card-banner">
                        <div class="card shadow mt-4" style="width: 18rem;">
                            <div class="inner">
                                <img src="image/ip_green.png" class="card-img-top border border-dark" alt="...">
                            </div>
                            <div class="card-body text-center">
                                <h5 class="card-title">iPhone Cases</i>
                                </h5>
                                <p class="card-text">Check out our selection of iPhone cases</p>
                                <a href="iphone.php" class="btn btn-dark btn-more">View options</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-6 col-lg-4">
                        <div class="card shadow mt-4" style="width: 18rem; height: 42rem;">
                            <div class="inner">
                                <img src="image/sam_navy.jpg" class="card-img-top border border-dark" alt="...">
                            </div>
                            <div class="card-body text-center">
                                <h5 class="card-title">Samsung Cases</h5>
                                <p class="card-text">Check out our selection of Samsung cases</p>
                                <br>
                                <a href="samsung.php" class="btn btn-dark">View options</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-6 col-lg-4">
                        <div class="card shadow mt-4" style="width: 18rem; height: 42rem;">
                            <div class="inner">
                                <img src="image/huawei_black_2.jpg" class="card-img-top border border-dark " alt="...">
                            </div>
                            <div class="card-body text-center">
                                <h5 class="card-title">Huawei Cases</h5>
                                <p class="card-text">Check out our selection of Huawei cases</p>
                                <a href="huawei.php" class="btn btn-dark">View options</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>






    </div>


    <footer class="footer  py-3">
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
    <!-- Common Add to Homescreen Template -->

    <script src="js/addtohomescreen.min.js" type="application/javascript"></script>

    <script src="js/addtohomescreen.js"></script>
    <script>
        addToHomescreen({
            appID: "net.celticcases",
            appName: "Celticcases",
            lifespan: 15,
            autostart: true,
            skipFirstVisit: true,
            minSessions: 1,
            displayPace: 0,
            customPrompt: {
                title: "Install Celticcases?",
                src: "meta/favicon-96x96.png",
                cancelMsg: "Cancel",
                installMsg: "Install"
            }
        });
    </script>
    <script>
        if ("serviceWorker" in navigator) {

            navigator.serviceWorker.register("/sw.js")
                .then(function(registration) { // Registration was successful

                    console.log("ServiceWorker registration successful with scope: ", registration.scope);

                }).catch(function(err) { // registration failed :(

                    console.log("ServiceWorker registration failed: ", err);

                });

        }
    </script>
</body>

</html>