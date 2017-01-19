<?php

session_start();

$name = 'table_data';
$cols = $_GET['a'];


$response = "";
for ($i=0; $i < $cols; $i++) { 
	for($j=0; $j < sizeof($_SESSION['table_data']); $j++) {
		if(is_null($_SESSION['table_data'][$j][$i])){
			$response .= $_SESSION['table_data'][$j-1][$i] . ',';
		}else{
			$response .= $_SESSION['table_data'][$j][$i] . ',';
		}
	}
	$response = rtrim($response, ',');
	$response .= "|";
}


$response = rtrim($response, '|');
$response .= "~";
foreach ($_SESSION['table_dates'] as $date) {
	$response .= $date . ",";
}
$response = rtrim($response, ',');
echo $response;


?>