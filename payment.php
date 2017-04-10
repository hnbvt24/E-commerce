<?php include 'header.php'; ?>
<? require_once("connect_to_DB.php"); //inserts contents of this file here ?>
<!-- Main page info -->
<? 
    connectDB();
    //Add the customer Shipping Information to a table in the database for checkout
    if(isset($_POST['ShipContinue'])){
          $sql2 = "INSERT INTO shipping_customer (F_Name, L_Name, S_Address, S_Address_two, S_City, S_State, S_Zip, S_Phone, S_Email) VALUES ('" . $_POST['orderFName']. "', '" . $_POST['orderLName'] . "', '" . $_POST['orderFAddress']. "', '" . $_POST['orderSAddress']. "', '" . $_POST['orderCity']. "', '" . $_POST['orderState']. "', " . $_POST['orderZip'] . ", '" . $_POST['orderPhone']. "', '" . $_POST['orderEmail'] . "')";
          $result2 = mysqli_query($db, $sql2);
        }

   if(isset($username)) {
    $sql = "SELECT * FROM orders o, registered r WHERE o.registered_ID = r.registered_ID AND r.email = '" . $username ."'";
    
    $result = mysqli_query($db, $sql) or die("SQL error: " . mysqli_error());

    $row = mysqli_fetch_array($result);

    $fname = $row[30];

    $lname = $row[31];

    $email = $row[32];

    $faddress = $row[21];

    $saddress = $row[22];

    $city = $row[23];

    $state = $row[24];

    $zip = $row[25];

    $phone = $row[26];
  }

