<? ob_start(); ?>
<?php include 'header.php'; ?>
<?php include 'login-account.php'; ?>
<? require_once("connect_to_DB.php"); //inserts contents of this file here ?>

<!-- Page material -->

<? 
if((isset($_SESSION['user'])) || (isset($_SESSION['login_member']))){
    
    header("location: account.php");
}
?>
<!-- Main page info -->
    <main>
        <div class="login row">

            <!-- Returning User Sign in -->
            
            <div class="form-group sign-in col-sm-offset-2 col-xs-4">
                <form method="request" action="sign-in.php">
                    <div class="row">
                        <div class="form-group col-xs-12">
                            <p>Returning customer?</p>
                        </div>
                    </div>
                    <div class="row">
                        <h2 class="col-xs-12">Sign In</h2>
                    </div>
                    <div class="row">
                        <div class="form-group col-xs-12">
                            <label for="email">Email Address</label>
                            <input type="text" class="form-control" id="userEmail" name="email" placeholder="Email">
                         </div>
                         <span style="color:red;" id="errorEmail"></span>
                     </div>
                     <div class="row">
                        <div class="form-group col-xs-12">
                            <label for="password">Password</label>
                            <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                         </div>
                         <span style="color:red;" id="errorPassword"></span>
                    </div>
                    <div class="row">
                        <div class="form-group col-xs-4">
                            <input type="submit" class="btn btn-default" name="login" value="Login"/>
                        </div>
                    </form>
                    <form method="post" action="thank-you.php">
                        <div class="form-group col-xs-8">
                            <input name="forgotSubmit" type="submit" class="btn btn-default" value="Forgot your password?"/>
                        </div>
                    </div>
                    </form>
                <div class="row col-sm-12">
                <?php echo $error; ?>
                </div>    
            </div>

            <!-- Create an account -->

            <div id="new" class="form-group sign-up col-xs-4">
                <form method="post" action="thank-you.php">
                     <div class="row">
                        <div class="form-group col-xs-12">
                            <p>Don't have an account with us?</p>
                        </div>
                    </div>
                    <div class="row">
                        <h2 class="col-xs-12">New User</h2>
                    </div>
                    <div class="row">
                        <div class="form-group col-xs-12">
                            <p>Creating an account makes it fast
                                and easy for checkout and when you
                                return to shop with us.</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-xs-12">
                            <label for="fname">First Name*</label>
                            <input type="text" class="form-control required" name="fname" id="fname" placeholder="First Name">
                         </div>
                     </div>
                     <div class="row">
                        <div class="form-group col-xs-12">
                            <label for="lname">Last Name*</label>
                            <input type="text" class="form-control required" name="lname" id="lname" placeholder="Last Name">
                         </div>
                     </div>
                    <div class="row">
                        <div class="form-group col-xs-12">
                            <label for="email">Email Address*</label>
                            <input type="text" class="form-control required" name="newemail" id="newuserEmail" placeholder="Email">
                         </div>
                         <span style="color:red;" id="errorNewEmail"></span>
                     </div>
                     <div class="row">
                        <div class="form-group col-xs-12">
                            <label for="password">Password*</label>
                            <input type="password" class="form-control required" name="newPassword" id="newPassword" placeholder="Password">
                         </div>
                         <span style="color:red;" id="errorNewPassword"></span>
                    </div>
                    <div class="row">
                        <div class="form-group col-xs-12">
                            <label for="confirmpassword">Confirm Password*</label>
                            <input type="password" class="form-control required" name="confirmPassword" id="confirmpassword" placeholder="Password">
                         </div>
                         <span style="color:red;" id="errorConfirm"></span>
                    </div>
                    <div class="row">
                        <div class="form-group col-xs-12">
                            <em>* Required Fields</em>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-xs-6">
                            <input type="submit" id="register" class="btn btn-default required" name="register" value="Register"/>
                        </div>
                    </div>
                </form>
            </div> 
        </div>
    </main>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script type="text/javascript">
//Check to make sure all required form fields are filled in.
//Found code structure at JQuery By Example --- http://www.jquerybyexample.net/2012/12/jquery-to-check-all-textboxes-empty.html
$(document).ready(function() {
    $('#register').click(function(e) {
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
                 "border": "1px solid #ff6600",
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
        var newemail = document.getElementById('newuserEmail').value;
        var newpassword = document.getElementById('newPassword').value;
        var confirm = document.getElementById('confirmpassword').value;


    //Check new email
    if(! emailReg.test(newemail)) {
            isValid = false;
            document.getElementById('errorNewEmail').innerHTML = 'Please type in correct email (i.e. john@gmail.com)';
        } else {
            document.getElementById('errorNewEmail').innerHTML = '';
        }

    //Check new password
    if(! passReg.test(newpassword)) {
            isValid = false;
            document.getElementById('errorNewPassword').innerHTML = 'Password must be between 4 - 8 characters with letters, numbers, or underscore';
        } else {
            document.getElementById('errorNewPassword').innerHTML = '';
        }
    //Check confirmation password
    if(confirm != newpassword) {
        isValid = false;
            document.getElementById('errorNewPassword').innerHTML = 'Password must match';
        } else {
            document.getElementById('errorNewPassword').innerHTML = '';
        }

    if (isValid == false) {
           e.preventDefault();
       } else { 
       }
    });
});      

</script>
<?php include 'footer.php'; ?>