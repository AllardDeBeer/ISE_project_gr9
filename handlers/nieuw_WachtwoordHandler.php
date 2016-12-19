<?php
include '../includes/FunctionsJ.php';
db_open();
$serverName = "(local)\SQLEXPRESS";
$connectionInfo = array( "Database"=>"DonkeyKong",  "UID"=>"sa", "PWD"=>"rammus");
$conn = sqlsrv_connect( $serverName, $connectionInfo);


$result = db_query("SELECT vraag
FROM GEBRUIKER G INNER JOIN BEVEILIGINGSVRAGEN BV ON  G.VRAAG_ID = BV.VRAAG_ID
WHERE GEBRUIKERSNAAM = '$gebruiker' ");
$WWCheck = db_fetchNumeric($result);
if(empty($WWCheck)){
}
else
nieuwWachtwoord();
?>