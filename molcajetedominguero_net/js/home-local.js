// JavaScript Document
$( document ).ready(function() {
 	//alert("--");
   //$('#menuicon').click(myFunction);
   
  AjustarProductos();
  
  /*
  $('#bb2').fadeTo( 10, 0.0 );
  
  $('#dd2').fadeTo( 10, 0.0 );
  $('#ee2').fadeTo( 10, 0.0 );
  $('#ff2').fadeTo( 10, 0.0 );
  
  //VerCC('bb1','bb2');
  VerCC_out('bb1','bb2');
  */
  
  myVar = setInterval(myTimer, 1000);
  
});

var myVar;
var scroll=0;

$(window).scroll(function (event) {
    scroll = $(window).scrollTop();
    // Do something
	var scroll2=scroll*1.2;
	$("#header1").css('background-position-x', scroll2+"px");
	var perc=100+scroll/10;
	$("#header2").css('background-size', perc+"% "+perc+"%");
	//$("#header").css('background-position-y', scroll+"px");
	AjustarCajas();
});


function VerNoche(){
	$('#header1').css("background-image", "url(noche/dom_d1_1_b_noche.png)"); 
	$('#header').css("background-image", "url(noche/dom_d1_1.jpg)");
	$('#header').css("background-color", "#1B1339");
}
function VerDia(){
	$('#header').css("background-color", "#78B19B");
	$('#header1').css("background-image", "url(design2_partes/1/dom_d1_1_b.png)"); 
	$('#header').css("background-image", "url(design2_partes/1/dom_d1_1.jpg)"); 
}

function myTimer() {
    var d = new Date();
    //document.getElementById("demo").innerHTML = d.toLocaleTimeString();
	AjustarCajas();
} 

function myFunction() {
   //$("#menu").slideToggle();
}

var pos=0;

function Adelante(){
	//alert("Atras");
	//$("#profile_container_int").css("marginLeft") = "200px";
	pos++;
	if(pos>=totales-3){
		pos=totales-3;
	}
	var marg=(pos*-$(".dd1").width())-17;
	//$("#profile_container_int").css( { "margin-left" : marg+"px"} );
	$("#profile_container_int").stop();
	$("#profile_container_int").animate({
		marginLeft: marg+'px'
	}, 400);
}

function Atras(){
	//alert("Atras");
	//$("#profile_container_int").css("marginLeft") = "200px";
	pos--;
	if(pos<0){
		pos=0;
	}
	var marg=(pos*-$(".dd1").width())-17;
	//$("#profile_container_int").css( { "margin-left" : marg+"px"} );
	$("#profile_container_int").stop();
	$("#profile_container_int").animate({
		marginLeft: marg+'px'
	}, 400);
}

function AjustarCajas(){
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




function VerCC(t_1,t_2){
	//if(viendo==0){
	$('#'+t_1).stop();
	$('#'+t_2).stop();
	$('#'+t_2).fadeTo( 500, 1);
	$('#'+t_2).show();
	$('#'+t_1).animate({ backgroundSize: '110%' }, 300);
	//$('#'+t_1+" .producto_all").animate({ paddingTop: '250px' }, 100);
}
function VerCC_out(t_1,t_2){
	$('#'+t_1).stop();
	$('#'+t_2).stop();
	$('#'+t_1).animate({ backgroundSize: '100%' }, 100);
	$('#'+t_2).fadeTo( 100, 0 );
	$('#'+t_2).hide();
	//$('#'+t_1+" .producto_all").animate({ paddingTop: '300px' }, 50);
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