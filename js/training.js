function showCategory(category, language) {	
	var mypostrequest=new ajaxRequest()
	mypostrequest.onreadystatechange=function(){
	 if (mypostrequest.readyState==4){
	  if (mypostrequest.status==200 || window.location.href.indexOf("http")==-1){
		  showMessage(mypostrequest.responseText);
	  }
	  else{
	   //alert("An error has occured making the request")
	  }
	 }
	}
	parameters = 'id=' + category;
	mypostrequest.open("POST", URL_PATH + "/Ajax/training/category/showCategory/en.php", true)
	mypostrequest.setRequestHeader("Content-type", "application/x-www-form-urlencoded")
	mypostrequest.send(parameters)
}

function doTraining(id) {
	var mypostrequest=new ajaxRequest()
	mypostrequest.onreadystatechange=function(){
	 if (mypostrequest.readyState==4){
	  if (mypostrequest.status==200 || window.location.href.indexOf("http")==-1){
		  if(mypostrequest.responseText != '') {
			  showMessage(mypostrequest.responseText);
			  reloadEnergy();
			  reloadMoney();
			  reloadActivity();
			  
			  setTimeout(function(){
				  hideMessage();
		      },2000);
		  } else {
			  reloadEnergy();
			  reloadMoney();
			  reloadActivity();
			  hideMessage();
		  }
	  }
	  else{
	   //alert("An error has occured making the request")
	  }
	 }
	}
	parameters = 'id=' + id;
	mypostrequest.open("POST", URL_PATH + "/Ajax/training/category/goTraining/en.php", true)
	mypostrequest.setRequestHeader("Content-type", "application/x-www-form-urlencoded")
	mypostrequest.send(parameters)
}