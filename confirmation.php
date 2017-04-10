<?php include 'header.php'; ?>
<? require_once("connect_to_DB.php"); //inserts contents of this file here ?>
<!-- Main page info -->
<? 
    connectDB();
    //Add the customer Payment Information to a table in the database for checkout
    if(isset($_POST['PayContinue'])){
          $sql2 = "INSERT INTO billing_customer (F_Name, L_Name, B_Address, 
            B_Address_two, B_City, B_State, B_Zip, B_Phone, B_Email, B_Credit, 
            B_Coupon) VALUES ('" . $_POST['payFName']. "', '" . $_POST['payLName'] . "', 
            '" . $_POST['payFAddress']. "', '" . $_POST['paySAddress']. "', 
            '" . $_POST['payCity']. "', '" . $_POST['payState']. "', " . $_POST['payZip'] . ", 
            '" . $_POST['payPhone']. "', '" . $_POST['payEmail'] . "', 
            " . $_POST['creditNumber'] . ", '" . $_POST['payCoupon'] . "')";
          $result2 = mysqli_query($db, $sql2);
        }

   if(isset($username)) {
    $sql = "SELECT * FROM orders o, registered r WHERE o.registered_ID = r.registered_ID AND r.email = '" . $username ."'";
    
    $result = mysqli_query($db, $sql) or die("SQL error: " . mysqli_error());

    $row = mysqli_fetch_array($result);
    }

    $osql = "SELECT * FROM shopping_cart";
    $oresult = mysqli_query($db, $osql);
    $orow = mysqli_fetch_array($oresult);

    $psql = "SELECT * FROM billing_customer";
    $presult = mysqli_query($db, $psql);
    $prow = mysqli_fetch_array($presult);

    $ssql = "SELECT * FROM shipping_customer";
    $sresult = mysqli_query($db, $ssql);
    $srow = mysqli_fetch_array($sresult);

    if(isset($username)){
        $usersql = "SELECT registered_ID FROM Registered WHERE email = '" . $username . "'";
        $userresult = mysqli_query($db, $usersql);
        $userrow = mysqli_fetch_array($userresult);
    } else {
        $userrow = 'None';
    }
