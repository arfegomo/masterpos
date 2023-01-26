{% extends "layout.twig.php" %}



{% block title %} {{ parent() }} {% endblock %}



{% block contenido %}



	<div class="row">

		<div class="col-lg-12">

				<h1 class="page-header">Artículos</h1>

		</div>

	</div>



	<div class="row">

		<div class="col-lg-12">

	<div align="right"><a href="create.php" class="btn btn-primary btn-xs">Crear articulo</a></div>

		</div>

	</div>



	<br>



	<div class="table-responsive">

		<table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">

	      <thead>

	        <tr>

	          <th>Código artículo</th>	
	          <th>Artículos</th>
	          <th>Precio venta # 1</th>
	          <th>Acciones</th>

	        </tr>

	      </thead>

	      <tbody>

			{% for articulo in articulos %}

				<tr>

		      
				  <td>{{ articulo.codigoarticulo }}</td>
		          <td>{{ articulo.nombrearticulo|upper }}</td>
		          <td>${{ articulo.precioventa1 }}</td>

		          <td>
                  <a href="edit.php?idarticulo={{ articulo.idarticulo }}"><button class="btn btn-xs btn-info">
							     <i class="ace-icon fa fa-pencil bigger-120"></i>
					             </button></a>
                                 
                      <a href=""><button class="btn btn-xs btn-danger">
					             <i class="ace-icon fa fa-trash-o bigger-120"></i>
					             </button></a>
					  <a href="verkardex.php?idarticulo={{ articulo.idarticulo }}"><button class="btn btn-xs btn-success">
					             <i class="ace-icon fa fa-calculator bigger-120"></i>
					             </button></a>
                                 </td>

		        </tr>

			{% endfor %}
	      </tbody>

	    </table>

	    </div>





{% endblock %}