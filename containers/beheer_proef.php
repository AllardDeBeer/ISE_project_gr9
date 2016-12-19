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
          <input type="button" value="Voeg toe" class="button" onclick="showResult(document.getElementById('fieldName').value+'||'+document.getElementById('fieldDataType').value , 4)">
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
            <?php
              echo 'hier dan';
/*              db_open();
              $stmt = db_query("SELECT VELD_NAAM, DATATYPE_NAAM FROM VELD V JOIN DATATYPES D ON V.DATATYPE_ID = D.DATATYPE_ID WHERE V.PROEF_ID = $proef_id");
              $_SESSION['proefbeheer_vars'] = array();
              while ($result = db_fetchAssoc($stmt)) { 
                array_push($_SESSION['proefbeheer_vars'], implode("||", $result));
              }

              $i = 0;
              foreach ($_SESSION['proefbeheer_vars'] as $var) {

                $vars = explode('||', $var);
                echo "<tr>
                      <td>" . $vars[0] . "</td>
                      <td>" . $vars[1] . "</td>
                      <td><input type=\"checkbox\" name=\"select\" value=\"$i\" onchange=\"\"></td>
                      </tr>"; 
                $i++;
              }
              db_close();*/
              
            ?>
              
          </tbody>
        </table>
        <input type="submit" value="Opslaan" class="button" formaction="../handlers/proef_handler.php?">
        <input type="button" value="Verwijderen" class="button right" onclick="showResult(getValues('select'), 5)">
      </form>
    </div>
  </div>
</div>