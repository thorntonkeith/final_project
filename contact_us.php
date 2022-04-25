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


    <title>Contact/About</title>
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
                        <a class="nav-link active text-white" href="contact_us.php"><i class="fa-solid fa-address-card"></i> About/Contact Us</a>
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






    <!-- Main Content -->
    <div class="container">


        <div class="main bg-dark copy text-white ">

            <form class=" bg-dark">
                <div class="row">
                    <div class="col-sm-12 col-md-6 col-lg-4">
                        <h1 id="contact">Contact Us</h1>
                        <div class="mb-3">
                            <label for="Inputyourname" class="form-label">Enter your name</label>
                            <input type="name" class="form-control  w-10" id="exampleInputEmail1" placeholder="Enter your name">

                        </div>
                        <div class="mb-3">
                            <label for="InputEmail1" class="form-label">Enter your email address</label>
                            <input type="email" class="form-control  " id="exampleInputEmail1" placeholder="Enter email">
                        </div>
                        <div class="mb-3">
                            <label for="message" class="form-label">Enter your message</label>
                            <textarea class="form-control  w-10" rows="4" placeholder="Enter your message">
					</textarea>
                        </div>


                        <button id="sub" type="submit" class="btn btn-light">Submit</button>
                    </div>


                </div>

            </form>

            <section class="">
                <h1 class="text-white mt-5">About Us</h1>
                <p>Celtic Cases is a small business located in Galway. The company was founded in 2021 by Keith Thornton</p>
                <p></p>
            </section>




        </div>

    </div>

    <!-- Footer -->
    <footer class="footer footer-reg py-3 bg-dark">
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