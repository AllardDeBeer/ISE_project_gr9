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
  
  $gebruiker = $_GET['user'];
  include '/includes/database_functions.php';
  db_open();
  $result = db_query("SELECT vraag
FROM GEBRUIKER G INNER JOIN BEVEILIGINGSVRAGEN BV ON  G.VRAAG_ID = BV.VRAAG_ID
WHERE GEBRUIKERSNAAM = '$gebruiker' ");

	$vraag = db_fetchNumeric($result);
		if ($vraag == false){

		header('Location:../wachtwoord_vergeten.php?user='.$user.'&m=5');
	}
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
			  	<form action="handlers/wachtwoord_vergeten_handler.php" method="post"">
				<div class="row">

					<div class="large-7 large-offset-2">
					
						
							
						<h4 class="">';
						  if(isset($_GET['m'])){
							  if($_GET['m'] == 1){
							echo "<div class=\"alert callout\" data-closable>
						  <h5>Oeps er ging iets mis</h5>
						  <p>Vul aub uw wachtwoord in.</p>
						  <button class=\"close-button\" aria-label=\"Dismiss alert\" type=\"button\" data-close>
							<span aria-hidden=\"true\">&times;</span>
						  </button>
						</div>";
							  }
						  }
						if(isset($_GET['m'])){
							  if($_GET['m'] == 2){
							echo "<div class=\"alert callout\" data-closable>
						  <h5>Oeps er ging iets mis</h5>
						  <p>De wachtwoorden komen niet overeen. Probeer het aub nog eens.</p>
						  <button class=\"close-button\" aria-label=\"Dismiss alert\" type=\"button\" data-close>
							<span aria-hidden=\"true\">&times;</span>
						  </button>
						</div>";
							  }
						  }
						if(isset($_GET['m'])){
							  if($_GET['m'] == 3){
							echo "<div class=\"alert callout\" data-closable>
						  <h5>Oeps er ging iets mis</h5>
						  <p>Uw wachtwoord is korter dan 5 tekens. Probeer het aub nog eens</p>
						  <button class=\"close-button\" aria-label=\"Dismiss alert\" type=\"button\" data-close>
							<span aria-hidden=\"true\">&times;</span>
						  </button>
						</div>";
							  }
						}	  
						
						if(isset($_GET['m'])){
							  if($_GET['m'] == 4){
							echo "<div class=\"alert callout\" data-closable>
						  <h5>Oeps er ging iets mis</h5>
						  <p>Dit antwoord is niet correct</p>
						  <button class=\"close-button\" aria-label=\"Dismiss alert\" type=\"button\" data-close>
							<span aria-hidden=\"true\">&times;</span>
						  </button>
						</div>";
							  }
						  }
						
						if(isset($_GET['m'])){
							  if($_GET['m'] == 5){
							echo "<div class=\"alert callout\" data-closable>
						  <h5>Oeps er ging iets mis</h5>
						  <p>Geen gebruiker met deze naam</p>
						  <button class=\"close-button\" aria-label=\"Dismiss alert\" type=\"button\" data-close>
							<span aria-hidden=\"true\">&times;</span>
						  </button>
						</div>";
							  }
						  }
						 
						print($vraag[0]);
						echo' </h4>
						
						<input type="text" name="Answer"><br>
						Nieuw wachtwoord:<input type="password" name="Password"><br>
						Herhaal nieuw wachtwoord<input type="password" name="PasswordC"><br>
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