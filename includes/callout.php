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