<?php

class consecutivos extends base{
	
//PROPIEDADES BASE DE DATOS
  private $idconsecutivo;
  private $consecutivo;
  private $consecutivodian;
  
 //PROPIEDADES MODELO
  private $table;
  private $Rows;	


//PROPIEDADES DISEÑO
  private $num_error;
  private $evento;	
  private $msg; 
  
 
public function __construct(){
	$this->base();
	$this->idconsecutivo = "0";
	$this->consecutivo = "0";
	$this->consecutivodian = "0";
	$this->table = "consecutivos";
	$this->Rows = 0;
	$this->msg = "";

	date_default_timezone_set("America/Bogota");
	} 
	
	
//SETTERS	 
   	
public function set_idconsecutivo($idconsecutivo){
	$this->idconsecutivo = $idconsecutivo;
	return true;
	}

public function set_consecutivo($consecutivo){
	$this->consecutivo = $consecutivo;
	return true;
	}

public function set_consecutivodian($consecutivodian){
	$this->consecutivodian = $consecutivodian;
	return true;
	}
//FIN SETTERS 		

//GETTERS

public function get_idconsecutivo(){
	return $this->idconsecutivo;
	}
public function get_consecutivo(){
	return $this->consecutivo;
	}		
public function get_consecutivodian(){
	return $this->consecutivodian;
	}		
public function get_Rows(){
	return $this->Rows;
	}
public function get_msg(){
	return $this->msg;
	}	
//FIN GETTERS	

public function listado_consecutivos(){
	
	$sql = "SELECT * FROM {$this->table} ";
	$sql.= "WHERE idsucursal = ".$_SESSION["idsucursal"]." ORDER BY consecutivo ASC";
	$rs = $this->conexion->execute($sql);
	
	$arreglo = array();
	
	while(!$rs->EOF){
		$idconsecutivo = $rs->fields["idconsecutivo"];
		$consecutivo = $rs->fields["consecutivo"];
		$consecutivodian = $rs->fields["consecutivodian"];
		$arreglo[] = array('idconsecutivo' => $idconsecutivo, 'consecutivo' => $consecutivo, 'consecutivodian' => $consecutivodian);
		$rs->MoveNext();
		}
	 return $arreglo;	
	}

public function findConsecutivo($idconcepto){
	
	$sql ="SELECT conc.idconceptofacturacion,cons.consecutivo,cons.consecutivodian,conc.idtipotransaccion FROM {$this->table} AS cons ";
	$sql.="INNER JOIN conceptosfacturacion AS conc ON cons.idconsecutivo = conc.idconsecutivo ";
	$sql.="WHERE conc.idconceptofacturacion = {$idconcepto} AND conc.idsucursal = {$_SESSION["idsucursal"]}";
	$rs = $this->conexion->execute($sql);

	$arreglo = array();

	while(!$rs->EOF){
	
	$consecutivodian = $rs->fields["consecutivodian"];
	$consecutivo = $rs->fields["consecutivo"];
	$idtipotransaccion = $rs->fields["idtipotransaccion"];
	$idconceptofacturacion = $rs->fields["idconceptofacturacion"];
	$arreglo[] = array('consecutivodian' => $consecutivodian, 'consecutivo' => $consecutivo, 'idtipotransaccion' => $idtipotransaccion,'idconceptofacturacion'=>$idconceptofacturacion);

	$rs->MoveNext();
		}
	return $arreglo;	
	
	}

public function store(){

	$flag = false;
	$params = array();
	$id = 0;

	$params[] = $this->consecutivodian;
	$params[] = $_SESSION["idsucursal"];

	$sql = "INSERT INTO {$this->table} (consecutivodian,idsucursal) ";	
	$sql.= "VALUES (?,?)";
	$this->conexion->StartTrans();
    $this->conexion->execute($sql,$params);
	$flag = $this->conexion->CompleteTrans();


	if ($flag){
		return 1;
	}
		return 2;
}

public function updateConsecutivoTemporal($idconcepto, $consecutivo){

	$flag = false;

	$sql ="UPDATE {$this->table} AS cons ";
	$sql.="INNER JOIN conceptosfacturacion AS conc ON cons.idconsecutivo = conc.idconsecutivo ";
	$sql.="SET consecutivo='{$consecutivo}' ";
	$sql.="WHERE conc.idconceptofacturacion = {$idconcepto} AND conc.idsucursal = {$_SESSION["idsucursal"]}";
	$this->conexion->StartTrans();
	$this->conexion->execute($sql);
	$flag = $this->conexion->CompleteTrans();

	if ($flag){
		return 1;
	}
		return 2;
  }				
	
}//FIN CLASE
?>
