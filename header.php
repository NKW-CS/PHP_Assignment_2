<?php 
    if(!isset($_SESSION['username'])){
        session_start();
    }
    ?>
    

<h1>Hotel Management System</h1>

<a href="index.php">Home</a> | 
<a href="add-guest.php">Add Guest</a> | 
<a href="view-guests.php">View Guest Info</a> |

<a href="register.php">Register</a> |


<?php
    if(isset($_SESSION['username'])){
        echo "<a href='logout.php'>Logout</a>";
    }
    else{
        echo "<a href='login.php'>Login</a>";

    }
    
?>
<hr>
