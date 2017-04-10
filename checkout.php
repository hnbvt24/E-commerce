<? ob_start(); ?>
<?php include 'header.php'; ?>
<? include 'login-account.php'; ?>
<? require_once("connect_to_DB.php"); //inserts contents of this file here ?>
<? if((isset($_SESSION['user'])) || (isset($_SESSION['login_member']))){
    
    header("location: shipping.php");
} else { ?>

<!-- Main page info -->
    <main>
    	<div class="bWhite row block">
	    	<!--If checkout is clicked, we go to see if you want to checkout as a guest or with your account, then if that is submitted you go to shipping form, else if shipping form is submitted we go to payment form, else if payment form is submitted we go to the confirmation page.-->
            <div class="row">
                <div class="col-sm-offset-2 col-sm-4">
        	    	<form id="firstCheckout" method="post" action="shipping.php"><!--Add option of going to sign in page for creating an account if register is selected-->
                        <div class="row">
                            <h2>Sign In</h2>
                        </div>
                        <div class="row">
                            <div class="form-group top-buffer col-sm-10">
                                    <input id="guest" type="radio" name="user" checked="checked" value="guest">
                                    <label for="guest">Checkout As Guest</label>
                            </div>
                        </div>
                         <div class="row">
                            <div class="form-group col-sm-10">
                                    <input id="register" type="radio" name="user" value="register">
                                    <label for="register">Register</label>
                            </div>
                        </div>
                        <div class="row top-buffer">
                        	<input type="submit" name="guest_submit" class="btn btn-default" value="Continue"/>
        				</div>
        			</form>
                </div>
                <div class="col-sm-4">
                    <form id="secondCheckout" method="post" action="checkout.php">
                        <div class="row">
                            <h2>Sign In</h2>
                        </div>
                        <div class="row">
                            <div class="form-group top-buffer col-sm-12">
                                <label for="email">Email</label>
                                <input type="text" class="form-control required" id="email" name="email" placeholder="name@gmail.com">
                             </div>
                         </div>
                         <div class="row">
                            <div class="form-group col-sm-12">
                                <label for="password">Password</label>
                                <input type="password" class="form-control required" id="password" name="password" placeholder="Password">
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-sm-12">
                                <a href="#">Forgot your password?</a>
                            </div>
                        </div>
                        <div class="row top-buffer">
                            <input type="submit" id="loginMember" name="loginMember" class="btn btn-default" value="Login" />
                        </div>
                    </form>
                    <div class="row col-sm-12">
                        <?php echo $error; ?>
                    </div>
                </div>
            </div>
	    </div>
    </main>
    <? } ?>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script type="text/javascript">
    $(document).ready(function () {
        $('#guest').click(function(){
           $('#firstCheckout').attr('action', 'shipping.php');
        });
        $('#register').click(function(){
           $('#firstCheckout').attr('action', 'register.php');
        });
    });
</script>
<?php include 'footer.php'; ?>