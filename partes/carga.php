<!doctype html>
<!--[if IE 7 ]>    <html lang="en-gb" class="isie ie7 oldie no-js"> <![endif]-->
<!--[if IE 8 ]>    <html lang="en-gb" class="isie ie8 oldie no-js"> <![endif]-->
<!--[if IE 9 ]>    <html lang="en-gb" class="isie ie9 no-js"> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!-->
<html lang="es" class="no-js">
<!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <!--[if lt IE 9]> 
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <![endif]-->
    <title>Silvana Propiedades</title>
    <meta name="description" content="">
    <!--[if lt IE 9]>
        <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
    <!--[if lte IE 8]>
		<script type="text/javascript" src="http://explorercanvas.googlecode.com/svn/trunk/excanvas.js"></script>
	<![endif]-->
    <link rel="stylesheet" href="../css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="../css/isotope.css" media="screen" />
    <link rel="stylesheet" href="../js/fancybox/jquery.fancybox.css" type="text/css" media="screen" />
    <link rel="stylesheet" type="text/css" href="../css/da-slider.css" />
    <!-- Owl Carousel Assets -->
    <link href="../js/owl-carousel/owl.carousel.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/styles.css" />
    <!-- Font Awesome -->
    <link href="../font/css/font-awesome.min.css" rel="stylesheet">
    
    <link href="../css/switch.css" rel="stylesheet">

    <?php include_once "../php/clases.php";?>

    <script type="text/javascript" src="../js/funcionesABM.js"></script>

</head>

<body>
    <header class="header">
        <div class="container">
            <nav class="navbar navbar-inverse" role="navigation">
                <div class="navbar-header">
                    <button type="button" id="nav-toggle" class="navbar-toggle" data-toggle="collapse" data-target="#main-nav">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a href="#" class="navbar-brand scroll-top logo"><b>Silvana Propiedades</b></a>
                </div>
                <!--/.navbar-header-->
                <!--
                <div id="main-nav" class="collapse navbar-collapse">
                    <ul class="nav navbar-nav" id="mainNav">
                        <li class="active"><a href="#home" class="scroll-link">Inicio</a></li>
                        <li><a href="#portfolio" class="scroll-link">Propiedades</a></li>
                        <li><a href="#introText" class="scroll-link">Nosotros</a></li>
                        <li><a href="#contactUs" class="scroll-link">Contacto</a></li>
                    </ul>
                </div>
                -->
                <!--/.navbar-collapse-->
            </nav>
            <!--/.navbar-->
        </div>
        <!--/.container-->
    </header>
    <!--/.header-->

    <div id="#top"></div>




	<!--Contact -->
    <section id="contactUs" class="page-section secPad">
        <div class="container">

            <div class="row">
                <div class="heading text-center">
                    <!-- Heading -->
                    <h2>Carga de propiedades</h2>
                </div>
            </div>

            <div class="row mrgn10">
                <input type="hidden" name="idModificar" id="idModificar" />

                <div class="col-sm-4">
                    <div class="form-group" title="Por favor seleccione el tipo de operación.">
                        <label for="operacion">Operación</label><br />
                        <input type="radio" name="operacion" value="alquiler"> Alquiler<br />
                        <input type="radio" name="operacion" value="venta"> Venta
                    </div>

                    <div class="form-group" title="Por favor seleccione el tipo de vivienda.">
                        <label for="tipo">Tipo de vivienda</label><br />
                        <input type="radio" name="tipo" value="depto"> Departamento<br />
                        <input type="radio" name="tipo" value="casa"> Casa<br />
                        <input type="radio" name="tipo" value="local"> Local
                    </div>

                    <div class="form-group" title="Por favor seleccione la zona.">
                        <label for="ambientes">Cantidad de ambientes</label>
                        <input type="text" class="form-control" name="ambientes" id="ambientes">
                    </div>

                    <div class="form-group" title="Por favor seleccione la zona.">
                        <label for="zona">Zona</label><br />
                        <select class="form-control" name="zona" id="zona">
                            <option value="none">Por favor seleccione la zona</option>
                            <option value="caba">Ciudad Autónoma de Buenos Aires</option>
                            <option value="gbasur">Gran Buenos Aires Sur</option>
                            <option value="costa">Costa Atlántica</option>
                        </select>
                    </div>

                    <div class="form-group" title="Por favor ingrese la descripción.">
                        <label for="descripcion">Descripción</label>
                        <textarea name="descripcion" class="form-control" id="descripcion" cols="3" rows="5"></textarea>
                    </div>

                    <div class="form-group form-control">
                        Publicación destacada
                        <div class="material-switch pull-right">
                            <input id="destacada" name="destacada" type="checkbox"/>
                            <label for="destacada" class="label-primary"></label>
                        </div>
                    </div>
                    
                    <div class="form-group form-control">
                        Ocultar publicación
                        <div class="material-switch pull-right">
                            <input id="ocultar" name="ocultar" type="checkbox"/>
                            <label for="ocultar" class="label-primary"></label>
                        </div>
                    </div>

                    <div class="form-group" title="Por favor ingrese imágenes de la propiedad.">
                        <label for="imagen">Imágenes</label>
                        <input type="file" class="form-control" name="imagen" id="imagen" accept="image/*" multiple>
                    </div>
                    

                    <input type="button" class="btn btn-lg btn-primary" name="guardar" value="Guardar"
                        onclick="GuardarPropiedad()" />
                    <div class="mensajesABM"></div>

                </div>
            </div>

        </div>
        <!--/.container-->
    </section>

    <footer>
        <div class="container">
            <div class="social text-center">
                <a href="#"><i class="fa fa-twitter"></i></a>
                <a href="#"><i class="fa fa-facebook"></i></a>
                <!--
                <a href="#"><i class="fa fa-dribbble"></i></a>
                <a href="#"><i class="fa fa-flickr"></i></a>
                <a href="#"><i class="fa fa-github"></i></a>
                -->
            </div>

            <div class="clear"></div>
            <!--CLEAR FLOATS-->
        </div>
    </footer>
    <!--/.page-section-->
    <section class="copyright">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 text-center">


                </div>
            </div>
            <!-- / .row -->
        </div>
    </section>
    <a href="#top" class="topHome"><i class="fa fa-chevron-up fa-2x"></i></a>

    <!--[if lte IE 8]><script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script><![endif]-->
    <script src="../js/modernizr-latest.js"></script>
    <script src="../js/jquery-1.8.2.min.js" type="text/javascript"></script>
    <script src="../js/bootstrap.min.js" type="text/javascript"></script>
    <script src="../js/jquery.isotope.min.js" type="text/javascript"></script>
    <script src="../js/fancybox/jquery.fancybox.pack.js" type="text/javascript"></script>
    <script src="../js/jquery.nav.js" type="text/javascript"></script>
    <script src="../js/jquery.cslider.js" type="text/javascript"></script>
    <script src="../js/custom.js" type="text/javascript"></script>
    <script src="../js/owl-carousel/owl.carousel.js"></script>
</body>
</html>