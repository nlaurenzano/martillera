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
                    <li><a href="#" class="current btn-theme btn-small" data-filter=".venta">Venta</a></li>
                    <li><a href="#" class="btn-theme btn-small" data-filter=".alquiler">Alquiler</a></li>
                    <li><a onclick="BuscarPropiedades()" style="cursor: pointer;">Ver todo</a></li>
                </ul>
            </nav>
            <div class="col-md-12">
                <div class="row">
                    <div class="portfolio-items isotopeWrapper clearfix" id="destacadas">
                    </div>

                    <script>
                        $("#destacadas").html(MostrarDestacadasJSON('<?php echo ObtenerDestacadas(); ?>'));
                    </script>
                </div>

                <div class="col-md-2">
                </div>

                <div class="col-md-8">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group" title="Por favor seleccione el tipo de operación.">
                                <label for="operacion">Operación</label><br />
                                <select class="form-control" name="operacion" id="operacion">
                                    <option value="none">-</option>
                                    <option value="alquiler">Alquiler</option>
                                    <option value="venta">Venta</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group" title="Por favor seleccione el tipo de vivienda.">
                                <label for="tipo">Tipo de vivienda</label><br />
                                <select class="form-control" name="tipo" id="tipo">
                                    <option value="none">-</option>
                                    <option value="depto">Departamento</option>
                                    <option value="casa">Casa</option>
                                    <option value="local">Local</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group" title="Por favor seleccione la cantidad de ambientes.">
                                <label for="ambientes">Cantidad de ambientes</label>
                                <select class="form-control" name="ambientes" id="ambientes">
                                    <option value="none">-</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-md-8">
                            <div class="form-group" title="Por favor seleccione la zona.">
                                <label for="zona">Zona</label><br />
                                 <select class="form-control" name="zona" id="zona">
                                    <option value="none">Todas las zonas</option>
                                    <option value="caba">Ciudad Autónoma de Buenos Aires</option>
                                    <option value="gbasur">Gran Buenos Aires Sur</option>
                                    <option value="costa">Costa Atlántica</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-md-4 text-center">
                            <div class="form-group">
                                <br />
                                <input type="button" class="btn btn-lg btn-primary" name="buscar" value="Buscar"
                            onclick="BuscarPropiedades()" />
                            </div>
                        </div>

                    </div>

                </div>

            </div>
        </div>
    </div>
</section>

<section id="introText">
    <div class="container">
        <div class="text-center">
        <h2>Sobre Nosotros</h2>
            <div class="col-md-8 col-md-offset-2">
                <p>Nos especializamos en gestionar operaciones inmobiliarias, con la finalidad principal de satisfacer a nuestros clientes, ya sea tasación compra-venta o alquiler.</p>
                <br />
                <h4>MISIÓN</h4>
                <p>Brindar un servicio de asesoría inmobiliaria integral cuidando el patrimonio de nuestros clientes, con ética, honestidad y profesionalismo.</p>
                <br />
                <h4>VISIÓN</h4>
                <p>Ser la mejor alternativa para quienes quieren la ayuda de un profesional inmobiliario, desde una relación cercana y resolutiva, ofreciendo las propuestas más innovadoras.<br />
                Que nuestros clientes se sientan plenamente acompañados y asesorados durante todo el proceso de compra / alquiler de una propiedad.</p>
            </div>
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
                        <textarea name="message" class="form-control" id="message" cols="3" rows="5" placeholder="Mensaje" title="Por favor ingrese su mensaje"></textarea>
                    </div>
                    <button type="button" onclick="SendContactEmail()" class="btn btn-lg btn-primary"><i class="fa fa-envelope-o" aria-hidden="true"></i> Enviar</button>

                    <div class="result"></div>
                </div>
            </form>
        </div>

        <div class="row mrgn30">
            <div class="col-sm-4">
                <h4>Dirección:</h4>
                <address>
                    SILMAR Propiedades<br>
                </address>
            </div>
            <div class="col-sm-4">
                <h4>Teléfonos:</h4>
                <address>
                    54 11 5148 7999<br>
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