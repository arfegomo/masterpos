<?php

class clasificacion1 extends base{

//PROPIEDADES BASE DE DATOS
  private $idclasificacion1;
  private $nombreclasificacion1;
  
//PROPIEDADES MODELO
  private $table;
  private $Rows;	

//PROPIEDADES DISEÑO
  private $num_error;
  private $evento;	
  private $msg; 
   
public function __construct(){
	$this->base();
	$this->idclasificacion1 = "0";
	$this->nombreclasificacion1 = "";
	$this->table = "clasificacion1";
	$this->Rows = 0;
	$this->msg = "";

	date_default_timezone_set("America/Bogota");
	} 
		
//SETTERS

public function set_idclasificacion1($idclasificacion1){
	$this->idclasificacion1 = $idclasificacion1;
	return true;	
	}	   	
public function set_nombreclasificacion1($nombreclasificacion1){
	$this->nombreclasificacion1 = $nombreclasificacion1;
	return true;
	}
		
//FIN SETTERS	
	
// GETTERS
public function get_idclasificacion1(){
	return $this->idclasificacion1;
    }
public function get_nombreclasificacion1(){
	return $this->nombreclasificacion1;
	}	
public function get_Rows(){
	return $this->Rows;
	}
public function get_msg(){
	return $this->msg;
	}	
	
//FIN GETTERS

public function listado_clasificacion1(){
	
	$sql = "SELECT * FROM {$this->table} ORDER BY nombreclasificacion1 ASC";
	$rs = $this->conexion->execute($sql);
	
	$arreglo = array();
	
	while(!$rs->EOF){
		$nombreclasificacion1 = $rs->fields["nombreclasificacion1"];
		$idclasificacion1 = $rs->fields["idclasificacion1"];
		$arreglo[] = array('nombreclasificacion1' => $nombreclasificacion1, 'idclasificacion1' => $idclasificacion1);
		$rs->MoveNext();
		}
	return $arreglo;
	}	
	
public function store(){
	
	$flag = false;
	$params = array();
	$id = 0;
	
	
	$params[] = $this->nombreclasificacion1;
	
	$sql ="INSERT INTO {$this->table} (nombreclasificacion1)";			
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
