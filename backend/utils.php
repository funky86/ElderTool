<?php

// Contains utility functions e.g. obtaining a DB connection.

header("Access-Control-Allow-Origin: *");

require('config.php');

function getDatabaseConnection() {
	if (DB_SERVER_TYPE == 'MSSQL') {
		return getMSSQLConnection();
	} else if (DB_SERVER_TYPE == 'MySQL') {
		return getMySQLConnection();
	} else {
		return null;
	}
}

function getMSSQLConnection() {
	$options = array("UID" => DB_USERNAME, "PWD" => DB_PASSWORD, "Database" => DB_DATABASE, 'ReturnDatesAsStrings' => true);
	$conn = sqlsrv_connect(DB_SERVER_NAME, $options);

	if ($conn === false) {
		echo "Could not connect.";
		die(print_r(sqlsrv_errors(), true));
	}

	return $conn;
}

function getMySQLConnection() {
	$conn = new mysqli(DB_SERVER_NAME, DB_USERNAME, DB_PASSWORD, DB_DATABASE);

	if ($conn->connect_error) {
		echo "Could not connect.";
	    die($conn->connect_error);
	}
	
	return $conn;
}

?>