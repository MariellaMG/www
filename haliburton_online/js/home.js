// JavaScript Document
$( document ).ready(function() {
 	//alert("--");
   //$('#menuicon').click(myFunction);
   
  AdjustProducts();
  
  $('#cc2').fadeTo( 10, 0.0 );
  $('#dd2').fadeTo( 10, 0.0 );
  $('#ee2').fadeTo( 10, 0.0 );
  
  $('#ff2').fadeTo( 10, 0.0 );
  
  $('#gg2').fadeTo( 10, 0.0 );
  
  myVar = setInterval(myTimer, 1000);
  
  $("#menu2").hide();
  $("#menu3").hide();
  
  $("#menu2").hide();
  $("#menu3").hide();
  $("#menu4").hide();
  $("#menu5").hide();
  
});

var myVar;

function myTimer() {
    var d = new Date();
    //document.getElementById("demo").innerHTML = d.toLocaleTimeString();
	AdjustBoxes();
} 

function myFunction() {
   //$("#menu").slideToggle();
}





function AdjustBoxes(){
	
	
	var menutop=$(".top").height()-20;
	$("#menu2").css("top", menutop+"px");
	$("#menu3").css("top", menutop+"px");
	$("#menu4").css("top", menutop+"px");

	var menuleft = $(window).width()-570;
	$("#menu2").css("left", menuleft+"px");
	menuleft = $(window).width()-110;
	$("#menu3").css("left", menuleft+"px");
	menuleft = $(window).width()-230;
	$("#menu4").css("left", menuleft+"px");
	menuleft = $(window).width()-420;
	$("#menu5").css("left", menuleft+"px");
	
	
	var divi = ( ($("#cc1").width()*554) / 859 ) - 3 ;
	$("#cc1").height(divi);
	$("#cc2").height(divi);
	$("#cc3").height(divi);
	
	
	
	
	var altm=(divi/2)-30;
	
	$("#cc3").css("padding-top", altm+"px");
	
	/////////
	
	var div_med = divi/2 - 2;
	
	
	$("#dd1").height(div_med);
	$("#dd2").height(div_med);
	$("#dd3").height(div_med);
	
	altm=(altm/2);
	
	$("#dd3").css("padding-top", altm+"px");
	
	
	$("#ee1").height(div_med);
	$("#ee2").height(div_med);
	$("#ee3").height(div_med);
	
	$("#ee3").css("padding-top", altm+"px");
	
	var difff=($("body").width()-$("#cc1").width())-14;
	
	//alert(difff);
	
	//difff=50;
	
	$("#dd1").width(difff);
	$("#dd2").width(difff);
	
	$("#ee1").width(difff);
	$("#ee2").width(difff);
	
	
	//800 × 1200
	var divi_ff = ( ($("#ff1").width()*1150) / 800 ) - 3 ;
	
	$("#ff1").height(divi_ff);
	$("#ff2").height(divi_ff);
	$("#ff3").height(divi_ff);
	
	var altm=(divi_ff/2)-30;
	
	$("#ff3").css("padding-top", altm+"px");
	
	
	//1500x1000
	//var divi_gg = ( ($("#gg1").width()*1000) / 1500 ) - 3 ;
	
	$("#gg1").height(divi_ff);
	$("#gg2").height(divi_ff);
	$("#gg3").height(divi_ff);
	
	
	$("#gg3").css("padding-top", altm+"px");
	
	
	
	difff=($("body").width()-$("#ff1").width())-14;
	
	$("#gg1").width(difff);
	$("#gg2").width(difff);
	
}




function ShowCC(t_1,t_2){
	//if(viendo==0){
	$('#'+t_1).stop();
	$('#'+t_2).stop();
	$('#'+t_2).fadeTo( 700, 1);
	$('#'+t_1).animate({ backgroundSize: '120%' }, 700);
}
function ShowCC_out(t_1,t_2){
	$('#'+t_1).stop();
	$('#'+t_2).stop();
	$('#'+t_1).animate({ backgroundSize: '100%' }, 600);
	$('#'+t_2).fadeTo( 600, 0 );
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
  
  AdjustProducts();
 
  
});


function AdjustProducts(){
	
	//1170 × 520
	var divi = ($( window ).width()*520) / 1170 ;
	$("#header").height(divi);
	
	var dif = (divi-250)/2;
	
	$("#blanco").css( { "top" : dif+"px"} );
	
	
	AdjustBoxes();
	AdjustBoxes();
	
	/*
  var divi = $( window ).width() / 270;
  var divi_int = Math.floor(divi);
  
  var wi_divi = 270*divi_int;
  
  $("#fa_bottom_int").width(wi_divi);
  //$("#fa_bottom_int").height(420);
  
  var diff = ($( window ).width() - wi_divi)/2;
  
  //alert( divi_int  );
  
  //
  
  $("#fa_bottom_int").css( { "margin-left" : diff+"px"} );
  */
}