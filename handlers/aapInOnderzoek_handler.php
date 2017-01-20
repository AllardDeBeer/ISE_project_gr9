<?php
session_start();
include '../includes/database_functions.php';

$monkeyIDs =$_GET["q"];

$monkeyIDs=rtrim($monkeyIDs, "‽");


$allIdArray= array();
$allIdArray= explode( '‽', $monkeyIDs );
$idArray= array();
$count=array_count_values($allIdArray);
$insertIdArray= array();

for ($x = 0; $x < count($allIdArray); $x++) {
if($count[$allIdArray[$x]]%2==1){
	$idArray[]=$allIdArray[$x];
}	
}
for ($x = 0; $x < count($idArray); $x++) {
	$IDcount=array_count_values($idArray);
	if($IDcount[$idArray[$x]]>1){
	$idArray[$x]='';
}
else{
$insertIdArray[]=$idArray[$x];
}
}

$currentResearch=$_SESSION['onderzoek'];

db_open();



if (empty($insertIdArray[0])){
	
}
else{
foreach ($insertIdArray as $monkey) {
		
	db_query("insert into aapInOnderzoek(aap_id, onderzoek_id) values('". $monkey . "','$currentResearch ') ");
	

}
}
db_close();

?>