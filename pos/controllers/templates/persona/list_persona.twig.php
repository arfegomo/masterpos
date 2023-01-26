{% extends "layout.twig.php" %}



{% block title %} {{ parent() }} {% endblock %}



{% block contenido %}



	<div class="row">

		<div class="col-lg-12">

				<h1 class="page-header">Personas</h1>

		</div>

	</div>



	<div class="row">

		<div class="col-lg-12">

	<div align="right"><a href="create.php" class="btn btn-primary btn-xs">Crear persona</a></div>

		</div>

	</div>



	<br>



	<div class="table-responsive">

		<table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">

	      <thead>

	        <tr>

	          <th>Nombres</th>
              
              <th>Email</th>

	          <th>Acciones</th>

	        </tr>

	      </thead>

	      <tbody>

	        {% for personas in personas %}

				<tr>

		      

		          <td>{{ personas.nombres }} </td>
                  
                  <td>{{ personas.email }}</td>

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

