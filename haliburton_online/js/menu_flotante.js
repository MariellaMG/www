// JavaScript Document
$( document ).ready(function() {
 
  AjustarFlotantes();

  myVarFlotante = setInterval(myTimerFlotante, 1000);
  
  $("#menu2").hide();
  $("#menu3").hide();
  $("#menu4").hide();
  $("#menu5").hide();
  $("#menu6").hide();
  
});

var myVarFlotante;

function myTimerFlotante() {
    var d = new Date();
    //document.getElementById("demo").innerHTML = d.toLocaleTimeString();
	AjustarFlotantes();
} 

function myFunction() {
   //$("#menu").slideToggle();
}

var pos=0;


function OcultarMenuDos(){
	$("#menu2").hide(50);
	$("#menu3").hide(50);
	$("#menu4").hide(50);
	$("#menu5").hide(50);
	$("#menu6").hide(50);
}

function VerMenuDos(){
	$("#menu3").hide(50);
	$("#menu4").hide(50);
	$("#menu5").hide(50);
	$("#menu6").hide(50);
	
	$("#menu2").show(100);
}
function OcultarMenuTres(){
	$("#menu2").hide(50);
	$("#menu3").hide(50);
	$("#menu4").hide(50);
	$("#menu5").hide(50);
	$("#menu6").hide(50);
}

function VerMenuTres(){
	$("#menu2").hide(50);

	$("#menu4").hide(50);
	$("#menu5").hide(50);
	$("#menu6").hide(50);

	$("#menu3").show(100);
}

function VerMenuCuatro(){
	//alert("4");
	$("#menu2").hide(50);
	$("#menu3").hide(50);
	
	$("#menu5").hide(50);
	$("#menu6").hide(50);
	
	$("#menu4").show(100);
}

function VerMenuCinco(){
	$("#menu2").hide(50);
	$("#menu3").hide(50);
	$("#menu4").hide(50);
	$("#menu6").hide(50);
	
	$("#menu5").show(100);
}
function VerMenuSeis(){
	$("#menu2").hide(50);
	$("#menu3").hide(50);
	$("#menu4").hide(50);
	
	$("#menu5").hide(50);
	$("#menu6").show(100);
}


function AjustarFlotantes(){
	var menutop=$(".top").height()-20;
	$("#menu2").css("top", menutop+"px");
	$("#menu3").css("top", menutop+"px");
	$("#menu4").css("top", menutop+"px");
	$("#menu5").css("top", menutop+"px");
	$("#menu6").css("top", menutop+"px");

	var menuleft = $(window).width()-570;
	$("#menu2").css("left", menuleft+"px");
	menuleft = $(window).width()-110;
	$("#menu3").css("left", menuleft+"px");
	menuleft = $(window).width()-230;
	$("#menu4").css("left", menuleft+"px");
	menuleft = $(window).width()-420;
	$("#menu5").css("left", menuleft+"px");
	
	menuleft = $(window).width()-470;
	$("#menu6").css("left", menuleft+"px");
}


$( window ).resize(function() {
  
  AjustarFlotantes()
  AjustarFlotantes();
 
  
});

