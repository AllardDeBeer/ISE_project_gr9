<?php 
session_start();
include '/database_functions.php';
$date=$_GET["q"];
$response = "";
db_open();

$currentResearch = 1 ;//$_session['onderzoek'];
$currentTest = 1 ;//$_session['proef'];

		$response.="<th>aap</th>";
				
				$stmt = db_query("select VELD_NAAM from veld where PROEF_ID = '" . $currentResearch . "'");		
				while( $column = db_fetchNumeric($stmt) ) {
					$response.="<th>$column[0]</th>";
					
				}
				
$response.="</tr></thead>";

$array = array();
$counter=0;
$aapCounter=0;

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
			$stmt3 = db_query("SELECT waarde FROM WAARDE INNER JOIN veld ON veld.VELD_ID=WAARDE.VELD_ID where DATUM='".$date."' and AAP_ID = '".$row[0]."'");				
			while( $column = db_fetchNumeric($stmt2) )
					{
					$result = db_fetchNumeric($stmt3);					  
					$response.='<td><input type="text" name="'.$column[0].'" value="'.$result[0].'"> </td>';
					$counter++;
					$array[] = $result[0];

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



$response.='<select name="username" id="username" >';
$stmt4 = db_query("select gebruikersnaam from gebruiker
where gebruiker_id in(
select GEBRUIKER_ID from gebruikerinonderzoek where onderzoek_id ='" . $currentResearch . "' )
order by gebruikersnaam");		
	while( $username =db_fetchNumeric($stmt4)  ) 
	{
		$response.='<option value="' . $username[0] . '">' . $username[0] . '</option>';
		
	}
			
$response.= '</select>';


$response.='<input type="hidden" name="insertArray" id="insertArray" value="'.$value.'">';
$response.=	'<input type="button" value="opslaan" class="button right" onclick="showresults(document.getElementById(\'username\').value+document.getElementById("insertArray").value , 7,resultsTable)">';
echo "$response";
?>