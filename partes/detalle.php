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

    <link href="../css/flexslider.css" rel="stylesheet" />

    <?php include_once "../php/clases/Elemento.php";?>

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
    <section id="detalle" class="page-section secPad">
        <div class="container">

            <div class="row mrgn10">

                <input type="hidden" name="idPropiedad" id="idPropiedad" />

                <div class="col-lg-8" id="detallePropiedad">
                </div>
                <!-- /.col -->

                <script>
                    //$("#detallePropiedad").html(MostrarDetalleJSON('<?php //echo ObtenerDetalle(); ?>'));
                </script>





                    <article>
                            <div class="post-slider">
                                <div class="post-heading">
                                    <h3><a href="#">This is an example of slider post format</a></h3>
                                </div>
                                <!-- start flexslider -->
                                <div id="post-slider" class="flexslider">
                                    <ul class="slides">
                                        <li>
                                        <img src="../images/portfolio/depto-1amb-720x550.jpg" alt="" />
                                        </li>
                                        <li>
                                        <img src="../images/portfolio/depto-1amb-720x550.jpg" alt="" />
                                        </li>
                                        <li>
                                        <img src="../images/portfolio/depto-1amb-720x550.jpg" alt="" />
                                        </li>
                                    </ul>
                                </div>
                                <!-- end flexslider -->
                            </div>
                            <p>
                                 Descripción de la propiedad
                            </p>
                            <div class="bottom-article">
                                <ul class="meta-post">
                                    <li><i class="icon-calendar"></i><a href="#"> Mar 23, 2013</a></li>
                                    <li><i class="icon-user"></i><a href="#"> Admin</a></li>
                                    <li><i class="icon-folder-open"></i><a href="#"> Blog</a></li>
                                    <li><i class="icon-comments"></i><a href="#">4 Comments</a></li>
                                </ul>
                            </div>
                    </article>



                


            </div>
            <!-- /.row -->

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