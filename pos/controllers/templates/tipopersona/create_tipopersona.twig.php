{% extends "layout.twig.php" %}

{% block title %} {{ parent() }} {% endblock %}

{% block contenido %}

<div class="row">

		<div class="col-lg-12">

				<h1 class="page-header">Crear tipo persona</h1>

		</div>

	</div>

	<br>

	<div class="col-lg-6">
    
    <form action="store.php" method="post" id="">

    <div class="form-group">
	<label for="nombretipopersona">Nombre tipo persona:</label>
	<input type="text" placeholder="Nombre tipo persona" name="nombretipopersona" class="form-control" id="">
    </div>
    
    	</br>

	<input type="submit" value="Crear tipo persona" class="btn btn-primary">

</form>

	</div>

{% endblock %}