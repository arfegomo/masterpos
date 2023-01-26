<?php

class tiposterceros extends base{
	
//PROPIEDADES BASE DE DATOS	
  private $idtipotercero;
  private $nombretipotercero;
  
//PROPIEDADES MODELO
  private $table;
  private $Rows;	

//PROPIEDADES DISEÑO
  private $num_error;
  private $evento;	
  private $msg; 
  
public function __construct(){
	$this->base();
	$this->idtipotercero = "0";
	$this->nombretipotercero = "";
	$this->table = "tiposterceros";
	$this->Rows = 0;
	$this->msg = "";

	date_default_timezone_set("America/Bogota");
	}      
     
//SETTERS   
   
public function set_idtipotercero($idtipotercero){
	$this->idtipotercero = $idtipotercero;
	return true;
	}  
public function set_nombretipotercero($nombretipotercero){
	$this->nombretipotercero = $nombretipotercero;
	return true;
	}	 
//FIN SETTERS 

//GETTERS	

public function get_idtipotercero(){
	return $this->idtipotercero;
	}
public function get_nombretipotercero(){
	return $this->nombretipotercero;
	}	
public function get_Rows(){
	return $this->Rows;
	}
public function get_msg(){
	return $this->msg;
	}	
//FIN GETTERS	
	
 public function listado_tiposterceros(){
	 
	 $sql = "SELECT * FROM {$this->table} ORDER BY nombretipotercero ASC";
	 $rs = $this->conexion->execute($sql);
	 
	 $arreglo = array();
	 
	 while(!$rs->EOF){
		 $idtipotercero = $rs->fields["idtipotercero"];
		 $nombretipotercero = $rs->fields["nombretipotercero"];
		 $arreglo[] = array('idtipotercero' => $idtipotercero, 'nombretipotercero' => $nombretipotercero);
		 $rs->MoveNext();
		 }
	   return $arreglo;	 
	 }
	 
public function store(){
	
	$flag = false;
	$params = array();
	$id = 0; 
	
	$params[] = $this->nombretipotercero;
	
	$sql ="INSERT INTO {$this->table} (nombretipotercero)";
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
