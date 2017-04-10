<?php include 'header.php'; ?>
<? require_once("connect_to_DB.php"); //inserts contents of this file here ?>
<?
connectDB();
if(isset($_POST['registerCustomer'])) {
$sql = "INSERT INTO registered (fname, lname, email, password) VALUES ('" . $_POST['fname']. "', '" . $_POST['lname'] . "', '" . $_POST['email']. "', '" . $_POST['password']. "')";
$result = mysqli_query($db, $sql);
}
?>

<!-- Main page info -->
    <main>
    	<div class="row bWhite block">
            <div class="row">
    	    	<div class="progress">
    	    		<!--Progress Tracker of the stages of checkout...Shipping Information, Payment Information, Review, Confirmation.-->
    	    	      <img src="images/Progress-Tracker-1.png" alt="Shipping Info">
                </div>
            </div>
	    	<form method="post" action="payment.php">
         
	    		<div class="row text-center">
                    <h2>Shipping Information</h2>
                </div>
                <? 
                    if(isset($_POST['guest_submit'])) {

                      //Leave input fields blank

                    } elseif((isset($_SESSION['user'])) || (isset($_SESSION['login_member'])) || (isset($_POST['registerCustomer']))){


                    connectDB();
                   
                    $sql = "SELECT * FROM orders o, registered r WHERE o.registered_ID = r.registered_ID AND r.email = '" . $username ."'";
                    
                    $result = mysqli_query($db, $sql) or die("SQL error: " . mysqli_error());

                    $row = mysqli_fetch_array($result);

                    $fname = $row[30];

                    $lname = $row[31];

                    $email = $row[32];

                    $faddress = $row[8];

                    $saddress = $row[9];

                    $city = $row[10];

                    $state = $row[11];

                    $zip = $row[12];

                    $phone = $row[13];

                  }

                ?>

                <div class="row">
                    <div class="form-group col-xs-3 col-xs-offset-3">
                        <label for="orderFName">First Name</label>
                        <input type="text" class="form-control required" id="orderFName" name="orderFName" placeholder="First Name" value="<? $fname = isset($fname) ? $fname : '';
                                                                                                                                              print $fname; ?>"/>
                     </div>
                    <div class="form-group col-xs-3">
                        <label for="orderLName">Last Name</label>
                        <input type="text" class="form-control required" id="orderLName" name="orderLName" placeholder="Last Name" value="<? $lname = isset($lname) ? $lname : '';
                                                                                                                                              print $lname ?>"/>
                     </div>
                </div>
                <div class="row">
                    <div class="form-group col-xs-6 col-xs-offset-3">
                        <label for="orderFName">Address</label>
                        <input type="text" class="form-control required" id="orderFAddress" name="orderFAddress" placeholder="Address" value="<? $faddress = isset($faddress) ? $faddress : '';
                                                                                                                                                  print $faddress ?>"/>
                     </div>
                 </div>
                 <div class="row">
                     <div class="form-group col-xs-6 col-xs-offset-3">
                        <input type="text" class="form-control" id="orderSAddress" name="orderSAddress" placeholder="Second Address" value="<? $saddress = isset($saddress) ? $saddress : '';
                                                                                                                                                  print $saddress ?>"/>
                     </div>
                 </div>
                <div class="row">
                    <div class="form-group col-xs-2 col-xs-offset-3">
                        <label for="orderCity">City</label>
                        <input type="text" class="form-control required" id="orderCity" name="orderCity" placeholder="City" value="<? $city = isset($city) ? $city : '';
                                                                                                                                      print $city ?>"/>
                     </div>
                    <div class="form-group col-xs-1">
                        <label for="orderState">State</label>
                        <input type="text" class="form-control required" id="orderState" name="orderState" placeholder="State" value="<? $state = isset($state) ? $state : '';
                                                                                                                                          print $state ?>"/>
                        <span style="color:red;" id="errorState"></span>
                     </div>
                    <div class="form-group col-xs-2">
                        <label for="orderZip">Zip Code</label>
                        <input type="text" class="form-control required" id="orderZip" name="orderZip" placeholder="Zip Code" value="<? $zip = isset($zip) ? $zip : '';
                                                                                                                                        print $zip ?>"/>
                        <span style="color:red;" id="errorZip"></span>
                     </div>
                </div>
                <div class="row">
                    <div class="form-group col-xs-3 col-xs-offset-3">
                        <label for="orderPhone">Phone</label>
                        <input type="text" class="form-control required" id="orderPhone" name="orderPhone" placeholder="xxx-xxx-xxx" value="<? $phone = isset($phone) ? $phone : '';
                                                                                                                                                print $phone ?>"/>
                        <span style="color:red;" id="errorPhone"></span>
                     </div>
                      <div class="form-group col-xs-3">
                        <label for="orderEmail">Email</label>
                        <input type="text" class="form-control required" id="orderEmail" name="orderEmail" placeholder="name@gmail.com" value="<? $email = isset($email) ? $email : '';
                                                                                                                                                  print $email ?>"/>
                        <span style="color:red;" id="errorEmail"></span>
                     </div>
                </div>
                
                <div class="row shoppingcart">
                    <div class="col-xs-offset-3 col-xs-2">
                        <button type="submit" id="back" class="btn btn-default" onclick="history.back(-1)">Back</button>
                    </div>
                   
                        <div class="col-xs-offset-3 col-xs-2">
                            <input type="submit" id="ShipContinue" name="ShipContinue" class="btn btn-default" value="Continue"/>
                        </div>
                </div>
                </form>
	    </div>
      <? 
        if(isset($_POST['registerCustomer'])){
          mysqli_free_result($result);
        }
          mysqli_close($db);
      ?>
    </main>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
  <script type="text/javascript">
  //Check to make sure all required form fields are filled in.
  //Found code structure at JQuery By Example --- http://www.jquerybyexample.net/2012/12/jquery-to-check-all-textboxes-empty.html
      $(document).ready(function() {
    $('#ShipContinue').click(function(e) {
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
      
      
      var email =  document.getElementById('orderEmail').value;
      var state = document.getElementById('orderState').value;
      var zip = document.getElementById('orderZip').value;
      var phone =  document.getElementById('orderPhone').value;

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
        
     if (isValid == false) {
         e.preventDefault();
     } else { 
     }
  });
});
  
  </script>
<?php include 'footer.php'; ?>