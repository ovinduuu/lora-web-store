<?php   include_once 'includes/header.php'; 
        include_once 'includes/db.php'; ?>

    <div class="breadcrumbs_area">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumb_content">
                        <h3>My Profile</h3>
                        <ul>
                            <li><a href="index.php">home</a></li>
                            <li>My Profile</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="customer_login">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6">
                    <div class="account_form">
                        <h2>login</h2>
                        <form action="" method="POST">
                            <p>
                                <label>Email address <span>*</span></label>
                                <input type="text" name="loginEmail">
                            </p>
                            <p>
                                <label>Passwords <span>*</span></label>
                                <input type="password" name="loginPWD">
                            </p>
                            <div class="login_submit">
                                <a href="#">Lost your password?</a>
                                <button type="submit" name="submit">login</button>

                            </div>

                        </form>
                    </div>
                </div>
<?php
    if(isset($_POST['submit'])){

        require_once 'includes/db.php';
        require_once 'includes/functions.php';

        $loginEmail = $_POST["loginEmail"];
        $loginPWD = $_POST["loginPWD"];

        loginUser($connection, $loginEmail, $loginPWD);

    }
?>
                <div class="col-lg-6 col-md-6">
                    <div class="account_form register">
                        <h2>Register</h2>
                        <form action="" method="POST">
                            <p>
                                <label>Email address <span>*</span></label>
                                <input type="text" name="signupEmail">
                            </p>
                            <p>
                                <label>Passwords <span>*</span></label>
                                <input type="password" name="signupPWD">
                            </p>
                            <div class="login_submit">
                                <button type="submit" name="register">Register</button>
                            </div>
                        </form>
                    </div>
                </div>
                <?php
if(isset($_POST['register'])){

    require_once 'includes/db.php';
    require_once 'includes/functions.php';

    $signupEmail = $_POST["signupEmail"];
    $signupPWD = $_POST["signupPWD"];

    $sql = "SELECT * FROM user WHERE email=?;";
    $stmt = mysqli_stmt_init($connection);
    if (!mysqli_stmt_prepare($stmt,$sql)){
        header("location: login.php?error=stmtfailed");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "s", $signupEmail);
    mysqli_stmt_execute($stmt);

    $resultData = mysqli_stmt_get_result($stmt);

    if(mysqli_fetch_assoc($resultData)){
        header("Location: login.php?error=already");
        exit();
    } else {
        createRegistration($connection, $signupEmail, $signupPWD);
    }
    mysqli_stmt_close($stmt);

}
?>
            </div>
        </div>
    </div>
<?php include_once 'includes/footer.php'; ?>