<?php
include '../includes/database_functions.php';

if(isset($_POST)){
	if($_GET['a'] == 'n'){
		echo $_POST['researchName'];
		$people = array();
		$i = 1;
		while(isset($_POST['select' . $i])){
			array_push($people, $_POST['select' . $i]);
			$i = $i + 1;
		}

		db_open();
		db_query("INSERT INTO onderzoek(onderzoek_naam, onderzoek_startdatum, onderzoek_einddatum) VALUES ('" . $_POST['researchName'] . "','" . $_POST['researchStart'] . "','" . $_POST['reasearchEnd'] . "')");
		$id = db_fetchAssoc(db_query("SELECT onderzoek_id FROM onderzoek WHERE onderzoek_naam ='" . $_POST['researchName'] . "'"));
		foreach ($people as $person) {
			db_query("INSERT INTO GebruikerInOnderzoek(gebruiker_id, onderzoek_id) VALUES (" . $person . "," . $id['onderzoek_id'] . ")");
		}
		db_close();

		header('Location: ../?m=1#nieuw_onderzoek');
	}else if($_GET['a'] == 'a'){
		echo $_POST['researchName'];
		$people = array();
		$i = 1;
		while(isset($_POST['select' . $i])){
			array_push($people, $_POST['select' . $i]);
			$i = $i + 1;
		}

		db_open();
		//db_query("INSERT INTO onderzoek(onderzoek_naam, onderzoek_startdatum, onderzoek_einddatum) VALUES ('" . $_POST['researchName'] . "','" . $_POST['researchStart'] . "','" . $_POST['reasearchEnd'] . "')");
		db_query("UPDATE onderzoek SET onderzoek_naam='".$_POST['researchName']."',
											onderzoek_startdatum='".$_POST['researchStart']."',
											onderzoek_einddatum='".$_POST['reasearchEnd']."'
										WHERE onderzoek_id =". $_GET['id']);
		$id = db_fetchAssoc(db_query("SELECT onderzoek_id FROM onderzoek WHERE onderzoek_naam ='" . $_POST['researchName'] . "'"));
		db_query("DELETE FROM GebruikerInOnderzoek WHERE onderzoek_id=". $id['onderzoek_id']);
		foreach ($people as $person) {
			db_query("INSERT INTO GebruikerInOnderzoek(gebruiker_id, onderzoek_id) VALUES (" . $person . "," . $id['onderzoek_id'] . ")");
		}

		db_close();

		header('Location: ../?m=2#beheer_onderzoek');
	}
}


?>