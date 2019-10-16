// JavaScript Document
$( document ).ready(function() {
  AjustarProductos();  
  myVarDos = setInterval(myTimerDos, 1000);
});

var myVarDos;

function myTimerDos() {
    var d = new Date();
    //document.getElementById("demo").innerHTML = d.toLocaleTimeString();
	AjustarCajasDos();
} 


function AjustarCajasDos(){
	// 1667 × 972
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




function VerCCP(t_1,t_2){
	//if(viendo==0){
	$('#'+t_1).stop();
	$('#'+t_2).stop();
	$('#'+t_2).fadeTo( 500, 1);
	$('#'+t_2).show();
	$('#'+t_1).animate({ backgroundSize: '110%' }, 300);
	//$('#'+t_1+" .producto_all").animate({ paddingTop: '250px' }, 100);
}
function VerCCP_out(t_1,t_2){
	$('#'+t_1).stop();
	$('#'+t_2).stop();
	$('#'+t_1).animate({ backgroundSize: '100%' }, 100);
	$('#'+t_2).fadeTo( 100, 0 );
	$('#'+t_2).hide();
	//$('#'+t_1+" .producto_all").animate({ paddingTop: '300px' }, 50);
}




$( window ).resize(function() {
  //$( "body" ).prepend( "<div>" + $( window ).width() + "</div>" );
  
  AjustarCajasDos();
  
});

