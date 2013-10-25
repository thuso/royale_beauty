<?php
include_once 'include/functions.php';
$user = new User();
// Checking for user logged in or not
if ($user->get_session())
{
header("location:index.php");
}

if ($_SERVER["REQUEST_METHOD"] == "POST") 
{
$register = $user->register_user($_POST['name'], $_POST['username'], $_POST['password'], $_POST['email']);
if ($register) 
{
// Registration Success
$msg = 'Registration successful <a href="login.php">Click here</a> to login';
} else 
{
// Registration Failed
$msg = 'Registration failed. Email or Username already exits please try again';
}
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<title>Register</title>
<meta name="keywords" content="" />
<meta name="description" content="" />
<link href="styles.css" rel="stylesheet" type="text/css" />

<style type="text/css">
<!--
.style10 {color: #FF0000}
.style11 {font-size: 12px}
-->
</style>
</head>
<body>


<div id="futer">
    <div id="menu">
    	<div id="left_bg">
            <div id="main">
              <div id="left">
                    <h1>Catalog</h1>
                    <ul class="munth">
                        <li><a href="catalogue.php?action=Face" class="wite">Face</a></li>
                      <li><a href="catalogue.php?action=Per" class="wite">Perfumes</a></li>
                      <li><a href="catalogue.php?action=Cologne" class="wite">Cologne</a></li>
                      <li><a href="catalogue.php?action=Skin" class="wite">Skin care </a> </li>
                      <li><a href="catalogue.php?action=Nails" class="wite">Nails</a></li>
                      <li><a href="catalogue.php?action=Hand" class="wite">Hand products </a></li>
                      <li><a href="catalogue.php?action=Foot" class="wite">Foot products </a></li>
                      <li><a href="catalogue.php?action=Family" class="wite">Family care</a></li>
                       <li><a href="catalogue.php?action=Ladies" class="wite">Ladies</a></li>
                    </ul>
                    <br />
                    <div class="left_razd"></div>
                    <h3><br />
                      <span class="wite">Payment Options</span></h3>
                    <ul class="munth">
                      <li class="style4"><a href="payment info/credit.html">Payment via credit card</a></li>
                      <li class="style4"><a href="payment info/eft.html" class="wite style7">Payment via EFT</a> </li>
                      <li class="style4"> <a href="payment info/cash.html" class="wite style7">Payment via cash deposit </a></li>
                      <li class="style4"> <a href="payment info/cheque.html">Payment via cheque </a></li>
                      <li class="style4"><a href="payment info/phone.html">Place order by phone</a></li>
                      <li class="style4"> <a href="payment info/delivery.html" class="wite style7">Order and delivery process </a></li>
                      <li class="style4"> <a href="payment info/placing_order.html" class="wite style7">Need help placing your order?</a><br />
                      </li>
                    </ul>
                    <div class="left_razd"></div>
                    <p><br />
                      <br />
                </p>
              </div>
                <div id="right">
                    <div id="header">
                        <div id="top">
                          <div align="left">Royal'e Beauty </div>
                        </div>
                        <div id="buttons">
                          <div align="left">
                        <ul>
                          <li><a href="index.php"  title="">Home</a></li>
                          <li><a href="Login.php" title="">Login</a></li>
                          <li><a href="Register.php" title="">Register</a></li>
                           <li><a href="about.html" title="">About Us</a></li>
                          <li><a href="shopping_cart.php" title="">Shopping Cart </a></li>

                        </ul>
                          </div>
                        </div>
                    </div>
                    <div id="right_content">
                    <h2 align="left">Register new user </h2>
                    <div class="text">
                       <form id="form1" method="post" action="">
                         <div align="left">
                           <p>&nbsp;</p>
                           <table width="368" border="1" bordercolor="#000000" bgcolor="#FF0000">
                             <tr>
                               <td width="163">Full Name </td>
                               <td width="189"><label>
                                 <input name="name" type="text" id="name" />
                               </label></td>
                             </tr>
                             <tr>
                               <td>Username</td>
                               <td><input name="username" type="text" id="username" /></td>
                             </tr>
                             <tr>
                               <td>Password</td>
                               <td><input name="password" type="text" id="password" /></td>
                             </tr>
                             <tr>
                               <td>Email</td>
                               <td><p>
                                 <input name="email" type="text" id="email" />
                               </p>
							   <p><?php echo $msg;?></p>
                                 <p>&nbsp; </p></td>
                             </tr>
                             <tr>
                               <td>&nbsp;</td>
                               <td><label>
                                 <input type="submit" name="Submit" value="Register" />
                               </label></td>
                             </tr>
                           </table>
                           <p>&nbsp;</p>
                         </div>
                      </form>
                
                      <p align="left"><br />
                      </p>
                      <div class="read_right"></div>
                      </div>
                      <div align="left"><br />
  

                      </div>
                    </div>
                </div>
                <div align="left">
                    <!-- content ends -->
                      <!-- footer begins -->
                </div>
                <!-- footer ends -->
            </div>
            <div style="clear: both"></div>
        </div>
    </div>
</div>

</body>
</html>
