// JavaScript Document
$( document ).ready(function() {

  $("#lc_menu").hide();
  $("#lc_menu_dos").hide();
});

function MostrarMenuLogin(){
	$("#lc_menu").show(100);
}

function OcultarMenuLogin(){
	$("#lc_menu").hide(100);
}


function MostrarMenu(){
	$("#lc_menu_dos").show(100);
}

function OcultarMenu(){
	$("#lc_menu_dos").hide(50);
	$("#lc_menu").hide(50);
}





$('body').click(function() {
   $("#lc_menu").hide(50);
});

$('#header').click(function() {
   $("#lc_menu").hide(50);
});

function HacerLogin(){
	//alert($("#name").val()+"   "+$("#pass").val());
	usr = $("#name").val();
	pass = $("#pass").val();
	
	
	
	if($("#name").val()=="" && $("#pass").vall()==""){
		$("#login_salida").html("**Must fill all the fields**");
	}else{
		$("#login_salida").html("**Sending data...");
		$.post("/login_cart_int.php?usr="+usr+"&pass="+pass, function(data){
			//$("#linea"+t_id).hide("slow");
			//alert("-"+data+"-");
			if(data=="ok"){
				$("#login_salida").html("**Login complete**");
				
				CerrarLog();
				window.location.href = '/';
			}
			if(data=="error"){
				$("#login_salida").html("**Wrong user or password**");
			}
		});
	}
}

function Eliminar(t_id){
	
	if(confirm("Estas seguro que deseas borrar esta pregunta?")){
		$.get("acta_eliminar_get.php?id="+t_id, function(data){
			$("#linea"+t_id).hide("slow");
		});
	}else{
		
	}
}

function Logout(){
	//alert("Logout");
		$.post("/logout_int.php", function(data){
			//$("#linea"+t_id).hide("slow");
			//alert(data);
			CerrarLog();
			window.location.href = '/';
		});
		
		
}