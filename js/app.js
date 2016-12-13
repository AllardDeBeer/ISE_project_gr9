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

function showResult(str) {
  // if (str.length==0) {
  //   str.value = "#";
  // }
  if (window.XMLHttpRequest) {
    // code for IE7+, Firefox, Chrome, Opera, Safari
    xmlhttp=new XMLHttpRequest();
  } else {  // code for IE6, IE5
    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
  //if(document.getElementById("searchInput").value.length > 0){
  xmlhttp.onreadystatechange=function() {
    if (this.readyState==4 && this.status==200) { 	
		document.getElementById("livesearch").innerHTML=this.responseText;
    }
 // }
}
  xmlhttp.open("GET","includes/livesearch.php?q="+str+"&p="+window.pins,true);
  xmlhttp.send();
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

