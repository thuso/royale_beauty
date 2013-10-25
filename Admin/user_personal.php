<?php
include 'auth.inc.php';
include 'config.php'


$db =mysql_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD) or 
die('Oops connection error -> ' . mysql_error());
mysql_select_db(DB_DATABASE, $db) 
or die('Database error -> ' . mysql_error());
?>
<html>
<head>
<title>Personal Information</title>
</head>
<body>
<h2>Welcome to your personal info area</h2>
<p>Here you can update your info,or delete your account</p>
<p>Your information as you curently have it is shown below.</p>
<p><a href="index.php">Click here</>to return to the home page.</p>
<?php
$query= 'SELECT
		username,first_name,last_name,city,state,email
		FROM
		site_user u JOIN
		site_user_info i ON u.user_id=i.user_id
		WHERE
		username ="' . mysql_real_escape_string($_SESSION
		['username'],$db) .'"';
$result = mysql_query($query, $db) or die(mysql_error($db));

$row = mysql_fetch_array($result);
extract($row);
mysql_free_result($result);
mysql_close($bd);		
?>
<ul>
<li>First Name: <?php echo $first_name; ?></li>
<li>Lat Name: <?php echo $last_name; ?></li>
<li>City: <?php echo $city; ?></li>
<li>State: <?php echo $state; ?></li>
<li>Email: <?php echo $email; ?></li>
</ul>
<p><a href="update_account.php">Update Account</a> |
<a href="delete_account.php">Delete Account</a></p>
</body>
</html>