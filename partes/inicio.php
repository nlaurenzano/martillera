<?php
require_once('../php/funciones.php');
?>

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



<section id="home">
    <div class="banner-container">
        <img src="images/banner-bg.jpg" alt="banner" />
        <div class="container banner-content">
            <div id="da-slider" class="da-slider">
                <div class="da-slide">
                    <h2>Alquiler</h2>
                    <p>Encontrá tu lugar ideal.</p>
                    <div class="da-img"></div>
                </div>
                <div class="da-slide">
                    <h2>Venta</h2>
                    <p>¡Te ayudamos a encontrar la casa de tus sueños!</p>
                    <div class="da-img"></div>
                </div>
                <nav class="da-arrows">
                    <span class="da-arrows-prev"></span>
                    <span class="da-arrows-next"></span>
                </nav>
            </div>
        </div>
    </div>
</section>

<!--Portfolio-->
<section id="portfolio" class="page-section section appear clearfix secPad">
    <div class="container">

        <div class="heading text-center">
            <!-- Heading -->
            <h2>Propiedades destacadas</h2>
            <p>Estas son algunas de las propiedades en oferta.</p>
        </div>

        <div class="row">
            <nav id="filter" class="col-md-12 text-center">
                <ul>
                    <li><a href="#" id="tocaboton" class="current btn-theme btn-small" data-filter="*">Ver todo</a></li>
                    <li><a href="#" class="btn-theme btn-small" data-filter=".venta">Venta</a></li>
                    <li><a href="#" class="btn-theme btn-small" data-filter=".alquiler">Alquiler</a></li>
                </ul>
            </nav>
            <a onclick="MostrarHeader('MostrarHeaderPropiedad');Mostrar('MostrarInicio');">DETALLE TEST</a>
            <div class="col-md-12">
                <div class="row">
                    <div class="portfolio-items isotopeWrapper clearfix" id="destacadas">
                    </div>

                    <script>
                        $("#destacadas").html(MostrarDestacadasJSON('<?php echo ObtenerDestacadas(); ?>'));
                    </script>
                </div>

            </div>
        </div>
    </div>
</section>

<section id="introText">
    <div class="container">
        <div class="text-center">
        <h1>Silvana Propiedades</h1>
          <p>Nos especializamos en gestionar operaciones inmobiliarias, con la finalidad principal de satisfacer a nuestros clientes, ya sea tasación compra-venta o alquiler.</p>
          <p>Llámenos al 54 11 1234-5678 / 54 11 1234-1111 o escríbanos a info@algunmail.com</p>
        </div>
    </div>
</section>

<!--Contact -->
<section id="contactUs" class="page-section secPad">
    <div class="container">

        <div class="row">
            <div class="heading text-center">
                <!-- Heading -->
                <h2>Contáctenos</h2>
                <p>Gracias por visitarnos. Si desea obtener más información, puede ponerse en contacto con nosotros.</p>
            </div>
        </div>

        <div class="row mrgn30">

            <form method="post" action="" id="contactfrm" role="form">

                <div class="col-sm-4">
                    <div class="form-group">
                        <!--<label for="name">Nombre</label>-->
                        <input type="text" class="form-control" name="name" id="name" placeholder="Nombre" title="Por favor ingrese su nombre">
                    </div>
                    <div class="form-group">
                        <!--<label for="email">Correo electrónico</label>-->
                        <input type="email" class="form-control" name="email" id="email" placeholder="Correo electrónico" title="Por favor ingrese una dirección de correo electrónico válida">
                    </div>
                </div>
                <div class="col-sm-8">
                    <div class="form-group">
                        <!--<label for="comments">Mensaje</label>-->
                        <textarea name="comment" class="form-control" id="comments" cols="3" rows="5" placeholder="Mensaje" title="Por favor ingrese su mensaje"></textarea>
                    </div>
                    <button name="submit" type="submit" class="btn btn-lg btn-primary" id="submit">Enviar</button>
                    <div class="result"></div>
                </div>
            </form>
        </div>

        <div class="row mrgn30">
            <div class="col-sm-4">
                <h4>Dirección:</h4>
                <address>
                    Silvana Propiedades<br>
                    Av. De Mayo 1234, CABA<br>
                </address>
            </div>
            <div class="col-sm-4">
                <h4>Teléfonos:</h4>
                <address>
                    54 11 1234-5678 / 54 11 1234-1111<br>
                </address>
            </div>
        </div>
    </div>
    <!--/.container-->
</section>


<div class="clear"></div>

<script src="js/modernizr-latest.js"></script>
<script src="js/bootstrap.min.js" type="text/javascript"></script>
<script src="js/jquery.isotope.min.js" type="text/javascript"></script>
<script src="js/fancybox/jquery.fancybox.pack.js" type="text/javascript"></script>
<script src="js/jquery.nav.js" type="text/javascript"></script>
<script src="js/jquery.cslider.js" type="text/javascript"></script>
<script src="js/custom.js" type="text/javascript"></script>
<script src="js/owl-carousel/owl.carousel.js"></script>