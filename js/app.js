$(document).foundation()

$( document ).ready(function() {
  console.log( "ready!" );
  window.bigScreen = false;
  window.pins = "@";
});

function updateContainer(){
  var url = window.location.href;
    url = url.split('#');
    $.get('containers/' + url[1] + '.php', function(data) {
      if(url[1] == "toon_resultaten"){
      $('.right-screen').replaceWith(data);
      window.bigScreen = true;
      }else{
        if(window.bigScreen){
          $('.right-screen').replaceWith("<div class=\"column large-9 right-screen\"><div class=\"large-12\">" + data + "</div></div>");
          window.bigScreen = false;
        }else{
          $('.container').replaceWith(data);
        }
      }
      console.log("Container Reloaded");
      console.log(bigScreen);
  });
}

function showResult(str, showIndex, id) {
  // if (str.length==0) {
  //   str.value = "#";
  // }
  console.log("q: " + str);
  if (window.XMLHttpRequest) {
    // code for IE7+, Firefox, Chrome, Opera, Safari
    xmlhttp=new XMLHttpRequest();
  } else {  // code for IE6, IE5
    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
  //if(document.getElementById("searchInput").value.length > 0){
  xmlhttp.onreadystatechange=function() {
    if (this.readyState==4 && this.status==200) {   
    document.getElementById(id).innerHTML=this.responseText;
    }
 // }
} 
  if (showIndex == 1) {
    xmlhttp.open("GET","includes/livesearch.php?q="+str+"&p="+window.pins,true);
  }else if(showIndex == 0){
    xmlhttp.open("GET","includes/addVariables.php?q="+str,true);
  }else if(showIndex == 2){
    xmlhttp.open("GET","includes/searchMokeys.php?q="+str+"&p="+window.pins,true);
  }else if(showIndex == 3){
    xmlhttp.open("GET","includes/addInputs.php?q="+str,true);
  }else if(showIndex == 4){
    xmlhttp.open("GET","includes/resultsTable.php?q="+str,true);
  }

  xmlhttp.send();
}

function addInputs(value){
  var output = value + "|" + 
  showResult(value, 3, 'varOptions');
}

function managePin(pin){
  var target = "["+pin+"]";
  var n = window.pins.indexOf(target);

  if (n >= 1) {
    var temp = window.pins.split(target);
    window.pins = temp[0]+temp[1];
  } else {
    window.pins += target;
  }
}

function setSessionVariable(name, value) {
   $.ajax({
      url:'handlers/session_handler.php?n='+name+'&v='+value,
      complete: function (response) {
          console.log("Session variable "+name+" was added [ "+response.responseText+" ]");
      },
      error: function () {
          console.log("Session variable "+name+" was not added");
      }
  });
  return false;
}

function prepareGraph() {
  var amountCols = $("#varOptions > div").length - 1;
  console.log(amountCols);
  var output = "";
   $.ajax({
      url:'handlers/session_retriever.php?a=' + amountCols,
      complete: function (response) {
         // output = "[]";
          console.log("[ "+response.responseText+" ]");
          var type = $('input[name=r-group]:checked', '#showResultsForm').val()
          var currentX = $('input[name=testGroup]:checked', '#showResultsForm').val();
          drawGraph(type, currentX, response.responseText);
      },
      error: function () {
          console.log("Session variable could not be retrieved");
      }
  });
}

function preparePage(){
  prepareResults();
  prepareGraph();
}

function addCurrentUsers(ids){
	window.pins += ids;
	showResult("");
}

function prepareResults(){
 var amountVars =  $("#varOptions select").length;
 var output = "";
  for (var i = 1; i <= amountVars; i++) {
    output += "[" + $("#choice"+i).val() + "]";
  }
  showResult(output, 4, 'liveTable');
}

function drawGraph(type, currentX, input){
  // getSessionVariable('table_data', 1);
  input = input.split("|");
  labels = input[currentX].split(",");

  var datasets =  [];

  for (var i = 0; i < input.length; i++) {
    if(i != currentX){
      var label = $("#choice" + (i+1) + " option:selected").text();
      var color = getRandomColor();
      backgroundColor = [];
      data = input[i].split(",");
      for (var j = 0; j <= data.length; j++) {
        backgroundColor.push(color);
      };
      datasets.push({
                  label,
                  data,
                  backgroundColor,
                  borderColor: [
                      color
                  ],
                  borderWidth: 1,
                  fill: false
                });
    }
  };

  $("#liveGraph").replaceWith("<canvas id=\"liveGraph\"></canvas>");
  var ctx = $("#liveGraph");
  var myChart = new Chart(ctx, {
      type: type,
      data: {
          labels,
          datasets
      },
      options: {
          scales: {
              yAxes: [{
                  ticks: {
                      beginAtZero:true
                  }
              }]
          }
      }
  });
}

function getRandomColor() {
    var letters = '0123456789ABCDEF';
    var color = '#';
    for (var i = 0; i < 6; i++ ) {
        color += letters[Math.floor(Math.random() * 16)];
    }
    return color;
}

