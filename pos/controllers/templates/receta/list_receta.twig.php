{% extends "layout.twig.php" %}



{% block title %} {{ parent() }} {% endblock %}



{% block contenido %}



	<div class="row">

		<div class="col-lg-12">

				<h1 class="page-header">Recetas</h1>

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

	          <th>Código artículo</th>	
	          <th>Artículos</th>
	          <th>Receta</th>

	        </tr>

	      </thead>

	      <tbody>

			{% for receta in recetas %}

				<tr>

		      
				  <td>{{ receta.idarticulo }}</td>
		          <td>{{ receta.nombrearticulo|upper }}</td>

		          <td>
                  <a href="edit_receta.php?idarticulo={{ receta.idarticulo }}"><button class="btn btn-xs btn-info">
							     <i class="ace-icon fa fa-pencil bigger-120"></i>
					             </button></a>

                                 </td>

		        </tr>

			{% endfor %}
	      </tbody>

	    </table>

	    </div>





{% endblock %}