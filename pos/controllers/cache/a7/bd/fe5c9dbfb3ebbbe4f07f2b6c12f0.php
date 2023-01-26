<?php

/* temporal.twig.php */
class __TwigTemplate_a7bdfe5c9dbfb3ebbbe4f07f2b6c12f0 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->blocks = array(
            'contenido' => array($this, 'block_contenido'),
            'javascripts' => array($this, 'block_javascripts'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $context = array_merge($this->env->getGlobals(), $context);

        // line 1
        $this->displayBlock('contenido', $context, $blocks);
        // line 303
        echo "


";
        // line 306
        $this->displayBlock('javascripts', $context, $blocks);
    }

    // line 1
    public function block_contenido($context, array $blocks = array())
    {
        // line 2
        echo "
<hr>

\t<div class=\"table-responsive\">

\t\t<table width=\"100%\" class=\"table table-striped\" >



\t      <thead>



\t        <tr>


        <th>Hora</th> 
            
\t      <th>Artículo</th>

\t\t\t  <th>Cantidad</th>\t

\t\t\t  <th>Precio</th>

\t\t\t  <th>Descuento(%)</th>

\t\t\t  <th>Iva</th>

\t\t\t  <th>Imp. Consumo</th>

\t\t\t  <th>Total</th>

\t          <!--<th>Acciones</th>-->



\t        </tr>



\t      </thead>



\t      <tbody>

\t\t\t";
        // line 48
        $context['subtotal'] = 0;
        // line 49
        echo "
\t\t\t";
        // line 50
        $context['impuestos'] = 0;
        // line 51
        echo "
\t\t\t";
        // line 52
        $context['total'] = 0;
        // line 53
        echo "
\t\t\t";
        // line 54
        $context['valorArticulo'] = 0;
        echo "\t\t



\t        ";
        // line 58
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getContext($context, 'articulos'));
        foreach ($context['_seq'] as $context['_key'] => $context['articulo']) {
            // line 59
            echo "


\t\t\t\t<tr>



              <td>";
            // line 66
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, 'articulo'), "created_at", array(), "any", false), "html");
            echo "</td>

\t\t          <td>";
            // line 68
            echo twig_escape_filter($this->env, twig_upper_filter($this->env, $this->getAttribute($this->getContext($context, 'articulo'), "nombrearticulo", array(), "any", false)), "html");
            echo "</td>

\t\t          <td>";
            // line 70
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, 'articulo'), "cantidad", array(), "any", false), "html");
            echo "</td>

\t\t          <td>";
            // line 72
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, 'articulo'), "baseunitario", array(), "any", false), "html");
            echo "</td>

\t\t          <td>";
            // line 74
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, 'articulo'), "descuento", array(), "any", false), "html");
            echo "</td>

\t\t          <td>";
            // line 76
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, 'articulo'), "impuestoiva", array(), "any", false), "html");
            echo "</td>

\t\t          <td>";
            // line 78
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, 'articulo'), "impuestoconsumo", array(), "any", false), "html");
            echo "</td>

\t\t          ";
            // line 80
            $context['valorArticulo'] = (($this->getAttribute($this->getContext($context, 'articulo'), "preciounitario", array(), "any", false) * $this->getAttribute($this->getContext($context, 'articulo'), "cantidad", array(), "any", false)) - (($this->getAttribute($this->getContext($context, 'articulo'), "preciounitario", array(), "any", false) * $this->getAttribute($this->getContext($context, 'articulo'), "cantidad", array(), "any", false)) * ($this->getAttribute($this->getContext($context, 'articulo'), "descuento", array(), "any", false) / 100)));
            // line 81
            echo "
\t\t          <td align=\"left\">";
            // line 82
            echo twig_escape_filter($this->env, $this->getContext($context, 'valorArticulo'), "html");
            echo "</td>



\t\t          ";
            // line 86
            $context['subtotal'] = (($this->getContext($context, 'subtotal') + ($this->getAttribute($this->getContext($context, 'articulo'), "baseunitario", array(), "any", false) * $this->getAttribute($this->getContext($context, 'articulo'), "cantidad", array(), "any", false))) - (($this->getAttribute($this->getContext($context, 'articulo'), "baseunitario", array(), "any", false) * $this->getAttribute($this->getContext($context, 'articulo'), "cantidad", array(), "any", false)) * ($this->getAttribute($this->getContext($context, 'articulo'), "descuento", array(), "any", false) / 100)));
            // line 87
            echo "


