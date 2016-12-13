<div class="container">
<<<<<<< HEAD
  <div class="row">
    <div class="column large-12">
      <h3>Nieuw onderzoek</h3>
    </div>
    <div class="column large-12">
      <form action="#" name="newResearch" method="POST" enctype="multipart">
        <label for="researchName">Naam</label>
        <input type="text" name="researchName" required>
        <input type="submit" name="submit" value="Opslaan" class="button">
      </form>
    </div>
    <div class="column large-12">
      <form action="#" name="shareResearch" method="POST" enctype="multipart">
        <label for="share">Onderzoekers toevoegen</label>
        <input type="text" name="share" required>
        <table>
          <thead>
            <tr>
              <th>Naam</th>
              <th>Tussenvoegsel</th>
              <th>Achternaam</th>
              <th>Selecteer</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>Henk</td>
              <td>de</td>
              <td>Vries</td>
              <td><input type="checkbox" name="select" value="HdV"></td>
            </tr>
            <tr>
              <td>Frits</td>
              <td>de</td>
              <td>Graaf</td>
              <td><input type="checkbox" name="select" value="HdV"></td>
            </tr>
            <tr>
              <td>Truus</td>
              <td></td>
              <td>Kempen</td>
              <td><input type="checkbox" name="select" value="HdV"></td>
            </tr>
          </tbody>
        </table>
        <input type="submit" name="submit" value="Verwijder" class="button right">
      </form>
    </div>
  </div>
=======
<div class="row">
<div class="column large-12">
  <h3>Nieuw onderzoek</h3>
</div>
<div class="column large-12">
  <form action="handlers/research_handler.php?a=n" name="newResearch" method="POST" enctype="multipart">
    <label for="researchName">Naam</label>
    <input type="text" name="researchName" required>
    Start datum: <input type="text" name="researchStart" id="datepickerB">
    Eind datum: <input type="text" name="reasearchEnd" id="datepickerE">
    <script>
      $( "#datepickerB" ).datepicker();
      $( "#datepickerE" ).datepicker();
    </script>
  <!-- </div> -->
  <hr>
  <!-- <div class="column large-12"> -->
    <label for="share">Onderzoekers toevoegen</label>
    <input type="text" name="share" id="searchInput" onkeyup="showResult(this.value)" autocomplete='off'>
    <table>
      <thead>
          <tr>
            <th>Naam</th>
            <th>Tussenvoegsel</th>
            <th>Achternaam</th>
            <th>Selecteer</th>
          </tr>
        </thead>
        <tbody id="livesearch">
         <!-- Live reloaded content -->
      </tbody>
    </table>
    <input type="submit" name="submit" value="Opslaan" class="button">
  </form>
</div>
</div>
>>>>>>> refs/remotes/origin/Onderzoek
</div>