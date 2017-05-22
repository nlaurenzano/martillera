<?php
class Elemento
{
//--------------------------------------------------------------------------------//
//--ATRIBUTOS
	private $id;
	private $campo1;
 	private $campo2;
 	private $campo3;

//--------------------------------------------------------------------------------//

//--------------------------------------------------------------------------------//
//--GETTERS Y SETTERS
 	public function GetId()
	{
		return $this->id;
	}
	public function GetCampo1()
	{
		return $this->campo1;
	}
	public function GetCampo2()
	{
		return $this->campo2;
	}
	public function GetCampo3()
	{
		return $this->campo3;
	}
	
	public function SetId($valor)
	{
		$this->id = $valor;
	}
	public function SetCampo1($valor)
	{
		$this->campo1 = $valor;
	}
	public function SetCampo2($valor)
	{
		$this->campo2 = $valor;
	}
	public function SetCampo3($valor)
	{
		$this->campo3 = $valor;
	}
	
//--------------------------------------------------------------------------------//
//--CONSTRUCTOR
	public function __construct($id=NULL)
	{
		if($id != NULL){
			$obj = Elemento::TraerPorId($id);
			$this->id = $obj->id;
			$this->campo1 = $obj->campo1;
			$this->campo2 = $obj->campo2;
			$this->campo3 = $obj->campo3;
		}
	}

//--------------------------------------------------------------------------------//
//--TOSTRING	
  	public function ToString()
	{
	  	return $this->id."  ".$this->campo1."  ".$this->campo2."  ".$this->campo3;
	}
//--------------------------------------------------------------------------------//

//--------------------------------------------------------------------------------//
//--METODO DE CLASE

	public static function Guardar($id, $campo1, $campo2, $campo3) {
		
		$unElemento = new Elemento();
		$unElemento->SetId($id);
		$unElemento->SetCampo1($campo1);
		$unElemento->SetCampo2($campo2);
		$unElemento->SetCampo3($campo3);

		if ($unElemento->id > 0) {
			$unElemento->Modificar();
		} else {
			$unElemento->Insertar();
		}
	}
/*
	public static function TraerPorCampo1($campo1) 
	{
		$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
		$consulta = $objetoAccesoDato->RetornarConsulta("SELECT campo1, campo2, campo3 FROM listado WHERE campo1 = :campo1");
		$consulta->bindValue(':campo1', $campo1, PDO::PARAM_STR);
		$consulta->execute();
		//return $consulta->fetchObject('Elemento');
		$elementos = $consulta->fetchall();
		return $elementos[0];
	}
*/
	public static function TraerPorId($id) 
	{
		$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
		$consulta = $objetoAccesoDato->RetornarConsulta("SELECT id, campo1, campo2, campo3 FROM listado WHERE id = :id");
		$consulta->bindValue(':id', $id, PDO::PARAM_STR);
		$consulta->execute();
		//return $consulta->fetchObject('Elemento');
		$elementos = $consulta->fetchall();
		return $elementos[0];
	}

	public static function Borrar($id)
	{
		$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
		$consulta =$objetoAccesoDato->RetornarConsulta("DELETE FROM listado WHERE id = :id");	
		$consulta->bindValue(':id', $id, PDO::PARAM_STR);		
		$consulta->execute();
		return $consulta->rowCount();
	}

	public static function TraerTodos()
	{
		$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso();
		$consulta=$objetoAccesoDato->RetornarConsulta("SELECT id,campo1,campo2,campo3 FROM listado");
		$consulta->execute();

		//return $consulta->fetchall(PDO::FETCH_CLASS,"Elemento");
		return $consulta->fetchall();
	}

//--------------------------------------------------------------------------------//

//--------------------------------------------------------------------------------//
//--METODOS DE INSTANCIA
	public function Insertar()
	{
		$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso();
		$consulta = $objetoAccesoDato->RetornarConsulta("INSERT INTO listado (campo1, campo2, campo3) values (:campo1, :campo2, :campo3)");
		$consulta->bindValue(':campo1',$this->campo1, PDO::PARAM_STR);
		$consulta->bindValue(':campo2',$this->campo2, PDO::PARAM_STR);
		$consulta->bindValue(':campo3',$this->campo3, PDO::PARAM_STR);
		$consulta->execute();
		//return $objetoAccesoDato->RetornarUltimoIdInsertado();
	}
	
	public function Modificar()
	{
		$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso();
		$consulta = $objetoAccesoDato->RetornarConsulta("
			UPDATE listado SET campo1=:campo1,campo2=:campo2',campo3=:campo3' WHERE id=:id");
		$consulta->bindValue(':campo1',$this->campo1, PDO::PARAM_STR);
		$consulta->bindValue(':campo2',$this->campo2, PDO::PARAM_STR);
		$consulta->bindValue(':campo3',$this->campo3, PDO::PARAM_STR);
		$consulta->bindValue(':id',$this->id, PDO::PARAM_STR);
		$consulta->execute();
	}

//--------------------------------------------------------------------------------//

}