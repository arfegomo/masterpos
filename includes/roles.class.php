<?php

class roles extends base{
	
//PROPIEDADES BASE DE DATOS
  private $id;
  private $name;
  private $display_name;
  private $descripcion;
  
//PROPIEDADES MODELO
  private $table;
  private $Rows;	

//PROPIEDADES DISEÑO
  private $num_error;
  private $evento;	
  private $msg;
  
public function __construct(){
	$this->base();
	$this->id = "0";
	$this->name = "";
	$this->display_name = "";
	$this->descripcion = "";
	$this->table = "roles";
	$this->Rows = 0;
	$this->msg = "";

	date_default_timezone_set("America/Bogota");
	}  
	 		
//SETTERS

public function set_id($id){
	$this->id = $id;
	return true;	
	}
public function set_name($name){
	$this->name = $name;
	return true;
	}			
public function set_display_name($display_name){
	$this->display_name = $display_name;
	return true;
	}
public function set_descripcion($descripcion){
	$this->descripcion = $descripcion;
	return true;
	}
	
//FIN SETTERS			

// GETTERS

public function get_id(){
	return $this->id;
    }
public function get_name(){
	return $this->name;
	}		
public function get_display_name(){
	return $this->display_name;
	}	
public function get_descripcion(){
	return $this->descripcion;
	}	
public function get_Rows(){
	return $this->Rows;
	}
public function get_msg(){
	return $this->msg;
	}
		
//FIN GETTERS

public function listado_roles(){
	
	$sql = "SELECT * FROM {$this->table} ORDER BY display_name ASC";
	$rs = $this->conexion->execute($sql);
	
    $arreglo = array();
	
	while(!$rs->EOF){
		$id = $rs->fields["id"];
		$display_name = $rs->fields["display_name"];
		$arreglo[] = array('id' => $id,'display_name' => $display_name);
		$rs->MoveNext();
		}
	return $arreglo;
		 
	}
	
}

// FIN CLASE

?>