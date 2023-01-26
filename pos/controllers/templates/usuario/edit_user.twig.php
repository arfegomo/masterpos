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
  <!--<script type="text/javascript" src="../../../../js/usuario.js"></script>-->

{% endblock %}

{% block contenido %}

	<div class="row">

		<div class="col-lg-12">

				<h1 class="page-header">Editar usuario</h1>

		</div>

	</div>

	<br>

	<div class="col-lg-6">
    
    <form action="update.php" method="post" id="usuario-crear">

    <div class="form-group">
	<label for="documento">Documento:</label>
	<input type="text" name="documento" class="form-control" value="{% for user in user %}{{ user.documento }}{% endfor %}" readonly="readonly">
    </div>

    <div class="form-group">
	<label for="nombres">Nombres:</label>
	<input type="text" name="nombres" class="form-control" value="{% for user in user %}{{ user.nombres }}{% endfor %}">
    </div>

    <div class="form-group">
	<label for="apellidos">Apellidos:</label>
	<input type="text" name="apellidos" class="form-control" value="{% for user in user %}{{ user.apellidos }}{% endfor %}">
    </div>
	
    <div class="form-group">
	<label for="fechanacimiento">Fecha de nacimiento:</label>
	<input type="text" name="fechanacimiento" class="form-control" id="datepicker" value="{% for user in user %}{{ user.fechanacimiento }}{% endfor %}">
</div>

    <div class="form-group">
	<label for="email">Email:</label>
	<input type="text" name="email" class="form-control" value="{% for user in user %}{{ user.email }}{% endfor %}">
    </div>
    
    <div class="form-group">
	<label for="direccion">Dirección:</label>
	<input type="text" name="direccion" class="form-control" value="{% for user in user %}{{ user.direccion }}{% endfor %}">
    </div>

    <div class="form-group">
	<label for="telefonofijo">Teléfono:</label>
	<input type="text" name="telefonofijo" class="form-control" value="{% for user in user %}{{ user.telefonofijo }}{% endfor %}">
    </div>   

    <div class="form-group">
	<label for="celular">Celular:</label>
	<input type="text" name="celular" class="form-control" value="{% for user in user %}{{ user.celular }}{% endfor %}">
    </div>

	</div>

	<div class="col-lg-6">

    <div class="form-group">
	<label for="idgenero">Género:</label>
	<select name="idgenero" class="form-control">
		{% for genero in generos %}
			{% if(genero.idgenero == user.idgenero) %}
			<option value="{{ genero.idgenero }}" selected="selected">{{ genero.nombregenero }}</option>
			{% else %}
			<option value="{{ genero.idgenero }}">{{ genero.nombregenero }}</option>
			{% endif %}
		{% endfor %}
	</select>	
    </div>

    <div class="form-group">
	<label for="role">Role:</label>
	<select name="id" class="form-control">
		{% for role in roles %}
			{% if(role.id == user.idrole) %}
			<option value="{{ role.id }}" selected="selected">{{ role.display_name }}</option>
			{% else %}
			<option value="{{ role.id }}">{{ role.display_name }}</option>
			{% endif %}
		{% endfor %}
	</select>
    </div>

    <div class="form-group">
	<label for="usuario">Usuario:</label>
	<input type="text" name="usuario" class="form-control" value="{% for user in user %}{{ user.usuario }}{% endfor %}">
    </div>

    <div class="form-group">
	<label for="password">Password:</label>
	<input type="password" name="password" class="form-control" id="password" value="{% for user in user %}{{ user.password }}{% endfor %}">
    </div>

    <div class="form-group">
	<label for="re_password">Comprobar password:</label>
	<input type="password" name="re_password" class="form-control" value="{% for user in user %}{{ user.password }}{% endfor %}">
    </div>

    <div class="form-group">
	<label for="active">Estado:</label>
	<select name="active" class="form-control">
		{% if(user.active == 1) %}
			<option value="1" selected="selected">Activo</option>
			<option value="0">Inactivo</option>
		{% else %}
			<option value="1">Activo</option>
			<option value="0" selected="selected">Inactivo</option>
		{% endif %}
	</select>
    </div>

	</br>

	<input type="submit" value="Editar usuario" class="btn btn-primary">

</form>

</div>

<div id="datepicker"></div>

{% endblock %}