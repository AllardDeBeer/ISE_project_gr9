<?php
session_start();
include 'database_functions.php';
$q=$_GET["q"];
$split= array();
$split=explode( '||', $q );
$q=$split[0];
$IDs=$split[1];
$IDs=rtrim($IDs, "‽");
$IDarray= array();
$IDarray= explode( '‽', $IDs );
$countIDS=array_count_values($IDarray);
$quarray= array();
$quarray= explode( '‽', $q );
$response="";


$currentResearch=$_SESSION['onderzoek'];

db_open();
$stmt = db_query("SELECT aap_id, behandelgroep, diersoort, geslacht, gewicht, dominant FROM aap
where aap_id not in(select aap_id from aapinonderzoek where onderzoek_id ='$currentResearch ')
and ('".$quarray[0]."' = '' or aap_id like 			'%".$quarray[0]."%')
and ('".$quarray[1]."' = '' or behandelgroep like 	'%".$quarray[1]."%')
and ('".$quarray[2]."' = '' or diersoort like 		'%".$quarray[2]."%')
and ('".$quarray[3]."' = '' or geslacht like 		'%".$quarray[3]."%')
and ('".$quarray[4]."' = '' or gewicht like 		'%".$quarray[4]."%')
and ('".$quarray[5]."' = '' or dominant like 		'%".$quarray[5]."%')
");


$i=0;
while($row = db_fetchAssoc($stmt)) {
	
	
	
	
  $y = array($row['aap_id'], $row['behandelgroep'], $row['diersoort'], $row['geslacht'], $row['gewicht'], $row['dominant']);



    $response .= "<tr>
					<td>" . $y[0] . "</td>
					<td>" . $y[1] . "</td>
					<td>" . $y[2] . "</td>
					<td>" . $y[3]  . "</td>
					<td>" . $y[4]  . "</td>
					<td>" . $y[5]  . "</td>
					<td><input type=\"checkbox\" id=\"select" . $y[0] . "\" value=" . $y[0] . " onchange=\"changeBox(this.value )\"";
				
				
				
				if(isset($countIDS[$y[0]])){
					if($countIDS[$y[0]]%2==1){
					$response .= "checked";
					}	
}
				
				
					$response .= "></td>
					</tr>";
$i+=1;
}
db_close();


    



echo $response;
?> 