?>

    <main>
    	<div class="row bWhite">
            <div>
    	    	<div class="progress">
    	    		<!--Progress Tracker of the stages of checkout...Shipping Information, Payment Information, Review, Confirmation.-->
                      <img src="images/Progress-Tracker-3.png" alt="Review">
                </div>
            </div>
	    	<form class="col-sm-offset-2 col-sm-8 col-xs-12" method="POST" action="thank-you.php">
                <div id="cart"></div>
                <? $quantity = 0; ?>
                <? do {
                    $quantity = $quantity + 1; ?>
                    <input type="hidden" name="number" value="<?= $quantity ?>" />
                <input type="hidden" id="user" name="user" value="<?= $userrow ?>" />
	    		<div id="item<?= $quantity ?>" class="box col-sm-12">
                   <div class="shopping cartImage col-sm-4">
                        <img src="<?= $orow[7] ?>">
                   </div>
                   <div class="description col-sm-6" data-item="<?= $orow[1]?>" data-desc="<?= $orow[2] ?>" data-price="<?= $orow[5] ?>">
                        <h4><?= $orow[2] ?></h4>
                        <input type="hidden" name="item<?= $quantity ?>" value="<?= $orow[2] ?>" />
                        <p><?= $orow[1] ?></p>
                        <input type="hidden" name="itemid<?= $quantity ?>" value="<?= $orow[1] ?>" />
                        <p><?= $orow[3] ?></p>
                        <p id="price<?= $quantity ?>"><?= $orow[5] ?></p>
                   </div>
                   <div class="cartInfo col-sm-2" data-quan="<?= $orow[4] ?>">
                        <p>Quantity: <?= $orow[4] ?></p>
                        <input type="hidden" id="quan<?= $quantity ?>" name="quantity<?= $quantity ?>" value="<?= $orow[4] ?>" />
                        <button type="submit" class="btn btn-default">Remove Item</button>
                        <button type="submit" class="btn btn-default">View Product</button>
                   </div>
                </div>
                <? } while($orow = mysqli_fetch_array($oresult)) ?>
                <input type="hidden" id="quantityItems" name="quantityItems" value="<?= $quantity ?>" />

                <div class="row accountgroup">
                    <div class="row col-sm-12 top-buffer">
                        <h4 class="col-sm-10">Addresses</h4>
                    </div>
                    <div class="col-sm-6">
                        <div class="detailLabel row col-sm-12 top-buffer">
                            <!-- User information -->
                            <label class="col-sm-12 control-label">Billing Address</label>
                            <div class="detailAddress col-sm-12">
                                <p><?= $prow[1] ?> <?= $prow[2] ?></p>
                                <input type="hidden" name="bFName" value="<?= $prow[1] ?>" />
                                <input type="hidden" name="bLName" value="<?= $prow[2] ?>" />
                                <p><?= $prow[3] ?></p>
                                <input type="hidden" name="bAddress" value="<?= $prow[3] ?>" />
                                <p><?= $prow[4] ?></p>
                                <input type="hidden" name="bAddress_two" value="<?= $prow[4] ?>" />
                                <p><?= $prow[5] ?>, <?= $prow[6] ?> <?= $prow[7] ?></p>
                                <input type="hidden" name="bCity" value="<?= $prow[5] ?>" />
                                <input type="hidden" name="bState" value="<?= $prow[6] ?>" />
                                <input type="hidden" name="bZip" value="<?= $prow[7] ?>" />
                                <p><?= $prow[8] ?></p>
                                <input type="hidden" name="bPhone" value="<?= $prow[8] ?>" />
                                <p><?= $prow[9] ?></p>
                                <input type="hidden" name="bEmail" value="<?= $prow[9] ?>" />
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="detailLabel row col-sm-12 top-buffer">
                            <!-- User information -->
                             <label class="col-sm-12 control-label">Shipping Address</label>
                             <div class="detailAddress col-sm-12">
                                <p><?= $srow[1] ?> <?= $srow[2] ?></p>
                                <input type="hidden" name="sFName" value="<?= $srow[1] ?>" />
                                <input type="hidden" name="sLName" value="<?= $srow[2] ?>" />
                                <p><?= $srow[3] ?></p>
                                <input type="hidden" name="sAddress" value="<?= $srow[3] ?>" />
                                <p><?= $srow[4] ?></p>
                                <input type="hidden" name="sAddress_two" value="<?= $srow[4] ?>" />
                                <p><?= $srow[5] ?>, <?= $srow[6] ?> <?= $srow[7] ?></p>
                                <input type="hidden" name="sCity" value="<?= $srow[5] ?>" />
                                <input type="hidden" name="sState" value="<?= $srow[6] ?>" />
                                <input type="hidden" name="sZip" value="<?= $srow[7] ?>" />
                                <p><?= $srow[8] ?></p>
                                <input type="hidden" name="sPhone" value="<?= $srow[8] ?>" />
                                <p><?= $srow[9] ?></p>
                                <input type="hidden" name="sEmail" value="<?= $srow[9] ?>" />
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12">
	         			<div class="detailLabel row col-sm-12">
	                    	<label class="col-sm-12 control-label">Payment</label>
	                    	<div class="detailAddress col-sm-12">
	                    		<p><?= $prow[10] ?></p>
                                <input type="hidden" name="pPay" value="<?= $prow[10] ?>" />
                                <p>Coupon: <?= $prow[11] ?></p>
                                <input type="hidden" name="pCoupon" value="<?= $prow[11] ?>" />
	                		</div>
	                	</div>
                	</div>
                    <div class="col-sm-offset-8 col-sm-4 top-buffer">
                        <h5 class="col-sm-7">Items Cost + Tax:</h4>
                        <h5 class="col-sm-5" id="cost"></h4>
                    </div>
                    <div class="col-sm-offset-8 col-sm-4">
                        <h5 class="col-sm-7">Shipping:</h4>
                        <h5 class="col-sm-5" id="shipping"></h4>
                    </div>
                    <div class="col-sm-offset-8 col-sm-4">
                        <h4 class="col-sm-7">Total Cost:</h4>
                        <h4 class="col-sm-5" id="total"></h4>
                        <input type="hidden" id="hiddenTotal" name="hiddenTotal" value=""/>
                    </div>
                </div>
                <div class="row shoppingcart">
                    <div class="col-xs-offset-3 col-xs-2">
                        <button type="submit" class="btn btn-default" onclick="history.back(-1)">Back</button>
                    </div>
                    <div class="col-xs-offset-3 col-xs-2">
                        <input type="submit" class="btn btn-default" name="submitorder" value="Continue"/>
                    </div>
                </div>
	    	</div>
            </form>
    </main>
<?php include 'footer.php'; ?>
<script>
    $(document).ready(function () {

        var quantityItems = document.getElementById('quantityItems').value;

        var products = new Array();
        var num = new Array();

        for(i = 1; i <= quantityItems; i++) {
            var p = document.getElementById('price'+i).innerHTML;
            p = parseFloat(p.slice(1,6));

            products[i] = p;

            var q = document.getElementById('quan'+i).value;
            num[i] = q;
        }

        var sumProd = 0;
        for(i = 1; i < products.length; i++) {
            sumProd += (products[i] * num[i]);
        }
        sumProd *= 1.05;
        sumProd = sumProd.toFixed(2);
        var dollarsum = '$'+ sumProd;

        document.getElementById('cost').innerHTML = dollarsum;
        var shipping = parseFloat(4.95).toFixed(2);
        document.getElementById('shipping').innerHTML = '$'+(shipping);
        document.getElementById('total').innerHTML = '$' + (parseFloat(sumProd) + parseFloat(shipping)).toFixed(2);
        var total = document.getElementById('total').innerHTML;
        document.getElementById('hiddenTotal').value = total;
    });
</script>