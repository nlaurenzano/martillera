<?php 
//session_start();
if(isset($_SESSION['registrado'])) {
    if($_SESSION['rol']=='admin') {
?>
        <li><a href="#" onclick="MostrarHeader('MostrarHeaderCarga');MostrarFormCarga(null)" style="cursor: pointer;">Carga</a></li>
<?php 
    }
?>
    <li class="dropdown" style="cursor: pointer;">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
            <?php echo $_SESSION['registrado']?>
            <span class="caret"></span>
        </a>
        <ul class="dropdown-menu">
            <li><a href="#" onclick="deslogear()">Desconectar</a></li> 
            <li><a href="#" onclick="MostrarHeader('MostrarHeaderLogin');Mostrar('MostrarPassChange')">Cambio de contraseña</a></li> 
        </ul>
    </li>
<?php 
} else {
?>
    <li><a href="#" onclick="MostrarHeader('MostrarHeaderLogin');Mostrar('MostrarLogin')"><label class="fa fa-user" style="font-size:0.9em;cursor: pointer;"></label></a></li>
<?php 
}
?>