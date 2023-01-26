{% extends "layout.twig.php" %}

{% block title %} {{ parent() }} {% endblock %}

{% block stylesheets %}

{{ parent() }}

<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">

{% endblock %}

{% block javascripts %}

  {{ parent() }}

<script type="text/javascript">
$(document).ready(function(){
  $(function(){
    	$("#datepicker").datepicker({
    		dateFormat:"yy-mm-dd",
    		changeMonth: true,
      		changeYear: true,
      		yearRange: "-100:+0"
    	});
    });
});
</script>
<!--<script type="text/javascript" src="../../js/usuario.js"></script>-->

{% endblock %}

{% block contenido %}

	<div class="row">

		<div class="col-lg-12">

				<h1 class="page-header">Crear usuario</h1>

		</div>

	</div>

	<br>

	<div class="col-lg-6">
    
    <form action="store.php" method="post" id="usuario-crear">

    <div class="form-group">
	<label for="documento">Documento:</label>
	<input type="text" placeholder="Ingrese el documento" name="documento" class="form-control" id="documento">
    </div>

    <div class="form-group">
	<label for="nombres">Nombres:</label>
	<input type="text" placeholder="Ingrese los nombres" name="nombres" class="form-control" id="">
    </div>


    <div class="form-group">
	<label for="apellidos">Apellidos:</label>
	<input type="text" placeholder="Ingrese los apellidos" name="apellidos" class="form-control">
    </div>
	
    <div class="form-group">
	<label for="fechanacimiento">Fecha de nacimiento:</label>
	<input type="text" placeholder="Ingresa la fecha de nacimiento" name="fechanacimiento" class="form-control" id="datepicker">
    </div>

    <div class="form-group">
	<label for="email">Email:</label>
	<input type="text" placeholder="Ingrese el email" name="email" class="form-control">
    </div>

    <div class="form-group">
	<label for="direccion">Dirección:</label>
	<input type="text" placeholder="Ingrese la dirección" name="direccion" class="form-control">
    </div>

    <div class="form-group">
	<label for="telefonofijo">Teléfono:</label>
	<input type="text" placeholder="Ingrese teléfono" name="telefonofijo" class="form-control">
    </div>


    <div class="form-group">
	<label for="celular">Celular:</label>
	<input type="text" placeholder="Ingrese el celular" name="celular" class="form-control">
    </div>

	</div>

	<div class="col-lg-6">

    <div class="form-group">
	<label for="idgenero">Género:</label>
	<select name="idgenero" class="form-control">
	{% for genero in generos %}
	<option value="{{ genero.idgenero }}">{{ genero.nombregenero }}</option>
	{% endfor %}
	</select>	
    </div>

    <div class="form-group">
	<label for="role">Rol:</label>
	<select name="id" class="form-control">
	{% for role in roles %}
	<option value="{{ role.id }}">{{ role.display_name }}</option>
	{% endfor %}
	</select>
    </div>

    <div class="form-group"> 
	<label for="usuario">Usuario:</label>
	<input type="text" placeholder="Ingrese el usuario" name="usuario" class="form-control">
    </div>

    <div class="form-group">
	<label for="password">Password:</label>
	<input type="password" placeholder="Ingrese el password" name="password" class="form-control" id="password">
</div>

    <div class="form-group">
	<label for="re_password">Comprobar password:</label>
	<input type="password" placeholder="Ingrese de nuevo el password" name="re_password" class="form-control">
    </div>

    <div class="form-group">
	<label for="active">Estado:</label>
	<select name="active" class="form-control">
			<option value="1">Activo</option>
			<option value="0">Inactivo</option>
	</select>
    </div>

	</br>

	<input type="submit" value="Crear usuario" class="btn btn-primary">

</form>

</div>

<div id="datepicker"></div>

{% endblock %}