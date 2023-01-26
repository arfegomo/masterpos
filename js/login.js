$(document).ready(function(){
	$('#idsucursal').on('change', function() {
 	 
 	 var idsucursal = this.value;

 	 $.ajax({
            dataType: "html",
            url: "pos/controllers/caja/consultarCajas.php",
            data: {idsucursal:idsucursal},
            type: "POST",
            success:function(data) {
                  $("#idcaja").html(data);
                                            }
          });  

	});
})