{% extends "layout.twig.php" %}



{% block title %} {{ parent() }} {% endblock %}



{% block contenido %}



	<div class="row">

		<div class="col-lg-5">

				<h1 class="page-header">Existencias en bodega</h1>
				<!--<a class="btn btn-primary" href="#" role="button">Actualizar inventario</a>-->

		</div>

		

	</div>

	<hr>

	<div class="table-responsive">

		<table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">

	      <thead>

	        <tr>

	          <th>Código artículo</th>	
	          <th>Artículos</th>
	          <th>Precio venta</th>
	          <th>Costo actual</th>
	          <th>Existencia actual</th>
	          <th>Costo total</th>
	          <th>Rentabilidad</th>

	        </tr>

	      </thead>

	      <tbody>
	      	{% set total_existenciactual = 0  %}
	      	{% set total_costoactual = 0  %}
	      	{% set total_costototal = 0  %}

			{% for articulo in articulos %}

				<tr>

		      
				  <td>{{ articulo.codigoarticulo }}</td>
		          <td>{{ articulo.nombrearticulo|upper }}</td>
		          <td>{{ articulo.precioventa1 }}</td>
		          <td>{{ articulo.costoactual }}</td>
		          <td>{{ articulo.existenciactual }}</td>
		          <td>{{ articulo.costoactual * articulo.existenciactual }}</td>
		          <td>{{ ((articulo.precioventa1 - articulo.costoactual)/articulo.precioventa1) * 100 }}%</td>
		          {% set total_existenciactual = total_existenciactual + articulo.existenciactual %}
		          {% set total_costoactual = total_costoactual + articulo.costoactual %}
		          {% set total_costototal = total_costototal + (articulo.costoactual * articulo.existenciactual) %}
		          

		        </tr>

			{% endfor %}

		</tbody>

			<thead>

	        <tr>

	          <th colspan="4">Total</th>	
	          
	          <th>{{ total_existenciactual }}</th>
	          <th>{{ total_costototal }}</th>

	        </tr>

	      </thead>

	    </table>

	    </div>





{% endblock %}