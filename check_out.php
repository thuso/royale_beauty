<?php
    // Include MySQL class
    require_once('inc/mysql.class.php');
    // Include database connection
    require_once('inc/global.inc.php');
    // Include functions
    require_once('inc/functions.inc.php');
    //Include validations
    require_once('inc/Validation.php');
require_once('inc/functions.inc.php');
// Start the session
session_start();
$func =new functions();
$Uname=$_SESSION['user'];
if($Uname==NULL)
{
    header('Location:Login.php');
}
else
{
   $msg= "Enjoy your shopping $Uname";
   $logout="<p><a href='Logout.php'>logout</a></p>";
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<title>Payment</title>
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
                      <?php echo $logout; ?>
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
                    <h2>Check Out</h2>
                    <div class="text">
                        <?php echo "<p align='right'>$msg</p>"; ?>
                    <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">

            <table border="3"> <tr><td>Select your payment option </td><td><select name="select">
                <option>Mastercard</option>
                <option>Visa</option>
                <option>Maestro</option>
                </select></td></tr>


                <tr><td>Enter Acc No</td><td>
                <label>
                              <input name="txtaccno" type="text" id="txtaccno"
                                    style="border: thin solid #800000" />
                </label></td></tr><br />
                        <td><?php echo $errors.' '; ?></td>
                 <tr><td>Enter Card No</td><td>
                <label>
                              <input name="txtcardno" type="text" id="txtcardno"
                                    style="border: thin solid #800000" />
                            </label>
                </td></tr>
                        <td><?php echo $errors.' '; ?></td>
                </table>
                

                <input type="submit" value="Check" name="btnCheck" />
            
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
                  Copyright &copy; 2012.Royal'e Beauty </div>
                <!-- footer ends -->
            </div>
            <div style="clear: both"></div>
        </div>
    </div>
</div>
    <?php
        if(isset($_POST['btnCheck']))
        {
            $accno=$_POST['txtaccno'];
            $cardno=$_POST['txtcardno'];
            //$paytype=$_POST['paytype'];
            $conn = mysql_connect("localhost","root","");

//checcking if the connection was made successfully
if(!$conn)
{
	die("An Error occured while connecting to the server.Please try again later");
}

//selecting the database
$db = mysql_select_db("royale_beauty",$conn);
//checking if the database exists
if(!$db)
{
	die("Connection to the database has failed");
}


                        $query="insert into payment values(null,'$accno','$cardno')";
                        $result = mysql_query($query);
                        //$i=0;

                       if(!$result)
                       {
                           echo "Did not insert into the table";
                       }
                        //while ($num = mysql_fetch_array($result))
                        //{
                           // echo "Name :\t".$num['customer_Fname']." <br />Surname :\t".$num['customer_Lname']." <br />Street name :\t".$num['street_name']." <br />Province :\t".$num['province']." <br />House number :\t".$num['house_number'];
                           // $i++;
                        //}
                       $results = mysql_query($query,$conn);
                     ?>


            ?><script type="text/javascript">  //alert("Invalid info");
                        window.location='delivery.php';</script><?php
        }
        ?>
</body>
</html>
