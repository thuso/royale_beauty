<?php
ob_start();
include_once 'config.php';
class User
{
//Database connect 
public function __construct() 
{
$db = new DB_Class();
}
//Registration process 
public function register_user($name, $username, $password, $email) 
{
//$password = md5($password);
$sql = mysql_query("SELECT uid from customer WHERE username = '$username'");
$no_rows = mysql_num_rows($sql);
if ($no_rows == 0) 
{
$result = mysql_query("INSERT INTO customer(customer_Fname,customer_Lname,customer_email,customer_password) values ('$username', '$name','$email','$password')") or die(mysql_error());
return $result;
}
else
{
return FALSE;
}
}
// Login process
public function check_login($emailusername, $password) 
{
//echo $emailusername." ".$password;
//$password = md5($password);
// email = '$emailusername' or
$result = mysql_query("SELECT uid from customers WHERE username= '$_POST[myusername]' and password = '$_POST[mypassword]'");
$user_data = mysql_fetch_array($result);
$no_rows = mysql_num_rows($result);
if ($no_rows == 1) 
{
$_SESSION['login'] = true;
$_SESSION['uid'] = $user_data['uid'];
//echo "TRUE";
header("Location: index.php");
//return TRUE;
}
else
{
//echo "falsely";
header("Location: login.php");
//return FALSE;
}
}
// Getting name
public function get_fullname($uid) 
{
$result = mysql_query("SELECT name FROM users WHERE uid = $uid");
$user_data = mysql_fetch_array($result);
echo $user_data['name'];
}
// Getting session 
public function get_session() 
{
return $_SESSION['login'];
}
// Logout 
public function user_logout() 
{
$_SESSION['login'] = FALSE;
session_destroy();
}

}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
</head>

<body>
</body>
</html>
