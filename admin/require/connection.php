<?php 

	$host = "localhost";	// server name
	$dbname = "eds_electronics";	// database name
	$user = "root";		// user name
	$password = "";		// password
	$dsn = 'mysql:host=' . $host . '; dbname='. $dbname;
	// connecting into database using above information
	$pdo = new PDO($dsn, $user, $password);
