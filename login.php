<!-- This code structure was found at http://www.formget.com/login-form-in-php/ -->
<?
$error=''; //This variable stores the error message
if (isset($_REQUEST['login'])) {
	if(empty($_REQUEST['email']) || empty($_REQUEST['password'])) {
		$error = "Please enter in a valid Email or Password";
	} else {
		//Email and Password Defined
		$email=$_REQUEST['email'];
		$password=$_REQUEST['password'];
		//Establish connection with server
		require_once("connect_to_DB.php");
		//Open Connection
		connectDB();
		//Protect from MySQL Injection
		$email = stripslashes($email);
		$password = stripslashes($password);
		$email = mysqli_real_escape_string($db, $email);
		$password = mysqli_real_escape_string($db, $password);

		$sql = "SELECT * FROM registered WHERE email = '$email' AND password = '$password'";

        $result = mysqli_query($db, $sql) or die ("SQL error: " . mysqli_error());

        $row = mysqli_fetch_array($result);
        
if (($_REQUEST['password'] == $row['password']) and ($_REQUEST['email'] == $row['email'])) { 
        	$_SESSION['user']=$email;
        	header("location:account.php"); // Redirect to account page
        } else {
        	$error = "Please enter in a valid Email or Password";
        }
        mysqli_free_result($result);
        mysqli_close($db);
	}
} elseif (isset($_REQUEST['loginMember'])) {
	if(empty($_REQUEST['email']) || empty($_REQUEST['password'])) {
		$error = "Please enter in a valid Email or Password";
	} else {
		//Email and Password Defined
		$email=$_REQUEST['email'];
		$password=$_REQUEST['password'];
		//Establish connection with server
		require_once("connect_to_DB.php");
		//Open Connection
		connectDB();
		//Protect from MySQL Injection
		$email = stripslashes($email);
		$password = stripslashes($password);
		$email = mysqli_real_escape_string($db, $email);
		$password = mysqli_real_escape_string($db, $password);

		$sql = "SELECT * FROM registered WHERE email = '$email' AND password = '$password'";

        $result = mysqli_query($db, $sql) or die ("SQL error: " . mysqli_error());

        $row = mysqli_fetch_array($result);
        
if (($_REQUEST['password'] == $row['password']) and ($_REQUEST['email'] == $row['email'])) { 
        	$_SESSION['login_member']=$email;
        	header("location:shipping.php"); // Redirect to account page
        } else {
        	$error = "Please enter in a valid Email or Password";
        }
        mysqli_free_result($result);
        mysqli_close($db);
	}
} elseif (isset($_REQUEST['registerCustomer'])) {
	connectDB(); 
	$sqlnum = "SELECT registered_ID FROM registered WHERE registered_ID desc";
	$resultnum = mysqli_query($db, $sqlnum) or die ("SQL error: " . mysqli_error());
	$row = mysqli_fetch_array($result);
	$sql = "INSERT INTO registered (registered_ID, fname, lname, email, password) VALUES (" . $row[0] + 1 . ", '" . $_REQUEST["fname"] . "', '" . $_REQUEST["lname"] . "', '" . $REQUST["email"]. "', '" . $_REQUEST["password"] . "')";
	$result = mysqli_query($db, $sql) or die ("SQL error: " . mysqli_error());

	mysqli_free_result($resultnum);
	mysqli_free_result($result);
    mysqli_close($db);
}
?>