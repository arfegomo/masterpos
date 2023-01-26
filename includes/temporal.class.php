<?php

class temporal extends base{	

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
  private $costoventa;
  private $costopromedio;
  private $documentoreferencia;
  private $existenciactual;

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
	$this->costoventa = 0;
	$this->costopromedio = 0;
	$this->documentoreferencia = "";
	$this->existenciactual = 0;
	$this->table = "temporal";
	$this->Rows = 0;
	$this->msg = "";
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
public function set_costoventa($costoventa){
	$this->costoventa = $costoventa;
	return true;
	}
public function set_costopromedio($costopromedio){
	$this->costopromedio = $costopromedio;
	return true;
	}
public function set_documentoreferencia($documentoreferencia){
	$this->documentoreferencia = $documentoreferencia;
	return true;
	}
public function set_existenciactual($existenciactual){
	$this->existenciactual = $existenciactual;
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
public function get_costoventa(){
	return $this->costoventa;
	}
public function get_costopromedio(){
	return $this->costopromedio;
	}
public function get_documentoreferencia(){
	return $this->documentoreferencia;
	}
public function get_existenciactual(){
	return $this->existenciactual;
	}
//FIN GETTERS	

public function listarArticulos(){

	$sql = "SELECT tem.idtemporal,tem.cantidad,art.nombrearticulo,art.idarticulo,tem.descuento,tem.preciounitario,tem.impuestoiva,tem.impuestoconsumo,tem.baseunitario,tem.idtemporal,tem.consecutivo,tem.idmesa,tem.idconceptofacturacion,tem.id,tem.costoventa ";
	$sql.="FROM {$this->table} AS tem ";
	$sql.="INNER JOIN articulos AS art ON tem.idarticulo = art.idarticulo ";
	$sql.="WHERE consecutivo = '{$this->consecutivo}' ";
	$sql.="AND idconceptofacturacion = {$this->idconceptofacturacion} AND idsucursal = {$this->idsucursal}";
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
		$costoventa = $rs->fields["costoventa"];
		$costopromedio = $rs->fields["costopromedio"];

        $arreglo[] = array('idarticulo' => $idarticulo, 'cantidad' => $cantidad, 'nombrearticulo' => $nombrearticulo, 'descuento' => $descuento, 'preciounitario' => $preciounitario, 'impuestoiva' => $impuestoiva, 'impuestoconsumo' => $impuestoconsumo, 'baseunitario' => $baseunitario, 'idtemporal' => $idtemporal, 'consecutivo' => $consecutivo,'idmesa' => $idmesa, 'idconceptofacturacion' => $idconceptofacturacion, 'id' => $id, "costoventa" => $costoventa, 'costopromedio' => $costopromedio);
		$rs->MoveNext();

		} 

	 return $arreglo;	

	}

public function listarArticulosMesa(){

	$sql = "SELECT tem.cantidad,art.nombrearticulo,art.idarticulo,tem.descuento,tem.preciounitario,tem.impuestoiva,tem.impuestoconsumo,tem.baseunitario,tem.idtemporal,tem.consecutivo,tem.idmesa,tem.idconceptofacturacion,tem.id,tem.documento,tem.costoventa,tem.costopromedio,tem.created_at ";
	$sql.="FROM {$this->table} AS tem ";
	$sql.="INNER JOIN articulos AS art ON tem.idarticulo = art.idarticulo ";
	$sql.="WHERE idmesa = {$this->idmesa} ";
	$sql.="ORDER BY tem.idtemporal DESC";
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
		$documento = $rs->fields["documento"];
		$costoventa = $rs->fields["costoventa"];
		$costopromedio = $rs->fields["costopromedio"];
		$created_at = $rs->fields["created_at"];

        $arreglo[] = array('idarticulo' => $idarticulo, 'cantidad' => $cantidad, 'nombrearticulo' => $nombrearticulo, 'descuento' => $descuento, 'preciounitario' => $preciounitario, 'impuestoiva' => $impuestoiva, 'impuestoconsumo' => $impuestoconsumo, 'baseunitario' => $baseunitario, 'idtemporal' => $idtemporal, 'consecutivo' => $consecutivo,'idmesa' => $idmesa, 'idconceptofacturacion' => $idconceptofacturacion, 'id' => $id, 'documento' => $documento, 'costoventa' => $costoventa, 'costopromedio' => $costopromedio, 'created_at' => substr($created_at, 11,5));
		$rs->MoveNext();

		} 

