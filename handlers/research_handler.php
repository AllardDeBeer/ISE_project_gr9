<?php
include '../includes/database_functions.php';

if(isset($_POST)){
	if($_GET['a'] == 'n'){
		echo $_POST['researchName'];
		db_open();
		db_query("INSERT INTO onderzoek(onderzoek_naam, onderzoek_startdatum, onderzoek_einddatum) VALUES ('" . $_POST['researchName'] . "','" . $_POST['researchStart'] . "','" . $_POST['reasearchEnd'] . "')");
		db_close();

		header('Location: ../?m=1#nieuw_onderzoek');
	}
}


?>