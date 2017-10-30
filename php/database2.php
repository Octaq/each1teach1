<?php
	$host = 'localhost';
	$username = 'root';
	$password = '';
	$database = 'eachteach';
	//$conn = mysqli_connect($host,$username,$password)
	//or die ('Error connecting to MySQL server.');
	//$db = mysql_select_db($databse) or die ("Database not found");
	$mysqli = new mysqli($host, $username, $password, $database);
	$db = mysqli_connect($host, $username, $password, $database);
	if (mysqli_connect_error()) {echo mysqli_connect_error(); exit; }
?>
