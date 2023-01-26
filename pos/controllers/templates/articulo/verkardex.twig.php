{% extends "layout.twig.php" %}



{% block title %} {{ parent() }} {% endblock %}



{% block contenido %}



	<div class="row">

		<div class="col-lg-12">

				<h1 class="page-header">Kardex: {{ articulo }}</h1>

		</div>

	</div>



	<div class="row">

		<div class="col-lg-12">

	<div align="right"><a href="index.php" class="btn btn-primary btn-xs">Regresar</a></div>

		</div>

	</div>



	<br>



	<div class="table-responsive">

		<table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">

	      <thead>

	        <tr>

	          <th>Fecha</th>	
	          <th>Transacción</th>
	          <th>Tercero</th>
	          <th>Documento</th>
	          <th>Doc.Ref</th>
	          <th>Entradas</th>
	          <th>Salidas</th>
	          <th>Valor unidad</th>
	          <th>Costo venta</th>
	          <th>Costo promedio</th>
	          <th>Saldo actual</th>

	        </tr>

	      </thead>

	      <tbody>
	      	{% set saldo = 0 %}
	      	{% for kardex in kardexs %}

				<tr>

		      
				  <td>{{ kardex.fechacreacion }}</td>
		          <td>{{ kardex.nombreconceptofacturacion }}</td>
		          <td>{{ kardex.documento }}</td>
		          <td>{{ kardex.consecutivodian }}</td>
		          <td>{{ kardex.documentoreferencia }}</td>

		          {% if kardex.idtipotransaccion == 1 %}
		          		
		          		<td>0</td>		
		   				<td>{{ kardex.cantidad }}</td>
		   				{% set saldo = saldo - kardex.cantidad %}
		   				
		   				{% elseif (kardex.idtipotransaccion == 2) %}

		   				<td>{{ kardex.cantidad }}</td>		
		   				<td>0</td>
		   				{% set saldo = saldo + kardex.cantidad %}

		   				{% elseif (kardex.idtipotransaccion == 3) %}

		   				<td>{{ kardex.cantidad }}</td>		
		   				<td>0</td>
		   				{% set saldo = saldo + kardex.cantidad %}

		   				{% elseif (kardex.idtipotransaccion == 4) %}

		   				<td>0</td>		
		   				<td>{{ kardex.cantidad }}</td>
		   				{% set saldo = saldo - kardex.cantidad %}

		   				{% elseif (kardex.idtipotransaccion == 5) %}

		   				<td>{{ kardex.cantidad }}</td>		
		   				<td>0</td>
		   				{% set saldo = saldo + kardex.cantidad %}

		   				{% elseif (kardex.idtipotransaccion == 6) %}

		   				<td>0</td>		
		   				<td>{{ kardex.cantidad }}</td>
		   				{% set saldo = saldo - kardex.cantidad %}

		   		  {% endif %}	

		          <td>{{ ( (kardex.preciounitario) - ( (kardex.preciounitario)*(kardex.descuento/100) )) }}</td>
		          <td>{{ kardex.costoventa }}</td>
		          <td>{{ kardex.costopromedio }}</td>
		          <td>{{ saldo }}</td>

		       

		        </tr>

			{% endfor %}

	      </tbody>

	    </table>

	    </div>

	<div class="row">

		<div class="col-lg-12">

				<h2 class="page-header">Costo actual: {{ costoactual }}</h2>
				
				<h3 class="page-header">Existencia actual: {{ saldo }}</h3>

		</div>

	</div>



{% endblock %}