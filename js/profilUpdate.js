function step(id){
	$('.steps').addClass( "myClass inactiveSteps" );
	$('#'+id).removeClass("inactiveSteps");
}