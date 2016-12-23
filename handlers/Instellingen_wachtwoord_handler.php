<?php
include '../includes/FunctionsJ.php';
session_start();
$gebruiker = $_SESSION['username'];
$wachtwoord =  htmlspecialchars($_POST['Password']);
$wachtwoordC =  htmlspecialchars($_POST['PasswordC']);
$huidigWachtwoord =  htmlspecialchars($_POST['CurrentPass']);

if(empty($huidigWachtwoord) || empty($wachtwoord) || empty($wachtwoordC)){
	header('Location: ../?m=5#instellingen');
}
else if($wachtwoord != $wachtwoordC){
	header('Location: ../?m=6#instellingen');
	
}
else
nieuwWachtwoord($huidigWachtwoord,$wachtwoord,$gebruiker);
?>