<?php
session_start();
include "../includes/database_functions.php"
?>
<div class="container">
  <div class="row">
    <div class="column large-12">
      <h3>Bestaande proef</h3>
    </div>
    <div class="column large-12">
      <form action="#" name="newResearch" method="POST" enctype="multipart"> 
        <label for="testName">Naam:</label>
        <select name="testName" id="testName" required>
          <?php 
            db_open();
            $stmt = db_query("SELECT PROEF_NAAM FROM PROEF");
            
            while($result = db_fetchAssoc($stmt)) {
              echo "<option>".$result['PROEF_NAAM']."</option>";
            }

            db_close();
          ?>
        </select>
        <hr>
        <input type="button" value="Voeg toe" class="button" onclick="addExistingTest(document.getElementById('testName').value, 'toevoegen', 'livesearch')">
        <hr>

        <table>
          <thead>
            <tr>
              <th>Naam</th>
              <th>Datatype</th>
            </tr>
          </thead>
          <tbody id="livesearch">
          </tbody>
        </table>

        <!-- <input type="submit" value="Opslaan" class="button" formaction="../handlers/proef_handler.php?value=opslaan"> -->
        <input type="button" value="Opslaan" class="button" onclick="addExistingTest(document.getElementById('testName').value, 'opslaan', 'livesearch')">
      </form>
    </div>
  </div>
</div>