<?php include '../includes/database_functions.php'; 
session_start();
db_open();
?>
<script type ="text/javascript">
window.onload = showResult();
</script>
<div class="container">
  <div class="row">
    <div class="column large-12">

      <h3>Voeg resultaten toe</h3>
    </div>
<div class="column large-12">
	proefdatum <input type="text" name="datepicker" id="datepicker" value="<?php echo @date('Y-m-d') ?>" >
	<input type="button" value="select datum" class="button" onclick="showResult(document.getElementById('datepicker').value , 6, 'resultsTable')">
	<div class="table-scroll">
		<form action="includes/insertResults.php" method="POST" enctype="multipart/form-data">
			<table>
				<thead>
					<tr>
				<tbody id="resultsTable">
            <!-- Live reloaded content -->
          </tbody>
			
          </table>
        </div>
        
      
    </div>
  </div>
</div>

<script>

      $( "#datepicker" ).datepicker();
      
   </script>
