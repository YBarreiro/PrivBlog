var formulario=$("#enviar_registro");
var nombre=$("#nombre");
var email=$("#email");
var pass=$("#pass");
var pass2=$("#pass2");
var fecha_nac=$("#fecha_nac");
var sexo=$(".sexo_registro.checked");
var sexo1=$("#sexo1");
var sexo2=$("#sexo2");
var terminos=$("#terminos");
var error_nombre_vacio=$("#error_nombre_vacio");
var error_nombre=$("#error_nombre");
var error_email_vacio=$("#error_email_vacio");
var error_email=$("#error_email");
var error_pass_vacio=$("#error_pass_vacio");
var error_pass=$("#error_pass");
var error_pass2_vacio=$("#error_pass2_vacio");
var error_pass_igual=$("#error_pass_igual");
var error_fecha_nac=$("#error_fecha_nac");
var error_sexo=$("#vacio_sexo");
var error_terminos=$("#error_terminos_vacio");
var error_email=$("#error_email");
var error_pass_vacio=$("#error_pass_vacio");
var error_pass=$("#error_pass");
var error_pass2_vacio=$("#error_pass2_vacio");
var error_pass2=$("#error_pass2");
var pass_conectado=$("#pass_conectado");
var error_pass_conectado=$("#error_pass_conectado");






function validarNombre(e){
	if (nombre.val()=='') {
		error_nombre_vacio.show();
		//error_nombre.hide();
		e.preventDefault();

	}
	else if(!nombre.val().match(/^[a-zA-Z0-9\u00F1\u00D1]{3,12}$/)){
		error_nombre_vacio.hide();
		error_nombre.show();
		e.preventDefault();

	}else{
		error_nombre_vacio.hide();
		error_nombre.hide();

	}

}

function validarEmail(e){
	if (email.val()=='') {
		error_email_vacio.show();
		//error_email.hide();
		e.preventDefault();

	}else if(!email.val().match(/^[a-zA-Z0-9._-]+@[a-zA-Z0-9._-]+\.[a-zA-Z]+$/)){
		error_email_vacio.hide();
		error_email.show();
		e.preventDefault();
	}

	else{
		error_email_vacio.hide();
		error_email.hide();
	

	}
}


   function validarPass1(e){
	if (pass.val()=='') {
		error_pass_vacio.show();
		//error_pass_igual.hide();
		e.preventDefault();
	}else if(!pass.val().match(/^[a-zA-Z0-9]{3,10}$/)){

		error_pass_vacio.hide();
		error_pass.show();
	}else{
		error_pass_vacio.hide();
		error_pass.hide();
	}
}

function validarPass2(e){
	if (pass2.val()=='') {
		error_pass2_vacio.show();
		//error_pass_igual.hide();
		e.preventDefault();
	}else if (pass.val()!==pass2.val()) {
		error_pass2_vacio.hide();
		error_pass_igual.show();
		e.preventDefault();

	}else{
		error_pass2_vacio.hide();
		error_pass_igual.hide();
	}
}


function validarPass(e){

	validarPass1(e);
	validarPass2(e);
}


function validarPassConectado(e){

	if (pass.val()=='') {
		error_pass_vacio.show();
		e.preventDefault();
	}else{
		error_pass_vacio.hide();
	}

}

function validarPassConectadoRepe(e){
	if (pass_conectado.val()=='') {
		error_pass_conectado.show();
		e.preventDefault();
	}else{
		error_pass_conectado.hide();
	}
}


function validarFechaNac(e){
	if (fecha_nac.val()=='') {
		error_fecha_nac.show();
		e.preventDefault();

	}

	else{
		error_fecha_nac.hide();
		
	}
}



function validarSexo(){

	var checked=false;

	$("input[type=radio]").each(function() {
            if ($(this).attr("checked") == "checked") {
                ckecked = true;

                
            
        }

        if (checked==false) {
            error_sexo.show();

        } if(checked==true) {
            error_sexo.hide();
            }
            
        });

	
}





function validarTerminos(e){
	if(!terminos.is(':checked')){
		//alert("flngls");

		error_terminos.show();
		e.preventDefault();

}else{
	error_terminos.hide();
}
}



$(document).ready(function(){

	


$("#enviar_registro_admin").click(function(e){


	validarNombre(e);
	validarEmail(e);
	validarPass(e);



});


$("#cambiar_email").click(function(e){


	validarEmail(e);
	validarPassConectado(e);



});


$("#cambiar_pass").click(function(e){



	validarPass(e);
	validarPassConectado(e);
	validarPassConectadoRepe(e);


});



 $("#eliminar_usuario").click(function (e) {
 var resultado = window.confirm('¿Seguro que quieres eliminar tu usuario? Esto supondrá la eliminación de tus datos y todas tus entradas de forma definitiva.');
     if (resultado == false) {
      e.preventDefault();
            }
        });










	});

