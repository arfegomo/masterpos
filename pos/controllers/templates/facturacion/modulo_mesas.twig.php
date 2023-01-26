{% extends "layout.twig.php" %}
{% block title %} {{ parent() }} {% endblock %}
{% block stylesheets %}
{{ parent() }}


<!--<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">-->
{% endblock %}
{% block javascripts %}

<!--<script src="//code.jquery.com/jquery-1.10.2.js"></script>
<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>-->

{{ parent() }}



<!--Reloj digital-->
<script language="JavaScript" type="text/javascript">

$(document).ready(function() {

    $("#success-alert").fadeTo(1500, 1500).slideUp(1500, function(){
    $("#success-alert").alert('close');
    });

});

    function show5(){
        if (!document.layers&&!document.all&&!document.getElementById)
        return

         var Digital=new Date()
         var hours=Digital.getHours()
         var minutes=Digital.getMinutes()
         var seconds=Digital.getSeconds()

        var dn="PM"
        if (hours<12)
        dn="AM"
        if (hours>12)
        hours=hours-12
        if (hours==0)
        hours=12

         if (minutes<=9)
         minutes="0"+minutes
         if (seconds<=9)
         seconds="0"+seconds
        //change font size here to your desire
        myclock="<font size='5' color='green' face='Arial' ><b><font size='1'></font>"+hours+":"+minutes+":"
         +seconds+" "+dn+"</font>"
        if (document.layers){
        document.layers.liveclock.document.write(myclock)
        document.layers.liveclock.document.close()
        }
        else if (document.all)
        liveclock.innerHTML=myclock
        else if (document.getElementById)
        document.getElementById("liveclock").innerHTML=myclock
        setTimeout("show5()",1000)
         }


        window.onload=show5
         //-->
     </script>

  <!--<script type="text/javascript" src="../../../js/jquery1.js"></script>
  <script type='text/javascript' src='../../../js/jquery.autocomplete.js'></script>-->
  <!--<script type="text/javascript" src="../../../js/facturacion.js"></script>-->

  <!--<script type="text/javascript" src="../../../js/jquery.ui.draggable.js"></script>

  <script type="text/javascript" src="../../../js/jquery.alerts.mod.js"></script>-->
{% endblock %}
{% block contenido %}
	<div class="row">
		<div class="col-lg-6">
				<h1>Facturación</h1>
                <h3>Caja # {{ caja }}</h3>
		</div>
        <div class="col-lg-6" align="right">
                <h1>{{ post.published_at|date("d/m/Y", "America/Bogota") }}</h1>
                <h3>
                    <span id="liveclock"></span>
                </h3>             
        </div>
	</div>	



{% if(msg == 1) %}
<div class="alert alert-success alert-dismissable" id="success-alert">
  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  <strong>Registro exitoso!</strong> La transacción se grabó correctamente.
</div>
<div class="alert alert-danger alert-dismissable">
<h4><i><b>Último cambio : {{ cambio }}</b></i></h4>
</div>
{% endif %}

<hr>

    <div class="row">        

        {% for mesa in mesas %}

        {% if(mesa.idmesa == 0) %}

        <div class="col-lg-2">

            {% if(mesa.estado == 1) %}
            
            <a href="index.php?idmesa={{ mesa.idmesa }}" class="btn btn-danger btn-lg active btn-block" role="button" aria-pressed="true"><div><img src="../images/caja.png"></div><b>Caja Principal</b></a><hr>

            {% else %}

            
            <a href="index.php?idmesa={{ mesa.idmesa }}" class="btn btn-link btn-lg active btn-block" role="button" aria-pressed="true"><div><img src="../images/caja.png"></div><b>Caja Principal</b></a><hr>
        

            {% endif %}

        </div>

        {% elseif(mesa.idmesa < 6) %}

        <div class="col-lg-2">

            {% if(mesa.estado == 1) %}

           
            <a href="index.php?idmesa={{ mesa.idmesa }}" class="btn btn-danger btn-lg active btn-block" role="button" aria-pressed="true"><b>Cancha: {{ mesa.persona }}</b><br><b>{{ mesa.idmesa }}</b><div><img src="../images/bolo-criollo-ocp.png"></div></a><hr>

            {% else %}

           
            <a href="index.php?idmesa={{ mesa.idmesa }}" class="btn btn-link btn-lg active btn-block" role="button" aria-pressed="true"><b>Cancha: {{ mesa.persona }}</b><br><b>{{ mesa.idmesa }}</b><div><img src="../images/bolo-criollo.png"></div></a><hr>

            {% endif %}

        </div>

        {% else %}

        <div class="col-lg-2">

            {% if(mesa.estado == 1) %}

           
            <a href="index.php?idmesa={{ mesa.idmesa }}" class="btn btn-danger btn-lg active btn-block" role="button" aria-pressed="true"><b>Mesa: {{ mesa.persona }}</b><br><b>{{ mesa.idmesa }}</b><div><img src="../images/mesa.png"></div></a><hr>

            {% else %}

           
            <a href="index.php?idmesa={{ mesa.idmesa }}" class="btn btn-link btn-lg active btn-block" role="button" aria-pressed="true"><b>Mesa: {{ mesa.persona }}</b><br><b>{{ mesa.idmesa }}</b><div><img src="../images/mesa.png"></div></a><hr>

            {% endif %}

        </div>

            
        {% endif %}


        {% endfor %}



        

    </div>

{% endblock %}