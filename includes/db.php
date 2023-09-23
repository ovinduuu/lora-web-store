<?php
    const DB_HOST = 'localhost';
    const DB_USER = 'root';
    const DB_PASS = '';
    const DB_NAME = 'loraflowers';

    $connection = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
    if(!$connection){
        die("Connection Failed: ".mysqli_connect_error());
    } else {  
        mysqli_select_db($connection, 'loraflowers');
    } 
?>