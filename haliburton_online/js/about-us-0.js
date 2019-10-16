// JavaScript Document
$( document ).ready(function() {
 	//alert("--");
   //$('#menuicon').click(myFunction);
   
  AdjustProducts();
  

  
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
	
	
}