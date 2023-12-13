<?php 
    if(!isset($_SESSION['username'])){
        session_start();
    }
    ?>
    



<nav class="navbar bg-light">
           
                    <a class="navbar-brand" href="index.php" style="padding-left: 77%; padding-bottom: 10%;"><img src="images/favicon.png" alt="header logo"></a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                
                <div class="navbar-collapse" id="navbarSupportedContent">
                    <a href="index.php">Home</a> | 
                    <a href="add-guest.php">Add Guest</a> | 
                    <a href="view-guests.php">View Guest Info</a> |

                    <a href="register.php">Register</a> |

                        </div>
                
        </nav>
        

<?php
    if(isset($_SESSION['username'])){
        echo "<a href='logout.php'>Logout</a>";
    }
    else{
        echo "<a href='login.php'>Login</a>";

    }
    
?>
<div class="logo"><h1>HOTEL MARIEA | Hotel Management System</h1></div>
