<?php
class Usuario
{
//--------------------------------------------------------------------------------//
//--ATRIBUTOS
	private $email;
 	private $clave;
 	private $nombre;
 	private $rol;

//--------------------------------------------------------------------------------//

//--------------------------------------------------------------------------------//
//--GETTERS Y SETTERS
 	public function GetEmail()
	{
		return $this->email;
	}
	public function GetClave()
	{
		return $this->clave;
	}
	public function GetNombre()
	{
		return $this->nombre;
	}
	public function GetRol()
	{
		return $this->rol;
	}

	public function SetEmail($valor)
	{
		$this->email = $valor;
	}
	public function SetClave($valor)
	{
		$this->clave = $valor;
	}
	public function SetNombre($valor)
	{
		$this->nombre = $valor;
	}
	public function SetRol($valor)
	{
		$this->rol = $valor;
	}

//--------------------------------------------------------------------------------//
//--CONSTRUCTOR
	public function __construct($email=NULL)
	{
		if($email != NULL){
			$obj = Usuario::TraerPorEmail($email);
			$this->email = $obj->email;
			$this->clave = $obj->clave;
			$this->nombre = $obj->nombre;
			$this->rol = $obj->rol;
		}
	}

//--------------------------------------------------------------------------------//
//--TOSTRING	
  	public function ToString()
	{
	  	return $this->email."  ".$this->clave."  ".$this->nombre."  ".$this->rol;
	}
//--------------------------------------------------------------------------------//

//--------------------------------------------------------------------------------//
//--METODO DE CLASE
	public static function TraerPorEmail($email) 
	{
		
		$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
		$consulta = $objetoAccesoDato->RetornarConsulta("SELECT email, clave, nombre, rol FROM usuarios WHERE email = :email");

		$consulta->bindValue(':email', $email, PDO::PARAM_STR);

		$consulta->execute();
		$userBuscado = $consulta->fetchObject('Usuario');
		return $userBuscado;
	}

	public static function TraerTodosLosUsuarios()
	{
		$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso();
		$consulta=$objetoAccesoDato->RetornarConsulta("SELECT email, clave, nombre, rol FROM usuarios");
		$consulta->execute();

		return $consulta->fetchall(PDO::FETCH_CLASS,"Usuario");
	}

	public static function Borrar($email)
	{
		$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso();
		$consulta =$objetoAccesoDato->RetornarConsulta("DELETE FROM usuarios WHERE email = :email");
		$consulta->bindValue(':email', $email, PDO::PARAM_STR);
		$consulta->execute();
		return $consulta->rowCount();
	}

	public static function ImprimirTablaUsuario() {
		$usuarios = Usuario::TraerTodosLosUsuarios();
		
		echo '<div style="padding:10px;">';
		
		echo '<div class="text-center">';		// Tabla de usuarios
		echo "<table>
				<tr>
					<th>Nombre</th>
					<th>Email</th>
					<th>Clave</th>
					<th>Rol</th>
				</tr>";

		foreach ($usuarios as $user) {
			echo  "	<tr>
						<td>".$user->GetNombre()."</td>
						<td>".$user->GetEmail()."</td>
						<td>".$user->GetClave()."</td>
						<td>".$user->GetRol()."</td>
					</tr>";
		}
		echo "</table>
			</div>
		</div>";


	}
//--------------------------------------------------------------------------------//

}