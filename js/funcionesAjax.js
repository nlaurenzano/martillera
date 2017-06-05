function Mostrar(queMostrar)
{
	$("#principal").html('<img style="padding-top:10%;" src="images/preloader.gif">');

	var funcionAjax=$.ajax({
		url:"php/action.php",
		type:"post",
		data:{queHacer:queMostrar}
	});
	funcionAjax.done(function(retorno){
		//$("#principal").html(retorno);
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
	retorno += '</a></div></div></div></article>';
	}

	return retorno;
}
