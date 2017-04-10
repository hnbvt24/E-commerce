<?php include 'header.php'; ?>
<? require_once("connect_to_DB.php"); //inserts contents of this file here ?>
<!-- Main page info -->

    <? 
        connectDB();

        $sql = "SELECT * FROM Registered WHERE email = '" . $username . "'";
        
        $result = mysqli_query($db, $sql) or die("SQL error: " . mysqli_error());

        $row = mysqli_fetch_array($result);
    ?>

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
                <? 
                    connectDB();
                ?>
                	<div class="bWhite">
                		<div class="row">
                            <div class="col-sm-9">
                    			<div class="row">
                                    <h2>My Details</h2>
                                </div>
                				<form method="post" action="account.php">
                                <div class="col-sm-10 col-md-6">
                                    <div class="row">
                                        <h3>User Information</h3>
                                    </div>
                					<div class="row">
                                        <div class="form-group col-xs-12">
                                            <label for="fname">First Name*</label>
                                            <input type="text" class="form-control" name="fname" id="fname" value="<? print $row[1] ?>">
                                        </div>
                                     </div>
                                     <div class="row">
                                        <div class="form-group col-xs-12">
                                            <label for="lname">Last Name*</label>
                                            <input type="text" class="form-control" name="lname" id="lname" value="<? print $row[2] ?>">
                                        </div>
                                     </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-xs-4 top-buffer">
                                            <button type="submit" name="update" class="btn btn-default">Update</button>
                                        </div>
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