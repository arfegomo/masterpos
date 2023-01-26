<?php

class ciudades extends base{
	
//PROPIEDADES BASE DE DATOS	
  private $idciudad;	
  private $iddepartamento;	
  private $nombreciudad;
  	
//PROPIEDADES MODELO
  private $table;
  private $Rows;	

//PROPIEDADES DISEÑO
  private $num_error;
  private $evento;	
  private $msg; 
  
public function __construct(){
	$this->base();
	$this->idciudad = "0";
	$this->iddepartamento = "0";
	$this->nombreciudad = "";
	$this->table = "ciudades";
	$this->Rows = 0;
	$this->msg = "";

	date_default_timezone_set("America/Bogota");
	}   	

//SETTERS

public function set_idciudad($idciudad){
	$this->idciudad = $idciudad;
	return true;	
	}
public function set_iddepartamento($iddepartamento){
	$this->iddepartamento = $iddepartamento;
	return true;
	}
public function set_nombreciudad($nombreciudad){
	$this->nombreciudad = $nombreciudad;
	return true;
	}
				
//FIN SETTERS

// GETTERS

public function get_idciudad(){
	return $this->idciudad;
    }
public function get_iddepartamento(){
	return $this->iddepartamento;
	}
public function get_nombreciudad(){
	return $this->nombreciudad;
	}			
public function get_Rows(){
	return $this->Rows;
	}
public function get_msg(){
	return $this->msg;
	}
		
//FIN GETTERS

public function listado_ciudades(){
	
	$sql = "SELECT * FROM {$this->table} ORDER BY nombreciudad ASC";
	$rs = $this->conexion->execute($sql);
	
	$arreglo = array();
	
	while(!$rs->EOF){
		$idciudad = $rs->fields["idciudad"];
		$nombreciudad = $rs->fields["nombreciudad"];
		$arreglo[] = array('idciudad' => $idciudad, 'nombreciudad' => $nombreciudad);
		$rs->MoveNext();
		}
	return $arreglo;
	}
	
public function store(){
	
	$flag = false;
	$params = array();
	$id = 0;
	
	$params[] = $this->iddepartamento;
	$params[] = $this->nombreciudad;
	
	$sql ="INSERT INTO {$this->table} (iddepartamento,nombreciudad)";			
	$sql.="VALUES (?,?)";
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
