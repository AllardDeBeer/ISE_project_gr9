<?php
  session_start();
?>
<div class="container">
  <div class="row">
    <div class="column large-12">
      <h3>Nieuwe proef</h3>
    </div>
    <div class="column large-12">
      <form name="newResearch" method="POST" enctype="multipart" onsubmit="getOutput(opslaan)">
        <label for="researchName">Naam</label>
        <input type="text" name="researchName">
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
              <td><input type="text" name="fieldName"></td>
              <td><select name="fieldDataType">
                <option>Geheel getal</option>
                <option>Tekst</option>
                <option>Komma getal</option>
                <option>Percentage (%)</option>
              </select></td>
            </tr>
          </tbody>
        </table>
        <input type="submit" name="submit" value="Voeg toe" class="button">
        <hr>

        <table>
          <thead>
            <tr>
              <th>Naam</th>
              <th>Datatype</th>
              <th>Selecteer</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>Cortisol</td>
              <td>Percentage (%)</td>
              <td><input type="checkbox" name="select" value="HdV"></td>
            </tr>
          </tbody>
        </table>

        <input type="submit" value="Opslaan" class="button">
        <input type="submit" value="Verwijderen" class="button right">

      </form>
    </div>
  </div>
</div>




<!-- <?php
  //session_start();
?>
<div class="container">
  <div class="row">
    <div class="column large-12">
      <h3>Nieuwe proef</h3>
    </div>
    <div class="column large-12">
      <form action="#" name="newResearch" method="POST" enctype="multipart" onsubmit="getOutput(opslaan)">
        <label for="researchName">Naam</label>
        <input type="text" name="researchName">
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
              <td><input type="text" name="fieldName"></td>
              <td><select name="fieldDataType">
                <option>Geheel getal</option>
                <option>Tekst</option>
                <option>Komma getal</option>
                <option>Percentage (%)</option>
              </select></td>
            </tr>
          </tbody>
        </table>
        <input type="submit" name="submit" value="Voeg toe" class="button">
        <hr>

        <table>
          <thead>
            <tr>
              <th>Naam</th>
              <th>Datatype</th>
              <th>Selecteer</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>Cortisol</td>
              <td>Percentage (%)</td>
              <td><input type="checkbox" name="select" value="HdV"></td>
            </tr>
          </tbody>
        </table>

        <input type="submit" value="Opslaan" class="button" formaction="../handlers/proef_handler.php?value=opslaan">
        <input type="submit" value="Verwijderen" class="button right" formaction="../handlers/proef_handler.php?value=verwijderen">

      </form>
    </div>
  </div>
</div> -->