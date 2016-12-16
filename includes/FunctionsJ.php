<?php
include 'includes/database_functions.php';
db_open();
$serverName = "(local)\SQLEXPRESS";
$connectionInfo = array( "Database"=>"DonkeyKong",  "UID"=>"sa", "PWD"=>"rammus");
$conn = sqlsrv_connect( $serverName, $connectionInfo);

function checkVeldenIngevuld()
{
    if(empty($_POST['user']))
	{	die("geen gebruikersnaam ingevuld");
		return false;
    }
	if(empty($_POST['Password']))
	{	
		die("vul uw wachtwoord in");
		return false;
	}
	if($_POST['Password'] != $_POST['PasswordC'])	{
			echo 'pass:';
			echo $_POST['Password'] ;
			echo 'confirm:';
			echo $_POST['PasswordC'] ;
		die("Wachtwoorden komen niet overeen");
			return false;
			}
	else {
		echo'velden ingevuld';
		return true;
	}
		
}

Function Wachtwoordvergeten($user,$pass,$passC,$answer,$sql){	
$serverName = "(local)\SQLEXPRESS";
$connectionInfo = array( "Database"=>"DonkeyKong",  "UID"=>"sa", "PWD"=>"rammus");
$conn = sqlsrv_connect( $serverName, $connectionInfo);
$update = "UPDATE gebruiker SET wachtwoord = '$pass' WHERE gebruikersnaam = '$user'";

		if(checkVeldenIngevuld() == false){
			 
		}
		else {
			$stmt = sqlsrv_query($conn,$sql);
			if( $stmt === false) {
    die( print_r( sqlsrv_errors(), true) );
}
			$result = sqlsrv_fetch_array ($stmt, SQLSRV_FETCH_NUMERIC);
			if(empty($result[0]))
				echo 'Antwoord op de vraag is incorrect';
			else if(!empty($result[0])){
				sqlsrv_query($conn,$update);
				}		
		}
			
			
}

?>