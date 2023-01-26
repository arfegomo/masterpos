<?php

class tipodocumento extends base{
	
//PROPIEDADES BASE DE DATOS
  private $idtipodocumento;
  private $nombretipodocumento;
  
//PROPIEDADES MODELO
  private $table;
  private $Rows;	

//PROPIEDADES DISEÑO
  private $num_error;
  private $evento;	
  private $msg;  	
		
public function __construct(){
	$this->base();
	$this->idtipodocumento = "0";
	$this->nombretipodocumento = "";
	$this->table = "tipodocumento";
	$this->Rows = 0;
	$this->msg = "";

	date_default_timezone_set("America/Bogota");
	}	
		
//SETTERS 

public function set_idtipodocumento($idtipodocumento){
	$this->idtipodocumento = $idtipodocumento;
	return true;
	}
public function set_nombretipodocumento($nombretipodocumento){
	$this->nombretipodocumento = $nombretipodocumento;
	return true;
	}	
//FIN SETTERS 

//GETTERS

public function get_idtipodocumento(){
	return $this->idtipodocumento;
	}	
public function get_nombretipodocumento(){
	return $this->nombretipodocumento;
	}
public function get_Rows(){
	return $this->Rows;
	}
public function get_msg(){
	return $this->msg;
	}	
//FIN GETTERS


public function listado_tipodocumento(){
	
	$sql = "SELECT * FROM {$this->table} ORDER BY nombretipodocumento ASC";
	$rs = $this->conexion->execute($sql);
	
	$arreglo = array();
	
	while(!$rs->EOF){
		$idtipodocumento = $rs->fields["idtipodocumento"];
		$nombretipodocumento = $rs->fields["nombretipodocumento"];
		$arreglo[] = array('idtipodocumento' => $idtipodocumento, 'nombretipodocumento' => $nombretipodocumento);
		$rs->MoveNext();
		}
	 return $arreglo;	
	}
	
public function store(){
	
	$flag = false;
	$params = array();
	$id = 0;
	
	$params[] = $this->nombretipodocumento;
	
	$sql ="INSERT INTO {$this->table} (nombretipodocumento)";
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
