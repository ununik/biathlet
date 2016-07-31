function showCategory(id, title){
	$('.shopCategory').addClass( "shopCategory shopInactiveCategory" );
  $('.shopCategoriesTitles').addClass( "shopCategoriesTitles inactiveCategoryTitle" );
	$('#'+id).removeClass("shopInactiveCategory");
  $(title).removeClass("inactiveCategoryTitle");
}

function buyItem(id, language){
	var mypostrequest=new ajaxRequest()
	mypostrequest.onreadystatechange=function(){
	 if (mypostrequest.readyState==4){
	  if (mypostrequest.status==200 || window.location.href.indexOf("http")==-1){
		  reloadMoney();
		  $('#shopResult').html(mypostrequest.responseText);
		  
		  setTimeout(function(){
			  $('#shopResult').html('');
	      },2000);
	  }
	  else{
	   //alert("An error has occured making the request")
	  }
	 }
	}
	parameters = 'id=' + id;
	mypostrequest.open("POST", URL_PATH + "/Ajax/shop/item/buyItem/" + language + ".php", true)
	mypostrequest.setRequestHeader("Content-type", "application/x-www-form-urlencoded")
	mypostrequest.send(parameters)
}