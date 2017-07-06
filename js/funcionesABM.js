function GuardarPropiedad()
{
	$(".mensajesABM").html('');

	var id='0';		//$("#idPropiedad").val()
	var operacion=$("input:radio[name=operacion]:checked").val();	// radio
	var tipo=$("input:radio[name=tipo]:checked").val();				// radio
	var ambientes=$("#ambientes").val();
	var zona=$("#zona").val();				// select
	var descripcion=$("#descripcion").val();
	var destacada=$("#destacada").prop('checked');	// check
	var ocultar=$("#ocultar").prop('checked');		// check
	var imagen=$("#imagen").val();			// file upload

	// TODO: Ver si esto es mejor ubicarlo al final
	$("#operacion").val('');
	$("#tipo").val('');
	$("#ambientes").val('');
	$("#zona").val('');
	$("#descripcion").val('');
	$("#destacada").prop( "checked", false )
	$("#ocultar").prop( "checked", false )
	$("#imagen").val('');

	var funcionAjax=$.ajax({
		url:"php/action.php",
		type:"post",
		data:{
			queHacer:"GuardarPropiedad",
			id:id,
			operacion:operacion,
			tipo:tipo,
			ambientes:ambientes,
			zona:zona,
			descripcion:descripcion,
			destacada:destacada,
			ocultar:ocultar,
			imagen:imagen
		}
	});
	funcionAjax.done(function(retorno){
		$(".mensajesABM").html(retorno);
		
	});
	funcionAjax.fail(function(retorno){
		$(".mensajesABM").html("Error al ingresar la propiedad: " + retorno.responseText);
	});
}

function Borrar(idBorrar)
{
	var funcionAjax=$.ajax({
		url:"action.php",
		type:"post",
		data:{
			queHacer:"Borrar",
			idBorrar:idBorrar
		}
	});
	funcionAjax.done(function(retorno){
		//$("#mensajesABM").html('');
		Mostrar('MostrarGrilla');
	});
	funcionAjax.fail(function(retorno){ 
		$("#mensajesABM").html("Error al borrar: " + retorno.responseText);	
	});	
}

function Modificar(idModificar) {
	Mostrar('MostrarAlta');

	var funcionAjax=$.ajax({
		url:"action.php",
		type:"post",
		data:{
			queHacer:"Modificar",
			idModificar:idModificar
		}
	});
	funcionAjax.done(function(retorno){
		var elemento =JSON.parse(retorno);
		$("#operacion").val(elemento.operacion);
		$("#idModificar").val(elemento.operacion);
		$("#tipo").val(elemento.tipo);
		$("#ambientes").val(elemento.ambientes);
		$("#zona").val(elemento.zona);
		$("#descripcion").val(elemento.descripcion);
		$("#destacada").val(elemento.destacada);
		$("#ocultar").val(elemento.ocultar);
		$("#imagen").val(elemento.imagen);
	});
	funcionAjax.fail(function(retorno){	
		$("#mensajesABM").html("Error al borrar: " + retorno.responseText);	
	});	
//	Mostrar('MostrarAlta');
}
