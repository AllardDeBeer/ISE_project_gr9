<?php 

session_start();
include "../includes/database_functions.php";
$q = $_GET['q'];
$status = $_GET['status'];
$response = "";

/*if ($status == 'toevoegen') {
	if (!isset($_SESSION['vars'])){
		$_SESSION['vars'] = array();
	}
	array_push($_SESSION['vars'], $q);
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
	$q=rtrim(substr($q, 2), "]");
	$selects = explode("][", $q);

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
}	else if ($status == 'proefbeheertoevoegen') {
	// Voeg de bestaande velden toe aan de response string
	db_open();
	$proef_id = $_SESSION['proef'];
    $stmt = db_query("SELECT VELD_NAAM, DATATYPE_NAAM FROM VELD V JOIN DATATYPES D ON V.DATATYPE_ID = D.DATATYPE_ID WHERE V.PROEF_ID = $proef_id");
    

	while ($result = db_fetchAssoc($stmt)) { 
      array_push($_SESSION['proefbeheer_vars'], implode("||", $result));
    
    }
    db_close();

	array_push($_SESSION['proefbeheer_vars'], $q);
	
	// Voeg de toegevoegde velden aan de response string 
	$i = 0;
	foreach ($_SESSION['proefbeheer_vars'] as $var) {
		$vars = explode('||', $var);
		$response .= "<tr>
	                  <td>" . $vars[0] . "</td>
	                  <td>" . $vars[1] . "</td>
	                  <td><input type=\"checkbox\" name=\"select\" value=\"$i\" onchange=\"\"></td>
	                </tr>";	

	    $i++;
	}
}	else if ($status == 'proefbeheerverwijderen') {
	$q=rtrim(substr($q, 2), "]");
	$selects = explode("][", $q);

	$j = 0;
	foreach ($selects as $sel) {
		if ($j > 0) { 
			$sel -= $j;
		}

		array_splice($_SESSION['proefbeheer_vars'], $sel, 1);
		$j++;
	}

	$i = 0;
	var_dump($_SESSION['proefbeheer_vars']);
	foreach ($_SESSION['proefbeheer_vars'] as $var) {
		$vars = explode('||', $var);
		$response .= "<tr>
	                  <td>" . $vars[0] . "</td>
	                  <td>" . $vars[1] . "</td>
	                  <td><input type=\"checkbox\" name=\"select\" value=\"$i\" onchange=\"\"></td>
	                </tr>";	
	    $i++;
	}
}*/

	unset($_SESSION['selected']);
	$response .= "echo echo echo";
	echo $response;
?>