function step(id, title){
	$('.steps').addClass( "myClass inactiveSteps" );
	$('#'+id).removeClass("inactiveSteps");
  $('.step').addClass( "step inactiveCategoryTitle" );
  $(title).removeClass("inactiveCategoryTitle");
}