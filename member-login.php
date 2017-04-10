<? ob_start(); ?>
<!-- This code structure was found at http://www.formget.com/login-form-in-php/ -->
<?
$error=''; //This variable stores the error message
if (isset($_REQUEST['login_member'])) {
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
        	header("location:home.php"); // Redirect to account page
        } else {
        	$error = "Please enter in a valid Email or Password";
        }
        mysqli_free_result($result);
        mysqli_close($db);
	}
} elseif (isset($_REQUEST['login_member'])) {
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
        	header("location:home.php"); // Redirect to account page
        } else {
        	$error = "Please enter in a valid Email or Password";
        }
        mysqli_free_result($result);
        mysqli_close($db);
	}
}
?>