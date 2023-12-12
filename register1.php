<?php
    // TO DO - write code to insert a record to database

    require_once 'config.php';

    $username = $_REQUEST['username'];
    $password = $_REQUEST['password'];

    //check if username already exists or not
    $query = "select username from users where username= '$username'";
    $result = mysqli_query($conn, $query);

    if(mysqli_num_rows($result) == 1){
        header('location:register.php?result=userexists');
        die();
    }

    else{
        $query = "insert into users (username, password) values('$username','$password')";
        $result = mysqli_query($conn, $query);

        if ($result == 1){
            header('location:register.php?result=regsuccess');
            die();
        }
        else{
            header('location:register.php?result=regfail');
            die();
        }


    }    
?>
