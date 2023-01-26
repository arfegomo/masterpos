<?php

class sucursales extends base{
	
//PROPIEDADES BASE DE DATOS
  private $idsucursal;
  private $idciudad;
  private $nombresucursal;
  private $direccion;
  private $telefono;
  private $barrio;
  
//PROPIEDADES MODELO
  private $table;
  private $Rows;	

//PROPIEDADES DISEÑO
  private $num_error;
  private $evento;	
  private $msg; 
   
public function __construct(){
	$this->base();
	$this->idsucursal = "0";
	$this->idciudad = "0";
	$this->nombresucursal = "";
	$this->direccion = "";
	$this->telefono = "0";
	$this->barrio = "";
	$this->table = "sucursales";
	$this->Rows = 0;
	$this->msg = "";

	date_default_timezone_set("America/Bogota");
	}
	
//SETTERS 

public function set_idsucursal($idsucursal){
	$this->idsucursal = $idsucursal;
	return true;
	}	
public function set_idciudad($idciudad){
	$this->idciudad = $idciudad;
	return true;
	}	
public function set_nombresucursal($nombresucursal){
	$this->nombresucursal = $nombresucursal;
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
public function set_barrio($barrio){
	$this->barrio = $barrio;
	return true;
	}	
	
//FIN SETTERS 

public function get_idsucursal(){
	return $this->idsucursal;
	}  
public function get_idciudad(){
	return $this->idciudad;
	}	
public function get_nombresucursal(){
	return $this->nombresucursal;
	}
public function get_direccion(){
	return $this->direccion;
	}		
public function get_telefono(){
	return $this->telefono;
	}	
public function get_barrio(){
	return $this->barrio;
	}
public function get_Rows(){
	return $this->Rows;
	}
public function get_msg(){
	return $this->msg;
	}	
	
//FIN GETTERS	

public function listarSucursales(){
	
	$sql = "SELECT * FROM {$this->table} ORDER BY nombresucursal ASC";
	$rs = $this->conexion->execute($sql);
	
	$arreglo = array();
	
	while(!$rs->EOF){
		$idsucursal = $rs->fields["idsucursal"];
		$nombresucursal = $rs->fields["nombresucursal"];
		$arreglo[] = array('idsucursal' => $idsucursal, 'nombresucursal' => $nombresucursal);
		$rs->MoveNext();
		} 
	 return $arreglo;	
	}
	
public function store(){
	
	$flag = false;
	$params = array();
	$id = 0;
	
	$params[] = $this->idciudad;
	$params[] = $this->nombresucursal;
	$params[] = $this->direccion;
	$params[] = $this->telefono;
	$params[] = $this->barrio;
	
	$sql ="INSERT INTO {$this->table} (idciudad,nombresucursal,direccion,telefono,barrio)";
	$sql.="VALUES (?,?,?,?,?)";
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
