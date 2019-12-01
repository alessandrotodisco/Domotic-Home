<?php

	$servername = "127.0.0.1";
	$username = "root";
	$password = ""; // FILL PSW
	$f_email = 0;
	// Create connection
	$conn = new mysqli($servername, $username, $password);
	if ($conn->connect_error) {   // Check connection
	    die("Connection failed: " . $conn->connect_error);
	}

	// DATABASE
	$sql = "
			CREATE DATABASE IF NOT EXISTS `dom_hom`;
	";

	if ($conn->query($sql) === FALSE) {
	    	echo "Error creating DATABASE: " . $conn->error;
	}

	$db = mysqli_select_db($conn, "dom_hom");

	// sql to create table
	$sql = "
			CREATE TABLE IF NOT EXISTS `users` (
				`ID` int(5) NOT NULL auto_increment,
				`username` varchar(10) NOT NULL,
				`password` varchar(32) NOT NULL,
				`email` varchar(25),
				`lang` varchar(2) NOT NULL,
				`_group` int(2) NOT NULL,
				PRIMARY KEY (`ID`)
			);
	";

	if ($conn->query($sql) === FALSE) {
	    echo "Error creating table: " . $conn->error;
	}

	$sql = "
			CREATE TABLE IF NOT EXISTS `RFID` (
				`ID` int(5) NOT NULL auto_increment,
				`UID` varchar(10) NOT NULL,
				`Access` boolean NOT NULL,
				`last_scan` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
				PRIMARY KEY (`ID`)
			);
	";

	if ($conn->query($sql) === FALSE) {
	    echo "Error creating table: " . $conn->error;
	}

	$sql = mysqli_query($conn,"SELECT * from users WHERE _group=0");
	$rows = mysqli_num_rows($sql);
	if ($rows == 0) {
		$sql = "
			INSERT INTO users (username, password, lang, _group) VALUES ('admin', '21232f297a57a5a743894a0e4a801fc3', 'EN', 0);
		";
		$c_name = "lang";
		$c_value = "EN";
		setcookie($c_name, $c_value, time() + (86400 * 30), "/"); // 86400 = 1 day
		if ($conn->query($sql) === FALSE) {
		    echo "Error creating user: " . $conn->error;
		}
	}

	
?>