?>

    <main>
    	<div class="row bWhite block">
            <div class="row">
    	    	<div class="progress">
    	    		<!--Progress Tracker of the stages of checkout...Shipping Information, Payment Information, Review, Confirmation.-->
                      <img src="images/Progress-Tracker-2.png" alt="Billing Info">
                </div>
            </div>
	    	<form method="post" action="confirmation.php">

	    		<div class="row text-center">
                    <h2>Payment Information</h2>
                </div>
                <div class="row">
                	<div class="col-xs-offset-3 col-xs-6">
                		<h4>Billing Information</h4>
                	</div>
                </div>
                <div class="row">
                    <div class="form-group col-xs-3 col-xs-offset-3">
                        <label for="payFName">First Name</label>
                        <input type="text" class="form-control required" id="payFName" name="payFName" placeholder="First Name" value="<? $fname = isset($fname) ? $fname : '';
                                                                                                                                              print $fname; ?>"/>
                     </div>
                    <div class="form-group col-xs-3">
                        <label for="payLName">Last Name</label>
                        <input type="text" class="form-control required" id="payLName" name="payLName" placeholder="Last Name" value="<? $lname = isset($lname) ? $lname : '';
                                                                                                                                              print $lname; ?>"/>
                     </div>
                </div>
                <div class="row">
                    <div class="form-group col-xs-6 col-xs-offset-3">
                        <label for="payFAddress">Address</label>
                        <input type="text" class="form-control required" id="payFAddress" name="payFAddress" placeholder="Address" value="<? $faddress = isset($faddress) ? $faddress : '';
                                                                                                                                              print $faddress; ?>"/>
                     </div>
                 </div>
                 <div class="row">
                     <div class="form-group col-xs-6 col-xs-offset-3">
                        <input type="text" class="form-control" id="paySAddress" name="paySAddress" placeholder="Second Address" value="<? $saddress = isset($saddress) ? $saddress : '';
                                                                                                                                              print $saddress; ?>"/>
                     </div>
                 </div>
                <div class="row">
                    <div class="form-group col-xs-2 col-xs-offset-3">
                        <label for="payCity">City</label>
                        <input type="text" class="form-control required" id="payCity" name="payCity" placeholder="City" value="<? $city = isset($city) ? $city : '';
                                                                                                                                              print $city; ?>"/>
                     </div>
                    <div class="form-group col-xs-1">
                        <label for="payState">State</label>
                        <input type="text" class="form-control required" id="payState" name="payState" placeholder="State" value="<? $state = isset($state) ? $state : '';
                                                                                                                                              print $state; ?>"/>
                        <span style="color:red;" id="errorState"></span>
                     </div>
                    <div class="form-group col-xs-2">
                        <label for="payZip">Zip Code</label>
                        <input type="text" class="form-control required" id="payZip" name="payZip" placeholder="Zip Code" value="<? $zip = isset($zip) ? $zip : '';
                                                                                                                                              print $zip; ?>"/>
                        <span style="color:red;" id="errorZip"></span>
                     </div>
                </div>
                <div class="row">
                    <div class="form-group col-xs-2 col-xs-offset-3">
                        <label for="payPhone">Phone</label>
                        <input type="text" class="form-control required" id="payPhone" name="payPhone" placeholder="xxx-xxx-xxx" value="<? $phone = isset($phone) ? $phone : '';
                                                                                                                                              print $phone; ?>"/>
                        <span style="color:red;" id="errorPhone"></span>
                     </div>
                      <div class="form-group col-xs-3">
                        <label for="payEmail">Email</label>
                        <input type="text" class="form-control required" id="payEmail" name="payEmail" placeholder="name@gmail.com" value="<? $email = isset($email) ? $email : '';
                                                                                                                                              print $email; ?>"/>
                        <span style="color:red;" id="errorEmail"></span>
                     </div>
                </div>
                <div class="row">
                     <div class="form-group col-xs-2 col-xs-offset-3">
                     	<label for="creditNumber">Credit Card Number</label>
                        <input type="text" class="form-control required" id="creditNumber" name="creditNumber" placeholder="xxxx xxxx xxxx xxxx">
                        <span style="color:red;" id="errorCredit"></span>
                     </div>
                    <div class="form-group col-xs-2">
                     	<label for="securityNumber">Security Number</label>
                        <input type="text" class="form-control required" id="securityNumber" name="securityNumber" placeholder="xxx">
                        <span style="color:red;" id="errorSecurity"></span>
                     </div>
                     <div class="form-group col-xs-2">
                      <label for="payCoupon">Coupon Code</label>
                        <input type="text" class="form-control" id="payCoupon" name="payCoupon" placeholder="COUPON">
                        <span style="color:red;" id="errorCoupon"></span>
                     </div>
                </div>
                <div class="row shoppingcart">
                    <div class="col-xs-offset-3 col-xs-2">
                        <input type="submit" id="back" class="btn btn-default" onclick="history.back(-1)" value="Back" />
                    </div>
                    <div class="col-xs-offset-3 col-xs-2">
                        <input type="submit" id="PayContinue" name="PayContinue" class="btn btn-default" value="Continue"/>
                    </div>
                </div>
                </form>
	    </div>
    </main>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script type="text/javascript">
  //Check to make sure all required form fields are filled in.
  //Found code structure at JQuery By Example --- http://www.jquerybyexample.net/2012/12/jquery-to-check-all-textboxes-empty.html
      $(document).ready(function() {
    $('#PayContinue').click(function(e) {
        var isValid = true;
        $('input[type="text"].required').each(function() {
           if ($.trim($(this).val()) == '') {
               isValid = false;
               $(this).css({
                   "border": "1px solid #ff0000",
                   "background": "#efefef"
               });
           } else {
               $(this).css({
                   "border": "",
                   "background": ""
           });
         }
     });

      //Check for appropriate values using Reg Expressions
      var emailReg = /^(.+)@([^\.].*)\.([a-z]{2,})$/;
      var stateReg = /^((AL)|(AK)|(AS)|(AZ)|(AR)|(CA)|(CO)|(CT)|(DE)|(DC)|(FM)|(FL)|(GA)|(GU)|(HI)|(ID)|(IL)|(IN)|(IA)|(KS)|(KY)|(LA)|(ME)|(MH)|(MD)|(MA)|(MI)|(MN)|(MS)|(MO)|(MT)|(NE)|(NV)|(NH)|(NJ)|(NM)|(NY)|(NC)|(ND)|(MP)|(OH)|(OK)|(OR)|(PW)|(PA)|(PR)|(RI)|(SC)|(SD)|(TN)|(TX)|(UT)|(VT)|(VI)|(VA)|(WA)|(WV)|(WI)|(WY))$/;
      var zipReg =  /^\d{5}(-\d{4})?$/;
      var phoneReg = /^[2-9]\d{2}-\d{3}-\d{4}$/;
      var creditReg = /^(\d{4}[- ]){3}\d{4}|\d{16}$/;
      var securityReg = /^\d{3}$/;
      //var couponReg = "TENOFF";
      
      
      var email =  document.getElementById('payEmail').value;
      var state = document.getElementById('payState').value;
      var zip = document.getElementById('payZip').value;
      var phone =  document.getElementById('payPhone').value;
      var credit = document.getElementById('creditNumber').value;
      var security = document.getElementById('securityNumber').value;
      //var coupon = document.getElementById('payCoupon').value;

      //Check Email
      if(! emailReg.test(email)) {
          isValid = false;
          document.getElementById('errorEmail').innerHTML = 'Please type correct email (i.e. john@gmail.com)';
      } else {
          document.getElementById('errorEmail').innerHTML = '';
      }
      //Check State
      if(! stateReg.test(state)) {
          isValid = false;
          document.getElementById('errorState').innerHTML = 'Please type correct state (i.e. VA)';
      } else {
          document.getElementById('errorState').innerHTML = '';
      }
      //Check Zip
      if(! zipReg.test(zip)) {
          isValid = false;
          document.getElementById('errorZip').innerHTML = 'Please type in correct zip(i.e. 24060)';
      } else {
          document.getElementById('errorZip').innerHTML = '';
      }
      //Check Phone
      if(! phoneReg.test(phone)) {
          isValid = false;
          document.getElementById('errorPhone').innerHTML = 'Please type in correct phone number (i.e. 540-555-1234)';
      } else {
          document.getElementById('errorPhone').innerHTML = '';
      }
      //Check Credit Card Number
      if(! creditReg.test(credit)) {
          isValid = false;
          document.getElementById('errorCredit').innerHTML = 'Please type in correct credit number format';
      } else {
          document.getElementById('errorCredit').innerHTML = '';
      }
      //Check Security Pin Number
      if(! securityReg.test(security)) {
          isValid = false;
          document.getElementById('errorSecurity').innerHTML = 'Please type in correct three digit number';
      } else {
          document.getElementById('errorSecurity').innerHTML = '';
      }
      //Check Coupon Code
      /*if(! couponReg.test(coupon)) {
          isValid = false;
          document.getElementById('errorCoupon').innerHTML = 'Please type in valid Coupon Code';
      } else {
          document.getElementById('errorCoupon').innerHTML = '';
      }*/

     if (isValid == false) {
         e.preventDefault();
     } else { 
     }
  });
});
  
  </script>
<?php include 'footer.php'; ?>