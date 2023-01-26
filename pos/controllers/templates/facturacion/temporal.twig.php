{% block contenido %}

<hr>

	<div class="table-responsive">

		<table width="100%" class="table table-striped" >



	      <thead>



	        <tr>


        <th>Hora</th> 
            
	      <th>Artículo</th>

			  <th>Cantidad</th>	

			  <th>Precio</th>

			  <th>Descuento(%)</th>

			  <th>Iva</th>

			  <th>Imp. Consumo</th>

			  <th>Total</th>

	          <!--<th>Acciones</th>-->



	        </tr>



	      </thead>



	      <tbody>

			{% set subtotal = 0 %}

			{% set impuestos = 0 %}

			{% set total = 0 %}

			{% set valorArticulo = 0 %}		



	        {% for articulo in articulos %}



				<tr>



              <td>{{ articulo.created_at }}</td>

		          <td>{{ articulo.nombrearticulo|upper }}</td>

		          <td>{{ articulo.cantidad }}</td>

		          <td>{{ articulo.baseunitario }}</td>

		          <td>{{ articulo.descuento }}</td>

		          <td>{{ articulo.impuestoiva }}</td>

		          <td>{{ articulo.impuestoconsumo }}</td>

		          {% set valorArticulo = (articulo.preciounitario * articulo.cantidad) - ((articulo.preciounitario * articulo.cantidad) * (articulo.descuento/100)) %}

		          <td align="left">{{ valorArticulo }}</td>



		          {% set subtotal = subtotal + (articulo.baseunitario * articulo.cantidad) - ((articulo.baseunitario * articulo.cantidad)* (articulo.descuento/100)) %}



		          {% set impuestos = impuestos + (((articulo.baseunitario * articulo.cantidad)- ((articulo.baseunitario * articulo.cantidad)*(articulo.descuento/100))) * (articulo.impuestoconsumo/100)) + (((articulo.baseunitario * articulo.cantidad)- ((articulo.baseunitario * articulo.cantidad)*(articulo.descuento/100))) * (articulo.impuestoiva/100)) %}

		          {% set total = total + valorArticulo %}


          {% if((articulo.idconceptofacturacion == 2 or articulo.idconceptofacturacion == 6)) %}
          {% else %}
		      <td align="center"><a href="javascript:eliminarItem({{ articulo.idtemporal }},{{ articulo.consecutivo }},{{ articulo.idconceptofacturacion }},{{ articulo.documento }},{{ articulo.idmesa }},{{ articulo.idarticulo }})"><i class="glyphicon glyphicon-trash"></i></a></td>
          {% endif %}


		        </tr>

		     {% endfor %}

		     <tr>
		        <td colspan="7"><b><font size="7">TOTAL</font></b></td><td align="left"><b><font size="6">${{ total }}</font></b></td><td></td>
		     </tr>



	      </tbody>

		

	    </table>

	    		  

	    </div>

	<!--<div class="row">

	<div class="col-lg-3">

	 <span style="font-size: 30px"><b>SUBTOTAL: ${{ subtotal }}</b></span>

	</div>

	<div class="col-lg-3">

	 <span style="font-size: 30px"><b>IMPUESTOS: ${{ impuestos }}</b></span>

	</div>

	<div class="col-lg-2">

	 <span style="font-size: 30px"><b>TOTAL: ${{ (subtotal + impuestos) }}</b></span>

	</div>--> 

<html lang="en">

