function showCategory(id, title){
	$('.shopCategory').addClass( "shopCategory shopInactiveCategory" );
  $('.shopCategoriesTitles').addClass( "shopCategoriesTitles inactiveCategoryTitle" );
	$('#'+id).removeClass("shopInactiveCategory");
  $(title).removeClass("inactiveCategoryTitle");
}