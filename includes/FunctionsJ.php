<?php
include '../includes/database_functions.php';
db_open();

function checkVeldenIngevuld($user)
{
    if(empty($_POST['user']))
	{
		db_close();
        header('Location:../wachtwoord_vergeten_pre.html');
    }
	if(empty($_POST['Password']))
	{	
		db_close();
		header('Location:../wachtwoord_vergeten.php?user='.$user.'&m=1');
	}
	if($_POST['Password'] != $_POST['PasswordC'])
	{
		db_close();
		header('Location:../wachtwoord_vergeten.php?user='.$user.'&m=2');
	}
	else {
		return true;
	}
	db_close();
}

Function Wachtwoordvergeten($user,$pass,$passC,$answer)
{	
	db_open();
	$sql ="SELECT gebruikersnaam,antwoord FROM gebruiker WHERE gebruikersnaam = '$user' AND antwoord = '$answer' ";
	if(checkVeldenIngevuld($user) == false)
	{
		
	}
	else if(strlen($pass) <5)  {
		header('Location:../wachtwoord_vergeten.php?user='.$user.'&m=3');
	}
	else
	{
		$pass = sha1($pass);
		$stmt = db_query($sql);
		if( $stmt === false)
		{
			die( print_r( sqlsrv_errors(), true) );
		}
		$result = db_fetchNumeric($stmt);
		if(empty($result[0]))
		{
			db_close();
			header('Location:../wachtwoord_vergeten.php?user='.$user.'&m=4');
		}
		else if(!empty($result[0]))
		{
			$update = "UPDATE gebruiker SET wachtwoord = '$pass' WHERE gebruikersnaam = '$user'";
			db_query($update);
			db_close();
			header('Location:../login.php');
			
		}		
	}			
}


function nieuwWachtwoord($currentPass,$pass,$user)
{
	$sql = "SELECT gebruikersnaam FROM gebruiker WHERE GEBRUIKERSNAAM = '$user' AND wachtwoord = '$currentPass' ";
	if(strlen($pass) <5)
	{
		db_close();
		header('Location: ../?m=7#instellingen');
	}
	else
	{
		$pass = sha1($pass);
		$stmt = db_query($sql);
		if( $stmt === false)
		{
			die( print_r( sqlsrv_errors(), true) );
		}
		$result = db_fetchNumeric($stmt);
		if(empty($result[0]))
		{	
			db_close();
			header('Location: ../?m=8#instellingen');
		}
		else if(!empty($result[0]))
		{
			db_query($update);
			db_close();
			header('Location: ../?m=9#instellingen');
		}		
	}
}



function nieuwGebruikersnaam($newuser,$user)
{
	db_open();
	$update = "UPDATE gebruiker SET Gebruikersnaam = '$newuser' WHERE gebruikersnaam = '$user'";
	$sql = "SELECT gebruikersnaam FROM gebruiker WHERE GEBRUIKERSNAAM = '$user'";
	if(strlen($user) <2)
	{
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
			$update = "UPDATE gebruiker SET wachtwoord = '$pass' WHERE gebruikersnaam = '$user'";
			sqlsrv_query($conn,$update);
			$_SESSION['username'] =$newuser ;
			db_close();
			header('Location: ../?m=11#instellingen');
		}
	}
}
?>
