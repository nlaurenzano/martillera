<?php 
session_start();
if(isset($_SESSION['registrado'])) {
    if($_SESSION['rol']=='admin') {
?>
        <li><a onclick="MostrarHeader('MostrarHeaderCarga');MostrarFormCarga(null)" style="cursor: pointer;">Carga</a></li>
        <li class="dropdown" style="cursor: pointer;">
            <a class="dropdown-toggle" data-toggle="dropdown">
                <?php echo $_SESSION['registrado']?>
                <span class="caret"></span>
            </a>
            <ul class="dropdown-menu">
                <li><a onclick="deslogear()">Desconectar</a></li> 
                <li><a onclick="MostrarHeader('MostrarHeaderLogin');Mostrar('MostrarPassChange')">Cambio de contraseña</a></li> 
            </ul>
        </li>
<?php 
    }
} else {
?>
    <li><a onclick="MostrarHeader('MostrarHeaderLogin');Mostrar('MostrarLogin')"><label class="fa fa-user" style="font-size:0.9em;cursor: pointer;"></label></a></li>
<?php 
}
?>