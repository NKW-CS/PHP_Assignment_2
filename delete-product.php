<?php
    require_once 'config.php';

    $id = $_REQUEST['pid'];

    $query = "delete from guests where guestID=" . $id;
    $result = mysqli_query($conn, $query);

    if ($result == 1)
        header("location:view-guests.php?result=delsuccess");
    else
        header("location:view-guests.php?result=delfail");
?>