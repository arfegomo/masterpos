{% extends "layout.twig.php" %}
{% block title %} {{ parent() }} {% endblock %}
{% block stylesheets %}
{{ parent() }}
<!--<link rel="stylesheet" type="text/css" href="../../../dist/css/jquery.autocomplete.css" />-->
<!--<link rel="StyleSheet" type="text/css" href="../../../dist/css/jquery.alerts.css" />-->
<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
{% endblock %}
{% block javascripts %}

<script src="//code.jquery.com/jquery-1.10.2.js"></script>
<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>

{{ parent() }}



<!--Reloj digital-->
<script language="JavaScript" type="text/javascript">
$(document).ready(function(){



    $("input[name=trasladar]").click(function(){
      var origen = $('select[name=origen]').val();
      var destino = $('select[name=destino]').val();
  
        $.ajax({
          dataType: "html",
            url: "../facturacion/scriptTraslado.php",
            data: {origen:origen,destino:destino},
            type: "POST",
            success:  function (data) {
               //console.log(data);
                $("#capatemporal").html(data);
                setTimeout("location.reload(true);", 500);
                }

          });  

  });
  //fin

});

</script>

{% endblock %}
{% block contenido %}
	<div class="row">
		<div class="col-lg-6">
				<h1>Traslado de Mesa</h1>
		</div>
	</div>	



<hr>


  <div class="row">        

  <div class="col-lg-6">
  
  <div class="form-group">
  <label for="ocupadas">Origen:</label>
  <select name="origen" class="form-control">
    
    {% for mesasocupada in mesasocupadas %}
    <option value="{{ mesasocupada.idmesa }}"> Mesa {{ mesasocupada.idmesa }} </option>
    {% endfor %}
  </select>
  </div>

  </div>

  <div class="col-lg-6">
  
  <div class="form-group">
  <label for="destino">Destino:</label>
 <select name="destino" class="form-control">
    
    {% for mesaslibre in mesaslibres %}
    <option value="{{ mesaslibre.idmesa }}"> Mesa {{ mesaslibre.idmesa }} </option>
    {% endfor %}
  </select>
  </div>

  </div>

  </div>

  <div class="row"> 
  <div class="col-lg-6">
  <form action="" method="post">
  <input type="button" value="Trasladar" class="btn btn-primary" id="trasladar" name="trasladar">
  </form>
  </div>
  </div>

  <br>

   <div class="row">

  <div class="col-lg-12" id="capatemporal" name="capatemporal">

  </div>

   <div class="row">


{% endblock %}