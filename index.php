<?php
  session_start();
  include 'includes/database_functions.php';

  if (!(isset($_SESSION['username']))) {
    header("Refresh:0; ../login.php");
  }
?>

<!doctype html>
<html class="no-js" lang="nl" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Donkey Kong Research</title>
    <link rel="stylesheet" href="css/foundation.css">
    <link rel="stylesheet" href="css/app.css">
    <link rel="stylesheet" href="css/jquery-ui.min.css">
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
        <div class="expanded row menu" id="menu">
        <h2 class="text-center" id="menu-title">Menu</h2>
          <ul class="vertical menu"  data-drilldown>
            <li><a href="#nieuw_onderzoek">Nieuw onderzoek</a></li>
            <li>
              <a href="#open_onderzoek">Open onderzoek</a>
              <ul class="vertical menu">
              <?php
                db_open();

                $onderzoeken = db_query(" SELECT O.onderzoek_naam, O.onderzoek_id 
                                          FROM onderzoek O JOIN GebruikerInOnderzoek GIO 
                                                  ON O.onderzoek_id = GIO.onderzoek_id
                                          WHERE GIO.gebruikersnaam = '" . $_SESSION['username'] . "'");
                while($o_row = db_fetchAssoc($onderzoeken)) {
                 // echo "1:" . $o_row['onderzoek_naam'] . "<br>";
                    echo  "<li>
                            <a href=\"#\" onclick=\"setSessionVariable('onderzoek',". $o_row['onderzoek_id'] .")\">" . $o_row['onderzoek_naam'] . "</a>
                            <ul class=\"vertical menu\">
                              <li>
                                <a href=\"#nieuw_proef\">Nieuwe proef</a>
                              </li>
							  <li>
                                <a href=\"#aap_In_onderzoek\">Nieuwe aap toevoegen</a>
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
            <p class="text-center">
            <?php if ($_SESSION['last_login'] != 'first_login') {
                    echo 'Uw laatste login was op: '.$_SESSION['last_login'];
                  } else {
                    echo 'Dit is uw eerste login!';
                  }
            ?>
            </p>
          </div>
          <div class="column large-12">
            <div class="button-group">
              <a class="hollow expanded button" href="#instellingen" ><i class="material-icons">settings</i>Instellingen</a>
              <a class="hollow expanded button" href="../sessionkiller.php"><i class="material-icons">exit_to_app</i>Log uit</a>
            </div>
          </div>
        </div>
      </div>
      <div class="column large-9 right-screen">
        <div class="large-12">
        <?php 
		if (isset($_GET['m'])){
          if($_GET['m'] == 1){
            echo "<div class=\"success callout\" data-closable=\"slide-out-right\">
                            <h5>Gelukt!</h5>
                            <p>Onderzoek is succesvol aangemaakt.</p>
                            <button class=\"close-button\" aria-label=\"Dismiss alert\" type=\"button\" data-close>
                              <span aria-hidden=\"true\">&times;</span>
                            </button>
                          </div>";
          } else if ($_GET['m'] == 2) {
            echo "<div class=\"success callout\" data-closable=\"slide-out-right\">
                            <h5>Gelukt!</h5>
                            <p>Onderzoek is succesvol aangepast.</p>
                            <button class=\"close-button\" aria-label=\"Dismiss alert\" type=\"button\" data-close>
                              <span aria-hidden=\"true\">&times;</span>
                            </button>
                          </div>";
          } else if ($_GET['m'] == 3) {
            echo "<div class=\"success callout\" data-closable=\"slide-out-right\">
                            <h5>Gelukt!</h5>
                            <p>De a(a)p(en) zijn/is succesvol verwijderd</p>
                            <button class=\"close-button\" aria-label=\"Dismiss alert\" type=\"button\" data-close>
                              <span aria-hidden=\"true\">&times;</span>
                            </button>
                          </div>";
          } else if ($_GET['m'] == 4) {
            echo "<div class=\"success callout\" data-closable=\"slide-out-right\">
                            <h5>Gelukt!</h5>
                            <p>De gegevens zijn succesvol geïmporteerd</p>
                            <button class=\"close-button\" aria-label=\"Dismiss alert\" type=\"button\" data-close>
                              <span aria-hidden=\"true\">&times;</span>
                            </button>
                          </div>";
          } else if ($_GET['m'] == 5) {
            echo "<div class=\"warning callout\" data-closable=\"slide-out-right\">
                            <h5>Niet gelukt</h5>
                            <p>Vul aub alle relevante velden in.</p>
                            <button class=\"close-button\" aria-label=\"Dismiss alert\" type=\"button\" data-close>
                              <span aria-hidden=\"true\">&times;</span>
                            </button>
                          </div>";
          } else if ($_GET['m'] == 6) {
            echo "<div class=\"warning callout\" data-closable=\"slide-out-right\">
                            <h5>Niet gelukt</h5>
                            <p>De twee wachtwoorden komen niet overeen</p>
                            <button class=\"close-button\" aria-label=\"Dismiss alert\" type=\"button\" data-close>
                              <span aria-hidden=\"true\">&times;</span>
                            </button>
                            </div>";
          } else if ($_GET['m'] == 7) {
            echo "<div class=\"warning callout\" data-closable=\"slide-out-right\">
                            <h5>Niet gelukt</h5>
                            <p>Het gekozen wachtwoord is te kort. Maak deze langer dan 4 tekens aub.</p>
                            <button class=\"close-button\" aria-label=\"Dismiss alert\" type=\"button\" data-close>
                              <span aria-hidden=\"true\">&times;</span>
                            </button>
                        </div>";
          } else if ($_GET['m'] == 8) {
            echo "<div class=\"warning callout\" data-closable=\"slide-out-right\">
                            <h5Niet gelukt</h5>
                            <p>Het oude wachtwoord is niet correct</p>
                            <button class=\"close-button\" aria-label=\"Dismiss alert\" type=\"button\" data-close>
                              <span aria-hidden=\"true\">&times;</span>
                            </button>
                        </div>";
          } else if ($_GET['m'] == 9) {
            echo "<div class=\"warning callout\" data-closable=\"slide-out-right\">
                            <h5>Gelukt!</h5>
                            <p>Uw wachtwoord is veranderd</p>
                            <button class=\"close-button\" aria-label=\"Dismiss alert\" type=\"button\" data-close>
                              <span aria-hidden=\"true\">&times;</span>
                            </button>
                        </div>";
          } else if ($_GET['m'] == 10) {
            echo "<div class=\"warning callout\" data-closable=\"slide-out-right\">
                            <h5>Niet gelukt</h5>
                            <p>Deze gebruikersnaam is incorrect</p>
                            <button class=\"close-button\" aria-label=\"Dismiss alert\" type=\"button\" data-close>
                              <span aria-hidden=\"true\">&times;</span>
                            </button>
                        </div>";
          } else if ($_GET['m'] == 11) {
            echo "<div class=\"success callout\" data-closable=\"slide-out-right\">
                            <h5>Gelukt</h5>
                            <p>Uw gebruikersnaam is succesvol veranderd</p>
                            <button class=\"close-button\" aria-label=\"Dismiss alert\" type=\"button\" data-close>
                              <span aria-hidden=\"true\">&times;</span>
                            </button>
                        </div>";
          } else if ($_GET['m'] == 12) {
            echo "<div class=\"warning callout\" data-closable=\"slide-out-right\">
                            <h5>Niet gelukt</h5>
                            <p>Uw gekozen gebruikersnaam is te kort. Maak deze groter dan 2 tekens aub/p>
                            <button class=\"close-button\" aria-label=\"Dismiss alert\" type=\"button\" data-close>
                              <span aria-hidden=\"true\">&times;</span>
                            </button>
                        </div>";
          } else if ($_GET['m'] == 13) {
            echo "<div class=\"warning callout\" data-closable=\"slide-out-right\">
                            <h5>Er is een fout opgetreden</h5>
                            <p>De naam van de proef bestaat al!</p>
                            <button class=\"close-button\" aria-label=\"Dismiss alert\" type=\"button\" data-close>
                              <span aria-hidden=\"true\">&times;</span>
                            </button>
                          </div>";
          } else if ($_GET['m'] == 14) {
            $waarden = '';
            foreach ($_SESSION['arrayDiff'] as $var) {
              $vars = explode('||', $var);
              $waarden .= "'" . $vars[0] . "'";
              $waarden .= ', ';
            }
            echo "<div class=\"warning callout\" data-closable=\"slide-out-right\">
                            <h5>Pas op!</h5>
                            <p>De kolom(men): " . $waarden . " bevat(ten) nog waarden! Weet u zeker dat u deze waarden wilt verwijderen?</p>
                            <a href='../handlers/proef_handler.php?value=opslaanBeheerProefDefinitief'>Ja</a>
                            <a href='index.php#beheer_proef'>Nee</a>
                            <button class=\"close-button\" aria-label=\"Dismiss alert\" type=\"button\" data-close>
                              <span aria-hidden=\"true\">&times;</span>
                            </button>
                          </div>";
          } else if ($_GET['m'] == 15) {
            echo "<div class=\"success callout\" data-closable=\"slide-out-right\">
                            <h5>Gelukt!</h5>
                            <p>De veld(en) is/zijn succesvol aangepast!</p>
                            <button class=\"close-button\" aria-label=\"Dismiss alert\" type=\"button\" data-close>
                              <span aria-hidden=\"true\">&times;</span>
                            </button>
                          </div>";
          } else if ($_GET['m'] == 16) {
            echo "<div class=\"success callout\" data-closable=\"slide-out-right\">
                            <h5>Gelukt!</h5>
                            <p>De proef is aangemaakt!</p>
                            <button class=\"close-button\" aria-label=\"Dismiss alert\" type=\"button\" data-close>
                              <span aria-hidden=\"true\">&times;</span>
                            </button>
                          </div>";
          }
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
    <script src="js/vendor/chart.js"></script>
    <script src="js/vendor/jquery-ui.min.js"></script>
    <script src="js/app.js"></script>
  </body>
</html>
