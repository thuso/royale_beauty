<?php
include 'auth.inc.php';
include 'db.inc.php';

$db = mysql_connect(MYSQL_HOST, MYSQL_USER,) or 
    die ('Unable to connect. Check your connection parameters.');
mysql_select_db(MYSQL_DB, $db) or die(mysql_error($db));


if (isset($_POST['submit']) && $_POST['submit'] == 'Update') {
    // filter incoming values
    $username = (isset($_POST['customer_email'])) ? trim($_POST['customer_email']) : '';
    $user_id = (isset($_POST['customer_Fname'])) ? $_POST['customer_Fname'] : '';
    $first_name = (isset($_POST['customer_Lnamee'])) ? trim($_POST['customer_Lname']) : '';
    
    $errors = array();
    
    // make sure the username and user_id is a valid pair (we don't want people to
    // try and manipulate the form to hack someone else's account!)
    $query = 'SELECT customer_email FROM customer WHERE customer_id = ' . (int)$user_id . 
       ' AND customer_email = "' . mysql_real_escape_string($_SESSION['customer_email'], $db) . 
       '"';
    $result = mysql_query($query, $db) or die(mysql_error());

    if (mysql_num_rows($result) == 0) {
?>
<html>
 <head>
  <title>Update Account Info</title>
 </head>
 <body>
  <p><strong>Don't try to break out form!</strong></p>
 </body>
</html>
<?php
        mysql_free_result($result);
        mysql_close_db($db);
        die();
    }
    mysql_free_result($result);


    if (empty($first_name)) {
        $errors[] = 'First name cannot be blank.';
    }
    if (empty($last_name)) {
        $errors[] = 'Last name cannot be blank.';
    }
    if (empty($email)) {
        $errors[] = 'Email address cannot be blank.';
    }

    if (count($errors) > 0) {
        echo '<p><strong style="color:#FF000;">Unable to update your ' . 
            'account information.</strong></p>';
        echo '<p>Please fix the following:</p>';
        echo '<ul>';
        foreach ($errors as $error) {
            echo '<li>' . $error . '</li>';
        }
        echo '</ul>';
    } else {
        // No errors so enter the information into the database.

        $query = 'UPDATE site_user_info SET
            customer_Fname = "' . mysql_real_escape_string($fcustomer_Fname, $db) . '",
            customer_Lname = "' . mysql_real_escape_string($customer_Lname, $db) . '",
           customer_email = "' . mysql_real_escape_string($customer_email , $db) . '",

          WHERE
           customer_id = ' . $customer_id;
        mysql_query($query, $db) or die(mysql_error());
        mysql_close($db);
?>
<html>
 <head>
  <title>Update Account Info</title>
 </head>
 <body>
  <p><strong>Your account information has been updated.</strong></p>
  <p><a href="user_personal.php">Click here</a> to return to your account.</a></p>
 </body>
</html>
<?php
        die();
 
  mysql_close($db);   }
}
?>
<html>
 <head>
  <title>Update Account Info</title>
  <style type="text/css">
   td { vertical-align: top; }
  </style>
  <script type="text/javascript">
   window.onload = function() {
       document.getElementById('cancel').onclick = goBack;
   }
   function goBack() {
       history.go(-1);
   }
  </script>
 </head>
 <body>
  <h1>Update Account Information</h1>
  <form action="update_account.php" method="post">
   <table>
    <tr>
     <td>Username:</td>
     <td><input type="text" value="<?php echo $_SESSION['username']; ?>"
        disabled="disabled"/></td>
    </tr><tr>
     <td><label for="email">Email:</label></td>
     <td><input type="text" name="email" id="email" size="20" maxlength="50"
       value="<?php echo $email; ?>"/></td>
    </tr><tr>
     <td><label for="first_name">First name:</label></td>
     <td><input type="text" name="first_name" id="first_name" size="20"
       maxlength="20" value="<?php echo $first_name; ?>"/></td>
    </tr><tr>
     <td><label for="last_name">Last name:</label></td>
     <td><input type="text" name="last_name" id="last_name" size="20"
       maxlength="20" value="<?php echo $last_name; ?>"/></td>
    </tr><tr>
     <td><label for="city">City:</label></td>
     <td><input type="text" name="city" id="city" size="20" maxlength="20"
       value="<?php echo $city; ?>"/></td>
    </tr><tr>
     <td><label for="state">State:</label></td>
     <td><input type="text" name="state" id="state" size="2" maxlength="2"
       value="<?php echo $state; ?>"/></td>
    </tr><tr>
     <td><label for="hobbies">Hobbies/Interests:</label></td>
     <td><select name="hobbies[]" id="hobbies" multiple="multiple">
<?php
foreach ($hobbies_list as $hobby)
{
    if (in_array($hobby, $hobbies)) {
        echo '<option value="' . $hobby . '" selected="selected">' . $hobby .
            '</option>';
    } else {
        echo '<option value="' . $hobby . '">' . $hobby . '</option>';
    } 
}
?>
      </select></td>
    </tr><tr>
     <td> </td>
     <td>
      <input type="hidden" name="user_id" value="<?php echo $user_id;?>"/>
      <input type="submit" name="submit" value="Update"/> 
      <input type="button" id="cancel" value="Cancel"/>
    </tr>
   </table>
  </form>
 </body>
</html>