{% extends "layout.twig.php" %}

{% block title %} {{ parent() }} {% endblock %}

{% block contenido %}

<div class="row">

		<div class="col-lg-12">

				<h1 class="page-header">Crear ciudad</h1>

		</div>

	</div>

	<br>

	<div class="col-lg-6">
    
    <form action="store.php" method="post" id="">
    
    <div class="form-group">
    <label for="iddepartamento">Departamentos:</label>
	<select name="iddepartamento" class="form-control">
		{% for departamentos in departamentos %}
	<option value="{{ departamentos.iddepartamento }}">{{ departamentos.nombredepartamento }}</option>
		{% endfor %}
	</select>
    </div>
    
    <div class="form-group">
	<label for="nombreciudad">Nombre ciudad:</label>
	<input type="text" placeholder="Nombre ciudad" name="nombreciudad" class="form-control" id="">
    </div>
    
    	</br>

	<input type="submit" value="Crear ciudad" class="btn btn-primary">

</form>

	</div>

{% endblock %}
