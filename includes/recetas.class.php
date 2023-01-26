<?php

class recetas extends base{
	
//PROPIEDADES BASE DE DATOS
  private $idarticulo;
  private $idarticuloterminado;
  private $cantidad;

//PROPIEDADES MODELO
  private $table;
  private $Rows;	

//PROPIEDADES DISEÑO
  private $num_error;
  private $evento;	
  private $msg;
	
public function __construct(){
	$this->base();
	$this->idarticulo = 0;
	$this->idarticuloterminado = 0;
	$this->cantidad = 0;
	$this->table = "recetas";
	$this->Rows = 0;
	$this->msg = "";

	date_default_timezone_set("America/Bogota");
	}
	
//SETTERS

public function set_idarticulo($idarticulo){
	$this->idarticulo = $idarticulo;
	return true;	
	}
public function set_idarticuloterminado($idarticuloterminado){
	$this->idarticuloterminado = $idarticuloterminado;
	return true;
	}	
public function set_cantidad($cantidad){
	$this->cantidad = $cantidad;
	return true;
	}
//FIN SETTERS

// GETTERS

public function get_idarticulo(){
	return $this->idarticulo;
    }
public function get_idarticuloterminado(){
	return $this->idarticuloterminado;
	}	
public function get_cantidad(){
	return $this->cantidad;
	}	
public function get_Rows(){
	return $this->Rows;
	}
public function get_msg(){
	return $this->msg;
	}
public function get_created_at(){
	return $this->created_at;
	}
public function get_updated_at(){
	return $this->updated_at;
	}
//FIN GETTERS	
	
public function listar_recetas(){
	
	$sql ="SELECT * FROM articulos ";
	$sql.="WHERE idarticulo IN (SELECT idarticuloterminado from recetas) ";
	$sql.="ORDER BY nombrearticulo ASC";
	$rs = $this->conexion->execute($sql);
	
	$arreglo = array();
	
	while(!$rs->EOF){
		$idarticulo = $rs->fields["idarticulo"];
		$nombrearticulo =$rs->fields["nombrearticulo"];
		
		$arreglo[] = array('idarticulo' => $idarticulo,'nombrearticulo' => $nombrearticulo);
		$rs->MoveNext();
		}
	return $arreglo;
	
	}

public function loadReceta(){
	
	$sql ="SELECT rec.*,art.nombrearticulo FROM {$this->table} AS rec ";
	$sql.="INNER JOIN articulos AS art ON rec.idarticulo = art.idarticulo ";
	$sql.="WHERE rec.idarticuloterminado = {$this->idarticuloterminado}";
	$rs = $this->conexion->execute($sql);
	
	$arreglo = array();
	
	while(!$rs->EOF){
		$idarticuloterminado = $rs->fields["idarticuloterminado"];
		$nombrearticulo =$rs->fields["nombrearticulo"];
		$cantidad =$rs->fields["cantidad"];
		
		$arreglo[] = array('nombrearticulo' => $nombrearticulo, 'cantidad' => $cantidad);
		$rs->MoveNext();
		}
	return $arreglo;

	}

public function autocompletar($q){
	
	$articulos=array();
	
	$sql ="SELECT nombrearticulo,precioventa1,idarticulo,costoactual,impuestoconsumo,impuestoiva,existenciactual FROM {$this->table} WHERE (nombrearticulo like '%$q%' OR codigoarticulo like '%$q%') AND facturable = 1";
	//$sql.="OR codigoarticulo like '%$q%'";
	$rs = $this->conexion->execute($sql);
	
	return $rs;
}

public function store(){

	$flag = false;
	$params = array();
	$id = 0;

	$params[] = $this->idarticulo;
	$params[] = $this->idarticuloterminado;
	$params[] = $this->cantidad;
	

	$sql = "INSERT INTO {$this->table} (idarticulo,idarticuloterminado, ";
	$sql.="cantidad)";				
	$sql.= "VALUES (?,?,?)";
	$this->conexion->StartTrans();
    $this->conexion->execute($sql,$params);
	$flag = $this->conexion->CompleteTrans();


	if ($flag){
		return 1;
	}
		return 2;
}

public function load(){


}

public function update(){

	$flag = false;
	$params = array();
	$id = 0;

	$params[] = $this->idarticulo;
	$params[] = $this->idarticuloterminado;
	$params[] = $this->cantidad;	

	$sql = "UPDATE {$this->table} SET idarticulo=(?),idarticuloterminado=(?), ";
	$sql.="cantidad=(?)";	
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