<?php

/* facturacion/tira_fiscal.twig.php */
class __TwigTemplate_0883e8c1ec4bd28fbd491cda32591bad extends Twig_Template
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

    // line 3
    public function block_title($context, array $blocks = array())
    {
        echo " ";
        echo $this->renderParentBlock("title", $context, $blocks);
        echo " ";
    }

    // line 5
    public function block_stylesheets($context, array $blocks = array())
    {
        // line 6
        echo "
";
        // line 7
        echo $this->renderParentBlock("stylesheets", $context, $blocks);
        echo "

<link rel=\"stylesheet\" href=\"../../../dist/css/jquery-ui1.css\">

";
    }

    // line 13
    public function block_javascripts($context, array $blocks = array())
    {
        // line 14
        echo "
  ";
        // line 15
        echo $this->renderParentBlock("javascripts", $context, $blocks);
        echo "

<script type=\"text/javascript\">
\$(document).ready(function(){
  
  \$(function(){
    \t\$(\"#datepicker\").datepicker({
    \t\tdateFormat:\"yy-mm-dd\",
    \t\tchangeMonth: true,
      \t\tchangeYear: true,
      \t\tyearRange: \"-100:+0\"
    \t});
    });

   //Función que trae las ventas diarias
    \$(\"input[name=reporte]\").click(function(){
      var fecha = \$('input[name=fecha]').val();
      var horainicio = \$('select[name=horainicio]').val();
      var horafin = \$('select[name=horafin]').val();
        \$.ajax({
        \tdataType: \"html\",
            url: \"reporteTirafiscal.php\",
            data: {fecha:fecha,horainicio:horainicio,horafin:horafin},
            type: \"POST\",
            success:  function (data) {
            \t //console.log(data);
                \$(\"#capatemporal\").html(data);
  
                }

          });
      \$(\"#fecha\").focus();    
  });
  //fin

});
</script>
<!--<script type=\"text/javascript\" src=\"../../js/usuario.js\"></script>-->

";
    }

    // line 56
    public function block_contenido($context, array $blocks = array())
    {
        // line 57
        echo "
\t<div class=\"row\">

\t\t<div class=\"col-lg-12\">

\t\t\t\t<h1 class=\"page-header\">Reporte de ventas diarias</h1>

\t\t</div>

\t</div>

\t<br>


  <div class=\"row\">

\t<div class=\"col-lg-6\">
\t
    <div class=\"form-group\">
\t<label for=\"fecha\">Fecha:</label>
\t<input type=\"text\" placeholder=\"Ingresa la fecha del reporte\" name=\"fecha\" class=\"form-control\" id=\"datepicker\">
    </div>

  </div>

  <div class=\"col-lg-3\">

    <div class=\"form-group\">
    <label for=\"fecha\">Hora inicio:</label>
    <select class=\"form-control\" name=\"horainicio\">
    ";
        // line 87
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable(range(0, 23));
        foreach ($context['_seq'] as $context['_key'] => $context['i']) {
            // line 88
            echo "      <option value=\"";
            echo twig_escape_filter($this->env, $this->getContext($context, 'i'), "html");
            echo "\">";
            echo twig_escape_filter($this->env, $this->getContext($context, 'i'), "html");
            echo ":00</option>
    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['i'], $context['_parent'], $context['loop']);
        $context = array_merge($_parent, array_intersect_key($context, $_parent));
        // line 90
        echo "    </select>
    </div>
    
  </div>

    <div class=\"col-lg-3\">

    <div class=\"form-group\">
    <label for=\"fecha\">Hora fin:</label>
    <select class=\"form-control\" name=\"horafin\">
    ";
        // line 100
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable(range(0, 23));
        foreach ($context['_seq'] as $context['_key'] => $context['i']) {
            // line 101
            echo "      <option value=\"";
            echo twig_escape_filter($this->env, $this->getContext($context, 'i'), "html");
            echo "\">";
            echo twig_escape_filter($this->env, $this->getContext($context, 'i'), "html");
            echo ":00</option>
    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['i'], $context['_parent'], $context['loop']);
        $context = array_merge($_parent, array_intersect_key($context, $_parent));
        // line 103
        echo "    </select>
    </div>
    
  </div>

</div>
    
\t</br>

<form action=\"\" method=\"post\">
\t<input type=\"button\" value=\"Consultar\" class=\"btn btn-primary\" id=\"reporte\" name=\"reporte\">
</form>


<div class=\"col-lg-12\" id=\"capatemporal\" name=\"capatemporal\">

\t</div>

<div id=\"datepicker\"></div>

";
    }

    public function getTemplateName()
    {
        return "facturacion/tira_fiscal.twig.php";
    }

    public function isTraitable()
    {
        return false;
    }
}
