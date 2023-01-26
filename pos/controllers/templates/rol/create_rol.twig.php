{% extends "layout.twig.php" %}

{% block title %} {{ parent() }} {% endblock %}

{% block contenido %}

<div class="row">

		<div class="col-lg-12">

				<h1 class="page-header">Crear rol</h1>

		</div>

	</div>

	<br>

	<div class="col-lg-6">
    
    <form action="store.php" method="post" id="">
    
    <div class="form-group">
	<label for="name">Name:</label>
	<input type="text" placeholder="Name" name="name" class="form-control" id="">
    </div>
    
    <div class="form-group">
    <label for="display_name">Nombre:</label>
	<input type="text" placeholder="Nombre" name="display_name" class="form-control" id="">
    </div>

    <div class="form-group">
    <label for="descripcion">Descripcion:</label>
	<input type="text" placeholder="Descripcion" name="description" class="form-control" id="">
    </div>
    
    	</br>

	<input type="submit" value="Crear sucursal" class="btn btn-primary">

</form>

	</div>

{% endblock %}