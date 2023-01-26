<?php

class clasificacion2 extends base{

//PROPIEDADES BASE DE DATOS
  private $idclasificacion2;
  private $nombreclasificacion2;
  
//PROPIEDADES MODELO
  private $table;
  private $Rows;	

//PROPIEDADES DISEÑO
  private $num_error;
  private $evento;	
  private $msg; 
   
public function __construct(){
	$this->base();
	$this->idclasificacion2 = "0";
	$this->nombreclasificacion2 = "";
	$this->table = "clasificacion2";
	$this->Rows = 0;
	$this->msg = "";

	date_default_timezone_set("America/Bogota");
	} 
	
//SETTERS

public function set_idclasificacion2($idclasificacion2){
	$this->idclasificacion2 = $idclasificacion2;
	return true;	
	}	   	
public function set_nombreclasificacion2($nombreclasificacion2){
	$this->nombreclasificacion2 = $nombreclasificacion2;
	return true;
	}
		
//FIN SETTERS	
		
// GETTERS
public function get_idclasificacion2(){
	return $this->idclasificacion2;
    }
public function get_nombreclasificacion2(){
	return $this->nombreclasificacion2;
	}	
public function get_Rows(){
	return $this->Rows;
	}
public function get_msg(){
	return $this->msg;
	}	
	
//FIN GETTERS

public function listado_clasificacion2(){
	
	$sql = "SELECT * FROM {$this->table} ORDER BY nombreclasificacion2 ASC";
	$rs = $this->conexion->execute($sql);
	
	$arreglo = array();
	
	while(!$rs->EOF){
		$nombreclasificacion2 = $rs->fields["nombreclasificacion2"];
		$idclasificacion2 = $rs->fields["idclasificacion2"];
		$arreglo[] = array('nombreclasificacion2' => $nombreclasificacion2, 'idclasificacion2' => $idclasificacion2);
		$rs->MoveNext();
		}
	return $arreglo;
	}
	
public function store(){
	
	$flag = false;
	$params = array();
	$id = 0;
	
	
	$params[] = $this->nombreclasificacion2;
	
	$sql ="INSERT INTO {$this->table} (nombreclasificacion2)";			
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
