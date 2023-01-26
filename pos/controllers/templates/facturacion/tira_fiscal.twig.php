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
    });

   //Función que trae las ventas diarias
    $("input[name=reporte]").click(function(){
      var fecha = $('input[name=fecha]').val();
      var horainicio = $('select[name=horainicio]').val();
      var horafin = $('select[name=horafin]').val();
        $.ajax({
        	dataType: "html",
            url: "reporteTirafiscal.php",
            data: {fecha:fecha,horainicio:horainicio,horafin:horafin},
            type: "POST",
            success:  function (data) {
            	 //console.log(data);
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

				<h1 class="page-header">Reporte de ventas diarias</h1>

		</div>

	</div>

	<br>


  <div class="row">

	<div class="col-lg-6">
	
    <div class="form-group">
	<label for="fecha">Fecha:</label>
	<input type="text" placeholder="Ingresa la fecha del reporte" name="fecha" class="form-control" id="datepicker">
    </div>

  </div>

  <div class="col-lg-3">

    <div class="form-group">
    <label for="fecha">Hora inicio:</label>
    <select class="form-control" name="horainicio">
    {% for i in 0..23 %}
      <option value="{{ i }}">{{ i }}:00</option>
    {% endfor %}
    </select>
    </div>
    
  </div>

    <div class="col-lg-3">

    <div class="form-group">
    <label for="fecha">Hora fin:</label>
    <select class="form-control" name="horafin">
    {% for i in 0..23 %}
      <option value="{{ i }}">{{ i }}:00</option>
    {% endfor %}
    </select>
    </div>
    
  </div>

</div>
    
	</br>

<form action="" method="post">
	<input type="button" value="Consultar" class="btn btn-primary" id="reporte" name="reporte">
</form>


<div class="col-lg-12" id="capatemporal" name="capatemporal">

	</div>

<div id="datepicker"></div>

{% endblock %}