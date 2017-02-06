<?php 
session_start();
include '/database_functions.php';
db_open();
$currentResearch = $_SESSION['onderzoek'];
$currentTest = $_SESSION['proef'];
$tellerMax;
$tellerMax = $_POST['boop'];
$teller = 0;
$waardeteller = 0;
$velden = $_SESSION['veld'];
$waardes = array();
$types = array();
$types = $_SESSION['types'];
$datum = $_SESSION['insertDate'];
$datum = str_replace('/','-',$datum);
while($teller < $tellerMax){
	$waardes[$teller] = $_POST['naam'. $teller . ''];
	$teller++;
}
$apen = $_SESSION['apen'];
$ingevulde_waarde_id = array();
$ingevulde_waarde_id = $_SESSION['waardeID'];
$gebruiker = $_SESSION['username'];

$runner = 0;
while($runner < count($Types))
{    
	echo " ";
	echo $runner;
	echo 'type is:'; 
	echo $velden[$runner];
	$runner++;
	echo " ";
}


while($waardeteller < $tellerMax){
$waarde_id = $ingevulde_waarde_id[$waardeteller];
$waarde_type = $types[$waardeteller];
$value = $waardes[$waardeteller];
$veld_id = $velden[$waardeteller];
$aap_id = $apen[$waardeteller];
echo $waarde_type;
	if($waarde_id != 'NULL')
	{
		db_query("exec waarde_update @waarde_id = '$waarde_id', @waarde = '$value', @waarde_type = '$waarde_type' ");
	}
	else if($waarde_id = 'NULL' && $value != 'NULL')
	{
		db_query("exec ProcSubtypeKeuze	@veld_id = $veld_id,@gebruikersnaam= '$gebruiker',@aap_id =$aap_id ,@waarde = $value,@datum = '$datum' ,@waarde_type ='$waarde_type'");
	}
	else
	{
		
	}
	$waardeteller++;
}
	
	header('location: ../index.php#nieuw_resultaten');
	db_close();
?>