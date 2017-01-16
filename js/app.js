$(document).foundation()

$( document ).ready(function() {
  console.log( "ready!" );

  var menuHeight = window.innerHeight - $(".settings").height() - $(".logo").height();
  $("#menu").height(menuHeight-5);
  $("li").css('max-height', menuHeight);

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
          $('.container').animate({marginTop: "1000px"}, "slow", function(){
              $('.container').replaceWith(data);
              $('.container').css('marginTop', '-1000px').animate({marginTop: "5%"}, "slow");
          });
        }
      }
  });
}

// function updateContainer(){
//   var url = window.location.href;
//     url = url.split('#');
//     $.get('containers/' + url[1] + '.php', function(data) {
//       if(url[1] == "toon_resultaten"){
//       $('.right-screen').replaceWith(data);
//       window.bigScreen = true;
//       }else{
//         if(window.bigScreen){
//           $('.right-screen').replaceWith("<div class=\"column large-9 right-screen\"><div class=\"large-12\">" + data + "</div></div>");
//           window.bigScreen = false;
//         }else{
//           $('.container').replaceWith(data);
//         }
//       }
//   });
// }

function updateCallout(msg){
  var url = window.location.href;
    url = url.split('#');
    $.get('includes/callout.php?m=' + msg, function(data) {
        $('#callout').replaceWith(data);
  });
}


	
function initXMLHTTP() {
if (window.XMLHttpRequest) {
    // code for IE7+, Firefox, Chrome, Opera, Safari
    xmlhttp=new XMLHttpRequest();
  } else {  // code for IE6, IE5
    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
  return xmlhttp;
}

function showResult(str, showIndex, id) {
  xmlhttp = initXMLHTTP();
  xmlhttp.onreadystatechange=function() {
    if (this.readyState==4 && this.status==200) {   
    document.getElementById(id).innerHTML=this.responseText;
    }
  }
  if (showIndex >=0){
    if (showIndex == 1) {
      xmlhttp.open("GET","includes/livesearch.php?q="+str+"&p="+window.pins,true);
    } else if(showIndex == 0){
      xmlhttp.open("GET","includes/addVariables.php?status=toevoegen&q="+str,true);
    } else if(showIndex == 2){
      xmlhttp.open("GET","includes/searchMokeys.php?q="+str+"&p="+window.pins,true);
    }else if(showIndex == 3){
      xmlhttp.open("GET","includes/addInputs.php?q="+str,true);
    }else if(showIndex == 4){
      xmlhttp.open("GET","includes/resultsTable.php?q="+str,true);
    } else if (showIndex == 5) {
      xmlhttp.open("GET","includes/addVariables.php?status=verwijderen&q="+str,true);
    }	else if (showIndex == 6) {
      xmlhttp.open("GET","includes/loadResults.php?q="+str,true);
    }else if (showIndex == 7) {
      xmlhttp.open("GET","includes/insertResults.php?q="+str,true);
    } else if (showIndex == 8) {
      xmlhttp.open("GET","includes/addVariables.php?status=proefbeheertoevoegen&q="+str,true);
    } else if (showIndex == 9) {
      xmlhttp.open("GET","includes/addVariables.php?status=proefbeheerverwijderen&q="+str,true);
    } else if (showIndex == 10) {
      xmlhttp.open("GET","includes/aapSearch.php?q="+str+"&p="+window.pins,true);
    }else if (showIndex == 11) {
      xmlhttp.open("GET","handlers/aapInOnderzoek_handler.php?q="+window.pins,true);
  	  throwPins();
    }else if (showIndex == 12) {
      xmlhttp.open("GET","includes/manageMonkeys.php?q="+str,true);
    }
  xmlhttp.send();
  }
}

function newTest(researchName, value){
  xmlhttp = initXMLHTTP();
  xmlhttp.onreadystatechange=function() {
    if (this.readyState==4 && this.status==200) {  
      console.log(this.responseText); 
      // Check if proef isValid
      if (this.responseText == 'notValid') {
        // Check if not already on page
        if (window.location.href == ("http://localhost/index.php?m=13#nieuw_proef" || "http://localhost:8080/index.php?m=13#beheer_proef")) {
          window.location.reload();
        } else {
          window.location.replace("../index.php?m=13#nieuw_proef");
        }
      } else if (this.responseText == 'isValid') {
        // Check if not already on page
        if (window.location.href == ("http://localhost/index.php?m=16#nieuw_proef" || "http://localhost:8080/index.php?m=16#beheer_proef")) {
          window.location.reload();
        } else {
          window.location.replace("../index.php?m=16#nieuw_proef");
        }
      } else if (this.responseText == 'noResearchName') {
        console.log('test'); 
        if (window.location.href == ("http://localhost/index.php?m=17#nieuw_proef" || "http://localhost:8080/index.php?m=17#beheer_proef")) {
          window.location.reload();
        } else {
          window.location.replace("../index.php?m=17#nieuw_proef");
        }
      }
    }
  }
  xmlhttp.open("GET", "handlers/proef_handler.php?value="+value+"&researchName="+researchName, true);
  xmlhttp.send();
}

function manageTest(value, researchName) {
  xmlhttp = initXMLHTTP();
  xmlhttp.onreadystatechange=function() {
    if (this.readyState==4 && this.status==200) { 
      console.log(this.responseText);
      if (this.responseText == 'waarden') {
        if (window.location.href == ("http://localhost/index.php?m=14#beheer_proef" || "http://localhost:8080/index.php?m=14#beheer_proef")) {
          window.location.reload();
        } else {
          window.location.replace("../index.php?m=14#beheer_proef")
        }
      } else if (this.responseText == 'gelukt') {
        if (window.location.href == ("http://localhost/index.php?m=15#beheer_proef" || "http://localhost:8080/index.php?m=15#beheer_proef")) {
          window.location.reload();
        } else {
          window.location.replace("../index.php?m=15#beheer_proef")
        }
      } 
    }
  }
  xmlhttp.open("GET", "handlers/proef_handler.php?value="+value+"&researchName="+researchName, true)
  xmlhttp.send()
}


function addInputs(value){
  var output = value + "|" + 
  showResult(value, 3, 'varOptions');
}
function getValues(elementName) {
  var checkboxes = document.getElementsByName(elementName);
  var vals = "@";
  for (var i=0, n=checkboxes.length;i<n;i++) {
    if (checkboxes[i].checked) {
      vals += "[" + checkboxes[i].value + "]";
    }
  }
  return vals;
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
function throwPins(){
	window.pins = "";
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

function setVarOptionsMaxHeight(){
  var maxHeight = window.innerHeight - $("#subMenuTitle").height() - $("#subMenuAmount").height() - $("#subMenuPresentation").height() - $("#subMenuSubmit").height() - $("#subMenuMonkey").height();
  $("#varOptions").css('max-height', maxHeight);
}
