function showCategory(id){
	$('.shopCategory').addClass( "shopCategory shopInactiveCategory" );
	$('#'+id).removeClass("shopInactiveCategory");
}