<?php

require_once('../php/funciones.php');

class AccesoDatos
{
    private static $ObjetoAccesoDatos;
    private $objetoPDO;
 
    private function __construct()
    {
        try {
            //$this->objetoPDO = new PDO('mysql:host=localhost;dbname=u299730995_est;charset=utf8', 'u299730995_root', 'nsmo1cl', array(PDO::ATTR_EMULATE_PREPARES => false,PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
            if (isLocalServer()) {
            $this->objetoPDO = new PDO('mysql:host=localhost;dbname=silvanapropiedades;charset=utf8', 'root', '', array(PDO::ATTR_EMULATE_PREPARES => false,PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
            } else {
            $this->objetoPDO = new PDO('mysql:host=localhost;dbname=u596315362_silva;charset=utf8', 'u596315362_silva', 'Apocalypsh1t', array(PDO::ATTR_EMULATE_PREPARES => false,PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
            }
            $this->objetoPDO->exec("SET CHARACTER SET utf8");
        }
        catch (PDOException $e) {
            print "Error!: " . $e->getMessage(); 
            die();
        }
    }
 
    public function RetornarConsulta($sql)
    { 
        return $this->objetoPDO->prepare($sql); 
    }
    
     public function RetornarUltimoIdInsertado()
    { 
        return $this->objetoPDO->lastInsertId(); 
    }
 
    public static function dameUnObjetoAcceso()
    {
        if (!isset(self::$ObjetoAccesoDatos)) {
            self::$ObjetoAccesoDatos = new AccesoDatos();
        } 
        return self::$ObjetoAccesoDatos;        
    }
 
     // Evita que el objeto se pueda clonar
    public function __clone()
    { 
        trigger_error('La clonación de este objeto no está permitida', E_USER_ERROR); 
    }
}
?>