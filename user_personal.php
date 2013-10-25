<?php
/*

code found on php6,apache,mysql web development.....aouthor Timothy Boronczyk,Elizabeth Naramore,JasonGerner
*/
include 'auth.inc.php';
include 'db.inc.php';

$db = mysql_connect(MYSQL_HOST, MYSQL_USER) or 
    die ('Unable to connect. Check your connection parameters.');
mysql_select_db(MYSQL_DB, $db) or die(mysql_error($db));
?>
<html>
 <head>
  <title>Personal Info</title>
 </head>
 <body>
  <h1>Welcome to your personal information area.</h1>
  <p>Here you can update your personal information, or delete your account.</p>
  <p>Your information as you currently have it is shown below.</p>
  <p><a href="main.php">Click here</a> to return to the home page.</p>
<?php
$query = 'SELECT
       customer_email, customer_Fname, customer_Lname, 
    FROM
       customer u JOIN
        customer i ON u.user_id = i.customer_id
    WHERE
        customer_email = "' . mysql_real_escape_string($_SESSION['customer_email'], $db) . '"';
$result = mysql_query($query, $db) or die(mysql_error($db));

$row = mysql_fetch_array($result);
extract($row);
mysql_free_result($result);
mysql_close($db);
?>
  <ul>
   <li>First Name: <?php echo $first_name; ?></li>
   <li>Last Name: <?php echo $last_name; ?></li>
   <li>City: <?php echo $city; ?></li>
   <li>State: <?php echo $state; ?></li>
   <li>Email: <?php echo $email; ?></li>
   <li>Hobbies/Interests: <?php echo $hobbies; ?></li>
  </ul>
  <p><a href="update_account.php">Update Account</a> | 
   <a href="delete_account.php">Delete Account</a></p>
 </body>
</html>