	 return $arreglo;	

	}		

public function pagarTransaccion(){

	$sql ="SELECT ROUND(SUM(((tem.baseunitario * tem.cantidad) - ((tem.cantidad * tem.baseunitario)*(tem.descuento/100))))) AS subtotal, ";
	$sql.="ROUND(SUM((((tem.baseunitario * tem.cantidad)- ((tem.baseunitario * tem.cantidad)*(tem.descuento/100))) * (tem.impuestoconsumo/100)) + (((tem.baseunitario * tem.cantidad)- ((tem.baseunitario * tem.cantidad)*(tem.descuento/100))) * (tem.impuestoiva/100)))) AS impuestos, ";
	$sql.="ROUND(SUM(((tem.baseunitario * tem.cantidad) - ((tem.cantidad * tem.baseunitario)*(tem.descuento/100))) + (((tem.baseunitario * tem.cantidad)- ((tem.baseunitario * tem.cantidad)*(tem.descuento/100))) * (tem.impuestoconsumo/100)) + (((tem.baseunitario * tem.cantidad)- ((tem.baseunitario * tem.cantidad)*(tem.descuento/100))) * (tem.impuestoiva/100)))) AS total ";
	$sql.="FROM {$this->table} AS tem ";
	$sql.="WHERE consecutivo = '{$this->consecutivo}' AND idconceptofacturacion = {$this->idconceptofacturacion} ";
	$sql.="AND idsucursal = {$this->idsucursal}";
	$rs = $this->conexion->execute($sql);

	$arreglo = array();

	$subtotal = $rs->fields["subtotal"];
	$impuestos = $rs->fields["impuestos"];
	$total = $rs->fields["total"];

	$arreglo[] = array("subtotal" => $subtotal, "impuestos" => $impuestos, "total" => $total);

	return $arreglo;	

  }

public function store(){

	$flag = false;
	$params = array();
	$id = 0;

	$params[] = $this->idarticulo;
	$params[] = $this->descuento;
	$params[] = $this->cantidad;
	$params[] = $this->consecutivo;
	$params[] = $this->preciounitario;
	$params[] = $this->impuestoiva;
	$params[] = $this->impuestoconsumo;
	$params[] = $this->baseunitario;
	$params[] = $this->idcaja;
	$params[] = $this->idsucursal;
	$params[] = $this->id;
	$params[] = $this->idconceptofacturacion;
	$params[] = $this->idtipoimpuesto;
	$params[] = $this->idmesa;
	$params[] = $this->documento;
	$params[] = $this->costoventa;
	$params[] = $this->costopromedio;
	$params[] = $this->documentoreferencia;
	$params[] = $this->existenciactual;
	
 $sql ="INSERT INTO {$this->table} (idarticulo,descuento, ";
 $sql.="cantidad,consecutivo,preciounitario,impuestoiva,impuestoconsumo,baseunitario,idcaja,idsucursal,id,idconceptofacturacion,idtipoimpuesto,idmesa,documento,costoventa,costopromedio,documentoreferencia,existenciactual)";   $sql.="VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
    $this->conexion->StartTrans();
    $this->conexion->execute($sql,$params);
    $flag = $this->conexion->CompleteTrans();

	if ($flag){

	   return 1;
	}
	return 2;
}

public function loadTemporal(){
	
	$sql = "SELECT * FROM {$this->table} WHERE idtemporal = {$this->idtemporal}";
	$rs = $this->conexion->execute($sql);
	
	if ($rs===false) return false;

	$this->cantidad = $rs->fields["cantidad"];
	
	return true;

	}



