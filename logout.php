<?php

session_start();

$_SESSION['userID'] = null;

header("location: index.php");
exit();