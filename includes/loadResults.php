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
	$aap_ids = array();
	$stmt = db_query("select VELD_NAAM,veld_id from veld where PROEF_ID = '$currentTest'");		
	while( $column = db_fetchNumeric($stmt) ) {
		$response.="<th>$column[0]</th>";
		array_push($velden_array, $column[1]) ; 
	}
	$veld = array();
	$response.="</tr></thead>";
	$waarden_idArray = array();
	$waarden_types = array();
	$waardes = array();
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
		$stmt2 = db_query("select VELD_NAAM,veld_id from veld where PROEF_ID = '$currentTest'");
		$testcounter = 0;	
		$stmt3 = db_query("SELECT waarde,waarden2.veld_id,waarden2.waarde_id,waarden2.waarde_type FROM WAARDEN2 INNER JOIN veld ON veld.VELD_ID=WAARDEN2.VELD_ID where DATUM='".$date."' and AAP_ID = '".$row[0]." 'order by waarden2.VELD_ID");		
	
		while( $column = db_fetchNumeric($stmt2) )
		{
			$stmt4 = db_query("SELECT waarde_type FROM waarde WHERE veld_id = " . $column[1] . "");
			$waarde = db_fetchNumeric($stmt3);
			$huidige_type=db_fetchNumeric($stmt4);
			if(in_array($waarde[1], $velden_array, true))
			{	
				$response.='<td> <input type="text" value="'. $waarde[0].'" name="naam'. $counter .'"></td>';
				$waarden_idArray[$counter] = $waarde[2];
				$waarden_types[$counter] = $huidige_type[0];
				$waardes[$counter] = $waarde[0];
				$veld[$counter] = $column[1];
				$aap_ids[$counter] = $row[0];
			}
			else
			{
				$response.='<td> <input type="text" value="NULL" name="naam'. $counter .'"></td>';
				$waarden_idArray[$counter] = 'NULL';
				$waarden_types[$counter] = $huidige_type[0];
				$waardes[$counter] = NULL;
				$veld[$counter] = $column[1];
				$aap_ids[$counter] = $row[0];
			}
			$counter++;
			}
			$response.='</tr>';
		}
	$_SESSION['apen'] = $aap_ids;		
	$_SESSION['veld'] = $veld;		
	$_SESSION['insertDate'] = $date; 
	$_SESSION['waardeID'] = $waarden_idArray;
	$response.= '<input type ="hidden" value="' . $counter . '" name="boop">';
	$response.=	'<input type="submit" value="opslaan" class="button">';
	$response.='<select name="username" id="username" >';
	$stmt4 = db_query("select gebruikersnaam from gebruiker
	where gebruikersnaam in(
	select gebruikersnaam from gebruikerinonderzoek where onderzoek_id ='" . $currentResearch . "' )
	order by gebruikersnaam");		
		while( $username =db_fetchNumeric($stmt4)  ) 
		{
			$response.='<option value="' . $username[0] . '">' . $username[0] . '</option>';
			
		}
	$_SESSION['types'] = $waarden_types;	
	$response.= '</select>';
	$response.=	'</form>';
	echo "$response";
?>