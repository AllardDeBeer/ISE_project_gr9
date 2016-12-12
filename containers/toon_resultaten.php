<div class="column large-9 right-screen">
  <div class="expanded row content">
    <div class="column large-4 sub-menu">
      <div class="expanded row border_bottom">
        <h3 class="text-center">Resultaten</h3>
      </div>
      <div class="expanded row border_bottom">
        <div class="column large-12">
          <span>1. Aantal variable</span>
        </div>
        <input type="number" name="numVars" class="varnum">
      </div>
      <div class="expanded row border_bottom">
        <div class="column large-12">
          <span>2. Presentatie</span>
        </div>
        <ul class="button-group toggle" data-toggle="buttons-radio">
          <li>
            <input type="radio" id="r1" name="r-group" data-toggle="button">
            <label class="button" for="r1"><i class="material-icons">timeline</i></label>
          </li>
          <li>
            <input type="radio" id="r2" name="r-group" data-toggle="button">
            <label class="button" for="r2"><i class="material-icons">assessment</i></label>
          </li>
          <li>
            <input type="radio" id="r3" name="r-group" data-toggle="button">
            <label class="button" for="r3"><i class="material-icons">pie_chart</i></label>
          </li>
          <li>
            <input type="radio" id="r4" name="r-group" data-toggle="button">
            <label class="button" for="r4"><i class="material-icons">grid_on</i></label>
          </li>
        </ul>
      </div>
      <div class="expanded row border_bottom">
        <div class="column large-12">
          <span>3. kies Variable</span>
        </div>
        <div class="column large-12">
          <select name="choice1">
            <option value="Cortisol">Cortisol</option>
            <option value="vitamineB12">Vitamine B12</option>
            <option value="tijd">Tijd</option>
            <option value="datum">Datum</option>
          </select>
        </div>
        <div class="column large-12">
          <select name="choice2">
            <option value="Cortisol">Cortisol</option>
            <option value="vitamineB12">Vitamine B12</option>
            <option value="tijd">Tijd</option>
            <option value="datum">Datum</option>
          </select>
        </div>
      </div>


      <div class="expanded row currentMonkey align-self-bottom">
        <div class="column large-12 researcher">
          <h4 class="text-center">Huidige aap</h4>
        </div>
        <div class="column large-12">
          <p class="text-center">< MO593 ></p>
        </div>
      </div>
    </div>
    <div class="column large-8">
      <div class="expanded row">
        <div class="table-scroll">
          <table>
            <thead>
              <tr>
                <th>Cortisol</th>
                <th>Tijd</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>43</td>
                <td>1</td>
              </tr>
              <tr>
                <td>56</td>
                <td>2</td>
              </tr>
              <tr>
                <td>67</td>
                <td>4</td>
              </tr>
              <tr>
                <td>57</td>
                <td>5</td>
              </tr>
              <tr>
                <td>45</td>
                <td>7</td>
              </tr>
              <tr>
                <td>443</td>
                <td>10</td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>

      <div class="expanded row">
        <canvas></canvas>
      </div>
    </div>
  </div>
</div>