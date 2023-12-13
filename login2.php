<?php
    session_start();
    require_once 'config.php';

    $username = $_REQUEST['username'];
    $password = $_REQUEST['password'];

    
    $query = "select * from users where username=? and password=?";

    if ($stmt = mysqli_prepare($conn, $query));
    {
        mysqli_stmt_bind_param($stmt, "ss", $username, $password);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_store_result($stmt);
        $result = mysqli_stmt_num_rows($stmt);

        if ($result == 1)
        {
            $_SESSION['username'] = $username;

            header('location:view-guests.php');
            die();
        }
        else
        {
            header('location:login.php?result=loginfail');
            die();
        }
    }
?>