<?php 
include '../includes/database_functions.php'; 
session_start();
db_open();

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
    <label for="addMonkey">apen toevoegen</label>
    <input type="text" name="addMonkey" id="searchInput" onkeyup="showResult(this.value, 10, 'livesearch')" autocomplete='off'>
    <table>
      <thead>
          <tr>
            <th>Aap id</th>
            <th>geboorte datum</th>
            <th>Diersoort</th>
            <th>geslacht</th>
			<th>gewicht</th>
			<th>geselecteerd</th>
          </tr>
        </thead>
		
		
        <tbody id="livesearch">
         <!-- Live reloaded content -->
      </tbody>
	  <input type="button" value="opslaan" class="button right" onclick="showResult(getValues('select'), 11, 'livesearch')">
    </table>
	
		
    </form>
</div>
</div>
</div>
			
			
