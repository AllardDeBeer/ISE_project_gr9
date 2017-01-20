<?php
include "../includes/database_functions.php";
if (isset($_POST)){
	$name = $_POST['user'];
	$question = $_POST['vraag'];
	$answer = $_POST['answer'];
	$pass = $_POST['ww'];
	$pass_rep = $_POST['wwr'];
	$f_name = $_POST['fname'];
	$m_name=$_POST['mname'];
	$l_name=$_POST['lname'];

	if($pass == $pass_rep){
		db_open();
		$stmt = db_query("SELECT gebruikersnaam FROM Gebruiker WHERE gebruikersnaam = '" . $name . "'");
		db_close();
		if(db_hasRows($stmt)){
			header("Location: ../gebruiker.php?m=5");
		}else{
			db_open();
			db_query("INSERT INTO Gebruiker(gebruikersnaam, Voornaam, Tussenvoegsel, Achternaam, Wachtwoord, vraag_id, Antwoord) VALUES ('$name', '$f_name', '$m_name', '$l_name', '" . sha1($pass) . "', $question, '$answer')");
			db_close();
			header("Location: ../gebruiker.php?m=7");
		}
		
	}else{
		header("Location: ../gebruiker.php?m=6");
	}
}

?>