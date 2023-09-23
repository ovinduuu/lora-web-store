<?php include_once 'includes/header.php'; ?>

<?php
if(!isset($_SESSION['userID'])){
    header("Location: login.php");
    exit();
} else {
    include "includes/db.php";
    $user_id = $_SESSION['userID'];
    $query = "SELECT * FROM user WHERE ID = $user_id";
    $result = mysqli_query($connection, $query);

    if ($result) {
        $row = mysqli_fetch_assoc($result);
        $fname = $row['fname'];
        $lname = $row['lname'];
        $email = $row['email'];
        $db_profilepic = $row['profilepic'];
    }
    
}
?>
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

    <section class="main_content_area">
        <div class="container">
            <div class="account_dashboard">
                <div class="row">
                    <div class="col-sm-12 col-md-3 col-lg-3">
                        <div class="dashboard_tab_button">
                            <ul role="tablist" class="nav flex-column dashboard-list">
                                <li><a href="#dashboard" data-bs-toggle="tab" class="nav-link active">Dashboard</a></li>
                                <li><a href="#account-details" data-bs-toggle="tab" class="nav-link">Account details</a></li>
                                <li><a href="logout.php" class="nav-link">logout</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-9 col-lg-9">
                        <div class="tab-content dashboard_content">
                            <div class="tab-pane fade show active" id="dashboard">
                                <h3>Dashboard </h3>
                                <p>From your account dashboard. you can easily check &amp; view your <a href=""><b>account details</b></a> and 
                                    <a href=""><b>edit your password and account details.</b></a></p>
                            </div>
                            <div class="tab-pane fade" id="account-details">
                                <h3>Account details </h3>
                                <div class="login">
                                    <div class="login_form_container">
                                        <div class="account_login_form">
                                            <form action="" method="POST" enctype="multipart/form-data">
                                                <label>First Name</label>
                                                <input type="text" name="fname" value="<?php echo $fname; ?>">
                                                <label>Last Name</label>
                                                <input type="text" name="lname" value="<?php echo $lname; ?>">
                                                <label>Email</label>
                                                <input type="email" name="email" value="<?php echo $email; ?>" disabled>
                                                <label>Profile Picture</label><br><br>
                                                <input type="file" name="profilepic" style="border-style: none;">
                                                <div class="save_button primary_btn default_button">
                                                    <button type="submit" name="save">Save</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

<?php include_once 'includes/footer.php'; ?>

<?php
    if (isset($_POST['save'])) {
        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        
        $profilepic = $_FILES['profilepic']['name'];
        if(!empty($profilepic)){
            $profilepic_temp = $_FILES['profilepic']['tmp_name'];
            move_uploaded_file($profilepic_temp, "assets/img/profile/$profilepic");
        }else{
            $profilepic = $db_profilepic;
        }
        $user_id = $_SESSION['userID'];
        $query = "UPDATE user SET fname='{$fname}', lname='{$lname}', profilepic='{$profilepic}' WHERE ID={$user_id}";
        $result = mysqli_query($connection, $query);

        if ($result) {
            header("location: my-account.php");
        }
    }
?>