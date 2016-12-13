$(document).foundation()

$( document ).ready(function() {
	console.log( "ready!" );
	window.bigScreen = false;
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

function getOutput(name) {
    console.log('hoi');
 $.ajax({
  url:'handlers/proef_handler.php?value='+name+,
  complete: function (response) {
      console.log(response);
  },
  error: function () {
      console.log("Session variable "+name+" was not added");
  }
});
 return false;
}