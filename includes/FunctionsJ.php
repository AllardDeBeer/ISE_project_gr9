<?php
include '../includes/database_functions.php';
db_open();
$serverName = "(local)\SQLEXPRESS";
$connectionInfo = array( "Database"=>"DonkeyKong",  "UID"=>"sa", "PWD"=>"rammus");
$conn = sqlsrv_connect( $serverName, $connectionInfo);

function checkVeldenIngevuld($user)
{
    if(empty($_POST['user']))
	{
        header('Location:../wachtwoord_vergeten_pre.html');
    }
	if(empty($_POST['Password']))
	{	
	header('Location:../wachtwoord_vergeten.php?user='.$user.'&m=1');
	}
	if($_POST['Password'] != $_POST['PasswordC'])
	{
	header('Location:../wachtwoord_vergeten.php?user='.$user.'&m=2');
		
	
	}
	else {
		return true;
	}
		
}

Function Wachtwoordvergeten($user,$pass,$passC,$answer,$sql){	
$serverName = "(local)\SQLEXPRESS";
$connectionInfo = array( "Database"=>"DonkeyKong",  "UID"=>"sa", "PWD"=>"rammus");
$conn = sqlsrv_connect( $serverName, $connectionInfo);
$update = "UPDATE gebruiker SET wachtwoord = '$pass' WHERE gebruikersnaam = '$user'";

		if(checkVeldenIngevuld($user) == false){
			die('error');
		}
		else if(strlen($pass) <5)  {
			header('Location:../wachtwoord_vergeten.php?user='.$user.'&m=3');
		}
		else{
			$stmt = sqlsrv_query($conn,$sql);
			if( $stmt === false) {
    die( print_r( sqlsrv_errors(), true) );
}
			$result = sqlsrv_fetch_array ($stmt, SQLSRV_FETCH_NUMERIC);
			if(empty($result[0])){
				header('Location:../wachtwoord_vergeten.php?user='.$user.'&m=4');

		}
			else if(!empty($result[0])){
				sqlsrv_query($conn,$update);
				header('Location:../login.html');
			}		
		}
			
			
}

?>