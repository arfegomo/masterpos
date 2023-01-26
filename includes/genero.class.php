<?php

class genero extends base{
//PROPIEDADES BASE DE DATOS
  private $idgenero;
  private $nombregenero;

//PROPIEDADES MODELO
  private $table;
  private $Rows;

//PROPIEDADES DISEÑO
  private $num_error;
  private $evento;	
  private $msg;

public function __construct(){
	$this->base();
	$this->idgenero = 0;
	$this->nombregenero = "";
	$this->table = "genero";
	$this->Rows = 0;
	$this->msg = "";

	date_default_timezone_set("America/Bogota");
    }

//SETTERS

public function set_idgenero($idgenero){
	$this->idgenero = $idgenero;
	return true;
    }
public function set_nombregenero($nombregenero){
	$this->nombregenero = $nombregenero;
	return true;
    }
	
//FIN SETTERS

//GETTERS

public function get_idgenero(){
	return $this->idgenero;
    }
public function get_nombregenero(){
	return $this->nombregenero;
    }
//FIN GETTERS

public function listado_genero(){
	
	$sql = "SELECT * FROM {$this->table} ORDER BY nombregenero ASC";
	$rs = $this->conexion->execute($sql);
	$arreglo = array();

	while(!$rs->EOF){
		$idgenero = $rs->fields["idgenero"];
		$nombregenero = $rs->fields["nombregenero"];
		$arreglo[] = array('idgenero' => $idgenero,'nombregenero' => $nombregenero);
		$rs->MoveNext();
	}

	return $arreglo;
  }

}

//Fin de la Clase

?>