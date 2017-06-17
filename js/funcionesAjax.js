function Mostrar(queMostrar, idPropiedad)
{
	$("#principal").html('<img style="padding-top:10%;" src="images/preloader.gif">');

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

function MostrarHeader(queMostrar)
{
	$("#navegacion").html('<img style="padding-top:10%;" src="images/preloader.gif">');

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
		MostrarHeader('MostrarHeaderListado');
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

	retorno += '<article class="col-sm-4 isotopeItem ' + propiedades[i].operacion + '">';
	retorno += '<div class="portfolio-item">';
    retorno += '<img src="images/portfolio/' + propiedades[i].imagenes.split(",")[0] + '" alt="" />';


    retorno += '<div class="portfolio-desc align-center" style="height:100%;">';
    retorno += '<div class="folio-info" style="height:100%;">';
    retorno += '<a href="images/portfolio/' + propiedades[i].imagenes.split(",")[0] + '" class="fancybox">';
	retorno += '<h5>' + propiedades[i].tipo + ' ' + propiedades[i].ambientes + ' ambientes</h5>';
	retorno += '<i class="fa fa-arrows-alt fa-2x"></i>';
	retorno += '</a>';
	

	retorno += '<a class="mrgn30" style="cursor: pointer;" onclick="MostrarHeader(\'MostrarHeaderPropiedad\');Mostrar(\'MostrarPropiedad\',' + propiedades[i].id + ');">DETALLE</a>';
	

	retorno += '</div></div></div></article>';
	}

	return retorno;
}

function MostrarDetalleJSON(propiedad) {

	//return propiedad;
	propiedad = JSON.parse(propiedad);
	var retorno = '';

	retorno += '<article><div class="post-slider"><div class="post-heading">';
	retorno += '<h3>' + propiedad.tipo + ' | ' + propiedad.zona + '</h3></div>';
	retorno += '<div id="post-slider" class="flexslider">';
    retorno += '<ul class="slides">';

    var imagenes = propiedad.imagenes.split(",");
    for (var i = 0; i <= imagenes.length - 1; i++) {
    	retorno += '<li><img src="./images/portfolio/' + imagenes[i] + '" alt="" /></li>';
    }

    retorno += '</ul>';
    retorno += '</div></div>';

  	retorno += '<div class="mrgn30"><h4>Descripción</h4>';
  	retorno += '<p>' + propiedad.descripcion + '</p></div>';

  	retorno += '<div class="bottom-article"><ul class="meta-post">';
  	retorno += '<li><strong>Tipo de operación:</strong> ' + propiedad.operacion + '</li>';
  	retorno += '<li><strong>Tipo de vivienda:</strong> ' + propiedad.tipo + '</li>';
  	retorno += '<li><strong>Cantidad de ambientes:</strong> ' + propiedad.ambientes + '</li>';
  	retorno += '<li><strong>Zona:</strong> ' + propiedad.zona + '</li>';
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
	retorno += '<div id="pagination"><span class="all">Página 1 de 3</span><span class="current">1</span><a href="#" class="inactive">2</a><a href="#" class="inactive">3</a></div>';
	
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

	// else

	propiedades = JSON.parse(propiedadesJSON);

	var retorno = '';
	for (var i = 0; i <= propiedades.length - 1; i++) {
		retorno += '<article><div class="row mrgn10"><div class="col-lg-4"><div class="post-image">';

		retorno += '<img src="images/portfolio/' + propiedades[i].imagenes.split(",")[0] + '" alt="" style="width:100%;"/>';
		retorno += '</div></div>';

		retorno += '<div class="col-lg-8"><div class="post-heading">';
		retorno += '<h3>' + propiedades[i].tipo + ' | ' + propiedades[i].zona + '</h3>';
		retorno += '</div>';
		retorno += '<p>' + propiedades[i].operacion + '</p>';
		retorno += '<p>Ambientes: ' + propiedades[i].ambientes + '</p>';
		retorno += '<p>' + propiedades[i].descripcion + '</p>';

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
	filtrosAplicados += armarEtiquetaFiltroAplicado(operacion);
	filtrosAplicados += armarEtiquetaFiltroAplicado(tipo);
	filtrosAplicados += armarEtiquetaFiltroAplicado(ambientes);
	filtrosAplicados += armarEtiquetaFiltroAplicado(zona);

	if (filtrosAplicados != '') {
		filtrosAplicados = '<h4 class="widgetheading">Filtros aplicados</h4><ul class="cat">' + filtrosAplicados;
		filtrosAplicados += '</ul>';
	} else {
		filtrosAplicados = '<h4 class="widgetheading">Sin filtros aplicados</h4>';
	}
	retorno += filtrosAplicados;

	// Filtros disponibles
	filtrosDisponibles += armarEtiquetaFiltroDisponible(operacion, tipo, ambientes, zona);

	if (filtrosDisponibles != '') {
		filtrosDisponibles = '<h4 class="widgetheading">Filtros Disponibles</h4><ul class="cat">' + filtrosDisponibles;
		filtrosDisponibles += '</ul>';
		retorno += filtrosDisponibles;
	}
	
	retorno += '</div>';

	return retorno;
}

function armarEtiquetaFiltroAplicado(valor) {
	if (valor != 'none') {
		return '<li><i class="icon-angle-right"></i><a href="#">' + valor + '</a></li>';
	} else {
		return '';
	}
}

function armarEtiquetaFiltroDisponible(operacion, tipo, ambientes, zona) {
	var retorno = '';

	if (operacion == 'none') {
		retorno += '<h6 class="widgetheading">Tipo de operación</h6><ul class="cat">';
        retorno += '<li><i class="icon-angle-right"></i><a href="#">Alquiler</a></li>';
        retorno += '<li><i class="icon-angle-right"></i><a href="#">Venta</a></li>';
		retorno += '</ul>';
	}

	if (tipo == 'none') {
		retorno += '<h6 class="widgetheading">Tipo de vivienda</h6><ul class="cat">';
        retorno += '<li><i class="icon-angle-right"></i><a href="#">Departamento</a></li>';
		retorno += '<li><i class="icon-angle-right"></i><a href="#">Casa</a></li>';
		retorno += '<li><i class="icon-angle-right"></i><a href="#">Local</a></li>';
		retorno += '</ul>';
	}

	if (ambientes == 'none') {
		retorno += '<h6 class="widgetheading">Cantidad de ambientes</h6><ul class="cat">';
        retorno += '<li><i class="icon-angle-right"></i><a href="#">2 ambientes</a></li>';
        retorno += '<li><i class="icon-angle-right"></i><a href="#">3 ambientes</a></li>';
		retorno += '</ul>';
	}

	if (zona == 'none') {
		retorno += '<h6 class="widgetheading">Zona</h6><ul class="cat">';
        retorno += '<li><i class="icon-angle-right"></i><a href="#">Ciudad Autónoma de Buenos Aires</a></li>';
        retorno += '<li><i class="icon-angle-right"></i><a href="#">Gran Buenos Aires Sur</a></li>';
        retorno += '<li><i class="icon-angle-right"></i><a href="#">Costa Atlántica</a></li>';
		retorno += '</ul>';
	}
	return retorno;
}
