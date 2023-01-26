<?php
//iniciamos la sesión
session_name("loginUsuario");
session_start();

//antes de hacer los cálculos, compruebo que el usuario está logueado
//utilizamos el mismo script que antes
if ($_SESSION["autentificado"] != "y3s") {
    //si no está logueado lo envío a la página de autentificación
    $_SESSION["idcaja"] = $cajaAutorizada["idcaja"];
	$_SESSION["id"] = $cajaAutorizada["id"];
	$_SESSION["idsucursal"] = $cajaAutorizada["idsucursal"];
	$UsuariosCajas->actualizaEstadoCajaClose();
    header ("Location: ../login.php?msg=1");
                                                } 

?>
