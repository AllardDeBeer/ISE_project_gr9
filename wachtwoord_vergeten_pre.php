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
			?>			  
		   <div class="container">
              <div class ="row">
				<h2 class="textcenter">Wachtwoord vergeten</h2>
				<form action="Wachtwoord_vergeten.php?username=""user" method="GET">			
					<div class="large-7 large-offset-2">
						Gebruikersnaam:
						<input type="text" name="user"><br>						
						<input type="submit" class="button" value="Verder">
					</div>
			  </form>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>