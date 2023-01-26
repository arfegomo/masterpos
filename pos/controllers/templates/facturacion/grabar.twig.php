{% block contenido %}



	{% for valor in valores %}



	<div class="row">

	<div class="col-lg-12" align="right">

		<label>Subtotal: $</label>

		<input type="text" value="{{ valor.subtotal }}" readonly="readonly"></input>

	</div>

	</div>



	<div class="row">

	<div class="col-lg-12" align="right">

		<label>Impuestos: $</label>

		<input type="text" value="{{ valor.impuestos }}" readonly="readonly"></input>

	</div>

	</div>



	<div class="row">

	<div class="col-lg-12" align="right">

		<label>Total: $</label>

		<input type="text" value="{{ valor.total }}" readonly="readonly" id="total"></input>

	</div>

	</div>



	<div class="row">

	<div class="col-lg-12" align="right">

		<label>Paga: $</label>

		<input type="text" value="" id="paga"></input>

	</div>

	</div>



	<div class="row">

	<div class="col-lg-12" align="right">

		<label>Cambio: $</label>

		<input type="text" value="" id="cambio"></input>

	</div>

	</div>



	<div class="row">

	<div class="col-lg-12" align="right">

	<a href="javascript:pagarTransaccion({{ idCons }},{{ idCon }},{{ idDoc }})" class="btn btn-primary" id="pagar" name="pagar">PAGAR</a>

	</div>

	</div>



	{% endfor %}

	

{% endblock %}



{% block javascripts %}



<script type="text/javascript">

$(document).ready(function(){



$("#paga").focus();





$("#paga").keyup(function(e){

var cambio = 0;

var total = $('#total').val(); 

var paga = $('#paga').val(); 



    if((e.keyCode == 13)&&(paga > 0))



    {

        cambio = (paga - total);

        $("#cambio").attr("value",cambio); 

        $("#aceptar").focus();

    }

});



});



  function pagarTransaccion(idCons,idCon,idDoc){

  	$.ajax({

  			dataType: "html",

  			url: "pagar.php",

  			data: {idCons:idCons,idCon:idCon,idDoc:idDoc},

  			type: "POST",

  			success:function(data){

  					location.reload();

  			}

  		});

  		

   	}

</script>



{% endblock %}
