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
          <div class="loginmargin">
          <?php 
			    if (isset($_GET['m'])) {
            if ($_GET['m'] == 1) {
              echo "<div class=\"success callout\" data-closable=\"slide-out-right\">
                              <h5>Mislukt!</h5>
                              <p>Uw gebruikersnaam of wachtwoord is fout. Als u uw wachtwoord niet meer weet kunt u op wachtwoord vergeten klikken.
                                 Als u uw gebruikersnaam niet meer weet moet u naar de systeemadmin gaan.</p>
                              <button class=\"close-button\" aria-label=\"Dismiss alert\" type=\"button\" data-close>
                                <span aria-hidden=\"true\">&times;</span>
                              </button>
                            </div>";
            }
          }
          ?>
					  <div class="row">
							<div class="large-5 large-offset-3 large-offset-1 columns loginmargin"><h1> Donkey Kong</h1> </div>
					  </div>

						<div class ="row">
							<div class="large-4 large-offset-3 columns">
								<form action="handlers/login_handler.php" method="POST">
									Gebruikersnaam: <input type="text" name="username"><br>
									Wachtwoord: <input type="password" name="password"><br>
									<div class="wwvergeten">
										<a href="wachtwoord_vergeten_pre.php"> Wachtwoord vergeten?</a> 
									</div>
									<div class ="row">
										<input type="submit" class="button" value="Submit">
									</div>
								</form>
						 	</div>
				 		</div>

					</div>
	  		</div>
	  	</div>
	  	
    <script src="js/vendor/jquery.js"></script>
    <script src="js/vendor/what-input.js"></script>
    <script src="js/vendor/foundation.js"></script>
    <script src="js/app.js"></script>
  </body>
</html>
