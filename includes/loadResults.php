<?php 
session_start();
include '/database_functions.php';
$date=$_GET["q"];
$response = "";
db_open();
//$_SESSION['selectedDate'] = $q ;
//$date= $_SESSION['selectedDate'];

//
$currentResearch = 1;
				//$date = @date('Y-m-d');
				//$date = @date('2016-12-19');
//

    //
		$response.="<th>aap</th>";
				
				$stmt = db_query("select VELD_NAAM from veld where PROEF_ID = '" . $currentResearch . "'");		
			  while( $column = db_fetchNumeric($stmt) ) {
					$response.="<th>$column[0]</th>";
					
				}
				
				$response.="</tr>
            </thead>";


	$counter=0;
	$aapCounter=0;
$currentTest = $currentResearch;
	$stmt = db_query("select aap_id from aap A where exists(
select * from AAPINONDERZOEK AIO where AIO.ONDERZOEK_ID = '" . $currentTest . "'
and AIO.aap_id = A.AAP_ID
)");		
	while( $row =db_fetchNumeric($stmt)  ) 
	{
	$response.= '<tr>
               <td>'.$row[0].'</td>';
                $aapCounter++;
               $stmt2 = db_query("select VELD_NAAM from veld where PROEF_ID = '" . $currentResearch . "'");	
			$stmt3 = db_query("SELECT waarde, veld.VELD_ID FROM WAARDE INNER JOIN veld ON veld.VELD_ID=WAARDE.VELD_ID where DATUM='".$date."' and AAP_ID = '".$row[0]."'");				
			while( $column = db_fetchNumeric($stmt2) )
					{
					$result = db_fetchNumeric($stmt3);					  
					$response.='<td><input type="text" name="'.$column[0].'" value="'.$result[0].'"> </td>';
					$counter++;
					}
				$response.='</tr>';
	} 




$value="";
$value.= '‽';
$value.= $date;
$value.= '‽';
$value.= $counter;
$value.= '‽';
$value.= $aapCounter;
for ($x = 0; $x < count($array); $x++) {
	$value.= '‽';
    $value.= $array[$x];
	
}  


 $response.='<input type="hidden" name="insertArray" id="insertArray" value="'.$value.'">';
$response.=	'<input type="button" value="opslaan" class="button right" onclick="showResult(document.getElementById("insertArray").value , 5">'
echo "$response";
?>