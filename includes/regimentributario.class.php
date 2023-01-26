<?php

class regimentributario extends base{
	
//PROPIEDADES BASE DE DATOS 
  private $idregimentributario;
  private $nombreregimentributario;
  
//PROPIEDADES MODELO
  private $table;
  private $Rows;	

//PROPIEDADES DISEÑO
  private $num_error;
  private $evento;	
  private $msg;  	
	
public function __construct(){
	$this->base();
	$this->idregimentributario = "0";
	$this->nombreregimentributario = "";
	$this->table = "regimentributario";
	$this->Rows = 0;
	$this->msg = "";

	date_default_timezone_set("America/Bogota");
	}	
		
//SETTERS 

public function set_idregimentributario($idregimentributario){
	$this->idregimentributario = $idregimentributario;
	return true;
	}
public function set_nombreregimentributario($nombreregimentributario){
	$this->nombreregimentributario = $nombreregimentributario;
	return true;
	}	
		
//FIN SETTERS 

//GETTERS 

public function get_idregimentributario(){
	return $this->idregimentributario;
	}	
public function get_nombreregimentributario(){
	return $this->nombreregimentributario;
	}
public function get_Rows(){
	return $this->Rows;
	}
public function get_msg(){
	return $this->msg;
	}
				
//FIN GETTERS

public function listado_regimentributario(){
	
	$sql = "SELECT * FROM {$this->table} ORDER BY nombreregimentributario ASC";
	$rs = $this->conexion->execute($sql);
	
	
	$arreglo = array();
	
	while(!$rs->EOF){
		$idregimentributario = $rs->fields["idregimentributario"];
		$nombreregimentributario = $rs->fields["nombreregimentributario"];
		$arreglo[] = array('idregimentributario' => $idregimentributario, 'nombreregimentributario' => $nombreregimentributario);
		$rs->MoveNext();
		}
	return $arreglo;
	}
	
public function store(){
	
	$flag = false;
	$params = array();
	$id = 0;
	
	$params[] = $this->nombreregimentributario;
	
	$sql ="INSERT INTO {$this->table} (nombreregimentributario)";
	$sql.="VALUES (?)";
	$this->conexion->StartTrans();
    $this->conexion->execute($sql,$params);
	$flag = $this->conexion->CompleteTrans();
	
	if ($flag){
		return 1;
	}
		return 2;
	
	}  	
		
}

//FIN CLASE

?>