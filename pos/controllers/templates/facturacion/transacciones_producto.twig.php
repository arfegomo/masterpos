{% extends "layout.twig.php" %}

{% block title %} {{ parent() }} {% endblock %}

{% block stylesheets %}

{{ parent() }}

<link rel="stylesheet" href="../../../dist/css/jquery-ui1.css">

{% endblock %}

{% block javascripts %}

  {{ parent() }}

<script type="text/javascript">
$(document).ready(function(){
  
  $(function(){
    	$("#datepicker").datepicker({
    		dateFormat:"yy-mm-dd",
    		changeMonth: true,
      		changeYear: true,
      		yearRange: "-100:+0"
    	});
      $("#datepicker2").datepicker({
        dateFormat:"yy-mm-dd",
        changeMonth: true,
          changeYear: true,
          yearRange: "-100:+0"
      });
    });

   //Función que trae las ventas diarias
    $("input[name=reporte]").click(function(){
      var fecha = $('input[name=fecha]').val();
        $.ajax({
        	dataType: "html",
            url: "reportePorproducto.php",
            data: {fecha:'"'+fecha+'"'},
            type: "POST",
            success:  function (data) {
            	
                $("#capatemporal").html(data);
  
                }

          });
      $("#fecha").focus();    
  });
  //fin

});
</script>
<!--<script type="text/javascript" src="../../js/usuario.js"></script>-->

{% endblock %}

{% block contenido %}

	<div class="row">

		<div class="col-lg-12">

				<h1 class="page-header">Reporte de ventas por producto</h1>

		</div>

	</div>

	<br>

	<div class="col-lg-6">
    
    <form action="" method="post">
	
    <div class="form-group">
	<label for="fecha">Fecha inicial:</label>
	<input type="text" placeholder="Ingresa la fecha del reporte" name="fecha" class="form-control" id="datepicker">
    </div>

  <div class="form-group">
  <label for="fecha">Fecha final:</label>
  <input type="text" placeholder="Ingresa la fecha del reporte" name="fecha2" class="form-control" id="datepicker2">
    </div>

    
	</br>

	<input type="button" value="Consultar" class="btn btn-primary" id="reporte" name="reporte">

</form>

</div>

	<div class="col-lg-12" id="capatemporal" name="capatemporal">

	</div>

<div id="datepicker"></div>

{% endblock %}