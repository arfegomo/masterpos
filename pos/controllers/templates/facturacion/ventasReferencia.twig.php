{% extends "layout.twig.php" %}
{% block title %} {{ parent() }} {% endblock %}
{% block stylesheets %}
{{ parent() }}
<!--<link rel="stylesheet" type="text/css" href="../../../dist/css/jquery.autocomplete.css" />-->
<!--<link rel="StyleSheet" type="text/css" href="../../../dist/css/jquery.alerts.css" />-->
<link rel="stylesheet" href="../../../dist/css/jquery-ui1.css">
{% endblock %}
{% block javascripts %}

<script src="../../../dist/js/jquery-1.10.2.js"></script>
<script src="../../../js/jquery-ui1.js"></script>


{{ parent() }}



<!--Reloj digital-->
<script language="JavaScript" type="text/javascript">
$(document).ready(function(){
 $(function(){
      $("#datepicker1").datepicker({
        dateFormat:"yy-mm-dd",
        changeMonth: true,
          changeYear: true,
          yearRange: "-100:+0"
      });
});

$(function(){
      $("#datepicker2").datepicker({
        dateFormat:"yy-mm-dd",
        changeMonth: true,
          changeYear: true,
          yearRange: "-100:+0"
      });
});

$("select[name=tipostransaccion]").change(function(){

      tipo = $('select[name=tipostransaccion]').val();

});


//Función que trae las ventas diarias
    $("input[name=reporte]").click(function(){
      var fechainicial = $('input[name=fechainicial]').val();
      var fechafinal = $('input[name=fechafinal]').val();
      var tipotra = tipo;

        $.ajax({
          dataType: "html",
            url: "scriptVentareferencia.php",
            data: {fechainicial:fechainicial,fechafinal:fechafinal,tipotra:tipotra},
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

{% endblock %}
{% block contenido %}
	<div class="row">
		<div class="col-lg-6">
				<h1>X Artículo</h1>
		</div>
	</div>	

    <div class="row">
    <div class="col-lg-6">
        <h5>Elija el tipo de transacción:
          <select name="tipostransaccion" class="form-control" id="tipostransaccion">
            <option value="">Elija...</option>
          {% for tipostransaccion in tipostransacciones %}
          <option value="{{ tipostransaccion.idtipotransaccion }}">{{ tipostransaccion.nombretipotransaccion }}</option>
          {% endfor %}
          </select>
        </h5>

    </div>
  </div> 



<hr>


  <div class="row">        

  <div class="col-lg-6">
  
  <div class="form-group">
  <label for="fecha">Fecha Inicial:</label>
  <input type="text" placeholder="Fecha Inicial" name="fechainicial" class="form-control" id="datepicker1">
  </div>

  </div>

  <div class="col-lg-6">
  
  <div class="form-group">
  <label for="fecha">Fecha Final:</label>
  <input type="text" placeholder="Fecha Final" name="fechafinal" class="form-control" id="datepicker2">
  </div>

  </div>

  </div>

  <div class="row"> 
  <div class="col-lg-6">
  <form action="" method="post">
  <input type="button" value="Consultar" class="btn btn-primary" id="reporte" name="reporte">
  </form>
  </div>
  </div>

  <div class="col-lg-12" id="capatemporal" name="capatemporal">

  </div>


{% endblock %}