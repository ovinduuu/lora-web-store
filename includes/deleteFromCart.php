<?php 
ob_start();
include 'db.php'; ?>

<?php
    if(isset($_GET['remove'])){
        $iteamID = $_GET['remove'];
        $sql = "DELETE FROM cart WHERE ID=$iteamID";

        if ($connection->query($sql) === TRUE) {
            header("Location: ../cart.php");
            exit();
        } else {
            header("Location: ../cart.php");
            exit();
        }
    }
    