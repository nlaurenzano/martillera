<?php 
//require_once('recaptchalib.php');
require_once('clases/Elemento.php');
require_once('clases/Descripciones.php');

function SendContactEmail() {

    //$human = $_POST['human'];

    if(isset($_POST['grecaptcharesponse']) && !empty($_POST['grecaptcharesponse'])) {
        // your site secret key
        $secret = getSiteSecretKey();
        
        //get verify response data
        $verifyResponse = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret='.$secret.'&response='.$_POST['grecaptcharesponse']);

        $responseData = json_decode($verifyResponse);

        if($responseData->success) {
            //$body = "From: $name\n E-Mail: $email\n Message:\n $message";
            $name = !empty($_POST['name'])?$_POST['name']:'';
            $email = !empty($_POST['email'])?$_POST['email']:'';
            $message = !empty($_POST['message'])?$_POST['message']:'';
            $from = 'From: ReLatIBaS';
            
            $to = 'power500@gmail.com';
            $subject = 'Contact';

            $htmlContent = "
                <h1>Contact request details</h1>
                <p><b>Name: </b>".$name."</p>
                <p><b>Email: </b>".$email."</p>
                <p><b>Message: </b>".$message."</p>
            ";

            // Always set content-type when sending HTML email
            $headers = "MIME-Version: 1.0" . "\r\n";
            $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
            // More headers
            $headers .= 'From:'.$name.' <'.$email.'>' . "\r\n";

            //mail($para, $titulo, $mensaje, $cabeceras);
            //if (mail ($to, $subject, $headers, $from)) { 
            if (mail ($to, $subject, $htmlContent, $headers)) { 
                echo 'ok';  // Your message has been sent!
            } else { 
                echo 'error';   // Something went wrong, go back and try again!
            }
        } else {
             echo 'humanFail'; // Robot verification failed, please try again.
        }
    } else {
         echo 'humanEmpty';  // Please click on the reCAPTCHA box.
    }
}

// returns true if $needle is a substring of $haystack
function strContains($needle, $haystack)
{
    return strpos($haystack, $needle) !== false;
}

// returns the substring to the right of parameter
function strRightBack($substring, $string)
{  
    $posicion = strrpos($string, $substring);
    return substr($string, $posicion + 1);
}

// Checks the server the site is running on. Returns true if it is localhost
function isLocalServer() {
    return strContains('localhost',$_SERVER['HTTP_HOST']);   
}

// Checks the server the site is running on. Returns true if it is localhost
//function obtenerHost() {
//    //$host = 'http://www.tplaurenzano.esy.es/SERVIDOR/ws.php';
//
//    if (isLocalServer()) {
//        return 'http://localhost:8080/martillera/SERVIDOR/ws.php';
//    } else {
//        return 'http://localhost:80/TP-Laurenzano/SERVIDOR/ws.php';
//    }
//
//
//}

// reCAPTCHA Data site key
function getDataSitekey() {
    if (isLocalServer()) {
        return '6LfTDhMUAAAAAPK-0Qwjlehd9tTR4ssWb0dUWSFv';  // local key
    } else {
        return '6LfTGBMUAAAAAIHhb_jQ06BxdTL72zLNFSrZtira';  // public key
    }
}

// reCAPTCHA Site secret key
function getSiteSecretKey() {
    if (isLocalServer()) {
        return '6LfTDhMUAAAAAGHBcDEMhBlzZo44T8dE2DZE97zA';  // local key
    } else {
        return '6LfTGBMUAAAAAEbGluBBA-mJdHPIPCcu1OS6dAyk';  // public key
    }
}

