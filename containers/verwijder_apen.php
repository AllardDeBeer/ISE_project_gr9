<?php
  include '../includes/database_functions.php';
  session_start();
?>
<div class="container">
  <div class="row">
    <div class="column large-12">
      <h3>Apen verwijderen</h3>
    </div>
    <div class="column large-12">
      <form action="handlers/mokey_handler.php" name="deleteMoneyForm" method="POST" enctype="multipart">
        <label for="share">Zoeken</label>
        <input type="text" name="share" id="searchInput" onkeyup="showResult(this.value, 2)" autocomplete='off'>
        <table>
          <thead>
            <tr>
              <th>Naam</th>
              <th>Geboortedatum</th>
              <th>Geslacht</th>
              <th>Gewicht</th>
              <th>Selecteer</th>
            </tr>
          </thead>
          <tbody id="livesearch">
            <!-- Live reloading content -->
            <?php
              db_open();
              $stmt = db_query("SELECT aap_id, geboortedatum, geslacht, gewicht FROM aap");
              $i = 0;
              while($row = db_fetchAssoc($stmt)) {
                echo "<tr>
                      <td>" . $row['aap_id'] . "</td>
                      <td>" . date('d/m/Y', $row["geboortedatum"]->getTimestamp()) . "</td>
                      <td>" . $row['geslacht'] . "</td>
                      <td>0" . $row['gewicht'] . "</td>
                      <td><input type=\"checkbox\" name=\"select" . $i . "\" value=" . $row['aap_id'] . " onchange=\"managePin(" . $row['aap_id'] . ")\"></td>
                    </tr>";
                $i = $i + 1;
              }
              db_close();
            ?>
          </tbody>
        </table>
        <input type="submit" name="submit" value="Verwijder" class="button">
      </form>
    </div>
  </div>
</div>