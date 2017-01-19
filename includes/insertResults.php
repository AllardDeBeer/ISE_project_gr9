<?php 
session_start();
include '/database_functions.php';
$q=$_GET["q"];
//$q="peter‽2017-01-08‽12‽3‽ 0‽1‽2‽3‽#4‽5‽6‽7#‽5‽6‽7";
db_open();
$array2d =array[2d???]();
$array= array();
$array= explode( '#', $q );

$array2d[$counter]= explode( '‽', array2d[$counter] );
$insertValues = array();
$username = $array[0]
$date=$array[1];
$insertAmount=$array[2];
$monkeyAmount=$array[3];
for ($x = 4; $x < count($array); $x++) {
   $insertValues[$x-4] = $array[$x];
}  
  
$currentResearch = $_SESSION['onderzoek'];
$currentTest = $_SESSION['proef'];
//$currentResearch = 1; //moet uit session gehaald worden
//$currentTest = $currentResearch;

				
//$insert = db_query("exec ProcSubtypeKeuze @veld_id = 4,@gebruikersnaam	= '$_SESSION['username']',@aap_id = $aap_id',@waarde = $waarde,@datum = '2017-01-17',@waarde_type ='getal'");
//$update = db_query("exec waarde_update @waarde_id = '$waarde_id', @waarde = $waarde, @waarde_type = $waarde_type");







				
$stmt = db_query("select aap_id from aap A where exists(select * from AAPINONDERZOEK AIO where AIO.ONDERZOEK_ID = '" . $currentTest . "'and AIO.aap_id = A.AAP_ID)");		

		
	while( $row =db_fetchNumeric($stmt)  ) 
	{
		$stmt2 = db_query("select VELD_ID from veld where PROEF_ID = '" . $currentResearch . "'");
		$stmt3 = db_query("SELECT waarde.WAARDE_ID FROM WAARDE INNER JOIN veld ON veld.VELD_ID=WAARDE.VELD_ID where DATUM='".$date."' and AAP_ID = '".$row[0]."'");		
	 	while( $column = db_fetchNumeric($stmt2) )
					{
						
					$result = db_fetchNumeric($stmt3);					  
					db_query("DELETE FROM Waarde WHERE waarde_id='".$result[0]."'");
					}
	}
$counter = 0;
$stmt = db_query("select aap_id from aap A where exists(select * from AAPINONDERZOEK AIO where AIO.ONDERZOEK_ID = '" . $currentTest . "'and AIO.aap_id = A.AAP_ID)");		
	while( $aapId =db_fetchNumeric($stmt)  ) 
	{
		$stmt2 = db_query("select VELD_ID from veld where PROEF_ID = '" . $currentResearch . "'");
	 	while( $veldId = db_fetchNumeric($stmt2) )
					{			
			
					db_query("INSERT INTO waarde VALUES (".$veldId[0].",". $aapId[0].",".$username.",".$insertValues[$counter].",'".$date."');");
					$counter++;		
					} 
	}
	db_close();
	$response="succes";
	echo "$response";
?>