\t\t          ";
            // line 90
            $context['impuestos'] = (($this->getContext($context, 'impuestos') + ((($this->getAttribute($this->getContext($context, 'articulo'), "baseunitario", array(), "any", false) * $this->getAttribute($this->getContext($context, 'articulo'), "cantidad", array(), "any", false)) - (($this->getAttribute($this->getContext($context, 'articulo'), "baseunitario", array(), "any", false) * $this->getAttribute($this->getContext($context, 'articulo'), "cantidad", array(), "any", false)) * ($this->getAttribute($this->getContext($context, 'articulo'), "descuento", array(), "any", false) / 100))) * ($this->getAttribute($this->getContext($context, 'articulo'), "impuestoconsumo", array(), "any", false) / 100))) + ((($this->getAttribute($this->getContext($context, 'articulo'), "baseunitario", array(), "any", false) * $this->getAttribute($this->getContext($context, 'articulo'), "cantidad", array(), "any", false)) - (($this->getAttribute($this->getContext($context, 'articulo'), "baseunitario", array(), "any", false) * $this->getAttribute($this->getContext($context, 'articulo'), "cantidad", array(), "any", false)) * ($this->getAttribute($this->getContext($context, 'articulo'), "descuento", array(), "any", false) / 100))) * ($this->getAttribute($this->getContext($context, 'articulo'), "impuestoiva", array(), "any", false) / 100)));
            // line 91
            echo "
\t\t          ";
            // line 92
            $context['total'] = ($this->getContext($context, 'total') + $this->getContext($context, 'valorArticulo'));
            // line 93
            echo "

          ";
            // line 95
            if ((($this->getAttribute($this->getContext($context, 'articulo'), "idconceptofacturacion", array(), "any", false) == 2) || ($this->getAttribute($this->getContext($context, 'articulo'), "idconceptofacturacion", array(), "any", false) == 6))) {
                // line 96
                echo "          ";
            } else {
                // line 97
                echo "\t\t      <td align=\"center\"><a href=\"javascript:eliminarItem(";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, 'articulo'), "idtemporal", array(), "any", false), "html");
                echo ",";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, 'articulo'), "consecutivo", array(), "any", false), "html");
                echo ",";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, 'articulo'), "idconceptofacturacion", array(), "any", false), "html");
                echo ",";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, 'articulo'), "documento", array(), "any", false), "html");
                echo ",";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, 'articulo'), "idmesa", array(), "any", false), "html");
                echo ",";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, 'articulo'), "idarticulo", array(), "any", false), "html");
                echo ")\"><i class=\"glyphicon glyphicon-trash\"></i></a></td>
          ";
            }
            // line 99
            echo "

\t\t        </tr>

\t\t     ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['articulo'], $context['_parent'], $context['loop']);
        $context = array_merge($_parent, array_intersect_key($context, $_parent));
        // line 104
        echo "
\t\t     <tr>
\t\t        <td colspan=\"7\"><b><font size=\"7\">TOTAL</font></b></td><td align=\"left\"><b><font size=\"6\">\$";
        // line 106
        echo twig_escape_filter($this->env, $this->getContext($context, 'total'), "html");
        echo "</font></b></td><td></td>
\t\t     </tr>



\t      </tbody>

\t\t

\t    </table>

\t    \t\t  

\t    </div>

\t<!--<div class=\"row\">

\t<div class=\"col-lg-3\">

\t <span style=\"font-size: 30px\"><b>SUBTOTAL: \$";
        // line 125
        echo twig_escape_filter($this->env, $this->getContext($context, 'subtotal'), "html");
        echo "</b></span>

\t</div>

\t<div class=\"col-lg-3\">

\t <span style=\"font-size: 30px\"><b>IMPUESTOS: \$";
        // line 131
        echo twig_escape_filter($this->env, $this->getContext($context, 'impuestos'), "html");
        echo "</b></span>

