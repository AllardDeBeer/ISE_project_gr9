<?php
  include 'includes/database_functions.php';
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
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  </head>
  <body onhashchange="updateContainer();">
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
        <div class="expanded row menu">
        <h2 class="text-center">Menu</h2>
        <?php 
          
        ?>
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
                            <a href=\"#\">" . $o_row['onderzoek_naam'] . "</a>
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
                                  <a href=\"#\">" . $proef['proef_naam'] . "</a>
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
                <li><a href="#toevoegen_apen">Apen toevoegen</a></li>
                <li><a href="#verwijder_apen">Apen verwijderen</a></li>
              </ul>
            </li>
          </ul>
        </div>
        <div class="expanded row settings align-self-bottom">
          <div class="column large-12 researcher">
            <h4 class="text-center">Ingrid Phillippens</h4>
          </div>
          <div class="column large-12">
            <div class="button-group">
              <a class="hollow expanded button"><i class="material-icons">settings</i>Instellingen</a>
              <a class="hollow expanded button"><i class="material-icons">exit_to_app</i>Log uit</a>
            </div>
          </div>
        </div>
      </div>
      <duv class="column large-9 right-screen">
        <div class="large-12">
          <div class="container">
            
          </div>
        </div>
      </duv>
    </div>

    <script src="js/vendor/jquery.js"></script>
    <script src="js/vendor/what-input.js"></script>
    <script src="js/vendor/foundation.js"></script>
    <script src="js/app.js"></script>
  </body>
</html>