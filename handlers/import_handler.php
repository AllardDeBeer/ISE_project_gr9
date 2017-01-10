<?php
include '../includes/database_functions.php';

$file = fopen($_FILES['file']["tmp_name"],"r");

$file_content = stream_get_contents ($file);
$file_content_corrected = str_replace(",", ".", $file_content);

$csv_stage1 = explode(PHP_EOL, $file_content_corrected);
$csv_stage2 = array();
foreach ($csv_stage1 as $row) {
	array_push($csv_stage2, explode(";", $row));
}

db_open();
foreach ($csv_stage2 as $row) {
	//echo $row[0] . " " . $row[1] . " " . $row[2] . " " . $row[3] . " " . $row[4] . " " . $row[5] . "<br>";
	if($row[0] != "Naam"){
		db_query("SET LANGUAGE british");
		db_query("INSERT INTO aap(AAP_ID , GEBOORTEDATUM, DIERSOORT, GESLACHT, GEWICHT, DATUMGEWICHTMETING) 
	 			  VALUES ('" . $row[0] . "','" . $row[1] . "','" . $row[2] . "','" . $row[3] . "','" . $row[4] . "','" . $row[5] . "')");
		db_query("SET LANGUAGE us_english");
	}
}
db_close();

fclose($file);

header('Location: ../?m=4#apen_importeren');

?>