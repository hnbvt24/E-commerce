<?php include 'header.php'; ?>
<!-- Main page info -->
    <main>
        
         <div class="orderForm">
            <form class="row" method="request" action="thank-you.php">
                <div class="text-center bottom-buffer">
                    <h1>Special Request Order Form</h1>
                    <p> Please fill out all the fields below for submitting a special order request. <br/>
                        We will contact you within the next 24-48 hours to follow up with more details <br/>
                        and review for your order. We hope to make your experience the best there is <br/>
                        and worth every moment of your time.</p>
                </div>
                <div class="row">
                    <div class="form-group col-xs-12 col-sm-4 col-sm-offset-2 col-md-3 col-md-offset-3">
                        <label for="orderFName">First Name</label>
                        <input type="text" class="form-control required" id="orderFName" placeholder="First Name">
                     </div>
                    <div class="form-group col-xs-12 col-sm-4 col-md-3">
                        <label for="orderLName">Last Name</label>
                        <input type="text" class="form-control required" id="orderLName" placeholder="Last Name">
                     </div>
                </div>
                <div class="row">
                    <div class="form-group col-xs-12 col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-3">
                        <label for="orderAddress">Address</label>
                        <input type="text" class="form-control required" id="orderAddress" placeholder="Address">
                     </div>
                </div>
                <div class="row">
                    <div class="form-group col-xs-4 col-sm-3 col-sm-offset-2 col-md-2 col-md-offset-3">
                        <label for="orderCity">City</label>
                        <input type="text" class="form-control required" id="orderCity" placeholder="City">
                     </div>
                    <div class="form-group col-xs-4 col-sm-2 col-md-1">
                        <label for="orderState">State</label>
                        <input type="text" class="form-control required" id="orderState" placeholder="State">
                        <span style="color:red;" id="errorState"></span>
                     </div>
                    <div class="form-group col-xs-4 col-sm-2 col-md-2">
                        <label for="orderZip">Zip Code</label>
                        <input type="text" class="form-control required" id="orderZip" placeholder="Zip Code">
                        <span style="color:red;" id="errorZip"></span>
                     </div>
                </div>
                <div class="row">
                    <div class="form-group col-xs-6 col-sm-3 col-sm-offset-2 col-md-2 col-md-offset-3">
                        <label for="orderPhone">Phone</label>
                        <input type="text" class="form-control required" id="orderPhone" placeholder="xxx-xxx-xxx">
                        <span style="color:red;" id="errorPhone"></span>
                     </div>
                    <div class="form-group col-xs-12 col-sm-4 col-md-3">
                        <label for="orderEmail">Email</label>
                        <input type="text" class="form-control required" id="orderEmail" placeholder="name@gmail.com">
                        <span style="color:red;" id="errorEmail"></span>
                     </div>
                </div>
                <!-- checkboxes -->
                <div class="row">
                    <div class="form-group col-xs-12 col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-3">
                        <label for="orderDetails">Special Order Details</label>
                        <textarea class="form-control required" rows="8" id="orderDetails" placeholder="Please type in a detailed customized order. Include Price, Delivery Date, Specific Event Details, along with any important information for your special order."></textarea>
                        <span style="color:red;" id="errorDetails"></span>
                     </div>
                </div>
                <div class="row">
                    <div class="form-group col-xs-12 col-sm-offset-2 col-md-offset-3">
                        <input type="submit" class="btn btn-default" id="submitspecialorder" name="submitspecialorder" value="Submit"/>
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
    alert('hello');
    $('#submitspecialorder').click(function(e) {
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

    // Check to see if order details are filled in
    
        if($('#orderDetails').val() == '') {
            isValid = false;
            document.getElementById('errorDetails').innerHTML = "Please write us what you want for your special order.<br/>";
        } else {
            document.getElementById('errorDetails').innerHTML = "";
        } 

    // Reg Expressions to validate the form inputs
        var emailReg = /^([a-zA-Z0-9_\-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([a-zA-Z0-9\-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/;
        var zipReg =  /^\d{5}(-\d{4})?$/;
        var phoneReg = /^[2-9]\d{2}-\d{3}-\d{4}$/;
        var stateReg = /^((AL)|(AK)|(AS)|(AZ)|(AR)|(CA)|(CO)|(CT)|(DE)|(DC)|(FM)|(FL)|(GA)|(GU)|(HI)|(ID)|(IL)|(IN)|(IA)|(KS)|(KY)|(LA)|(ME)|(MH)|(MD)|(MA)|(MI)|(MN)|(MS)|(MO)|(MT)|(NE)|(NV)|(NH)|(NJ)|(NM)|(NY)|(NC)|(ND)|(MP)|(OH)|(OK)|(OR)|(PW)|(PA)|(PR)|(RI)|(SC)|(SD)|(TN)|(TX)|(UT)|(VT)|(VI)|(VA)|(WA)|(WV)|(WI)|(WY))$/;
        var email = document.getElementById('orderEmail').value;
        var state = document.getElementById('orderState').value;
        var zip = document.getElementById('orderZip').value;
        var phone =  document.getElementById('orderPhone').value;
    //Check email
    if(! emailReg.test(email)) {
            isValid = false;
            document.getElementById('errorEmail').innerHTML = 'Please type in correct email (i.e. john@gmail.com)';
        } else {
            document.getElementById('errorEmail').innerHTML = '';
        }
     // Check to see if State is two letters and of this selection
     if (! stateReg.test(state)) {
        isValid = false;
        document.getElementById('errorState').innerHTML = 'Please type in two letters for state (i.e. VA)';
     } else {
        document.getElementById('errorState').innerHTML = '';
     }
     //Check zip
    if(! zipReg.test(zip)) {
            isValid = false;
            document.getElementById('errorZip').innerHTML = 'Please type in correct email (i.e. 24060)';
        } else {
            document.getElementById('errorZip').innerHTML = '';
        }
    //Check phone
    if(! phoneReg.test(phone)) {
            isValid = false;
            document.getElementById('errorPhone').innerHTML = 'Please type in correct phone (i.e. 540-555-1234)';
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