function validarLogin()
{
	$("#mensajesLogin").val('');
	var varUsuario=$("#correo").val();
	var varClave=$("#clave").val();				// ACÁ VOY A MANDAR EL HASH... ¿O SE MANDA LA CLAVE?
	var recordar=$("#recordarme").is(':checked');
		
//$("#mensajesLogin").html("<img src='imagenes/ajax-loader.gif' style='width: 30px;'/>");
	

	var funcionAjax=$.ajax({
		url:"php/validarUsuario.php",
		type:"post",
		data:{
			recordarme:recordar,
			usuario:varUsuario,
			clave:varClave
		}
	});

	funcionAjax.done(function(retorno) {
		if (retorno != "ingreso") {
			$("#mensajesLogin").html(retorno);
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
	});
	
}

// Usa datos de usuario hardcodeados, para facilitar las pruebas
function testLogin(tipoUsuario) {
	if (tipoUsuario=='comprador' || tipoUsuario=='administrador' || tipoUsuario=='vendedor') {
		switch(tipoUsuario) {
	    case 'comprador':
	        $("#correo").val('comp@comp.com');
			$("#clave").val('123');
	        break;
	    case 'administrador':
	        $("#correo").val('admin@test.com');
			$("#clave").val('pass1234');
	        break;
	    case 'vendedor':
	        $("#correo").val('vend@vend.com');
			$("#clave").val('321');
	        break;
	    default:
	        //
		}
		validarLogin();
	}
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