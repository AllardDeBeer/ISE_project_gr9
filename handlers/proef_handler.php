<?php 
	include '../includes/database_functions.php';

	db_open();
	if (isset($_GET['value'])) {

		if($_GET['value'] == 'opslaan') {
			
			$PROEF_NAAM = $_POST['researchName'];
			$sql = "INSERT INTO PROEF ([PROEF_NAAM]) VALUES ('$PROEF_NAAM')";
			$stmt = db_query($sql);
			
		} else if ($_GET['value'] == 'verwijderen') {
			echo 'Verwijderen!';
		} else {
			echo 'Get is niet opslaan of verwijderen';
		}

	} else {
		echo 'GET not set!'; 
	}
?>