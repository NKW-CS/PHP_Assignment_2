<?php
    require_once 'config.php';

    try {
        //code..
        $pid = $_REQUEST['pid'];
        $gname =  $_REQUEST['guestName'];
        $groom  = $_REQUEST['guestRoom'];

        $query = "update guests set guestName ='$gname',guestRoom= $groom  where guestID=$pid ";
        $result = mysqli_query($conn,$query);

        
    }
   
    catch (PDOException $e){
        echo $e;
    }
    finally{
        if ($result ==  1){
            header('location:view-guests.php?result=editsuccess');
            die();
        }
        else{
            header('location:view-guests.php?result=editfail');
            die();
        }

    }
?>