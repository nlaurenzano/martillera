function Mostrar(queMostrar, idPropiedad) {
	//$("#principal").html('<img style="padding-top:10%;" src="images/preloader.gif">');

	// Primero se chequea si las descripciones de texto están cargadas
	if (typeof hayDescripciones=="undefined") {
		// Cargamos las descripciones
		CargarDescripcionesAjax(queMostrar, idPropiedad);
	} else {
		var funcionAjax=$.ajax({
			url:"php/action.php",
			type:"post",
			data:{
				queHacer:queMostrar,
				idPropiedad:idPropiedad}
		});
		funcionAjax.done(function(retorno){
			$("#principal").html(retorno);
		});
		funcionAjax.fail(function(retorno){
			$("#principal").html(retorno.responseText);	
		});
		funcionAjax.always(function(retorno){
			//alert("siempre "+retorno.statusText);

		});
	}
}

function MostrarHeader(queMostrar) {
	//$("#navegacion").html('<img style="padding-top:10%;" src="images/preloader.gif">');

	var funcionAjax=$.ajax({
		url:"php/action.php",
		type:"post",
		data:{queHacer:queMostrar}
	});
	funcionAjax.done(function(retorno){
		$("#navegacion").html(retorno);
	});
	funcionAjax.fail(function(retorno){
		$("#navegacion").html(retorno.responseText);	
	});
	funcionAjax.always(function(retorno){
		//alert("siempre "+retorno.statusText);

	});
}

function CargarDescripcionesAjax(queMostrar, idPropiedad) {
	var funcionAjax=$.ajax({
		url:"php/action.php",
		type:"post",
		data:{
			queHacer:'Descripciones'}
	});
	funcionAjax.done(function(retorno){
		CargarDescripciones(retorno);
		Mostrar(queMostrar, idPropiedad);
	});
	funcionAjax.fail(function(retorno){
		//$("#principal").html(retorno.responseText);	
	});
	funcionAjax.always(function(retorno){
		//alert("siempre "+retorno.statusText);

	});
}

function MostrarLogin() {
	var funcionAjax=$.ajax({
		url:"php/action.php",
		type:"post",
		data:{queHacer:"MostrarLogin"}
	});
	funcionAjax.done(function(retorno) {
		$("#formLogin").html(retorno);
	});
	funcionAjax.fail(function(retorno) {
		$("#mensajesLogin").html("Error en login.");
	});
	funcionAjax.always(function(retorno) {
		//alert("siempre "+retorno.statusText);
	});
}

function BuscarPropiedades() {
	var operacion=$("#operacion").val();
	var tipo=$("#tipo").val();
	var ambientes=$("#ambientes").val();
	var zona=$("#zona").val();

	$("#operacion").val('');
	$("#tipo").val('');
	$("#ambientes").val('');
	$("#zona").val('');

	BuscarPropiedadesFiltro(operacion, tipo, ambientes, zona, true);
}

function BuscarPropiedadesFiltro(operacion, tipo, ambientes, zona, header) {
	// El parámetro 'header' es un boolean que indica si debe cargarse el encabezado
	// Es falso cuando la búsqueda se llama desde el listado, por lo que no debe volverse a cargar

	var funcionAjax=$.ajax({
		url:"php/action.php",
		type:"post",
		data:{
			queHacer:"BuscarPropiedad",
			operacion:operacion,
			tipo:tipo,
			ambientes:ambientes,
			zona:zona}
	});
	funcionAjax.done(function(retorno){
		if (header == true) {MostrarHeader('MostrarHeaderListado');}

		// Se arma la página que muestra el listado de resultados
		$("#principal").html(MostrarSeccionListado());

		// Estas dos secciones forman parte de la página de resultados
		$("#resultados").html(MostrarResultadosJSON(retorno));
		$("#filtros").html(MostrarFiltros(operacion, tipo, ambientes, zona));
		
		$(".topHome").click();

	});
	funcionAjax.fail(function(retorno){
		//$("#principal").html(retorno.responseText);	
		alert('Error');
	});
	funcionAjax.always(function(retorno){
		//alert("siempre "+retorno.statusText);

	});


}

