<?php 
require_once("clases/AccesoDatos.php");
require_once("clases/Usuario.php");
//require_once("funciones.php");

session_start();
$usuario = $_POST["usuario"];
if (!filter_var($usuario, FILTER_VALIDATE_EMAIL)) {
  $retorno= "El formato del email ingresado no es correcto.";
} else {
	$clave = $_POST['clave'];		// ESTO SERÍA UN HASH


	if (!password_strength_check($clave, 8, 50, 1, 1, 0, 0)) {
		$retorno= "El formato de la clave ingresada no es correcto.";
	} else {
		$recordar = $_POST['recordarme'];

		$userBuscado = Usuario::TraerPorEmail($usuario);

		if ($userBuscado) {
			// ACA SE COMPARA CONTRA EL HASH, QUE ES LO QUE SE VA A GUARDAR EN DB
			if (password_verify($clave, $userBuscado->GetClave())) {
				if($recordar=="true")
				{
					setcookie("registro",$usuario,  time()+36000 , '/');
				} else {
					setcookie("registro",$usuario,  time()-36000, '/');
				}
				$_SESSION['registrado']=$userBuscado->GetNombre();
				$_SESSION['rol']=$userBuscado->GetRol();
				$retorno="ingreso";
			} else {
				//$retorno= "La contraseña ingresada es inválida.";
				$retorno= "La contraseña ingresada es inválida.  ". $userBuscado->GetClave() . " --- " . $retorno=password_hash($userBuscado->GetClave(), PASSWORD_DEFAULT);
			}
		} else {
			$retorno= "No se encuentra el usuario ingresado.";
		}
	}
}

//$retorno=password_hash("pass1234", PASSWORD_DEFAULT);
echo $retorno;
?>