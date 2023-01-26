{% extends "layout.twig.php" %}

{% block title %} {{ parent() }} {% endblock %}

{% block stylesheets %}

{{ parent() }}

<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">

{% endblock %}

{% block javascripts %}

{{ parent() }}

<script type="text/javascript" src="../../js/articulo.js"></script>

{% endblock %}

{% block contenido %}

	<div class="row">

		<div class="col-lg-12">

				<h1 class="page-header">Crear artículo</h1>

		</div>

	</div>

	<br>

	<div class="col-lg-4">
    
    <form action="store.php" method="post" id="articulo-crear">

    <div class="form-group">
	<label for="nombrearticulo">Nombre artículo:</label>
	<input type="text" placeholder="Ingrese el nombre del artículo" name="nombrearticulo" class="form-control" id="nombrearticulo">
    </div>

    <div class="form-group">
	<label for="codigoarticulo">Código del artículo:</label>
	<input type="text" placeholder="Ingrese el código del artículo" name="codigoarticulo" class="form-control" id="codigoarticulo">
    </div>

    <div class="form-group">
	<label for="bloqueanegativos">Bloquea para negativos:</label>
	<select name="bloqueanegativos" class="form-control">
			<option value="1">Si</option>
			<option value="0">No</option>
	</select>
    </div>

    <div class="form-group">
	<label for="stockminimo">Stock mínimo:</label>
	<input type="text" placeholder="Stock mínimo" name="stockminimo" class="form-control">
    </div>
	
    <div class="form-group">
	<label for="stockmaximo">Stock máximo:</label>
	<input type="text" placeholder="Stock máximo" name="stockmaximo" class="form-control">
    </div>

    <div class="form-group">
	<label for="existenciactual">Existencia actual:</label>
	<input type="text" readonly="readonly" name="existenciactual" class="form-control">
    </div>

    <div class="form-group">
	<label for="existenciainial">Existencia inicio de mes:</label>
	<input type="text" readonly="readonly" name="existenciainial" class="form-control">
    </div>

	</div>

    <div class="col-lg-4">

    <div class="form-group">
	<label for="costoactual">Costo actual:</label>
	<input type="text" readonly="readonly" name="costoactual" class="form-control">
    </div>

    <div class="form-group">
	<label for="costoinicial">Costo inicio de mes:</label>
	<input type="text" placeholder="Ingrese costo inicio de mes" name="costoinicial" class="form-control">
    </div>

    <div class="form-group">
	<label for="facturable">Facturable:</label>
	<select name="facturable" class="form-control">
			<option value="1">Si</option>
			<option value="0">No</option>
	</select>
    </div>

    <div class="form-group">
	<label for="habilitar">Habilitar:</label>
	<select name="habilitar" class="form-control">
			<option value="1">Si</option>
			<option value="0">No</option>
	</select>
    </div>

    <div class="form-group">
	<label for="idclasificacion1">Clasificación # 1:</label>
	<select name="idclasificacion1" class="form-control">
	{% for clasificacion1 in clasificacion1 %}
	<option value="{{ clasificacion1.idclasificacion1 }}">{{ clasificacion1.nombreclasificacion1 }}</option>
	{% endfor %}
	</select>	
    </div>

    <div class="form-group">
	<label for="idclasificacion2">Clasificación # 2:</label>
	<select name="idclasificacion2" class="form-control">
	{% for clasificacion2 in clasificacion2 %}
	<option value="{{ clasificacion2.idclasificacion2 }}">{{ clasificacion2.nombreclasificacion2 }}</option>
	{% endfor %}
	</select>	
    </div>

	</div>

	<div class="col-lg-4">

    <div class="form-group"> 
	<label for="precioventa1">Precio de venta # 1:</label>
	<input type="text" placeholder="Ingrese el precio de venta # 1" name="precioventa1" id="precioventa1" class="form-control">
    </div>

    <div class="form-group"> 
	<label for="impuestoiva">IVA:</label>
	<input type="text" placeholder="Ingrese el valor del IVA" name="impuestoiva" id="impuestoiva" class="form-control">
    </div>

    <div class="form-group"> 
	<label for="impuestoconsumo">Impuesto al consumo:</label>
	<input type="text" placeholder="Ingrese el valor del impo. consumo" id="impuestoconsumo" name="impuestoconsumo" class="form-control">
    </div>

    <div class="form-group">
	<label for="idtipoimpuesto">Tipo de Impuesto:</label>
	<select name="idtipoimpuesto" class="form-control">
			<option value="0">Ninguno</option>
			<option value="1">Impuesto Consumo</option>
			<option value="2">IVA</option>
	</select>
    </div>

	</br>

	<input type="submit" value="Crear artículo" class="btn btn-primary">

</form>

</div>

{% endblock %}