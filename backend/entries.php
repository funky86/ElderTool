<?php

// Prints out entries in the 'trades' DB table.

require('utils.php');

$conn = getDatabaseConnection();

$query = "SELECT * FROM trades ORDER BY created_date ASC";

$result = $conn->query($query);

$records = array();

while ($row = $result->fetch_assoc()) {
	array_push($records, $row);
}

echo json_encode($records);

$conn->close();

?>