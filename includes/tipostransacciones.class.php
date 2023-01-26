<?php

class tipostransacciones extends base{
	
//PROPIEDADES BASE DE DATOS
  private $idtipotransaccion;
  private $nombretipotransaccion;
  private $created_at;
  private $updated_at;
  
//PROPIEDADES MODELO
  private $table;
  private $Rows;	

//PROPIEDADES DISEÑO
  private $num_error;
  private $evento;	
  private $msg;	
   
public function __construct(){
	$this->base();
	$this->idtipotransaccion = "0";
	$this->nombretipotransaccion = "";
	$this->created_at = "";
	$this->updated_at = "";
	$this->table = "tipostransacciones";
	$this->Rows = 0;
	$this->msg = "";

	date_default_timezone_set("America/Bogota");
	}  
	
//SETTERS

public function set_idtipotransaccion($idtipotransaccion){
	$this->idtipotransaccion = $idtipotransaccion;
	return true;
	}
public function set_nombretipotransaccion($nombretipotransaccion){
	$this->nombretipotransaccion = $nombretipotransaccion;
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
		
//FIN SETTERS

//GETTERS

public function get_idtipotransaccion(){
	return $this->idtipotransaccion;
	}
public function get_nombretipotransaccion(){
	return $this->nombretipotransaccion;
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
	
//FIN GETTERS

public function listado_tipostransacciones(){
	
	$sql = "SELECT * FROM {$this->table} ORDER BY nombretipotransaccion ASC";
	$rs = $this->conexion->execute($sql);
	
	$arreglo = array();
	
	while(!$rs->EOF){
		$idtipotransaccion = $rs->fields["idtipotransaccion"];
		$nombretipotransaccion = $rs->fields["nombretipotransaccion"];
		$arreglo[] = array('idtipotransaccion' => $idtipotransaccion, 'nombretipotransaccion' => $nombretipotransaccion);
		$rs->MoveNext();
		}
	 return $arreglo;	
	}
	
public function store(){
	
	$flag = false;
	$params = array();
	$id = 0; 
	
	$params[] = $this->nombretipotransaccion;
	
	$sql ="INSERT INTO {$this->table} (nombretipotransaccion)";
	$sql.="VALUES (?)";
	$this->conexion->StartTrans();
    $this->conexion->execute($sql,$params);
	$flag = $this->conexion->CompleteTrans();
	
	if ($flag){
		return 1;
	}
		return 2;
	
}	
	
public function load(){
	
  $sql = "SELECT * FROM {$this->table} WHERE idtipotransaccion={$this->idtipotransaccion}";
  $rs = $this->conexion->execute($sql);
  $arreglo = array();

	while(!$rs->EOF){

	   $idtipotransaccion = $rs->fields["idtipotransaccion"];	
	   $nombretipotransaccion = $rs->fields["nombretipotransaccion"];
		
       $arreglo[$idtipotransaccion] = array('idtipotransaccion' => $idtipotransaccion, 'nombretipotransaccion' => $nombretipotransaccion);

       $rs->MoveNext();

	   }

	return $arreglo;
  }
  
public function update(){

	$flag = false;
	$params = array();
	$id = 0;

	$params[] = $this->updated_at;
	$params[] = $this->nombretipotransaccion;
	
	$sql ="UPDATE {$this->table} SET updated_at=(?),nombretipotransaccion=(?) ";				
	$sql.="WHERE idtipotransaccion = {$this->idtipotransaccion}";
	$this->conexion->StartTrans();
	$this->conexion->execute($sql,$params);
	$flag = $this->conexion->CompleteTrans();

	if ($flag){
		return 1;
	}
		return 2;
  }		

				
}

//FIN CLASE

?>