<?php

/* facturacion/ventas_dia.twig.php */
class __TwigTemplate_60baaa0b46667aece915c25aeb591b00 extends Twig_Template
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



<!--Reloj digital-->
<script language=\"JavaScript\" type=\"text/javascript\">
\$(document).ready(function(){
 \$(function(){
      \$(\"#datepicker1\").datepicker({
        dateFormat:\"yy-mm-dd\",
        changeMonth: true,
          changeYear: true,
          yearRange: \"-100:+0\"
      });
});

\$(function(){
      \$(\"#datepicker2\").datepicker({
        dateFormat:\"yy-mm-dd\",
        changeMonth: true,
          changeYear: true,
          yearRange: \"-100:+0\"
      });
});


\$(\"select[name=tipostransaccion]\").change(function(){

      tipo = \$('select[name=tipostransaccion]').val();

});


//Función que trae las ventas diarias
    \$(\"input[name=reporte]\").click(function(){

      var fechainicial = \$('input[name=fechainicial]').val();
      var fechafinal = \$('input[name=fechafinal]').val();
      var tipotra = tipo;
  
        \$.ajax({
          dataType: \"html\",
            url: \"scriptVentadia.php\",
            data: {fechainicial:fechainicial,fechafinal:fechafinal,tipotra:tipotra},
            type: \"POST\",
            success:  function (data) {
               //console.log(data);
                \$(\"#capatemporal\").html(data);
  
                }

          });
      \$(\"#fecha\").focus();    
  });
  //fin

});

</script>

";
    }

    // line 75
    public function block_contenido($context, array $blocks = array())
    {
        // line 76
        echo "\t<div class=\"row\">
\t\t<div class=\"col-lg-6\">
\t\t\t\t<h1>X Día</h1>
\t\t</div>
\t</div>\t

  <div class=\"row\">
    <div class=\"col-lg-6\">
        <h5>Elija el tipo de transacción:
          <select name=\"tipostransaccion\" class=\"form-control\" id=\"tipostransaccion\">
            <option value=\"\">Elija...</option>
          ";
        // line 87
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getContext($context, 'tipostransacciones'));
        foreach ($context['_seq'] as $context['_key'] => $context['tipostransaccion']) {
            // line 88
            echo "          <option value=\"";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, 'tipostransaccion'), "idtipotransaccion", array(), "any", false), "html");
            echo "\">";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, 'tipostransaccion'), "nombretipotransaccion", array(), "any", false), "html");
            echo "</option>
          ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['tipostransaccion'], $context['_parent'], $context['loop']);
        $context = array_merge($_parent, array_intersect_key($context, $_parent));
        // line 90
        echo "          </select>
        </h5>

    </div>
  </div>  



<hr>


  <div class=\"row\">        

  <div class=\"col-lg-6\">
  
  <div class=\"form-group\">
  <label for=\"fecha\">Fecha Inicial:</label>
  <input type=\"text\" placeholder=\"Fecha Inicial\" name=\"fechainicial\" class=\"form-control\" id=\"datepicker1\">
  </div>

  </div>

  <div class=\"col-lg-6\">
  
  <div class=\"form-group\">
  <label for=\"fecha\">Fecha Final:</label>
  <input type=\"text\" placeholder=\"Fecha Final\" name=\"fechafinal\" class=\"form-control\" id=\"datepicker2\">
  </div>

  </div>

  </div>

  <div class=\"row\"> 
  <div class=\"col-lg-6\">
  <form action=\"\" method=\"post\">
  <input type=\"button\" value=\"Consultar\" class=\"btn btn-primary\" id=\"reporte\" name=\"reporte\">
  </form>
  </div>
  </div>

  <div class=\"col-lg-12\" id=\"capatemporal\" name=\"capatemporal\">

  </div>


";
    }

    public function getTemplateName()
    {
        return "facturacion/ventas_dia.twig.php";
    }

    public function isTraitable()
    {
        return false;
    }
}
