<?php

class temporal2 extends base{	

//PROPIEDADES BASE DE DATOS
  //private $idtemporal;
  private $idarticulo;
  private $created_at;
  private $updated_at; 
  private $costoventa;
  private $costopromedio;
  private $existenciactual;
  private $existenciatemporal;

//PROPIEDADES MODELO
  private $table;
  private $Rows;	

//PROPIEDADES DISEÑO
  private $num_error;
  private $evento;	
  private $msg; 

public function __construct(){
	$this->base();
	//$this->idtemporal = 0;
	$this->existenciatemporal = 0;
	$this->idarticulo = 0;
	$this->created_at = "";
	$this->updated_at = "";
	$this->costoventa = 0;
	$this->costopromedio = 0;
	$this->existenciactual = 0;
	$this->table = "temporal2";
	$this->Rows = 0;
	$this->msg = "";
	}

//SETTERS 

public function set_idtemporal($idtemporal){
	$this->idtemporal = $idtemporal;
	return true;
	}
public function set_idarticulo($idarticulo){
	$this->idarticulo = $idarticulo;
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
public function set_costoventa($costoventa){
	$this->costoventa = $costoventa;
	return true;
	}
public function set_costopromedio($costopromedio){
	$this->costopromedio = $costopromedio;
	return true;
	}
/*public function set_idtemporal($idtemporal){
	$this->idtemporal = $idtemporal;
	return true;
	}*/
public function set_existenciactual($existenciactual){
	$this->existenciactual = $existenciactual;
	return true;
	}
public function set_existenciatemporal($existenciatemporal){
	$this->existenciatemporal = $existenciatemporal;
	return true;
	}
//FIN SETTERS 

/*public function get_idtemporal(){
	return $this->idtemporal;
	}*/
public function get_idarticulo(){
	return $this->idarticulo;
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
public function get_costoventa(){
	return $this->costoventa;
	}
public function get_costopromedio(){
	return $this->costopromedio;
	}
public function get_existenciatemporal(){
	return $this->existenciatemporal;
	}
public function get_existenciactual(){
	return $this->existenciactual;
	}
//FIN GETTERS	

public function store(){

	$flag = false;
	$params = array();
	$id = 0;

	//$params[] = $this->idtemporal;
	$params[] = $this->idarticulo;
	$params[] = $this->costoventa;
	$params[] = $this->costopromedio;
	$params[] = $this->existenciactual;
	$params[] = $this->existenciatemporal;
	
 $sql ="INSERT INTO {$this->table} (idarticulo, ";
 $sql.="costoventa,costopromedio,existenciactual,existenciatemporal)";   
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
