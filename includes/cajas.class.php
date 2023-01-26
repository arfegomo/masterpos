<?php

class cajas extends base{
	
//PROPIEDADES BASE DE DATOS
  private $idcaja;
  private $idsusucrsal;
  
 //PROPIEDADES MODELO
  private $table;
  private $Rows;	

//PROPIEDADES DISEÑO
  private $num_error;
  private $evento;	
  private $msg; 	
		
public function __construct(){
	$this->base();
	$this->idcaja = 0;
	$this->idsucursal = 0;
	$this->table = "cajas";
	$this->Rows = 0;
	$this->msg = "";

	date_default_timezone_set("America/Bogota");
	}	
	
//SETTERS

public function set_idcaja($idcaja){
	$this->idcaja = $idcaja;
	return true;	
	}
public function set_idsucursal($idsucursal){
	$this->idsucursal = $idsucursal;
	return true;	
	}
		
//FIN SETTERS

// GETTERS

public function get_idcaja(){
	return $this->idcaja;
    }
public function get_idsucursal(){
	return $this->idsucursal;
    }	
public function get_Rows(){
	return $this->Rows;
	}
public function get_msg(){
	return $this->msg;
	}	
	
//FIN GETTERS

public function listado_cajas(){
	
	$sql = "SELECT * FROM {$this->table} ORDER BY idcaja ASC";
	$rs = $this->conexion->execute($sql);
	
	$arreglo = array();
	
	while(!$rs->EOF){
		$idcaja = $rs->fields["idcaja"];
		$arreglo[] = array('idcaja' => $idcaja);
		$rs->MoveNext();
		}
	return $arreglo;
	
	}	

public function listarCajasSucursal(){
	
	$sql = "SELECT idcaja FROM cajasucursales WHERE idsucursal = {$this->idsucursal}";
	$rs = $this->conexion->execute($sql);
	
	$arreglo = array();
	
	while(!$rs->EOF){
		$idcaja = $rs->fields["idcaja"];
		$arreglo[] = array('idcaja' => $idcaja);
		$rs->MoveNext();
		} 
	 return $arreglo;	
	}
	
public function store(){
	
	$flag = false;
	$params = array();
	$id = 0;
	
	
	$params[] = $this->idcaja;
	
	$sql ="INSERT INTO {$this->table} (idcaja)";			
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

// FIN CLASE

?>