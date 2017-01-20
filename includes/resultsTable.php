<?php
include 'database_functions.php';
session_start();
$q=rtrim(substr($_GET['q'], 1), "]");

$ids = explode("][", $q);

$table_head = "<thead><tr><th>Datum</th>";
$table_body = "<tbody>";

//$table_data = array();
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
	$header_set = true;
	$push_monkeys = true;
	$push_ids = true;
	$ids_pushed = true;
	$stmt = db_query("SELECT DISTINCT Datum FROM Waarden2 WHERE aap_id ='" . $_SESSION['aap'] . "' ORDER BY Datum");
	while($date = db_fetchAssoc($stmt)){
		$d = date('m/d/Y', $date['Datum']->getTimestamp());
		array_push($table_dates, $d);
		for ($a=0; $a < 2; $a++) { 
			if($push_monkeys){
				array_push($table_data, array());				
			}
			for ($i=0; $i < sizeof($ids); $i++) { 
			 	array_push($table_data[$a], array());
			 	$stmt2 = db_query("SELECT (SELECT waarde FROM Waarden2 WHERE veld_id =" . $ids[$i] . " AND aap_id ='" . $_SESSION['aap' . ($a+1)] . "' AND Datum = '" . $d . "') AS waarde");
			 	if($header){
			 		
			 		$veld = db_fetchAssoc(db_query("SELECT veld_naam FROM Veld WHERE veld_id =" . $ids[$i]))['veld_naam'];
					$table_head .= "<th>" . $_SESSION['aap' . ($a+1)] . ':' . $veld . "</th>";
					var_dump($table_data[0]);
			 	}
				while($row = db_fetchAssoc($stmt2)){
					echo $a . ":" . $i . "@" . $row['waarde'] . "<br>";
					array_push($table_data[$a][$i], 4);
				}
				$i = $i + 1;
				$header = false;
			}
			if($header_set){
				$header = true;				
			}	
		}
		$header_set = false;
		$header = false;
		$push_monkeys = false;
	}
	db_close();
	print_r($table_data);
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
	// for ($z=0; $z < sizeof($table_data); $z++) { 
	// 	$table_body .= "<tr>";
	// 	for ($x=0; $x < sizeof($table_dates[0]); $x++) { 
	// 		$table_body .= "<tr><td>" . $table_dates[$x] . "</td>";
	// 		for ($y=0; $y < sizeof($table_data[0][0]); $y++) { 
	// 			$table_body .= "<td>" . $table_data[$x][$y] . "</td>";
	// 		}
	// 		$table_body .= "</tr>";
	// 	}
	// }
	$table_body .= "<tr><td>"  . sizeof($table_data) . "</td><td>"  . sizeof($table_data[0]) . "</td><td>"  . sizeof($table_data[0][0]) . "</td></tr>";
	for ($x=0; $x < sizeof($table_data[0][0]); $x++) { 
		$table_body .= "<tr><td>1</td>";
		for ($y=0; $y < sizeof($table_data[0]); $y++) { 
			$table_body .= "<td>";
			for ($z=0; $z < sizeof($table_data); $z++) { 
				$table_body .= $table_data[$z][$y][$x];
			}
			$table_body .= "</td>";
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