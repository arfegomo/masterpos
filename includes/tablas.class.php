<?php

class tablas extends base{
	
//PROPIEDADES BASE DE DATOS
  private $idtabla;
  private $nombretabla;
  private $tabla;
	
//PROPIEDADES MODELO
  private $table;
  private $Rows;

//PROPIEDADES DISEÑO
  private $num_error;
  private $evento;	
  private $msg;

public function __construct(){
	$this->base();
	$this->idtabla = 0;
	$this->nombretabla = "";
	$this->table = "tablas";
	$this->Rows = 0;
	$this->msg = "";

	date_default_timezone_set("America/Bogota");
    }

//SETTERS

public function set_nombretabla($nombretabla){
	$this->nombretabla = $nombretabla;
	return true;
    }
public function set_tabla($tabla){
	$this->tabla = $tabla;
	return true;
    }

//FIN SETTERS

//GETTERS

public function get_nombretabla(){
	return $this->nombretabla;
    }
public function get_tabla(){
	return $this->tabla;
    }

//FIN GETTERS

public function listado_tablas(){

	$sql = "SELECT * FROM {$this->table} ORDER BY nombretabla ASC";
	$rs = $this->conexion->execute($sql);
	
	$arreglo = array();

	while(!$rs->EOF){
		$idtabla = $rs->fields["idtabla"];
		$nombretabla = $rs->fields["nombretabla"];
		$tabla = $rs->fields["tabla"];
		$arreglo[] = array('idtabla' => $idtabla,'nombretabla' => $nombretabla,'tabla' => $tabla);
		$rs->MoveNext();
	}
	
	return $arreglo;
  }
  
public function store(){
	
	$flag = false;
	$params = array();
	$id = 0;
	
	$params[] = $this->nombretabla;
	$params[] = $this->tabla;
	
	$sql ="INSERT INTO {$this->table} (nombretabla,tabla)";
	$sql.="VALUES (?,?)";
	$this->conexion->StartTrans();
    $this->conexion->execute($sql,$params);
	$flag = $this->conexion->CompleteTrans();
	
	if ($flag){
		return 1;
	}
		return 2;
	
	}  

}

//Fin de la Clase

?>