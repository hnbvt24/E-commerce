<?
session_start();
//This code structure was found at http://www.formget.com/login-form-in-php/

require_once("connect_to_DB.php");
connectDB();

// Storing Session
$email_check=$_SESSION['login_user'];
// SQL Query To Fetch Complete Information Of User
$session_sql = "SELECT email FROM registered WHERE email='$email_check'";
$session_result = mysqli_query($db, $session_sql) or die("SQL error: " . mysqli_error());
$row = mysql_fetch_array($session_result);

$login_session =$row['email'];
if(!isset($login_session)){
mysqli_free_result($session_result);
mysql_close($db); // Closing Connection
header('Location: sign-in.php'); // Redirecting To Home Page
}
?>