<?php
  include '../includes/database_functions.php';
  session_start();
?>
<div class="container">
  <div class="row">
    <div class="column large-12">
      <h3>Apen verwijderen</h3>
    </div>
    <div class="column large-12">
      <form action="handlers/mokey_handler.php" name="deleteMoneyForm" method="POST" enctype="multipart">
        <label for="share">Zoeken</label>
        <input type="text" name="share" id="searchInput" onkeyup="showResult(this.value, 2)" autocomplete='off'>
        <table>
          <thead>
            <tr>
              <th>Aap_ID</th>
              <th>Naam</th>
              <th>Geslacht</th>
              <th>Selecteer</th>
            </tr>
          </thead>
          <tbody id="livesearch">
            <!-- Live reloading content -->
          </tbody>
        </table>
        <input type="submit" name="submit" value="Verwijder" class="button">
      </form>
    </div>
  </div>
</div>