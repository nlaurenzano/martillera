function validarLogin()
{
	$("#mensajesLogin").val('');
	var varUsuario=$("#correo").val();
	var varClave=$("#clave").val();
	var recordar=$("#recordarme").is(':checked');
		
	var funcionAjax=$.ajax({
		//url:"php/validarUsuario.php",
		url:"php/action.php",
		type:"post",
		data:{
			queHacer:'ValidarUsuario',
			recordarme:recordar,
			usuario:varUsuario,
			clave:varClave
		}
	});

	funcionAjax.done(function(retorno) {
		if (retorno != "ingreso") {
			$("#mensajesLogin").html(retorno);
			$("#mensajesLogin").removeAttr("hidden");
			$("#botonesNav").html('');
		} else {
			document.cookie = "ultimoIngresado=" + varUsuario;
			//MostrarHeader('MostrarHeaderLogin');
			Mostrar('MostrarLogin');		// Muestra la pantalla de bienvenida
		}
	});
	funcionAjax.fail(function(retorno) {
		$("#botonesNav").html('');
		$("#mensajesLogin").html(retorno.responseText);
		$("#mensajesLogin").removeAttr("hidden");
	});
	
}

function validarPassChange()
{
	$("#mensajesLogin").val('');
	var varUsuario=$("#correo").val();
	var varClaveActual=$("#claveActual").val();
	var varClaveNueva=$("#claveNueva").val();
	var varClaveNuevaRep=$("#claveNuevaRep").val();

	$("#claveActual").val('');
	$("#claveNueva").val('');
	$("#claveNuevaRep").val('');

	var funcionAjax=$.ajax({
		//url:"php/validarUsuario.php",
		url:"php/action.php",
		type:"post",
		data:{
			queHacer:'ValidarPassChange',
			usuario:varUsuario,
			claveActual:varClaveActual,
			claveNueva:varClaveNueva,
			claveNuevaRep:varClaveNuevaRep
		}
	});

	funcionAjax.done(function(retorno) {
		if (retorno != "ingreso") {
			$("#mensajesLogin").html(retorno);
			$("#mensajesLogin").removeAttr("hidden");
			$("#botonesNav").html('');
		} else {
			$("#mensajesLogin").html('La contraseña se modificó exitosamente.');
			$("#mensajesLogin").removeAttr("hidden");
		}
	});
	funcionAjax.fail(function(retorno) {
		$("#botonesNav").html('');
		$("#mensajesLogin").html(retorno.responseText);
		$("#mensajesLogin").removeAttr("hidden");
	});
	
}

function deslogear() {
	var funcionAjax = $.ajax({
		url:"php/deslogearUsuario.php",
		type:"post"
	});
	funcionAjax.done(function(retorno) {
		$("#botonesNav").html('');
		MostrarHeader('MostrarHeaderInicio');
		Mostrar('MostrarInicio');
	});
}

function MostrarBotones() {
	var funcionAjax=$.ajax({
		url:"nexo.php",
		type:"post",
		data:{queHacer:"MostrarBotones"}
	});
	funcionAjax.done(function(retorno) {
		$("#botonesNav").html(retorno);
	});
}

function getCookie(cname) {

    var name = cname + "=";
    var ca = document.cookie.split(';');
    for(var i = 0; i <ca.length; i++) {
        var c = ca[i];
        while (c.charAt(0)==' ') {
            c = c.substring(1);
        }
        if (c.indexOf(name) == 0) {
            return c.substring(name.length,c.length);
        }
    }
    return "";
}

function borrarCookies() {
	//document.cookie = "ultimoIngresado=; expires=Thu, 01 Jan 1970 00:00:00 UTC";
	document.cookie = "ultimoIngresado=";
	MostrarUltimo();
}

function MostrarUltimo() {
	var ultimo = getCookie("ultimoIngresado");
	if (ultimo!='') {
		$("#ultimoIngresado").html('Último ingreso: ' + ultimo);
	} else {
		$("#ultimoIngresado").html('');
	}
}