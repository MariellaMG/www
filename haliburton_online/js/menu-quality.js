// JavaScript Document
$( document ).ready(function() {
  AjustarProductosQ();
  myVarQ = setInterval(myTimerQ, 1000);
  //$("#menu4").hide();
});

var myVarQ;

function myTimerQ() {
    var dq = new Date();
	AjustarProductosQ();
} 

function myFunctionQ() {
   //$("#menu").slideToggle();
}


$( window ).resize(function() {

  AjustarProductosQ();
 
  
});

function AjustarProductosQ(){
	
	
}