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
	private $descBreve;
	private $descripcion;
	private $destacada;
	private $ocultar;
	//private $imagenes;

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
	public function GetDescBreve() {
		return $this->descBreve;
	}
	public function GetDescripcion() {
		return $this->descripcion;
	}
	/*public function GetImagenes() {
		return explode(",",$this->imagenes);;
	}*/
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
	public function SetDescBreve($valor) {
		$this->descBreve = $valor;
	}
	public function SetDescripcion($valor) {
		$this->descripcion = $valor;
	}
	public function SetDestacada($valor) {
		$this->destacada = $valor;
	}
	public function SetOcultar($valor) {
		$this->ocultar = $valor;
	}
	/*public function SetImagenes($valor) {
		var_dump($valor);
		$imagenesArray = explode(",",$valor);
		$imagenesArray2 = array();
		foreach ($imagenesArray as $name) {
			array_push($imagenesArray2,strRightBack('\\', $name));
		}
		$this->imagenes = implode(",",$imagenesArray2);
		var_dump($this->imagenes);
	}*/

	
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
			$this->descBreve = $obj->descBreve;
			$this->descripcion = $obj->descripcion;
			//$this->imagenes = $obj->imagenes;
			$this->ocultar = $obj->ocultar;
			$this->destacada = $obj->destacada;
		}
	}

//--------------------------------------------------------------------------------//
//--TOSTRING	
  	public function ToString()
	{
	  	return $this->id."  ".$this->operacion."  ".$this->tipo."  ".$this->ambientes."  ".$this->zona."  ".$this->descBreve."  ".$this->descripcion."  ".$this->ocultar."  ".$this->destacada;
	  	//return $this->id."  ".$this->operacion."  ".$this->tipo."  ".$this->ambientes."  ".$this->zona."  ".$this->descBreve."  ".$this->descripcion."  ".$this->imagenes."  ".$this->ocultar."  ".$this->destacada;
	}
//--------------------------------------------------------------------------------//

