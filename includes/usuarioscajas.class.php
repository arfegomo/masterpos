<?php

class usuarioscajas extends base{
	
//PROPIEDADES BASE DE DATOS	
  private $id;	
  private $idcaja;	
  private $idsucursal;
  	
//PROPIEDADES MODELO
  private $table;
  private $Rows;	

//PROPIEDADES DISEÑO
  private $num_error;
  private $evento;	
  private $msg; 
  
public function __construct(){
	$this->base();
	$this->id = 0;
	$this->idcaja = 0;
	$this->idsucursal = 0;
	$this->table = "usuarioscajas";
	$this->Rows = 0;
	$this->msg = "";

	date_default_timezone_set("America/Bogota");
	}   	

//SETTERS

public function set_id($id){
	$this->id = $id;
	return true;	
	}
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

public function get_id(){
	return $this->id;
    }
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

public function listado_ciudades(){
	
	$sql = "SELECT * FROM {$this->table} ORDER BY idsucursal ASC";
	$rs = $this->conexion->execute($sql);
	
	$arreglo = array();
	
	while(!$rs->EOF){
		$id = $rs->fields["id"];
		$idsucursal = $rs->fields["idsucursal"];
		$arreglo[] = array('id' => $id, 'idsucursal' => $idsucursal);
		$rs->MoveNext();
		}
	return $arreglo;
	}

public function permite_ingreso(){
	
    $arreglo = array();
	
    $sql ="SELECT count(*) AS val, usrcaja.idcaja, usrcaja.idsucursal, usrcaja.id, rolusr.role_id ";
    $sql.="FROM {$this->table} as usrcaja ";
    $sql.="INNER JOIN users as usr ON usrcaja.id = usr.id ";
    $sql.="INNER JOIN role_user as rolusr ON usr.id = rolusr.user_id ";
    $sql.="WHERE usrcaja.id={$this->id} ";
    $sql.="AND usrcaja.idsucursal={$this->idsucursal} AND usrcaja.idcaja = {$this->idcaja}";
    $rs = $this->conexion->execute($sql);
	
	$val = $rs->fields["val"];
	$id = $rs->fields["id"];
	$idsucursal = $rs->fields["idsucursal"];
	$idcaja = $rs->fields["idcaja"];
	$idrol = $rs->fields["role_id"];

    return $arreglo[] = array("val" => $val, "id" => $id, "idcaja" => $idcaja, "idsucursal" => $idsucursal,'rol' => $idrol);
}

//Actualiza estado de la caja
public function actualizaEstadoCajaOpen(){
	
	$flag = false;
	
	$sql ="UPDATE {$this->table} ";
	$sql.="SET estado = 2 ";
	$sql.="WHERE id={$this->id} AND idsucursal = {$this->idsucursal} AND idcaja = {$this->idcaja}";
	
	$this->conexion->StartTrans();
		$this->conexion->execute($sql);
	$flag = $this->conexion->CompleteTrans();
	
	if($flag){
		return 1;
	}	
		return 2;
}
//fin

//Actualiza estado de la caja
public function actualizaEstadoCajaClose(){
	
	$flag = false;
	
	$sql ="UPDATE {$this->table} ";
	$sql.="SET estado = 1 ";
	$sql.="WHERE id={$this->id} AND idsucursal = {$this->idsucursal} AND idcaja = {$this->idcaja}";
	
	$this->conexion->StartTrans();
		$this->conexion->execute($sql);
	$flag = $this->conexion->CompleteTrans();
	
	if($flag){
		return 1;
	}	
		return 2;
}
	
}
//FIN CLASE

?>
