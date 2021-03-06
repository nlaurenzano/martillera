<?php
require_once('../php/funciones.php');
require_once('../php/clases/Elemento.php');

if(isset($_POST['idPropiedad'])) {
        $propiedad = Elemento::TraerPorId($_POST['idPropiedad']);
    } else {
        $propiedad = Elemento::TraerPorId('1');
    }

?>

<link rel="stylesheet" href="./css/bootstrap.min.css" />
<link rel="stylesheet" type="text/css" href="./css/isotope.css" media="screen" />
<link rel="stylesheet" href="./js/fancybox/jquery.fancybox.css" type="text/css" media="screen" />
<link rel="stylesheet" type="text/css" href="./css/da-slider.css" />
<link rel="stylesheet" href="./css/styles.css" />

<!-- Font Awesome -->
<link href="./font/css/font-awesome.min.css" rel="stylesheet">

<link href="./css/switch.css" rel="stylesheet">

<link href="./skins/default.css" rel="stylesheet" />

<link href="./css/fancybox/jquery.fancybox.css" rel="stylesheet">
<link href="./css/jcarousel.css" rel="stylesheet" />
<link href="./css/flexslider.css" rel="stylesheet" />


<section id="detalle" class="page-section secPad">
    <div class="container">

        <div class="row mrgn30">

            <div class="col-lg-8 mainContent" id="detallePropiedad">
            </div>
            <!-- /.col -->

            <script>
                $("#detallePropiedad").html(MostrarDetalleJSON('<?php echo ObtenerDetalle($_POST["idPropiedad"]); ?>'));
            </script>

        <div class="col-lg-4">
            <aside class="right-sidebar">

                <form method="post" action="" id="contactfrm" role="form">

                    <div class="col-sm-12">
                        <h3>Contacto</h3>
                        
                        <div class="form-group">
                            <!--<label for="name">Nombre</label>-->
                            <input type="text" class="form-control" name="name" id="name" placeholder="Nombre" title="Por favor ingrese su nombre">
                        </div>
                        <div class="form-group">
                            <!--<label for="email">Correo electrónico</label>-->
                            <input type="email" class="form-control" name="email" id="email" placeholder="Correo electrónico" title="Por favor ingrese una dirección de correo electrónico válida">
                        </div>
                        <div class="form-group">
                            <!--<label for="comments">Mensaje</label>-->
                            <textarea name="message" class="form-control" id="message" cols="3" rows="5" placeholder="Mensaje" title="Por favor ingrese su mensaje"></textarea>
                        </div>
                        <button type="button" onclick="SendContactEmail();" class="btn btn-lg btn-primary"><i class="fa fa-envelope-o" aria-hidden="true"></i> Enviar</button>
                        <div class="result"></div>
                    </div>
                </form>
            
            </aside>
        </div>
        </div>
        <!-- /.row -->

    </div>
    <!--/.container-->
</section>

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDOcKw36NiPTVBs_AwP5zIRmNeVkZVx5D4&amp;async=2&amp;callback=initMapVista"
    async defer></script>

<!--<script src="./js/jquery.easing.1.3.js"></script>-->
<script type="text/javascript" src="./js/funcionesAjax.js"></script>
<script src="./js/jquery.js"></script>
<script src="./js/bootstrap.min.js"></script>
<script src="./js/jquery.fancybox.pack.js"></script>
<script src="./js/jquery.fancybox-media.js"></script>
<script src="./js/google-code-prettify/prettify.js"></script>
<script src="./js/portfolio/jquery.quicksand.js"></script>
<script src="./js/portfolio/setting.js"></script>
<script src="./js/jquery.flexslider.js"></script>
<script src="./js/animate.js"></script>
<script src="./js/custom2.js"></script>