<div class="container">
<div class="row">
  <div class="column large-12">
    <h3>Beheer onderzoek</h3>
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
</div>