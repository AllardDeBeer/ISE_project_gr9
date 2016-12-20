<?php
include '../includes/database_functions.php';
db_open();
$serverName = "(local)\SQLEXPRESS";
$connectionInfo = array( "Database"=>"DonkeyKong",  "UID"=>"dkServer", "PWD"=>"aapjes");
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
db_open();
$update = "UPDATE gebruiker SET wachtwoord = '$pass' WHERE gebruikersnaam = '$user'";

		if(checkVeldenIngevuld($user) == false){
			
		}
		else if(strlen($pass) <5)  {
			header('Location:../wachtwoord_vergeten.php?user='.$user.'&m=3');
		}
		else{
			$stmt = db_query($sql);
			if( $stmt === false) {
    die( print_r( sqlsrv_errors(), true) );
}
			$result = db_fetchNumeric($stmt);
			if(empty($result[0])){
				header('Location:../wachtwoord_vergeten.php?user='.$user.'&m=4');

		}
			else if(!empty($result[0])){
				db_query($update);
				header('Location:../login.html');
			}		
		}
			
			
}


function nieuwWachtwoord($currentPass,$pass,$user){
$update = "UPDATE gebruiker SET wachtwoord = '$pass' WHERE gebruikersnaam = '$user'";
$sql = "SELECT gebruikersnaam FROM gebruiker WHERE GEBRUIKERSNAAM = '$user' AND wachtwoord = '$currentPass' ";
	if(strlen($pass) <5)  {
	
		header('Location: ../?m=7#instellingen');
	}
	else{
		$stmt = db_query($sql);
		if( $stmt === false)
		{
			die( print_r( sqlsrv_errors(), true) );
		}
		$result = db_fetchNumeric($stmt);
		if(empty($result[0]))
		{
			header('Location: ../?m=8#instellingen');
		}
		else if(!empty($result[0]))
		{
			db_query($update);
			header('Location: ../?m=9#instellingen');
		}		
	}
}



function nieuwGebruikersnaam($newuser,$user){
db_open();
$update = "UPDATE gebruiker SET Gebruikersnaam = '$newuser' WHERE gebruikersnaam = '$user'";
$sql = "SELECT gebruikersnaam FROM gebruiker WHERE GEBRUIKERSNAAM = '$user'";
	if(strlen($user) <2)  {
		db_close();
		header('Location: ../?m=12#instellingen');
	}
	else
	{
		
		$stmt = db_query($sql);
		if( $stmt === false)
		{
			die( print_r( sqlsrv_errors(), true) );
		}
		$result = sqlsrv_fetch_array ($stmt, SQLSRV_FETCH_NUMERIC);
		if(empty($result[0]))
		{
			db_close();
			header('Location: ../?m=10#instellingen');
		}
		else if(!empty($result[0]))
		{
			sqlsrv_query($conn,$update);
			$_SESSION['username'] =$newuser ;
			db_close();
			header('Location: ../?m=11#instellingen');
		}
	}
db_close();
}
?>
