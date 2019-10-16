// JavaScript Document
$( document ).ready(function() {

  AjustarCajasDos();
  
  myVarDos = setInterval(myTimerDos, 1000);
  
});

var myVarDos;
var scroll=0;

function myTimerDos() {
    var d = new Date();
    //document.getElementById("demo").innerHTML = d.toLocaleTimeString();
	AjustarCajas();
} 

function myFunction() {
   //$("#menu").slideToggle();
}

var pos=0;

function AjustarCajasDos(){
	// 800 × 534
	var divi = ( ($(window).width()*530) / 800 );
	$("#fondo_noche").height(divi);

	
	if($(window).width()<800){
		$("#noche_logo").width($(window).width()-250);
		$("#noche_logo").css("padding-top","0px");
		//$("#noche_logo").height(divi-80);
	}else{
		$("#noche_logo").width(600);
	}
	
	/*
	
	$("#molcajetenig").width($(window).width()*0.15);
	$("#molcajetenig").height($(window).width()*0.15);
	$("#molcajetenig_div").css("margin-top",($(window).width()*0.15)/3);
	var molcajetenig_x = ($(window).width()/2) - $("#molcajetenig").width()/2;
	$("#molcajetenig").css("left",molcajetenig_x+"px");
	$("#molcajetenig").css("top",scroll*0.09+divi*0.6+"px");
	
	$("#aboutus").width($(window).width()*0.17);
	$("#aboutus").height($(window).width()*0.17);
	$("#aboutus_div").css("margin-top",($(window).width()*0.17)/3);
	var aboutus_x = ($(window).width()/4) - $("#aboutus").width()/2;
	$("#aboutus").css("left",aboutus_x+"px");
	$("#aboutus").css("top",scroll*0.3+divi*0.3+"px");
	
	$("#contactus").width($(window).width()*0.17);
	$("#contactus").height($(window).width()*0.17);
	$("#contactus_div").css("margin-top",($(window).width()*0.17)/3);
	var contactus_x = ($(window).width()/4) + ( ($(window).width()/4)*2 ) - $("#contactus").width()/2;
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

  
  AjustarCajasDos();
 
  
});


