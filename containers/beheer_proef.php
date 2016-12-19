<?php 
session_start();
include "../includes/database_functions.php";
?>
<div class="container">
  <div class="row">
    <div class="column large-12">
      <h3>Beheer proef</h3>
    </div>
    <div class="column large-12">
      <form action="#" name="newResearch" method="POST" enctype="multipart">
        <label for="researchName">Wijzig naam</label>
        <?php 

        $proef_id = $_SESSION['proef'];
        db_open();
        $stmt = db_query("SELECT PROEF_NAAM FROM PROEF WHERE PROEF_ID = '$proef_id'");
        $result = db_fetchAssoc($stmt);
        $proef_naam = $result['PROEF_NAAM'];
        ?>
        <input type="text" name="researchName" value="<?php echo $proef_naam?>" required>
        <hr>
        <form action="#" name="newFieldForm" method="POST" enctype="multipart">
          <label for="newField">Wijzig velden</label>
          <table name="newField">
            <thead>
              <tr>
                <th>Naam</th>
                <th>Datatype</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td><input type="text" name="fieldName" required></td>
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
        </form>
        <hr>
        <form action="#" name="removeFieldForm" method="POST" enctype="multipart">
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
          <input type="submit" name="button" value="Verwijder" class="button right">
        </form>
        <input type="submit" name="submit" value="Opslaan" class="button">
      </form>
    </div>
  </div>
</div>