    <?php
  //Archivos de conexion base de datos
  include("../../includes/config.php");
  include("../../includes/base.class.php");

  include("../../includes/users.class.php");
  include("../../includes/usuarioscajas.class.php");

	$Users = new users();
	$Users->set_usuario($_POST["usuario"]);
	$Users->set_password($_POST["password"]);
	$usuarioAutorizado = $Users->permite_ingreso();

	if($usuarioAutorizado["val"] == 1){

		$UsuariosCajas = new usuarioscajas();
		$UsuariosCajas->set_id($usuarioAutorizado["id"]);
		$UsuariosCajas->set_idsucursal($_POST["idsucursal"]);
		$UsuariosCajas->set_idcaja($_POST["idcaja"]);
		//valida si esta asignado a la caja y si la caja esta cerrada
		$cajaAutorizada = $UsuariosCajas->permite_ingreso();

			if($cajaAutorizada["val"] == 1){
			//asigno un nombre a la sesión para poder guardar diferentes datos
			session_name("loginUsuario");
			// inicio la sesión
			session_start();
			//defino la sesión que demuestra que el usuario está autorizado
			$_SESSION["autentificado"] = "y3s";
			$_SESSION["idcaja"] = $cajaAutorizada["idcaja"];
			$_SESSION["id"] = $cajaAutorizada["id"];
			$_SESSION["idsucursal"] = $cajaAutorizada["idsucursal"];
			$_SESSION["rol"] = $cajaAutorizada["rol"];
			$UsuariosCajas->actualizaEstadoCajaOpen();
			//defino la sesión que demuestra que el usuario está autorizado
			header("Location: index.php");
											}else{		
													$_SESSION["idcaja"] = $cajaAutorizada["idcaja"];
													$_SESSION["id"] = $cajaAutorizada["id"];
													$_SESSION["idsucursal"] = $cajaAutorizada["idsucursal"];
													$_SESSION["rol"] = $cajaAutorizada["rol"];
													$UsuariosCajas->actualizaEstadoCajaClose();
													header("Location: ../../login.php?msg=1");
														
															}
														
														}else{
																	header("Location: ../../login.php?msg=1");
																				}
?>