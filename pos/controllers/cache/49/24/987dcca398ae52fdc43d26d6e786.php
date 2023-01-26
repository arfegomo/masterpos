<?php

/* facturacion/facturacion.twig.php */
class __TwigTemplate_4924987dcca398ae52fdc43d26d6e786 extends Twig_Template
{
    protected $parent;

    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'stylesheets' => array($this, 'block_stylesheets'),
            'javascripts' => array($this, 'block_javascripts'),
            'contenido' => array($this, 'block_contenido'),
        );
    }

    public function getParent(array $context)
    {
        if (null === $this->parent) {
            $this->parent = $this->env->loadTemplate("layout.twig.php");
        }

        return $this->parent;
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $context = array_merge($this->env->getGlobals(), $context);

        $this->getParent($context)->display($context, array_merge($this->blocks, $blocks));
    }

    // line 2
    public function block_title($context, array $blocks = array())
    {
        echo " ";
        echo $this->renderParentBlock("title", $context, $blocks);
        echo " ";
    }

    // line 3
    public function block_stylesheets($context, array $blocks = array())
    {
        // line 4
        echo $this->renderParentBlock("stylesheets", $context, $blocks);
        echo "
<!--<link rel=\"stylesheet\" type=\"text/css\" href=\"../../../dist/css/jquery.autocomplete.css\" />-->
<!--<link rel=\"StyleSheet\" type=\"text/css\" href=\"../../../dist/css/jquery.alerts.css\" />-->
<link rel=\"stylesheet\" href=\"../../../dist/css/jquery-ui1.css\">
";
    }

    // line 9
    public function block_javascripts($context, array $blocks = array())
    {
        // line 10
        echo "
<script src=\"../../../dist/js/jquery-1.10.2.js\"></script>
<script src=\"../../../js/jquery-ui1.js\"></script>

";
        // line 14
        echo $this->renderParentBlock("javascripts", $context, $blocks);
        echo "

<script>

\$(document).ready(function() {

    

    if(";
        // line 22
        echo twig_escape_filter($this->env, $this->getContext($context, 'caja'), "html");
        echo " != 1){
        \$(\"#idconceptofacturacion\").attr(\"disabled\",\"disabled\");
        \$(\"#documento\").attr(\"readonly\",\"readonly\");
    }

    \$(\"#success-alert\").fadeTo(1500, 1500).slideUp(1500, function(){
    \$(\"#success-alert\").alert('close');
    });

    var concepto = 1;

        \$.ajax({
            url: \"searchConsecutivo.php\",
            dataType: \"json\",
            data: {id:concepto},
            type: \"POST\",
            success:  function (data) {
                        //console.log(data);
                        for(var i in data){
                            \$('#consecutivodian').val(data[i].consecutivodian);
                            \$('#consecutivo').val(data[i].consecutivo);
                            \$('#tipotransaccion').val(data[i].idtipotransaccion);
                            \$('#documentoreferencia').val(data[i].consecutivodian);
                            /*if(\$('#tipotransaccion').val() != 1 || \$('#tipotransaccion').val() != 5){
                                \$(\"#precio\").removeAttr(\"readonly\");

                            }*/
                    }
                        
                }

          });

      \$('#documentoID').val(222222222);
      \$('#documento').val(\"Cuantías Menores\");
      \$(\"#idarticulo\").removeAttr(\"disabled\");
      \$(\"#idarticulo\").focus();


    //Función que trae el consecutivo referente al concepto seleccionado
    \$(\"select[name=idconceptofacturacion]\").change(function(){

      var concepto = \$('select[name=idconceptofacturacion]').val();

        \$.ajax({
            url: \"searchConsecutivo.php\",
            dataType: \"json\",
            data: {id:concepto},
            type: \"POST\",
            success:  function (data) {
                        //console.log(data);
                        for(var i in data){
                            \$('#consecutivodian').val(data[i].consecutivodian);
                            \$('#consecutivo').val(data[i].consecutivo);
                            \$('#tipotransaccion').val(data[i].idtipotransaccion);
                           
                            if(\$('#tipotransaccion').val() == 2 || \$('#tipotransaccion').val() == 5 || \$('#tipotransaccion').val() == 6){
                    
                                \$(\"#documentoreferencia\").val(\"\");
                                \$(\"#documentoreferencia\").removeAttr(\"readonly\");

                            }else{
                                 \$(\"#documentoreferencia\").val(data[i].consecutivodian);
                                 \$(\"#documentoreferencia\").attr(\"readonly\",\"readonly\");
                            }
                    }
                        
                }

          });
        \$(\"#idarticulo\").focus();
      
    });
  //fin

    //Autocompletar personas
    srcPersonas = \"searchPersonas.php\";
    \$(\"#documento\").autocomplete({
    source: function(request, response) {
                \$.ajax({
                    url: srcPersonas,
                    dataType: \"json\",
                    data: {
                        term : request.term
                    },
                    success: function(data) {
                                //console.log(data);
                    \t\t\tresponse(\$.map(data, function(item) {
                                \treturn {
                                        label: item.nombres,
                                        value: item.id                                        

                                    };

                                }

                                ));                  
                            },

               });
            },
            //minLength: 3, 

            select: function (event, ui) {
            // Set autocomplete element to display the label
            this.value = ui.item.label;
            // Store value in hidden field
            \$('#documentoID').val(ui.item.value);
            // Prevent default behaviour
            \$(\"#idarticulo\").removeAttr('disabled');
            return false;
        }
        });
    //
    \$('#documento').keyup(function(e){
    if(e.keyCode == 13)
    {
        \$(\"#idarticulo\").focus();
    }
\t});
    //Fin

    //Autocompletar articulos
    srcArticulos = \"searchArticulos.php\";
    \$(\"#idarticulo\").autocomplete({
    source: function(request, response) {
                \$.ajax({
                    url: srcArticulos,
                    dataType: \"json\",
                    data: {
                        term : request.term
                    },
                    success: function(data) {
                            //console.log(data);
                                response(\$.map(data, function(item) {
                                    return {
                                        label: item.articulo,
                                        value: item.id,
                                        precio: item.precio,
                                        costoactual: item.costoactual,
                                        impuestoiva: item.impuestoiva,
                                        impuestoconsumo: item.impuestoconsumo,
                                        existenciactual: item.existenciactual,
                                        existenciatemporal: item.existenciatemporal,
                                        costotemporal: item.costotemporal

                                    };
                                }));
                            },                       
                });
            },
            //minLength: 2,     
            select: function (event, ui) {
            // Set autocomplete element to display the label
            this.value = ui.item.label;
            saldoactual = ui.item.existenciactual;
            // Store value in hidden field
            \$('#articuloID').val(ui.item.value);
            if(\$('#tipotransaccion').val()==1)
            {

            \$('#precio').val(ui.item.precio);
            \$('#iva').val(ui.item.impuestoiva);
            \$('#impoconsumo').val(ui.item.impuestoconsumo);
            \$('#existenciatemporal').val(ui.item.existenciatemporal);
            \$('#existenciactual').val(ui.item.existenciactual);
            \$('#costotemporal').val(ui.item.costotemporal);

            }else if(\$('#tipotransaccion').val()==2)
            {
                \$(\"#iva\").removeAttr(\"readonly\");
                \$(\"#impoconsumo\").removeAttr(\"readonly\");
                \$('#iva').val(0);
                \$('#impoconsumo').val(0);
                \$('#precio').val(ui.item.costoactual);
                \$(\"#precio\").removeAttr(\"readonly\");
                \$('#existenciatemporal').val(ui.item.existenciatemporal);
                \$('#existenciactual').val(ui.item.existenciactual);
                \$('#costotemporal').val(ui.item.costotemporal);
                \$('#costoactual').val(ui.item.costoactual);

            }else if(\$('#tipotransaccion').val()==3)
            {
                \$('#iva').val(0);
                \$('#impoconsumo').val(0);
                \$('#precio').val(ui.item.costoactual);
                \$(\"#precio\").removeAttr(\"readonly\");
                \$('#existenciatemporal').val(ui.item.existenciatemporal);
                \$('#existenciactual').val(ui.item.existenciactual);

            }else if(\$('#tipotransaccion').val()==4)
            {
                \$('#iva').val(0);
                \$('#impoconsumo').val(0);
                \$('#precio').val(ui.item.costoactual);
                \$('#existenciatemporal').val(ui.item.existenciatemporal);
                \$('#existenciactual').val(ui.item.existenciactual);
            }else if(\$('#tipotransaccion').val()==5)
            {
                \$('#precio').val(ui.item.precio);
                \$('#iva').val(ui.item.impuestoiva);
                \$('#precio').val(ui.item.precio);
                \$('#existenciatemporal').val(ui.item.existenciatemporal);
                \$('#existenciactual').val(ui.item.existenciactual);

            }else if(\$('#tipotransaccion').val()==6)
            {

                \$(\"#iva\").removeAttr(\"readonly\");
                \$(\"#impoconsumo\").removeAttr(\"readonly\");
                \$('#iva').val(0);
                \$('#impoconsumo').val(0);
                \$('#precio').val(ui.item.costoactual);
                \$(\"#precio\").removeAttr(\"readonly\");
                \$('#existenciatemporal').val(ui.item.existenciatemporal);
                \$('#existenciactual').val(ui.item.existenciactual);
                \$('#costotemporal').val(ui.item.costotemporal);
                \$('#costoactual').val(ui.item.costoactual);
            }


            \$(\"#cantidad\").removeAttr('disabled');
            \$(\"#cantidad\").focus();
            // Prevent default behaviour

            return false;
        }      
        });
    //
    /*\$('#idarticulo').keyup(function(e){
    if(e.keyCode == 13)
    {
        \$(\"#cantidad\").focus();
    }
\t});*/
    //Fin

//si en la caja de texto cantidad dan enter
\$('#cantidad').keyup(function(e){

    var cantidad = \$('#cantidad').val();  
    if((e.keyCode == 13)&&(cantidad > 0))
    {
        \$(\"#descuento\").removeAttr(\"disabled\");
        \$(\"#descuento\").val(0);
        \$(\"#descuento\").select();
    }

    //var cantidad = \$('#cantidad').val();  
    /*var cantidad = \$('#cantidad').val();  

    if((e.keyCode == 13)&&(cantidad > 0))
    {
        if(\$('#tipotransaccion').val()==1){
        if(cantidad > saldoactual){
            alert(\"Atención, no hay suficiente existencia de este producto.\");
        }else{
                           
                \$(\"#descuento\").removeAttr('disabled');
                \$(\"#descuento\").val(0);
                \$(\"#descuento\").select();
                    }


    }
        //\$(\"#descuento\").removeAttr('disabled');
        //\$(\"#descuento\").val(0);
        //\$(\"#descuento\").select();
    }*/

    
});
//fin

//si en la caja de texto descuento dan enter
\$('#descuento').keyup(function(e){
    if(e.keyCode == 13)
    {
            var precio = \$(\"#precio\").val();
            var cantidad = \$(\"#cantidad\").val();
            var descuento = \$(\"#descuento\").val();
            var consecutivo = \$(\"#consecutivo\").val();
            var articulo = \$(\"#articuloID\").val();
            var concepto = \$(\"#idconceptofacturacion\").val();
            var documento = \$(\"#documentoID\").val();
            var mesa = \$(\"#idmesa\").val();
            var tipotransaccion = \$(\"#tipotransaccion\").val();
            var impuestoiva = \$(\"#iva\").val();
            var impuestoconsumo = \$(\"#impoconsumo\").val();
            var documentoreferencia = \$(\"#documentoreferencia\").val();
            var existenciatemporal = \$(\"#existenciatemporal\").val();
            var existenciactual = \$(\"#existenciactual\").val();
            var costotemporal = \$(\"#costotemporal\").val();
            var costoactual = \$(\"#costoactual\").val();

            \$.ajax({
            dataType: \"html\",
            url: \"grabarTemporal.php\",
            data: {articulo:articulo,cantidad:cantidad,descuento:descuento,consecutivo:consecutivo,concepto:concepto,documento:documento,precio:precio,mesa:mesa,tipotransaccion:tipotransaccion,iva:impuestoiva,impoconsumo:impuestoconsumo,documentoreferencia:documentoreferencia,existenciatemporal:existenciatemporal,existenciactual:existenciactual,costotemporal:costotemporal,costoactual:costoactual},
            type: \"POST\",
            success:function(data) {
                \$(\"#idconceptofacturacion\").attr(\"disabled\",\"disabled\");
                \$(\"#documento\").attr(\"readonly\",\"readonly\");
                  \$(\"#capatemporal\").html(data);
                                            }
          });  

           \$(\"#idarticulo\").val(\"\");
           \$(\"#precio\").val(\"\");
           \$(\"#cantidad\").val(\"\");
           \$(\"#descuento\").val(\"\");
           \$(\"#idarticulo\").focus();

    }
});
//fin

/*\$(\"#idarticulo\").click(function(){
\$(\"#capapagar\").css(\"display\", \"none\"); 
})*/
\$('#idarticulo').keyup(function(e){
    if(e.keyCode == 13)
    {
        \$(\"#button\").focus();
    }
});
});
</script>

<!--Reloj digital-->
<script language=\"JavaScript\" type=\"text/javascript\">
    function show5(){
        if (!document.layers&&!document.all&&!document.getElementById)
        return

         var Digital=new Date()
         var hours=Digital.getHours()
         var minutes=Digital.getMinutes()
         var seconds=Digital.getSeconds()

        var dn=\"PM\"
        if (hours<12)
        dn=\"AM\"
        if (hours>12)
        hours=hours-12
        if (hours==0)
        hours=12

         if (minutes<=9)
         minutes=\"0\"+minutes
         if (seconds<=9)
         seconds=\"0\"+seconds
        //change font size here to your desire
        myclock=\"<font size='5' color='green' face='Arial' ><b><font size='1'></font>\"+hours+\":\"+minutes+\":\"
         +seconds+\" \"+dn+\"</font>\"
        if (document.layers){
        document.layers.liveclock.document.write(myclock)
        document.layers.liveclock.document.close()
        }
        else if (document.all)
        liveclock.innerHTML=myclock
        else if (document.getElementById)
        document.getElementById(\"liveclock\").innerHTML=myclock
        setTimeout(\"show5()\",1000)
         }


        window.onload=show5
         //-->
     </script>

  <!--<script type=\"text/javascript\" src=\"../../../js/jquery1.js\"></script>
  <script type='text/javascript' src='../../../js/jquery.autocomplete.js'></script>-->
  <!--<script type=\"text/javascript\" src=\"../../../js/facturacion.js\"></script>-->

  <!--<script type=\"text/javascript\" src=\"../../../js/jquery.ui.draggable.js\"></script>

  <script type=\"text/javascript\" src=\"../../../js/jquery.alerts.mod.js\"></script>-->
";
    }

    // line 401
    public function block_contenido($context, array $blocks = array())
    {
        // line 402
        echo "\t<div class=\"row\">
\t\t<div class=\"col-lg-6\">
\t\t\t\t<h1>Facturación</h1>
                <h3>Caja # ";
        // line 405
        echo twig_escape_filter($this->env, $this->getContext($context, 'caja'), "html");
        echo " </h3>
\t\t</div>
        
        <div class=\"col-lg-6\" align=\"right\">
        <h1>";
        // line 409
        echo twig_escape_filter($this->env, twig_date_format_filter($this->getAttribute($this->getContext($context, 'post'), "published_at", array(), "any", false), "d/m/Y", "America/Bogota"), "html");
        echo "</h1>
         <span id=\"liveclock\"></span> 
                             
        </div>
        
\t</div>\t

";
        // line 416
        if (($this->getContext($context, 'msg') == 1)) {
            // line 417
            echo "<div class=\"alert alert-success alert-dismissable\" id=\"success-alert\">
  <a href=\"#\" class=\"close\" data-dismiss=\"alert\" aria-label=\"close\">&times;</a>
  <strong>Registro exitoso!</strong> La transacción se grabó correctamente.
</div>
<div class=\"alert alert-success alert-dismissable\">
<h4><i><b>Último cambio : ";
            // line 422
            echo twig_escape_filter($this->env, $this->getContext($context, 'cambio'), "html");
            echo "</b></i></h4>
</div>
";
        }
        // line 425
        echo "
";
        // line 426
        if (($this->getContext($context, 'msg') == 5)) {
            // line 427
            echo "<div class=\"alert alert-danger\" id=\"danger-alert\">
  <a href=\"#\" class=\"close\" data-dismiss=\"alert\" aria-label=\"close\">&times;</a>
  <strong>Upsss, documento no grabado!</strong> La transacción no se grabó.
</div>
<div class=\"alert alert-danger alert-dismissable\"></div>
";
        }
        // line 433
        echo "<hr
\t<form action=\"\" method=\"post\" >
    <input type=\"hidden\" name=\"tipotransaccion\" id=\"tipotransaccion\">
    <input type=\"hidden\" name=\"idmesa\" id=\"idmesa\" value=\"";
        // line 436
        echo twig_escape_filter($this->env, $this->getContext($context, 'mesa'), "html");
        echo "\">
\t<div class=\"col-lg-4\">
\t<label for=\"role\">Concepto</label>
\t<select name=\"idconceptofacturacion\" class=\"form-control\" id=\"idconceptofacturacion\">
            <!--<option value=\"\">Elija</option>-->

\t\t";
        // line 442
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getContext($context, 'conceptosfacturacion'));
        foreach ($context['_seq'] as $context['_key'] => $context['conceptofacturacion']) {
            // line 443
            echo "
\t\t\t<option value=\"";
            // line 444
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, 'conceptofacturacion'), "idconceptofacturacion", array(), "any", false), "html");
            echo "\">";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, 'conceptofacturacion'), "nombreconceptofacturacion", array(), "any", false), "html");
            echo "</option>

\t\t";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['conceptofacturacion'], $context['_parent'], $context['loop']);
        $context = array_merge($_parent, array_intersect_key($context, $_parent));
        // line 447
        echo "
\t</select>



\t</div>



\t<div class=\"col-lg-4\">
\t<label for=\"documento\">Tercero</label>
\t<input type=\"text\" name=\"documento\" class=\"form-control\" id=\"documento\">
\t</div>


\t<div class=\"col-lg-4\">
\t<!--<label for=\"consecutivo\">Consecutivo</label>-->
\t<input type=\"hidden\" name=\"consecutivo\" class=\"form-control\" id=\"consecutivo\">
    <input type=\"hidden\" name=\"existenciatemporal\" class=\"form-control\" id=\"existenciatemporal\">
    <input type=\"hidden\" name=\"existenciactual\" class=\"form-control\" id=\"existenciactual\">
    <input type=\"hidden\" name=\"costotemporal\" class=\"form-control\" id=\"costotemporal\">
    <input type=\"hidden\" name=\"costoactual\" class=\"form-control\" id=\"costoactual\">
\t<label for=\"consecutivodian\"># Factura</label>
\t<input type=\"text\" name=\"consecutivodian\" class=\"form-control\" id=\"consecutivodian\" readonly=\"readonly\">
\t</div>


    <div class=\"col-lg-4\">
    <label for=\"documento\">CC/Nit</label>
    <input type=\"text\" name=\"documentoID\" class=\"form-control\" id=\"documentoID\" readonly=\"readonly\">
    </div>

    <div class=\"col-lg-4\">
    <label for=\"documentoreferencia\">Doc. Referencia</label>
    <input type=\"text\" name=\"documentoreferencia\" class=\"form-control\" readonly=\"readonly\" id=\"documentoreferencia\">
    </div>

    <div class=\"col-lg-4\">
    <label for=\"observacion\">Observación</label>
    <input type=\"text\" name=\"observacion\" class=\"form-control\" id=\"observacion\">
    </div>


\t<div class=\"row\">

\t\t<div class=\"col-lg-12\">

\t\t\t\t<h1 class=\"page-header\"></h1>

\t\t</div>

\t</div>





\t<div class=\"col-lg-4\">

\t

\t<label for=\"idarticulo\">Artículo</label>

    <div class=\"form-group input-group\">
        <input type=\"text\" name=\"idarticulo\" class=\"form-control\" id=\"idarticulo\" disabled=\"disabled\">
             <span class=\"input-group-btn\">
           <button class=\"btn btn-default\" type=\"button\"><i class=\"fa fa-search\"></i>
            </button>
    </span>
  </div>
    
\t<input type=\"hidden\" name=\"articuloID\" class=\"form-control\" id=\"articuloID\">



\t</div>



\t<div class=\"col-lg-2\">
\t<label for=\"precio\">Precio</label>

\t
    <div class=\"form-group input-group\">
     <span class=\"input-group-addon\">\$</span>
\t<input type=\"text\" name=\"precio\" class=\"form-control\" id=\"precio\" readonly=\"readonly\">
    </div>


\t</div>


    <div class=\"col-lg-1\">
    <label for=\"iva\">IVA</label>    
    <div class=\"form-group input-group\">
     
    <input type=\"text\" name=\"iva\" class=\"form-control\" id=\"iva\" readonly=\"readonly\">
    </div>
    </div>

    <div class=\"col-lg-1\">
    <label for=\"impoconsumo\">I.Con</label>
    
    <div class=\"form-group input-group\">
     
    <input type=\"text\" name=\"impoconsumo\" class=\"form-control\" id=\"impoconsumo\" readonly=\"readonly\">
    </div>
    </div>



\t<div class=\"col-lg-2\">

\t

\t<label for=\"cantidad\">Cantidad</label>

\t

\t<input type=\"text\" name=\"cantidad\" class=\"form-control\" id=\"cantidad\" disabled=\"disabled\" >



\t</div>



\t<div class=\"col-lg-2\">



\t<label for=\"descuento\">Descuento</label>

\t

\t<input type=\"text\" name=\"descuento\" class=\"form-control\" id=\"descuento\" disabled=\"disabled\">



\t</div>

    <div class=\"col-lg-12\" id=\"capatemporal\" name=\"capatemporal\">

    </div>



\t<div class=\"col-lg-12\" id=\"capapagar\" name=\"capapagar\">



\t</div>



\t</form>

        <div class=\"row\">

        ";
        // line 606
        if (($this->getContext($context, 'caja') == 1)) {
            // line 607
            echo "            
        <div class=\"col-lg-2\">
                <h1 class=\"page-header\"></h1>
                
                <div align=\"center\">
                    <a href=\"mantenimiento_transacciones.php\"><span class=\"glyphicon glyphicon-wrench fa-2x\" aria-hidden=\"true\"></span></a>
                </br>
                    <b>Mantenimiento</b>
                </div> 

                
        </div>
        <div class=\"col-lg-2\">
                <h1 class=\"page-header\"></h1>
                
                <div align=\"center\">
                    <a href=\"tira_fiscal.php\"><span class=\"glyphicon glyphicon-usd fa-2x\" aria-hidden=\"true\"></span></a>
                    </br>
                    <b>Caja</b>
                </div> 

                
        </div>
        <div class=\"col-lg-2\">
                <h1 class=\"page-header\"></h1>
                
                <div align=\"center\">
                    <a href=\"ventasReferencia.php\"><span class=\"glyphicon glyphicon-list-alt fa-2x\" aria-hidden=\"true\"></span></a>
                    </br>
                    <b>Ventas x producto</b>
                </div> 

                
        </div>
        <div class=\"col-lg-2\">
                <h1 class=\"page-header\"></h1>
                
                <div align=\"center\">
                    <a href=\"existencias_bodega.php\"><span class=\"glyphicon glyphicon-briefcase fa-2x\" aria-hidden=\"true\"></span></a>
                    </br>
                    <b>Existencias en Bodega</b>
                </div> 

                
        </div>
        <div class=\"col-lg-2\">
                <h1 class=\"page-header\"></h1>
                
                <div align=\"center\">
                    <a href=\"cerrarperiodo.php\"><span class=\"   glyphicon glyphicon-pushpin fa-2x\" aria-hidden=\"true\"></span></a>
                    </br>
                    <b>Cerrar periodo</b>
                </div> 

                
        </div>

        <div class=\"col-lg-2\">
                <h1 class=\"page-header\"></h1>
                
                <div align=\"center\">
                    <a href=\"javascript:eliminarAll()\"><span class=\"glyphicon glyphicon-trash fa-2x\" aria-hidden=\"true\"></span></a>
                    </br>
                    <b>Borrar</b>
                </div> 

                
        </div>
            ";
        } else {
            // line 676
            echo "        <div class=\"col-lg-2\">
                <h1 class=\"page-header\"></h1>
                
                <div align=\"center\">
                    <a href=\"tira_fiscal.php\"><span class=\"glyphicon glyphicon-usd fa-2x\" aria-hidden=\"true\"></span></a>
                    </br>
                    <b>Caja</b>
                </div> 

                
        </div>
            ";
        }
        // line 688
        echo "            
        </div>  

";
    }

    public function getTemplateName()
    {
        return "facturacion/facturacion.twig.php";
    }

    public function isTraitable()
    {
        return false;
    }
}