function MostrarDestacadasJSON(propiedades) {
	//return propiedades;
	propiedades = JSON.parse(propiedades);
	var retorno = '';

	for (var i = 0; i <= propiedades.length - 1; i++) {
		// Si no se encuentra el nombre de la primera imagen, no se incluye en la lista de destacadas
		if (propiedades[i].imagenes.split(",")[0]!='') {
			retorno += '<article class="col-sm-4 isotopeItem ' + propiedades[i].operacion + '">';
			retorno += '<div class="portfolio-item">';
		    retorno += '<img src="images/portfolio/' + propiedades[i].imagenes.split(",")[0] + '" alt="" />';


		    retorno += '<div class="portfolio-desc align-center" style="height:100%;">';
		    retorno += '<div class="folio-info" style="height:100%;">';
		    retorno += '<a href="images/portfolio/' + propiedades[i].imagenes.split(",")[0] + '" class="fancybox">';

			if (propiedades[i].ambientes == '1') {
				retorno += '<h5>' + ObtenerDesc('tipo',propiedades[i].tipo) + ' ' + propiedades[i].ambientes + ObtenerDesc('ambientes','1ambiente') + '</h5>';
			} else {
				retorno += '<h5>' + ObtenerDesc('tipo',propiedades[i].tipo) + ' ' + propiedades[i].ambientes + ObtenerDesc('ambientes','xambientes') + '</h5>';
			}

			retorno += '<h6>' + propiedades[i].descBreve + '</h6>';


			retorno += '<i class="fa fa-arrows-alt fa-2x"></i>';
			retorno += '</a>';
			retorno += '<a class="mrgn30" style="cursor: pointer;text-transform:uppercase;" onclick="MostrarHeader(\'MostrarHeaderPropiedad\');Mostrar(\'MostrarPropiedad\',' + propiedades[i].id + ');">' + ObtenerDesc('etiquetas','detalle') + '</a>';
			retorno += '</div></div></div></article>';
		}
	}

	return retorno;
}

function MostrarDetalleJSON(propiedad) {

	//return propiedad;
	propiedad = JSON.parse(propiedad);
	var retorno = '';
	var imagen;

	retorno += '<article><div class="post-slider"><div class="post-heading">';
	retorno += '<h3>' + ObtenerDesc('tipo',propiedad.tipo) + ' | ' + ObtenerDesc('zona',propiedad.zona) + '</h3></div>';
	retorno += '<div id="post-slider" class="flexslider">';
    retorno += '<ul class="slides">';

    var imagenes = propiedad.imagenes.split(",");
    for (var i = 0; i <= imagenes.length - 1; i++) {
    	imagen = imagenes[i];
		if (imagen=='') {
			imagen = 'sin_foto.jpg';	// Si no se encuentra el nombre de la foto, sale la imagen por defecto
		}
    	retorno += '<li><img src="./images/portfolio/' + imagen + '" alt="" /></li>';
    }

    retorno += '</ul>';
    retorno += '</div></div>';

  	retorno += '<div class="mrgn30"><h4>' + ObtenerDesc('etiquetas','descripcion') + '</h4>';
  	retorno += '<p>' + propiedad.descripcion + '</p></div>';

  	retorno += '<div class="bottom-article"><ul class="meta-post">';
  	retorno += '<li><strong>' + ObtenerDesc('etiquetas','operacion') + ':</strong> ' + ObtenerDesc('operacion',propiedad.operacion) + '</li>';
  	retorno += '<li><strong>' + ObtenerDesc('etiquetas','tipo') + ':</strong> ' + ObtenerDesc('tipo',propiedad.tipo) + '</li>';
  	retorno += '<li><strong>' + ObtenerDesc('etiquetas','ambientes') + ':</strong> ' + propiedad.ambientes + '</li>';
  	retorno += '<li><strong>' + ObtenerDesc('etiquetas','zona') + ':</strong> ' + ObtenerDesc('zona',propiedad.zona) + '</li>';
	retorno += '</ul></div></article>';

	return retorno;
}