\t</div>

\t<div class=\"col-lg-2\">

\t <span style=\"font-size: 30px\"><b>TOTAL: \$";
        // line 137
        echo twig_escape_filter($this->env, ($this->getContext($context, 'subtotal') + $this->getContext($context, 'impuestos')), "html");
        echo "</b></span>

\t</div>--> 

<html lang=\"en\">

<div class=\"modal fade\" id=\"miModal\" tabindex=\"-1\" role=\"dialog\" aria-labelledby=\"exampleModalLabel\" aria-hidden=\"true\">

  <div class=\"modal-dialog\" role=\"document\">

    <div class=\"modal-content\">

    \t<div class=\"modal-header\">

    \t\t<button type=\"button\" class=\"close\" data-dismiss=\"modal\" aria-label=\"Close\">

          <span aria-hidden=\"true\">&times;</span>

        </button>

    \t </div>

\t<form id=\"form\" name=\"form\" action=\"pagar.php\" method=\"post\" onkeypress=\"return anular(event)\">
\t<input type=\"hidden\" name=\"idCon\" value=\"";
        // line 160
        echo twig_escape_filter($this->env, $this->getContext($context, 'idCon'), "html");
        echo "\">
\t<input type=\"hidden\" name=\"idCons\" value=\"";
        // line 161
        echo twig_escape_filter($this->env, $this->getContext($context, 'idCons'), "html");
        echo "\">
\t<input type=\"hidden\" name=\"idDoc\" value=\"";
        // line 162
        echo twig_escape_filter($this->env, $this->getContext($context, 'idDoc'), "html");
        echo "\">
  <input type=\"hidden\" name=\"mesa\" value=\"";
        // line 163
        echo twig_escape_filter($this->env, $this->getContext($context, 'mesa'), "html");
        echo "\">
\t<input type=\"hidden\" name=\"valor\" value=\"";
        // line 164
        echo twig_escape_filter($this->env, $this->getContext($context, 'total'), "html");
        echo "\">
  <input type=\"hidden\" name=\"observacion\" value=\"";
        // line 165
        echo twig_escape_filter($this->env, $this->getContext($context, 'observacion'), "html");
        echo "\">
  <!--<input type=\"hidden\" name=\"docRef\" value=\"";
        // line 166
        echo twig_escape_filter($this->env, $this->getContext($context, 'docRef'), "html");
        echo "\">-->
  <input type=\"hidden\" name=\"cambiohidden\" id=\"cambiohidden\" value=\"\">
    
    <div class=\"col-lg-6\">
    <div class=\"form-group\">
    <label for=\"subtotal\">Subtotal</label>
    <input type=\"text\" name=\"subtotal\" class=\"form-control\" id=\"subtotal\" value=\"";
        // line 172
        echo twig_escape_filter($this->env, $this->getContext($context, 'subtotal'), "html");
        echo "\" readonly=\"readonly\">
    </div>
\t

    <div class=\"form-group\">
    <label for=\"impuestos\">Impuestos</label>
    <input type=\"text\" name=\"impuestos\" class=\"form-control\" id=\"impuestos\" value=\"";
        // line 178
        echo twig_escape_filter($this->env, $this->getContext($context, 'impuestos'), "html");
        echo "\" readonly=\"readonly\">
    </div>
\t

    <div class=\"form-group\">
    <label for=\"total\">Total</label>
    <input type=\"text\" name=\"total\" class=\"form-control\" id=\"total\" value=\"";
        // line 184
        echo twig_escape_filter($this->env, $this->getContext($context, 'total'), "html");
        echo "\" readonly=\"readonly\">
    </div>

    <div class=\"form-group\" id=\"ocultar\">
    <label for=\"valor\">Valor</label>
    <input type=\"text\" name=\"valor\" class=\"form-control\" id=\"valor\" onkeyup=\"resta()\" autocomplete=\"off\">
    </div>

    <label for=\"cambio\" id=\"ocultar1\" style=\"display: none\">Cambio:</label>
    
    <h1 style=\"color:red;\"><b><i id=\"cambio\"></i></b></h1>

\t</div>

