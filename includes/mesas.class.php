<?php

class mesas extends base{
	
//PROPIEDADES BASE DE DATOS
  private $idmesa;
  private $estado;
  private $persona;
  
 //PROPIEDADES MODELO
  private $table;
  private $Rows;	

//PROPIEDADES DISEÑO
  private $num_error;
  private $evento;	
  private $msg; 	
		
public function __construct(){
	$this->base();
	$this->idmesa = 0;
	$this->estado = 0;
	$this->mesa = "";
	$this->table = "mesas";
	$this->Rows = 0;
	$this->msg = "";
	$this->persona = "";

	date_default_timezone_set("America/Bogota");
	}	
	
//SETTERS

public function set_idmesa($idmesa){
	$this->idmesa = $idmesa;
	return true;	
	}		

public function set_estado($estado){
	$this->estado = $estado;
	return true;	
	}

public function set_persona($persona){
	$this->persona = $persona;
	return true;	
	}		
//FIN SETTERS

// GETTERS

public function get_idmesa(){
	return $this->idmesa;
    }
public function get_estado(){
	return $this->estado;
    }
public function get_Rows(){
	return $this->Rows;
	}
public function get_msg(){
	return $this->msg;
	}
public function get_persona(){
	return $this->persona;
	}	
	
//FIN GETTERS

public function listado_mesas(){
	
	$sql = "SELECT * FROM {$this->table} ORDER BY idmesa ASC";
	$rs = $this->conexion->execute($sql);
	
	$arreglo = array();
	
	while(!$rs->EOF){
		$idmesa = $rs->fields["idmesa"];
		$estado = $rs->fields["estado"];
		$persona = $rs->fields["persona"];
		$arreglo[] = array('idmesa' => $idmesa, 'estado' => $estado, 'persona' => $persona);
		$rs->MoveNext();
		}
	return $arreglo;
	
	}

public function mesasOcupadas(){
	
	$sql = "SELECT * FROM {$this->table} WHERE estado = 1 ORDER BY idmesa ASC";
	$rs = $this->conexion->execute($sql);
	
	$arreglo = array();
	
	while(!$rs->EOF){
		$idmesa = $rs->fields["idmesa"];
		$estado = $rs->fields["estado"];
		$persona = $rs->fields["persona"];
		$arreglo[] = array('idmesa' => $idmesa, 'estado' => $estado, 'persona' => $persona);
		$rs->MoveNext();
		}
	return $arreglo;
	
	}	

public function mesasLibres(){
	
	$sql = "SELECT * FROM {$this->table} WHERE estado = 0 ORDER BY idmesa ASC";
	$rs = $this->conexion->execute($sql);
	
	$arreglo = array();
	
	while(!$rs->EOF){
		$idmesa = $rs->fields["idmesa"];
		$estado = $rs->fields["estado"];
		$persona = $rs->fields["persona"];
		$arreglo[] = array('idmesa' => $idmesa, 'estado' => $estado, 'persona' => $persona);
		$rs->MoveNext();
		}
	return $arreglo;
	
	}	

public function queryMesa($mesa){
	
	$sql = "SELECT estado FROM {$this->table} WHERE idmesa = {$mesa}";
	$rs = $this->conexion->execute($sql);
	
	$arreglo = array();
	
	while(!$rs->EOF){
		$estado = $rs->fields["estado"];
		$arreglo[] = $estado;
		$rs->MoveNext();
		}
	return $arreglo;
	
	}	

public function estadoAbierta(){

	$flag = false;
	$params = array();
	$id = 0;

	$params[] = $this->estado;
	//$params[] = $this->persona;

	$sql ="UPDATE {$this->table} SET estado=? ";	
	$sql.="WHERE idmesa = {$this->idmesa}";

	$this->conexion->StartTrans();
	$this->conexion->execute($sql,$params);
	$flag = $this->conexion->CompleteTrans();

	if ($flag){
		return 1;
	}
		return 2;
  }

  public function limpiarmesa(){

	$flag = false;
	$params = array();
	$id = 0;

	$params[] = $this->persona;

	$sql ="UPDATE {$this->table} SET persona=? ";	
	$sql.="WHERE idmesa = {$this->idmesa}";

	$this->conexion->StartTrans();
	$this->conexion->execute($sql,$params);
	$flag = $this->conexion->CompleteTrans();

	if ($flag){
		return 1;
	}
		return 2;
  }

 public function store(){

	$flag = false;
	$params = array();
	$id = 0;

	$params[] = $this->persona;

	$sql ="UPDATE {$this->table} SET persona=? ";	
	$sql.="WHERE idmesa = {$this->idmesa}";

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