//--------------------------------------------------------------------------------//
//--METODO DE CLASE

	public static function Guardar($id,$operacion,$tipo,$ambientes,$zona,$descBreve,$descripcion,$destacada,$ocultar) {
	//public static function Guardar($id,$operacion,$tipo,$ambientes,$zona,$descBreve,$descripcion,$destacada,$ocultar,$imagenes) {

		$unElemento = new Elemento();
		$unElemento->SetId($id);
		$unElemento->SetOperacion($operacion);
		$unElemento->SetTipo($tipo);
		$unElemento->SetAmbientes($ambientes);
		$unElemento->SetZona($zona);
		$unElemento->SetDescBreve($descBreve);
		$unElemento->SetDescripcion($descripcion);
		$unElemento->SetDestacada($destacada);
		$unElemento->SetOcultar($ocultar);
		//$unElemento->SetImagenes($imagenes);

		if ($unElemento->id > 0) {
			$retorno = $unElemento->Modificar();
		} else {
			$retorno = $unElemento->Insertar();
		}
		echo $retorno;
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
		$consulta = $objetoAccesoDato->RetornarConsulta("SELECT id,operacion,tipo,ambientes,zona,descBreve,descripcion,imagenes,ocultar,destacada FROM propiedades WHERE id = :id");
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

	public static function TraerDestacadas() {
		$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso();
		$consulta=$objetoAccesoDato->RetornarConsulta("SELECT id,operacion,tipo,ambientes,zona,descBreve,descripcion,imagenes,ocultar,destacada FROM propiedades WHERE destacada = :destacada AND ocultar = :ocultar");
		$consulta->bindValue(':destacada', 1, PDO::PARAM_STR);
		$consulta->bindValue(':ocultar', 0, PDO::PARAM_STR);
		$consulta->execute();
		//return $consulta->fetchall(PDO::FETCH_CLASS,"Elemento");
		$retorno = json_encode($consulta->fetchall());
		return $retorno;
	}

	public static function TraerPorFiltro($operacion, $tipo, $ambientes, $zona) {
		$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso();

		// Si no se seteó un filtro, entonces no se incluye en el query
		if ($operacion == 'none') {
			$operacionQuery = '';
		} else {
			$operacionQuery = 'operacion = :operacion AND ';
		}
		if ($tipo == 'none') {
			$tipoQuery = '';
		} else {
			$tipoQuery = 'tipo = :tipo AND ';
		}
		if ($ambientes == 'none') {
			$ambientesQuery = '';
		} else {
			$ambientesQuery = 'ambientes = :ambientes AND ';
		}
		if ($zona == 'none') {
			$zonaQuery = '';
		} else {
			$zonaQuery = 'zona = :zona AND ';
		}

		// Las condiciones del query se terminan en TRUE para completar el posible AND que queda al final
		$consulta=$objetoAccesoDato->RetornarConsulta("SELECT id,operacion,tipo,ambientes,zona,descBreve,descripcion,imagenes,ocultar,destacada FROM propiedades WHERE " . $operacionQuery . $tipoQuery . $ambientesQuery . $zonaQuery . "ocultar = :ocultar");
		
		// Si el filtro no se incluyó en el query, entonces no hay que bindearlo
		if ($operacion != 'none') {
			$consulta->bindValue(':operacion', $operacion, PDO::PARAM_STR);
		}
		if ($tipo != 'none') {
			$consulta->bindValue(':tipo', $tipo, PDO::PARAM_STR);
		}
		if ($ambientes != 'none') {
			$consulta->bindValue(':ambientes', $ambientes, PDO::PARAM_STR);
		}
		if ($zona != 'none') {
			$consulta->bindValue(':zona', $zona, PDO::PARAM_STR);
		}
		$consulta->bindValue(':ocultar', 0, PDO::PARAM_STR);

		$consulta->execute();
		//return $consulta->fetchall(PDO::FETCH_CLASS,"Elemento");
		$retorno = json_encode($consulta->fetchall());
		return $retorno;
	}

	public static function TraerTodos()
	{
		$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso();
		$consulta=$objetoAccesoDato->RetornarConsulta("SELECT id,operacion,tipo,ambientes,zona,descBreve,descripcion,ocultar,destacada FROM propiedades");
		//$consulta=$objetoAccesoDato->RetornarConsulta("SELECT id,operacion,tipo,ambientes,zona,descBreve,descripcion,imagenes,ocultar,destacada FROM propiedades");
		$consulta->execute();
		$retorno = json_encode($consulta->fetchall());
		return $retorno;
	}

	public static function AgregarNombresImagenes($id,$imagenes) {
		$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso();
		$consulta = $objetoAccesoDato->RetornarConsulta("
			UPDATE propiedades SET id=:id,imagenes=:imagenes WHERE id=:id");

		$consulta->bindValue(':id',$id, PDO::PARAM_STR);
		$consulta->bindValue(':imagenes',$imagenes, PDO::PARAM_STR);
	
		$consulta->execute();
	}

//--------------------------------------------------------------------------------//

//--------------------------------------------------------------------------------//
//--METODOS DE INSTANCIA
	public function Insertar() {
		$retorno = ValidarImagenes();
		if ($retorno == '') {

			$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso();
			$consulta = $objetoAccesoDato->RetornarConsulta("INSERT INTO propiedades (operacion,tipo,ambientes,zona,descBreve,descripcion,destacada,ocultar) values (:operacion,:tipo,:ambientes,:zona,:descBreve,:descripcion,:destacada,:ocultar)");
			//$consulta = $objetoAccesoDato->RetornarConsulta("INSERT INTO propiedades (operacion,tipo,ambientes,zona,descBreve,descripcion,destacada,ocultar,imagenes) values (:operacion,:tipo,:ambientes,:zona,:descBreve,:descripcion,:destacada,:ocultar,:imagenes)");

			$consulta->bindValue(':operacion',$this->operacion, PDO::PARAM_STR);
			$consulta->bindValue(':tipo',$this->tipo, PDO::PARAM_STR);
			$consulta->bindValue(':ambientes',$this->ambientes, PDO::PARAM_STR);
			$consulta->bindValue(':zona',$this->zona, PDO::PARAM_STR);
			$consulta->bindValue(':descBreve',$this->descBreve, PDO::PARAM_STR);
			$consulta->bindValue(':descripcion',$this->descripcion, PDO::PARAM_STR);
			$consulta->bindValue(':destacada',$this->destacada, PDO::PARAM_STR);
			$consulta->bindValue(':ocultar',$this->ocultar, PDO::PARAM_STR);
			//$consulta->bindValue(':imagenes',$this->imagenes, PDO::PARAM_STR);
			
			$consulta->execute();
			$id = $objetoAccesoDato->RetornarUltimoIdInsertado();
			$retorno = GuardarImagenes($id);
		}
		return $retorno;
	}


	
	public function Modificar()
	{
		$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso();
		$consulta = $objetoAccesoDato->RetornarConsulta("
			UPDATE propiedades SET campo1=:campo1,campo2=:campo2,campo3=:campo3 WHERE id=:id");
	

		$consulta->bindValue(':campo1',$this->campo1, PDO::PARAM_STR);
		$consulta->bindValue(':campo2',$this->campo2, PDO::PARAM_STR);
		$consulta->bindValue(':campo3',$this->campo3, PDO::PARAM_STR);
	
		$consulta->bindValue(':id',$this->id, PDO::PARAM_STR);

		$consulta->execute();
		return '';
	}

//--------------------------------------------------------------------------------//

}