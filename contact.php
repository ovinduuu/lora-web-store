<?php
    ob_start();
?>

<?php include_once 'includes/header.php'; ?>


    <div class="breadcrumbs_area">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumb_content">
                        <h3>Contact Us</h3>
                        <ul>
                            <li><a href="index.php">home</a></li>
                            <li>contact us</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container contact_map mt-100">
        <div class="map-area">
            <div id="googleMap">
            <iframe width="100%" height="500" id="gmap_canvas" src="https://maps.google.com/maps?q=LORA%20Flowers,%20Parakaduwa&t=&z=13&ie=UTF8&iwloc=&output=embed" frameborder="0" marginheight="0" marginwidth="0">
                
            </iframe>
            </div>
        </div>
    </div>

    <div class="contact_area">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-12">
                    <div class="contact_message content">
                        <h3>contact us</h3>
                        <p>Claritas est etiam processus dynamicus, qui sequitur mutationem consuetudium lectorum. Mirum
                            est notare quam littera gothica, quam nunc putamus parum claram anteposuerit litterarum
                            formas human. qui sequitur mutationem consuetudium lectorum. Mirum est notare quam</p>
                        <ul>
                            <li><i class="fa fa-fax"></i> Address : No.11, Walawwatha, Thalavitiya, Parakaduwa</li>
                            <li><i class="fa fa-phone"></i><a href="tel:+94 77-258-2451">+94 77 258 2451</a></li>
                            <li><i class="fa fa-envelope-o"></i><a href="#">demo@example.com</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12">
                    <div class="contact_message form">
                        <h3>Feedback</h3>
                        <form action="" method="POST" name="feedback">
                            <p>
                                <label> Your Name (required)</label>
                                <input name="name" placeholder="Name *" type="text" required>
                            </p>
                            <p>
                                <label> Your Email (required)</label>
                                <input name="email" placeholder="Email *" type="email" required>
                            </p>
                            <div class="contact_textarea">
                                <label> Your Message</label>
                                <textarea placeholder="Message *" name="feedback" class="form-control2" required></textarea>
                            </div>
                            <button type="submit" name="submit"> Send</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php
        if(isset($_POST['submit'])){
            echo "done";
            require_once 'includes/db.php';

            $name = $_POST['name'];
            $email = $_POST['email'];
            $feedback = $_POST['feedback'];

            $sql = "INSERT INTO `feedback`(`ID`, `name`, `mail`, `feedback`, `visibility`) VALUES (NULL,?,?,?,0);";
            $stmt = mysqli_stmt_init($connection);
            if (!mysqli_stmt_prepare($stmt,$sql)){
                header("location: 404.php?error=stmtfailed");
                exit();
            }

            mysqli_stmt_bind_param($stmt, "sss", $name, $email, $feedback);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_close($stmt);
            
        }
    ?> 

    <div class="brand_area brand__three">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="brand_container owl-carousel">
                        <div class="single_brand">
                            <a href="#"><img src="assets/img/brand/brand1.png" alt=""></a>
                        </div>
                        <div class="single_brand">
                            <a href="#"><img src="assets/img/brand/brand2.png" alt=""></a>
                        </div>
                        <div class="single_brand">
                            <a href="#"><img src="assets/img/brand/brand3.png" alt=""></a>
                        </div>
                        <div class="single_brand">
                            <a href="#"><img src="assets/img/brand/brand4.png" alt=""></a>
                        </div>
                        <div class="single_brand">
                            <a href="#"><img src="assets/img/brand/brand5.png" alt=""></a>
                        </div>
                        <div class="single_brand">
                            <a href="#"><img src="assets/img/brand/brand6.png" alt=""></a>
                        </div>
                        <div class="single_brand">
                            <a href="#"><img src="assets/img/brand/brand2.png" alt=""></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php include_once 'includes/footer.php'; ?>