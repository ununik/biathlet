function showCategory(id, title){
	$('.shopCategory').addClass( "shopCategory shopInactiveCategory" );
  $('.shopCategoriesTitles').addClass( "shopCategoriesTitles inactiveCategoryTitle" );
	$('#'+id).removeClass("shopInactiveCategory");
  $(title).removeClass("inactiveCategoryTitle");
}

function showAllInCategories(category, language){
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
	parameters = 'category=' + category;
	mypostrequest.open("POST", URL_PATH + "/Ajax/profil/workroom/showAllItemsInCategory/" + language + ".php", true)
	mypostrequest.setRequestHeader("Content-type", "application/x-www-form-urlencoded")
	mypostrequest.send(parameters)
}

function changeItem(item, language) {
	var mypostrequest=new ajaxRequest()
	mypostrequest.onreadystatechange=function(){
	 if (mypostrequest.readyState==4){
	  if (mypostrequest.status==200 || window.location.href.indexOf("http")==-1){
		  location.reload();
	  }
	  else{
	   //alert("An error has occured making the request")
	  }
	 }
	}
	parameters = 'id=' + item;
	mypostrequest.open("POST", URL_PATH + "/Ajax/profil/workroom/changeItem/" + language + ".php", true)
	mypostrequest.setRequestHeader("Content-type", "application/x-www-form-urlencoded")
	mypostrequest.send(parameters)
}