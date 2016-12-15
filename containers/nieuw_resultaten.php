<div class="container">
  <div class="row">
    <div class="column large-12">
      <h3>Voeg resultaten toe</h3>
    </div>
    <div class="column large-12">
      <form action="#" name="addResultsForm" method="POST" enctype="multipart">
        <div class="table-scroll">
          <table>
            <thead>
              <tr>
                <th>Aap</th>
                <th>Cortisol</th>
                <th>Vitamine B12</th>
                <th>Tijd</th>
                <th>Datum</th>
              </tr>
            </thead>
            <tbody>
			proef datum <input type="text" name="proefDatum" id="datepicker">
  
    <script>
      $( "#datepicker" ).datepicker();
      
    </script>
		<?php 
for ($x = 0; $x <= 5; $x++) {
    echo '
	<tr>
                <td>MO949</td>
                <td><input type="text" name="CortisolMO949"></td>
                <td><input type="text" name="VitamineB12MO949"></td>
                <td><input type="text" name="TijdMO949"></td>
                <td><input type="text" name="DatumMO949"></td>
              </tr>
	
	
	
	
	';
} 
?>
			
			<?php
			include '../includes/database_functions.php';
     db_open();
			$stmt = db_query("SELECT aap id = '$username'");
          $result = db_fetchAssoc($stmt);
		  
		  ?>
            </tbody>
          </table>
        </div>
        <input type="submit" name="submit" value="Opslaan" class="button right">
      </form>
    </div>
  </div>
</div>