/*
//public static function GuardarFoto($patente) {
function GuardarFoto($patente) {

    if($_FILES["foto"]['error'])
    {
        //error de imagen
        return false;
    }
    else
    {
        $tamanio = $_FILES['foto']['size'];
        if($tamanio>1024000)
        {
            // "Error: archivo muy grande!"."<br>";
            return false;
        }
        else
        {
            //OBTIENE EL TAMAÑO DE UNA IMAGEN, SI EL ARCHIVO NO ES UNA
            //IMAGEN, RETORNA FALSE
            $esImagen = getimagesize($_FILES["foto"]["tmp_name"]);
            if($esImagen === FALSE) 
            {
                //NO ES UNA IMAGEN
                return false;
            }
            else
            {
                $NombreCompleto = explode(".", $_FILES['foto']['name']);
                $Extension = end($NombreCompleto);
                $arrayDeExtValida = array("jpg", "jpeg", "gif", "bmp","png");  //defino antes las extensiones que seran validas
                if(!in_array($Extension, $arrayDeExtValida))
                {
                   //"Error archivo de extension invalida";
                    return false;
                }
                else
                {
                    $destino = "fotos/$patente.$Extension";
                    $foto=$patente.".".$Extension;

                    // MUEVO EL ARCHIVO DEL TEMPORAL AL DESTINO FINAL
                    if (move_uploaded_file($_FILES["foto"]["tmp_name"],$destino))
                    {       
                         //echo "ok";
                        return $foto;
                    }
                    else
                    {   
                        // algun error;
                        return false;
                    }

                }
            }
        }           
    }
    return true;
}
*/

function ValidarImagenes() {


    foreach ($_FILES["imagenes"]["error"] as $key => $error) {
        if($_FILES["imagenes"]['error'][$key]) {
            //error de imagen
            return 'Ha ocurrido un error con la carga de imágenes.';
        } else {
            $tamanio = $_FILES['imagenes']['size'][$key];
            if($tamanio > 1048576) {
                // "Error: archivo muy grande!"."<br>";
                return 'El archivos es demasiado grande ('.$_FILES['imagenes']['name'][$key].'). Las imágenes no deben superar 1 Mb.';
            } else {
                //OBTIENE EL TAMAÑO DE UNA IMAGEN, SI EL ARCHIVO NO ES UNA
                //IMAGEN, RETORNA FALSE
                $esImagen = getimagesize($_FILES["imagenes"]["tmp_name"][$key]);
                if($esImagen === FALSE) {
                    //NO ES UNA IMAGEN
                    return 'El archivo no es una imagen ('.$_FILES['imagenes']['name'][$key].').';
                } else {
                    $nombreCompleto = explode(".", $_FILES['imagenes']['name'][$key]);
                    $extension = strtolower(end($nombreCompleto));
                    $arrayDeExtValida = array("jpg","jpeg","gif","bmp","png");  //defino antes las extensiones que seran validas
                    if(!in_array($extension, $arrayDeExtValida)) {
                       //"Error archivo de extension invalida";
                        //return "Error: archivo de extension inválida";
                        return 'La extensión del archivo es inválida ('.$_FILES['imagenes']['name'][$key].').';
                    }
                }
            }           
        }
    }
    return '';
}

function GuardarImagenes($idPropiedad) {

    $indice=1;
    foreach ($_FILES["imagenes"]["error"] as $key => $error) {

        $nombreCompleto = explode(".", $_FILES['imagenes']['name'][$key]);
        $extension = strtolower(end($nombreCompleto));

        $imagen = 'foto_ID'.$idPropiedad."_$indice.".$extension;    //foto_ID[id]_[indice].[extension]
        $destino = "../images/portfolio/$imagen";

        // MUEVO EL ARCHIVO DEL TEMPORAL AL DESTINO FINAL
        if (move_uploaded_file($_FILES["imagenes"]["tmp_name"][$key],$destino))
        {       
            return '';
        }
        else
        {   
            // algun error;
            return 'Ha ocurrido un error con la carga de imágenes ('.$_FILES['imagenes']['name'][$key].').';
        }
        $indice++;
    }
    return true;
}


function ObtenerDestacadas() {
    return Elemento::TraerDestacadas();
}

function ObtenerTodas() {
    return Elemento::TraerTodos();
}

function ObtenerDetalle($idPropiedad) {
    return json_encode(Elemento::TraerPorId($idPropiedad));
}

function ObtenerDescripciones() {
    return Descripciones::TraerTodos();
}
?>