function MostrarSeccionListado() {

	var retorno = '';

	retorno += '<section class="page-section secPad">';
	retorno += '<div class="container">';
	retorno += '<div class="row mrgn30">';
	retorno += '<div class="col-lg-8">';
	retorno += '<div id="resultados"></div>';

	// PAGINACIÓN
	//retorno += '<div id="pagination"><span class="all">Página 1 de 3</span><span class="current">1</span><a href="#" class="inactive">2</a><a href="#" class="inactive">3</a></div>';
	
	retorno += '</div>';		// /.col

	retorno += '<div class="col-lg-4"><aside class="right-sidebar">';

	// FILTROS
	retorno += '<div id="filtros"></div>';

	retorno += '</aside></div>';		// /.col
	retorno += '</div>';				// /.row
	retorno += '</div>';				// /.container
	retorno += '</section>';

	return retorno;
}

function MostrarResultadosJSON(propiedadesJSON) {
	//return propiedadesJSON;
	propiedades = JSON.parse(propiedadesJSON);

	var retorno = '';
	var imagen;

	for (var i = 0; i <= propiedades.length - 1; i++) {
		retorno += '<article><div class="row mrgn10"><div class="col-lg-4"><div class="post-image">';
		retorno += '<a class="mrgn30" style="cursor: pointer;text-transform:uppercase;" onclick="MostrarHeader(\'MostrarHeaderPropiedad\');Mostrar(\'MostrarPropiedad\',' + propiedades[i].id + ');">';
		imagen = propiedades[i].imagenes.split(",")[0];
		if (imagen=='') {
			imagen = 'sin_foto.jpg';	// Si no se encuentra el nombre de la foto, sale la imagen por
		}
		retorno += '<img src="images/portfolio/' + imagen + '" alt="" style="width:100%;"/>';
		retorno += '</a></div></div>';

		retorno += '<div class="col-lg-8"><div class="post-heading">';
		retorno += '<h3>' + ObtenerDesc('tipo',propiedades[i].tipo) + ' | ' + ObtenerDesc('zona',propiedades[i].zona) + '</h3>';
		retorno += '</div>';
		retorno += '<p>' + ObtenerDesc('operacion',propiedades[i].operacion) + '</p>';
		retorno += '<p>Ambientes: ' + propiedades[i].ambientes + '</p>';
		retorno += '<p>' + propiedades[i].descBreve + '</p>';

		retorno += '</div></div></article>';
	}

	return retorno;
}

function MostrarFiltros(operacion, tipo, ambientes, zona) {

	//return propiedad;
	var retorno = '';
	var filtrosAplicados = '';
	var filtrosDisponibles = '';

	retorno += '<div class="widget">';

	// Filtros aplicados
	filtrosAplicados += armarEtiquetaFiltroAplicado(operacion, tipo, ambientes, zona);

	if (filtrosAplicados != '') {
		filtrosAplicados = '<h4 class="tituloFiltros" style="text-transform:capitalize;">' + ObtenerDesc('etiquetas','filtrosaplicados') + '</h4><ul class="cat">' + filtrosAplicados;
		filtrosAplicados += '</ul>';
		filtrosAplicados += '<p ><a href="#top" class="quitarFiltros" onclick="BuscarPropiedadesFiltro(\'none\',\'none\',\'none\',\'none\', false)">Quitar filtros</a></p>';

	} else {
		filtrosAplicados = '<h4 class="tituloFiltros" style="text-transform:capitalize;">' + ObtenerDesc('etiquetas','sinfiltrosaplicados') + '</h4>';
	}
	retorno += filtrosAplicados;

	// Filtros disponibles
	filtrosDisponibles += armarEtiquetaFiltroDisponible(operacion, tipo, ambientes, zona);

	if (filtrosDisponibles != '') {
		filtrosDisponibles = '<h4 class="tituloFiltros" style="text-transform:capitalize;">' + ObtenerDesc('etiquetas','filtrosdisponibles') + '</h4><ul class="cat">' + filtrosDisponibles;
		filtrosDisponibles += '</ul>';
		retorno += filtrosDisponibles;
	}
	
	retorno += '</div>';

	return retorno;
}

