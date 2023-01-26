{% extends "layout.twig.php" %}

{% block title %} {{ parent() }} {% endblock %}

{% block contenido %}

<div class="row">

		<div class="col-lg-12">

				<h1 class="page-header">Editar tipo transacción</h1>

		</div>

	</div>

	<br>

	<div class="col-lg-6">
    
    <form action="update.php" method="post">
	<input type="hidden" name="idtipotransaccion" value="{% for tipostransaccion in tipostransacciones %}{{ tipostransaccion.idtipotransaccion }} {% endfor %}">
    <div class="form-group">
	<label for="nombretipotransaccion">Nombre tipo transacción:</label>
	<input type="text" name="nombretipotransaccion" class="form-control" value="{% for tipostransaccion in tipostransacciones %}{{ tipostransaccion.nombretipotransaccion }} {% endfor %}">
    </div>
    
    	</br>

	<input type="submit" value="Actualizar" class="btn btn-primary">

</form>

	</div>

{% endblock %}