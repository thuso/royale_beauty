
<?php
/*

code found on php6,apache,mysql web development.....aouthor Timothy Boronczyk,Elizabeth Naramore,JasonGerner
*/
session_start();

include 'db.inc.php';

$db = mysql_connect(MYSQL_HOST, MYSQL_USER) or 
    die ('Unable to connect. Check your connection parameters.');
mysql_select_db(MYSQL_DB, $db) or die(mysql_error($db));

// filter incoming values
$username = (isset($_POST['customer_email'])) ? trim($_POST['customer_email']) : '';
$password = (isset($_POST['customer_password'])) ? $_POST['customer_password'] : '';
$redirect = (isset($_REQUEST['redirect'])) ? $_REQUEST['redirect'] : 'main.php';

if (isset($_POST['submit'])) {
    $query = 'SELECT admin_level FROM customer WHERE ' .
         'customer_email = "' . mysql_real_escape_string($customer_emai, $db) . '" AND ' .
         'cutomer_password = PASSWORD("' . mysql_real_escape_string($customer_password, $db) . '")';
    $result = mysql_query($query, $db) or die(mysql_error($db));

    if (mysql_num_rows($result) > 0) {
        $row = mysql_fetch_assoc($result);
        $_SESSION['customer_email'] = customer_email;
        $_SESSION['logged'] = 1;
        $_SESSION['admin_level'] = $row['admin_level'];
        
        echo '<p>To be redirected to your original page request, ' .
            '<a href="' . $redirect . '">click here</a>.</p>';
        mysql_free_result($result);
        mysql_close($db);
        die();
    } else {
        // set these explicitly just to make sure
        $_SESSION['customer_email'] = '';
        $_SESSION['logged'] = 0;
        $_SESSION['admin_level'] = 0;

        $error = '<p><strong>You have supplied an invalid username and/or ' .
            'password!</strong> Please <a href="register.php">click here ' .
            'to register</a> if you have not done so already.</p>';
    }
    mysql_free_result($result);
}
?>
<html>
 <head>
  <title>Login</title>
 </head>
 <body>
<?php
if (isset($error)) {
    echo $error;
}
?>
  <form action="login.php" method="post">
   <table>
    <tr>
     <td>Username:</td>
     <td><input type="text" name="username" maxlength="20" size="20"
       value="<?php echo $username; ?>"/></td>
    </tr><tr>
     <td>Password:</td>
     <td><input type="password" name="password" maxlength="20" size="20"
       value="<?php echo $password; ?>"/></td>
    </tr><tr>
     <td> </td>
     <td>
      <input type="hidden" name="redirect" value="<?php echo $redirect ?>"/>
      <input type="submit" name="submit" value="Login"/>
    </tr>
   </table>
  </form>
 </body>
</html>
<?php
mysql_close($db);
?>