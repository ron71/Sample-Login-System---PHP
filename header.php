<!DOCTYPE html>
<?php
     session_start();
?>
<html lang="en">
    <head>
        <title>LOGIN SYSTEM</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="css/style.css" rel="stylesheet">
    </head>
    <body>
        <header>
            <nav>
                <div class = "main-wrapper">
                    <ul>
                        <li><a href="index.php">HOME</a></li>
                    </ul>
                </div>
                <div class = "nav-login">
                    <?php
                        if(isset($_SESSION['curr_userid'])){
                            echo ' <form action="includes/logout.inc.php" method = "POST">
                                         <button type="submit" name="submit">Logout</button>
                                    </form>';
                        }
                        else {
                          echo ' <form action ="includes/login.inc.php" method = "POST">
                                    <input type="text" name="uid" placeholder = "Username/Email"/>
                                    <input type="password" name="pwd" placeholder = "Password"/>
                                    <button type="submit" name = "submit">LOGIN</button>
                                 </form>
                                 <a href="signup.php">Sign Up</a>';
                        }
                     ?>          
                    
                </div>
            </nav>
        </header>