<div class="column large-9 right-screen">
  <div class="expanded row content">
    <div class="column large-4 sub-menu">
      <div class="expanded row border_bottom">
        <h3 class="text-center">Resultaten</h3>
      </div>
      <form action="" name="showResultsForm" id="showResultsForm" method="POST" enctype="multipart/form-data">
        <div class="expanded row border_bottom">
          <div class="column large-12">
            <span>1. Aantal Velden</span>
          </div>
          <input type="number" name="numVars" value="0" onchange="addInputs(this.value);" class="varnum">
        </div>
        <div class="expanded row border_bottom">
          <div class="column large-12">
            <span>2. Presentatie</span>
          </div>
          <ul class="button-group toggle" data-toggle="buttons-radio">
            <li>
              <input type="radio" id="r1" value="line" name="r-group" data-toggle="button">
              <label class="button" for="r1"><i class="material-icons">timeline</i></label>
            </li>
            <li>
              <input type="radio" id="r2" value="bar" name="r-group" data-toggle="button">
              <label class="button" for="r2"><i class="material-icons">assessment</i></label>
            </li>
            <li>
              <input type="radio" id="r3" value="pie" name="r-group" data-toggle="button">
              <label class="button" for="r3"><i class="material-icons">pie_chart</i></label>
            </li>
            <li>
              <input type="radio" id="r4" value="none" name="r-group" data-toggle="button">
              <label class="button" for="r4"><i class="material-icons">grid_on</i></label>
            </li>
          </ul>
        </div>
        <div class="expanded row border_bottom" id="varOptions">
          <div class="column large-12">
            <span>3. kies Velden</span>
          </div>
          <div class="column large-12">
            <p>Kies Eerst het aantal variabele.</p>
          </div>
        </div>
        <div class="expanded row border_bottom">
          <div class="column large-12">
            <span>4. Start</span>
          </div>
          <div class="column large-12">
            <input type="button" value="Teken" class="button" onclick="preparePage()">
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
      </form>
    </div>
    <div class="column large-8">
      <div class="expanded row">
        <div class="table-scroll" id="liveTable">
          
        </div>
      </div>

      <div class="expanded row" id="liveGraphContainer">
        <canvas id="liveGraph"></canvas>
      </div>
    </div>
  </div>
</div>