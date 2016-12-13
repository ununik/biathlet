function showMessage(text){
	$('#messageBlackBackground').css('display', 'block');
	$('body').css('overflow', 'hidden');
	$('#message').html('<div id="closeMessage" onclick="hideMessage()"></div>'+text);
}
function showMessageWithoutClose(text){
	$('#messageBlackBackground').css('display', 'block');
	$('body').css('overflow', 'hidden');
	$('#message').html(text);
}
function hideMessage(){
	$('#messageBlackBackground').css('display', 'none');
	$('body').css('overflow', 'auto');
	$('#message').html('');
}
function reloadMoney(){
	var mypostrequest=new ajaxRequest()
	mypostrequest.onreadystatechange=function(){
	 if (mypostrequest.readyState==4){
	  if (mypostrequest.status==200 || window.location.href.indexOf("http")==-1){
		  $('#myMoney').html(mypostrequest.responseText);
	  }
	  else{
	   //alert("An error has occured making the request")
	  }
	 }
	}
	parameters = '';
	mypostrequest.open("POST", URL_PATH + "/Ajax/reload/money.php", true)
	mypostrequest.setRequestHeader("Content-type", "application/x-www-form-urlencoded")
	mypostrequest.send(parameters)
}
function reloadLevel(){
	var mypostrequest=new ajaxRequest()
	mypostrequest.onreadystatechange=function(){
	 if (mypostrequest.readyState==4){
	  if (mypostrequest.status==200 || window.location.href.indexOf("http")==-1){
		  $('#myLevel').html(mypostrequest.responseText);
	  }
	  else{
	   //alert("An error has occured making the request")
	  }
	 }
	}
	parameters = '';
	mypostrequest.open("POST", URL_PATH + "/Ajax/reload/level.php", true)
	mypostrequest.setRequestHeader("Content-type", "application/x-www-form-urlencoded")
	mypostrequest.send(parameters)
}
function reloadEnergy(){
	var mypostrequest=new ajaxRequest()
	mypostrequest.onreadystatechange=function(){
	 if (mypostrequest.readyState==4){
	  if (mypostrequest.status==200 || window.location.href.indexOf("http")==-1){
		  $('#myEnergy').html(mypostrequest.responseText);
	  }
	  else{
	   //alert("An error has occured making the request")
	  }
	 }
	}
	parameters = '';
	mypostrequest.open("POST", URL_PATH + "/Ajax/reload/energy.php", true)
	mypostrequest.setRequestHeader("Content-type", "application/x-www-form-urlencoded")
	mypostrequest.send(parameters)
}
function reloadActivity(){
	var mypostrequest=new ajaxRequest()
	mypostrequest.onreadystatechange=function(){
	 if (mypostrequest.readyState==4){
	  if (mypostrequest.status==200 || window.location.href.indexOf("http")==-1){
		  $('#myActivity').html(mypostrequest.responseText);
	  }
	  else{
	   //alert("An error has occured making the request")
	  }
	 }
	}
	parameters = '';
	mypostrequest.open("POST", URL_PATH + "/Ajax/reload/activity.php", true)
	mypostrequest.setRequestHeader("Content-type", "application/x-www-form-urlencoded")
	mypostrequest.send(parameters)
}
var vterina = 1000;
var minuta = vterina * 60;
var hodina = minuta * 60;
var den = hodina * 24;
var rok = den * 365.24219;

function twoDigitsNumber(number)
{
	return number > 9 ? "" + number: "0" + number;
}

function odpocet(el, show) {
    var konec = new Date(el.getAttribute("data-konec"));
    var ted = new Date();
    var rozdil = konec - ted;
    if (rozdil < vterina) {
    	reloadActivity()
    	clearTimeout(timer);
    }
    
    pocetHodin = Math.floor(rozdil / hodina);
    result = twoDigitsNumber(pocetHodin);
    result += ":";
    
    pocetMinut = Math.floor((rozdil % hodina) / minuta);
    result += twoDigitsNumber(pocetMinut);
    result += ":";
    
    pocetVterin = Math.floor(((rozdil % hodina) % minuta) / vterina);
    result += twoDigitsNumber(pocetVterin);

    var vypis = result

    el.innerHTML = vypis;
    timer = setTimeout(function() {
      odpocet(el); 
    }, vterina);
}

function reloadInTime(konec)
{
	var konec = new Date(konec);
	var ted = new Date();
    var rozdil = konec - ted;    
    if (rozdil > 0) {
    	alert(rozdil);
	    setTimeout(function() {
	    	reloadEnergy(); 
	      }, rozdil);
    }
}

function menu()
{
	
	if ($('nav').css( "display" ) == 'none') {
		$('nav').css( "display", "block")
	} else {
		$('nav').css( "display", "none")
	}
}