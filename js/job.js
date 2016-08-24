$(document).ready(function() {
  $(".partTimeTitle").click(function () {
	  if ($(".partTimeDetail").css("display") == "none") {
	    	$(".partTimeDetail").css("display", 'block');
	    } else {
	    	$(".partTimeDetail").css("display", 'none');
	    }
  });
});

function getParttimeJob(id, type, language) {

	var mypostrequest=new ajaxRequest()
	mypostrequest.onreadystatechange=function(){
	 if (mypostrequest.readyState==4){
	  if (mypostrequest.status==200 || window.location.href.indexOf("http")==-1){
		  reloadEnergy();
		  reloadMoney();
		  reloadActivity();
		  showMessage(mypostrequest.responseText);
		  
		  setTimeout(function(){
			  hideMessage();
	      },2000);
	  }
	  else{
	   //alert("An error has occured making the request")
	  }
	 }
	}
	parameters = 'id=' + id + '&type='+type;
	mypostrequest.open("POST", URL_PATH + "/Ajax/job/parttime/getparttimeJob/" + language + ".php", true)
	mypostrequest.setRequestHeader("Content-type", "application/x-www-form-urlencoded")
	mypostrequest.send(parameters)
}