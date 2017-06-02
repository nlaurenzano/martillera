<?php 
//require_once("clases/AccesoDatos.php");
require_once("clases/Elemento.php");

$queHago = $_POST['queHacer'];

switch ($queHago) {
	case 'MostrarInicio':
		include("../partes/inicio.php");
		break;
	case 'MostrarPropiedad':
		include("../partes/detalle.php");
		break;
/*
	case 'GuardarPropiedad':
		Elemento::GuardarPropiedad($_POST['id'], $_POST['campo1'], $_POST['campo2'], $_POST['campo3']);
		break;

	case 'MostrarBotones':
		include("partes/botonesNav.php");
		break;
	case 'MostrarAlta':
		include("partes/alta.php");
		break;
	case 'MostrarGrilla':
		include("partes/grilla.php");
		//ImprimirTablas();
		break;
	case 'MostrarAdmin':
		include("partes/admin.php");
		break;
	case 'MostrarLogin':
		include("partes/formLogin.php");
		break;
	case 'Borrar':
		Elemento::Borrar($_POST['idBorrar']);
		break;
	case 'Modificar':
		$unElemento = Elemento::TraerPorId($_POST['idModificar']);
		echo json_encode($unElemento);
		break;
*/
	default:
		# code...
		break;
}

?>