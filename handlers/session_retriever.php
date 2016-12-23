<?php

session_start();

$name = 'table_data';
$cols = $_GET['a'];


$response = "";
for ($i=0; $i < $cols; $i++) { 
	foreach ($_SESSION[$name][$i] as $stmt) {
		$response .= $stmt . ",";
	}
	$response = rtrim($response, ',');
	$response .= "|";
}

$response = rtrim($response, '|');
echo $response;


?>