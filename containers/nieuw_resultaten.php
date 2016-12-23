<?php include '../includes/database_functions.php'; 
db_open();
?>
<div class="container">
  <div class="row">
    <div class="column large-12">

	
      <h3>Voeg resultaten toe</h3>
    </div>
<div class="column large-12">


			proefdatum <input type="text" name="datepicker" id="datepicker" value="<?php echo @date('Y-m-d') ?>" >
			
  
    <script>
      $( "#datepicker" ).datepicker();
      
    </script>
	

	<input type="button" value="select datum" class="button" onclick="showResult(document.getElementById('datepicker').value , 4">


	<form  name="addResultsForm" onsubmit="doClick();" method="POST">
		<div class="table-scroll">
			<table>
				<thead>
					<tr>
              
              
            
			
      
	
	
	
	
	
	
	
	<tbody id="livesearch">
            <!-- Live reloaded content -->
          </tbody>
	
	
	
	
	
	<?php
	
		  db_close();
	
		  ?>
            
			
          </table>
        </div>
        <input type="submit" name="submit" value="Opslaan" class="button right">
      </form>
    </div>
  </div>
</div>


