<?php

require_once('AccesoDatos.php');

class Elemento
{
//--------------------------------------------------------------------------------//
//--ATRIBUTOS
	private $id;
	private $operacion;
	private $tipo;
	private $ambientes;
	private $zona;
	private $descripcion;
	private $imagenes;
	private $ocultar;
	private $destacada;

//--------------------------------------------------------------------------------//

//--------------------------------------------------------------------------------//
//--GETTERS Y SETTERS

 	public function GetId()
	{
		return $this->id;
	}
	public function GetOperacion() {
		return $this->operacion;
	}
	public function GetTipo() {
		return $this->tipo;
	}
	public function GetAmbientes() {
		return $this->ambientes;
	}
	public function GetZona() {
		return $this->zona;
	}
	public function GetDescripcion() {
		return $this->descripcion;
	}
	public function GetImagenes() {
		return explode(",",$this->imagenes);;
	}
	public function GetOcultar() {
		return $this->ocultar;
	}
	public function GetDestacada() {
		return $this->destacada;
	}

	public function SetId($valor)
	{
		$this->id = $valor;
	}
	public function SetOperacion($valor) {
		$this->operacion = $valor;
	}
	public function SetTipo($valor) {
		$this->tipo = $valor;
	}
	public function SetAmbientes($valor) {
		$this->ambientes = $valor;
	}
	public function SetZona($valor) {
		$this->zona = $valor;
	}
	public function SetDescripcion($valor) {
		$this->descripcion = $valor;
	}
	public function SetImagenes($valor) {
		$this->imagenes = implode(",",$valor);
	}
	public function SetOcultar($valor) {
		$this->ocultar = $valor;
	}
	public function SetDestacada($valor) {
		$this->destacada = $valor;
	}

	
//--------------------------------------------------------------------------------//
//--CONSTRUCTOR
	public function __construct($id=NULL)
	{
		if($id != NULL){
			$obj = Elemento::TraerPorId($id);
			$this->id = $obj->id;
			$this->operacion = $obj->operacion;
			$this->tipo = $obj->tipo;
			$this->ambientes = $obj->ambientes;
			$this->zona = $obj->zona;
			$this->descripcion = $obj->descripcion;
			$this->imagenes = $obj->imagenes;
			$this->ocultar = $obj->ocultar;
			$this->destacada = $obj->destacada;
		}
	}

//--------------------------------------------------------------------------------//
//--TOSTRING	
  	public function ToString()
	{
	  	return $this->id."  ".$this->operacion."  ".$this->tipo."  ".$this->ambientes."  ".$this->zona."  ".$this->descripcion."  ".$this->imagenes."  ".$this->ocultar."  ".$this->destacada;
	}
//--------------------------------------------------------------------------------//

//--------------------------------------------------------------------------------//
//--METODO DE CLASE

	public static function Guardar($id, $campo1, $campo2, $campo3) {
		
		$unElemento = new Elemento();
		$unElemento->SetId($id);
		$unElemento->SetOperacion($operacion);
		$unElemento->SetTipo($tipo);
		$unElemento->SetAmbientes($ambientes);
		$unElemento->SetZona($zona);
		$unElemento->SetDescripcion($descripcion);
		$unElemento->SetImagenes($imagenes);
		$unElemento->SetOcultar($ocultar);
		$unElemento->SetDestacada($destacada);

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
		$consulta = $objetoAccesoDato->RetornarConsulta("SELECT id,operacion,tipo,ambientes,zona,descripcion,imagenes,ocultar,destacada FROM propiedades WHERE id = :id");
		$consulta->bindValue(':id', $id, PDO::PARAM_STR);
		$consulta->execute();
		return $consulta->fetchObject('Elemento');
		//$elementos = $consulta->fetchall();
		//return $elementos[0];
	}

	public static function Borrar($id)
	{
		$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
		$consulta =$objetoAccesoDato->RetornarConsulta("DELETE FROM listado WHERE id = :id");	
		$consulta->bindValue(':id', $id, PDO::PARAM_STR);
		$consulta->execute();
		return $consulta->rowCount();
	}

	public static function TraerDestacadas() {
		$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso();
		$consulta=$objetoAccesoDato->RetornarConsulta("SELECT id,operacion,tipo,ambientes,zona,descripcion,imagenes,ocultar,destacada FROM propiedades WHERE destacada = :destacada");
		$consulta->bindValue(':destacada', 1, PDO::PARAM_STR);
		$consulta->execute();
		//return $consulta->fetchall(PDO::FETCH_CLASS,"Elemento");
		$retorno = json_encode($consulta->fetchall());
		return $retorno;
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