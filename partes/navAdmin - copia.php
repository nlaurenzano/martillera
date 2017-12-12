<?php 
session_start();
if(isset($_SESSION['registrado'])) {
    if($_SESSION['rol']=='admin') {
?>

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
                <!--<li class="active"><a onclick="MostrarHeader('MostrarHeaderInicio');Mostrar('MostrarInicio');">Inicio</a></li>-->
                <li<a href="index.php">Inicio</a></li>
                <li><a onclick="BuscarPropiedades()" style="cursor: pointer;">Listado</a></li>
                <li><a onclick="MostrarHeader('MostrarHeaderCarga');MostrarFormCarga(null)" style="cursor: pointer;">Carga</a></li>
                <li class="dropdown" style="cursor: pointer;">
                    <a class="dropdown-toggle" data-toggle="dropdown">
                        <?php echo $_SESSION['registrado']?>
                        <span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu">
                        <li><a onclick="deslogear()">Desconectar</a></li> 
                    </ul>
                </li>
            </ul>
        </div>
<?php 
    }
} else {
?>
    <li><a onclick="MostrarHeader('MostrarHeaderLogin');Mostrar('MostrarLogin')"><label class="fa fa-user" style="font-size:0.9em;cursor: pointer;"></label></a></li>
<?php 
}
?>