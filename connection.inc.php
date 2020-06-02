<?php
	//using mysqli
	$mysqli = new mysqli("localhost", "root", "", "db_jumantik");
	if ($mysqli->connect_errno) {
		echo "Failed to connect to MySQL: " . $mysqli->connect_error;
	}
?>