<?php
include 'database_functions.php';
session_start();
$q=rtrim(substr($_GET['q'], 1), "]");

$ids = explode("][", $q);

$table_head = "<thead><tr><th>Datum</th>";
$table_body = "<tbody>";

$table_data = array();
$table_dates = array();
$i = 0;

if($ids[0] == ""){
	echo "<div class=\"alert callout\" data-closable>
			  <h5>Oeps :(</h5>
			  <p>Het ziet er naar uit dat je geen velden hebt geselecteerd</p>
			  <button class=\"close-button\" aria-label=\"Dismiss alert\" type=\"button\" data-close>
			    <span aria-hidden=\"true\">&times;</span>
			  </button>
			</div>";
}else{

	db_open();
	//echo "before!";
	$header = true;
	$stmt = db_query("SELECT DISTINCT Datum FROM Waarden2 WHERE aap_id ='" . $_SESSION['aap'] . "' ORDER BY Datum");
	while($date = db_fetchAssoc($stmt)){
		$d = date('m/d/Y', $date['Datum']->getTimestamp());
		array_push($table_dates, $d);
		array_push($table_data, array());
		foreach ($ids as $id) {
		 	$stmt2 = db_query("SELECT (SELECT waarde FROM Waarden2 WHERE veld_id =" . $id . " AND aap_id ='" . $_SESSION['aap'] . "' AND Datum = '" . $d . "') AS waarde");
		 	if($header){
		 		$veld = db_fetchAssoc(db_query("SELECT veld_naam FROM Veld WHERE veld_id =" . $id))['veld_naam'];
				$table_head .= "<th>" . $veld . "</th>";
		 	}
			
			while($row = db_fetchAssoc($stmt2)){
				array_push($table_data[$i], $row['waarde']);
			}
		}
		$i = $i + 1;
		$header = false;
	}
	db_close();

	if($_SESSION['hl'] == "true"){
		array_pop($table_data);
		array_shift($table_data);
	}

	//print_r($table_data);
	//echo "after";
	// $table_dates = "<tr>";
	// for ($z=0; $z < sizeof($table_dates); $z++) { 
	// 	$table_body .= "<tr><td>" . $table_dates[$z] . "</td>";
		// for ($y=0; $y < sizeof($table_data[0]); $y++) {
		// 	$table_body .= "<tr>";
		// 	for ($x=0; $x < sizeof($table_data); $x++) { 
		// 		$table_body .= "<td>" . $table_data[$x][$y] . "</td>";
		// 	}
		// 	$table_body .= "</tr>";
		// }
	//}
	for ($x=0; $x < sizeof($table_dates); $x++) { 
		$table_body .= "<tr><td>" . $table_dates[$x] . "</td>";
		for ($y=0; $y < sizeof($table_data[0]); $y++) { 
			$table_body .= "<td>" . $table_data[$x][$y] . "</td>";
		}
		$table_body .= "</tr>";
	}

	$_SESSION['table_data'] = $table_data;
	$_SESSION['table_dates'] = $table_dates;

	//$table_head .= "</tr></thead>"
	//$table_body .= "</tbody>";

	echo "<table>"  . $table_head . "</tr></thead>" . $table_body . "</tbody></table>";

	//echo "<table>" . $table_head . $table_body . "</table>";

	// echo $response;
}

?>