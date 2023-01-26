<?php

class transacciones extends base{
	
//PROPIEDADES BASE DE DATOS
  private $idreferencia;
  private $documento;
  private $idsucursal;
  private $idconceptofacturacion;
  private $fechacreacion;
  private $horacreacion;
  private $created_at;
  private $updated_at; 
  private $consecutivodian; 
  private $segundocreacion;  
  private $horalargacreacion;
  private $minutocreacion;
  private $estado;
  private $idcaja;
  private $id;
  private $observacion;
  

//PROPIEDADES MODELO
  private $table;
  private $Rows;	

//PROPIEDADES DISEÑO
  private $num_error;
  private $evento;	
  private $msg; 

public function __construct(){
	$this->base();
	$this->idreferencia = 0;
	$this->documento = 0;
	$this->idcaja = 0;
	$this->idsucursal = 0;	
	$this->fechacreacion = "";
	$this->id = 0;
	$this->idconceptofacturacion = 0;
	$this->horacreacion = "";
	$this->created_at = "";
	$this->updated_at = "";
	$this->consecutivodian = "";
	$this->segundocreacion = "";
	$this->horalargacreacion ="";
	$this->minutocreacion = 0;
	$this->observacion = "";
	
	$this->estado = 0;
	$this->table = "transacciones";
	$this->Rows = 0;
	$this->msg = "";
	}
	
//SETTERS 

public function set_idreferencia($idreferencia){
	$this->idreferencia = $idreferencia;
	return true;
	}
public function set_documento($documento){
	$this->documento = $documento;
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
public function set_idsucursal($idsucursal){
	$this->idsucursal = $idsucursal;
	return true;
	}
public function set_fechacreacion($fechacreacion){
	$this->fechacreacion = $fechacreacion;
	return true;
	}
public function set_idconceptofacturacion($idconceptofacturacion){
	$this->idconceptofacturacion = $idconceptofacturacion;
	return true;
	}		
public function set_horacreacion($horacreacion){
	$this->horacreacion = $horacreacion;
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
public function set_consecutivodian($consecutivodian){
	$this->consecutivodian = $consecutivodian;
	return true;
	}
public function set_segundocreacion($segundocreacion){
	$this->segundocreacion = $segundocreacion;
	return true;
	}
public function set_horalargacreacion($horalargacreacion){
	$this->horalargacreacion = $horalargacreacion;
	return true;
	}
public function set_minutocreacion($minutocreacion){
	$this->minutocreacion = $minutocreacion;
	return true;
	}
public function set_estado($estado){
	$this->estado = $estado;
	return true;
	}
public function set_observacion($observacion){
	$this->observacion = $observacion;
	return true;
	}
//FIN SETTERS 

public function get_idreferencia(){
	return $this->idreferencia;
	}
public function get_documento(){
	return $this->documento;
	}
public function get_id(){
	return $this->id;
	}
public function get_idcaja(){
	return $this->idcaja;
	}
public function get_idsucursal(){
	return $this->idsucursal;
	}
public function get_fechacreacion(){
	return $this->fechacreacion;
	}
public function get_idconceptofacturacion(){
	return $this->idconceptofacturacion;
	}  	
public function get_horacreacion(){
	return $this->horacreacion;
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
public function get_consecutivodian(){
	return $this->consecutivodian;
	}
public function get_segundocreacion(){
	return $this->segundocreacion;
	}
public function get_horalargacreacion(){
	return $this->horalargacreacion;
	}
public function get_minutocreacion(){
	return $this->minutocreacion;
	}
public function get_estado(){
	return $this->estado;
	}
public function get_observacion(){
	return $this->observacion;
	}
//FIN GETTERS	

//lista facturas del día
public function loadDay(){
	
	$sql ="SELECT tra.estado,tra.consecutivodian,tra.documento,tra.created_at,cpt.nombreconceptofacturacion,tra.idconceptofacturacion,per.nombres,per.apellidos ";
	$sql.="FROM {$this->table} AS tra ";
	$sql.="INNER JOIN conceptosfacturacion AS cpt ON tra.idconceptofacturacion = cpt.idconceptofacturacion AND tra.idsucursal = cpt.idsucursal ";
	$sql.="INNER JOIN personas AS per ON tra.documento = per.documento ";
	$sql.="WHERE tra.idsucursal = ".$_SESSION["idsucursal"]." AND tra.fechacreacion = '".date("Y-m-d")."' ORDER BY tra.created_at DESC";
	$rs = $this->conexion->execute($sql);
	
	$arreglo = array();
	while(!$rs->EOF){
		$estado = $rs->fields["estado"];
		$idconceptofacturacion = $rs->fields["idconceptofacturacion"];
		$nombreconceptofacturacion = $rs->fields["nombreconceptofacturacion"];
		$consecutivodian = $rs->fields["consecutivodian"];
		$documento = $rs->fields["documento"];
		$fecha = $rs->fields["created_at"];
		$nombres = $rs->fields["nombres"];
		$apellidos = $rs->fields["apellidos"];
		$arreglo[] = array('estado' => $estado,'idconceptofacturacion' => $idconceptofacturacion,'consecutivodian' => $consecutivodian, 'documento' => $documento,'fecha' => $fecha,'nombreconceptofacturacion' => $nombreconceptofacturacion, "nombres" => $nombres, "apellidos" => $apellidos);
		$rs->MoveNext();
}
 return $arreglo;

}

//
public function ventasDiarias($fechainicial,$fechafinal,$tipotra){

	$sql="SELECT ";
	$sql.="fechacreacion AS fecha, ";
	$sql.="ROUND(SUM(((mov.cantidad * mov.preciounitario)- ((mov.cantidad * mov.preciounitario)*(mov.descuento/100))))) AS venta
	FROM transacciones AS tra ";
	$sql.="INNER JOIN detallestransacciones AS mov ON tra.idsucursal = mov.idsucursal AND tra.idconceptofacturacion = mov.idconceptofacturacion AND tra.consecutivodian = mov.consecutivodian ";
	$sql.="INNER JOIN conceptosfacturacion AS cpt ON tra.idconceptofacturacion = cpt.idconceptofacturacion AND tra.idsucursal = cpt.idsucursal ";
	$sql.="INNER JOIN tipostransacciones AS tip ON cpt.idtipotransaccion = tip.idtipotransaccion ";
	$sql.="WHERE tra.idsucursal = ".$_SESSION["idsucursal"]." ";
	$sql.="AND tra.fechacreacion BETWEEN '{$fechainicial}' AND '{$fechafinal}' AND tip.idtipotransaccion = {$tipotra} ";
	$sql.="GROUP BY fecha";

	$rs = $this->conexion->execute($sql);
	
	$arreglo = array();
	while(!$rs->EOF){
		
		$fecha = $rs->fields["fecha"];
		$venta = $rs->fields["venta"];
		$arreglo[] = array('fecha' => $fecha,'venta' => $venta);
		$rs->MoveNext();
}
 return $arreglo;

}

//
public function ventasArticulos($fechainicial,$fechafinal,$tipotra){

	$sql="SELECT ";
	$sql.="art.idarticulo,art.nombrearticulo, ";
	$sql.="SUM(mov.cantidad) AS cantidad, ";
	$sql.="ROUND(SUM(((mov.cantidad * mov.preciounitario)- ((mov.cantidad * mov.preciounitario)*(mov.descuento/100))))) AS venta
	FROM transacciones AS tra ";
	$sql.="INNER JOIN detallestransacciones AS mov ON tra.idsucursal = mov.idsucursal AND tra.idconceptofacturacion = mov.idconceptofacturacion AND tra.consecutivodian = mov.consecutivodian ";
	$sql.="INNER JOIN conceptosfacturacion AS cpt ON tra.idconceptofacturacion = cpt.idconceptofacturacion AND tra.idsucursal = cpt.idsucursal ";
	$sql.="INNER JOIN tipostransacciones AS tip ON cpt.idtipotransaccion = tip.idtipotransaccion ";
	$sql.="INNER JOIN articulos AS art ON mov.idarticulo = art.idarticulo ";
	$sql.="WHERE tra.idsucursal = ".$_SESSION["idsucursal"]." ";
	$sql.="AND tra.fechacreacion BETWEEN '{$fechainicial}' AND '{$fechafinal}' AND tip.idtipotransaccion = {$ti} ";
	$sql.="GROUP BY idarticulo,nombrearticulo ";
	$sql.="ORDER BY nombrearticulo ASC ";

	$rs = $this->conexion->execute($sql);
	
	$arreglo = array();
	while(!$rs->EOF){
		
		$nombrearticulo = $rs->fields["nombrearticulo"];
		$venta = $rs->fields["venta"];
		$cantidad = $rs->fields["cantidad"];
		$arreglo[] = array('nombrearticulo' => $nombrearticulo,'venta' => $venta, 'cantidad' => $cantidad);
		$rs->MoveNext();
}
 return $arreglo;

}
//

//Carga el encabezado e la factura
public function loadTransaccion(){
	
	$sql ="SELECT tra.documento,tra.created_at,cpt.nombreconceptofacturacion,per.nombres,per.apellidos,per.direccion,per.telefono,tra.consecutivodian, ";
	$sql.="tra.idcaja,suc.nombresucursal ";
	$sql.="FROM {$this->table} AS tra ";
	$sql.="INNER JOIN conceptosfacturacion AS cpt ON tra.idconceptofacturacion = cpt.idconceptofacturacion AND tra.idsucursal = cpt.idsucursal ";
	$sql.="INNER JOIN personas AS per ON tra.documento = per.documento ";
	$sql.="INNER JOIN sucursales AS suc ON tra.idsucursal = suc.idsucursal ";
	//$sql.="INNER JOIN usuarioscajas AS uc ON tra.idcaja = uc.idcaja AND suc.idsucursal = uc.idsucursal ";
	$sql.="WHERE tra.idsucursal = ".$_SESSION["idsucursal"]." AND tra.idconceptofacturacion = {$this->idconceptofacturacion} ";
	$sql.="AND tra.consecutivodian = '{$this->consecutivodian}'";
	$rs = $this->conexion->execute($sql);
	
	$arreglo = array();
	while(!$rs->EOF){
		
		$nombreconceptofacturacion = $rs->fields["nombreconceptofacturacion"];
		$consecutivodian = $rs->fields["consecutivodian"];
		$documento = $rs->fields["documento"];
		$fecha = $rs->fields["created_at"];
		$nombres = $rs->fields["nombres"];
		$apellidos = $rs->fields["apellidos"];
		$direccion = $rs->fields["direccion"];
		$telefono = $rs->fields["telefono"];
		$caja = $rs->fields["idcaja"];
		$sucursal = $rs->fields["nombresucursal"];
		$arreglo[] = array('consecutivodian' => $consecutivodian, 'documento' => $documento,'fecha' => $fecha,'nombreconceptofacturacion' => $nombreconceptofacturacion, "nombres" => $nombres, "apellidos" => $apellidos, "direccion", "telefono" => $telefono, "caja" => $caja, "sucursal" => $sucursal);
		$rs->MoveNext();
}
 return $arreglo;

}

//inserta encabezado de la factura
public function store(){
	$flag = false;
	$params = array();
	$id = 0;

	$params[] = $this->idsucursal;
	$params[] = $this->idconceptofacturacion;
	$params[] = $this->fechacreacion;
	$params[] = $this->horacreacion;
	$params[] = $this->minutocreacion;
	$params[] = $this->segundocreacion;
	$params[] = $this->horalargacreacion;
	$params[] = $this->estado;
	$params[] = $this->consecutivodian;
	$params[] = $this->documento;
	$params[] = $this->idcaja;
	$params[] = $this->id;
	$params[] = $this->observacion;
	

    $sql ="INSERT INTO {$this->table} (idsucursal,idconceptofacturacion,fechacreacion, ";
    $sql.="horacreacion,minutocreacion,segundocreacion,horalargacreacion,estado,consecutivodian,documento,idcaja,id,observacion)";	
    $sql.="VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?)";
	$this->conexion->StartTrans();
	$this->conexion->execute($sql,$params);
	$flag = $this->conexion->CompleteTrans();

	if ($flag){

		return 1;
	}
		return 2;
  }	

//Kardex
public function kardex($idarticulo){

	$sql = "SELECT tra.fechacreacion,con.nombreconceptofacturacion,tra.documento,tra.consecutivodian,det.cantidad,det.preciounitario,det.costoventa,art.costoactual,det.baseunitario,art.existenciactual,det.costopromedio,con.idtipotransaccion,det.descuento,det.documentoreferencia ";
	$sql.="FROM detallestransacciones AS det ";
	$sql.="INNER JOIN transacciones AS tra ON det.idsucursal = tra.idsucursal AND det.idconceptofacturacion = tra.idconceptofacturacion AND det.consecutivodian = tra.consecutivodian ";
	$sql.="INNER JOIN conceptosfacturacion AS con ON tra.idsucursal = con.idsucursal AND con.idconceptofacturacion = tra.idconceptofacturacion ";
	$sql.="INNER JOIN tipostransacciones AS tip ON con.idtipotransaccion = tip.idtipotransaccion ";
	$sql.="INNER JOIN articulos AS art ON det.idarticulo = art.idarticulo ";
	$sql.="WHERE det.idarticulo = {$idarticulo} ";
	$sql.="ORDER BY det.idetalletransaccion ASC";
	$rs = $this->conexion->execute($sql);

	$arreglo = array();

	while(!$rs->EOF){
		$fechacreacion = $rs->fields["fechacreacion"];
		$nombreconceptofacturacion = $rs->fields["nombreconceptofacturacion"];
		$documento = $rs->fields["documento"];
		$consecutivodian = $rs->fields["consecutivodian"];
		$cantidad = $rs->fields["cantidad"];
		$preciounitario = $rs->fields["preciounitario"];
		$costoventa = $rs->fields["costoventa"];
		$costoactual = $rs->fields["costoactual"];
		$baseunitario = $rs->fields["baseunitario"];
		$existenciactual = $rs->fields["existenciactual"];
		$costopromedio = $rs->fields["costopromedio"];
		$idtipotransaccion = $rs->fields["idtipotransaccion"];
		$descuento = $rs->fields["descuento"];
		$documentoreferencia = $rs->fields["documentoreferencia"];
		

		$arreglo[] = array('fechacreacion' => $fechacreacion, 'nombreconceptofacturacion' => $nombreconceptofacturacion, 'documento' => $documento, 'consecutivodian' => $consecutivodian, 'cantidad' => $cantidad, 'preciounitario' => $preciounitario, 'costoventa' => $costoventa, 'costoactual' => $costoactual, 'baseunitario' => $baseunitario, 'existenciactual' => $existenciactual, 'costopromedio' => $costopromedio, 'idtipotransaccion' => $idtipotransaccion, "descuento" => $descuento, 'documentoreferencia' => $documentoreferencia);
		$rs->MoveNext();

		} 

	 return $arreglo;	
}//fin

public function delete(){

	$flag = false;

     $sql ="DELETE FROM {$this->table} ";
     $sql.="WHERE idsucursal = ".$_SESSION["idsucursal"]." AND idconceptofacturacion = {$this->idconceptofacturacion} ";
	 $sql.="AND consecutivodian = '{$this->consecutivodian}'";
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