<?php
// Include MySQL class
require_once('inc/mysql.class.php');
// Include database connection
require_once('inc/global.inc.php');
// Include functions
require_once('inc/functions.inc.php');
// Start the session
session_start();
// Process actions

$cart = $_SESSION['cart'];
$action = $_GET['action'];
$func =new functions();

$func =new functions();
$Uname=$_SESSION['user'];
$uid=$_SESSION['uid'];
if($Uname==NULL)
{
    $msg='Please <a href="Login.php">login</a>';
}
else {
    $msg= "Enjoy your shopping $Uname";
     $logout="<p><a href='Logout.php'>logout</a></p>";
}
switch ($action) {
	case 'add':
		if ($cart) {
			$cart .= ','.$_GET['id'];
		} else {
			$cart = $_GET['id'];
		}
		break;
	case 'delete':
		if ($cart) {
			$items = explode(',',$cart);
			$newcart = '';
			foreach ($items as $item) {
				if ($_GET['id'] != $item) {
					if ($newcart != '') {
						$newcart .= ','.$item;
					} else {
						$newcart = $item;
					}
				}
			}
			$cart = $newcart;
		}
		break;
	case 'update':
	if ($cart) {
		$newcart = '';
		foreach ($_POST as $key=>$value) {
			if (stristr($key,'qty')) {
				$id = str_replace('qty','',$key);
				$items = ($newcart != '') ? explode(',',$newcart) : explode(',',$cart);
				$newcart = '';
				foreach ($items as $item) {
					if ($id != $item) {
						if ($newcart != '') {
							$newcart .= ','.$item;
						} else {
							$newcart = $item;
						}
					}
				}
				for ($i=1;$i<=$value;$i++) {
					if ($newcart != '') {
						$newcart .= ','.$id;
					} else {
						$newcart = $id;
					}
				}
			}
		}
	}
	$cart = $newcart;
	break;
}
$_SESSION['cart'] = $cart;
 $ref=$func->generateRefference();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<title>Confirm Cart</title>
<meta name="keywords" content="" />
<meta name="description" content="" />
<link href="styles.css" rel="stylesheet" type="text/css" />
<style type="text/css">
<!--
.style4 {font-size: 10px}
.style7 {color: #711419}
.style8 {font-weight: bold}
.style9 {font-size: 10px; font-weight: bold; }
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
                      <span class="wite">Payment Options </span></h3>
                    <h3><ul class="munth">
                      <li class="style4"><span class="style8"><a href="payment info/credit.html">Payment via credit card</a></span></li>
                      <li class="style9"><a href="payment info/eft.html" class="wite style7">Payment via EFT</a> </li>
                      <li class="style9"> <a href="payment info/cash.html" class="wite style7">Payment via cash deposit </a></li>
                      <li class="style9"> <a href="payment info/cheque.html">Payment via cheque </a></li>
                      <li class="style9"><a href="payment info/phone.html">Place order by phone</a></li>
                      <li class="style9"> <a href="payment info/delivery.html" class="wite style7">Order and delivery process </a></li>
                      <li class="style4"> <strong><a href="payment info/placing_order.html" class="wite style7">Need help placing your order?</a></strong><br />
  </li>
                      </ul>
  </h3>
                    <div class="left_razd"></div>
                     <?php echo $logout="<p><a href='Logout.php'>logout</a></p>"?>
                    <h3><br />
                </h3>
              </div>
                <div id="right">
                    <div id="header">
                        <div id="top">Royal'e Beauty </div>
                        <div id="buttons">
                        <ul>
                        <ul>
                          <li><a href="index.php"  title="">Home</a></li>
                          <li><a href="Login.php" title="">Login</a></li>
                          <li><a href="Register.php" title="">Register</a></li>
                           <li><a href="about.html" title="">About Us</a></li>
                          <li><a href="shopping_cart.php" title="">Shopping Cart </a></li>

                        </ul>
                        </ul>
                        </div>
                    </div>
                    <div id="right_content">
                    <h2>Your shopping cart</h2>

               <div class="text">
                <?php
                echo "<p align='Right'>$msg</p>";
                    echo $func->writeShoppingCart();
                ?>
                </div>
                    <div class="text">
                        <?php

                        echo $func->showCartFinal();

                        ?>
                   </div>
                   <div class="text">
                       <form action="OrderConfirmed.php" method="POST">
                           <input type="submit" value="Confirm order" name="btnConf" />
                       </form>
                   </div>
                    <?php
                    
                    if(isset ($_POST['btnConf']))
                    {
                        
                       
                        if($func->putOrder($uid, $order_quantity,$_GET['id'],$ref)==true)
                        {

                            echo 'Ordered';
                        }
                        else {
                            echo 'not Ordered';
                        }
                    }
                    ?>
                </div>
                </div>
                <!-- content ends -->
                    <!-- footer begins -->
              <div id="footer">
                  Copyright &copy; 2012.Royal'e Beauty </div>
                <!-- footer ends -->
            </div>
            <div style="clear: both"></div>
        </div>
    </div>
</div>

</body>
</html>

