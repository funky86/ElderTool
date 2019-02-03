<?php

// Prints out entries in the 'trades' DB table.

header("Access-Control-Allow-Origin: *");

require('utils.php');

$conn = getDatabaseConnection();

$query = "SELECT * FROM trades ORDER BY created_date ASC";

$result = mysqli_query($conn, $query);

$records = array();

while ($row = mysqli_fetch_assoc($result)) {
	array_push($records, $row);
}

echo json_encode($records);

mysqli_close($conn);

?>