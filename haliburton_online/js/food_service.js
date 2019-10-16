// JavaScript Document
$( document ).ready(function() {
 	//alert("--");
   //$('#menuicon').click(myFunction);
   
  AjustarProductos();
  
  $('#aa2').fadeTo( 10, 0.0 );
  $('#bb2').fadeTo( 10, 0.0 );
  $('#cc2').fadeTo( 10, 0.0 );
  
  $('#dd2').fadeTo( 10, 0.0 );
  $('#ee2').fadeTo( 10, 0.0 );
  $('#ff2').fadeTo( 10, 0.0 );
  
  myVar = setInterval(myTimer, 1000);
  
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



function OcultarMenuDos(){
	$("#menu2").hide(50);
	$("#menu3").hide(50);
}

function VerMenuDos(){
	$("#menu2").show(100);
}
function OcultarMenuTres(){
	$("#menu3").hide(50);
}

function VerMenuTres(){
	$("#menu2").hide(50);
	$("#menu3").show(100);
}

function AdjustBoxes(){
	
	
	var menutop=$(".top").height()-20;
	$("#menu2").css("top", menutop+"px");
	$("#menu3").css("top", menutop+"px");
	
	var menuleft = $(window).width()-530;
	$("#menu2").css("left", menuleft+"px");
	menuleft = $(window).width()-110;
	$("#menu3").css("left", menuleft+"px");
	
	
	var divi = ( ($("#tbb1").width()*664) / 756 ) - 3 ;
	$("#tbb1").height(divi);
	$("#tbb2").height(divi);
	
	$("#tcc1").height(divi);
	
	var altm=($("#tbb1").width()/8);
	
	$("#tcc2").css("padding-top", altm+"px");
	
	var altn=(divi/2)-30;
	
	$("#tbb3").css("padding-top", altn+"px");
	
	
	
	
	 divi = ( ($("#aa1").width()*510) / 859 ) - 3 ;
	$("#aa1").height(divi);
	$("#aa2").height(divi);
	$("#aa3").height(divi);
	
	$("#bb1").height(divi);
	$("#bb2").height(divi);
	$("#bb3").height(divi);
	
	$("#cc1").height(divi);
	$("#cc2").height(divi);
	$("#cc3").height(divi);
	
	$("#dd1").height(divi);
	$("#dd2").height(divi);
	$("#dd3").height(divi);
	
	$("#ee1").height(divi);
	$("#ee2").height(divi);
	$("#ee3").height(divi);
	
	$("#ff1").height(divi);
	$("#ff2").height(divi);
	$("#ff3").height(divi);
	
	var altm=(divi/2)-30;
	
	$("#aa3").css("padding-top", altm+"px");
	$("#bb3").css("padding-top", altm+"px");
	$("#cc3").css("padding-top", altm+"px");
	
	$("#dd3").css("padding-top", altm+"px");
	$("#ee3").css("padding-top", altm+"px");
	$("#ff3").css("padding-top", altm+"px");
	
	
	
	/*
	
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
	var divi_ff = ( ($("#ff1").width()*1200) / 800 ) - 3 ;
	
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
	
	*/
	
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
  
  AjustarProductos();
 
  
});


function AjustarProductos(){
	
	//1170 × 520
	var divi = ($( window ).width()*520) / 1170 ;
	$("#header").height(divi);
	
	var dif = (divi-250)/2;
	
	$("#white").css( { "top" : dif+"px"} );
	
	
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