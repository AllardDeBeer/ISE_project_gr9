<!doctype html>
<html class="no-js" lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Donkey Kong Research</title>
    <link rel="stylesheet" href="css/foundation.css">
    <link rel="stylesheet" href="css/app.css">
     <link rel="stylesheet" href="css/jquery-ui.min.css">
  </head>
  <body>
    <div class="expanded row">
      <div class="column large-3 left-menu">
        <div class="expanded row logo">
          <div class="column large-4">
            <img src="assets/bprc-logo.jpg"  class="img" alt="BPRC">
          </div>
          <div class="column large-8">
            <h1>BPRC</h1>
          </div>
        </div>
	</div>
      <div class="column large-9 right-screen">
        <div class="large-12">
		<?php
      include 'includes/database_functions.php';

			if(isset($_GET['m'])){
			  if($_GET['m'] == 5){
				echo "<div class=\"alert callout\" data-closable>
				<h5>Oeps er ging iets mis</h5>
				<p>Er bestaat al een gebruiker met deze naam/p>
				<button class=\"close-button\" aria-label=\"Dismiss alert\" type=\"button\" data-close>
				<span aria-hidden=\"true\">&times;</span>
				</button>
				</div>";
				 }else if($_GET['m'] == 6){
        echo "<div class=\"alert callout\" data-closable>
        <h5>Oeps er ging iets mis</h5>
        <p>Wachtwoorden komen niet overeen</p>
        <button class=\"close-button\" aria-label=\"Dismiss alert\" type=\"button\" data-close>
        <span aria-hidden=\"true\">&times;</span>
        </button>
        </div>";
         }else if($_GET['m'] == 7){
        echo "<div class=\"success callout\" data-closable>
        <h5>Welkom =)</h5>
        <p>Gebruiker is aangemaakt!</p>
        <button class=\"close-button\" aria-label=\"Dismiss alert\" type=\"button\" data-close>
        <span aria-hidden=\"true\">&times;</span>
        </button>
        </div>";
         }
			 }
			?>			  
		   <div class="container">
          <div class ="row">
  				  <h2 class="textcenter">Gebruiker registreren</h2>
    				<form action="handlers/user_handler.php" method="POST">			
    					<div class="large-7 large-offset-2">
                Voornaam:
                <input type="text" name="fname"><br>
                Tussenvoegsel:
                <input type="text" name="mname"><br>
                Achternaam:
                <input type="text" name="lname"><br>
    						Gebruikersnaam:
    						<input type="text" name="user"><br>
                Wachtwoord:		
                <input type="password" name="ww"><br> 
                Herhaal Wachtwoord:
                <input type="password" name="wwr"><br> 
                Beveiliginsvraag
                <select name="vraag" id="vraag">
                  <?php
                    db_open();
                    $stmt = db_query("SELECT VRAAG, VRAAG_ID FROM BEVEILIGINGSVRAGEN");
                    while($row = db_fetchAssoc($stmt)){
                      echo "<option value=\"" . $row['VRAAG_ID'] . "\">" . $row['VRAAG'] . "</option>";
                    }
                    db_close();
                  ?>
                </select><br>
                Antwoord
                <input type="text" name="answer"><br> 				
    						<input type="submit" class="button" value="Registreer">
    					</div>
    			  </form>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>