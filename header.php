<?
session_start();
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Sweet Treats - Home</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="css/styles.css">
    </head>
    <body>
        <div class="container-fluid">
             <div class="background_header">
             <header>
                <nav class="social">
                    <ul class="topnav list-unstyled list-inline text-right">
                        <li>

                            <a href="sign-in.php">

                            <? 
                            if(isset($_SESSION['user'])){
                                
                                $username = $_SESSION['user'];

                                print $username;

                            } elseif(isset($_SESSION['login_member'])) {

                                $username = $_SESSION['login_member'];

                                print $username;

                            } else {

                                print "Login";

                            }
                            ?>

                            </a>
                        </li>
                        <li class="cart"><a href="shopping-cart.php"><img src="images/cart.png"></a></li>
                        <li><a href="facebook.com"><img src="images/facebook.png"></a></li>
                        <li><a href="instagram.com"><img src="images/instagram%20copy.png"></a></li>
                        <li><a href="twitter.com"><img src="images/twitter%20copy.png"></a></li>
                    </ul>
                </nav> <!-- Social Media Nav -->
            
                <!-- Header: Logo will float over the nav bars in the center -->

                <!-- Main Nav Bar SPLIT by the Logo -->
                <div class="nav">    
                    <div class="navbar">
                        <ul class="list-inline">
                            <li><a href="home.php">Home</a></li>
                            <li><a href="about.php">About Us</a></li>
                            <li><a href="about.php#location">Location</a></li>
                            <li><a href="store.php">Store</a></li>
                        </ul>
                    </div>
                    <div class="cookie">
                        <a href="home.php"><img src="images/cookie.png"></a>
                    </div>
                    <div class="navbar rightbar" style="display: visible;">
                        <ul class="list-inline">
                            <li><a href="about.php#menu">Menu</a></li>
                            <li><a href="special-order.php">Special Orders</a></li>
                            <li><a href="about.php#contact">Contact Us</a></li>
                        </ul>
                    </div>
                </div>
            </header>
        </div> 