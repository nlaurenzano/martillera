function GuardarPropiedad()
{
	$(".mensajesABM").html('');

//GuardarImagenes();

	var id='0';		//$("#idPropiedad").val()
	var operacion=$("input:radio[name=operacion]:checked").val();	// radio
	var tipo=$("input:radio[name=tipo]:checked").val();				// radio
	var ambientes=$("#ambientes").val();
	var zona=$("#zona").val();				// select
	var descBreve=$("#descBreve").val();
	var descripcion=$("#descripcion").val();
	var destacada=($("#destacada").prop('checked')===true) ? '1' : '0';	// check
	var ocultar=($("#ocultar").prop('checked')===true) ? '1' : '0';	// check
	//var imagenesNombre=$("#imagen").val();			// file upload
	var imagenes=$("#imagen");

	var formData = new FormData($("#formCarga")[0]);
	var file_data = jQuery('#imagen')[0].files;
	$(file_data).each(function(i) {
		formData.append('imagenes[]', this);
	});
	formData.append('queHacer', "GuardarPropiedad");
	formData.append('id', id);
	formData.append('destacada', destacada);
	formData.append('ocultar', ocultar);
	//formData.append('imagenesNombre', imagenesNombre);

/*
	// TODO: Ver si esto es mejor ubicarlo al final
	$("#operacion").val('');
	$("#tipo").val('');
	$("#ambientes").val('');
	$("#zona").val('');
	$("#descripcion").val('');
	$("#destacada").prop( "checked", false )
	$("#ocultar").prop( "checked", false )
	$("#imagen").val('');
*/

	var funcionAjax=$.ajax({
		url:"php/action.php",
		type:"post",
		dataType : "text",
		cache: false,
		contentType: false,
        processData: false,
        data:formData
	});
	funcionAjax.done(function(retorno){
		if (retorno!='') {
			$(".mensajesABM").html(retorno);
		}
		//$("#imagen").val('');
		
	});
	funcionAjax.fail(function(retorno){
		$(".mensajesABM").html("Error al cargar la propiedad: " + retorno);
	});




}

/*
function GuardarImagenes()
{
	$(".mensajesABM").html('');


	var formData = new FormData($("#formCarga")[0]);
	var file_data = jQuery('#imagen')[0].files;
	$(file_data).each(function(i) {
		formData.append('imagenes[]', this);
	});


	var funcionAjax=$.ajax({
		url:"php/actionImagenes.php",
		type:"post",
		dataType : "text",
		cache: false,
		contentType: false,
        processData: false,
        data:formData
	});
	funcionAjax.done(function(retorno){
		if (retorno!='') {
			$(".mensajesABM").html(retorno);
		}
		//$("#imagen").val('');
		
	});
	funcionAjax.fail(function(retorno){
		$(".mensajesABM").html("Error al cargar archivos: " + retorno);
	});


}
*/

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
		$("#descBreve").val(elemento.descBreve);
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
