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
	include '../includes/functionsJ.php';
	db_open();
	$gebruiker = htmlspecialchars($_POST["user"]);
	$wachtwoord= htmlspecialchars($_POST["Password"]);
	$wachtwoordC = htmlspecialchars($_POST["PasswordC"]);
	$antwoord = htmlspecialchars($_POST["Answer"]);
	WachtwoordVergeten($gebruiker,$wachtwoord,$wachtwoordC,$antwoord);
    ?>
  </body>
</html>