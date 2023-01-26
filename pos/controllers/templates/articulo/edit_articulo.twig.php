{% extends "layout.twig.php" %}

{% block title %} {{ parent() }} {% endblock %}

{% block stylesheets %}

{{ parent() }}

<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">

{% endblock %}

{% block javascripts %}

  {{ parent() }}

<!--<script type="text/javascript" src="../../js/usuario.js"></script>-->

{% endblock %}

{% block contenido %}

	<div class="row">

		<div class="col-lg-12">

				<h1 class="page-header">Editar artículo</h1>

		</div>

	</div>

	<br>

	<div class="col-lg-4">
    
    <form action="update.php" method="post" id="articulo-crear">
    <input type="hidden" name="idarticulo" value="{% for articulo in articulos %}{{ articulo.idarticulo }}{% endfor %}">	

    <div class="form-group">
	<label for="nombrearticulo">Nombre artículo:</label>
	<input type="text" name="nombrearticulo" placeholder="Ingrese el nombre del artículo" class="form-control" id="nombrearticulo" value="{% for articulo in articulos %}{{ articulo.nombrearticulo }}{% endfor %}">
    </div>

    <div class="form-group">
	<label for="codigoarticulo">Código del artículo:</label>
	<input type="text" placeholder="Ingrese el código del artículo" name="codigoarticulo" class="form-control" id="codigoarticulo" value="{% for articulo in articulos %}{{ articulo.codigoarticulo }}{% endfor %}" readonly="readonly">
    </div>

    <div class="form-group">
	<label for="bloqueanegativos">Bloquea para negativos:</label>
	<select name="bloqueanegativos" class="form-control">
		{% for articulo in articulos %}
			{% if(articulo.bloqueanegativos) == 1 %}
			<option value="1" selected="selected">Si</option>
			<option value="0">No</option>
			{% else %}
			<option value="0" selected="selected">No</option>
			<option value="1">Si</option>
			{% endif %}
		{% endfor %}
	</select>
    </div>

    <div class="form-group">
	<label for="stockminimo">Stock mínimo:</label>
	<input type="text" placeholder="Stock mínimo" name="stockminimo" class="form-control" value="{% for articulo in articulos %}{{ articulo.stockminimo }}{% endfor %}">
    </div>
	
    <div class="form-group">
	<label for="stockmaximo">Stock máximo:</label>
	<input type="text" placeholder="Stock máximo" name="stockmaximo" class="form-control" value="{% for articulo in articulos %}{{ articulo.stockmaximo }}{% endfor %}">
    </div>

    <div class="form-group">
	<label for="existenciactual">Existencia actual:</label>
	<input type="text" readonly="readonly" name="existenciactual" class="form-control" value="{% for articulo in articulos %}{{ articulo.existenciactual }}{% endfor %}">
    </div>

    <div class="form-group">
	<label for="existenciainial">Existencia inicio de mes:</label>
	<input type="text" readonly="readonly" name="existenciainial" class="form-control" value="{% for articulo in articulos %}{{ articulo.existenciainial }}{% endfor %}">
    </div>

	</div>

    <div class="col-lg-4">

    <div class="form-group">
	<label for="costoactual">Costo actual:</label>
	<input type="text" name="costoactual" class="form-control" value="{% for articulo in articulos %}{{ articulo.costoactual }}{% endfor %}">
    </div>

    <div class="form-group">
	<label for="costoinicial">Costo inicio de mes:</label>
	<input type="text" placeholder="Ingrese costo inicio de mes" name="costoinicial" class="form-control" value="{% for articulo in articulos %}{{ articulo.costoinicial }}{% endfor %}">
    </div>

    <div class="form-group">
	<label for="facturable">Facturable:</label>
	<select name="facturable" class="form-control">
		{% for articulo in articulos %}
			{% if(articulo.facturable) == 1 %}
			<option value="1" selected="selected">Si</option>
			<option value="0">No</option>
			{% else %}
			<option value="0" selected="selected">No</option>
			<option value="1">Si</option>
			{% endif %}
		{% endfor %}
	</select>
    </div>

    <div class="form-group">
	<label for="habilitar">Habilitar:</label>
	<select name="habilitar" class="form-control">
		{% for articulo in articulos %}
			{% if(articulo.habilitar) == 1 %}
			<option value="1" selected="selected">Si</option>
			<option value="0">No</option>
			{% else %}
			<option value="0" selected="selected">No</option>
			<option value="1">Si</option>
			{% endif %}
		{% endfor %}
	</select>
    </div>

    <div class="form-group">
	<label for="idclasificacion1">Clasificación # 1:</label>
	<select name="idclasificacion1" class="form-control">
	{% for clasificacion1 in clasificacion1 %}
		{% for articulo in articulos %}
			{% if(articulo.idclasificacion1 == clasificacion1.idclasificacion1) %}
				<option value="{{ clasificacion1.idclasificacion1 }}" selected="selected">{{ clasificacion1.nombreclasificacion1 }}</option>
			{% else %}
				<option value="{{ clasificacion1.idclasificacion1 }}">{{ clasificacion1.nombreclasificacion1 }}</option>
			{% endif %}
		{% endfor %}
	{% endfor %}
	</select>	
    </div>

    <div class="form-group">
	<label for="idclasificacion2">Clasificación # 2:</label>
	<select name="idclasificacion2" class="form-control">
	{% for clasificacion2 in clasificacion2 %}
		{% for articulo in articulos %}
			{% if(articulo.idclasificacion2 == clasificacion2.idclasificacion2) %}
				<option value="{{ clasificacion2.idclasificacion2 }}" selected="selected">{{ clasificacion2.nombreclasificacion2 }}</option>
			{% else %}
				<option value="{{ clasificacion2.idclasificacion2 }}">{{ clasificacion2.nombreclasificacion2 }}</option>
			{% endif %}
		{% endfor %}
	{% endfor %}
	</select>	
    </div>

	</div>

	<div class="col-lg-4">

    <div class="form-group"> 
	<label for="precioventa1">Precio de venta # 1:</label>
	<input type="text" placeholder="Ingrese el precio de venta # 1" name="precioventa1" id="precioventa1" class="form-control" value="{% for articulo in articulos %}{{ articulo.precioventa1 }}{% endfor %}">
    </div>

    <div class="form-group"> 
	<label for="impuestoiva">IVA:</label>
	<input type="text" placeholder="Ingrese el valor del IVA" name="impuestoiva" id="impuestoiva" class="form-control" value="{% for articulo in articulos %}{{ articulo.impuestoiva }}{% endfor %}">
    </div>

    <div class="form-group"> 
	<label for="impuestoconsumo">Impuesto al consumo:</label>
	<input type="text" placeholder="Ingrese el valor del impo. consumo" id="impuestoconsumo" name="impuestoconsumo" class="form-control" value="{% for articulo in articulos %}{{ articulo.impuestoconsumo }}{% endfor %}">
    </div>

    <div class="form-group">
	<label for="idtipoimpuesto">Tipo de Impuesto:</label>
	<select name="idtipoimpuesto" class="form-control">
		{% for articulo in articulos %}
			{% if(articulo.idtipoimpuesto) == 0 %}
			<option value="0" selected="selected">Ninguno</option>
			<option value="1">Excluido</option>
			<option value="2">Exento</option>
			<option value="3">Gravable</option>
			{% elseif(articulo.idtipoimpuesto == 1) %}
			<option value="0">Ninguno</option>
			<option value="1" selected="selected">Excluido</option>
			<option value="2">Exento</option>
			<option value="3">Gravable</option>
			{% elseif(articulo.idtipoimpuesto == 2) %}
			<option value="0">Ninguno</option>
			<option value="1">Excluido</option>
			<option value="2" selected="selected">Exento</option>
			<option value="3">Gravable</option>
			{% else %}
			<option value="0">Ninguno</option>
			<option value="1">Impuesto Consumo</option>
			<option value="2">IVA</option>
			{% endif %}
		{% endfor %}
	</select>
    </div>

	</br>

	<input type="submit" value="Modificar artículo" class="btn btn-primary">

</form>

</div>

{% endblock %}