<?php

// Prints out entries in the 'trades' DB table.

require('utils.php');

$conn = getDatabaseConnection();

$query = "SELECT * FROM trades";

$stmt = sqlsrv_query($conn, $query);

if ($stmt === false) {
	die(print_r(sqlsrv_errors(), true));
}

while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
	echo $row['symbol'] . ", " . $row['entry_price'] . ", " . $row['exit_price'] . "<br />";
}

sqlsrv_close($conn);

echo $result;

?>