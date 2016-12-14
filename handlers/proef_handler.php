<?php 
	session_start();
	include '../includes/database_functions.php';

	db_open();
	if (isset($_GET['value'])) {

		if($_GET['value'] == 'opslaan') {
			
			/* Insert proef gegegevens in de database */
			$PROEF_NAAM = $_POST['researchName'];
			$sql = "INSERT INTO PROEF ([PROEF_NAAM]) VALUES ('{$PROEF_NAAM}')";
			db_query($sql);

			/* Select proef_id van de proef*/
			$stmt = db_query("SELECT PROEF_ID FROM PROEF WHERE PROEF_NAAM = '$PROEF_NAAM'");
			$result = db_fetchAssoc($stmt);
			$proef_id = $result['PROEF_ID'];

			/* Insert proef bij onderzoek in de database */
			$onderzoek_id = $_SESSION['onderzoek'];
			$sql = "INSERT INTO PROEFVOORONDERZOEK ([ONDERZOEK_ID], [PROEF_ID]) VALUES ('{$onderzoek_id}', '{$proef_id}')";
			db_query($sql);

			/* Insert velden in de database */
			foreach ($_SESSION['vars'] as $var) {
				$vars = explode('||', $var);

				$veld_naam = $vars[0];

				$datatypenaam = $vars[1];
				$stmt = db_query("SELECT DATATYPE_ID FROM DATATYPES WHERE DATATYPE_NAAM = '$datatypenaam'");
				sqlsrv_fetch($stmt);
				$datatype_id = sqlsrv_get_field($stmt, 0);

				$sql = "INSERT INTO VELD ([DATATYPE_ID], [PROEF_ID], [VELD_NAAM]) VALUES ('{$datatype_id}', '{$proef_id}', '{$veld_naam}')";
				db_query($sql);
			}

			unset($_SESSION['vars']);
			header('Location: ../index.php?#nieuw_proef');

		} else if ($_GET['value'] == 'verwijderen') {
			echo 'Verwijderen!';
		} else {
			echo 'Get is niet opslaan of verwijderen';
		}

	} else {
		echo 'GET not set!'; 
	}

	db_close();	
?>