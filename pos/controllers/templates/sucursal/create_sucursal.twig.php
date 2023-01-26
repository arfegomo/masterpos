{% extends "layout.twig.php" %}

{% block title %} {{ parent() }} {% endblock %}

{% block contenido %}

<div class="row">

		<div class="col-lg-12">

				<h1 class="page-header">Crear sucursal</h1>

		</div>

	</div>

	<br>

	<div class="col-lg-6">
    
    <form action="store.php" method="post" id="">
      
     <div class="form-group">
     <label for="idciudad">Ciudad:</label>
	<select name="idciudad" class="form-control">
		{% for ciudades in ciudades %}
		<option value="{{ ciudades.idciudad }}">{{ ciudades.nombreciudad }}</option>
		{% endfor %}
	</select>
    </div>
    
    <div class="form-group">
	<label for="nombresucursal">Nombre sucursal:</label>
	<input type="text" placeholder="Ingresa el nombre" name="nombresucursal" class="form-control" id="">
    </div>
    
    <div class="form-group">
    <label for="direccion">Dirección:</label>
	<input type="text" placeholder="Ingresa la dirección" name="direccion" class="form-control" id="">
    </div>

    <div class="form-group">
    <label for="telefono">Teléfono:</label>
	<input type="text" placeholder="Ingresa el teléfono" name="telefono" class="form-control" id="">
    </div>
    
    <div class="form-group">
    <label for="barrio">Barrio:</label>
	<input type="text" placeholder="Ingresa el barrio" name="barrio" class="form-control" id="">
    </div>
    
    	</br>

	<input type="submit" value="Crear sucursal" class="btn btn-primary">

</form>

	</div>

{% endblock %}

