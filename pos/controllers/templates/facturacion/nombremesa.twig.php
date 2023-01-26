{% extends "layout.twig.php" %}

{% block title %} {{ parent() }} {% endblock %}

{% block contenido %}

<div class="row">

		<div class="col-lg-12">

				<h1 class="page-header">Asignar nombre del cliente a la mesa # {{ mesa }}:</h1>

		</div>

	</div>

	<br>

	<div class="col-lg-6">
    
    <form action="store.php" method="post" id="">
    <input type="hidden" name="idmesa" value="{{ mesa }}">

    <div class="form-group">
	<label for="persona">Nombre:</label>
	<input type="text" placeholder="Nombre del cliente" name="persona" class="form-control" id="">
    </div>
    
    	</br>

	<input type="submit" value="Asignar mesa" class="btn btn-primary">

</form>

	</div>

{% endblock %}