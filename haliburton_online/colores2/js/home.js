// JavaScript Document
$( document ).ready(function() {
 	//alert("--");
   //$('#menuicon').click(myFunction);
   
  AjustarProductos();
  
  $('#cc2').fadeTo( 10, 0.0 );
  $('#dd2').fadeTo( 10, 0.0 );
  $('#ee2').fadeTo( 10, 0.0 );
  
  $('#ff2').fadeTo( 10, 0.0 );
  
  $('#gg2').fadeTo( 10, 0.0 );
  
  myVar = setInterval(myTimer, 1000);
  
});

var myVar;

function myTimer() {
    var d = new Date();
    //document.getElementById("demo").innerHTML = d.toLocaleTimeString();
	AjustarCajas();
} 

function myFunction() {
   //$("#menu").slideToggle();
}


function AjustarCajas(){
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
	
}




function VerCC(t_1,t_2){
	//if(viendo==0){
	$('#'+t_1).stop();
	$('#'+t_2).stop();
	$('#'+t_2).fadeTo( 700, 1);
	$('#'+t_1).animate({ backgroundSize: '120%' }, 700);
}
function VerCC_out(t_1,t_2){
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
	
	$("#blanco").css( { "top" : dif+"px"} );
	
	
	AjustarCajas();
	AjustarCajas();
	
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