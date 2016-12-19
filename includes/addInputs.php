<?php
include 'database_functions.php';
session_start();
$q = $_GET['q'];
$response = "<div class=\"column large-12\">
	          <span>3. kies Velden</span>
	        </div>";
if($q <= 0){
	$response .= "<div class=\"column large-12\">
          			<p>Kies Eerst het aantal variabele.</p>
        		</div>";
}else{
	db_open();
	for ($i=0; $i < $q; $i++) { 
		$stmt = db_query("SELECT veld_id, veld_naam FROM Veld WHERE proef_id = " . $_SESSION['proef']);
		$response .= "<div class=\"column large-12\"><select id=\"choice" . ($i+1) . "\" onchange=\"prepareResults()\">";
		$response .= "<option disabled selected value> -- Kies een veld -- </option>";
		while($row = db_fetchAssoc($stmt)){
			$response .= "<option value=\"" . $row['veld_id'] . "\">" . $row['veld_naam'] . "</option>";
		}
		$response .= "</select></div>";
	}
	db_close();
}
echo $response;
?>