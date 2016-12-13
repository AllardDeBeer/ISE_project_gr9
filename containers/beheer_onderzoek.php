<?php 
  include '../includes/database_functions.php';
  session_start();
?>
<div class="container">
  <div class="row">
    <div class="column large-12">
      <?php
        db_open();
        //print_r($_SESSION);
        if(isset($_SESSION['onderzoek'])){
          $stmt = db_query("SELECT onderzoek_naam FROM onderzoek WHERE onderzoek_id =" . $_SESSION['onderzoek']);
          $naam = db_fetchAssoc($stmt)['onderzoek_naam'];

          echo "<h3>Beheer " . $naam . "</h3>";
        }else{
          echo "<h3>Beheer onderzoek</h3>";
        }
        db_close();
      ?>
    </div>
    <div class="column large-12">
      <form action="#" name="newResearch" method="POST" enctype="multipart">
        <label for="researchName">Naam</label>
        <input type="text" name="researchName" value="<?php echo $naam ?>" required>
        <input type="submit" name="submit" value="Opslaan" class="button">
      </form>
    </div>
    <div class="column large-12">
      <form action="#" name="shareResearch" method="POST" enctype="multipart">
        <label for="share">Onderzoekers toevoegen</label>
        <input type="text" name="share" required>
        <table>
          <thead>
            <tr>
              <th>Naam</th>
              <th>Tussenvoegsel</th>
              <th>Achternaam</th>
              <th>Selecteer</th>
            </tr>
          </thead>
          <tbody>
            <?php
              db_open();

              $stmt_id = db_query("SELECT gebruiker_id FROM GebruikerInOnderzoek WHERE onderzoek_id =" . $_SESSION['onderzoek']);
              $i = 0;
              while($row = db_fetchAssoc($stmt_id)){
                  $person = db_fetchAssoc(db_query("SELECT voornaam, tussenvoegsel, achternaam FROM Gebruiker WHERE gebruiker_id =" . $row['gebruiker_id']));
                  echo "<tr>
                          <td>" . $person['voornaam'] . "</td>
                          <td>" . $person['tussenvoegsel'] . "</td>
                          <td>" . $person['achternaam'] . "</td>
                          <td><input type=\"checkbox\" name=\"select" . $i . "\" value=\"HdV\"></td>
                        </tr>";
                  $i = $i + 1;
              }

              db_close()
            ?>
          </tbody>
        </table>
        <input type="submit" name="submit" value="Verwijder" class="button right">
      </form>
    </div>
  </div>
</div>