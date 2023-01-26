{% extends "layout.twig.php" %}

{% block title %} {{ parent() }} {% endblock %}

{% block contenido %}

<div class="row">

		<div class="col-lg-12">

				<h1 class="page-header">Crear regimen tributario</h1>

		</div>

	</div>

	<br>

	<div class="col-lg-6">
    
    <form action="store.php" method="post" id="">


    <div class="form-group">
	<label for="nombreregimentributario">Nombre regimen tributario:</label>
	<input type="text" placeholder="Nombre regimen tributario" name="nombreregimentributario" class="form-control" id="">
    </div>
    
    	</br>

	<input type="submit" value="Crear regimen tributario" class="btn btn-primary">
    
</form>

	</div>

{% endblock %}


