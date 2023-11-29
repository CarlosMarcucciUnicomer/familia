<?php
session_start();

// Define database
define('dbhost', 'localhost');
define('dbuser', 'u760722394_dbcolegio_user');
define('dbpass', 'UMGAntigua2022');
define('dbname', 'u760722394_dbcolegio');

// Connecting database
try {
	$connect = new PDO("mysql:host=".dbhost."; dbname=".dbname, dbuser, dbpass);
	$connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch(PDOException $e) {
	echo $e->getMessage();
}

?>
