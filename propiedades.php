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

    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="css/isotope.css" media="screen" />
    <link rel="stylesheet" href="js/fancybox/jquery.fancybox.css" type="text/css" media="screen" />
    <link rel="stylesheet" type="text/css" href="css/da-slider.css" />
    <!-- Font Awesome -->
    <link href="font/css/font-awesome.min.css" rel="stylesheet">
    
    <!-- Owl Carousel Assets -->
    <link href="js/owl-carousel/owl.carousel.css" rel="stylesheet">
    <link rel="stylesheet" href="css/styles.css" />
    
    <script src="js/jquery-1.8.2.min.js" type="text/javascript"></script>
    <script type="text/javascript" src="js/funcionesAjax.js"></script>    

</head>

<?php
require_once('php/clases/Elemento.php');
require_once('php/funciones.php');

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
                <div id="navegacion">
                </div>
                <script type="text/javascript">MostrarHeader('MostrarHeaderListado');</script>
            </nav>
            <!--/.navbar-->
        </div>
        <!--/.container-->
    </header>
    <!--/.header-->

    <div id="#top"></div>



    <section id="detalle" class="page-section secPad">
        <div class="container">

            <div class="row mrgn30">

                <input type="hidden" name="idPropiedad" id="idPropiedad" />

                <div class="col-lg-8">
                    <div id="detallePropiedad">
                    </div>

                    <script>
                        $("#detallePropiedad").html(MostrarTodasJSON('<?php echo ObtenerTodas(); ?>'));
                    </script>

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


</body>
</html>