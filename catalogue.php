<?php
// Include MySQL class
require_once('inc/mysql.class.php');
// Include database connection
require_once('inc/global.inc.php');
// Include functions
require_once('inc/functions.inc.php');
// Start the session
session_start();
$func =new functions();
$Uname=$_SESSION['user'];
if($Uname==NULL)
{
    $msg='Please <a href="Login.php">login</a>';
}
else
{
   $msg= "Enjoy your shopping $Uname";
   $logout="<p><a href='Logout.php'>logout</a></p>";
}
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<title>Catalogue</title>
<meta name="keywords" content="" />
<meta name="description" content="" />
<link href="styles.css" rel="stylesheet" type="text/css" />
<style type="text/css">
<!--
.style4 {font-size: 10px}
.style7 {color: #711417}
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
                    <a href="catalogue.php"><br />
                    </a>
                    <div class="left_razd"></div>
                    <br />
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
                     <?php echo $logout; ?>
                    <h3></h3>
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
                    <h2>Available Products</h2>
               <div class="text">

<?php
echo "<p align='Right'>$msg</p>";
echo $func->writeShoppingCart();
?>


					 </div>
                    <div class="text">
             <?php
             
                $type=$_GET['action'];
                if($type==null)
                {
                    
                    $sql = 'SELECT * FROM Product ORDER BY Product_Id desc';
                    $result = $db->query($sql);
                    $output[] = '<table border=2><tr>';
                    $c=0;

                    while ($row = $result->fetch())
                    {
                        if (($i > 0) && ($i % 4 == 0))
                        {
                             $output[] = "</tr><tr>";
                        }
                        $output[] = '<td><p><img src="catalog/'.$row['Product_Image'].'" width="150" height="150" alt=""/></p><p>"'.$row['Product_Name'].'"</p><p>'.$row['Product_Type'].'</p><p> R'.$row['Product_Price'].'</p><p><a href="shopping_cart.php?action=add&id='.$row['Product_Id'].'">Add to cart</a></p>';
                        $i++;
                    }

                    }
                    else
                    {
                            $sql = 'SELECT * FROM Product where Product_Type like "%'.$type.'%"';
                            $result = $db->query($sql);
                            $output[] = '<table border=2><tr>';
                            $c=0;

                        while ($row = $result->fetch())
                        {
                            if (($i > 0) && ($i % 4 == 0))
                            {
                                $output[] = "</tr><tr>";
                            }
                                $output[] = '<td><p><img src="catalog/'.$row['Product_Image'].'" width="150" height="150" alt=""/></p><p>"'.$row['Product_Name'].'"</p><p>'.$row['Product_Type'].'</p><p> R'.$row['Product_Price'].'</p><p><a href="shopping_cart.php?action=add&id='.$row['Product_Id'].'">Add to cart</a></p>';
                             $i++;
                      }
                    }


                    $output[] = '</tr></table>';
                    echo join('',$output);
?>
                      <br />

                    </div>

                    <div class="text">
            
                   
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
</div>
</body>
</html>