\t<div class=\"col-lg-12\">
\t<div class=\"form-group\">
    <label for=\"formadepago\">Forma de Pago</label><br>
  <div class=\"btn-group btn-group-toggle\" data-toggle=\"buttons\">
  <label class=\"btn btn-success active\">
    <input type=\"radio\" name=\"options\" id=\"option1\" autocomplete=\"off\" checked value=\"1\" onchange=\"mostrar()\"> Efectivo
  </label>
  <label class=\"btn btn-success\">
    <input type=\"radio\" name=\"options\" id=\"option2\" autocomplete=\"off\" value=\"2\" onchange=\"ocultar()\"> Tarjeta débito
  </label>
  <label class=\"btn btn-success\">
    <input type=\"radio\" name=\"options\" id=\"option3\" autocomplete=\"off\" value=\"3\" onchange=\"ocultar()\"> Tarjeta crédito
  </label>
  <label class=\"btn btn-success\">
    <input type=\"radio\" name=\"options\" id=\"option4\" autocomplete=\"off\" value=\"4\" onchange=\"ocultar()\"> Bono
  </label>
  <label class=\"btn btn-success\">
    <input type=\"radio\" name=\"options\" id=\"option6\" autocomplete=\"off\" value=\"6\" onchange=\"ocultar()\"> Crédito
  </label>
  <label class=\"btn btn-success\">
    <input type=\"radio\" name=\"options\" id=\"option5\" autocomplete=\"off\" value=\"5\" onchange=\"ocultar()\"> Incluir
  </label>
</div>
    </div>

<div id=\"divResult\" style=\"display: none\">
\t
<div class=\"col-lg-12\">
    <input type=\"checkbox\" name=\"pago[]\" id=\"optionc1\" autocomplete=\"off\" value=\"1\"> Efectivo
</div>
<div class=\"col-lg-12\">
    <input type=\"text\" name=\"valor1\" class=\"form-control\" style=\"display: none\" id=\"efectivo\" value=\"0\">
</div>
<div class=\"col-lg-12\">
    <input type=\"checkbox\" name=\"pago[]\" id=\"optionc2\" autocomplete=\"off\" value=\"2\"> Tarjeta débito
</div>
<div class=\"col-lg-12\">
    <input type=\"text\" name=\"valor2\" class=\"form-control\" style=\"display: none\" id=\"tarjetadebito\" value=\"0\">
</div>
<div class=\"col-lg-12\">
    <input type=\"checkbox\" name=\"pago[]\" id=\"optionc3\" autocomplete=\"off\" value=\"3\"> Tarjeta crédito
</div>
<div class=\"col-lg-12\">
    <input type=\"text\" name=\"valor3\" class=\"form-control\" style=\"display: none\" id=\"tarjetacredito\" value=\"0\">
</div>
<div class=\"col-lg-12\">
    <input type=\"checkbox\" name=\"pago[]\" id=\"optionc4\" autocomplete=\"off\" value=\"4\"> Bono
</div>
<div class=\"col-lg-12\">
    <input type=\"text\" name=\"valor4\" class=\"form-control\" style=\"display: none\" id=\"bono\" value=\"0\">
</div>
</div>

</div>

<div class=\"col-lg-12\">
  <div class=\"form-group\">
    <label for=\"impresora\">Imprimir</label><br>
    <div class=\"btn-group btn-group-toggle\" data-toggle=\"buttons\">
  <label class=\"btn btn-primary btn-lg\">
    <input type=\"radio\" name=\"optionsIm\" id=\"option1\" autocomplete=\"off\" value=\"1\" > Si
  </label>
  <label class=\"btn btn-primary btn-lg active\">
    <input type=\"radio\" name=\"optionsIm\" id=\"option2\" autocomplete=\"off\" checked value=\"2\"> No
  </label>
</div>
    </div>
  </div>

      <div class=\"modal-footer\">

\t\t    <input type=\"submit\" name=\"actualizar\" id=\"submit3\" value=\"Aceptar\" class=\"btn btn-primary\" id=\"actualizar\" style=\"display: none\">
    \t\t<a href=\"\" class=\"btn btn-warning\" data-dismiss=\"modal\" >Cancelar</a>

      </div>
