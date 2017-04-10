<?php include 'header.php'; ?>
<? require_once("connect_to_DB.php"); //inserts contents of this file here ?>
<!-- Main page info -->
    <main>
        <div class="account row">
            <div class="col-sm-offset-1 col-sm-10 col-xs-12">
                <div class="col-xs-9">
                    <h3>Account Home</h3>
                </div>
                <div class="col-xs-3 top-buffer">
                    <a href="sign-in.php">Logout</a>
                </div>
                <div class="line col-sm-12">
                    <hr class="col-sm-10">
                </div>
                <div class="side-bar col-sm-2">
                    <nav>
                        <ul class="list-unstyled">
                            <li><a href="account.php">Account Home</a></li>
                            <li><a href="my-details.php">Edit My Details</a></li>
                            <li><a href="order-history.php">View Order History</a></li>
                        </ul>
                    </nav>
                </div>
                <div class="col-sm-8 col-xs-12">
                <? 
                    connectDB();

                    $sql = "SELECT o.item_ID, i.item_ID, i.item_name, o.quantity, i.image, i.price, o.ship_email, r.email  FROM orders o, items i, registered r WHERE o.item_ID = i.item_ID AND o.ship_email = r.email AND r.email = '" . $username . "'";
                    
                    $result = mysqli_query($db, $sql) or die("SQL error: " . mysqli_error());
        
                ?>

            	<div class="bWhite">
            		<div class="row">
            			<div class="col-xs-12">
                            <form method="post" action="account.php">
                                <div class="row">
                                    <h2>Order History</h2>
                                </div>

                                 <? while($row = mysqli_fetch_array($result)) { ?>
                                        <div class="row top-buffer">
                                            <div class="shopping itemImage col-sm-6">
                                               <img src="<?= $row[4] ?>" alt="<?= $row[2] ?>">
                                            </div>
                                            <div class="col-sm-6">
                                                <p><?= $row[2] ?></p>
                                                <p><?= $row[5] ?>/dozen</p>
                                                <p><?= $row[3] ?></p>
                                            </div>
                                        </div>
                                <? } ?>
                         	
                                <div class="row">
                                    <div class="form-group top-buffer col-xs-4">
                                        <button type="submit" class="btn btn-default">Return to Account</button>
                                    </div>
                                </div>
                            </form>
    			        </div>
    		        </div>
    	        </div>
            </div>
        </div>
    </main>
<?php include 'footer.php'; ?>
   