<?php

include 'config.php';
$db =mysql_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD) or 
die('Oops connection error -> ' . mysql_error());
mysql_select_db(DB_DATABASE, $db) 
or die('Database error -> ' . mysql_error());

//$db =mysql_connect (MYSQL_HOST, MYSQL_USER,MYSQL_PASSWORD) or
	//die ('Unable to connect. Check your connection parameters.');
	//mysql_select_db(MYSQL_DB,$db) or die(mysql_error($db));
	
	//update the user table
	$query= 'ALTER TABLE site_user
		ADD COLUMN admin_level TINYINT UNSIGNED NOT NULL DEFAULT 0 AFTER password';
	mysql_query($query, $db) or die (mysql_error($db));

	//give one of our test accounts administrative privileges
	$query ='UPDATE site_user SET admin_level = 1 WHERE username="thuso"';
	mysql_query($query, $db) or die (mysql_error($db));
	
	echo 'Success';
?>