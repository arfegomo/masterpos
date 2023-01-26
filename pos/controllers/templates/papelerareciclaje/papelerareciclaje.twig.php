{% extends "layout.twig.php" %}

{% block contenido %}


  
            
            <div class="row">
                
                  <div class="row">
		<div class="col-lg-12">
				<h1>Papelera de Reciclaje</h1>
		</div>
    </div>

    
    <hr>

	<div class="table-responsive">



		<table width="100%" class="table table-striped" >



	      <thead>



	        <tr>



	      <th>Articulo</th>

			  <th>Cantidad</th>	
			  <th>Precio</th>
			  <th>Descuento(%)</th>
			  <th>Iva</th>
			  <th>Imp. Consumo</th>
			  <th>Fecha</th>
			  <th>Mesa</th>

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

		          <td>{{ articulo.fecha }}</td>

		          {% if(articulo.idmesa == 0) %}

		          <td> {{ "Caja Principal" }} </td>

		          {% else %}

		          <td>{{ articulo.idmesa }}</td>

		          {% endif %}

		          {% set valorArticulo = (articulo.preciounitario * articulo.cantidad) - ((articulo.preciounitario * articulo.cantidad) * (articulo.descuento/100)) %}

		          <td align="left">{{ valorArticulo }}</td>



		          {% set subtotal = subtotal + (articulo.baseunitario * articulo.cantidad) - ((articulo.baseunitario * articulo.cantidad)* (articulo.descuento/100)) %}



		          {% set impuestos = impuestos + (((articulo.baseunitario * articulo.cantidad)- ((articulo.baseunitario * articulo.cantidad)*(articulo.descuento/100))) * (articulo.impuestoconsumo/100)) + (((articulo.baseunitario * articulo.cantidad)- ((articulo.baseunitario * articulo.cantidad)*(articulo.descuento/100))) * (articulo.impuestoiva/100)) %}

		          {% set total = total + valorArticulo %}



		     



		        </tr>

		     {% endfor %}

		     <tr>
		        <td colspan="8"><b><font size="8">TOTAL</font></b></td><td align="left"><b><font size="6">${{ total }}</font></b></td><td></td>
		     </tr>



	      </tbody>

		

	    </table>

    </div>


  


                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->



{% endblock %}