<div class="modal fade" id="miModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">

  <div class="modal-dialog" role="document">

    <div class="modal-content">

    	<div class="modal-header">

    		<button type="button" class="close" data-dismiss="modal" aria-label="Close">

          <span aria-hidden="true">&times;</span>

        </button>

    	 </div>

	<form id="form" name="form" action="pagar.php" method="post" onkeypress="return anular(event)">
	<input type="hidden" name="idCon" value="{{ idCon }}">
	<input type="hidden" name="idCons" value="{{ idCons }}">
	<input type="hidden" name="idDoc" value="{{ idDoc }}">
  <input type="hidden" name="mesa" value="{{ mesa }}">
	<input type="hidden" name="valor" value="{{ total }}">
  <input type="hidden" name="observacion" value="{{ observacion }}">
  <!--<input type="hidden" name="docRef" value="{{ docRef }}">-->
  <input type="hidden" name="cambiohidden" id="cambiohidden" value="">
    
    <div class="col-lg-6">
    <div class="form-group">
    <label for="subtotal">Subtotal</label>
    <input type="text" name="subtotal" class="form-control" id="subtotal" value="{{ subtotal }}" readonly="readonly">
    </div>
	

    <div class="form-group">
    <label for="impuestos">Impuestos</label>
    <input type="text" name="impuestos" class="form-control" id="impuestos" value="{{ impuestos }}" readonly="readonly">
    </div>
	

    <div class="form-group">
    <label for="total">Total</label>
    <input type="text" name="total" class="form-control" id="total" value="{{ total }}" readonly="readonly">
    </div>

    <div class="form-group" id="ocultar">
    <label for="valor">Valor</label>
    <input type="text" name="valor" class="form-control" id="valor" onkeyup="resta()" autocomplete="off">
    </div>

    <label for="cambio" id="ocultar1" style="display: none">Cambio:</label>
    
    <h1 style="color:red;"><b><i id="cambio"></i></b></h1>

	</div>

	<div class="col-lg-12">
	<div class="form-group">
    <label for="formadepago">Forma de Pago</label><br>
  <div class="btn-group btn-group-toggle" data-toggle="buttons">
  <label class="btn btn-success active">
    <input type="radio" name="options" id="option1" autocomplete="off" checked value="1" onchange="mostrar()"> Efectivo
  </label>
  <label class="btn btn-success">
    <input type="radio" name="options" id="option2" autocomplete="off" value="2" onchange="ocultar()"> Tarjeta débito
  </label>
  <label class="btn btn-success">
    <input type="radio" name="options" id="option3" autocomplete="off" value="3" onchange="ocultar()"> Tarjeta crédito
  </label>
  <label class="btn btn-success">
    <input type="radio" name="options" id="option4" autocomplete="off" value="4" onchange="ocultar()"> Bono
  </label>
  <label class="btn btn-success">
    <input type="radio" name="options" id="option6" autocomplete="off" value="6" onchange="ocultar()"> Crédito
  </label>
  <label class="btn btn-success">
    <input type="radio" name="options" id="option5" autocomplete="off" value="5" onchange="ocultar()"> Incluir
  </label>
</div>
    </div>

<div id="divResult" style="display: none">
	
<div class="col-lg-12">
    <input type="checkbox" name="pago[]" id="optionc1" autocomplete="off" value="1"> Efectivo
</div>
<div class="col-lg-12">
    <input type="text" name="valor1" class="form-control" style="display: none" id="efectivo" value="0">
</div>
<div class="col-lg-12">
    <input type="checkbox" name="pago[]" id="optionc2" autocomplete="off" value="2"> Tarjeta débito
</div>
<div class="col-lg-12">
    <input type="text" name="valor2" class="form-control" style="display: none" id="tarjetadebito" value="0">
</div>
<div class="col-lg-12">
    <input type="checkbox" name="pago[]" id="optionc3" autocomplete="off" value="3"> Tarjeta crédito
</div>
<div class="col-lg-12">
    <input type="text" name="valor3" class="form-control" style="display: none" id="tarjetacredito" value="0">
</div>
<div class="col-lg-12">
    <input type="checkbox" name="pago[]" id="optionc4" autocomplete="off" value="4"> Bono
</div>
<div class="col-lg-12">
    <input type="text" name="valor4" class="form-control" style="display: none" id="bono" value="0">
</div>
</div>

</div>

<div class="col-lg-12">
  <div class="form-group">
    <label for="impresora">Imprimir</label><br>
    <div class="btn-group btn-group-toggle" data-toggle="buttons">
  <label class="btn btn-primary btn-lg">
    <input type="radio" name="optionsIm" id="option1" autocomplete="off" value="1" > Si
  </label>
  <label class="btn btn-primary btn-lg active">
    <input type="radio" name="optionsIm" id="option2" autocomplete="off" checked value="2"> No
  </label>
</div>
    </div>
  </div>

      <div class="modal-footer">

		    <input type="submit" name="actualizar" id="submit3" value="Aceptar" class="btn btn-primary" id="actualizar" style="display: none">
    		<a href="" class="btn btn-warning" data-dismiss="modal" >Cancelar</a>

      </div>
</form>

    </div>

  </div>

</div>

</html>		

	<div>

	<a href='' id='id' data-id='{{ idCons }}' data-toggle='modal' class="btn btn-primary" data-target='#miModal'>Pagar</a>



	<!--<a href="javascript:grabarTransaccion({{ idCons }},{{ idCon }},{{ idDoc }})" class="btn btn-primary" id="button" name="button">Pagar</a>-->



	</div>

	</div>



	<hr> 


{% endblock %}



{% block javascripts %}

<script type="text/javascript">

