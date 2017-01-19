<?php 
session_start();
include '/database_functions.php';
db_open();
$tellerMax;
$tellerMax = $_POST['boop'];
echo 'teller is';
echo $tellerMax;
$teller = 0;
$waardeteller = 0;
$waardes = array();
while($teller < $tellerMax){
	$waardes[$teller] = $_POST['naam'. $teller . ''];
	$teller++;
}
$ingevulde_waarde_id = array();
$ingevulde_waarde_id = unserialize($_POST['waarden_id_String"']);
$gebruiker = $_SESSION['username'];


while($waardeteller < $tellerMax){
	if($ingevulde_waarde_id[$waardeteller] != 'NULL')
	{
		db_query("exec waarde_update @waarde_id = "'$ingevulde_waarde_id[$waardeteller]'", @waarde = " . $waardes[$waardeteller] . ", @waarde_type = 'tekst' ");
	}
	else{
		echo 'test';
	}
	$waardeteller++;
}
	

  
$currentResearch = $_SESSION['onderzoek'];
$currentTest = $_SESSION['proef'];
				

	db_close();
?>