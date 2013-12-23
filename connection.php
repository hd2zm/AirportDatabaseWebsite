<?php
	$index = 1;
	$dbhost = 'stardock.cs.virginia.edu';
	$dbuser = 'cs4750bac5rcb';
	$dbpass = 'password724';
	$db = 'cs4750cfd7kv';
	$conn = mysql_connect($dbhost,$dbuser,$dbpass, $db);
	
	mysql_select_db($db);

?>