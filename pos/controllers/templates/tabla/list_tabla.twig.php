{% extends "layout.twig.php" %}



{% block title %} {{ parent() }} {% endblock %}



{% block contenido %}



	<div class="row">

		<div class="col-lg-12">

				<h1 class="page-header">Tablas</h1>

		</div>

	</div>



	<div class="row">

		<div class="col-lg-12">

	<div align="right"><a href="create.php" class="btn btn-primary btn-xs">Crear tabla</a></div>

		</div>

	</div>



	<br>
    
 {% if(msg == 1) %}

	<div class="alert alert-success alert-dismissible" role="alert">

  	<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>

  	<strong>Transacción exitosa.</strong> 

  	</div>

	{% endif %}



	{% if(msg == 2) %}

	<div class="alert alert-danger alert-dismissible" role="alert">

  	<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>

  	<strong>Error en la transacción.</strong> 

  	</div>

	{% endif %}      
   



	<div class="table-responsive">

		<table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">

	      <thead>

	        <tr>

	          <th>Tablas</th>


	          <th>Acciones</th>

	        </tr>

	      </thead>

	      <tbody>

	        {% for tabla in tablas %}

				<tr>

		      

		          <td>{{ tabla.nombretabla }}</td>

		           <td>
                  <a href=""><button class="btn btn-xs btn-info">
							     <i class="ace-icon fa fa-pencil bigger-120"></i>
					             </button></a>
                                 
                      <a href=""><button class="btn btn-xs btn-danger">
					             <i class="ace-icon fa fa-trash-o bigger-120"></i>
					             </button></a>
                                 </td>

		        </tr>

			{% endfor %}

	        

	      </tbody>

	    </table>

	    </div>





{% endblock %}
