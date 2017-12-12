<?php 
require_once("clases/AccesoDatos.php");
require_once("clases/Usuario.php");


function ValidarUsuario() {
    $usuario = $_POST["usuario"];
    if (!filter_var($usuario, FILTER_VALIDATE_EMAIL)) {
      $retorno= "El formato del email ingresado no es correcto.";
    } else {
        $clave = $_POST['clave'];
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
                session_start();
                $_SESSION['registrado']=$userBuscado->GetNombre();
                $_SESSION['rol']=$userBuscado->GetRol();
                $retorno="ingreso";
            } else {
                $retorno= "La contraseña ingresada es inválida.";
            }
        } else {
            $retorno= "No se encuentra el usuario ingresado.";
        }
    }
    echo $retorno;
}

function ValidarPassChange() {
    $usuario = $_POST["usuario"];
    if (!filter_var($usuario, FILTER_VALIDATE_EMAIL)) {
      $retorno= "El formato del email ingresado no es correcto.";
    } else {

        $userBuscado = Usuario::TraerPorEmail($usuario);

        if ($userBuscado) {
            // ACA SE COMPARA CONTRA EL HASH, QUE ES LO QUE SE VA A GUARDAR EN DB
            $claveActual = $_POST['claveActual'];
            if (password_verify($claveActual, $userBuscado->GetClave())) {
              
                
                // Controla el formato de la clave nueva
                $claveNueva = $_POST['claveNueva'];
                if (!password_strength_check($claveNueva, 8, 50, 1, 1, 0, 0)) {
                    $retorno= "<p>El formato de la contraseña nueva ingresada no es correcta.</p>";
                    $retorno.= "<ul style='margin-left:20px;'>";
                    $retorno.= "<li>La contraseña debe tener entre 8 y 50 caracteres.</li>";
                    $retorno.= "<li>La contraseña debe contener al menos una letra minúscula.</li>";
                    $retorno.= "<li>La contraseña debe contener al menos un número.</li>";
                    $retorno.= "</ul>";
                } else {
                    // Controla que se haya confirmado correctamente la contraseña nueva
                    $claveNuevaRep = $_POST['claveNuevaRep'];
                    if ($claveNueva==$claveNuevaRep) {
                        // OK
                        //$userBuscado->SetClave(password_hash($claveActual, PASSWORD_DEFAULT));
                        $claveNueva=password_hash($claveNueva, PASSWORD_DEFAULT);
                        Usuario::ModificarClave($userBuscado->GetId(),$claveNueva);
                        $retorno=$claveNueva;
                    } else {
                        $retorno="Las contraseñas son diferentes.";
                    }
                }        
            } else {
                $retorno= "La contraseña actual ingresada es inválida.";
            }
        } else {
            $retorno= "No se encuentra el usuario ingresado.";
        }










        
    }
    echo $retorno;
}


function password_strength_check($password, $min_len = 8, $max_len = 70, $req_digit = 1, $req_lower = 1, $req_upper = 1, $req_symbol = 1) {
    // Build regex string depending on requirements for the password
    $regex = '/^';
    if ($req_digit == 1) { $regex .= '(?=.*\d)'; }              // Match at least 1 digit
    if ($req_lower == 1) { $regex .= '(?=.*[a-z])'; }           // Match at least 1 lowercase letter
    if ($req_upper == 1) { $regex .= '(?=.*[A-Z])'; }           // Match at least 1 uppercase letter
    if ($req_symbol == 1) { $regex .= '(?=.*[^a-zA-Z\d])'; }    // Match at least 1 character that is none of the above
    $regex .= '.{' . $min_len . ',' . $max_len . '}$/';

    if(preg_match($regex, $password)) {
        return TRUE;
    } else {
        return FALSE;
    }
}
?>