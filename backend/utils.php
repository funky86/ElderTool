<?php

// Contains utility functions e.g. obtaining a DB connection.

header("Access-Control-Allow-Origin: *");

require('config.php');

function getDatabaseConnection() {
	$serverType = $GLOBALS['server_type'];

	if ($serverType == 'MSSQL') {
		return getMSSQLConnection();
	} else if ($serverType == 'MySQL') {
		return getMySQLConnection();
	} else {
		return null;
	}
}

function getMSSQLConnection() {
	$serverName = $GLOBALS['server_name'];
	$username = $GLOBALS['username'];
	$password = $GLOBALS['password'];
	$database = $GLOBALS['database'];

	$options = array("UID" => $username, "PWD" => $password, "Database" => $database, 'ReturnDatesAsStrings' => true);
	$conn = sqlsrv_connect($serverName, $options);

	if ($conn === false) {
		echo "Could not connect.";
		die(print_r(sqlsrv_errors(), true));
	}

	return $conn;
}

function getMySQLConnection() {
	$serverName = $GLOBALS['server_name'];
	$username = $GLOBALS['username'];
	$password = $GLOBALS['password'];
	$database = $GLOBALS['database'];

	$conn = mysqli_connect($serverName, $username, $password, $database);

	if (!$conn) {
		echo "Could not connect.";
	    die(mysqli_connect_error());
	}
	
	return $conn;
}

?>