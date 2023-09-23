<?php 
ob_start();
include 'db.php'; ?>

<?php
    if(isset($_GET['remove'])){
        $iteamID = $_GET['remove'];
        $sql = "DELETE FROM wishlist WHERE ID=$iteamID";

        if ($connection->query($sql) === TRUE) {
            header("Location: ../wishlist.php");
            exit();
        } else {
            header("Location: ../wishlist.php");
            exit();
        }
    }
    