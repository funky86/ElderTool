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

$created_date = date('Y-m-d H:i:s');

$conn = getDatabaseConnection();

$query = "INSERT INTO trades (symbol, created_date, entry_date, entry_price, exit_date, exit_price) VALUES (?, ?, ?, ?, ?, ?)";

$stmt = $conn->prepare($query);

$stmt->bind_param("sssdsd", $symbol, $created_date, $entry_date, $entry_price, $exit_date, $exit_price);

if ($stmt->execute()) {
	echo '0';
} else {
	echo '-2';
}

$stmt->close();
$conn->close();

?>