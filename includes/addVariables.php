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
	$response = "";

	$selects = str_split($q);
	$j = 0;
	foreach ($selects as $sel) {
		if ($j > 0) { 
			$sel -= $j;
		}

		array_splice($_SESSION['vars'], $sel, 1);
		$j++;
	}

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
}
	unset($_SESSION['selected']);
	echo $response;
?>