{% extends "layout.twig.php" %}

{% block title %} {{ parent() }} {% endblock %}

{% block contenido %}

<div class="row">

		<div class="col-lg-12">

				<h1 class="page-header">Crear tabla</h1>

		</div>

	</div>

	<br>

	<div class="col-lg-6">
    
    <form action="store.php" method="post" id="">


    <div class="form-group">
	<label for="nombretabla">Nombre tabla:</label>
	<input type="text" placeholder="Nombre tabla" name="nombretabla" class="form-control" id="">
    </div>
    
    <div class="form-group">
	<label for="tabla">Tabla:</label>
	<input type="text" placeholder="Tabla" name="tabla" class="form-control" id="">
    </div>
    
    	</br>

	<input type="submit" value="Crear tabla" class="btn btn-primary">

</form>

	</div>

{% endblock %}
