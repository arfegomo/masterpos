<?php

class papelerareciclaje extends base{	

//PROPIEDADES BASE DE DATOS
  private $idtemporal;
  private $idarticulo;
  private $cantidad;
  private $created_at;
  private $updated_at; 
  private $consecutivo; 
  private $preciounitario;  
  private $impuestoiva;
  private $impuestoconsumo;
  private $baseunitario;
  private $idcaja;
  private $idmesa;
  private $idsucursal;
  private $id;
  private $idconceptofacturacion;
  private $idtipoimpuesto;
  private $documento;

//PROPIEDADES MODELO
  private $table;
  private $Rows;	

//PROPIEDADES DISEÑO
  private $num_error;
  private $evento;	
  private $msg; 

public function __construct(){
	$this->base();
	$this->temporal = 0;
	$this->idcaja = 0;
	$this->idsucursal = 0;	
	$this->idarticulo = 0;
	$this->id = 0;
	$this->idconceptofacturacion = 0;
	$this->descuento = 0;
	$this->cantidad = 0;
	$this->created_at = "";
	$this->updated_at = "";
	$this->consecutivo = "";
	$this->idmesa = 0;
	$this->preciounitario = 0;
	$this->impuestoiva = 0;
	$this->impuestoconsumo = 0;
	$this->baseunitario = 0;
	$this->idtipoimpuesto = 0;
	$this->documento = 0;
	$this->table = "papelerareciclaje";
	$this->Rows = 0;
	$this->msg = "";

	date_default_timezone_set("America/Bogota");
	}

//SETTERS 

public function set_idtemporal($idtemporal){
	$this->idtemporal = $idtemporal;
	return true;
	}
public function set_id($id){
	$this->id = $id;
	return true;
	}
public function set_idcaja($idcaja){
	$this->idcaja = $idcaja;
	return true;
	}
public function set_idmesa($idmesa){
	$this->idmesa = $idmesa;
	return true;
	}
public function set_idsucursal($idsucursal){
	$this->idsucursal = $idsucursal;
	return true;
	}
public function set_idarticulo($idarticulo){
	$this->idarticulo = $idarticulo;
	return true;
	}
public function set_idconceptofacturacion($idconceptofacturacion){
	$this->idconceptofacturacion = $idconceptofacturacion;
	return true;
	}	
public function set_descuento($descuento){
	$this->descuento = $descuento;
	return true;
	}	
public function set_cantidad($cantidad){
	$this->cantidad = $cantidad;
	return true;
	}	
public function set_created_at($created_at){
	$this->created_at = $created_at;
	return true;
	}	
public function set_updated_at($updated_at){
	$this->updated_at = $updated_at;
	return true;
	}
public function set_consecutivo($consecutivo){
	$this->consecutivo = $consecutivo;
	return true;
	}
public function set_preciounitario($preciounitario){
	$this->preciounitario = $preciounitario;
	return true;
	}
public function set_impuestoiva($impuestoiva){
	$this->impuestoiva = $impuestoiva;
	return true;
	}
public function set_impuestoconsumo($impuestoconsumo){
	$this->impuestoconsumo = $impuestoconsumo;
	return true;
	}
public function set_baseunitario($baseunitario){
	$this->baseunitario = $baseunitario;
	return true;
	}
public function set_idtipoimpuesto($idtipoimpuesto){
	$this->idtipoimpuesto = $idtipoimpuesto;
	return true;
	}
public function set_documento($documento){
	$this->documento = $documento;
	return true;
	}
//FIN SETTERS 

public function get_idtemporal(){
	return $this->idtemporal;
	}
public function get_id(){
	return $this->id;
	}
public function get_idcaja(){
	return $this->idcaja;
	}
public function get_idmesa(){
	return $this->idmesa;
	}
public function get_idsucursal(){
	return $this->idsucursal;
	}
public function get_idarticulo(){
	return $this->idarticulo;
	}
public function get_idconceptofacturacion(){
	return $this->idconceptofacturacion;
	}  
public function get_descuento(){
	return $this->descuento;
	}	
public function get_cantidad(){
	return $this->cantidad;
	}
public function get_created_at(){
	return $this->created_at;
	}		
public function get_updated_at(){
	return $this->updated_at;
	}	
public function get_Rows(){
	return $this->Rows;
	}
public function get_msg(){
	return $this->msg;
	}
public function get_consecutivo(){
	return $this->consecutivo;
	}
public function get_preciounitario(){
	return $this->preciounitario;
	}
public function get_impuestoiva(){
	return $this->impuestoiva;
	}
public function get_impuestoconsumo(){
	return $this->impuestoconsumo;
	}
public function get_baseunitario(){
	return $this->baseunitario;
	}
public function get_idtipoimpuesto(){
	return $this->idtipoimpuesto;
	}
public function get_documento(){
	return $this->documento;
	}
//FIN GETTERS	

public function listarArticulosMesaAll(){

	$sql = "SELECT tem.cantidad,art.nombrearticulo,art.idarticulo,tem.descuento,tem.preciounitario,tem.impuestoiva,tem.impuestoconsumo,tem.baseunitario,tem.idtemporal,tem.consecutivo,tem.idmesa,tem.idconceptofacturacion,tem.id,tem.created_at ";
	$sql.="FROM {$this->table} AS tem ";
	$sql.="INNER JOIN articulos AS art ON tem.idarticulo = art.idarticulo ";
	$sql.="WHERE DATE(tem.created_at) = '".date("Y-m-d")."'";


	$rs = $this->conexion->execute($sql);

	$arreglo = array();

	while(!$rs->EOF){
		$idtemporal = $rs->fields["idtemporal"];
		$idarticulo = $rs->fields["idarticulo"];
		$cantidad = $rs->fields["cantidad"];
		$nombrearticulo = $rs->fields["nombrearticulo"];
		$descuento = $rs->fields["descuento"];
		$preciounitario = $rs->fields["preciounitario"];
		$impuestoiva = $rs->fields["impuestoiva"];
		$impuestoconsumo = $rs->fields["impuestoconsumo"];
		$baseunitario = $rs->fields["baseunitario"];
		$consecutivo = $rs->fields["consecutivo"];
		$idmesa = $rs->fields["idmesa"];
		$idconceptofacturacion = $rs->fields["idconceptofacturacion"];
		$id = $rs->fields["id"];
		$fecha = $rs->fields["created_at"];

        $arreglo[] = array('idarticulo' => $idarticulo, 'cantidad' => $cantidad, 'nombrearticulo' => $nombrearticulo, 'descuento' => $descuento, 'preciounitario' => $preciounitario, 'impuestoiva' => $impuestoiva, 'impuestoconsumo' => $impuestoconsumo, 'baseunitario' => $baseunitario, 'idtemporal' => $idtemporal, 'consecutivo' => $consecutivo,'idmesa' => $idmesa, 'idconceptofacturacion' => $idconceptofacturacion, 'id' => $id, 'fecha' => $fecha);
		$rs->MoveNext();

		} 

	 return $arreglo;	

	}		


}//FIN CLASE

?>