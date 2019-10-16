// JavaScript Document
$( document ).ready(function() {
 	//alert("--");
   //$('#menuicon').click(myFunction);
   
  AdjustProducts();
  
  $('#bb2').fadeTo( 10, 0.0 );
  
  $('#dd2').fadeTo( 10, 0.0 );
  $('#ee2').fadeTo( 10, 0.0 );
  $('#ff2').fadeTo( 10, 0.0 );
  
  //ShowCC('bb1','bb2');
  ShowCC_out('bb1','bb2');
  
  myVar = setInterval(myTimer, 1000);
  
  $("#menu2").hide();
  $("#menu3").hide();
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

var pos=0;

function Forward(){
	//alert("Atras");
	//$("#profile_container_int").css("marginLeft") = "200px";
	pos++;
	if(pos>=totales-3){
		pos=3;
		var mm = ( (pos-1) *-$(".dd1").width())-17;
		$("#profile_container_int").stop();
		$("#profile_container_int").css("marginLeft", mm+"px");
	}
	var marg=(pos*-$(".dd1").width())-17;
	//$("#profile_container_int").css( { "margin-left" : marg+"px"} );
	$("#profile_container_int").stop();
	$("#profile_container_int").animate({
		marginLeft: marg+'px'
	}, 400);
}

function Back(){
	//alert("Atras");
	//$("#profile_container_int").css("marginLeft") = "200px";
	pos--;
	if(pos<0){
		//pos=1;
		
		pos=totales-7;
		var mm = ( (pos+1) *-$(".dd1").width())-17;
		$("#profile_container_int").stop();
		$("#profile_container_int").css("marginLeft", mm+"px");
		
	}
	var marg=(pos*-$(".dd1").width())-17;
	//$("#profile_container_int").css( { "margin-left" : marg+"px"} );
	$("#profile_container_int").stop();
	$("#profile_container_int").animate({
		marginLeft: marg+'px'
	}, 400);
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
	
	var menuleft = $(window).width()-570;
	$("#menu2").css("left", menuleft+"px");
	menuleft = $(window).width()-110;
	$("#menu3").css("left", menuleft+"px");
	
	$("#bb1").width($(window).width()/2);
	$("#cc1").width($(window).width()/2);
	
	var divi = ( ($("#bb1").width()*500) / 756 ) - 3 ;
	$("#bb1").height(divi);
	$("#bb2").height(divi);
	
	$("#cc1").height(divi);
	
	$("#profile_container_a").height(divi);
	$("#profile_container_a_int").height(divi);
	
	var altm=($("#bb1").width()/6);
	
	$(".ccc2").css("padding-top", altm+"px");
	
	
	
	
	var altn=(divi/2)-30;
	
	$("#bb3").css("padding-top", altn+"px");
	
	/////////
	/////////
	
	//640 × 392
    var divi = ( ((($( window ).width()/3))*410) / 640 ) - 3 ;
	
	
	$(".dd1").width($( window ).width()/3);
	$(".dd1").height(divi);
	
	
	$("#profile_container").height(divi);
	
	
	/*
	$("#dd1").height(divi);
	$("#dd2").height(divi);
	
	$("#ee1").height(divi);
	$("#ee2").height(divi);
	
	$("#ff1").height(divi);
	$("#ff2").height(divi);
	*/
	
	
	var altn=(divi/2)-30;
	
	$(".cc3").css("padding-top", altn+"px");
	
	
	//////////
	
	var topa=$("#header").height()+$("#bb1").height()+$("#top").height()+$(".dd1").height()/3;
	
	
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
	
}




function ShowCC(t_1,t_2){
	//if(viendo==0){
	$('#'+t_1).stop();
	$('#'+t_2).stop();
	$('#'+t_2).fadeTo( 400, 1);
	//$('#'+t_1).animate({ backgroundSize: '120%' }, 400);
}
function ShowCC_out(t_1,t_2){
	$('#'+t_1).stop();
	$('#'+t_2).stop();
	//$('#'+t_1).animate({ backgroundSize: '100%' }, 200);
	$('#'+t_2).fadeTo( 200, 0 );
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
	//$("#header").height(divi);
	
	var dif = (divi-250)/2;
	
	//$("#white").css( { "top" : dif+"px"} );
	
	
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