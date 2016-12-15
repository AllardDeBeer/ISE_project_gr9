<?php
  include '../includes/database_functions.php';
?>
<div class="container">
  <div class="row">
    <div class="column large-12">
      <h3>Apen importeren</h3>
      <p>Selecteer het KING KING PRO export bestand (.csv)</p>
    </div>
    <div class="column large-12">
      <form action="handlers/import_handler.php" name="deleteMoneyForm" method="POST" enctype="multipart/form-data">
        <input type="file" name="file" id="file" required>
        <input type="submit" name="submit" class="button" value="Start!">
      </form>
    </div>
  </div>
</div>