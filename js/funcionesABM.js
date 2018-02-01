function GuardarPropiedad()
{
	var camposValidos=ValidarCampos();
	if (camposValidos.trim()=='') {
		$(".mensajesABM").html('');

		var id=$("#idPropiedad").val();
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
		
		var latCarga=$("#latCarga").val();
		var lngCarga=$("#lngCarga").val();

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
			} else {
				$("#id").val('-1');
				$("input:radio").prop( "checked", false );
				$("#ambientes").val('');
				$("#zona").val('');
				$("#descBreve").val('');
				$("#descripcion").val('');
				$("#destacada").prop( "checked", false );
				$("#ocultar").prop( "checked", false );
				$("#imagen").val('');
				$("#latCarga").val('');
				$("#lngCarga").val('');
				marker.setVisible(false);
			}
		});
		funcionAjax.fail(function(retorno){
			$(".mensajesABM").html("Error al cargar la propiedad: " + retorno);
		});
	} else {
		$(".mensajesABM").html("Debe completar los siguientes campos: " + camposValidos);
	}
}

function EliminarPropiedad(indicePropiedad) {
	$(".mensajesABM").html('');
	
	if (confirm("¿Confirma que desea eliminar esta propiedad?")===true) {
		var funcionAjax=$.ajax({
			url:"php/action.php",
			type:"post",
			data:{
				queHacer:"Borrar",
				idBorrar:propiedades[indicePropiedad].id
			}
		});
		funcionAjax.done(function(retorno) {
			BuscarPropiedades();
		});
		funcionAjax.fail(function(retorno) {
			alert("Error al borrar: " + retorno.responseText);
			$("#mensajesABM").html("Error al borrar: " + retorno.responseText);
		});	
	}
}

function ValidarCampos() {
	var retorno = '';
	retorno = Validar('operacion',$("input:radio[name=operacion]:checked").val());
	retorno+= Validar('tipo',$("input:radio[name=tipo]:checked").val());
	retorno+= Validar('ambientes',$("#ambientes").val());
	retorno+= Validar('zona',$("#zona").val());
	retorno+= Validar('descBreve',$("#descBreve").val());
	retorno+= Validar('descripcion',$("#descripcion").val());
	retorno+= Validar('imagenes',$("#imagen"));

	return retorno;
}


function Validar(campo,valor) {
	if (valor==undefined || valor=='' || valor=='none') {
		return '<br />' + ObtenerDesc('etiquetas',campo);
	} else {
		return '';
	}
}