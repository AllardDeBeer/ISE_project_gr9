<?php
  session_start();
  include 'includes/database_functions.php';

  if (!(isset($_SESSION['username']))) {
    header("Refresh:0; ../login.html");
  }
?>

<!doctype html>
<html class="no-js" lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Donkey Kong Research</title>
    <link rel="stylesheet" href="css/foundation.css">
    <link rel="stylesheet" href="css/app.css">
    <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  </head>
  <body onhashchange="updateContainer();" onload="updateContainer();">
    <div class="expanded row">
      <div class="column large-3 left-menu">
        <div class="expanded row logo">
          <div class="column large-4">
            <img src="assets/bprc-logo.jpg" class="img" alt="BPRC">
          </div>
          <div class="column large-8">
            <h1>BPRC</h1>
          </div>
        </div>
        <div class="expanded row menu">
        <h2 class="text-center">Menu</h2>
          <ul class="vertical menu" data-drilldown>
            <li><a href="#nieuw_onderzoek">Nieuw onderzoek</a></li>
            <li>
              <a href="#open_onderzoek">Open onderzoek</a>
              <ul class="vertical menu">
              <?php
                db_open();

                $onderzoeken = db_query("SELECT onderzoek_naam, onderzoek_id FROM onderzoek");
                while($o_row = db_fetchAssoc($onderzoeken)) {
                 // echo "1:" . $o_row['onderzoek_naam'] . "<br>";
                    echo  "<li>
                            <a href=\"#\" onclick=\"setSessionVariable('onderzoek',". $o_row['onderzoek_id'] .")\">" . $o_row['onderzoek_naam'] . "</a>
                            <ul class=\"vertical menu\">
                              <li>
                                <a href=\"#nieuw_proef\">Nieuwe proef</a>
                              </li>
                              <li>
                                <a href=\"#\">Open proef</a>";
                  $proefids = db_query("SELECT proef_id FROM ProefVoorOnderzoek WHERE onderzoek_id = " . $o_row['onderzoek_id']);
                  if(db_hasRows($proefids)){
                      echo "<ul class=\"vertical menu\">";
                      while($pid_row = db_fetchAssoc($proefids)) {
                         $proef = db_fetchAssoc(db_query("SELECT proef_naam FROM proef WHERE proef_id = " . $pid_row['proef_id']));
                         
                         echo  "<li>
                                  <a href=\"#\" onclick=\"setSessionVariable('proef',". $pid_row['proef_id'] .")\">" . $proef['proef_naam'] . "</a>
                                  <ul class=\"vertical menu\">
                                    <li>
                                      <a href=\"#toon_resultaten\">Toon resultaten</a>
                                    </li>
                                    <li>
                                      <a href=\"#nieuw_resultaten\">Voeg resultaten toe</a>
                                    </li>
                                    <li>
                                      <a href=\"#beheer_proef\" style=\"height: 300px;\">Beheer proef</a>
                                    </li>
                                  </ul>
                                </li>";
                         
                      }
                      echo   "</ul>";
                    }
                    echo  "</li>
                          <li>
                            <a href=\"#beheer_onderzoek\" style=\"height: 300px;\">Beheer Onderzoek</a>
                          </li>
                        </ul>
                      </li>";
                }

                db_close();
              ?>
              </ul> 
            </li>  
            <li>
              <a href="#">Beheer apen</a>
              <ul class="vertical menu">
                <li><a href="#apen_importeren">Apen toevoegen</a></li>
                <li><a href="#verwijder_apen">Apen verwijderen</a></li>
              </ul>
            </li>
          </ul>
        </div>
        <div class="expanded row settings align-self-bottom">
          <div class="column large-12 researcher">
            <h4 class="text-center"><?php echo 'Welkom, '.$_SESSION['firstname']. ' '.$_SESSION['insertion'].' '.$_SESSION['surname'] ?></h4>
            <p class="text-center"><?php echo 'Uw laatste login was op: '.$_SESSION['last_login'] ?></p>
          </div>
          <div class="column large-12">
            <div class="button-group">
              <a class="hollow expanded button" href="#instellingen" ><i class="material-icons">settings</i>Instellingen</a>
              <a class="hollow expanded button"><i class="material-icons">exit_to_app</i>Log uit</a>
            </div>
          </div>
        </div>
      </div>
      <div class="column large-9 right-screen">
        <div class="large-12">
        <?php 
		if (isset($get['m'])){
          if($_GET['m'] == 1){
            echo "<div class=\"success callout\" data-closable=\"slide-out-right\">
                    <h5>Gelukt!</h5>
                    <p>Onderzoek is succesvol aangemaakt.</p>
                    <button class=\"close-button\" aria-label=\"Dismiss alert\" type=\"button\" data-close>
                      <span aria-hidden=\"true\">&times;</span>
                    </button>
                  </div>";
            }else if($_GET['m'] == 2){
            echo "<div class=\"success callout\" data-closable=\"slide-out-right\">
                    <h5>Gelukt!</h5>
                    <p>Onderzoek is succesvol aangepast.</p>
                    <button class=\"close-button\" aria-label=\"Dismiss alert\" type=\"button\" data-close>
                      <span aria-hidden=\"true\">&times;</span>
                    </button>
                  </div>";
            }else if($_GET['m'] == 3){
            echo "<div class=\"success callout\" data-closable=\"slide-out-right\">
                    <h5>Gelukt!</h5>
                    <p>De a(a)p(en) zijn/is succesvol verwijderd</p>
                    <button class=\"close-button\" aria-label=\"Dismiss alert\" type=\"button\" data-close>
                      <span aria-hidden=\"true\">&times;</span>
                    </button>
                  </div>";
            }else if($_GET['m'] == 4){
            echo "<div class=\"success callout\" data-closable=\"slide-out-right\">
                    <h5>Gelukt!</h5>
                    <p>De gegevens zijn succesvol geïmporteerd</p>
                    <button class=\"close-button\" aria-label=\"Dismiss alert\" type=\"button\" data-close>
                      <span aria-hidden=\"true\">&times;</span>
                    </button>
                  </div>";

            }
		

			else if($_GET['m'] == 5){
            echo "<div class=\"warning callout\" data-closable=\"slide-out-right\">
                    <h5>Niet gelukt</h5>
                    <p>Vul aub alle relevante velden in.</p>
                    <button class=\"close-button\" aria-label=\"Dismiss alert\" type=\"button\" data-close>
                      <span aria-hidden=\"true\">&times;</span>
                    </button>
                  </div>";	
            }else if($_GET['m'] == 6){
            echo "<div class=\"warning callout\" data-closable=\"slide-out-right\">
                    <h5>Niet gelukt</h5>
                    <p>De twee wachtwoorden komen niet overeen</p>
                    <button class=\"close-button\" aria-label=\"Dismiss alert\" type=\"button\" data-close>
                      <span aria-hidden=\"true\">&times;</span>
                    </button>
					</div>";}
			else if($_GET['m'] == 7){
            echo "<div class=\"warning callout\" data-closable=\"slide-out-right\">
                    <h5>Niet gelukt</h5>
                    <p>Het gekozen wachtwoord is te kort. Maak deze langer dan 4 tekens aub.</p>
                    <button class=\"close-button\" aria-label=\"Dismiss alert\" type=\"button\" data-close>
                      <span aria-hidden=\"true\">&times;</span>
                    </button>
				</div>";}
			else if($_GET['m'] == 8){
            echo "<div class=\"warning callout\" data-closable=\"slide-out-right\">
                    <h5Niet gelukt</h5>
                    <p>Het oude wachtwoord is niet correct</p>
                    <button class=\"close-button\" aria-label=\"Dismiss alert\" type=\"button\" data-close>
                      <span aria-hidden=\"true\">&times;</span>
                    </button>
				</div>";}
			else if($_GET['m'] == 9){
            echo "<div class=\"warning callout\" data-closable=\"slide-out-right\">
                    <h5>Gelukt!</h5>
                    <p>Uw wachtwoord is veranderd</p>
                    <button class=\"close-button\" aria-label=\"Dismiss alert\" type=\"button\" data-close>
                      <span aria-hidden=\"true\">&times;</span>
                    </button>
				</div>";}
			else if($_GET['m'] == 10){
            echo "<div class=\"warning callout\" data-closable=\"slide-out-right\">
                    <h5>Niet gelukt</h5>
                    <p>Deze gebruikersnaam is incorrect</p>
                    <button class=\"close-button\" aria-label=\"Dismiss alert\" type=\"button\" data-close>
                      <span aria-hidden=\"true\">&times;</span>
                    </button>
				</div>";}
			else if($_GET['m'] == 11){
            echo "<div class=\"success callout\" data-closable=\"slide-out-right\">
                    <h5>Gelukt</h5>
                    <p>Uw gebruikersnaam is succesvol veranderd</p>
                    <button class=\"close-button\" aria-label=\"Dismiss alert\" type=\"button\" data-close>
                      <span aria-hidden=\"true\">&times;</span>
                    </button>
				</div>";}
			else if($_GET['m'] == 12){
            echo "<div class=\"warning callout\" data-closable=\"slide-out-right\">
                    <h5>Niet gelukt</h5>
                    <p>Uw gekozen gebruikersnaam is te kort. Maak deze groter dan 2 tekens aub/p>
                    <button class=\"close-button\" aria-label=\"Dismiss alert\" type=\"button\" data-close>
                      <span aria-hidden=\"true\">&times;</span>
                    </button>
				</div>";}
}
          ?>


          <div class="container">

          </div>
        </div>
      </div>
    </div>


	
	
    <script src="js/vendor/jquery.js"></script>
    <script src="js/vendor/what-input.js"></script>
    <script src="js/vendor/foundation.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
    <script src="js/app.js"></script>
  </body>
</html>
