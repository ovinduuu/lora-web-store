<?php 
// include "includes/db.php";

ob_start();
session_start();

// if(isset($_SESSION['userID'])){
//     $userID = $_SESSION['userID'];
//     $query = "SELECT * FROM `cart` WHERE userID=$userID;";
//     $result = mysql_query($query);
//     $row = mysql_fetch_array($result);
//     echo $row[0];
// }
?>

<!doctype html>
<html class="no-js" lang="en">


<!-- Mirrored from htmldemo.net/lukani/lukani/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 21 Aug 2022 01:49:12 GMT -->
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Lukani</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.ico">

    <!-- CSS 
    ========================= -->
    <!--bootstrap min css-->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <!--owl carousel min css-->
    <link rel="stylesheet" href="assets/css/owl.carousel.min.css">
    <!--slick min css-->
    <link rel="stylesheet" href="assets/css/slick.css">
    <!--magnific popup min css-->
    <link rel="stylesheet" href="assets/css/magnific-popup.css">
    <!--font awesome css-->
    <link rel="stylesheet" href="assets/css/font.awesome.css">
    <!--animate css-->
    <link rel="stylesheet" href="assets/css/animate.css">
    <!--jquery ui min css-->
    <link rel="stylesheet" href="assets/css/jquery-ui.min.css">
    <!--slinky menu css-->
    <link rel="stylesheet" href="assets/css/slinky.menu.css">
    <!--plugins css-->
    <link rel="stylesheet" href="assets/css/plugins.css">
    <!-- Main Style CSS -->
    <link rel="stylesheet" href="assets/css/style.css">

    <!--modernizr min js here-->
    <script src="assets/js/vendor/modernizr-3.7.1.min.js"></script>
    
    <script src="assets/js/vendor/jquery-3.4.1.min.js"></script>
</head>

<body>
    <header>
        <div class="main_header">
            <div class="header_middle">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-lg-3 col-md-3 col-4">
                            <div class="logo">
                                <a href="index.html"><img src="assets/img/logo/logo2.png" alt=""></a>
                            </div>
                        </div>
                        <div class="col-lg-9 col-md-6 col-6">
                            <div class="header_right_info">
                                <div class="search_container">
                                    <form action="shop.php" method="POST">
                                        <div class="search_box">
                                            <input placeholder="Search product..." type="text" name="search_key">
                                            <button type="submit" name="search_btn"><i class="icon-search"></i></button>
                                        </div>
                                    </form>
                                </div>
                                <div class="header_account_area">
                                    <div class="header_account-list top_links">
                                        <a href="my-account.php"><i class="icon-users"></i></a>
                                        <ul class="dropdown_links">
                                            <li><a href="my-account.php">My Account </a></li>
                                            <li><a href="cart.php">Shopping Cart</a></li>
                                            <li><a href="wishlist.php">Wishlist</a></li>
                                        </ul>
                                    </div>
                                    <div class="header_account-list header_wishlist">
                                        <a href="wishlist.php"><i class="icon-heart"></i></a>
                                    </div>
                                    <div class="header_account-list  mini_cart_wrapper">
                                        <a href="cart.php"><i class="icon-shopping-bag"></i>
                                            <!-- <span class="item_count">2</span> -->
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="header_bottom sticky-header">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-lg-3">
                            <div class="categories_menu">
                                <div class="categories_title">
                                    <h2 class="categori_toggle">Categories</h2>
                                </div>
                                <div class="categories_menu_toggle">
                                    <ul>
                                        <li><a href="shop.php?category=Cactus">Cactus and Succulents</a></li>
                                        <li><a href="shop.php?category=Flower">Flower Plants</a></li>
                                        <li><a href="shop.php?category=Forest">Forest Plants</a></li>
                                        <li><a href="shop.php?category=Fruit">Fruit Plants</a></li>
                                        <li><a href="shop.php?category=Gardening">Gardening Equipments</a></li>
                                        <li class="hidden"><a href="shop.php?category=Growing">Growing Mediums & Fertilizers</a></li>
                                        <li class="hidden"><a href="shop.php?category=Medicinal">Medicinal Plants</a></li>
                                        <li class="hidden"><a href="shop.php?category=Bonsai">Mini Bonsai & Decorated Pots</a></li>
                                        <li class="hidden"><a href="shop.php?category=Spice">Spice Plants</a></li>
                                        <li class="hidden"><a href="shop.php?category=VegetablePlants">Vegetable Plants</a></li>
                                        <li class="hidden"><a href="shop.php?category=VegetableSeeds">Vegetable seeds</a></li>
                                        <li><a id="more-btn"><i class="fa fa-plus" aria-hidden="true"></i> More Categories</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <!--main menu start-->
                            <div class="main_menu menu_position">
                                <nav>
                                    <ul>
                                        <li><a href="index.php">Home</a></li>
                                        <li><a href="about.php">About Us</a></li>
                                        <li><a href="shop.php">Shop</a></li>
                                        <li><a href="faq.php">FAQ</a></li>
                                        <li><a href="contact.php">Contact Us</a></li>
                                    </ul>
                                </nav>
                            </div>
                            <!--main menu end-->
                        </div>
                        <div class="col-lg-3">
                            <div class="call-support">
                                <p>Call Support: <a href="tel:+94 77-258-2451">+94 77 258 2451</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>