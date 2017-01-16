<?php 
  include '../includes/database_functions.php';
  session_start();
  db_open();
    $stmt_id = db_query("SELECT gebruikersnaam FROM GebruikerInOnderzoek WHERE onderzoek_id =" . $_SESSION['onderzoek']);
    $currentUsers = "";
    while($row = db_fetchAssoc($stmt_id)){
        $currentUsers .= "[".$row['gebruikersnaam']."]";
    }
  db_close();
?>
<script>
  addCurrentUsers('<?php echo $currentUsers ?>');
</script>
<div class="container">
  <div class="row">
    <div class="column large-12">
      <?php
        db_open();
        //print_r($_SESSION);
        if(isset($_SESSION['onderzoek'])){
          $stmt = db_query("SELECT onderzoek_naam, onderzoek_startdatum, onderzoek_einddatum, PROJECTNUMMER FROM onderzoek WHERE onderzoek_id =" . $_SESSION['onderzoek']);
          $onderzoek = db_fetchAssoc($stmt);

          echo "<h3>Beheer " . $onderzoek['onderzoek_naam'] . "</h3>";
        }else{
          echo "<h3>Beheer onderzoek</h3>";
        }
        db_close();
      ?>
    </div>
    <div class="column large-12">
      <form action="handlers/research_handler.php?a=a&id=<?php echo $_SESSION['onderzoek'] ?>" name="newResearch" method="POST" enctype="multipart">
    <label for="researchName">Naam</label>
    <input type="text" name="researchName" value="<?php echo $onderzoek['onderzoek_naam'] ?>" required>
    <div class="expanded row">
      <div class="column large-4">
          Start datum: <input type="text" name="researchStart" value="<?php echo date('d/m/Y', $onderzoek['onderzoek_startdatum']->getTimestamp()); ?>" id="datepickerB">
      </div>
      <div class="column large-4">
          Eind datum: <input type="text" name="reasearchEnd" value="<?php echo date('d/m/Y', $onderzoek['onderzoek_einddatum']->getTimestamp()); ?>" id="datepickerE">
      </div>
      <div class="column large-4">
          Project: <input type="text" name="project" value="<?php echo $onderzoek['PROJECTNUMMER'] ?>">
      </div>
    </div>
    <script>
      $( "#datepickerB" ).datepicker();
      $( "#datepickerE" ).datepicker();
    </script>
  <!-- </div> -->
  <hr>
  <!-- <div class="column large-12"> -->
    <label for="share">Onderzoekers toevoegen</label>
    <input type="text" name="share" id="searchInput" onkeyup="showResult(this.value, 1, 'livesearch')" autocomplete='off'>
    <table>
      <thead>
          <tr>
            <th>Naam</th>
            <th>Tussenvoegsel</th>
            <th>Achternaam</th>
            <th>Selecteer</th>
          </tr>
        </thead>
        <tbody id="livesearch">
         <!-- Live reloaded content -->
         <?php
         $i = 1;
          db_open();
          $stmt = db_query("SELECT G.voornaam, G.tussenvoegsel, G.achternaam, G.gebruikersnaam FROM gebruiker G JOIN GebruikerInOnderzoek GIB ON G.gebruikersnaam = GIB.gebruikersnaam WHERE GIB.onderzoek_id = " . $_SESSION['onderzoek']);
          while($person = db_fetchAssoc($stmt)){
            if($person['gebruikersnaam'] == $_SESSION['username']){
              echo "<tr>
                    <td>" . $person['voornaam'] . "</td>
                    <td>" . $person['tussenvoegsel'] . "</td>
                    <td>" . $person['achternaam'] . "</td>
                    <td><input type=\"checkbox\" name=\"select" . $i . "\" value=" . $person['gebruikersnaam'] . " onchange=\"managePin('" . $person['gebruikersnaam'] . "')\" checked disabled=\"\"></td>
                  </tr>";
                }else{
                  echo "<tr>
                    <td>" . $person['voornaam'] . "</td>
                    <td>" . $person['tussenvoegsel'] . "</td>
                    <td>" . $person['achternaam'] . "</td>
                    <td><input type=\"checkbox\" name=\"select" . $i . "\" value=" . $person['gebruikersnaam'] . " onchange=\"managePin('" . $person['gebruikersnaam'] . "')\" checked></td>
                  </tr>";
                }
            

            $i = $i + 1;
          }
          db_close();

         ?>
      </tbody>
    </table>
    <input type="submit" name="submit" value="Opslaan" class="button">
  </form>
    </div>
  </div>
</div>