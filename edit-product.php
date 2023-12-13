<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="HOME" />
    <meta name="description" content="hotel mania record keeping sheet">
    <title>HOTEL MANIA RECORD</title>
    <!-- Favicon -->
    <link rel="shortcut icon" href="images/favicon.png" type="image/x-icon" />
    <!-- External CSS -->
    <link rel="stylesheet" type="text/css" href="css/style.css">

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300&display=swap" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" ></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" >
        <style>
            #wrapper
            {
                width:50%;
                margin:auto;
            }

            table, td, th
            {    
                border: 1px solid #ddd;
                text-align: left;
            }

            table
            {
                border-collapse: collapse;
                width: 50%;
                margin: auto;
            }

            th, td
            {
                padding: 15px;
            }

            h2
            {
                text-align: center;
            }

            #msg
            {
                width:50%;
                margin:auto;
            }
        </style>
    </head>
    <body>
        <div id="wrapper">

            <?php
                require_once 'header.php';
                
            ?>

            <h2>Edit Guest Info</h2>
            <br>

            <?php
                if (isset($_REQUEST['pid'])){
                    require_once "config.php";

                    $pid = $_REQUEST['pid'];
                    $query = "select * from guests where guestID =".$pid;
                    $result = mysqli_query($conn,$query);

                    if (mysqli_num_rows($result)==1) {
                        $row = mysqli_fetch_assoc($result);
                        $gname = $row['guestName'];
                        $groom = $row['guestRoom'];
                    } else {
                        header('location:view-guests.php');
                        die();
                    }
                    

                }
                else {
                    header('location:view-guests.php');
                    die();
                }
                
            ?>

            <form action="edit-product1.php?pid=<?php echo $pid;?>" method="post">
                <table>
                    <tr>
                        <td>Product Name:</td>
                        <td>
                            <input type="text" name="guestName" value="<?php echo $gname ?>">
                        </td>
                    </tr>
                    <tr>
                        <td>Product Price:</td>
                        <td>
                            <input type="text" name="guestRoom" value="<?php echo $groom  ?>">
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <input type="submit" value="Edit Product">
                        </td>
                    </tr>
                </table>
            </form>

            <?php
               

                if (isset($_REQUEST['result']))
                {
                    if ($_REQUEST['result'] == 'success')
                    {
                        echo "<br><div id='msg'>";
                        echo "<div class='alert alert-success alert-dismissable fade in'>";
                        echo "<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>";
                        echo "<strong>Success!</strong> New product was added.";
                        echo "</div></div>";
                    }
                    else if ($_REQUEST['result'] == 'fail')
                    {
                        echo "<br><div id='msg'>";
                        echo "<div class='alert alert-danger alert-dismissable fade in'>";
                        echo "<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>";
                        echo "<strong>Fail!</strong> New product was not added.";
                        echo "</div></div>";
                    }
                }
            ?>
        </div>
    </body>
</html>
