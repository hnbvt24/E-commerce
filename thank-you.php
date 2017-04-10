<?php include 'header.php'; ?>
<? require_once("connect_to_DB.php"); //inserts contents of this file here ?>

<!-- Main page info -->
    <main>
        
         <? if(isset($_POST['submitspecialorder'])) { ?>

    <div class="bWhite block">
            <div class="row text-center">
                <h1>Your Special Order Has Been Submitted!</h1>
                <h4>Check your email for a printed statement of your order.</h4>
                <p>Thank you for your support and we will do our best <br>
                    to provide you with the best customer service and product.<br><br>
                    We will be in touch with you in the next 24-48 work hours.
                </p>

            </div>
            <div class="row top-buffer text-center">
                <a href="home.php">Return Home</a>
            </div>
         </div>

<? } elseif(isset($_POST['submitorder'])) { ?>
    <?
    connectDB();
    $bsql = "SELECT * FROM billing_customer";
    $ssql = "SELECT * FROM shipping_customer";
    $cartsql = "SELECT * FROM shopping_cart";

    $bresult = mysqli_query($db, $bsql);
    $sresult = mysqli_query($db, $ssql);
    $cartresult = mysqli_query($db, $cartsql);

    $brow = mysqli_fetch_array($bresult);
    $srow = mysqli_fetch_array($sresult);
    $cartrow = mysqli_fetch_array($cartresult);

    $quantity = $_POST['number'];
    for($i = 1; $i <= $quantity;$i++){
    $sql2 = "INSERT INTO orders (registered_ID, item_ID, item_Name, quantity, Total_Price,
        ship_fname, ship_lname, ship_address, ship_address_two, ship_city, ship_state, 
        ship_zip, ship_phone, ship_email, bill_fname, bill_lname, bill_address, 
        bill_address_two, bill_city, bill_state, bill_zip, bill_phone, bill_email, 
        pay_num, coupon) VALUES ('" . $_POST['user'] . "', " . $_POST['itemid'.$i] . ", 
        '" . $_POST['item'.$i] . "'," . $_POST['quantity'.$i] . ", '" . $_POST['hiddenTotal'] . "', 
        '" . $_POST['sFName'] . "', '" . $_POST['sLName'] . "', '" . $_POST['sAddress'] . "',
        '" . $_POST['sAddress_two'] . "', '" . $_POST['sCity'] . "',
        '" . $_POST['sState'] . "', " . $_POST['sZip'] . ", '" . $_POST['sPhone'] . "',
        '" . $_POST['sEmail'] . "', '" . $_POST['bFName'] . "', '" . $_POST['bLName'] . "',
        '" . $_POST['bAddress'] . "', '" . $_POST['bAddress_two'] . "',
        '" . $_POST['bCity'] . "', '" . $_POST['bState'] . "', " . $_POST['bZip'] . ",
        '" . $_POST['bPhone'] . "', '" . $_POST['bEmail'] . "', " . $_POST['pPay'] . ", 
        '" . $_POST['pCoupon'] . "')";

    $result2 = mysqli_query($db, $sql2);

    }

 
    ?>
    <div class="bWhite block">
            <div class="row">
                <div class="text-center progress">
                    <!--Progress Tracker of the stages of checkout...Shipping Information, Payment Information, Review, Confirmation.-->
                      <img src="images/Progress-Tracker-4.png" alt="Confirmation">
                </div>
            </div>
            <div class="row text-center">
                <h1>Your Order Has Been Submitted!</h1>
                <h4>Check your email for a printed statement of your order.</h4>
                <p>Thank you for your support and we will do our best <br>
                    to provide you with the best customer service and product.<br><br>
                    Your order should arrive within the next 2-3 business days.
                </p>
            </div>
            <br/>
            <div class="row top-buffer text-center">
                <form method="post" action="store.php">
                    <input type="submit" name="returntostore" class="btn btn-default" value="Return to the Store"/>
                </form>
            </div>
         </div>


<? } elseif(isset($_POST['forgotSubmit'])) { ?>

    <div class="bWhite block">
            <div class="row text-center">
                <h1>An Email Has Been Sent!</h1>
                <h4>Check your email for a link to change your password.</h4>
            </div>
            <br/>
            <div class="row top-buffer text-center">
                <a href="store.php">Return to the Store</a>
            </div>
         </div>

<? } elseif(isset($_REQUEST['contactsubmit'])) { ?>

    <div class="bWhite block">
            <div class="row text-center">
                <h1>Thank You For Contacting Us!</h1>
                <p>Your question or comment has been submitted. <br><br>
                    We will be in touch with you in the next 24-48 work hours.
                </p>

            </div>
            <div class="row top-buffer text-center">
                <a href="home.php">Return Home</a>
            </div>
        </div>

<? } elseif(isset($_REQUEST['cateringsubmit'])) { ?>

    <div class="bWhite block">
            <div class="row text-center">
                <h1>Catering Coming Soon!</h1>
                
                <p>Thank you for your support and we will do our best <br>
                    to provide you with the best customer service.<br><br>
                    We hope to post our catering form for us to be able to<br>
                    host at any and all of your special occasions!
                </p>

            </div>
         </div>
<? } elseif(isset($_POST['register'])) { ?>
<?
connectDB();
$newsql = "INSERT INTO Registered (fname, lname, email, password) 
            VALUES ('" . $_POST['fname'] . "', '" . $_POST['lname'] . "', 
            '" . $_POST['newemail'] . "', '" . $_POST['newPassword'] . "')";
$newresult = mysqli_query($db, $newsql);

?>
    <div class="bWhite block">
            <div class="row text-center">
                <h1>Thank you for Signing Up!</h1>
                
                <p>Thank you for signing up to join the<br>
                    SweetTreats community.<br><br>
                    Your account has been created and we hope you<br>
                    check out our onlilne store to purchase many of our<br>
                    amazing products!
                </p>

            </div>
         </div>


<? } else { ?>
    
    <div class="bWhite block">
            <div class="row text-center">
                <h1>This is our Thank You Page!</h1>
                
                <p>You might have either typed in manually the url address <br>
                    for this 'Thank You' page or have accidentally stumbled<br>
                    upon this page somehow. If you'd like, please click on the<br>
                    "Return Home" link below to return to our home page.<br>
                    Thank you!<br><br>
                </p>

            </div>
            <div class="row top-buffer text-center">
                <a href="home.php">Return Home</a>
            </div>
    </div>

<? } ?>

    </main>
<?php include 'footer.php'; ?>