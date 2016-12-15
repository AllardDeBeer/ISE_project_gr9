<?php 

session_start();

$q = $_GET['q'];
$status = $_GET['status'];
if ($status == 'toevoegen') {
	if (!isset($_SESSION['vars'])){
		$_SESSION['vars'] = array();
	}

	array_push($_SESSION['vars'], $q);


	$response = "";
	$response .= print_r($_SESSION['vars'], true);
	$i = 0;
	foreach ($_SESSION['vars'] as $var) {
		$vars = explode('||', $var);
		$response .= "<tr>
	                  <td>" . $vars[0] . "</td>
	                  <td>" . $vars[1] . "</td>
	                  <td><input type=\"checkbox\" name=\"select\" value=\"$i\" onchange=\"\"></td>
	                </tr>";	

	    $i++;
	}
} else if ($status == 'verwijderen') {
	if (!isset($_SESSION['selected'])) {
		$_SESSION['selected'] = array();
	}

	array_push($_SESSION['selected'], $q);
	
	foreach ($_SESSION['selected'] as $select) {
		$selects = explode(',', $select);
	}

	foreach ($selects as $select) {
		array_splice($_SESSION['vars'], $selects[$select], 1);
		$response .= print_r($_SESSION['vars'], true);
	}

	foreach ($_SESSION['vars'] as $var) {
		$vars = explode('||', $var);
		$response .= "<tr>
	                  <td>" . $vars[0] . "</td>
	                  <td>" . $vars[1] . "</td>
	                  <td><input type=\"checkbox\" name=\"select\" value=\"$i\" onchange=\"\"></td>
	                </tr>";	

	    $i++;
	}
}
	//unset($_SESSION['vars']);
	unset($_SESSION['selected']);
	echo $response;


?>