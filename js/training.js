function showCategory(category, language) {	
	var mypostrequest=new ajaxRequest()
	mypostrequest.onreadystatechange=function(){
	 if (mypostrequest.readyState==4){
	  if (mypostrequest.status==200 || window.location.href.indexOf("http")==-1){
		  $('#oneCategory').html(mypostrequest.responseText);
	  }
	  else{
	   alert("An error has occured making the request")
	  }
	 }
	}
	parameters = 'id=' + category;
	mypostrequest.open("POST", URL_PATH + "/Ajax/training/category/showCategory/" + language + ".php", true)
	mypostrequest.setRequestHeader("Content-type", "application/x-www-form-urlencoded")
	mypostrequest.send(parameters)
}