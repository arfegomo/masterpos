{% extends "layout.twig.php" %}
{% block title %} {{ parent() }} {% endblock %}
{% block stylesheets %}
{{ parent() }}
<!--<link rel="stylesheet" type="text/css" href="../../../dist/css/jquery.autocomplete.css" />-->
<!--<link rel="StyleSheet" type="text/css" href="../../../dist/css/jquery.alerts.css" />-->
<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
{% endblock %}

{% block contenido %}
	<div class="row">
		<div class="col-lg-12">
				<h1 class="page-header">Mantenimiento de transacciones</h1>
		</div>
	</div>	

<div class="table-responsive">

		<table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">

	      <thead>

	        <tr>

	          <th>Estado</th>
	          <th>ID Concepto</th>
	          <th>Concepto</th>
	          <th>Consecutivo</th>
	          <th>Documento</th>
	          <th>Tercero</th>
	          <th>Fecha</th>
	          <th>Acciones</th>

	        </tr>

	      </thead>

	      <tbody>

	    {% for transaccion in transacciones %}

				<tr>

		          <td>{{ transaccion.estado }}</td>
		          <td>{{ transaccion.idconceptofacturacion }}</td>
		          <td>{{ transaccion.nombreconceptofacturacion }}</td>
				  <td>{{ transaccion.consecutivodian }}</td>
				  <td>{{ transaccion.documento }}</td>
				  <td>{{ transaccion.nombres }} {{ transaccion.apellidos}}</td>
				  <td>{{ transaccion.fecha }}</td>
				  <td>
				  	<a href="javascript:imprimirCopia({{ transaccion.idconceptofacturacion }},'{{ transaccion.consecutivodian }}')" class="btn btn-primary"><span class="glyphicon glyphicon-print" aria-hidden="true"></span></a>
				  	<!--<a href="" data-toggle='modal' class="btn btn-primary" data-target='#miModal'><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a>-->
				  	<!--<div class="jumbotron"><a class="btn btn-primary pull-right" data-toggle="modal" href="#myModal" id="modellink">Show Modal</a></div>-->
				  	
				  	
				  	
				  </td>

		        </tr>

			{% endfor %}
	        

	      </tbody>

	    </table>

	    </div>

<div class="container ">
<div class="modal-container"></div>
</div>

{% endblock %}

{% block javascripts %}

<script src="//code.jquery.com/jquery-1.10.2.js"></script>
<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>

{{ parent() }}

<script type="text/javascript">

function imprimirCopia(idCon,Cons){

  		$.ajax({
            dataType: "html",
            url: "imprimir_copia.php",
            data: {Cons:Cons,idCon:idCon},
            type: "POST",

            success:function(data){

            	//window.open("duplicado.php");
            	//$("#capatemporal").html(data);
            }
          });
  	}

</script>

{% endblock %}