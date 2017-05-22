<?php 
require_once('./SERVIDOR/lib/nusoap.php');
require_once("clases/AccesoDatos.php");
require_once("clases/Elemento.php");

$queHago = $_POST['queHacer'];

switch ($queHago) {
	case 'MostrarInicio':
		include("partes/inicio.php");
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
	case 'GuardarPropiedad':
		Elemento::GuardarPropiedad($_POST['id'], $_POST['campo1'], $_POST['campo2'], $_POST['campo3']);
		break;
	case 'Borrar':
		Elemento::Borrar($_POST['idBorrar']);
		break;
	case 'Modificar':
		$unElemento = Elemento::TraerPorId($_POST['idModificar']);
		echo json_encode($unElemento);
		break;

	default:
		# code...
		break;
}

function TraerWS() {
	$host = 'http://localhost:80/rec2/SERVIDOR/ws.php';
	$client = new nusoap_client($host . '?wsdl');
	$err = $client->getError();
	if ($err) {
		//echo '<h2>ERROR EN LA CONSTRUCCION DEL WS:</h2><pre>' . $err . '</pre>';
		echo '{"status" : "fail","data" : "ERROR EN LA CONSTRUCCION DEL WS","message" : "' . $err . '"}';
		//die();
	} else {

		$listado = $client->call('TraerTodos');

		if ($client->fault) {
			//echo '<h2>ERROR AL INVOCAR METODO:</h2><pre>';
			//print_r($listado);
			//echo '</pre>';
			echo '{"status" : "fail","data" : "ERROR AL INVOCAR METODO",message" : "' . print_r($listado) . '"}';
		} else {
			$err = $client->getError();
			if ($err) {
				//echo '<h2>ERROR EN EL CLIENTE:</h2><pre>' . $err . '</pre>';
				echo '{"status" : "error","message" : "' . $err . '"}';
			} 
			else {
				//echo json_encode($listado);
				$retorno = '{"status" : "success","data" :';
	        	$retorno .= json_encode($listado);
	        	$retorno .= '}';
	        	echo $retorno;
			}
		}
	}
}

?>