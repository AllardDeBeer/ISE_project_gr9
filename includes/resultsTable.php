<?php
include 'database_functions.php';
session_start();
$q=rtrim(substr($_GET['q'], 1), "]");

$ids = explode("][", $q);

$table_head = "<thead><tr>";
$table_body = "<tbody>";

$table_data = array();
$i = 0;

db_open();
foreach ($ids as $id) {
	$stmt = db_query("SELECT waarde FROM Waarde WHERE veld_id =" . $id . " AND aap_id ='" . $_SESSION['aap'] . "'");
	$veld = db_fetchAssoc(db_query("SELECT veld_naam FROM Veld WHERE veld_id =" . $id))['veld_naam'];
	$table_head .= "<th>" . $veld . "</th>";
	array_push($table_data, array());
	while($row = db_fetchAssoc($stmt)){
		array_push($table_data[$i], $row['waarde']);
	}
	$i = $i + 1;
}
db_close();

for ($y=0; $y < sizeof($table_data[0]); $y++) {
	$table_body .= "<tr>";
	for ($x=0; $x < sizeof($table_data); $x++) { 
		$table_body .= "<td>" . $table_data[$x][$y] . "</td>";
	}
	$table_body .= "</tr>";
}

$_SESSION['table_data'] = $table_data;

//$table_head .= "</tr></thead>"
//$table_body .= "</tbody>";
echo "<table>"  . $table_head . "</tr></thead>" . $table_body . "</tbody></table>";
//echo "<table>" . $table_head . $table_body . "</table>";

// echo $response;

?>