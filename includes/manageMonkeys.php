<?php 

	session_start();
	include "../includes/database_functions.php";
	$q = $_GET['q'];
	$data = explode('|', $q);
	$response = "";

	for ($i = 0; $i < sizeof($data); $i += 8) {

		$aapid					= $data[$i];
		$geboortedatum 			= $data[$i+3];
		$diersoort 				= $data[$i+1];
		$geslacht 				= $data[$i+2];
		$gewicht 				= $data[$i+4];
		$dominant  				= $data[$i+7];
		if (empty($dominant) && !($dominant == "0")) {
			$dominant = 'NULL';
		}
		$behandelgroep 			= $data[$i+6];
		$datumgewichtmeting 	= $data[$i+5];

		$sql = "
				UPDATE AAP 
				SET GEBOORTEDATUM = '$geboortedatum', DIERSOORT = '$diersoort', GESLACHT = '$geslacht', GEWICHT = $gewicht, DOMINANT = $dominant, BEHANDELGROEP = '$behandelgroep', DATUMGEWICHTMETING = '$datumgewichtmeting'
				WHERE AAP_ID = '$aapid';";
		db_open();
		db_query("SET LANGUAGE british");
		db_query($sql);

		db_query("SET LANGUAGE us_english");
		db_close();
	}


	db_open();
	$stmt = db_query("SELECT aap_id, DIERSOORT,geslacht, geboortedatum, gewicht, DATUMGEWICHTMETING, BEHANDELGROEP, DOMINANT  FROM aap");
	$i = 0;
	while($row = db_fetchAssoc($stmt)) {
		$response .= "<tr>
	          <td><input type=\"text\" name=\"aapData\" value=\"" . $row['aap_id'] . "\" required readonly></td>
	          <td><input type=\"text\" name=\"aapData\" value=\"" . $row['DIERSOORT'] . "\" required readonly></td>
	          <td><input type=\"text\" name=\"aapData\" value=\"" . $row['geslacht'] . "\" required readonly></td>
	          <td><input type=\"text\" name=\"aapData\" value=\"" . date('d/m/Y', $row["geboortedatum"]->getTimestamp()) . "\" required readonly></td>
	          <td><input type=\"text\" name=\"aapData\" id=\"aapGewicht\" value=\"" . $row['gewicht'] . "\" required></td>
	          <td><input type=\"text\" class=\"wdate\" id=\"aapGewichtDatum\" name=\"aapData\" value=\"" . date('d/m/Y', $row["DATUMGEWICHTMETING"]->getTimestamp()) . "\" required></td>
	          <td><input type=\"text\" name=\"aapData\" id=\"aapBehandelGroep\" value=\"" . $row['BEHANDELGROEP'] . "\" required></td>
	          <td><input type=\"text\" name=\"aapData\" id=\"aapDominantie\" value=\"" . $row['DOMINANT'] . "\" required></td>
	        </tr>";
	    $i = $i + 1;
	}
	db_close();

	echo $response;
?>
