<div class="navbar-header">
    <button type="button" id="nav-toggle" class="navbar-toggle" data-toggle="collapse" data-target="#main-nav">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
    </button>
    <a href="#" class="navbar-brand scroll-top logo" style="padding: 0"><img src="./images/Logo_SILMAR_Small.png" style="height: 50px;"></a>
</div>
<!--/.navbar-header-->
<div id="main-nav" class="collapse navbar-collapse">
    <ul class="nav navbar-nav" id="mainNav">
        <li class="active"><a href="#home" class="scroll-link">Inicio</a></li>
        <li><a href="#portfolio" class="scroll-link">Propiedades</a></li>
        <li><a href="#introText" class="scroll-link">Nosotros</a></li>
        <li><a href="#contactUs" class="scroll-link">Contacto</a></li>
        <?php 
            include("../partes/navAdmin.php");
        ?>
    </ul>
</div>
<!--/.navbar-collapse-->