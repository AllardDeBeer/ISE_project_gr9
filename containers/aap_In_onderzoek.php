<?php 
session_start();
include '../includes/database_functions.php'; 
db_open();
$currentResearch=$_SESSION['onderzoek'];
?>
				
<div class="container">
<div class="row">
<div class="column large-12">
<h3>apen toevoegen</h3>
</div>
<div class="column large-12">
  <!-- </div> -->
  <hr>
  <!-- <div class="column large-12"> -->
  <div class="row">
  <div class="column small-2"><label for="addMonkey">Aap ID</label>
    <input  type="text" name="addMonkey" id="searchInputId" onkeyup="setValue(),showResult(document.getElementById('searchValues').value+'||'+document.getElementById('insertValues').value, 10, 'livesearch')" autocomplete='off'>
	</div>	
	<div class="column small-2"><label for="addMonkey">Behandelgroep</label>
    <input type="text" name="addMonkey" id="searchInputGroup" onkeyup="setValue(),showResult(document.getElementById('searchValues').value+'||'+document.getElementById('insertValues').value, 10, 'livesearch')" autocomplete='off'>
	</div>
	<div class="column small-2"><label for="addMonkey">Diersoort</label>
    <input type="text" name="addMonkey" id="searchInputAnimal" onkeyup="setValue(),showResult(document.getElementById('searchValues').value+'||'+document.getElementById('insertValues').value, 10, 'livesearch')" autocomplete='off'>
	</div>	
	<div class="column small-2"><label for="addMonkey">Geslacht</label>
    <input type="text" name="addMonkey" id="searchInputGender" onkeyup="setValue(),showResult(document.getElementById('searchValues').value+'||'+document.getElementById('insertValues').value, 10, 'livesearch')" autocomplete='off'>
	</div>	
	<div class="column small-2"><label for="addMonkey">Gewicht</label>
    <input type="text" name="addMonkey" id="searchInputWeight" onkeyup="setValue(),showResult(document.getElementById('searchValues').value+'||'+document.getElementById('insertValues').value, 10, 'livesearch')" autocomplete='off'>
	</div>
	<div class="column small-2"><label for="addMonkey">Dominant</label>
    <input type="text" name="addMonkey" id="searchInputDom" onkeyup="setValue(),showResult(document.getElementById('searchValues').value+'||'+document.getElementById('insertValues').value, 10, 'livesearch')" autocomplete='off'>
	</div>

</div>
    <input id= "searchValues" type="hidden" value="">
	<input id= "insertValues" type="hidden" value="">
	
<?php //+document.getElementById('insertValues')?>



<script>
function setValue() {
	var ID = document.getElementById("searchInputId").value;
	var GROUP = document.getElementById("searchInputGroup").value;
	var ANIMAL = document.getElementById("searchInputAnimal").value;
	var GENDER = document.getElementById("searchInputGender").value;
	var WEIGHT = document.getElementById("searchInputWeight").value;
	var DOM = document.getElementById("searchInputDom").value;
    document.getElementById("searchValues").value = ID+"‽"+GROUP+"‽"+ANIMAL+"‽"+GENDER+"‽"+WEIGHT+"‽"+DOM;
}
function changeBox(ID) {
	
	document.getElementById("insertValues").value += ID+"‽";
}
</script>


	
	
    <table>
      <thead>
          <tr>
            <th>Aap id</th>
            <th>Behandelgroep</th>
            <th>Diersoort</th>
            <th>Geslacht</th>
			<th>Gewicht</th>
			<th>Dominant</th>
			<th>Geselecteerd</th>
          </tr>
        </thead>
		
		
        <tbody  id="livesearch">
		<?php
		db_open();
$stmt = db_query("SELECT aap_id, behandelgroep, diersoort, geslacht, gewicht, dominant FROM aap
where aap_id not in(select aap_id from aapinonderzoek where onderzoek_id ='$currentResearch ')
");


$i=0;
while($row = db_fetchAssoc($stmt)) {
	
	
	
	
  $y = array($row['aap_id'], $row['behandelgroep'], $row['diersoort'], $row['geslacht'], $row['gewicht'], $row['dominant']);



    echo"<tr>
					<td>" . $y[0] . "</td>
					<td>" . $y[1] . "</td>
					<td>" . $y[2] . "</td>
					<td>" . $y[3]  . "</td>
					<td>" . $y[4]  . "</td>
					<td>" . $y[5]  . "</td>
					<td><input type=\"checkbox\" id=\"select" . $y[0] . "\" value=" . $y[0] . " onchange=\"changeBox(this.value )\"
				
			
				></td>
					</tr>";
$i+=1;
}
db_close();


     ?>
		
		
         <!-- Live reloaded content -->
      </tbody>
	  
	  
    </table>
	<input type="button" value="opslaan" class="button right" onclick="showResult(document.getElementById('insertValues').value, 11, 'livesearch')">
	
    </form>
</div>
</div>
</div>
			
			
