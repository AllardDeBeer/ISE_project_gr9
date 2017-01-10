<?php

include "../includes/database_functions.php";
session_start();

?>
<script>
  setVarOptionsMaxHeight();
</script>
<div class="column large-9 right-screen">
  <div class="expanded row content">
    <div class="column large-4 sub-menu">
      <div class="expanded row border_bottom" id="subMenuTitle">
        <h3 class="text-center">Resultaten</h3>
      </div>
      <form action="" name="showResultsForm" id="showResultsForm" method="POST" enctype="multipart/form-data">
        <div class="expanded row border_bottom" id="subMenuAmount">
          <div class="column large-12">
            <span>1. Aantal Velden</span>
          </div>
          <input type="number" name="numVars" value="0" onchange="addInputs(this.value);" class="varnum">
        </div>
        <div class="expanded row border_bottom" id="subMenuPresentation">
          <div class="column large-12">
            <span>2. Presentatie</span>
          </div>
          <ul class="button-group toggle" data-toggle="buttons-radio">
            <li>
              <input type="radio" id="r1" value="line" name="r-group" data-toggle="button" checked="">
              <label class="button" for="r1"><i class="material-icons">timeline</i></label>
            </li>
            <li>
              <input type="radio" id="r2" value="bar" name="r-group" data-toggle="button" required>
              <label class="button" for="r2"><i class="material-icons">assessment</i></label>
            </li>
            <li>
              <input type="radio" id="r3" value="pie" name="r-group" data-toggle="button" required>
              <label class="button" for="r3"><i class="material-icons">pie_chart</i></label>
            </li>
            <li>
              <input type="radio" id="r4" value="radar" name="r-group" data-toggle="button" required>
              <label class="button" for="r4"><i class="material-icons">photo_size_select_small</i></label>
            </li>
            <li>
              <input type="radio" id="r5" value="polarArea" name="r-group" data-toggle="button" required>
              <label class="button" for="r5"><i class="material-icons">track_changes</i></label>
            </li>
            <li>
              <input type="radio" id="r6" value="bubble" name="r-group" data-toggle="button" required>
              <label class="button" for="r6"><i class="material-icons">bubble_chart</i></label>
            </li>
          </ul>
        </div>
        <div class="expanded row border_bottom" id="varOptions">
          <div class="column large-12">
            <span>3. kies Velden</span>
          </div>
          <div class="column large-12">
            <p>Kies Eerst het aantal variabele.</p>
          </div>
        </div>
        <div class="expanded row border_bottom" id="subMenuSubmit">
          <div class="column large-12">
            <span>4. Start</span>
          </div>
          <div class="column large-12">
            <input type="button" value="Teken" class="button" onclick="preparePage()">
          </div>
        </div>
        <div class="expanded row currentMonkey align-self-bottom" id="subMenuMonkey">
          <div class="column large-12 researcher">
            <h4 class="text-center">Huidige aap</h4>
          </div>
          <div class="column large-12">
            <select name="monkeySelect" id="monkeySelect" onchange="setSessionVariable('aap', this.value); prepareResults()" required>
            <option disabled selected value> -- Kies een aap -- </option>
              <?php
                db_open();

                $stmt = db_query("SELECT aap_id FROM AapInOnderzoek WHERE onderzoek_id =" . $_SESSION['onderzoek']);
                while($row = db_fetchAssoc($stmt)){
                  echo "<option value=\"" . $row['aap_id'] . "\">" . $row['aap_id'] . "</option>";
                }

                db_close();
              ?>
            </select>
          </div>
        </div>
      </form>
    </div>
    <div class="column large-8">
      <div class="expanded row">
        <div class="table-scroll" id="liveTable">
          
        </div>
      </div>

      <div class="expanded row" id="liveGraphContainer">
        <canvas id="liveGraph"></canvas>
      </div>
    </div>
  </div>
</div>