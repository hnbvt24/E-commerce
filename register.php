<?php include 'header.php'; ?>
<? require_once("connect_to_DB.php"); //inserts contents of this file here ?>
<!-- Main page info -->
<div class="form-group bWhite block">
                <form method="post" action="shipping.php">
                    <div class="row">
                        <h2 class="text-center">New User</h2>
                    </div>
                    <div class="row">
                        <div class="form-group text-center">
                            <p>Creating an account makes it fast
                                and easy for checkout and when you
                                return to shop with us.</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-sm-offset-4 col-sm-4">
                            <label for="fname">First Name*</label>
                            <input type="text" class="form-control required" name="fname" id="fname" placeholder="First Name">
                         </div>
                     </div>
                     <div class="row">
                        <div class="form-group col-sm-offset-4 col-sm-4">
                            <label for="lname">Last Name*</label>
                            <input type="text" class="form-control required" name="lname" id="lname" placeholder="Last Name">
                         </div>
                     </div>
                    <div class="row">
                        <div class="form-group col-sm-offset-4 col-sm-4">
                            <label for="email">Email Address*</label>
                            <input type="text" class="form-control required" name="email" id="email" placeholder="Email">
                            <span style="color:red;" id="errorEmail"></span>
                         </div>
                     </div>
                     <div class="row">
                        <div class="form-group col-sm-offset-4 col-sm-4">
                            <label for="password">Password*</label>
                            <input type="password" class="form-control required" name="password" id="password" placeholder="Password">
                            <span style="color:red;" id="errorPassword"></span>
                         </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-sm-offset-4 col-sm-4">
                            <label for="confirmpassword">Confirm Password*</label>
                            <input type="password" class="form-control required" name="confirmpassword" id="confirmpassword" placeholder="Password">
                            <span style="color:red;" id="errorConfirm"></span>
                         </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-sm-offset-4 col-sm-4">
                            <em>* Required Fields</em>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-sm-offset-4 col-sm-6">
                            <input type="submit" class="btn btn-default" id="registerCustomer" name="registerCustomer" value="Register" />
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
    $('#registerCustomer').click(function(e) {
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
      $('input[type="password"].required').each(function() {
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

    // Reg Expressions to validate the form inputs
        var emailReg = /^([a-zA-Z0-9_\-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([a-zA-Z0-9\-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/;
        var passReg = /^[a-zA-Z]\w{3,14}$/;
        //must contain at least 4 characters and no more than 15 characters and no characters other than letters, numbers and the underscore may be used
        var email = document.getElementById('email').value;
        var password = document.getElementById('password').value;
        var confirm = document.getElementById('confirmpassword').value;


    //Check new email
    if(! emailReg.test(email)) {
            isValid = false;
            document.getElementById('errorEmail').innerHTML = 'Please type in correct email (i.e. john@gmail.com)';
        } else {
            document.getElementById('errorEmail').innerHTML = '';
        }

    //Check new password
    if(! passReg.test(password)) {
            isValid = false;
            document.getElementById('errorPassword').innerHTML = 'Password must be between 4 - 8 characters with letters, numbers, or underscore';
        } else {
            document.getElementById('errorPassword').innerHTML = '';
        }
    //Check confirmation password
    if(confirm != password) {
        isValid = false;
            document.getElementById('errorConfirm').innerHTML = 'Password must match';
        } else {
            document.getElementById('errorConfirm').innerHTML = '';
        }

    if (isValid == false) {
           e.preventDefault();
       } else { 
       }
    });
});      

</script>
<?php include 'footer.php'; ?>