<?php
// Include MySQL class
require_once('inc/mysql.class.php');
// Include database connection
require_once('inc/global.inc.php');
// Include functions
require_once('inc/functions.inc.php');
//Include validations
require_once ('inc/Validation.php');
session_start();
$func =new functions();
$val = new Validation();
$func =new functions();
$Uname=$_SESSION['user'];
$uid=$_SESSION['uid'];
if(!$Uname==NULL)
{
    header('Location:index.php');
}


?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<title>Login</title>
<meta name="keywords" content="" />
<meta name="description" content="" />
<link href="styles.css" rel="stylesheet" type="text/css" />

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
                      <span class="wite">Payment Options </span></h3>
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
                    <h3><br />
                </h3>
              </div>
                <div id="right">
                    <div id="header">
                        <div id="top">Royal'e Beauty </div>
                        <div id="buttons">
                        <ul>
                          <li><a href="index.php"  title="">Home</a></li>
                          <li><a href="Login.php" title="">Login</a></li>
                          <li><a href="Register.php" title="">Register</a></li>
                           <li><a href="about.html" title="">About Us</a></li>
                          <li><a href="shopping_cart.php" title="">Shopping Cart </a></li>

                        </ul>
                        </div>
                    </div>
                    <div id="right_content">
                    <h2>Login</h2>
                    <div class="text">
                      <form id="form1" method="post" action="">
                        <table width="200" border="1">
                          <tr>
                            <td>Email</td>
                            <td><label>
                              <input name="txtEmail" type="text" id="txtEmail" 
                                    style="border: thin solid #800000" />
                            </label></td>
                          </tr>
                          <tr>
                            <td>Password</td>
                            <td><label>
                              <input name="txtPassword" type="password" id="txtPassword"
                                    style="border: thin solid #800000" />
                            </label></td>
                          </tr>
                          <tr>
                            <td colspan="2"><div align="center">
                              <label>
                              <input name="btnLogin" type="submit" id="btnLogin" value="Login" />
                              </label>
                            </div></td>
                          </tr>
                            
                        </table>
                      </form>
                      
                      <br />
                            <div class="read_right"><a href="#"></a></div>
                      </div>
                      <br />
                      
                      
                    </div>
                </div>
                <!-- content ends -->
                    <!-- footer begins -->
              <div id="footer">
                  Copyright &copy; 2013.Royal'e Beauty </div>
                <!-- footer ends -->
            </div>
            <div style="clear: both"></div>
        </div>
    </div>
</div>
<?php
        if(isset($_POST['btnLogin']))
        {
			$query = 'SELECT admin_level FROM site_user WHERE' .
				'username = "' . mysql_real_escape_string($username,$db)
				. '" AND ' .
				'password = PASSWORD ("'. mysql_real_escape_string($password,$db) . '")';
            $email=$_POST['txtEmail'];
            $psw=$_POST['txtPassword'];
            if($val->validateEmail($email)==true)
            {
                 if($func->login($email,$psw)==true)
                {
					$row=mysql_fetch_assoc($result);
                    $_SESSION['user']=$func->getName();
                    $_SESSION['uid']=$func->getid();
					$_SESSION['admin_level']=$row['admin_level'];

                    ?>
                            <script type="text/javascript">  alert("log in successfull");
                            window.location='catalogue.php';</script><?php
                }else {
                            ?> <script type="text/javascript">  alert("Invalid login");
                            window.location='Login.php';</script><?php
							$_SESSION['admin_level'];
                }
           }
           elseif($val->validateEmail($email)==false)
           {
              echo '<h3>* Incorrect e-mail address</h3>';
           }
		 }

?>
</body>
</html>
