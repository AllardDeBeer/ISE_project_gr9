<?php 

session_start();
include "../includes/database_functions.php";
db_open();
$q = $_GET['q'];
$response = "";
$status = $_GET['status'];

if ($status == 'toevoegen') {
	$stmt = db_query("SELECT PROEF_ID FROM PROEF WHERE PROEF_NAAM = '$q'");
	$result = db_fetchAssoc($stmt);
	$proef_id = $result['PROEF_ID'];
	$stmt = db_query("SELECT V.VELD_NAAM, D.DATATYPE_NAAM FROM VELD V JOIN DATATYPES D ON V.DATATYPE_NAAM = D.DATATYPE_NAAM WHERE V.PROEF_ID = $proef_id");
	$_SESSION['existingProefVars'] = array();

	while ($result = db_fetchAssoc($stmt)) { 
		array_push($_SESSION['existingProefVars'], implode("||", $result));
	}

	$i = 0;
	foreach ($_SESSION['existingProefVars'] as $var) {
	    $vars = explode('||', $var);
	    $response .= "<tr>
	          <td>" . $vars[0] . "</td>
	          <td>" . $vars[1] . "</td>
	          </tr>"; 
	    $i++;
	}
} else if ($status == 'opslaan') {
	$onderzoek_id = $_SESSION['onderzoek'];
	$stmt = db_query("SELECT PROEF_ID FROM PROEF WHERE PROEF_NAAM = '$q'");
	$result = db_fetchAssoc($stmt);
	$proef_id = $result['PROEF_ID'];

	$stmt = db_query("INSERT INTO PROEFVOORONDERZOEK ([ONDERZOEK_ID], [PROEF_ID]) VALUES ('{$onderzoek_id}', {$proef_id})");
	$response .= 'gelukt';
}

echo $response;
?>