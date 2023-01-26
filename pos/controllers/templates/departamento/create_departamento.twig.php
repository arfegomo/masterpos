{% extends "layout.twig.php" %}

{% block title %} {{ parent() }} {% endblock %}

{% block contenido %}

<div class="row">

		<div class="col-lg-12">

				<h1 class="page-header">Crear Departamento</h1>

		</div>

	</div>

	<br>

	<div class="col-lg-6">
    
    <form action="store.php" method="post" id="">

    <div class="form-group">
	<label for="nombredepartamento">Nombre departamento:</label>
	<input type="text" placeholder="Nombre departamento" name="nombredepartamento" class="form-control" id="">
    </div>
    
    	</br>
        
	<input type="submit" value="Crear departamento" class="btn btn-primary">

</form>

	</div>

{% endblock %}