public function delete($idarticulo,$cantidad,$concepto){

	$flag = false;

	$sql1 ="INSERT INTO papelerareciclaje (idarticulo,descuento,cantidad,consecutivo,preciounitario,impuestoiva, ";
	$sql1.="impuestoconsumo,baseunitario,idcaja,idsucursal,id,idconceptofacturacion,idtipoimpuesto,idmesa,documento) ";
	$sql1.="SELECT idarticulo,descuento,cantidad,consecutivo,preciounitario,impuestoiva, ";
	$sql1.="impuestoconsumo,baseunitario,idcaja,idsucursal,id,idconceptofacturacion,idtipoimpuesto,idmesa,documento FROM {$this->table} ";
	$sql1.="WHERE idtemporal = {$this->idtemporal}";

	$this->conexion->StartTrans();
    $this->conexion->execute($sql1);
	$flag = $this->conexion->CompleteTrans();

	if(($concepto == 2)||($concepto == 6)){

	$sql2 = "UPDATE articulos SET existenciactual = $cantidad ";
	$sql2.="WHERE idarticulo = {$idarticulo}";
		
	}else{
	
	$sql2 = "UPDATE articulos SET existenciactual = $cantidad ";
	$sql2.="WHERE idarticulo = {$idarticulo}";
	
	}
	$this->conexion->StartTrans();
	$this->conexion->execute($sql2);
	$flag = $this->conexion->CompleteTrans();	

     $sql ="DELETE FROM {$this->table} WHERE idtemporal = {$this->idtemporal}";
     $this->conexion->StartTrans();
     $this->conexion->execute($sql);
     $flag = $this->conexion->CompleteTrans();



	/*$sql3 ="DELETE FROM temporal2 WHERE idarticulo = {$idarticulo}";
     $this->conexion->StartTrans();
     $this->conexion->execute($sql3);
     $flag = $this->conexion->CompleteTrans();*/



	if ($flag){
		
		return 1;
	}
	
	return 2;
} 

public function deleteAll(){

	$flag = false;

	$sql1 ="SELECT idarticulo FROM {$this->table} GROUP BY idarticulo";

	$rs = $this->conexion->execute($sql1);

	$arreglo = array();

	while(!$rs->EOF){
	$idarticulo = $rs->fields["idarticulo"];

	$arreglo[] = array("idarticulo" => $idarticulo);
	$rs->MoveNext();

		}

	foreach ($arreglo as $articulos) {
	
	$sql2 = "UPDATE articulos SET existenciatemporal=0, costotemporal=0 ";
	$sql2.="WHERE idarticulo = ".$articulos["idarticulo"]."";
	$this->conexion->StartTrans();
	$this->conexion->execute($sql2);
	$flag = $this->conexion->CompleteTrans();

	}

     $sql ="DELETE FROM {$this->table}";
     $this->conexion->StartTrans();
     $this->conexion->execute($sql);
     $flag = $this->conexion->CompleteTrans();

    

	if ($flag){
		
		return 1;
	}
	
	return 2;
} 

public function trasladarMesa($origen,$destino){

	$flag = false;

	$sql1="UPDATE {$this->table} SET idmesa={$destino} ";
	$sql1.="WHERE idmesa = {$origen}";

	$this->conexion->StartTrans();
    $this->conexion->execute($sql1);
	$flag = $this->conexion->CompleteTrans();

	if ($flag){
		
		return 1;
	}
	
		return 2;
} 

