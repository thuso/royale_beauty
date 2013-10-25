<?php
    // Include MySQL class
    require_once('inc/mysql.class.php');
    // Include database connection
    require_once('inc/global.inc.php');
    // Include functions
    require_once('inc/functions.inc.php');
    //Include validations
    require_once('inc/Validation.php');

// Start the session
session_start();
$func =new functions();
$Uname=$_SESSION['user'];
$uid=$_SESSION['uid'];
if($Uname==NULL)
{
    header('Location:Login.php');
}
else
{
   $msg= "Enjoy your shopping $Uname";
   $logout="<p><a href='Logout.php'>logout</a></p>";
}
if(isset ($_POST['btnUpdate']))
{

    header('Location: delivery.php');
}
else if(isset($_POST['btnCon']))
{
    
    header('Location: invoice.php');
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<title>Shipment</title>
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
                    <h2>Shipment</h2>

                    <div class="text">
                     <?php
                     echo "<p align='right'>$msg</p>";
                        $query= "SELECT n.customer_Fname, n.customer_Lname, a.street_name, a.province, a.postal_code, a.house_number
                                FROM customer n, address a
                                WHERE n.customer_id = a.customer_id
                                AND n.customer_id =$uid";
                        $result = mysql_query($query);
                        $i=0;
                       
                       if(!$result)
                       {
                           echo "Did not select from the table";
                       }
                       ?><form method="POST" action="<?php  echo $_SERVER['PHP_SELF'] ?>">
                           <table>
                               <tr><td colspan="2" align="center" class="style9 ">Personal Information</td></tr>
                <?php
                        while ($num = mysql_fetch_array($result))
                        {
                            echo "<tr><td>Name</td><td><input type='text' name='clName' value='".$num['customer_Fname']."'disabled='disabled' style='border: thin solid #800000' /></td></tr>".
                            "<tr><td>Surname</td><td><input type='text' name='cfname' value='".$num['customer_Lname']."'disabled='disabled' style='border: thin solid #800000'/></td></tr>".
                            "<tr><td>Street Name</td><td><input type='text' name='stName' value='".$num['street_name']."' style='border: thin solid #800000'/></td></tr>".
                            "<tr><td>Province</td><td><input type='text' name='prov' value='".$num['province']."'style='border: thin solid #800000'/></td></tr>".
                            "<tr><td>Postal code</td><td><input type='text' name='post' value='".$num['postal_code']."'style='border: thin solid #800000'/></td></tr>".
                           "<tr><td>House Number</td><td><input type='text' name='hNum' value='".$num['house_number']."'style='border: thin solid #800000'/></td></tr>";
                          
                        }
                     ?>
                               <tr><td  align="Right"><input type="submit" value="Update" name="btnUpdate"/></td><td><input type="submit" value="Proceed" name="btnCon" /></td></tr>
                                </table>
                            </form>

               
                     <br />
                            <div class="read_right"><a href="#"></a></div>
                      </div>
                      <br />
                      <?php
                            $up=new functions();
                            if(isset ($_POST['btnUpdate']))
                            {
                                //if($up->update($street, $province, $post, $houseNumber, $id))
                               if($up->update($_POST['stName'],$_POST['prov'], $_POST['post'], $_POST['hNum'],$uid))
                               {

                                   echo 'Updated';
                                   
                               }
                                else
                                    {
                                           echo 'NOT';
                                }
                            }
                      
                      ?>

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

</body>
</html>
