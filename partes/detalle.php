<?php
if(isset($_POST['idPropiedad'])) {
        $propiedad = Elemento::TraerPorId($_POST['idPropiedad']);
    } else {
        $propiedad = Elemento::TraerPorId('1');
    }

?>

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
                        <div class="post-slider">
                            <div class="post-heading">
                                <h3><?php echo isset($propiedad) ?  $propiedad->GetTipo()." | ".$propiedad->GetZona() : "" ; ?></h3>
                            </div>
                            <!-- start flexslider -->
                            <div id="post-slider" class="flexslider">
                                <ul class="slides">
                                    <li>
                                        <img src="../images/portfolio/<?php echo isset($propiedad) ?  $propiedad->GetImagenes()[0] : "" ; ?>" alt="" />
                                    </li>
                                    <li>
                                        <img src="../images/portfolio/<?php echo isset($propiedad) ?  $propiedad->GetImagenes()[1] : "" ; ?>" alt="" />
                                    </li>
                                    <li>
                                        <img src="../images/portfolio/<?php echo isset($propiedad) ?  $propiedad->GetImagenes()[2] : "" ; ?>" alt="" />
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
            <!-- /.col -->

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
                            <textarea name="comment" class="form-control" id="comments" cols="3" rows="5" placeholder="Mensaje" title="Por favor ingrese su mensaje"></textarea>
                        </div>
                        <button name="submit" type="submit" class="btn btn-lg btn-primary" id="submit">Enviar</button>
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