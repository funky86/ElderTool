<?php

// Insert an entry in the 'trades' DB table.

require('utils.php');

$symbol = $_GET['symbol'];
$date_time = $_GET['date_time'];
$entry_price = $_GET['entry_price'];
$exit_price = $_GET['exit_price'];

if (!isset($symbol) || !isset($date_time) || !isset($entry_price) || !isset($exit_price)) {
	echo -1;
	exit();
}

$conn = getDatabaseConnection();

$query = "INSERT INTO trades (symbol, date_time, entry_price, exit_price) VALUES (?, ?, ?, ?)";

$params = array($symbol, new DateTime($date_time), $entry_price, $exit_price);

$stmt = sqlsrv_query($conn, $query, $params);

if ($stmt === false) {
	die(print_r(sqlsrv_errors(), true));
}

echo '0';

?>