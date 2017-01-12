<?php
include '../includes/database_functions.php';
$monkeys = array();
$monkeys =$_GET["q"];
//$i = 1;
//while(isset($_POST['select' . $i])){
//	array_push($monkeys, $_POST['select' . $i]);
//	$i = $i + 1;
//}

db_open();

foreach ($monkeys as $monkey) {
		
	db_query("insert into aapInOnderzoek(aap_id, onderzoek_id) values(". $monkey . ",". $_session['onderzoek']. ")");
	
}

db_close();

//header('Location: ../?m=3#verwijder_apen');

?>