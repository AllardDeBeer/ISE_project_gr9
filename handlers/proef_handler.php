<?php 
	session_start();
	include '../includes/database_functions.php';

	db_open();
	$response = "";
	$proef_id = $_SESSION['proef'];
	if (isset($_GET['value'])) {

		if($_GET['value'] == 'opslaan') {
			/* Check if researchName doesn't already exist */
			$sql = "SELECT PROEF_NAAM FROM PROEF";
			$result = db_query($sql);
			$isValid = True;
			if (!(empty($_GET['researchName']))) {
				while ($row = db_fetchAssoc($result)) {
					if ($row['PROEF_NAAM'] == $_GET['researchName']) {
						$isValid = False;
						$response .= "notValid";
						unset($_SESSION['vars']);
					} 
				}
			} else {
				$isValid = False;
				$response = 'noResearchName';
			}
			/* if researchName is valid */
			if ($isValid) {
				/* Insert proef gegegevens in de database */
				$PROEF_NAAM = $_GET['researchName'];
				$sql = "INSERT INTO PROEF ([PROEF_NAAM]) VALUES ('{$PROEF_NAAM}')";
				db_query($sql);

				/* Select proef_id van de proef*/
				$stmt = db_query("SELECT PROEF_ID FROM PROEF WHERE PROEF_NAAM = '$PROEF_NAAM'");
				$result = db_fetchAssoc($stmt);
				$proef_id = $result['PROEF_ID'];

				/*Insert proef bij onderzoek in de database */
				$onderzoek_id = $_SESSION['onderzoek'];
				$sql = "INSERT INTO PROEFVOORONDERZOEK ([ONDERZOEK_ID], [PROEF_ID]) VALUES ('{$onderzoek_id}', '{$proef_id}')";
				db_query($sql);

				/* Insert velden in de database */
				foreach ($_SESSION['vars'] as $var) {
					$vars = explode('||', $var);

					$veld_naam = $vars[0];
					$datatypenaam = $vars[1];
					
/*					$stmt = db_query("SELECT DATATYPE_NAAM FROM DATATYPES WHERE DATATYPE_NAAM = '$datatypenaam'");
					sqlsrv_fetch($stmt);
					$DATATYPE_NAAM = sqlsrv_get_field($stmt, 0);
*/
					$sql = "INSERT INTO VELD ([DATATYPE_NAAM], [PROEF_ID], [VELD_NAAM]) VALUES ('{$datatypenaam}', '{$proef_id}', '{$veld_naam}')";
					db_query($sql);
				}
				$response = 'isValid';
				unset($_SESSION['vars']);
			}
		} else if ($_GET['value'] == 'opslaanBeheerProef') {
			db_open();

			$bestaandeVelden = array();
			$sql = "SELECT V.VELD_NAAM, D.DATATYPE_NAAM FROM VELD V JOIN DATATYPES D ON V.DATATYPE_NAAM =  D.DATATYPE_NAAM WHERE PROEF_ID = $proef_id";
			$stmt = db_query($sql);
			while ($result = db_fetchAssoc($stmt)) {
				array_push($bestaandeVelden, implode('||', $result));
			}

			$arrayNewFields = array_diff($_SESSION['proefbeheer_vars'], $bestaandeVelden);
			$_SESSION['arrayNewFields'] = $arrayNewFields;
			$arrayDiff = array_diff($bestaandeVelden, $_SESSION['proefbeheer_vars']);
			$_SESSION['arrayDiff'] = $arrayDiff;
			if (empty($arrayDiff)) {
				$researchName = $_GET['researchName'];
				$sql = "UPDATE PROEF SET PROEF_NAAM = '$researchName' WHERE PROEF_ID = $proef_id";
				db_query($sql);

				foreach($_SESSION['arrayNewFields'] as $var) {
					$vars = explode('||', $var);
					$veld_naam = $vars[0];
					$datatypenaam = $vars[1];
					$sql = "INSERT INTO VELD ([DATATYPE_NAAM], [PROEF_ID], [VELD_NAAM]) VALUES ('{$datatypenaam}', '{$proef_id}', '{$veld_naam}')";
					db_query($sql);
					
					//header('Location: ../index.php?m=15#beheer_proef');
				}
				$response .= 'gelukt';
			} else {
				
				$response .= 'waarden';
				//header('Location: ../index.php?m=14#beheer_proef');
			}
		} else if ($_GET['value'] == 'opslaanBeheerProefDefinitief') {
			// Verwijder kolommen in WAARDE tabel
			// Verwijder kolommen in de VELD tabel
			foreach($_SESSION['arrayDiff'] as $var) {
				$vars = explode('||', $var);
				$sql = "DELETE FROM WAARDE WHERE VELD_ID IN (SELECT VELD_ID
														     FROM VELD 
														     WHERE PROEF_ID = $proef_id AND VELD_NAAM = '$vars[0]')
						DELETE FROM VELD WHERE PROEF_ID = $proef_id AND VELD_NAAM = '$vars[0]'
						";
				$stmt = db_query($sql);
			}

			$researchName = $_GET['researchName'];
			$sql = "UPDATE PROEF SET PROEF_NAAM = '$researchName' WHERE PROEF_ID = $proef_id";
			db_query($sql);
			// Voeg kolommen toe die nieuw zijn 
			foreach($_SESSION['arrayNewFields'] as $var) {
				$vars = explode('||', $var);
				$veld_naam = $vars[0];
				$datatypenaam = $vars[1];
				$sql = "INSERT INTO VELD ([DATATYPE_NAAM], [PROEF_ID], [VELD_NAAM]) VALUES ('{$datatypenaam}', '{$proef_id}', '{$veld_naam}')";
				db_query($sql);
			}
			$response .= 'gelukt';
			//header('Location: ../index.php?m=15#beheer_proef');
		}
	} else {
		echo 'GET not set!'; 
	}

	echo $response;
	db_close();	
?>