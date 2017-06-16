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
alert('operacion: ' + operacion);
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
		alert('cargando listado...');
		$("#principal").html(retorno);
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

function MostrarTodasJSON(propiedades) {
	//return propiedades;
	propiedades = JSON.parse(propiedades);
	var retorno = '';

	for (var i = 0; i <= propiedades.length - 1; i++) {
		retorno += '<article><div class="row mrgn10"><div class="col-lg-4"><div class="post-image">';

		retorno += '<img src="images/portfolio/' + propiedades[i].imagenes.split(",")[0] + '" alt="" style="width:100%;"/>';
		retorno += '</div></div>';

		retorno += '<div class="col-lg-8"><div class="post-heading">';
		retorno += '<h3>' + propiedades[i].tipo + ' | ' + propiedades[i].zona + '</h3>';
		retorno += '</div><p>' + propiedades[i].descripcion + '</p></div></div></article>';
	}

	return retorno;
}

