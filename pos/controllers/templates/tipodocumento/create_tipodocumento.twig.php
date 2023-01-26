{% extends "layout.twig.php" %}

{% block title %} {{ parent() }} {% endblock %}

{% block contenido %}

<div class="row">

		<div class="col-lg-12">

				<h1 class="page-header">Crear tipo documento</h1>

		</div>

	</div>

	<br>

	<div class="col-lg-6">
    
    <form action="store.php" method="post" id="">

    <div class="form-group">
	<label for="nombretipodocumento">Nombre tipo documento:</label>
	<input type="text" placeholder="Nombre tipo documento" name="nombretipodocumento" class="form-control" id="">
    </div>
    
    	</br>

	<input type="submit" value="Crear tipo documento" class="btn btn-primary">

</form>

	</div>

{% endblock %}