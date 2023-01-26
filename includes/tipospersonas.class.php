<?php

class tipospersonas extends base{
	
//PROPIEDADES BASE DE DATOS 
  private $idtipopersona;
  private $nombretipopersona;
   
//PROPIEDADES MODELO
  private $table;
  private $Rows;	

//PROPIEDADES DISEÑO
  private $num_error;
  private $evento;	
  private $msg;	
		
public function __construct(){
	$this->base();
	$this->idtipopersona = "0";
	$this->nombretipoperosna = "";
	$this->table = "tipospersonas";
	$this->Rows = 0;
	$this->msg = "";

	date_default_timezone_set("America/Bogota");
	}	
	
//SETTERS

public function set_idtipopersona($idtipopersona){
	$this->idtipopersona = $idtipopersona;
	return true;
	}	
public function set_nombretipopersona($nombretipopersona){
	$this->nombretipopersona = $nombretipopersona;
	return true;
	}	
//FIN SETTERS 

//GETTERS

public function get_idtipopersona(){
	return $this->idtipopersona;
	}	
public function get_nombretipopersona(){
	return $this->nombretipopersona;
	}
public function get_Rows(){
	return $this->Rows;
	}
public function get_msg(){
	return $this->msg;
	}	
//FIN GETTERS	

public function listado_tipospersonas(){
	
    $sql = "SELECT * FROM {$this->table} ORDER BY nombretipopersona ASC";
	$rs = $this->conexion->execute($sql);
	
	$arreglo = array();
	
	while(!$rs->EOF){
		$idtipopersona = $rs->fields["idtipopersona"];
		$nombretipopersona = $rs->fields["nombretipopersona"];
		$arreglo[] = array('idtipopersona' => $idtipopersona, 'nombretipopersona' => $nombretipopersona);
		$rs->MoveNext();
		}
	  return $arreglo;	
	}

public function store(){
	
	$flag = false;
	$params = array();
	$id = 0;
	
	$params[] = $this->nombretipopersona;
	
	$sql ="INSERT INTO {$this->table} (nombretipopersona)";
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