//Función que busca el detalle de la transacción en la tabla temporal
public function buscarDetalle($consecutivoDian){

	$flag = false;

	$sql ="INSERT INTO detallestransacciones (idsucursal,idarticulo,descuento,cantidad,consecutivodian,preciounitario,impuestoiva, ";
	$sql.="impuestoconsumo,baseunitario,idconceptofacturacion,idtipoimpuesto,costoventa,costopromedio,documentoreferencia) ";
	$sql.="SELECT idsucursal,idarticulo,descuento,cantidad,'".$consecutivoDian."',preciounitario,impuestoiva,impuestoconsumo,baseunitario, ";
	$sql.="idconceptofacturacion,idtipoimpuesto,costoventa,costopromedio,documentoreferencia FROM {$this->table} ";
	$sql.="WHERE idsucursal = ".$_SESSION["idsucursal"]." ";
	$sql.="AND consecutivo = '{$this->consecutivo}' AND idconceptofacturacion = {$this->idconceptofacturacion}";

	$this->conexion->StartTrans();
	$this->conexion->execute($sql);
	$flag = $this->conexion->CompleteTrans();

	//si la insercción falla
	if(!$flag)
	//1			
	{
		return $flag;
				}
				//1
				else
					//6
					{

	$sqlinventario ="SELECT tem.idarticulo,tem.idarticulo,tem.cantidad,tem.existenciactual,con.idtipotransaccion,art.costoactual,tem.preciounitario,tem.costopromedio,tem.existenciactual FROM {$this->table} as tem ";
	$sqlinventario.="INNER JOIN articulos as art ON tem.idarticulo = art.idarticulo ";
	$sqlinventario.="INNER JOIN conceptosfacturacion as con ON tem.idconceptofacturacion = con.idconceptofacturacion ";
	$sqlinventario.="WHERE tem.idsucursal = ".$_SESSION["idsucursal"]." ";
	$sqlinventario.="AND tem.consecutivo = '{$this->consecutivo}' AND tem.idconceptofacturacion = {$this->idconceptofacturacion} ";
	$sqlinventario.="ORDER BY tem.idtemporal ASC";
	
	$rs = $this->conexion->execute($sqlinventario);

	$arreglo = array();
	//1
	while(!$rs->EOF){

		$idarticulo = $rs->fields["idarticulo"];
		$cantidad = $rs->fields["cantidad"];
		$existenciactual = $rs->fields["existenciactual"];
		$idtipotransaccion = $rs->fields["idtipotransaccion"];
		$costoactual = $rs->fields["costoactual"];
		$preciounitario = $rs->fields["preciounitario"];
		$costopromedio = $rs->fields["costopromedio"];
		$existenciactual = $rs->fields["existenciactual"];

        $arreglo[] = array("idarticulo" => $idarticulo, "cantidad" => $cantidad, "existenciactual" => $existenciactual,"idtipotransaccion" => $idtipotransaccion, "costoactual" => $costoactual, "preciounitario" => $preciounitario, "costopromedio" => $costopromedio, "existenciactual" => $existenciactual);
		
		$rs->MoveNext();
	//1
	} 
	//2

	$existenciactual = 0;
	$costo = 0;



	////acá
	foreach ($arreglo as $arreglos) {

	//3
	switch ($arreglos["idtipotransaccion"]) {
		case 1:
			$sqlGet ="UPDATE articulos SET existenciactual = ".$arreglos["existenciactual"].", existenciatemporal = 0 ";
			$sqlGet.="WHERE idarticulo = ".$arreglos["idarticulo"]."";

			//$existencia = $arreglos["cantidad"] - $existencia;

			break;
		case 2:

			//$existenciactual = ($existenciactual + $arreglos["existenciactual"] + $arreglos["cantidad"]);

			$sqlGet ="UPDATE articulos SET existenciactual = ".$arreglos["existenciactual"].", costoactual = ".$arreglos["costopromedio"].", existenciatemporal = 0, costotemporal = 0 ";
			$sqlGet.="WHERE idarticulo = ".$arreglos["idarticulo"]."";

		/*$this->conexion->StartTrans();
		$this->conexion->execute($sqlGet);
		$this->conexion->CompleteTrans();*/

			//$existenciactual = $existenciactual - $arreglos["existenciactual"];
			

			break;
		case 3:
			$sqlGet ="UPDATE articulos SET existenciactual = ".$arreglos["existenciactual"].", existenciatemporal = 0 ";
			$sqlGet.="WHERE idarticulo = ".$arreglos["idarticulo"]."";
			
			//$existencia = $existencia + $arreglos["cantidad"];

			break;
		case 4:

			$sqlGet ="UPDATE articulos SET existenciactual = ".$arreglos["existenciactual"].", existenciatemporal = 0 ";
			$sqlGet.="WHERE idarticulo = ".$arreglos["idarticulo"]."";
			//$existencia = $arreglos["cantidad"] - $existencia;

			break;
		case 5:
			$sqlGet ="UPDATE articulos SET existenciactual = ".$arreglos["existenciactual"].", existenciatemporal = 0 ";
			$sqlGet.="WHERE idarticulo = ".$arreglos["idarticulo"]."";
	
			//$existencia = $existencia + $arreglos["cantidad"];

			break;
		case 6:
		
			$sqlGet ="UPDATE articulos SET existenciactual = ".$arreglos["existenciactual"].", costoactual = ".$arreglos["costopromedio"].", existenciatemporal = 0, costotemporal = 0 ";
			$sqlGet.="WHERE idarticulo = ".$arreglos["idarticulo"]."";

			//$existencia = $arreglos["cantidad"] - $existencia;

		/*$this->conexion->StartTrans();
		$this->conexion->execute($sqlGet);
		$this->conexion->CompleteTrans();*/

			break;
		
		default:
			# code...
			break;
	}

		//$this->conexion->StartTrans();
		//$this->conexion->execute($sqlGet);
		//$this->conexion->CompleteTrans();
	//3
	//6
	}
	//fin acá
	//fin principal flag
	return $flag;
	}
			

}//Fin 	

