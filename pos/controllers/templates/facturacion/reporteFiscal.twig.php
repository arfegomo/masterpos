{% block contenido %}

<script type="text/javascript">
$(document).ready(function(){

    $("input[name=imprimir]").click(function(){
      var fecha = $('input[name=fecha]').val();
      var horainicio = $('input[name=horainicio]').val();
      var horafin = $('input[name=horafin]').val();
        $.ajax({
        	dataType: "html",
            url: "imprimirTirafiscal.php",
            data: {fecha:fecha,horainicio:horainicio,horafin:horafin},
            type: "POST",
            success:  function (data) {
  
                }

          });
        
  });
});
</script>

<hr>

	<div class="table-responsive">


		<form action="" method="post">
			<input type="hidden" name="fecha" id="fecha" value="{{ fecha }}">
			<input type="hidden" name="horainicio" id="horainicio" value="{{ horainicio }}">
			<input type="hidden" name="horafin" id="horafin" value="{{ horafin }}">

		<table width="100%" class="table table-striped" >



	      <thead>



	        <tr>



	      <th>Articulo</th>

			  <th>Cantidad</th>	

			  <th>Precio</th>

			  <th>Descuento(%)</th>

			  <th>Iva</th>

			  <th>Imp. Consumo</th>

			  <th>Total</th>

	          



	        </tr>



	      </thead>



	      <tbody>

			{% set subtotal = 0 %}

			{% set impuestos = 0 %}

			{% set total = 0 %}

			{% set valorArticulo = 0 %}


      {% for articulo in articulos %}



        <tr>



              <td>{{ articulo.nombrearticulo|upper }}</td>

              <td>{{ articulo.cantidad }}</td>

              <td>{{ articulo.baseunitario }}</td>

              <td>{{ articulo.descuento }}</td>

              <td>{{ articulo.impuestoiva }}</td>

              <td>{{ articulo.impuestoconsumo }}</td>

              {% set valorArticulo = (articulo.preciounitario * articulo.cantidad) - ((articulo.preciounitario * articulo.cantidad) * (articulo.descuento/100)) %}

              <td align="left">{{ valorArticulo }}</td>



              {% set subtotal = subtotal + (articulo.baseunitario * articulo.cantidad) - ((articulo.baseunitario * articulo.cantidad)* (articulo.descuento/100)) %}



              {% set impuestos = impuestos + (((articulo.baseunitario * articulo.cantidad)- ((articulo.baseunitario * articulo.cantidad)*(articulo.descuento/100))) * (articulo.impuestoconsumo/100)) + (((articulo.baseunitario * articulo.cantidad)- ((articulo.baseunitario * articulo.cantidad)*(articulo.descuento/100))) * (articulo.impuestoiva/100)) %}

              {% set total = total + valorArticulo %}


            </tr>

         {% endfor %}



	        

		     <tr>
		        <td colspan="6">
		        	<b><font size="8">TOTAL</font></b>
		        </td>
		       
		        <td align="left"><b><font size="6">${{ total }}</font></b>
		        </td>
		       
		     </tr>



	      </tbody>


		

	    </table>
	    
	    

		<div class="col-lg-12">
	    	<input type="button" value="Imprimir" class="btn btn-primary" id="imprimir" name="imprimir">
	    </div>

		
    	</div>
    	</form>

	   {% endblock %} 		