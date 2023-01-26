{% extends "layout.twig.php" %}

{% block title %} {{ parent() }} {% endblock %}

{% block contenido %}

<div class="row">

		<div class="col-lg-12">

				<h1 class="page-header">Crear caja</h1>

		</div>

	</div>

	<br>

	<div class="col-lg-6">
    
    <form action="store.php" method="post" id="">

    <div class="form-group">
	<label for="idcaja">Idcaja:</label>
	<input type="text" placeholder="Idcaja" name="idcaja" class="form-control" id="">
    </div>
    
    	</br>

	<input type="submit" value="Crear caja" class="btn btn-primary">

</form>

	</div>

{% endblock %}