function armarEtiquetaFiltroAplicado(operacion, tipo, ambientes, zona) {
	var retorno = '';
//cursor: pointer;

	if (operacion != 'none') {
		retorno += '<li class="label label-default filtroAplicado" onclick="BuscarPropiedadesFiltro(\'none\', \'' + tipo + '\', \'' + ambientes + '\', \'' + zona + '\', false)">' + ObtenerDesc('operacion',operacion) + ' <span class="fa fa-times pull-right"></span></li>';
	} else {
		retorno += '';
	}
	
	if (tipo != 'none') {
		retorno += '<li class="label label-default filtroAplicado" onclick="BuscarPropiedadesFiltro( \'' + operacion + '\',\'none\', \'' + ambientes + '\', \'' + zona + '\', false)">' + ObtenerDesc('tipo',tipo) + ' <span class="fa fa-times pull-right"></span></li>';
	} else {
		retorno += '';
	}
	
	if (ambientes != 'none') {
		if (ambientes == '1') {
			retorno += '<li class="label label-default filtroAplicado" onclick="BuscarPropiedadesFiltro( \'' + operacion + '\', \'' + tipo + '\',\'none\', \'' + zona + '\', false)">' + ambientes + ObtenerDesc('ambientes','1ambiente') + ' <span class="fa fa-times pull-right"></span></li>';
		} else {
			retorno += '<li class="label label-default filtroAplicado" onclick="BuscarPropiedadesFiltro( \'' + operacion + '\', \'' + tipo + '\',\'none\', \'' + zona + '\', false)">' + ambientes + ObtenerDesc('ambientes','xambientes') + ' <span class="fa fa-times pull-right"></span></li>';
		}
	} else {
		retorno += '';
	}
	
	if (zona != 'none') {
		retorno += '<li class="label label-default filtroAplicado" style="text-align: justify;" onclick="BuscarPropiedadesFiltro( \'' + operacion + '\', \'' + tipo + '\', \'' + ambientes + '\',\'none\', false)">' + ObtenerDesc('zona',zona) + ' <span class="fa fa-times pull-right"></span></li>';
	} else {
		retorno += '';
	}

	return retorno;
}

