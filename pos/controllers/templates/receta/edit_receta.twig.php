{% extends "layout.twig.php" %}



{% block title %} {{ parent() }} {% endblock %}



{% block contenido %}



	<div class="row">

		<div class="col-lg-12">

				<h1 class="page-header">Receta</h1>

		</div>

	</div>



	<div class="row">

		<div class="col-lg-12">

	<div align="right"><a href="create.php" class="btn btn-primary btn-xs">Crear receta</a></div>

		</div>

	</div>



	<br>



	<div class="table-responsive">

		<table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">

	      <thead>

	        <tr>

	 	
	          <th>Artículo</th>
	          <th>Cantidad</th>
	          <th>Editar</th>

	        </tr>

	      </thead>

	      <tbody>

			{% for receta in recetas %}

				<tr>

		      
		          <td>{{ receta.nombrearticulo|upper }}</td>
		          <td>{{ receta.cantidad }}</td>

		          <td>
                  <a href="edit_receta.php?idarticulo={{ receta.idarticuloterminado }}"><button class="btn btn-xs btn-info">
							     <i class="ace-icon fa fa-pencil bigger-120"></i>
					             </button></a>

                                 </td>

		        </tr>

			{% endfor %}
	      </tbody>

	    </table>

	    </div>





{% endblock %}