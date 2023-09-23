<?php 

 include_once 'includes/header.php'; 
 include_once 'includes/db.php';

?>

    <section class="slider_section">
        <div class="slider_area owl-carousel">
            <div class="single_slider d-flex align-items-center" data-bgimg="assets/img/slider/slider1.jpg">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <div class="slider_content">
                                <h1>BIG SALE</h1>
                                <p>Discount <span>20% Off </span> For LORA Members </p>
                                <a class="button" href="<?php if(!isset($_SESSION['userID'])){ echo "login.php"; } else { echo "shop.php"; } ?>">Discover Now </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="single_slider d-flex align-items-center" data-bgimg="assets/img/slider/slider2.jpg">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <div class="slider_content">
                                <h1>TOP SALE</h1>
                                <p>Discount <span>20% Off </span> For LORA Members </p>
                                <a class="button" href="<?php if(!isset($_SESSION['userID'])){ echo "login.php"; } else { echo "shop.php"; } ?>">Discover Now </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="single_slider d-flex align-items-center" data-bgimg="assets/img/slider/slider3.jpg">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <div class="slider_content">
                                <h1>Lovely Plants </h1>
                                <p>Discount <span>20% Off </span> For LORA Members </p>
                                <a class="button" href="<?php if(!isset($_SESSION['userID'])){ echo "login.php"; } else { echo "shop.php"; } ?>">Discover Now </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="shipping_area">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-6">
                    <div class="single_shipping">
                        <div class="shipping_icone">
                            <img src="assets/img/about/shipping1.png" alt="">
                        </div>
                        <div class="shipping_content">
                            <h3>Free Delivery</h3>
                            <p>Free shipping around the world for all <br> orders over $120</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="single_shipping col_2">
                        <div class="shipping_icone">
                            <img src="assets/img/about/shipping2.png" alt="">
                        </div>
                        <div class="shipping_content">
                            <h3>Safe Payment</h3>
                            <p>With our payment gateway, don’t worry <br> about your information</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="single_shipping col_3">
                        <div class="shipping_icone">
                            <img src="assets/img/about/shipping3.png" alt="">
                        </div>
                        <div class="shipping_content">
                            <h3>Friendly Services</h3>
                            <p>You have 30-day return guarantee for <br> every single order</p>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="banner_area">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6">
                    <figure class="single_banner">
                        <div class="banner_thumb">
                            <a href="shop.php"><img src="assets/img/bg/banner1.jpg" alt=""></a>
                            <div class="banner_content">
                                <h3>Big Sale Products</h3>
                                <h2>Plants <br> For Interior</h2>
                                <a href="shop.php">Shop Now</a>
                            </div>
                        </div>
                    </figure>
                </div>
                <div class="col-lg-6 col-md-6">
                    <figure class="single_banner">
                        <div class="banner_thumb">
                            <a href="shop.php"><img src="assets/img/bg/banner2.jpg" alt=""></a>
                            <div class="banner_content">
                                <h3>Top Products</h3>
                                <h2>Plants <br> For Healthy</h2>
                                <a href="shop.php">Shop Now</a>
                            </div>
                        </div>
                    </figure>
                </div>
            </div>
        </div>
    </div>

    <div class="testimonial_area">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section_title">
                        <h2>What Our Customers Says ?</h2>
                    </div>
                </div>
            </div>
            <div class="testimonial_container">
                <div class="row">
                    <div class="testimonial_carousel owl-carousel">
                    <?php
                        // $query = "SELECT * FROM feedback WHERE visibility=1 LIMIT 5";
                        $query    = "SELECT feedback.feedback, feedback.visibility, user.ID, user.fname, user.lname, user.profilepic FROM feedback INNER JOIN user ON feedback.userID=user.ID WHERE visibility=1 LIMIT 5;";
                        $result = mysqli_query($connection, $query);
                        while ($row = mysqli_fetch_array($result)){
                    ?>
                        <div class="col-12">
                            <div class="single-testimonial">
                                <div class="testimonial-icon-img">
                                    <img src="assets/img/about/testimonials-icon.png" alt="">
                                </div>
                                <div class="testimonial_content">
                                    <p>“ <?php echo $row['feedback']?> ”</p>
                                    <div class="testimonial_text_img">
                                        <a href="#"><img src="assets/img/profile/<?php echo $row['profilepic']?>" alt="" style="border-radius: 50%; width: 100px; height: 100px;"></a>
                                    </div>
                                    <div class="testimonial_author">
                                        <p><?php echo $row['fname'] ." ". $row['lname']?></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php
                          
                        }
                    ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php include_once 'includes/footer.php'; ?>

