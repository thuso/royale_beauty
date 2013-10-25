<?php
require_once('inc/functions.inc.php');
session_start();
$func =new functions();
$Uname=$_SESSION['user'];
if($Uname==NULL)
{
    $msg='Please <a href="Login.php">login</a>';
}
else {
    $msg= "Enjoy your shopping $Uname";
}
if($_SESSION['admin_level'] > 0){
	echo '<p><a href="admin_area.php">Click here</a> to access your ' . 'administrator tools.</p>';
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<title>Home</title>
<meta name="keywords" content="" />
<meta name="description" content="" />
<link href="styles.css" rel="stylesheet" type="text/css" />
<style type="text/css">
<!--
.style4 {font-size: 10px}
.style7 {color: #711419}
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
                    <h3>&nbsp;</h3>
                    <h3><span class="wite">Payment Options </span></h3>
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
                <br />
                <br />
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
                    <h2>Amazing new deals </h2>
                    <div class="text">
                        <?php echo "<p align='Right'>$msg</p>";?>
                            <img src="catalog/600491401750.jpg"  width="168" height="113" class="img" alt="Red door" />
                            <span>Elizabeth Anne Red door </span> <br />
                            <p>The same classic fragrance, with a new signature look. A melange of rich,  rare florals.</p>
                            <p>Glamorous. Elegant.  Sophisticated. An elegant floral bouquet of deep, rich florals. A warm, full,  inviting blend of sensuous notes. It's captivating, sophisticated scent fills  the senses and creates a signature for the woman who wears it.</p>
                            <p>&nbsp;</p>
                            <p><br />
                            </p>
                            <div class="read_right"><a href="catalogue.php">catalogue </a></div>
                      </div>
                      <div class="text"><img src="catalog/dkny be delicious.jpg" width="168" height="113" class="img" alt="DKNY Be Delicious" />
                            <span>DKNY Be delicious </span> <br />
                            <p>Luminous notes of juicy green apple, lush blood orange and mandarin set off  sparks. Igniting a daring floralcy, Belle de Nuit explodes like a firework in  the night sky. Red peony, pimento blossom, Petalia™ and Georgywood™ give a  floral woody depth. At the back, a smoldering blend of amber, white patchouli,  tonka crystals, sandalwood and Cosmone™ makes the skin exude a sensuous,  alluring warmth.</p>
                            <p>&nbsp;</p>
                            <p>&nbsp;</p>
                            <br />
                            <div class="read_right"><a href="catalogue.php">catalogue </a></div>
                      </div>
                      <div class="text">
                            <img src="catalog/lower_serum_bottom.jpg" width="168" height="113" class="img" alt="Avon Makeup" />
                            <span>Avon Makeup Kit </span> <br />
                            A rich blend of moisture, foundation and powder formulated into an  all-in-one creamy satin-smooth base.
                            <p>A  lightly pressed pigmented face powder. </p> 
                            <p>Lightly pressed, pigmented powder, with added shimmer. Glides on for  soft, easy application.</p>
                            <p>A stick concealer to cover blemishes, pimples and scars, as well as  disguise dark shadows under the eyes. <br />
                            </p>
                            <div class="read_right"><a href="catalogue.php">catalogue </a></div>
                      </div><br />
                      
                      
                    </div>
                </div>
              
              <div id="footer">
                  Copyright &copy; 2013.Royal'e Beauty </div>
               
            </div>
            <div style="clear: both"></div>
        </div>
    </div>
</div>

</body>
</html>