function armarEtiquetaFiltroDisponible(operacion, tipo, ambientes, zona) {
	var retorno = '';

	if (operacion == 'none') {
		retorno += '<h5 class="tituloFiltros">' + ObtenerDesc('etiquetas','operacion') + '</h5><ul class="cat">';
        retorno += '<li class="filtroDisponible" onclick="BuscarPropiedadesFiltro(\'alquiler\', \'' + tipo + '\', \'' + ambientes + '\', \'' + zona + '\', false)">' + ObtenerDesc('operacion','alquiler') + '</li>';
        retorno += '<li class="filtroDisponible" onclick="BuscarPropiedadesFiltro(\'venta\', \'' + tipo + '\', \'' + ambientes + '\', \'' + zona + '\', false)">' + ObtenerDesc('operacion','venta') + '</li>';
		retorno += '</ul>';
	}

	if (tipo == 'none') {
		retorno += '<h5 class="tituloFiltros">' + ObtenerDesc('etiquetas','tipo') + '</h5><ul class="cat">';
        retorno += '<li class="filtroDisponible" onclick="BuscarPropiedadesFiltro(\'' + operacion + '\', \'depto\', \'' + ambientes + '\', \'' + zona + '\', false)">' + ObtenerDesc('tipo','depto') + '</li>';
		retorno += '<li class="filtroDisponible" onclick="BuscarPropiedadesFiltro(\'' + operacion + '\', \'casa\', \'' + ambientes + '\', \'' + zona + '\', false)">' + ObtenerDesc('tipo','casa') + '</li>';
		retorno += '<li class="filtroDisponible" onclick="BuscarPropiedadesFiltro(\'' + operacion + '\', \'local\', \'' + ambientes + '\', \'' + zona + '\', false)">' + ObtenerDesc('tipo','local') + '</li>';
		retorno += '</ul>';
	}

	if (ambientes == 'none') {
		retorno += '<h5 class="tituloFiltros">' + ObtenerDesc('etiquetas','ambientes') + '</h5><ul class="cat">';
        retorno += '<li class="filtroDisponible" onclick="BuscarPropiedadesFiltro(\'' + operacion + '\',\'' + tipo + '\',\'1\', \'' + zona + '\', false)">1' + ObtenerDesc('ambientes','1ambiente') + '</li>';
        retorno += '<li class="filtroDisponible" onclick="BuscarPropiedadesFiltro(\'' + operacion + '\',\'' + tipo + '\',\'2\', \'' + zona + '\', false)">2' + ObtenerDesc('ambientes','xambientes') + '</li>';
        retorno += '<li class="filtroDisponible" onclick="BuscarPropiedadesFiltro(\'' + operacion + '\',\'' + tipo + '\',\'3\', \'' + zona + '\', false)">3' + ObtenerDesc('ambientes','xambientes') + '</li>';
		retorno += '</ul>';
	}

	if (zona == 'none') {
		retorno += '<h5 class="tituloFiltros">' + ObtenerDesc('etiquetas','zona') + '</h5><ul class="cat">';
        retorno += '<li class="filtroDisponible" onclick="BuscarPropiedadesFiltro(\'' + operacion + '\',\'' + tipo + '\',\'' + ambientes + '\',\'caba\', false)">' + ObtenerDesc('zona','caba') + '</li>';
        retorno += '<li class="filtroDisponible" onclick="BuscarPropiedadesFiltro(\'' + operacion + '\',\'' + tipo + '\',\'' + ambientes + '\',\'gbasur\', false)">' + ObtenerDesc('zona','gbasur') + '</li>';
        retorno += '<li class="filtroDisponible" onclick="BuscarPropiedadesFiltro(\'' + operacion + '\',\'' + tipo + '\',\'' + ambientes + '\',\'costa\', false)">' + ObtenerDesc('zona','costa') + '</li>';
		retorno += '</ul>';
	}
	return retorno;
}


function CargarDescripciones(descripciones) {
	//return descripciones;
	descripciones = JSON.parse(descripciones);
	hayDescripciones = true;	// Se chequea esta variable para saber si es necesario cargar las descripciones
	for (var i = 0; i <= descripciones.length - 1; i++) {
		eval(descripciones[i].grupo + descripciones[i].clave + ' = "' + descripciones[i].descripcion + '";');
	}
}

function ObtenerDesc(grupo,clave) {
	return eval(grupo + clave);
}

