<?php

class detallepago extends base{
//PROPIEDADES BASE DE DATOS
  private $iddetallepago;
  private $consecutivodian;
  private $idconceptofacturacion;
  private $idsucursal;
  private $valor;  

//PROPIEDADES MODELO
  private $table;
  private $Rows;	

//PROPIEDADES DISEÑO
  private $num_error;
  private $evento;	
  private $msg; 

public function __construct(){
	$this->base();
	$this->iddetallepago = 0;
	$this->consecutivodian = "";
	$this->idconceptofacturacion = 0;
	$this->idsucursal = 0;
	$this->valor = 0;
	$this->table = "detallepago";
	$this->Rows = 0;
	$this->msg = "";

	date_default_timezone_set("America/Bogota");
	}

//SETTERS 

public function set_iddetallepago($iddetallepago){
	$this->iddetallepago = $iddetallepago;
	return true;
	}	
public function set_consecutivodian($consecutivodian){
	$this->consecutivodian = $consecutivodian;
	return true;
	}	
public function set_idconceptofacturacion($idconceptofacturacion){
	$this->idconceptofacturacion = $idconceptofacturacion;
	return true;
	}	
public function set_idsucursal($idsucursal){
	$this->idsucursal = $idsucursal;
	return true;
	}
public function set_valor($valor){
	$this->valor = $valor;
	return true;
	}	
//FIN SETTERS 

public function get_iddetallepago(){
	return $this->iddetallepago;
	}  
public function get_consecutivodian(){
	return $this->consecutivodian;
	}	
public function get_idconceptofacturacion(){
	return $this->idconceptofacturacion;
	}	
public function get_idsucursal(){
	return $this->idsucursal;
	}
public function get_valor(){
	return $this->valor;
	}	
public function get_Rows(){
	return $this->Rows;
	}
public function get_msg(){
	return $this->msg;
	}	
	
//FIN GETTERS

public function detallePago(){
	
	$sql ="SELECT valor, CASE ";
	$sql.="WHEN iddetallepago = 1 THEN 'EFECTIVO' ";
	$sql.="WHEN iddetallepago = 2 THEN 'TARJETA DEBITO' ";
	$sql.="WHEN iddetallepago = 3 THEN 'TARJETA CREDITO' ";
	$sql.="WHEN iddetallepago = 4 THEN 'BONO' ";
	$sql.="ELSE 'CREDITO' END AS formapago ";
	$sql.="FROM {$this->table} ";
	$sql.="WHERE idsucursal = {$this->idsucursal} AND idconceptofacturacion={$this->idconceptofacturacion} AND consecutivodian = '{$this->consecutivodian}'";
	$rs = $this->conexion->execute($sql);
	
	$arreglo = array();
	
	while(!$rs->EOF){
		$formapago = $rs->fields["formapago"];
		$valor = $rs->fields["valor"];
		$arreglo[] = array('formapago' => $formapago,'valor' => $valor);
		$rs->MoveNext();
		}
	return $arreglo;
	
	}

public function detallePagoFiscal($fecha){
	
	$sql ="SELECT fp.iddetallepago,sum(fp.valor) AS valor, CASE ";
	$sql.="WHEN iddetallepago = 1 THEN 'EFECTIVO' ";
	$sql.="WHEN iddetallepago = 2 THEN 'TARJETA DEBITO' ";
	$sql.="WHEN iddetallepago = 3 THEN 'TARJETA CREDITO' ";
	$sql.="WHEN iddetallepago = 4 THEN 'BONO' ";
	$sql.="WHEN iddetallepago = 6 THEN 'CREDITO' ";
	$sql.="END AS formapago ";
	$sql.="FROM {$this->table} AS fp ";
	$sql.="INNER JOIN transacciones AS tra ON fp.idconceptofacturacion = tra.idconceptofacturacion ";
	$sql.="AND fp.consecutivodian = tra.consecutivodian AND fp.idsucursal = tra.idsucursal ";
	$sql.="INNER JOIN conceptosfacturacion AS con ON tra.idsucursal = con.idsucursal AND con.idconceptofacturacion = tra.idconceptofacturacion ";
	$sql.="INNER JOIN tipostransacciones AS tip ON con.idtipotransaccion = tip.idtipotransaccion ";
	$sql.="WHERE fp.idsucursal = {$this->idsucursal} AND tra.fechacreacion = '{$fecha}' ";
	//$sql.="AND tra.horacreacion BETWEEN {$horainicio} AND {$horafinal} ";
	$sql.="AND tip.idtipotransaccion = 1 ";
	$sql.="GROUP BY fp.iddetallepago";

	$rs = $this->conexion->execute($sql);
	
	$arreglo = array();
	
	while(!$rs->EOF){
		$iddetallepago = $rs->fields["iddetallepago"];
		$formapago = $rs->fields["formapago"];
		$valor = $rs->fields["valor"];
		$arreglo[] = array('formapago' => $formapago,'valor' => $valor, 'iddetallepago' => $iddetallepago);
		$rs->MoveNext();
		}
	return $arreglo;
	
	}

public function detallePagoFiscaldV($fecha){
	
	$sql ="SELECT fp.iddetallepago,sum(fp.valor) AS valor, CASE ";
	$sql.="WHEN iddetallepago = 1 THEN 'EFECTIVO' ";
	$sql.="WHEN iddetallepago = 2 THEN 'TARJETA DEBITO' ";
	$sql.="WHEN iddetallepago = 3 THEN 'TARJETA CREDITO' ";
	$sql.="WHEN iddetallepago = 4 THEN 'BONO' ";
	$sql.="WHEN iddetallepago = 6 THEN 'CREDITO' ";
	$sql.="END AS formapago ";
	$sql.="FROM {$this->table} AS fp ";
	$sql.="INNER JOIN transacciones AS tra ON fp.idconceptofacturacion = tra.idconceptofacturacion ";
	$sql.="AND fp.consecutivodian = tra.consecutivodian AND fp.idsucursal = tra.idsucursal ";
	$sql.="INNER JOIN conceptosfacturacion AS con ON tra.idsucursal = con.idsucursal AND con.idconceptofacturacion = tra.idconceptofacturacion ";
	$sql.="INNER JOIN tipostransacciones AS tip ON con.idtipotransaccion = tip.idtipotransaccion ";
	$sql.="WHERE fp.idsucursal = {$this->idsucursal} AND tra.fechacreacion = '{$fecha}' ";
	//$sql.="AND tra.horacreacion BETWEEN {$horainicio} AND {$horafinal} ";
	$sql.="AND tip.idtipotransaccion = 5 ";
	$sql.="GROUP BY fp.iddetallepago";

	$rs = $this->conexion->execute($sql);
	
	$arreglo = array();
	
	while(!$rs->EOF){
		$iddetallepago = $rs->fields["iddetallepago"];
		$formapago = $rs->fields["formapago"];
		$valor = $rs->fields["valor"];
		$arreglo[] = array('formapago' => $formapago,'valor' => $valor, 'iddetallepago' => $iddetallepago);
		$rs->MoveNext();
		}
	return $arreglo;
	
	}

public function detallePagoFiscalResumen($fecha){
	
	$sql ="SELECT fp.iddetallepago,sum(fp.valor) AS valor, CASE ";
	$sql.="WHEN iddetallepago = 1 THEN 'EFECTIVO' ";
	$sql.="WHEN iddetallepago = 2 THEN 'TARJETA DEBITO' ";
	$sql.="WHEN iddetallepago = 3 THEN 'TARJETA CREDITO' ";
	$sql.="WHEN iddetallepago = 4 THEN 'BONO' ";
	$sql.="WHEN iddetallepago = 6 THEN 'CREDITO' ";
	$sql.="END AS formapago ";
	$sql.="FROM {$this->table} AS fp ";
	$sql.="INNER JOIN transacciones AS tra ON fp.idconceptofacturacion = tra.idconceptofacturacion ";
	$sql.="AND fp.consecutivodian = tra.consecutivodian AND fp.idsucursal = tra.idsucursal ";
	$sql.="INNER JOIN conceptosfacturacion AS con ON tra.idsucursal = con.idsucursal AND con.idconceptofacturacion = tra.idconceptofacturacion ";
	$sql.="INNER JOIN tipostransacciones AS tip ON con.idtipotransaccion = tip.idtipotransaccion ";
	$sql.="WHERE fp.idsucursal = {$this->idsucursal} AND tra.fechacreacion = '{$fecha}' ";
	//$sql.="AND tra.horacreacion BETWEEN {$horainicio} AND {$horafinal} ";
	$sql.="AND (tip.idtipotransaccion = 1 OR tip.idtipotransaccion = 5) ";
	$sql.="GROUP BY fp.iddetallepago";

	$rs = $this->conexion->execute($sql);
	
	$arreglo = array();
	
	while(!$rs->EOF){
		$iddetallepago = $rs->fields["iddetallepago"];
		$formapago = $rs->fields["formapago"];
		$valor = $rs->fields["valor"];
		$arreglo[] = array('formapago' => $formapago,'valor' => $valor, 'iddetallepago' => $iddetallepago);
		$rs->MoveNext();
		}
	return $arreglo;
	
	}


public function store(){
	$flag = false;
	$params = array();
	$id = 0;

	$params[] = $this->idsucursal;
	$params[] = $this->idconceptofacturacion;
	$params[] = $this->consecutivodian;
	$params[] = $this->valor;
	$params[] = $this->iddetallepago;

    $sql ="INSERT INTO {$this->table} (idsucursal,idconceptofacturacion,consecutivodian,valor,iddetallepago)";	
    $sql.="VALUES (?,?,?,?,?)";
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