$(document).ready(function(){

//Validamos si la opción de pago otro esta seleccionada
$("#submit").on("click", function() {

if($("#option5").is(":checked")){  

var total = $("#total").val();
var efectivo = $("#efectivo").val();
var tarjetadebito = $("#tarjetadebito").val();
var tarjetacredito = $("#tarjetacredito").val();
var bono = $("#bono").val();
var pagado = (parseInt(efectivo) + parseInt(tarjetadebito) + parseInt(tarjetacredito) + parseInt(bono));

            if(total > pagado){
              alert("El valor total es superior a los valores ingresados.");
              event.preventDefault();
            }else if(total < pagado){
              alert("Los valores ingresados son superiores al valor total.");
              event.preventDefault();
            }else{
              if(confirm(" ¿ Confirma la grabación de la transacción ?")){

              }else{
                event.preventDefault();
              };
            };
        };
    });
//Fin

//Validamos que opción de pago fue seleecionada
$("input[type=radio]").on( 'change', function() {
    if( $(this).is(':checked') ) {

        // Hacer algo si el checkbox ha sido seleccionado
        //alert("El checkbox con valor " + $(this).val() + " ha sido seleccionado");
        if($(this).val() == 5){
        	$("#divResult").attr("style", "display");
        	$("input[type=checkbox]").on( 'change', function() {
        		if( $(this).is(':checked') ) {
        			if($(this).val() == 1){
        			$("#efectivo").attr("style", "display").select();
        		};
        			if($(this).val() == 2){
        			$("#tarjetadebito").attr("style", "display").select();
        		};
        			if($(this).val() == 3){
        			$("#tarjetacredito").attr("style", "display").select();
        		};
        			if($(this).val() == 4){
        			$("#bono").attr("style", "display").select();
        		};
        		}else{
        			if($(this).val() == 1){
        			$("#efectivo").attr({'style': 'display:none'}).val(0);        			
        		};
        		if($(this).val() == 2){
        			$("#tarjetadebito").attr("style", "display:none").val(0);
        		};
        		if($(this).val() == 3){
        			$("#tarjetacredito").attr("style", "display:none").val(0);
        		};
        		if($(this).val() == 4){
        			$("#bono").attr("style", "display:none").val(0);
        		};
        		};
        	});
        }else{
        	$("#divResult").attr("style", "display:none");
        	$("#divResult input[type=checkbox]").prop('checked', false);
        	$("#efectivo").attr({'style': 'display:none'}).val(0);
        	$("#tarjetadebito").attr("style", "display:none").val(0);
        	$("#tarjetacredito").attr("style", "display:none").val(0);
        	$("#bono").attr("style", "display:none").val(0);
        }
    } else {
        // Hacer algo si el checkbox ha sido deseleccionado
        alert("El checkbox con valor " + $(this).val() + " ha sido deseleccionado");
    }
});
//Fin
});

function anular(e) {
          tecla = (document.all) ? e.keyCode : e.which;
          return (tecla != 13);
     }

function resta(){

  var total = $("#total").val();
  var valor = $("#valor").val();
  var cambio = 0;

  cambio = (valor - total);
  

  if(cambio >= 0){
    $("#submit3").css("display","");    
    $("#cambiohidden").val(cambio);
    //alert($("#cambiohidden").val());
    
  }else{
    $("#submit3").css("display","none");    
  }

  $("#ocultar1").css("display","");

  $("#cambio").html(cambio);
}

function ocultar(){

$("#ocultar").css("display","none");
$("#ocultar1").css("display","none");
$("#cambio").css("display","none");
$("#submit3").css("display","");
  
}

function mostrar(){

  var total = $("#total").val();
  var valor = $("#valor").val();
  var cambio = 0;

  cambio = (valor - total);
  

if(cambio >= 0){
    $("#submit3").css("display","");    
    $("#cambiohidden").val(cambio);
    
  }else{
    $("#submit3").css("display","none");    
  }

$("#ocultar").css("display","");
$("#ocultar1").css("display","");
$("#cambio").css("display","");
$("#valor").focus();
  
}

function eliminarAll(){



      $.ajax({

            dataType: "html",

            url: "borrarTemporal.php",

            //data: {idCons:idCons,idCon:idCon,idDoc:idDoc,idmesa:idmesa},

            type: "POST",

            success:function(data){

                  $("#capatemporal").html(data);

              }

          });

      $("#capapagar").css("display", "none");

      $("#idarticulo").focus();

    }


  	function eliminarItem(idTem,idCons,idCon,idDoc,idmesa,idarticulo){



  		$.ajax({

            dataType: "html",

            url: "eliminarTemporal.php",

            data: {idTem:idTem,idCons:idCons,idCon:idCon,idDoc:idDoc,idmesa:idmesa,idarticulo:idarticulo},

            type: "POST",

            success:function(data){

                  $("#capatemporal").html(data);

            	}

          });

  		$("#capapagar").css("display", "none");

  		$("#idarticulo").focus();

  	}



  	function grabarTransaccion(idCons,idCon,idDoc,Obs){



  		$.ajax({

  			dataType: "html",

  			url: "grabar.php",

  			data: {idCons:idCons,idCon:idCon,idDoc:idDoc,obs:observacion},

  			type: "POST",

  			success:function(data){

  					$("#capapagar").html(data);

  			}

  		});



  		$("#capapagar").css("display", "block");

   	}



   	$('a[id=id]').on('click',function () {

  	id = $(this).data("id");

  	$("#id").val(id);

  	});



</script>





{% endblock %}