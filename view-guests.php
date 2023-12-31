<?php require_once 'checksession.php';?>

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

            table
            {
                border-collapse: collapse;
                width: 50%;
                margin: auto;
            }

            th, td
            {
                text-align: left;
                padding: 8px;
            }

            tr:nth-child(even){background-color: #f2f2f2}

            th
            {
                background-color: #4CAF50;
                color: white;
            }

            h2
            {
                text-align: center;
            }
        </style>
    </head>
    <body>
        <div id="wrapper">

            <?php
                require_once 'header.php';
            ?>

            <h2>View Guest Info</h2>

                <?php
                    

                    if (isset($_REQUEST['result']))
                    {
                        if ($_REQUEST['result'] == 'delsuccess')
                        {
                            echo "<br><div id='msg'>";
                            echo "<div class='alert alert-success alert-dismissable fade in'>";
                            echo "<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>";
                            echo "<strong>Success!</strong> Product was deleted.";
                            echo "</div></div>";
                        }
                        else if ($_REQUEST['result'] == 'delfail')
                        {
                            echo "<br><div id='msg'>";
                            echo "<div class='alert alert-danger alert-dismissable fade in'>";
                            echo "<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>";
                            echo "<strong>Fail!</strong> Product was not deleted.";
                            echo "</div></div>";
                        }
                        if ($_REQUEST['result'] == 'editsuccess')
                        {
                            echo "<br><div id='msg'>";
                            echo "<div class='alert alert-success alert-dismissable fade in'>";
                            echo "<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>";
                            echo "<strong>Success!</strong> Product was edited.";
                            echo "</div></div>";
                        }
                        else if ($_REQUEST['result'] == 'editfail')
                        {
                            echo "<br><div id='msg'>";
                            echo "<div class='alert alert-danger alert-dismissable fade in'>";
                            echo "<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>";
                            echo "<strong>Fail!</strong> Product was not edited.";
                            echo "</div></div>";
                        }
                    }

                    require_once 'config.php';

                    $query = "select * from guests";
                    $result = mysqli_query($conn, $query);

                    if (mysqli_num_rows($result) > 0)
                    {
                        echo '<table>';
                        echo '<tr><th>#</th><th>Name</th><th>Room</th><th></th ><th></th></tr>';

                        $i = 1;

                        while ($row = mysqli_fetch_assoc($result))
                        {
                            echo "<tr><td>$i</td><td>" . $row['guestName'] . "</td>
                            <td>" . $row['guestRoom']."</td>
                            <td><a href='edit-product.php?pid=" . $row['guestID'] . "'>Edit</a></td>" .
                            "<td><a href='delete-product.php?pid=" . $row['guestID'] . "'>Delete</a></td></tr>";
                            $i++;
                        }

                        echo '</table>';
                    }
                    else
                        echo "<h3>No records found</h3>";
                ?>
        </div>
        <?php
                require_once 'footer.php';
            ?>
    </body>
</html>
