{% extends "layout.twig.php" %}

{% block title %} {{ parent() }} {% endblock %}

{% block contenido %}

<div class="row">

		<div class="col-lg-12">

				<h1 class="page-header">Crear clasificación 2</h1>

		</div>

	</div>

	<br>

	<div class="col-lg-6">
    
    <form action="store.php" method="post" id="">

    <div class="form-group">
	<label for="nombreclasificacion2">Nombre clasificación 2:</label>
	<input type="text" placeholder="Nombre clasificación 2" name="nombreclasificacion2" class="form-control" id="">
    </div>
    
    	</br>
        
	<input type="submit" value="Crear clasificación 2" class="btn btn-primary">

</form>

	</div>

{% endblock %}
