<?php
include '../includes/database_functions.php';

$monkeys = array();
$i = 1;
while(isset($_POST['select' . $i])){
	array_push($monkeys, $_POST['select' . $i]);
	$i = $i + 1;
}

db_open();

foreach ($monkeys as $monkey) {
	db_query("DELETE FROM aap WHERE aap_id = " . $monkey);
}

db_close();

header('Location: ../?m=3#verwijder_apen');

?>