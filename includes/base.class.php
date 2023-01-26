<?php
define('ADODB_ASSOC_CASE', 0);
//$ADODB_CACHE_DIR	="/archivos_web/cache/";

require_once("adodb/adodb.inc.php");
error_reporting(E_ALL ^ E_DEPRECATED);
$ADODB_FETCH_MODE	=ADODB_FETCH_ASSOC;

class base {
var $resultado;
var $error=false;
var $error_mensaje="";

var $CONFIG;
var $DOM;
var $RUTAS;
var $ROLES;
var $CODIGO;

var $conexion;
var $conn = array();

var $obj = array();

var $tabla_clase;
var $llave_primaria_clase;

function base() {
	global $CONFIG;
	$this->CONFIG=&$CONFIG;

	$pos=$CONFIG["BASE_DE_DATOS"];

	$this->conexion = NewADOConnection($CONFIG["DRIVER_DB"][$pos]);
	if(!empty($CONFIG["NLS_DATE_FORMAT"][$pos])) {
		$this->conexion->NLS_DATE_FORMAT=$CONFIG["NLS_DATE_FORMAT"][$pos];
	}

	$this->conexion->Connect($CONFIG["IP_MAQUINA"][$pos], $CONFIG["USUARIO_DB"][$pos], $CONFIG["CLAVE_DB"][$pos],$CONFIG["NOMBRE_DB"][$pos]);

	if(!$this->conexion->IsConnected()) {
		$this->error=true;
		echo "No es posible conectarse a la base de datos. Por favor contacte al admnistrador del sistema.";
		//$this->error_mensaje="No se pudo conectar a la base de datos.";
	}

//$this->conexion->LogSQL();
//$this->conexion->debug=true; //depurar los errores
$this->conexion->execute("SET NAMES utf8");
}

}//FIN DE LA CLASE
?>
