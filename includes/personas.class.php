<?php

class personas extends base{
//PROPIEDADES BASE DE DATOS	
  private $documento;	
  private $nombres;
  private $email;
  private $created_at;
  private $updated_at;
  private $apellidos;
  private $direccion;
  private $telefono;
  private $celular;
  private $idgenero;

//PROPIEDADES MODELO
  private $table;
  private $Rows;	

//PROPIEDADES DISEÑO
  private $num_error;
  private $evento;	
  private $msg; 

public function __construct(){
	$this->base();
	$this->documento = "";
	$this->nombres = "";
	$this->apellidos = "";
	$this->email = "";
	$this->created_at = "";
	$this->updated_at = "";
	$this->idgenero = 0;
	$this->direccion = "";
	$this->telefono = "";
	$this->celular = "";
	$this->table = "personas";
	$this->Rows = 0;
	$this->msg = "";

	date_default_timezone_set("America/Bogota");
	}   	

//SETTERS

public function set_documento($documento){
	$this->documento = $documento;
	return true;	
	}
public function set_nombres($nombres){
	$this->nombres = $nombres;
	return true;
	}
public function set_apellidos($apellidos){
	$this->apellidos = $apellidos;
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
public function set_updated_at($updated_at){
	$this->updated_at = $updated_at;
	return true;
    }
public function set_direccion($direccion){
	$this->direccion = $direccion;
	return true;
    }
public function set_telefono($telefono){
	$this->telefono = $telefono;
	return true;
    }
public function set_celular($celular){
	$this->celular = $celular;
	return true;
    }
//FIN SETTERS

// GETTERS

public function get_documento(){
	return $this->documento;
    }
public function get_nombres(){
	return $this->nombres;
	}
public function get_apellidos(){
	return $this->apellidos;
	}
public function get_email(){
	return $this->email;
	}				
public function get_Rows(){
	return $this->Rows;
	}
public function get_msg(){
	return $this->msg;
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
public function get_direccion(){
	return $this->direccion;
    }
public function get_telefono(){
	return $this->telefono;
    }
public function get_celular(){
	return $this->celular;
    }
//FIN GETTERS

public function listado_personas(){

	$sql = "SELECT * FROM {$this->table} ORDER BY apellidos ASC";
	$rs = $this->conexion->execute($sql);

	$arreglo = array();

	while(!$rs->EOF){
		$nombres = $rs->fields["nombres"];
		$email = $rs->fields["email"];
		$arreglo[] = array('nombres' => $nombres,'email' => $email);
		$rs->MoveNext();
		}
	return $arreglo;
	
  }

public function autocompletar($q){

	$sql ="SELECT nombres,apellidos,documento FROM {$this->table} WHERE nombres like '%$q%' ";
	$sql.="OR apellidos like '%$q%'";
	$rs = $this->conexion->execute($sql);
	
	return $rs;
  }

public function store(){

	$flag = false;
	$params = array();
	$id = 0;

	$params[] = $this->nombres;
	$params[] = $this->email;
	$params[] = $this->created_at;
	$params[] = $this->updated_at;
	$params[] = $this->idgenero;
	$params[] = $this->documento;
	$params[] = $this->apellidos;
	$params[] = $this->direccion;
	$params[] = $this->telefono;
	$params[] = $this->celular;	

	$sql = "INSERT INTO {$this->table} (nombres,email, ";
	$sql.="created_at,updated_at,idgenero,documento,apellidos,direccion, ";			
	$sql.="telefono,celular) ";	
	$sql.= "VALUES (?,?,?,?,?,?,?,?,?,?)";
	$this->conexion->StartTrans();
    $this->conexion->execute($sql,$params);
	$flag = $this->conexion->CompleteTrans();


	if ($flag){
		return 1;
	}
		return 2;
}

}//FIN CLASE

?>

