<?php
include 'auth.inc.php';

if ($_SESSION['admin_level'] < 1) {
    header('Refresh: 5; URL=user_personal.php');
    echo '<p><strong></strong>You are not authorized for this page.</strong></p>';
    echo '<p>You are now being redirected to the main page. If your browser ' .
        'doesn\'t redirect you automatically, <a href="main.php">click ' .
        'here</a>.</p>';
    die();
}

include 'db.inc.php';

$db = mysql_connect(MYSQL_HOST, MYSQL_USER, MYSQL_PASSWORD) or 
    die ('Unable to connect. Check your connection parameters.');
mysql_select_db(MYSQL_DB, $db) or die(mysql_error($db));
?>
<html>
 <head>
  <title>Administration Area</title>
  <style type="text/css">
   th { background-color: #999;}
   .odd_row { background-color: #EEE; }
   .even_row { background-color: #FFF; }
  </style>
 </head>
 <body>
  <h1>Welcome to the Administration area.</h1>
  <p>Here you can view and manage other users.</p>
  <p><a href="main.php">Click here</a> to return to the home page.</p>
  <table style="width:70%">
   <tr><th>Username</th><th>First Name</th><th>Last Name</th></tr>
<?php
$query = 'SELECT
        u.customer_id, customer_email, customer_Fname, customer_Lname
    FROM
        customer ';
$result = mysql_query($query, $db) or die(mysql_error($db));

$odd = true;
while ($row = mysql_fetch_array($result)) {
    echo ($odd == true) ? '<tr class="odd_row">' : '<tr class="even_row">';
    $odd = !$odd; 
    echo '<td><a href="update_user.php?id=' .  $row['user_id']. '">' .
        $row['customer_email'] . '</a></td>';
    echo '<td>' . $row['customer_Fname'] . '</td>';
    echo '<td>' . $row['customer_Lname'] . '</td>';
    echo '</tr>';
}
mysql_free_result($result);
mysql_close($db);
?>
  </table>
 </body>
</html>