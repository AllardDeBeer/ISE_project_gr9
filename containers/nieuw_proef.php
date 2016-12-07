<div class="container">
  <div class="row">
    <div class="column large-12">
      <h3>Nieuwe proef</h3>
    </div>
    <div class="column large-12">
      <form action="#" name="newResearch" method="POST" enctype="multipart">
        <label for="researchName">Naam</label>
        <input type="text" name="researchName" required>
        <hr>
        <form action="#" name="newFieldForm" method="POST" enctype="multipart">
          <label for="newField">Veld toevoegen</label>
          <table name="newField">
            <thead>
              <tr>
                <th>Naam</th>
                <th>Datatype</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td><input type="text" name="fieldName" required></td>
                <td><select name="fieldDataType">
                  <option>Geheel getal</option>
                  <option>Tekst</option>
                  <option>Komma getal</option>
                  <option>Percentage (%)</option>
                </select></td>
              </tr>
            </tbody>
          </table>
          <input type="submit" name="submit" value="Voeg toe" class="button">
        </form>
        <hr>
        <form action="#" name="removeFieldForm" method="POST" enctype="multipart">
          <table>
            <thead>
              <tr>
                <th>Naam</th>
                <th>Datatype</th>
                <th>Selecteer</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>Chortisol</td>
                <td>Percentage (%)</td>
                <td><input type="checkbox" name="select" value="HdV"></td>
              </tr>
            </tbody>
          </table>
          <input type="submit" name="button" value="Verwijder" class="button right">
        </form>
        <input type="submit" name="submit" value="Opslaan" class="button">
      </form>
    </div>
  </div>
</div>