<?php include 'header.php'; ?>
<? require_once("connect_to_DB.php"); //inserts contents of this file here ?>
<!-- Main page info -->
    <main>
        <div class="account row">
            <div class="col-sm-offset-1 col-sm-10 col-xs-12">
                <div class="col-xs-9">
                    <h3>Account Home</h3>
                </div>
                <div class="col-xs-3">
                    <a href="sign-in.php">Logout</a>
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


    	<div class="bWhite">
    		<div class="row block">
    			<div class="col-sm-10">
    				<form method="post" action="account.php">
                        <div class="row">
                            <h2>Change Password</h2>
                        </div>
                        <div class="row">
        					<div class="form-group col-sm-6">
    	    					<label for="newpassword">New Password</label>
    	                        <input type="text" name="newpassword" class="form-control" id="newpassword">
                         	    <span style="color:red;" id="errorNewPassword"></span>
                            </div>
                        </div>
                        <div class="row">
                         	<div class="form-group col-sm-6">
    	    					<label for="confirmpassword">Confirm Password</label>
    	                        <input type="text" name="confirmpassword" class="form-control" id="confirmpassword">
                         	    <span style="color:red;" id="errorConfirm"></span>
                            </div>
                         </div>
                    	<div class="form-group top-buffer col-sm-4">
                        	<input type="submit" id="updatePass" name="updatePass" class="btn btn-default" value="Update Password"/>
                     	</div>
    				</form>
    			</div>
    		</div>
    	</div>
    </main>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script type="text/javascript">
//Check to make sure all required form fields are filled in.
//Found code structure at JQuery By Example --- http://www.jquerybyexample.net/2012/12/jquery-to-check-all-textboxes-empty.html
$(document).ready(function() {
    $('#updatePass').click(function(e) {
      var isValid = true;
        
    //Check new password
        if($('#newpassword').val() == '') {
            isValid = false;
            document.getElementById('errorNewPassword').innerHTML = "Please enter a New Password";
        } else {
            document.getElementById('errorNewPassword').innerHTML = "";
        } 
    //Check confirm password
        if($('#confirmpassword').val() == '') {
            isValid = false;
            document.getElementById('errorNewPassword').innerHTML = "Please enter a New Password";
        } else {
            document.getElementById('errorNewPassword').innerHTML = "";
        } 
      
    // Reg Expressions to validate the form inputs
        var passReg = /^[a-zA-Z]\w{3,14}$/;
        //must contain at least 4 characters and no more than 15 characters and no characters other than letters, numbers and the underscore may be used
        var newpassword = document.getElementById('newpassword').value;
        var confirm = document.getElementById('confirmpassword').value;

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