function MostrarFormCarga(propiedad) {
// El parámetro 'propiedad' es null para propiedades nuevas. Caso contrario, se trata de una modificación

//                <input type="hidden" name="idModificar" id="idModificar" />

	var retorno = '';

	// Título
	retorno += '<div class="row mt20"><div class="heading text-center">';
	retorno += '<h2>' + ObtenerDesc('etiquetas','propiedadNueva') + '</h2>';
	retorno += '</div></div>';
	
	retorno += '<div class="row mrgn10">';
	retorno += '<form action="" method="post" enctype="multipart/form-data" id="formCarga">';

	// Operación
	retorno += '<div class="col-sm-4">';
	retorno += '<div class="form-group" title="' + ObtenerDesc('etiquetas','seleccioneOperacion') + '">';
	retorno += '<label for="operacion">' + ObtenerDesc('etiquetas','operacion') + '</label><br />';
	retorno += '<input type="radio" name="operacion" value="alquiler"> ' + ObtenerDesc('operacion','alquiler') + '<br />';
	retorno += '<input type="radio" name="operacion" value="venta"> ' + ObtenerDesc('operacion','venta');
	retorno += '</div>';

	// Tipo
	retorno += '<div class="form-group" title="' + ObtenerDesc('etiquetas','seleccioneTipo') + '">';
	retorno += '<label for="tipo">' + ObtenerDesc('etiquetas','tipo') + '</label><br />';
	retorno += '<input type="radio" name="tipo" value="depto"> ' + ObtenerDesc('tipo','depto') + '<br />';
	retorno += '<input type="radio" name="tipo" value="casa"> ' + ObtenerDesc('tipo','casa') + '<br />';
	retorno += '<input type="radio" name="tipo" value="local"> ' + ObtenerDesc('tipo','local') + '';
	retorno += '</div>';
	
	// Ambientes
	retorno += '<div class="form-group" title="' + ObtenerDesc('etiquetas','seleccioneAmbientes') + '">';
	retorno += '<label for="ambientes">' + ObtenerDesc('etiquetas','ambientes') + '</label>';
	retorno += '<input type="text" class="form-control" name="ambientes" id="ambientes">';
	retorno += '</div>';

	// Zona
	retorno += '<div class="form-group" title="' + ObtenerDesc('etiquetas','seleccioneZona') + '">';
	retorno += '<label for="zona">' + ObtenerDesc('etiquetas','zona') + '</label><br />';
	retorno += '<select class="form-control" name="zona" id="zona">';
	retorno += '<option value="none">' + ObtenerDesc('etiquetas','seleccioneZona') + '</option>';
	retorno += '<option value="caba">' + ObtenerDesc('zona','caba') + '</option>';
	retorno += '<option value="gbasur">' + ObtenerDesc('zona','gbasur') + '</option>';
	retorno += '<option value="costa">' + ObtenerDesc('zona','costa') + '</option>';
	retorno += '</select>';
	retorno += '</div>';

	// Descripción breve
	retorno += '<div class="form-group" title="' + ObtenerDesc('etiquetas','ingreseDescBreve') + '">';
	retorno += '<label for="descBreve">' + ObtenerDesc('etiquetas','descBreve') + '</label>';
	retorno += '<textarea name="descBreve" class="form-control" id="descBreve" cols="3" rows="5"></textarea>';
	retorno += '</div>';
	
	// Descripción detallada
	retorno += '<div class="form-group" title="' + ObtenerDesc('etiquetas','ingreseDescripcion') + '">';
	retorno += '<label for="descripcion">' + ObtenerDesc('etiquetas','descripcion') + '</label>';
	retorno += '<textarea name="descripcion" class="form-control" id="descripcion" cols="3" rows="5"></textarea>';
	retorno += '</div>';
	
	// Destacada
	retorno += '<div class="form-group form-control">';
	retorno += ObtenerDesc('etiquetas','destacada');
	retorno += '<div class="material-switch pull-right">';
	retorno += '<input id="destacada" name="destacada" type="checkbox"/>';
	retorno += '<label for="destacada" class="label-primary"></label>';
	retorno += '</div>';
	retorno += '</div>';

	// Ocultar
	retorno += '<div class="form-group form-control">';
	retorno += ObtenerDesc('etiquetas','ocultar');
	retorno += '<div class="material-switch pull-right">';
	retorno += '<input id="ocultar" name="ocultar" type="checkbox"/>';
	retorno += '<label for="ocultar" class="label-primary"></label>';
	retorno += '</div>';
	retorno += '</div>';

	// Imágenes
	retorno += '<div class="form-group" title="' + ObtenerDesc('etiquetas','ingreseImagenes') + '">';
	retorno += '<label for="imagen">' + ObtenerDesc('etiquetas','imagenes') + '</label>';
	retorno += '<input type="file" class="form-control" name="imagen" id="imagen" accept="image/*" multiple>';
	retorno += '</div>';


	retorno += '<input type="button" class="btn btn-lg btn-primary" name="guardar" value="' + ObtenerDesc('etiquetas','btnGuardar') + '" onclick="GuardarPropiedad()" />';
	retorno += '<div class="mensajesABM"></div>';
	retorno += '</div></form></div>';

	$("#principal").html(retorno);
}