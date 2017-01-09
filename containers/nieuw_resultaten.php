<?php include '../includes/database_functions.php'; 
session_start();
db_open();
?>
<div class="container">
  <div class="row">
    <div class="column large-12">

      <h3>Voeg resultaten toe</h3>
    </div>
<div class="column large-12">
	proefdatum <input type="text" name="datepicker" id="datepicker" value="<?php echo @date('Y-m-d') ?>" >
	
	
			

	<input type="button" value="select datum" class="button" onclick="showResult(document.getElementById('datepicker').value , 4">


	
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
        
      
    </div>
  </div>
</div>

<script>
//<![CDATA[       code]]>



      $( "#datepicker" ).datepicker();
      
   </script>
