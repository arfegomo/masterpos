<?php 

include("../../../includes/config.php");
include("../../../includes/base.class.php");
include("../../../includes/cajas.class.php");



$Cajas = new cajas();
$Cajas->set_idsucursal($_POST["idsucursal"]);
$cajas = $Cajas->listarCajasSucursal();



foreach ($cajas as $caja) { ?>

	<option value="<?php echo $caja["idcaja"] ?>"><?php echo $caja["idcaja"] ?></option>

<?php } ?>

