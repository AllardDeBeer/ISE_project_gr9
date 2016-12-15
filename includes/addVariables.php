<?php 

session_start();

$q = $_GET['q'];

//if ($status = 'toevoegen') {
	if (!isset($_SESSION['vars'])){
		$_SESSION['vars'] = array();
	}

	array_push($_SESSION['vars'], $q);

	$response = "";
	foreach ($_SESSION['vars'] as $var) {
		$vars = explode('||', $var);
		$response .= "<tr>
	                  <td>" . $vars[0] . "</td>
	                  <td>" . $vars[1] . "</td>
	                  <td><input type=\"checkbox\" name=\"select\" value=\"4\" onchange=\"\" id=\"selected\"></td>
	                </tr>";	

	}
//} else if ($status = 'verwijderen') {
/*	if (!isset($_SESSION['selected'])) {
		$_SESSION['selected'] = array();

		array_push($_SESSION['selected'], $q);
		$response = implode(" ", $_SESSION['selected']);
		foreach ($_SESSION['selected'] as $select) {
			$respone .= implode(" ", $select);
		}

		foreach ($_SESSION['vars'] as $var) {
			$vars = explode('||', $var);
		}


	}*/
//}

	unset($_SESSION['vars']);
	echo $response;


?>