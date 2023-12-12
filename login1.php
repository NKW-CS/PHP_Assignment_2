<?php
    session_start();
    require_once "config.php";

    $username = $_REQUEST['username'];
    $password = $_REQUEST['password'];

    $query  = "select * from users where username='$username' and password='$password'";
    $result =  mysqli_query($conn,$query);

    if (mysqli_num_rows($result) == 1){
        $row = mysqli_fetch_assoc($result);
        $_SESSION['username'] = $row['username'];
        
        

        header('location:view-guests.php');
        die();
    } 
    else {
        header('location:login.php?result=loginfail');
        die();
    }
    
?>