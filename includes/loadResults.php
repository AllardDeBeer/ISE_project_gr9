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


	
$currentTest = $currentResearch;
	$stmt = db_query("select aap_id from aap A where exists(
select * from AAPINONDERZOEK AIO where AIO.ONDERZOEK_ID = '" . $currentTest . "'
and AIO.aap_id = A.AAP_ID
)");		
	while( $row =db_fetchNumeric($stmt)  ) 
	{
	$response.= '<tr>
               <td>'.$row[0].'</td>';
                
               $stmt2 = db_query("select VELD_NAAM from veld where PROEF_ID = '" . $currentResearch . "'");	
			$stmt3 = db_query("SELECT waarde FROM WAARDE INNER JOIN veld ON veld.VELD_ID=WAARDE.VELD_ID where DATUM='".$date."' and AAP_ID = '".$row[0]."'");				
			while( $column = db_fetchNumeric($stmt2) )
					{
					$result = db_fetchNumeric($stmt3);					  
					$response.='<td><input type="text" name="'.$column[0].'" value="'.$result[0].'"> </td>';
					}
				$response.='</tr>';
	} 








echo "$response";
?>