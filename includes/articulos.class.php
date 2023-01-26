<?php

class articulos extends base{
	
//PROPIEDADES BASE DE DATOS
  private $idarticulo;
  private $nombrearticulo;
  private $idtipoimpuesto;
  private $codigoarticulo;
  private $precioventa1;
  private $impuestoiva;
  private $impuestoconsumo;
  private $bloqueanegativos;
  private $creted_at;
  private $updated_at;
  private $stockminimo;
  private $stockmaximo;
  private $existenciactual;
  private $existenciainicial;
  private $costoactual;
  private $costoinicial;
  private $facturable;
  private $habilitar;
  private $idclasificacion1;
  private $idclasificacion2;
  private $existenciatemporal;
  private $costotemporal;

//PROPIEDADES MODELO
  private $table;
  private $Rows;	

//PROPIEDADES DISEÑO
  private $num_error;
  private $evento;	
  private $msg;
	
public function __construct(){
	$this->base();
	$this->idarticulo = "0";
	$this->nombrearticulo = "";
	$this->idtipoimpuesto = 0;
	$this->codigoarticulo = "";
	$this->precioventa1 = 0;
	$this->impuestoiva = 0;
	$this->impuestoconsumo = 0;
	$this->bloqueanegativos = 0;
	$this->creted_at = 0;
	$this->updated_at = 0;
	$this->stockmaximo = 0;
	$this->stockminimo = 0;
	$this->existenciactual = 0;
	$this->existenciainicial = 0;
	$this->costoactual = 0;
	$this->costoinicial = 0;
	$this->facturable = 0;
	$this->habilitar = 0;
	$this->idclasificacion1 = 0;
	$this->idclasificacion2 = 0;
	$this->existenciatemporal = 0;
	$this->costotemporal = 0;
	$this->table = "articulos";
	$this->Rows = 0;
	$this->msg = "";

	date_default_timezone_set("America/Bogota");
	}
	
//SETTERS

public function set_idarticulo($idarticulo){
	$this->idarticulo = $idarticulo;
	return true;	
	}
public function set_nombrearticulo($nombrearticulo){
	$this->nombrearticulo = $nombrearticulo;
	return true;
	}	
public function set_idtipoimpuesto($idtipoimpuesto){
	$this->idtipoimpuesto = $idtipoimpuesto;
	return true;
	}	
public function set_codigoarticulo($codigoarticulo){
	$this->codigoarticulo = $codigoarticulo;
	return true;
	}
public function set_precioventa1($precioventa1){
	$this->precioventa1 = $precioventa1;
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
public function set_bloqueanegativos($bloqueanegativos){
	$this->bloqueanegativos = $bloqueanegativos;
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
public function set_stockminimo($stockminimo){
	$this->stockminimo = $stockminimo;
	return true;
	}
public function set_stockmaximo($stockmaximo){
	$this->stockmaximo = $stockmaximo;
	return true;
	}
public function set_existenciactual($existenciactual){
	$this->existenciactual = $existenciactual;
	return true;
	}
public function set_existenciainicial($existenciainicial){
	$this->existenciainicial = $existenciainicial;
	return true;
	}
public function set_costoactual($costoactual){
	$this->costoactual = $costoactual;
	return true;
	}
public function set_costoinicial($costoinicial){
	$this->costoinicial = $costoinicial;
	return true;
	}
public function set_facturable($facturable){
	$this->facturable = $facturable;
	return true;
	}
public function set_habilitar($habilitar){
	$this->habilitar = $habilitar;
	return true;
	}
public function set_idclasificacion1($idclasificacion1){
	$this->idclasificacion1 = $idclasificacion1;
	return true;
	}	
public function set_idclasificacion2($idclasificacion2){
	$this->idclasificacion2 = $idclasificacion2;
	return true;
	}
public function set_existenciatemporal($existenciatemporal){
	$this->existenciatemporal = $existenciatemporal;
	return true;
	}
public function set_costotemporal($costotemporal){
	$this->costotemporal = $costotemporal;
	return true;
	}
//FIN SETTERS

// GETTERS

public function get_idarticulo(){
	return $this->idarticulo;
    }
public function get_nombrearticulo(){
	return $this->nombrearticulo;
	}	
public function get_idtipoimpuesto(){
	return $this->idtipoimpuesto;
	}	
public function get_codigoarticulo(){
	return $this->codigoarticulo;
	}	
public function get_Rows(){
	return $this->Rows;
	}
public function get_msg(){
	return $this->msg;
	}
public function get_precioventa1(){
	return $this->precioventa1;
	}
public function get_impuestoiva(){
	return $this->impuestoiva;
	}
public function get_impuestoconsumo(){
	return $this->impuestoconsumo;
	}
public function get_bloqueanegativos(){
	return $this->bloqueanegativos;
	}
public function get_created_at(){
	return $this->created_at;
	}
public function get_updated_at(){
	return $this->updated_at;
	}
public function get_stockminimo(){
	return $this->stockminimo;
	}
public function get_stockmaximo(){
	return $this->stockmaximo;
	}
public function get_existenciactual(){
	return $this->existenciactual;
	}
public function get_existenciainicial(){
	return $this->existenciainicial;
	}	
public function get_costoactual(){
	return $this->costoactual;
	}	
public function get_costoinicial(){
	return $this->costoinicial;
	}	
public function get_facturable(){
	return $this->facturable;
	}	
public function get_habilitar(){
	return $this->habilitar;
	}
public function get_idclasificacion1(){
	return $this->idclasificacion1;
	}
public function get_idclasificacion2(){
	return $this->idclasificacion2;
	}
public function get_existenciatemporal(){
	return $this->existenciatemporal;
	}
public function get_costotemporal(){
	return $this->costotemporal;
	}
//FIN GETTERS	
	
public function listado_articulos(){
	
	$sql = "SELECT * FROM {$this->table} ORDER BY nombrearticulo ASC";
	$rs = $this->conexion->execute($sql);
	
	$arreglo = array();
	
	while(!$rs->EOF){
		$idarticulo = $rs->fields["idarticulo"];
		$codigoarticulo =$rs->fields["codigoarticulo"];
		$nombrearticulo = $rs->fields["nombrearticulo"];
		$precioventa1 = $rs->fields["precioventa1"];
		$costoactual = $rs->fields["costoactual"];
		$existenciactual = $rs->fields["existenciactual"];
		$impuestoiva = $rs->fields["impuestoiva"];
		$impuestoconsumo = $rs->fields["impuestoconsumo"];

		$arreglo[] = array('idarticulo' => $idarticulo,'nombrearticulo' => $nombrearticulo, 'precioventa1' => $precioventa1, 'codigoarticulo' => $codigoarticulo, 'costoactual' => $costoactual, 'existenciactual' => $existenciactual, 'impuestoconsumo' => $impuestoconsumo);
		$rs->MoveNext();
		}
	return $arreglo;
	
	}

public function articulos(){
	
	$sql = "SELECT idarticulo FROM {$this->table} ORDER BY nombrearticulo ASC";
	$rs = $this->conexion->execute($sql);
	
	$arreglo = array();
	
	while(!$rs->EOF){
		$idarticulo = $rs->fields["idarticulo"];
		
		$arreglo[] = array('idarticulo' => $idarticulo);
		$rs->MoveNext();
		}
	return $arreglo;
	
	}

public function loadArticulo(){
	
	$sql = "SELECT * FROM {$this->table} WHERE idarticulo = {$this->idarticulo}";
	$rs = $this->conexion->execute($sql);
	
	if ($rs===false) return false;

	$this->idarticulo = $rs->fields["idarticulo"];
	$this->codigoarticulo = $rs->fields["codigoarticulo"];
	$this->nombrearticulo = $rs->fields["nombrearticulo"];
	$this->precioventa1 = $rs->fields["precioventa1"];
	$this->impuestoconsumo = $rs->fields["impuestoconsumo"];
	$this->impuestoiva = $rs->fields["impuestoiva"];
	$this->idtipoimpuesto = $rs->fields["idtipoimpuesto"];
	$this->costoactual = $rs->fields["costoactual"];
	$this->existenciactual = $rs->fields["existenciactual"];
	$this->costotemporal = $rs->fields["costotemporal"];
	
	return true;

	}

public function autocompletar($q){
	
	$articulos=array();
	
	$sql ="SELECT nombrearticulo,precioventa1,idarticulo,costoactual,impuestoconsumo,impuestoiva,existenciactual,existenciatemporal,costotemporal FROM {$this->table} WHERE (nombrearticulo like '%$q%' OR codigoarticulo like '%$q%') AND facturable = 1";
	//$sql.="OR codigoarticulo like '%$q%'";
	$rs = $this->conexion->execute($sql);
	
	return $rs;
}

public function store(){

	$flag = false;
	$params = array();
	$id = 0;

	$params[] = $this->nombrearticulo;
	$params[] = $this->codigoarticulo;
	$params[] = $this->bloqueanegativos;
	$params[] = $this->created_at;
	$params[] = $this->updated_at;
	$params[] = $this->stockminimo;
	$params[] = $this->stockmaximo;
	$params[] = $this->costoinicial;
	$params[] = $this->facturable;
	$params[] = $this->habilitar;
	$params[] = $this->precioventa1;
	$params[] = $this->impuestoiva;
	$params[] = $this->impuestoconsumo;
	$params[] = $this->idtipoimpuesto;
	$params[] = $this->idclasificacion1;
	$params[] = $this->idclasificacion2;	

	$sql = "INSERT INTO {$this->table} (nombrearticulo,codigoarticulo, ";
	$sql.="bloqueanegativos,created_at,updated_at,stockminimo,stockmaximo,costoinicial, ";			
	$sql.="facturable,habilitar,precioventa1,impuestoiva,impuestoconsumo,idtipoimpuesto,idclasificacion1,idclasificacion2) ";	
	$sql.= "VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
	$this->conexion->StartTrans();
    $this->conexion->execute($sql,$params);
	$flag = $this->conexion->CompleteTrans();


	if ($flag){
		return 1;
	}
		return 2;
}

public function load(){

	$sql = "SELECT * FROM {$this->table} WHERE idarticulo = {$this->idarticulo}";
	$rs = $this->conexion->execute($sql);
	$arreglo = array();

	while(!$rs->EOF){

		$idarticulo = $rs->fields["idarticulo"];
		$nombrearticulo = $rs->fields["nombrearticulo"];
		$codigoarticulo = $rs->fields["codigoarticulo"];
		$bloqueanegativos = $rs->fields["bloqueanegativos"];
		$stockminimo = $rs->fields["stockminimo"];
		$stockmaximo = $rs->fields["stockmaximo"];
		$existenciactual = $rs->fields["existenciactual"];
		$existenciainicial = $rs->fields["existenciainicial"];
		$costoactual = $rs->fields["costoactual"];
		$costoinicial = $rs->fields["costoinicial"];
		$facturable = $rs->fields["facturable"];
		$habilitar = $rs->fields["habilitar"];
		$idclasificacion1 = $rs->fields["idclasificacion1"];
		$idclasificacion2 = $rs->fields["idclasificacion2"];
		$precioventa1 = $rs->fields["precioventa1"];
		$impuestoiva = $rs->fields["impuestoiva"];
		$impuestoconsumo = $rs->fields["impuestoconsumo"];
		$idtipoimpuesto = $rs->fields["idtipoimpuesto"];
		$costotemporal = $rs->fields["costotemporal"];

 	$arreglo[$idarticulo] = array('nombrearticulo' => $nombrearticulo,'codigoarticulo' => $codigoarticulo, 'bloqueanegativos' => $bloqueanegativos, 'stockminimo' => $stockminimo, 'stockmaximo' => $stockmaximo,'existenciactual' => $existenciactual, 'existenciainicial' => $existenciainicial, 'costoactual' => $costoactual, 'costoinicial' => $costoinicial, 'facturable' => $facturable, 'habilitar' => $habilitar,'idclasificacion1' => $idclasificacion1, 'idclasificacion2' => $idclasificacion2, 'precioventa1' => $precioventa1, 'impuestoiva' => $impuestoiva, 'impuestoconsumo' => $impuestoconsumo,'idarticulo' => $idarticulo,'idtipoimpuesto' => $idtipoimpuesto, 'costotemporal' => $costotemporal);

    $rs->MoveNext();

	}

	return $arreglo;
}

public function update(){

	$flag = false;
	$params = array();
	$id = 0;

	$params[] = $this->nombrearticulo;
	$params[] = $this->codigoarticulo;
	$params[] = $this->bloqueanegativos;
	$params[] = $this->updated_at;
	$params[] = $this->stockminimo;
	$params[] = $this->stockmaximo;
	$params[] = $this->costoinicial;
	$params[] = $this->facturable;
	$params[] = $this->habilitar;
	$params[] = $this->precioventa1;
	$params[] = $this->impuestoiva;
	$params[] = $this->impuestoconsumo;
	$params[] = $this->idtipoimpuesto;
	$params[] = $this->idclasificacion1;
	$params[] = $this->idclasificacion2;
	$params[] = $this->costoactual;	

	$sql = "UPDATE {$this->table} SET nombrearticulo=(?),codigoarticulo=(?), ";
	$sql.="bloqueanegativos=(?),updated_at=(?),stockminimo=(?),stockmaximo=(?),costoinicial=(?),facturable=(?),habilitar=(?),precioventa1=(?), ";			
	$sql.="impuestoiva=(?),impuestoconsumo=(?),idtipoimpuesto=(?),idclasificacion1=(?),idclasificacion2=(?),costoactual=(?) ";	
	$sql.="WHERE idarticulo = {$this->idarticulo}";
	$this->conexion->StartTrans();
	$this->conexion->execute($sql,$params);
	$flag = $this->conexion->CompleteTrans();

	if ($flag){
		return 1;
	}
		return 2;
  }


public function actualizarExistencia(){

	$flag = false;
	$params = array();
	$id = 0;

	$params[] = $this->existenciactual;


	$sql = "UPDATE {$this->table} SET existenciactual=(?) ";	
	$sql.="WHERE idarticulo = {$this->idarticulo}";
	$this->conexion->StartTrans();
	$this->conexion->execute($sql,$params);
	$flag = $this->conexion->CompleteTrans();

	if ($flag){
		return 1;
	}
		return 2;
  }


 public function updateExistencia(){

	$flag = false;
	$params = array();
	$id = 0;

	//$params[] = $this->existenciatemporal;
	$params[] = $this->existenciactual;

	$sql = "UPDATE {$this->table} SET existenciactual=(?) ";
	$sql.="WHERE idarticulo = {$this->idarticulo}";
	$this->conexion->StartTrans();
	$this->conexion->execute($sql,$params);
	$flag = $this->conexion->CompleteTrans();

	if ($flag){
		return 1;
	}
		return 2;
  }


public function updateExistencia1(){

	$flag = false;
	$params = array();
	$id = 0;

	$params[] = $this->existenciatemporal;

	$sql = "UPDATE {$this->table} SET existenciatemporal=(?) ";
	$sql.="WHERE idarticulo = {$this->idarticulo}";
	$this->conexion->StartTrans();
	$this->conexion->execute($sql,$params);
	$flag = $this->conexion->CompleteTrans();

	if ($flag){
		return 1;
	}
		return 2;
  }


public function updateCostotemporal(){

	$flag = false;
	$params = array();
	$id = 0;

	$params[] = $this->costotemporal;


	$sql = "UPDATE {$this->table} SET costotemporal=(?) ";
	$sql.="WHERE idarticulo = {$this->idarticulo}";
	$this->conexion->StartTrans();
	$this->conexion->execute($sql,$params);
	$flag = $this->conexion->CompleteTrans();

	if ($flag){
		return 1;
	}
		return 2;
  }


  public function updateCostoActual(){

	$flag = false;
	$params = array();
	$id = 0;

	$params[] = $this->costoactual;


	$sql = "UPDATE {$this->table} SET costoactual=(?) ";
	$sql.="WHERE idarticulo = {$this->idarticulo}";
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