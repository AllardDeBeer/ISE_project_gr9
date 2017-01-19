<?php
  include '../includes/database_functions.php';
  session_start();
?>
<div class="container">
  <div class="row">
    <div class="column large-12">
      <h3>Apen Beheren</h3>
    </div>
    <div class="column large-12">
      <form action="handlers/mokey_handler.php" name="deleteMoneyForm" method="POST" enctype="multipart">
        <!-- <label for="share">Zoeken</label> -->
        <!-- <input type="text" name="share" id="searchInput" onkeyup="showResult(this.value, 2, 'livesearch')" autocomplete='off'> -->
        <table>
          <thead>
            <tr>
              <th width="11%">Naam</th>
              <th width="15%">Diersoort</th>
              <th width="5%">Geslacht</th>
              <th width="15%">Geboortedatum</th>
              <th width="17%">Gewicht(kg)</th>
              <th width="15%">Datum gewicht</th>
              <th width="17%">Behandelgroep</th>
              <th width="5%">Dominantie</th>
            </tr>
          </thead>
          <tbody id="livesearch">
            <!-- Live reloading content -->
            <?php
              db_open();
              $stmt = db_query("SELECT aap_id, DIERSOORT,geslacht, geboortedatum, gewicht, DATUMGEWICHTMETING, BEHANDELGROEP, DOMINANT  FROM aap");
              $i = 0;
              while($row = db_fetchAssoc($stmt)) {
                echo "<tr>
                      <td><input type=\"text\" name=\"aapData\" value=\"" . $row['aap_id'] . "\" required readonly></td>
                      <td><input type=\"text\" name=\"aapData\" value=\"" . $row['DIERSOORT'] . "\" required readonly></td>
                      <td><input type=\"text\" name=\"aapData\" value=\"" . $row['geslacht'] . "\" required readonly></td>
                      <td><input type=\"text\" name=\"aapData\" value=\"" . date('d/m/Y', $row["geboortedatum"]->getTimestamp()) . "\" required readonly></td>
                      <td><input type=\"text\" name=\"aapData\" value=\"" . $row['gewicht'] . "\" required></td>
                      <td><input type=\"text\" class=\"wdate\" name=\"aapData\" value=\"" . date('d/m/Y', $row["DATUMGEWICHTMETING"]->getTimestamp()) . "\" required></td>
                      <td><input type=\"text\" name=\"aapData\" value=\"" . $row['BEHANDELGROEP'] . "\" required></td>
                      <td><input type=\"text\" name=\"aapData\" value=\"" . $row['DOMINANT'] . "\" required></td>
                    </tr>";
                $i = $i + 1;
              }
              db_close();
            ?>
          </tbody>
        </table>
        <input type="button" name="submit" value="Wijzig" class="button" onclick="showResult(">
      </form>
      <script>
          $( ".wdate" ).datepicker();
      </script>
    </div>
  </div>
</div>