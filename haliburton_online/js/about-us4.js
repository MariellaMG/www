// JavaScript Document
$( document ).ready(function() {
  AdjustProducts();
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

var pos=0;

function Back(){
	//alert("Back");
	//$("#profile_container_int").css("marginLeft") = "200px";
	pos++;
	var marg=pos*-$(".dd1").width();
	//$("#profile_container_int").css( { "margin-left" : marg+"px"} );
	$("#profile_container_int").animate({
		marginLeft: marg+'px'
	}, 500);
}
function Forward(){
	//alert("Back");
	//$("#profile_container_int").css("marginLeft") = "200px";
	pos--;
	if(pos<0){
		pos=0;
	}
	var marg=pos*-$(".dd1").width();
	//$("#profile_container_int").css( { "margin-left" : marg+"px"} );
	$("#profile_container_int").animate({
		marginLeft: marg+'px'
	}, 500);
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
	
	
	$("#bb1").width($(window).width()/2);
	$("#cc1").width(($(window).width()/2)+10);
	
	var divi = ( ($("#bb1").width()*700) / 765 ) - 3 ;
	$("#bb1").height(divi);
	$("#bb2").height(divi);
	
	$("#cc1").height(divi);
	
	var altm=($("#bb1").width()/10);
	
	//$("#cc2").css("padding-top", altm+"px");
	
	var altn=(divi/2)-30;
	
	$("#bb3").css("padding-top", altn+"px");
	
	/////////
	
	//640 × 392
    var divi = ( ((($( window ).width()/3))*392) / 640 ) - 3 ;
	
	
	$(".dd1").width($( window ).width()/3);
	$(".dd1").height(divi);
	
	
	$("#profile_container").height(divi);
	

	
	var altn=(divi/2)-30;
	
	$(".cc3").css("padding-top", altn+"px");
	
	
	//////////
	
	var topa=$("#header").height()+$("#bb1").height();
	
	
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
	
}