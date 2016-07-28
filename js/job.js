$(document).ready(function() {
  $(".partTimeTitle").click(function () {
	  if ($(".partTimeDetail").css("height") == "0px") {
	    	$(".partTimeDetail").css("height", 'auto');
	    } else {
	    	$(".partTimeDetail").css("height", '0px');
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
		  $('#jobsResult').html(mypostrequest.responseText);
		  
		  setTimeout(function(){
			  $('#jobsResult').html('');
	      },2000);
	  }
	  else{
	   alert("An error has occured making the request")
	  }
	 }
	}
	parameters = 'id=' + id + '&type='+type;
	mypostrequest.open("POST", URL_PATH + "/Ajax/job/parttime/getparttimeJob/" + language + ".php", true)
	mypostrequest.setRequestHeader("Content-type", "application/x-www-form-urlencoded")
	mypostrequest.send(parameters)
}