<!doctype html>
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
  $gebruiker = $_GET[user];
  include '/includes/database_functions.php';
  db_open();
  $result = db_query("SELECT vraag
FROM GEBRUIKER G INNER JOIN BEVEILIGINGSVRAGEN BV ON  G.VRAAG_ID = BV.VRAAG_ID
WHERE GEBRUIKERSNAAM = '$gebruiker' ");
	$vraag = db_fetchNumeric($result);
	echo'
    <div class="expanded row">
      <div class="column large-3 left-menu">
        <div class="expanded row logo">
          <div class="column large-4">
            <img src="http://placehold.it/300x200" class="img" alt="BPRC">
          </div>
          <div class="column large-8">
            <h1>BPRC</h1>
          </div>
        </div>
	</div>
      <div class="column large-9 right-screen">
        <div class="large-12">
          <div class="container">
              <div class ="row">
				<h2 class="textcenter">Wachtwoord vergeten</h2>
			  	<form action="wachtwoord_vergetenHandler.php" method="post"">
				<div class="row">

					<div class="large-7 large-offset-2">
					
						
							
						<h4 class="">';
						print($vraag[0]);
						echo' </h4>
						
						<input type="text" name="Answer"><br>
						Nieuw wachtwoord:<input type="text" name="Password"><br>
						Herhaal nieuw wachtwoord<input type="text" name="PasswordC"><br>
						<input type ="hidden" name="user" Value="'; echo htmlspecialchars($gebruiker); echo '">
						<input type="submit" class="button" value="Submit">
					</div>
			  </form>
          </div>
        </div>
      </div>
    </div>
	';
?>
  </body>
</html>