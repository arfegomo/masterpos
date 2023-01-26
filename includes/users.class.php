<?php

class users extends base{
	
//PROPIEDADES BASE DE DATOS
  private $id;
  private $nombres;
  private $email;
  private $created_at;
  private $updated_at;
  private $idgenero;
  private $documento;
  private $apellidos;
  private $fechanacimiento;
  private $direccion;
  private $telefonofijo;
  private $celular;
  private $active;
  private $usuario;
  private $password;  

//PROPIEDADES MODELO
  private $table;
  private $Rows;

//PROPIEDADES DISEÑO
  private $num_error;
  private $evento;	
  private $msg;
		
public function __construct(){
	$this->base();
	$this->id = 0;
	$this->nombres = "";
	$this->email = "";
	$this->created_at = "";
	$this->updated_at = "";
	$this->idgenero = 0;
	$this->documento = "";
	$this->apellidos = "";
	$this->fechanacimiento = "";
	$this->direccion = "";
	$this->telefonofijo = "";
	$this->celular = "";
	$this->active = "";
	$this->usuario = "";
	$this->table = "users";
	$this->Rows = 0;
	$this->msg = "";

	date_default_timezone_set("America/Bogota");
    }

//SETTERS

public function set_id($id){
	$this->id = $id;
	return true;
    }
public function set_nombres($nombres){
	$this->nombres = $nombres;
	return true;
    }
public function set_email($email){
	$this->email = $email;
	return true;
    }
public function set_created_at($created_at){
	$this->created_at = $created_at;
	return true;
    }
public function set_idgenero($idgenero){
	$this->idgenero = $idgenero;
	return true;
    }
public function set_documento($documento){
	$this->documento = $documento;
	return true;
    }
public function set_apellidos($apellidos){
	$this->apellidos = $apellidos;
	return true;
    }
public function set_updated_at($updated_at){
	$this->updated_at = $updated_at;
	return true;
    }
public function set_fechanacimiento($fechanacimiento){
	$this->fechanacimiento = $fechanacimiento;
	return true;
    }
public function set_direccion($direccion){
	$this->direccion = $direccion;
	return true;
    }
public function set_telefonofijo($telefonofijo){
	$this->telefonofijo = $telefonofijo;
	return true;
    }
public function set_celular($celular){
	$this->celular = $celular;
	return true;
    }
public function set_active($active){
	$this->active = $active;
	return true;
    }
public function set_usuario($usuario){
	$this->usuario = $usuario;
	return true;
    }
public function set_password($password){
	$this->password = $password;
	return true;
    }

//FIN SETTERS

//GETTERS

public function get_id(){
	return $this->id;
    }
public function get_nombres(){
	return $this->nombres;
    }
public function get_email(){
	return $this->email;
    }
public function get_created_at(){
	return $this->created_at;
    }
public function get_updated_at(){
	return $this->updated_at;
    }
public function get_idgenero(){
	return $this->idgenero;
    }
public function get_documento(){
	return $this->documento;
    }
public function get_apellidos(){
	return $this->apellidos;
    }
public function get_fechanacimiento(){
	return $this->fechanacimiento;
    }
public function get_direccion(){
	return $this->direccion;
    }
public function get_telefonofijo(){
	return $this->telefonofijo;
    }
public function get_celular(){
	return $this->celular;
    }
public function get_active(){
	return $this->active;
    }
public function get_usuario(){
	return $this->usuario;
    }
public function get_Rows(){
	return $this->Rows;
    }
public function get_password(){
	return $this->password;
    }
	
//FIN GETTERS

//Funcion retorna un informacion de permisos parea ingresar al sistema

public function permite_ingreso(){

	$arreglo = array();
	$sql = "SELECT count(*) as val, id FROM {$this->table} WHERE usuario='{$this->usuario}' AND                   password='{$this->password}'";         

	$rs = $this->conexion->execute($sql);
    $val = $rs->fields["val"];
    $id = $rs->fields["id"];
	return $arreglo[] = array("val" => $val, "id" => $id);
}

public function listarUsuarios(){

	$sql = "SELECT documento,nombres,apellidos,email FROM {$this->table} ORDER BY nombres ASC";
	$rs = $this->conexion->execute($sql);
	
	$arreglo = array();
	while(!$rs->EOF){
		$id = $rs->fields["documento"];
		$nombres = $rs->fields["nombres"];
		$apellidos = $rs->fields["apellidos"];
		$email = $rs->fields["email"];
		$arreglo[] = array('id' => $id,'nombres' => $nombres,'apellidos' => $apellidos, 'email' => $email);
		$rs->MoveNext();
}
 return $arreglo;
}

public function store(){

	$flag = false;
	$params = array();
	$id = 0;

	$params[] = $this->nombres;
	$params[] = $this->email;
	$params[] = $this->password;
	$params[] = $this->created_at;
	$params[] = $this->updated_at;
	$params[] = $this->idgenero;
	$params[] = $this->usuario;
	$params[] = $this->documento;
	$params[] = $this->apellidos;
	$params[] = $this->fechanacimiento;
	$params[] = $this->direccion;
	$params[] = $this->telefonofijo;
	$params[] = $this->celular;
	$params[] = $this->active;	

	$sql = "INSERT INTO {$this->table} (nombres,email, ";
	$sql.="password,created_at,updated_at,idgenero,usuario,documento,apellidos,fechanacimiento,direccion, ";			
	$sql.="telefonofijo,celular,active) ";	
	$sql.= "VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
	$this->conexion->StartTrans();
    $this->conexion->execute($sql,$params);
	$flag = $this->conexion->CompleteTrans();


	if ($flag){
		return 1;
	}
		return 2;
}

public function load(){

	$sql = "SELECT * FROM {$this->table} WHERE id = {$this->id}";
	$rs = $this->conexion->execute($sql);
	$arreglo = array();

	while(!$rs->EOF){

		$documento = $rs->fields["documento"];
		$nombres = $rs->fields["nombres"];
		$apellidos = $rs->fields["apellidos"];
		$direccion = $rs->fields["direccion"];
		$telefonofijo = $rs->fields["telefonofijo"];
		$celular = $rs->fields["celular"];
		$usuario = $rs->fields["usuario"];
		$idgenero = $rs->fields["idgenero"];
		$password = $rs->fields["password"];
		$fechanacimiento = $rs->fields["fechanacimiento"];
		$active = $rs->fields["active"];
		$email = $rs->fields["email"];

 $arreglo[$documento] = array('documento' => $documento,'nombres' => $nombres,'apellidos' => $apellidos, 'email' =>   $email, 'direccion' => $direccion, 'telefonofijo' => $telefonofijo, 'celular' => $celular, 'usuario' => $usuario,   'idgenero' => $idgenero, 'password' => $password, 'fechanacimiento' =>$fechanacimiento, 'active' => $active);

    $rs->MoveNext();

	}

	return $arreglo;
}

public function update(){

	$flag = false;
	$params = array();
	$id = 0;

	$params[] = $this->nombres;
	$params[] = $this->email;
	$params[] = $this->password;
	$params[] = $this->updated_at;
	$params[] = $this->idgenero;
	$params[] = $this->usuario;
	$params[] = $this->documento;
	$params[] = $this->apellidos;
	$params[] = $this->fechanacimiento;
	$params[] = $this->direccion;
	$params[] = $this->telefonofijo;
	$params[] = $this->celular;
	$params[] = $this->active;	

	$sql = "UPDATE {$this->table} SET nombres=(?),email=(?), ";
	$sql.="password=(?),updated_at=(?),idgenero=(?),usuario=(?),documento=(?),apellidos=(?),fechanacimiento=(?),direccion=(?), ";			
	$sql.="telefonofijo=(?),celular=(?),active=(?) ";	
	$sql.="WHERE documento = {$this->documento}";
	$this->conexion->StartTrans();
	$this->conexion->execute($sql,$params);
	$flag = $this->conexion->CompleteTrans();

	if ($flag){
		return 1;
	}
		return 2;
  }		

public function delete(){
	
	$flag = false;
	$id = 0;
	
	$sql ="DELETE FROM {$this->table} ";
	$sql.="WHERE documento = {$this->documento}";
	$this->conexion->StartTrans();
	$this->conexion->execute($sql);
	$flag = $this->conexion->CompleteTrans();
	
	if ($flag){
		return 1;
	}
		return 2;
 	
	}

}

//Fin de la Clase

?>