function saveTranslation(id) {

	var translated = document.getElementById('translation-'+id).value;
	
	var mypostrequest=new ajaxRequest()
	mypostrequest.onreadystatechange=function(){
	 if (mypostrequest.readyState==4){
	  if (mypostrequest.status==200 || window.location.href.indexOf("http")==-1){

	  }
	  else{
	   //alert("An error has occured making the request")
	  }
	 }
	}
	parameters = 'id=' + id + '&translated='+translated;
	mypostrequest.open("POST", URL_PATH + "/Ajax/translation/update/save.php", true)
	mypostrequest.setRequestHeader("Content-type", "application/x-www-form-urlencoded")
	mypostrequest.send(parameters)
}