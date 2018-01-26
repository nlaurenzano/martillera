<?php 
//require_once("clases/AccesoDatos.php");
require_once("clases/Elemento.php");
require_once("funcionesLogin.php");

$queHago = $_POST['queHacer'];

if(isset($_POST['idPropiedad'])) {
    $propiedad = $_POST['idPropiedad'];
} else {
    $propiedad = '1';
}

switch ($queHago) {
	case 'MostrarInicio':
		include("../partes/inicio.php");
		break;
	case 'MostrarPropiedad':
		include("../partes/detalle.php");
		break;
	case 'MostrarHeaderInicio':
		include("../partes/navInicio.php");
		break;
	case 'MostrarHeaderPropiedad':
		include("../partes/navDetalle.php");
		break;
	case 'MostrarHeaderListado':
		include("../partes/navListado.php");
		break;
	case 'MostrarHeaderCarga':
		include("../partes/navCarga.php");
		break;
	case 'MostrarHeaderLogin':
		include("../partes/navLogin.php");
		break;
	case 'MostrarHeaderAdmin':
		include("../partes/navAdmin.php");
		break;
	case 'BuscarPropiedad':
		echo Elemento::TraerPorFiltro($_POST['operacion'], $_POST['tipo'], $_POST['ambientes'], $_POST['zona']);
		break;
	case 'ValidarUsuario':
		echo ValidarUsuario();
		break;
	case 'ValidarPassChange':
		echo ValidarPassChange();
		break;
	case 'Descripciones':
		echo ObtenerDescripciones();
		break;
	case 'GuardarPropiedad':
		Elemento::Guardar($_POST['id'],$_POST['operacion'],$_POST['tipo'],$_POST['ambientes'],$_POST['zona'],$_POST['descBreve'],$_POST['descripcion'],$_POST['destacada'],$_POST['ocultar']);
		//Elemento::Guardar($_POST['id'],$_POST['operacion'],$_POST['tipo'],$_POST['ambientes'],$_POST['zona'],$_POST['descripcion'],$_POST['destacada'],$_POST['ocultar'],$_POST['imagenesNombre']);
		break;
	case 'MostrarLogin':
		include("../partes/login.php");
		break;
	case 'MostrarFormLogin':
		include("../partes/formLogin.php");
		break;
	case 'MostrarPassChange':
		include("../partes/password.php");
		break;
	case 'MostrarFormPassChange':
		include("../partes/formPassword.php");
		break;
	case 'Borrar':
		Elemento::Borrar($_POST['idBorrar']);
		break;
	case 'SendContactEmail':
		echo SendContactEmail();
		break;

	case 'MostrarMapa':
		include("../partes/test.php");
		break;

	default:
		# code...
		break;
}

?>