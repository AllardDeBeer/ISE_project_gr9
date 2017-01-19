<?php 
	session_start();
	include '/database_functions.php';
	$date=$_GET["q"];
	$response = "";
	db_open();
	$currentResearch = $_SESSION['onderzoek'];
	$currentTest = $_SESSION['proef'];
	$velden_array = array();
	$response.="<th>aap</th>";
	$stmt = db_query("select VELD_NAAM,veld_id from veld where PROEF_ID = '$currentTest'");		
	while( $column = db_fetchNumeric($stmt) ) {
		$response.="<th>$column[0]</th>";
		array_push($velden_array, $column[1]) ; 
	}
	$response.="</tr></thead>";
	$array = array();
	$testcounter = 0;
	$counter=0;
	$aapCounter=0;
	$waardecount = 0;		
	$stmt = db_query("select aap_id from aap A where exists(
	select * from AAPINONDERZOEK AIO where AIO.ONDERZOEK_ID = '$currentTest'
	and AIO.aap_id = A.AAP_ID
	)");		
	while( $row =db_fetchNumeric($stmt)  ) 
	{
		$response.= '<tr>
		<td>'.$row[0].'</td>';
		$aapCounter++;
		$stmt2 = db_query("select VELD_NAAM from veld where PROEF_ID = '$currentTest'");
		$testcounter = 0;	
		$stmt3 = db_query("SELECT waarde,waarden2.veld_id,waarden2.waarde_id FROM WAARDEN2 INNER JOIN veld ON veld.VELD_ID=WAARDEN2.VELD_ID where DATUM='".$date."' and AAP_ID = '".$row[0]." 'order by waarden2.VELD_ID");		
		while( $column = db_fetchNumeric($stmt2) )
		{
			$waarde = db_fetchNumeric($stmt3);
			if(in_array($waarde[1], $velden_array, true))
			{
				$response.='<td> <input type="text" value="'. $waarde[0].'" name="naam'. $counter .'"></td>';
			}
			else
			{
				$response.='<td> <input type="text" value="NULL" name="naam'. $counter .'"></td>';
			}
			$counter++;
			$array[] = $waarde[0];
			}
			$response.='</tr>';
		}	


	$value="";
	//$value.= '‽';
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
	where gebruikersnaam in(
	select gebruikersnaam from gebruikerinonderzoek where onderzoek_id ='" . $currentResearch . "' )
	order by gebruikersnaam");		
		while( $username =db_fetchNumeric($stmt4)  ) 
		{
			$response.='<option value="' . $username[0] . '">' . $username[0] . '</option>';
			
		}
				
	$response.= '</select>';


	$response.='<input type="hidden" name="insertArray" id="insertArray" value="'.$value.'">';
	$response.=	'<input type="Submit" value="opslaan">';
	$response.=	'</form>';
	echo "$response";
?>