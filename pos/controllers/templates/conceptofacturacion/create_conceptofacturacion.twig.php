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

				<h1 class="page-header">Crear concepto de facturación</h1>

		</div>

	</div>

	<br>

	<div class="col-lg-6">
    
    <form action="store.php" method="post" id="conceptofacturacion-crear">

    <div class="form-group">
	<label for="nombreconceptofacturacion">Concepto de facturacion:</label>
	<input type="text" placeholder="Ingrese el nombre" name="nombreconceptofacturacion" class="form-control" id="nombreconceptofacturacion">
    </div>

    <div class="form-group">
	<label for="idconsecutivo">ID Consecutivo:</label>
	<select name="idconsecutivo" class="form-control">
	{% for consecutivo in consecutivos %}
	<option value="{{ consecutivo.idconsecutivo }}">{{ consecutivo.idconsecutivo }}</option>
	{% endfor %}
	</select>	
    </div>

    <div class="form-group">
	<label for="idtipotransaccion">Tipo de transacción:</label>
	<select name="idtipotransaccion" class="form-control">
	{% for tipotransaccion in tipostransacciones %}
	<option value="{{ tipotransaccion.idtipotransaccion }}">{{ tipotransaccion.nombretipotransaccion }}</option>
	{% endfor %}
	</select>	
    </div>

    <div class="form-group">
	<label for="acumulador">Acumulador:</label>
	<select name="acumulador" class="form-control">
			<option value="1">Compras</option>
			<option value="2">Ventas</option>
			<option value="3">Otras entradas</option>
			<option value="4">Otras salidas</option>
	</select>
    </div>

    <div class="form-group">
	<label for="operacionacumulador">Operación acumulador:</label>
	<select name="operacionacumulador" class="form-control">
			<option value="1">Suma</option>
			<option value="2">Resta</option>
			<option value="3">Ninguna</option>
	</select>
    </div>

</div>


<div class="col-lg-6">
	<div class="form-group">
	<label for="operacioninventario">Operación inventario:</label>
	<select name="operacioninventario" class="form-control">
			<option value="1">Suma</option>
			<option value="2">Resta</option>
			<option value="3">Ninguna</option>
	</select>
    </div>

   	<div class="form-group">
	<label for="afectacostoinventario">Afecta costo inventario:</label>
	<select name="afectacostoinventario" class="form-control">
			<option value="1">Si</option>
			<option value="2">No</option>
	</select>
    </div>

    <div class="form-group">
	<label for="afectacaja">Afecta caja:</label>
	<select name="afectacaja" class="form-control">
			<option value="1">Suma</option>
			<option value="2">Resta</option>
			<option value="3">Ninguna</option>
	</select>
    </div>

   

	</br>

	<input type="submit" value="Crear" class="btn btn-primary">

</form>

</div>

{% endblock %}

