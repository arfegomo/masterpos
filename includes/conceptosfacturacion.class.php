<?php

class conceptosfacturacion extends base{

//PROPIEDADES BASE DE DATOS
  private $idconceptofacturacion;
  private $nombreconceptofacturacion;
  private $idconsecutivo;	
  private $idtipotransaccion;
  private $operacioninventario;
  private $afectacaja;
  private $afectacostoinventario;
  private $formatoimpresion;
  private $habilitaganapuntos;
  private $conceptodescarguemateriaprima;
  private $conceptocargueproducto;
  private $resoluciondian;
  private $prefijofacturacion;
  private $rangoinicial;
  private $rangofinal;
  private $fechavencimientoresoluciondian;
  private $textoresoluciondian;
  private $imprimencabezadofactura;
  private $imprimedatosdeltercero;
  private $abrecajonmonedero;
  private $turnador;
  private $numeroturnador;
  private $idsucursal;
  private $fechaexpedicionresoluciondian;
  private $acumulador;
  private $operacionacumulador;
  
//PROPIEDADES MODELO
  private $table;
  private $Rows;	

//PROPIEDADES DISEÑO
  private $num_error;
  private $evento;	
  private $msg;  
    
public function __construct(){
	$this->base();
	$this->idconceptofacturacion = 0;
	$this->nombreconceptofacturacion ="";
	$this->idconsecutivo = 0;
	$this->idtipotransaccion = 0;
	$this->operacioninventario = 0;
	$this->afectacaja = 0;
	$this->afectacostoinventario = 0;
	$this->formatoimpresion = 0;
	$this->habilitaganapuntos = 0;
	$this->conceptodescarguemateriaprima = 0;
	$this->conceptocargueproducto = 0;
	$this->resoluciondian = "";
	$this->prefijofacturacion = "";
	$this->rangoinicial = "";
	$this->rangofinal = "";
    $this->fechavencimientoresoluciondian = "";
	$this->textoresoluciondian = "";
	$this->imprimencabezadofactura = 0;
	$this->imprimedatosdeltercero = 0;
	$this->abrecajonmonedero = 0;
	$this->turnador = 0;
	$this->numeroturnador = 0;
	$this->idsucursal = 0;
	$this->acumulador = 0;
	$this->operacionacumulador = 0;
	$this->fechaexpedicionresoluciondian = "";
	$this->table = "conceptosfacturacion";
	$this->Rows = 0;
	$this->msg = "";

	date_default_timezone_set("America/Bogota");
	}  
	
//SETTERS

public function set_idconceptofacturacion($idconceptofacturacion){
	$this->idconceptofacturacion = $idconceptofacturacion;
	return true;	
	}	
public function set_nombreconceptofacturacion($nombreconceptofacturacion){
	$this->nombreconceptofacturacion = $nombreconceptofacturacion;
	return true;
	}
public function set_idconsecutivo($idconsecutivo){
	$this->idconsecutivo = $idconsecutivo;
	return true;
	}
public function set_idtipotransaccion($idtipotransaccion){
	$this->idtipotransaccion = $idtipotransaccion;
	return true;
	}
public function set_operacioninventario($operacioninventario){
	$this->operacioninventario = $operacioninventario;
	return true;
	}
public function set_afectacaja($afectacaja){
	$this->afectacaja = $afectacaja;
	return true;
	}
public function set_afectacostoinventario($afectacostoinventario){
	$this->afectacostoinventario = $afectacostoinventario;
	return true;
	}
public function set_formatoimpresion($formatoimpresion){
	$this->formatoimpresion = $formatoimpresion;
	return true;
	}
public function set_habilitaganapuntos($habilitaganapuntos){
	$this->habilitaganapuntos = $habilitaganapuntos;
	return true;
	}
public function set_conceptodescarguemateriaprima($conceptodescarguemateriaprima){
	$this->conceptodescarguemateriaprima = $conceptodescarguemateriaprima;
	return true;
	}
public function set_conceptocargueproducto($conceptocargueproducto){
	$this->conceptocargueproducto = $conceptocargueproducto;
	return true;
	}									  
public function set_resoluciondian($resoluciondian){
	$this->resoluciondian = $resoluciondian;
	return true;
	}  	
public function set_prefijofacturacion($prefijofacturacion){
	$this->prefijofacturacion = $prefijofacturacion;
	return true;
	}
public function set_rangoinicial($rangoinicial){
	$this->rangoinicial = $rangoinicial;
	return true;
	}
public function set_rangofinal($rangofinal){
	$this->rangofinal = $rangofinal;
	return true;
 	}	
public function set_fechavencimientoresoluciondian($fechavencimientoresoluciondian){
	$this->fechavencimientoresoluciondian = $fechavencimientoresoluciondian;
	return true;
	}	
public function set_textoresoluciondian($textoresoluciondian){
	$this->textoresoluciondian = $textoresoluciondian;
	return true;
	}
public function set_imprimencabezadofactura($imprimencabezadofactura){
	$this->imprimencabezadofactura = $imprimencabezadofactura;
	return true;
	}	
public function set_imprimedatosdeltercero($imprimedatosdeltercero){
	$this->imprimedatosdeltercero = $imprimedatosdeltercero;
	return true;
	}
public function set_abrecajonmonedero($abrecajonmonedero){
	$this->abrecajonmonedero = $abrecajonmonedero;
	return true;
	}
public function set_turnador($turnador){
	$this->turnador = $turnador;
	return true;
	}
public function set_numeroturnador($numeroturnador){
	$this->numeroturnador = $numeroturnador;
	return true;
	}
public function set_idsucursal($idsucursal){
	$this->idsucursal = $idsucursal;
	return true;
	}
public function set_acumulador($acumulador){
	$this->acumulador = $acumulador;
	return true;
	}
public function set_operacionacumulador($operacionacumulador){
	$this->operacionacumulador = $operacionacumulador;
	return true;
	}
public function set_fechaexpedicionresoluciondian($fechaexpedicionresoluciondian){
	$this->fechaexpedicionresoluciondian = $fechaexpedicionresoluciondian;
	return true;
	}
							
//FIN SETTERS

//GETTERS

public function get_idconceptofacturacion(){
	return $this->idconceptofacturacion;
	}
public function get_nombreconceptofacturacion(){
	return $this->nombreconceptofacturacion;
	}
public function get_idconsecutivo(){
	return $this->idconsecutivo;
	}	
public function get_idtipotransaccion(){
	return $this->idtipotransaccion;
	}	
public function get_operacioninventario(){
	return $this->operacioninventario;
	}	
public function get_afectacaja(){
	return $this->afectacaja;
	}
public function get_afectacostoinventario(){
	return $this->afectacostoinventario;
	}	
public function get_formatoimpresion(){
	return $this->formatoimpresion;
	}
public function get_habilitaganapuntos(){
	return $this->habilitaganapuntos;
	}	
public function get_conceptodescarguemateriaprima(){
	return $this->conceptodescarguemateriaprima;
	}
public function get_conceptocargueproducto(){
	return $this->conceptocargueproducto;
	}	
public function get_resoluciondian(){
	return $this->resoluciondian;
	}
public function get_prefijofacturacion(){
	return $this->prefijofacturacion;
	}
public function get_rangoinicial(){
	return $this->rangoinicial;
	}
public function get_rangofinal(){
	return $this->rangofinal;
	}						
public function get_fechavencimientoresoluciondian(){
	return $this->fechavencimientoresoluciondian;
	}	
public function get_textoresoluciondian(){
	return $this->textoresoluciondian;
	}	
public function get_imprimencabezadofactura(){
	return $this->imprimencabezadofactura;
	}
public function get_imprimedatosdeltercero(){
	return $this->imprimedatosdeltercero;
	}	
public function get_abrecajonmonedero(){
	return $this->abrecajonmonedero;
	}	
public function get_turnador(){
	return $this->turnador;
	}	
public function get_numeroturnador(){
	return $this->numeroturnador;
	}		
public function get_idsucursal(){
	return $this->idsucursal;
	}
public function get_acumulador(){
	return $this->acumulador;
	}
public function get_operacionacumulador(){
	return $this->operacionacumulador;
	}
public function get_fechaexpedicionresoluciondian(){
	return $this->fechaexpedicionresoluciondian;
	}	
public function get_Rows(){
	return $this->Rows;
	}
public function get_msg(){
	return $this->msg;
	}
		
//FIN GETTERS

//Listado de conceptos de facturación
public function listado_conceptosfacturacion(){
	
	$sql ="SELECT * FROM {$this->table} ";
	$sql.="WHERE idsucursal = ".$_SESSION['idsucursal']."";
	$rs = $this->conexion->execute($sql);
	
	$arreglo = array();
	
	while(!$rs->EOF){
		$idconceptofacturacion = $rs->fields["idconceptofacturacion"];
		$nombreconceptofacturacion = $rs->fields["nombreconceptofacturacion"];
		$idconsecutivo = $rs->fields["idconsecutivo"];
		$arreglo[] = array('idconceptofacturacion' => $idconceptofacturacion, 'nombreconceptofacturacion' => $nombreconceptofacturacion, "idconsecutivo" => $idconsecutivo);
		$rs->MoveNext();
		}
		
	 return $arreglo;
	 	
	}
	
//fin

//Consulta el consecutivo DIAN para un concepto de facturación de una Sucursal
public function consecutivoDian(){
	
	$sql ="SELECT conse.consecutivodian FROM consecutivos AS conse ";
	$sql.="INNER JOIN {$this->table} AS con ON conse.idconsecutivo = con.idconsecutivo AND conse.idsucursal = con.idsucursal ";
	$sql.="WHERE con.idsucursal = ".$_SESSION["idsucursal"]." AND con.idconceptofacturacion = {$this->idconceptofacturacion} ";
	$sql.="AND conse.idsucursal = ".$_SESSION["idsucursal"]."";
	$rs = $this->conexion->execute($sql);
		
	$consecutivodian = $rs->fields["consecutivodian"];
	
	 return $consecutivodian;	
	}
	
//fin

//Consulta el consecutivo Temporal para un concepto de facturación de una Sucursal
public function consecutivoTemporal(){
	
	$sql ="SELECT conse.consecutivo FROM consecutivos AS conse ";
	$sql.="INNER JOIN {$this->table} AS con ON conse.idconsecutivo = con.idconsecutivo ";
	$sql.="WHERE con.idsucursal = {$this->idsucursal} AND con.idconceptofacturacion = {$this->idconceptofacturacion}";
	$rs = $this->conexion->execute($sql);
		
	$consecutivo = $rs->fields["consecutivo"];
	
	 return $consecutivo;	
	}
//fin

//Actualiza consecutivo Dian y Temporal
public function actualizaConsecutivoDian($consecutivoDian){
	
	$flag = false;
	$params = array();
	
	$params[] = $consecutivoDian;
	
	$sql ="UPDATE consecutivos AS conse ";
	$sql.="INNER JOIN {$this->table} AS con ON conse.idconsecutivo = con.idconsecutivo ";
	$sql.="SET conse.consecutivodian=(?) ";
	$sql.="WHERE con.idsucursal = {$this->idsucursal} AND con.idconceptofacturacion = {$this->idconceptofacturacion}";
	
	$this->conexion->StartTrans();
		$this->conexion->execute($sql,$params);
	$flag = $this->conexion->CompleteTrans();
	
	if($flag){
		return 1;
	}	
		return 2;
	}
	
//fin

//Actualiza consecutivo Temporal despues de iniciado uan transaccion
public function actualizaConsecutivoTemporal($consecutivoTemporal){
	
	$flag = false;
	$params = array();	
	
	$params[] = $consecutivoTemporal;
	
	$sql ="UPDATE consecutivos AS conse ";
	$sql.="INNER JOIN {$this->table} AS con ON conse.idconsecutivo = con.idconsecutivo ";
	$sql.="SET conse.consecutivo=(?) ";
	$sql.="WHERE con.idsucursal = {$this->idsucursal} AND con.idconceptofacturacion = {$this->idconceptofacturacion}";
	
	$this->conexion->StartTrans();
		$this->conexion->execute($sql,$params);
	$flag = $this->conexion->CompleteTrans();
	
	if($flag){
		return 1;
	}	
		return 2;
	}
	
//fin

public function store(){

	$flag = false;
	$params = array();
	$id = 0;

	$params[] = $this->nombreconceptofacturacion;
	$params[] = $this->idconsecutivo;
	$params[] = $this->idtipotransaccion;
	$params[] = $this->acumulador;
	$params[] = $this->operacionacumulador;
	$params[] = $this->operacioninventario;
	$params[] = $this->afectacaja;
	$params[] = $this->afectacostoinventario;
	$params[] = $_SESSION["idsucursal"];

	$sql ="INSERT INTO {$this->table} (nombreconceptofacturacion,idconsecutivo,idtipotransaccion,acumulador,operacionacumulador,operacioninventario, ";
	$sql.="afectacaja,afectacostoinventario,idsucursal) ";	
	$sql.= "VALUES (?,?,?,?,?,?,?,?,?)";
	$this->conexion->StartTrans();
    $this->conexion->execute($sql,$params);
	$flag = $this->conexion->CompleteTrans();


	if ($flag){
		return 1;
	}
		return 2;
}


}//FIN CLASE
?>
