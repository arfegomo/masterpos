{% extends "layout.twig.php" %}

{% block title %} {{ parent() }} {% endblock %}

{% block stylesheets %}

{{ parent() }}

<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">

{% endblock %}

{% block javascripts %}

  {{ parent() }}


{% endblock %}

{% block contenido %}

	<div class="row">

		<div class="col-lg-12">

				<h1 class="page-header">Crear consecutivos</h1>

		</div>

	</div>

	<br>

	<div class="col-lg-6">
    
    <form action="store.php" method="post" id="consecutivo-crear">

    <div class="form-group">
	<label for="consecutivodian">Consecutivo dian:</label>
	<input type="text" placeholder="Ingrese el consecutivo" name="consecutivodian" class="form-control" id="consecutivodian">
    </div>

    
	</br>

	<input type="submit" value="Crear" class="btn btn-primary">

</form>

</div>

<div id="datepicker"></div>

{% endblock %}

