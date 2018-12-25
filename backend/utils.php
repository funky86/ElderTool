<?php

// Contains utility functions e.g. obtaining a DB connection.

require('config.php');

function getDatabaseConnection() {
	$serverName = $GLOBALS['server_name'];
	$username = $GLOBALS['username'];
	$password = $GLOBALS['password'];
	$database = $GLOBALS['database'];

	$options = array("UID" => $username, "PWD" => $password, "Database" => $database);
	$conn = sqlsrv_connect($serverName, $options);

	if ($conn === false) {
		echo "Could not connect.\n";
		die(print_r(sqlsrv_errors(), true));
	}

	return $conn;
}

?>