<?php

// Insert an entry in the 'trades' DB table.

require('utils.php');

$symbol = $_GET['symbol'];
$entry_date = $_GET['entry_date'];
$entry_price = $_GET['entry_price'];
$exit_date = $_GET['exit_date'];
$exit_price = $_GET['exit_price'];

if (!isset($symbol) || !isset($entry_date) || !isset($entry_price) || !isset($exit_date) || !isset($exit_price)) {
	echo '-1';
	exit();
}

$conn = getDatabaseConnection();

$query = "INSERT INTO trades (symbol, entry_date, entry_price, exit_date, exit_price) VALUES (?, ?, ?, ?, ?)";

$params = array($symbol, new DateTime($entry_date), $entry_price, new DateTime($exit_date), $exit_price);

$stmt = sqlsrv_query($conn, $query, $params);

if ($stmt === false) {
	echo '-2';
	//die(print_r(sqlsrv_errors(), true));
} else {
	echo '0';
}

?>