public function deleteTemporal(){

	$flag = false;

	$sql ="DELETE FROM {$this->table} WHERE consecutivo = '{$this->consecutivo}' ";
	$sql.="AND idsucursal = ".$_SESSION["idsucursal"]." AND idconceptofacturacion = {$this->idconceptofacturacion}";
	//$sql.="AND idcaja = {$this->idcaja} AND id = {$this->id}";

	$this->conexion->StartTrans();
    $this->conexion->execute($sql);
	$flag = $this->conexion->CompleteTrans();

	if ($flag){

		return 1;
	}

		return 2;

  } 

 public function dataMesa(){
	
	$sql ="SELECT temp.consecutivo,temp.documento,temp.idconceptofacturacion,per.nombres,mes.estado,temp.documentoreferencia FROM {$this->table} AS temp ";
	$sql.="INNER JOIN personas as per ON temp.documento = per.documento ";
	$sql.="INNER JOIN mesas as mes ON temp.idmesa = mes.idmesa ";
	$sql.="WHERE temp.idmesa = {$this->idmesa} ";
	$sql.="GROUP BY temp.consecutivo,temp.documento,temp.idconceptofacturacion,per.nombres,mes.estado,temp.documentoreferencia";
	$rs = $this->conexion->execute($sql);

	$arreglo = array();

	while(!$rs->EOF){

	$consecutivo = $rs->fields["consecutivo"];
	$documento = $rs->fields["documento"];
	$idconceptofacturacion = $rs->fields["idconceptofacturacion"];
	$nombres = $rs->fields["nombres"];
	$estado = $rs->fields["estado"];
	$documentoreferencia = $rs->fields["documentoreferencia"];

	$arreglo[] = array('consecutivo' => $consecutivo, 'idconceptofacturacion' => $idconceptofacturacion,'documento' => $documento, 'nombres' => $nombres, 'estado' => $estado, 'documentoreferencia' => $documentoreferencia);

	$rs->MoveNext();
		}
	return $arreglo;	
	
	}

 public function itemMesa(){
	
	$sql ="SELECT COUNT(*) AS total FROM {$this->table} AS temp ";
	$sql.="WHERE temp.idmesa = {$this->idmesa}";

	$rs = $this->conexion->execute($sql);

	$total = $rs->fields["total"];

	return $total;	
	
	}

}//FIN CLASE

?>
