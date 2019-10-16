// JavaScript Document
$( document ).ready(function() {
 
  AdjustMenus();

  myVarOverMenu = setInterval(myTimerOverMenu, 1000);
  
  $("#menu2").hide();
  $("#menu3").hide();
  $("#menu4").hide();
  $("#menu5").hide();
  $("#menu6").hide();
  
});

var myVarOverMenu;

function myTimerOverMenu() {
    var d = new Date();
    //document.getElementById("demo").innerHTML = d.toLocaleTimeString();
	AdjustMenus();
} 

function myFunction() {
   //$("#menu").slideToggle();
}

var pos=0;


function HideMenu(){
	$("#menu2").hide(50);
	$("#menu3").hide(50);
	$("#menu4").hide(50);
	$("#menu5").hide(50);
	$("#menu6").hide(50);
}

function ShowMenuTwo(){
	$("#menu3").hide(50);
	$("#menu4").hide(50);
	$("#menu5").hide(50);
	$("#menu6").hide(50);
	
	$("#menu2").show(100);
}


function ShowMenuThree(){
	$("#menu2").hide(50);

	$("#menu4").hide(50);
	$("#menu5").hide(50);
	$("#menu6").hide(50);

	$("#menu3").show(100);
}

function ShowMenuFour(){
	//alert("4");
	$("#menu2").hide(50);
	$("#menu3").hide(50);
	
	$("#menu5").hide(50);
	$("#menu6").hide(50);
	
	$("#menu4").show(100);
}

function ShowMenuFive(){
	$("#menu2").hide(50);
	$("#menu3").hide(50);
	$("#menu4").hide(50);
	$("#menu6").hide(50);
	
	$("#menu5").show(100);
}
function ShowMenuSix(){
	$("#menu2").hide(50);
	$("#menu3").hide(50);
	$("#menu4").hide(50);
	
	$("#menu5").hide(50);
	$("#menu6").show(100);
}


function AdjustMenus(){
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
  
  AdjustMenus()
  AdjustMenus();
 
  
});

