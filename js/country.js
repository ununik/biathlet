function noCountry() {	
	var mypostrequest=new ajaxRequest()
	mypostrequest.onreadystatechange=function(){
	 if (mypostrequest.readyState==4){
	  if (mypostrequest.status==200 || window.location.href.indexOf("http")==-1){
		  showMessageWithoutClose(mypostrequest.responseText);
	  }
	  else{
	   //alert("An error has occured making the request")
	  }
	 }
	}
	parameters = '';
	mypostrequest.open("POST", URL_PATH + "/Ajax/country/setCountry/en.php", true)
	mypostrequest.setRequestHeader("Content-type", "application/x-www-form-urlencoded")
	mypostrequest.send(parameters)
}

function selectCountry() {
	var val = $('#CountryForm').val()
	var mypostrequest=new ajaxRequest()
	mypostrequest.onreadystatechange=function(){
	 if (mypostrequest.readyState==4){
	  if (mypostrequest.status==200 || window.location.href.indexOf("http")==-1){
		  if (mypostrequest.responseText == 1) {
			  location.reload();
		  }
	  }
	  else{
	   //alert("An error has occured making the request")
	  }
	 }
	}
	parameters = 'country='+val;
	mypostrequest.open("POST", URL_PATH + "/Ajax/country/country/en.php", true)
	mypostrequest.setRequestHeader("Content-type", "application/x-www-form-urlencoded")
	mypostrequest.send(parameters)
}