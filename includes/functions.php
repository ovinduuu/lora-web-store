<?php

function userExist($connection, $loginEmail){
    $sql = "SELECT * FROM user WHERE email=?;";
    $stmt = mysqli_stmt_init($connection);
    if (!mysqli_stmt_prepare($stmt,$sql)){
        header("location: login.php??error=stmtfailed");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "s", $loginEmail);
    mysqli_stmt_execute($stmt);

    $resultData = mysqli_stmt_get_result($stmt);

    if($row = mysqli_fetch_assoc($resultData)){
        return $row;
    } else {
        $result = false;
        return $result;
    }
    mysqli_stmt_close($stmt);
}

function createRegistration($connection, $signupEmail, $signupPWD){
    $sql = "INSERT INTO `user`(`email`, `password`) VALUES (?,?);";
    $stmt = mysqli_stmt_init($connection);
    if (!mysqli_stmt_prepare($stmt,$sql)){
        header("location: login.php?error=stmtfailed");
        exit();
    }

    $passwordHashed=password_hash($signupPWD,PASSWORD_DEFAULT);
    
    mysqli_stmt_bind_param($stmt, "ss", $signupEmail, $passwordHashed);

    if (mysqli_stmt_execute($stmt)) {
        header("Location: login.php?registration=success");
        exit();
    } else {
        header("Location: login.php?registration=failed");
        exit();
    }
    mysqli_stmt_close($stmt);
}

function loginUser($connection, $loginEmail, $loginPWD){

    $userExist = userExist($connection, $loginEmail);

    if($userExist === false){
        header("location: login.php?error=userNOTExist");
        exit();
    }

    $passwordHashed = $userExist['password'];
    $checkedPassword = password_verify($loginPWD, $passwordHashed);

    if($checkedPassword === false){
        header("location: login.php?error=wronglogin");
        exit();
    } else if ($checkedPassword === true) {
        session_start();
        $_SESSION['userID'] = $userExist['ID'];
        header("location: index.php?login=success");
        exit();
    } else {
        header("location: login.php?error=wronglogin");
        exit();
    }
}