</form>

    </div>

  </div>

</div>

</html>\t\t

\t<div>

\t<a href='' id='id' data-id='";
        // line 285
        echo twig_escape_filter($this->env, $this->getContext($context, 'idCons'), "html");
        echo "' data-toggle='modal' class=\"btn btn-primary\" data-target='#miModal'>Pagar</a>



\t<!--<a href=\"javascript:grabarTransaccion(";
        // line 289
        echo twig_escape_filter($this->env, $this->getContext($context, 'idCons'), "html");
        echo ",";
        echo twig_escape_filter($this->env, $this->getContext($context, 'idCon'), "html");
        echo ",";
        echo twig_escape_filter($this->env, $this->getContext($context, 'idDoc'), "html");
        echo ")\" class=\"btn btn-primary\" id=\"button\" name=\"button\">Pagar</a>-->



\t</div>

\t</div>



\t<hr> 


";
    }

    // line 306
    public function block_javascripts($context, array $blocks = array())
    {
        // line 307
        echo "
<script type=\"text/javascript\">

\$(document).ready(function(){

//Validamos si la opción de pago otro esta seleccionada
\$(\"#submit\").on(\"click\", function() {

if(\$(\"#option5\").is(\":checked\")){  

var total = \$(\"#total\").val();
var efectivo = \$(\"#efectivo\").val();
var tarjetadebito = \$(\"#tarjetadebito\").val();
var tarjetacredito = \$(\"#tarjetacredito\").val();
var bono = \$(\"#bono\").val();
var pagado = (parseInt(efectivo) + parseInt(tarjetadebito) + parseInt(tarjetacredito) + parseInt(bono));

            if(total > pagado){
              alert(\"El valor total es superior a los valores ingresados.\");
              event.preventDefault();
            }else if(total < pagado){
              alert(\"Los valores ingresados son superiores al valor total.\");
              event.preventDefault();
            }else{
              if(confirm(\" ¿ Confirma la grabación de la transacción ?\")){

              }else{
                event.preventDefault();
              };
            };
        };
    });
//Fin

//Validamos que opción de pago fue seleecionada
\$(\"input[type=radio]\").on( 'change', function() {
    if( \$(this).is(':checked') ) {

        // Hacer algo si el checkbox ha sido seleccionado
        //alert(\"El checkbox con valor \" + \$(this).val() + \" ha sido seleccionado\");
        if(\$(this).val() == 5){
        \t\$(\"#divResult\").attr(\"style\", \"display\");
        \t\$(\"input[type=checkbox]\").on( 'change', function() {
        \t\tif( \$(this).is(':checked') ) {
        \t\t\tif(\$(this).val() == 1){
        \t\t\t\$(\"#efectivo\").attr(\"style\", \"display\").select();
        \t\t};
        \t\t\tif(\$(this).val() == 2){
        \t\t\t\$(\"#tarjetadebito\").attr(\"style\", \"display\").select();
        \t\t};
        \t\t\tif(\$(this).val() == 3){
        \t\t\t\$(\"#tarjetacredito\").attr(\"style\", \"display\").select();
        \t\t};
        \t\t\tif(\$(this).val() == 4){
        \t\t\t\$(\"#bono\").attr(\"style\", \"display\").select();
        \t\t};
        \t\t}else{
        \t\t\tif(\$(this).val() == 1){
        \t\t\t\$(\"#efectivo\").attr({'style': 'display:none'}).val(0);        \t\t\t
        \t\t};
        \t\tif(\$(this).val() == 2){
        \t\t\t\$(\"#tarjetadebito\").attr(\"style\", \"display:none\").val(0);
        \t\t};
        \t\tif(\$(this).val() == 3){
        \t\t\t\$(\"#tarjetacredito\").attr(\"style\", \"display:none\").val(0);
        \t\t};
        \t\tif(\$(this).val() == 4){
        \t\t\t\$(\"#bono\").attr(\"style\", \"display:none\").val(0);
        \t\t};
        \t\t};
        \t});
        }else{
        \t\$(\"#divResult\").attr(\"style\", \"display:none\");
        \t\$(\"#divResult input[type=checkbox]\").prop('checked', false);
        \t\$(\"#efectivo\").attr({'style': 'display:none'}).val(0);
        \t\$(\"#tarjetadebito\").attr(\"style\", \"display:none\").val(0);
        \t\$(\"#tarjetacredito\").attr(\"style\", \"display:none\").val(0);
        \t\$(\"#bono\").attr(\"style\", \"display:none\").val(0);
        }
    } else {
        // Hacer algo si el checkbox ha sido deseleccionado
        alert(\"El checkbox con valor \" + \$(this).val() + \" ha sido deseleccionado\");
    }
});
//Fin
});

function anular(e) {
          tecla = (document.all) ? e.keyCode : e.which;
          return (tecla != 13);
     }

function resta(){

  var total = \$(\"#total\").val();
  var valor = \$(\"#valor\").val();
  var cambio = 0;

  cambio = (valor - total);
  

  if(cambio >= 0){
    \$(\"#submit3\").css(\"display\",\"\");    
    \$(\"#cambiohidden\").val(cambio);
    //alert(\$(\"#cambiohidden\").val());
    
  }else{
    \$(\"#submit3\").css(\"display\",\"none\");    
  }

  \$(\"#ocultar1\").css(\"display\",\"\");

  \$(\"#cambio\").html(cambio);
}

function ocultar(){

\$(\"#ocultar\").css(\"display\",\"none\");
\$(\"#ocultar1\").css(\"display\",\"none\");
\$(\"#cambio\").css(\"display\",\"none\");
\$(\"#submit3\").css(\"display\",\"\");
  
}

function mostrar(){

  var total = \$(\"#total\").val();
  var valor = \$(\"#valor\").val();
  var cambio = 0;

  cambio = (valor - total);
  

if(cambio >= 0){
    \$(\"#submit3\").css(\"display\",\"\");    
    \$(\"#cambiohidden\").val(cambio);
    
  }else{
    \$(\"#submit3\").css(\"display\",\"none\");    
  }

\$(\"#ocultar\").css(\"display\",\"\");
\$(\"#ocultar1\").css(\"display\",\"\");
\$(\"#cambio\").css(\"display\",\"\");
\$(\"#valor\").focus();
  
}

function eliminarAll(){



      \$.ajax({

            dataType: \"html\",

            url: \"borrarTemporal.php\",

            //data: {idCons:idCons,idCon:idCon,idDoc:idDoc,idmesa:idmesa},

            type: \"POST\",

            success:function(data){

                  \$(\"#capatemporal\").html(data);

              }

          });

      \$(\"#capapagar\").css(\"display\", \"none\");

      \$(\"#idarticulo\").focus();

    }


  \tfunction eliminarItem(idTem,idCons,idCon,idDoc,idmesa,idarticulo){



  \t\t\$.ajax({

            dataType: \"html\",

            url: \"eliminarTemporal.php\",

            data: {idTem:idTem,idCons:idCons,idCon:idCon,idDoc:idDoc,idmesa:idmesa,idarticulo:idarticulo},

            type: \"POST\",

            success:function(data){

                  \$(\"#capatemporal\").html(data);

            \t}

          });

  \t\t\$(\"#capapagar\").css(\"display\", \"none\");

  \t\t\$(\"#idarticulo\").focus();

  \t}



  \tfunction grabarTransaccion(idCons,idCon,idDoc,Obs){



  \t\t\$.ajax({

  \t\t\tdataType: \"html\",

  \t\t\turl: \"grabar.php\",

  \t\t\tdata: {idCons:idCons,idCon:idCon,idDoc:idDoc,obs:observacion},

  \t\t\ttype: \"POST\",

  \t\t\tsuccess:function(data){

  \t\t\t\t\t\$(\"#capapagar\").html(data);

  \t\t\t}

  \t\t});



  \t\t\$(\"#capapagar\").css(\"display\", \"block\");

   \t}



   \t\$('a[id=id]').on('click',function () {

  \tid = \$(this).data(\"id\");

  \t\$(\"#id\").val(id);

  \t});



</script>





";
    }

    public function getTemplateName()
    {
        return "temporal.twig.php";
    }

    public function isTraitable()
    {
        return true;
    }
}
