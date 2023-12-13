<?php
    

    require_once 'config.php';

    $name = $_REQUEST['guestName'];
    $room = $_REQUEST['guestRoom'];

    $result = 0;
    try
    {
        $query = "insert into guests(guestName, guestRoom) values('$name', $room)";
        $result = mysqli_query($conn, $query);
    }
    catch (PDOException $e)
    {
        echo $e;
    }
    finally
    {
        if ($result == 1)
        {
            header('location:add-guest.php?result=success');
        }
        else
        {
            header('location:add-guest.php?result=fail');
        }
    }
?>
