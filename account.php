<? include 'header.php'; ?>
<? require_once("connect_to_DB.php"); //inserts contents of this file here ?>
<!-- Main page info -->
<? if((isset($_SESSION['user'])) || (isset($_SESSION['login_member']))){ ?>
    <main>
        <div class="account row">
            <div class="col-sm-offset-1 col-sm-10 col-xs-12">
                <div class="col-xs-9">
                    <h3>Account Home</h3>
                </div>
                <div class="col-xs-3">
                    <a href="logout.php">Logout</a>
                </div>
                <div class="line col-sm-12">
                    <hr class="col-sm-10">
                </div>
                <div class="side-bar col-sm-2 col-xs-0">
                    <nav>
                        <ul class="list-unstyled">
                            <li><a href="account.php">Account Home</a></li>
                            <li><a href="my-details.php">Edit My Details</a></li>
                            <li><a href="order-history.php">View Order History</a></li>
                        </ul>
                    </nav>
                </div>
                <? 
                    connectDB();
                   
                    $sql = "SELECT * FROM orders o, registered r WHERE o.registered_ID = r.registered_ID AND r.email = '" . $username . "'";
                    
                    $result = mysqli_query($db, $sql) or die("SQL error: " . mysqli_error());

                    $row = mysqli_fetch_array($result);
                ?>
                <?
                    if(isset($_POST['update'])) {
                        $updateSQL = "UPDATE Registered SET fname='" . $_POST['fname'] . "', lname='" . $_POST['lname'] . "' WHERE email = '" . $username . "'";
                        $updateResult = mysqli_query($db, $updateSQL);
                    }
                    if(isset($_POST['updatePass'])) {
                        $passSQL = "UPDATE Registered SET password='" . $_POST['newpassword'] . "' WHERE email = '" . $username . "'";
                        $passResult = mysqli_query($db, $passSQL);
                    }
                  ?>
                <form class="col-sm-8 col-xs-12">
                    <!--User Details -->
                    <div class="row accountgroup">
                        <div class="row col-xs-12">
                            <h4 class="col-xs-10">My Details</h4>
                            <a href="my-details.php">Edit Info</a>
                        </div>
                        <div class="col-xs-12">
                            <div class="detailLabel row col-xs-12">
                                <!-- User information -->
                                 <label class="col-sm-2 control-label">Name</label>
                                <div class="col-sm-10">
                                    <p class="form-control-static"><? print $row[27] . " " . $row[28] ?></p>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12">
                            <div class="detailLabel row col-xs-12">
                                <!-- User information -->
                                 <label class="col-sm-2 control-label">Email</label>
                                <div class="col-sm-10">
                                    <p class="form-control-static"><? print $row[29] ?></p>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12">
                            <div class="detailLabel row col-xs-12">
                                <!-- User information -->
                                 <label class="col-sm-2 control-label">Password</label>
                                <div class="col-sm-10">
                                    <p class="form-control-static"><a href="update-password.php">Change Password</a></p>
                                </div>
                            </div>
                        </div>
                    </div>
                        <!--Address Information-->
                    
                    <div class="row accountgroup">

                        <div class="row col-xs-12">
                            <hr>
                            <h4 class="col-xs-10">Addresses</h4>
                            <p class="col-xs-2"><a href="my-details.php">Edit Info</a></p>
                        </div>
                        <div class="col-xs-6">
                            <div class="detailLabel row col-xs-12">
                                <!-- User information -->
                                 <label class="col-xs-12 control-label">Billing Address</label>
                                <div class="detailAddress col-xs-12">
                                    <p><? print $row[17] ?></p>
                                    <p><? print $row[18] ?></p>
                                    <p><? print $row[19] . ", " . $row[20] . " " . $row[21] ?></p>
                                    <p><? print $row[22] ?></p>
                                    <p><a href="my-details.php">Edit Address</a></p>
                                </div>
                            <!-- If no billing address is set    
                                <div class="detailAddress col-xs-12">
                                    <p>You have not set a default billing address.</p>
                                    <p><a href="#">Edit Address</a></p>
                                </div>
                            -->
                            </div>
                        </div>
                        <div class="col-xs-6">
                            <div class="detailLabel row col-xs-12">
                                <!-- User information -->
                                 <label class="col-xs-12 control-label">Shipping Address</label>
                                <div class="detailAddress col-xs-12">
                                    <p><? print $row[8] ?></p>
                                    <p><? print $row[9] ?></p>
                                    <p><? print $row[10] . ", " . $row[11] . " " . $row[12] ?></p>
                                    <p><a href="my-details.php">Edit Address</a></p>
                                </div>
                            </div>
                        </div>
                    </div>

                        <!--Recent Order-->

                    <div class="row accountgroup">
                        
                        <div class="row col-xs-12">
                            <hr>
                            <h4 class="col-xs-12">Orders</h4>
                        </div>
                        <div class="col-xs-12">
                            <div class="detailLabel row col-xs-12">
                                <!-- User information -->
                                <label class="col-xs-12 control-label">Recent Purchase</label>
                                <div class="detailAddress col-xs-12">
                                    <? 
                                        $sql2 = "SELECT o.item_ID, i.item_ID, i.item_name, o.quantity, i.image, i.price, o.ship_email, r.email, o.order_ID  FROM orders o, items i, registered r WHERE o.item_ID = i.item_ID AND o.ship_email = r.email AND r.email = '" . $username . "' ORDER BY o.order_ID desc LIMIT 1";
                                        $result2 = mysqli_query($db, $sql2) or die("SQL error: " . mysqli_error());

                                        while($row2 = mysqli_fetch_array($result2)) { ?>
                                            
                                            <div class="row">
                                                <div class="shopping itemImage col-sm-6">
                                                   <img src="<?= $row2[4] ?>" alt="<?= $row2[2] ?>">
                                                </div>
                                                <div class="col-sm-6 top-buffer">
                                                    <p><?= $row2[2] ?></p>
                                                    <p><?= $row2[5] ?>/dozen</p>
                                                    <p><?= $row2[3] ?></p>
                                                </div>
                                            </div>

                                        <? } ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </main>
    <? } else { ?>
    <main>
        <div class="bWhite block">
            <div class="row text-center">
                <h1>This is our Account Page!</h1>
                
                <p>You might have either typed in manually the url address <br>
                    for this 'Account' page or have accidentally stumbled<br>
                    upon this page somehow. If you'd like, please click on the<br>
                    "Return Home" link below to return to our home page.<br>
                    Thank you!<br><br>
                </p>

            </div>
            <div class="row top-buffer text-center">
                <a href="home.php">Return Home</a>
            </div>
    </div>
    </main>
    <? } ?>
<?php include 'footer.php'; ?>