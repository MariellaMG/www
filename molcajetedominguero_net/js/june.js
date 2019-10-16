
var scrolll=0;

$(window).scroll(function (event) {
    scrolll = $(window).scrollTop();
    // Do something
	var scroll1=scrolll*0.4;
	var scroll2=scrolll*0.2;
	var scroll3=scrolll*0.3;
	var scroll4=scrolll*0.6;
	
	$("#let1").css('background-position-x', scroll1+"px");
	$("#let2").css('background-position-y', -scroll2+"px");
	$("#let3").css('background-position-x', -scroll3+"px");
	$("#let4").css('background-position-y', scroll4+"px");
	/*
	var perc=100+scroll/10;
	$("#header2").css('background-size', perc+"% "+perc+"%");
	//$("#header").css('background-position-y', scroll+"px");
	*/
	//AjustarCajas();
});
