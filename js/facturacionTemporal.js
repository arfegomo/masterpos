$(document).ready(function(){
  	function eliminarItem(idTem){
  		$.ajax({
            dataType: "html",
            url: "eliminarTemporal.php",
            data: {idTem:idTem},
            type: "POST",
            success:function(data) {
                  $("#capatemporal").html(data);
                                            }
          });
  		$("#idarticulo").focus();
  	}
})