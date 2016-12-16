<html class="no-js" lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Donkey Kong Research</title>
    <link rel="stylesheet" href="css/foundation.css">
    <link rel="stylesheet" href="css/app.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	
  </head>
  <body>
 
  <?php
	include 'includes/functionsJ.php';
	db_open();
	$gebruiker = $_POST["user"];
	$wachtwoord= $_POST["Password"];
	$wachtwoordC = $_POST["PasswordC"];
	$antwoord = $_POST["Answer"];
	$db;
	$serverName = "(local)\SQLEXPRESS";
	$connectionInfo = array( "Database"=>"DonkeyKong",  "UID"=>"sa", "PWD"=>"rammus");
	$conn = sqlsrv_connect( $serverName, $connectionInfo);
	$blabla ="SELECT gebruikersnaam,antwoord FROM gebruiker WHERE gebruikersnaam = '$gebruiker' AND antwoord = '$antwoord' ";
	$SQLquery = sqlsrv_query($conn,$blabla);
  WachtwoordVergeten($gebruiker,$wachtwoord,$wachtwoordC,$antwoord,$blabla);

    ?>
  </body>
</html>