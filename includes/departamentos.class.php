<?php

class departamentos extends base{

//PROPIEDADES BASE DE DATOS
  private $iddepartamento;
  private $nombredepartamento;
  
//PROPIEDADES MODELO
  private $table;
  private $Rows;	

//PROPIEDADES DISEÑO
  private $num_error;
  private $evento;	
  private $msg;
   
public function __construct(){
	$this->base();
	$this->iddepartamento = "0";
    $this->nombredepartamento = "";
	$this->table = "departamentos";
	$this->Rows = 0;
	$this->msg = "";

	date_default_timezone_set("America/Bogota");
	}  
		
//SETTERS

public function set_iddepartamento($iddepartamento){
	$this->iddepartamento = $iddepartamento;
	return true;
	}
public function set_nombredepartamento($nombredepartamento){
	$this->nombredepartamento = $nombredepartamento;
	return true;
	}
			
//FIN SETTERS

//GETTERS

public function get_iddepartamento(){
	return $this->iddepartamento;
	}   
public function get_nombredepartamento(){
	return $this->nombredepartamento;
	}	
public function get_Rows(){
	return $this->Rows;
	}
public function get_msg(){
	return $this->msg;
	}
		
//FIN GETTERS

public function listado_departamentos(){
	
	$sql = "SELECT * FROM {$this->table} ORDER BY nombredepartamento ASC";
	$rs = $this->conexion->execute($sql);
	
	$arreglo = array();
	
	while(!$rs->EOF){
		$iddepartamento = $rs->fields["iddepartamento"];
		$nombredepartamento = $rs->fields["nombredepartamento"];
		$arreglo[] = array('iddepartamento' => $iddepartamento, 'nombredepartamento' => $nombredepartamento);
		$rs->MoveNext();
		}
	  return $arreglo;	
	}

public function store(){
	
	$flag = false;
	$params = array();
	$id = 0;
	
	$params[] = $this->nombredepartamento;
	
	$sql ="INSERT INTO {$this->table} (nombredepartamento)";			
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