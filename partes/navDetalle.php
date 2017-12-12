<div class="navbar-header">
    <button type="button" id="nav-toggle" class="navbar-toggle" data-toggle="collapse" data-target="#main-nav">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
    </button>
    <a href="index.php" class="navbar-brand scroll-top logo" style="padding: 0"><img src="./images/Logo_SILMAR_Small.png" style="height: 50px;"></a>
</div>
<!--/.navbar-header-->
<div id="main-nav" class="collapse navbar-collapse">
    <ul class="nav navbar-nav" id="mainNav">
        <li><a href="index.php">Inicio</a></li>
        <li><a onclick="BuscarPropiedades()" style="cursor: pointer;">Listado</a></li>
        <?php 
            include("../partes/navAdmin.php");
        ?>
    </ul>
</div>
<!--/.navbar-collapse-->