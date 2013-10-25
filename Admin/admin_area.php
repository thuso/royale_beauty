<?php
include 'auth.inc.php';

if ($_SESSION['admin_level']<1){
header('Refresh: 5;URL=user_personal.php');
echo'<p><strong></strong>You are not authorised for this page.
	</strong></p>';
	echo'<p>You are now being redirected to the main page.
		If your browser'.
		'doesn\'t redirect you automatically, <a href="index.php">click'.
		'here</a>.</p>';
		die();
}
include 'config.php';

$db =mysql_connect (MYSQL_HOST, MYSQL_USER,MYSQL_PASSWORD) or
	die ('Unable to connect. Check your connection parameters.');
	mysql_select_db(MYSQL_DB,$db) or die(mysql_error($db));		
?>
<html>
<head>
<title>Administrative Area</title>
<style type="text/css">
	th{ bakground-color:#999;}
	.odd_row{bakground-color:#EEE;}
	.eve.{ bakground-color: #FFF;}
</style>
</head>
</body>
<h2>Welcome to the Administrative Area.</h2>
<p>Here you can view and manage other users</p>
<p><a href="login.php">Click here</a> to return to the home page</p>
<table style="width:70%">
<tr><th>Username</th><th>First Name</th><th>Last Name</th></tr>	
<?php
$query= 'SELECT
		u.user_id, username,first_name,last_name
		FROM
		site_user u JOIN
		site_user_info i ON u.user_id=i.user_id
		ORDER_BY
		username ASC';
$result=mysql_query($query,$db) or die(mysql_error($db));

$odd=true;
while ($row=mysql_fetch_array($result))
{
		echo ($odd == true) ? '<tr class="odd_row">' :'<tr class="even_row">';
		$odd=!$odd;
		echo '<td><a href="update_user.php?id=' . $row['user_id'].'">' .
		$row['username'] . '</a></td>';
		echo '<td>' .$row['first_name'] .'</td>';
		echo '<td>' .$row['last_name'] .'</td>';
		echo '</tr>';
	}
	mysql_free_result($result);
	mysql_close($db);
	?>
	</table>
	</body>
	</html>