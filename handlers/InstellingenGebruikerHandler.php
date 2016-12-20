<?php
include '../includes/FunctionsJ.php';
session_start();
$gebruiker = $_SESSION['username'];
$huidigeGebruiker = $_POST['Gebruikersnaam'];
$nieuweGebruiker = $_POST['NieuweGebruikersnaam'];
if($gebruiker != $huidigeGebruiker){
	header('Location: ../?m=10#instellingen');
}
else
nieuwGebruikersnaam($nieuweGebruiker,$huidigeGebruiker);
?>