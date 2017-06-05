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
    <!-- Font Awesome -->
    <link href="../font/css/font-awesome.min.css" rel="stylesheet">
    
    <!-- Owl Carousel Assets -->
    <link href="../js/owl-carousel/owl.carousel.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/styles.css" />
    
    <script src="../js/jquery-1.8.2.min.js" type="text/javascript"></script>
    <script type="text/javascript" src="../js/funcionesAjax.js"></script>    

</head>

<?php
require_once('../php/clases/Elemento.php');
require_once('../php/funciones.php');

if(isset($_POST['idPropiedad'])) {
        $propiedad = Elemento::TraerPorId($_POST['idPropiedad']);
    } else {
        $propiedad = Elemento::TraerPorId('1');
    }

?>

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
                    <!--<a href="#" class="navbar-brand scroll-top logo"><b>Silvana Propiedades</b></a>-->
                </div>
                <!--/.navbar-header-->
                <div id="main-nav" class="collapse navbar-collapse">
                    <ul class="nav navbar-nav" id="mainNav">
                        <li class="active"><a href="#home" class="scroll-link">Inicio</a></li>
                        <li><a href="#portfolio" class="scroll-link">Propiedades</a></li>
                        <li><a href="#introText" class="scroll-link">Nosotros</a></li>
                        <li><a href="#contactUs" class="scroll-link">Contacto</a></li>
                    </ul>
                </div>
                <!--/.navbar-collapse-->
            </nav>
            <!--/.navbar-->
        </div>
        <!--/.container-->
    </header>
    <!--/.header-->

    <div id="#top"></div>



    <section id="detalle" class="page-section secPad">
        <div class="container">

            <div class="row mrgn10">

                <input type="hidden" name="idPropiedad" id="idPropiedad" />

                <div class="col-lg-8" id="detallePropiedad">
                <!-- </div> -->
                <!-- /.col -->

                    <script>
                        //$("#detallePropiedad").html(MostrarDetalleJSON('<?php //echo ObtenerDetalle(); ?>'));
                    </script>


                    <article>
                        <div class="row mrgn10">
                            <div class="col-lg-4">
                                <div class="post-image">
                                    <img src="../images/portfolio/<?php echo isset($propiedad) ?  $propiedad->GetImagenes()[0] : '' ; ?>" alt="" style="width:100%;"/>
                                </div>
                            </div>
                            <div class="col-lg-8">
                                <div class="post-heading">
                                    <h3><?php echo isset($propiedad) ?  $propiedad->GetTipo()." | ".$propiedad->GetZona() : '' ; ?></h3>
                                </div>
                                <p>
                                    <?php echo isset($propiedad) ?  $propiedad->GetDescripcion() : '' ; ?>
                                </p>
                            </div>
                        </div>
                    </article>


                    <!-- PAGINACIÓN -->
                    <div id="pagination">
                        <span class="all">Página 1 de 3</span>
                        <span class="current">1</span>
                        <a href="#" class="inactive">2</a>
                        <a href="#" class="inactive">3</a>
                    </div>

                </div>
                <!-- /.col -->




                <div class="col-lg-4">
                    <aside class="right-sidebar">


                        <!-- BÚSQUEDA -->
                        <div class="widget">
                            <form class="form-search">
                                <input class="form-control" type="text" placeholder="Buscar..">
                            </form>
                        </div>



                        <!-- FILTROS -->
                        <div class="widget">
                            <h4 class="widgetheading">Categorías</h4>
                            
                            <h6 class="widgetheading">Tipo de operación</h6>
                            <ul class="cat">
                                <li><i class="icon-angle-right"></i><a href="#">Alquiler</a><span> (20)</span></li>
                                <li><i class="icon-angle-right"></i><a href="#">Venta</a><span> (11)</span></li>
                            </ul>

                            <h6 class="widgetheading">Tipo de vivienda</h6>
                            <ul class="cat">
                                <li><i class="icon-angle-right"></i><a href="#">Departamento</a><span> (20)</span></li>
                                <li><i class="icon-angle-right"></i><a href="#">Casa</a><span> (11)</span></li>
                                <li><i class="icon-angle-right"></i><a href="#">Local</a><span> (11)</span></li>
                            </ul>

                            <h6 class="widgetheading">Cantidad de ambientes</h6>
                            <ul class="cat">
                                <li><i class="icon-angle-right"></i><a href="#">2 ambientes</a><span> (20)</span></li>
                                <li><i class="icon-angle-right"></i><a href="#">3 ambientes</a><span> (11)</span></li>
                            </ul>

                            <h6 class="widgetheading">Zona</h6>
                            <ul class="cat">
                                <li><i class="icon-angle-right"></i><a href="#">Ciudad Autónoma de Buenos Aires</a><span> (20)</span></li>
                                <li><i class="icon-angle-right"></i><a href="#">Gran Buenos Aires Sur</a><span> (11)</span></li>
                                <li><i class="icon-angle-right"></i><a href="#">Costa Atlántica</a><span> (11)</span></li>
                            </ul>

                            <h6 class="widgetheading">Precio</h6>
                            <div class="form-group">
                                <input type="text" class="form-control" name="precioMinimo" id="precioMinimo" placeholder="Mín." title="Por favor ingrese el precio mínimo">
                                <input type="email" class="form-control" name="precioMaximo" id="precioMaximo" placeholder="Máx." title="Por favor ingrese el precio máximo">
                            </div>




                        </div>




                    
                    </aside>
                </div>
                <!-- /.col -->





                


            </div>
            <!-- /.row -->

        </div>
        <!--/.container-->
    </section>


<!--[if lte IE 8]><script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script><![endif]-->
    <script src="../js/modernizr-latest.js"></script>
    <script src="../js/bootstrap.min.js" type="text/javascript"></script>
    <script src="../js/jquery.isotope.min.js" type="text/javascript"></script>
    <script src="../js/fancybox/jquery.fancybox.pack.js" type="text/javascript"></script>
    <script src="../js/jquery.nav.js" type="text/javascript"></script>
    <script src="../js/jquery.cslider.js" type="text/javascript"></script>
    <script src="../js/custom.js" type="text/javascript"></script>
    <script src="../js/owl-carousel/owl.carousel.js"></script>

</body>
</html>