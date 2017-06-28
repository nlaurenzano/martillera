<?php

require_once('AccesoDatos.php');

class Descripciones
{
//--------------------------------------------------------------------------------//
//--ATRIBUTOS
	private $grupo;
	private $clave;
	private $descripcion;

//--------------------------------------------------------------------------------//

//--------------------------------------------------------------------------------//
//--GETTERS Y SETTERS

 	public function GetGrupo()
	{
		return $this->grupo;
	}
	public function GetClave() {
		return $this->clave;
	}
	public function GetDescripcion() {
		return $this->descripcion;
	}

	public function SetGrupo($valor)
	{
		$this->grupo = $valor;
	}
	public function SetClave($valor) {
		$this->clave = $valor;
	}
	public function SetDescripcion($valor) {
		$this->descripcion = $valor;
	}

	
//--------------------------------------------------------------------------------//
//--CONSTRUCTOR
	public function __construct($grupo=NULL,$clave=NULL)
	{
		if($grupo != NULL && $clave != NULL){
			$obj = Descripcion::TraerPorGrupoClave($grupo,$clave);
			$this->grupo = $obj->grupo;
			$this->clave = $obj->clave;
			$this->descripcion = $obj->descripcion;
		}
	}

//--------------------------------------------------------------------------------//
//--TOSTRING	
  	public function ToString()
	{
	  	return $this->grupo."  ".$this->clave."  ".$this->descripcion;
	}
//--------------------------------------------------------------------------------//

//--------------------------------------------------------------------------------//
//--METODO DE CLASE

	public static function TraerPorGrupoClave() {
		$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
		$consulta = $objetoAccesoDato->RetornarConsulta("SELECT * FROM descripciones WHERE grupo = :grupo AND clave = :clave");
		$consulta->bindValue(':grupo', $grupo, PDO::PARAM_STR);
		$consulta->bindValue(':clave', $clave, PDO::PARAM_STR);
		$consulta->execute();
		//return $consulta->fetchObject('Descripcion');
		$descripciones = $consulta->fetchall();
		return $descripciones[0];
	}
	
	public static function TraerTodos()
	{
		$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso();
		$consulta=$objetoAccesoDato->RetornarConsulta("SELECT * FROM descripciones");
		$consulta->execute();
		$retorno = json_encode($consulta->fetchall());
		return $retorno;
	}

//--------------------------------------------------------------------------------//

//--------------------------------------------------------------------------------//
//--METODOS DE INSTANCIA


//--------------------------------------------------------------------------------//

}