<?php
session_start();
include "../includes/database_functions.php"
?>
<div class="container">
  <div class="row">
    <div class="column large-12">
      <h3>Nieuwe proef</h3>
    </div>
    <div class="column large-12">
      <form action="#" name="newResearch" method="POST" enctype="multipart"> 
        <label for="researchName">Naam</label>
        <input type="text" name="researchName" id="researchName" required>
        <hr>
        <label for="newField">Veld toevoegen</label>
        <table name="newField">
          <thead>
            <tr>
              <th>Naam</th>
              <th>Datatype</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td><input type="text" name="fieldName" id="fieldName"></td>
              <td><select name="fieldDataType" id="fieldDataType">
                <?php 
                db_open();
                $stmt = db_query("SELECT DATATYPE_NAAM FROM DATATYPES");
                
                while($result = db_fetchAssoc($stmt)) {
                  echo "<option>".$result['DATATYPE_NAAM']."</option>";
                }

                db_close();
                ?>
              </select></td>
            </tr>
          </tbody>
        </table>
        <input type="button" value="Voeg toe" class="button" onclick="showResult(document.getElementById('fieldName').value+'||'+document.getElementById('fieldDataType').value , 0, 'livesearch')">
        <hr>

        <table>
          <thead>
            <tr>
              <th>Naam</th>
              <th>Datatype</th>
              <th>Selecteer</th>
            </tr>
          </thead>
          <tbody id="livesearch">
            <!-- Live reloaded content -->
          </tbody>
        </table>

        <!-- <input type="submit" value="Opslaan" class="button" formaction="../handlers/proef_handler.php?value=opslaan"> -->
        <input type="button" value="Opslaan" class="button" onclick="newTest(document.getElementById('researchName').value, 'opslaan')">
        <input type="button" value="Verwijderen" class="button right" onclick="showResult(getValues('select'), 5, 'livesearch')">

      </form>
    </div>
  </div>
</div>