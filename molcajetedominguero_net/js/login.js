// JavaScript Document
$( document ).ready(function() {
 	//alert("--");
   //$('#menuicon').click(myFunction);
   
  AjustarCajasLog();
  
  /*
  $('#bb2').fadeTo( 10, 0.0 );
  
  $('#dd2').fadeTo( 10, 0.0 );
  $('#ee2').fadeTo( 10, 0.0 );
  $('#ff2').fadeTo( 10, 0.0 );
  
  //VerCC('bb1','bb2');
  VerCC_out('bb1','bb2');
  */
  
  myVarLog = setInterval(myTimerLog, 1000);
  
  //$("#skyline").hide();
  
  
    $(".log_div").hide();
	$(".log_div").css("top","-400px");
	$(".log_tapa").stop();
	$( ".log_tapa" ).fadeTo( 10,0, function() {
  		$( ".log_tapa" ).hide();
  	});
  
});

var myVarLog;
var scrollLog=0;

/*
$(window).scroll(function (event) {
    scroll = $(window).scrollTop();
    // Do something
	var scroll2=scroll*1.2;
	$("#header1").css('background-position-x', scroll2+"px");
	
	
	var perc=100+scroll/10;
	$("#header2").css('background-size', perc+"% "+perc+"%");
	//$("#header").css('background-position-y', scroll+"px");
	AjustarCajas();
	
	$("#skyline").css('background-position-x', scroll2+"px");
});
*/

function myTimerLog() {
    var d = new Date();
    //document.getElementById("demo").innerHTML = d.toLocaleTimeString();
	AjustarCajasLog();
}

function myFunctionLog() {
   //$("#menu").slideToggle();
}

function CerrarLog(){
	//$(".log_div").hide();
	//$(".log_tapa").hide();
	$(".log_tapa").stop();
	//$(".log_tapa").fadeTo( 500, 0);
	$( ".log_tapa" ).fadeTo( 200,0, function() {
  		$( ".log_tapa" ).hide();
  	});
	$('.log_div').animate({ top: '-400px' }, 300);
}
function LogMostrar(){
	$(".log_div").show();
	$(".log_tapa").show();
	$(".log_tapa").stop();
	$(".log_tapa").fadeTo( 500, 1);
	
	$(".log_div").css("top","-400");
	$('.log_div').animate({ top: '50px' }, 300);
	
	
}



function AjustarCajasLog(){
	
	var divi = ( ($(window).width()) / 2 )-250;
	$(".log_div").css("left",divi);
	
	
	
	divi = $(window).width()-200-10;
	$(".lc_menu").css("left",divi);
	/*
	var divi = ( ($("#header").width()*972) / 1667 );
	$("#header").height(divi);
	$("#header1").height(divi);
	$("#header2").height(divi);
	
	$("#molcajetenig").width($(window).width()*0.15);
	$("#molcajetenig").height($(window).width()*0.15);
	$("#molcajetenig_div").css("margin-top",($(window).width()*0.15)/3);
	var molcajetenig_x = ($(window).width()/2) - $("#molcajetenig").width()/2;
	$("#molcajetenig").css("left",molcajetenig_x+"px");
	$("#molcajetenig").css("top",scroll*0.09+divi*0.6+"px");
	
	
	
	$("#sanfrancisco").width($(window).width()*0.12);
	$("#sanfrancisco").height($(window).width()*0.12);
	$("#sanfrancisco_div").css("margin-top",($(window).width()*0.12)/3);
	var molcajetenig_x = ($(window).width()/2) - ($("#sanfrancisco").width()/2)*4.2 ;
	$("#sanfrancisco").css("left",molcajetenig_x+"px");
	$("#sanfrancisco").css("top",scroll*0.11+divi*0.65+"px");
	
	
	$("#inland").width($(window).width()*0.12);
	$("#inland").height($(window).width()*0.12);
	$("#inland_div").css("margin-top",($(window).width()*0.12)/3);
	var molcajetenig_x = ($(window).width()/2) + ($("#inland").width()/2)*2.2 ;
	$("#inland").css("left",molcajetenig_x+"px");
	$("#inland").css("top",scroll*0.12+divi*0.65+"px");
	
	
	*/
	
	
	/*
	
	$("#aboutus").width($(window).width()*0.17);
	$("#aboutus").height($(window).width()*0.17);
	$("#aboutus_div").css("margin-top",($(window).width()*0.17)/3);
	var aboutus_x = ($(window).width()/5) - $("#aboutus").width()/2;
	$("#aboutus").css("left",aboutus_x+"px");
	$("#aboutus").css("top",scroll*0.3+divi*0.3+"px");
	
	$("#contactus").width($(window).width()*0.17);
	$("#contactus").height($(window).width()*0.17);
	$("#contactus_div").css("margin-top",($(window).width()*0.17)/3);
	var contactus_x = ($(window).width()/5) + ( ($(window).width()/5)*3 ) - $("#contactus").width()/2;
	$("#contactus").css("left",contactus_x+"px");
	$("#contactus").css("top",scroll*0.2+divi*0.3+"px");
	
	
	var logo_x = ($(window).width()/2) - $("#logo").width()/2;
	$("#logo").css("left",logo_x+"px");
	
	//css('background-position-x', "10px")
	
	
	*/
	
	
	/*
	
	var altm=($("#bb1").width()/20);
	
	$("#cc2").css("padding-top", altm+"px");
	
	var altn=(divi/2)-30;
	
	$("#bb3").css("padding-top", altn+"px");
	
	/////////
	
	//640 × 392
    var divi = ( ((($( window ).width()/3))*392) / 640 ) - 3 ;
	
	
	$(".dd1").width($( window ).width()/3);
	$(".dd1").height(divi);
	
	
	$("#profile_container").height(divi);
	*/
	
	
	/*
	$("#dd1").height(divi);
	$("#dd2").height(divi);
	
	$("#ee1").height(divi);
	$("#ee2").height(divi);
	
	$("#ff1").height(divi);
	$("#ff2").height(divi);
	*/
	
	
	/*
	var altn=(divi/2)-30;
	
	$(".cc3").css("padding-top", altn+"px");
	
	
	//////////
	
	var topa=$("#header").height()+$("#bb1").height()+$("#top").height();
	
	$("#atras").height($(".dd1").height());
	
	
	var ppt=$("#atras").height()/2-50;
	$("#atras").css("padding-top", ppt+"px");
	$("#adelante").css("padding-top", ppt+"px");
	
	
	$("#atras").css("top", topa+"px");
	
	/////////
	
	$("#adelante").height($(".dd1").height());
	
	$("#adelante").css("top", topa+"px");
	
	var dere=$( window ).width()-100;
	
	$("#adelante").css("left", dere+"px");
	*/
	
}






$( window ).resize(function() {
  //$( "body" ).prepend( "<div>" + $( window ).width() + "</div>" );
  /*
  if($( window ).width()<650){
	  $("#menu").hide();
	  $(".fa_search_div_input").hide();
  }else{
	  $("#menu").show();
	  $(".fa_search_div_input").hide();
  }
  if($( window ).width()>1200){
	  $("#menu").show();
	  $(".fa_search_div_input").show();
	  $( "#search" ).focus();
  }
  
  */
  
  AjustarCajasLog();
 
  
});

