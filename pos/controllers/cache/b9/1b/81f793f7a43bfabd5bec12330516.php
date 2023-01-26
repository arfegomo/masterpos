<?php

/* mesas/trasladoMesas.twig.php */
class __TwigTemplate_b91b81f793f7a43bfabd5bec12330516 extends Twig_Template
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
<link rel=\"stylesheet\" href=\"//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css\">
";
    }

    // line 9
    public function block_javascripts($context, array $blocks = array())
    {
        // line 10
        echo "
<script src=\"//code.jquery.com/jquery-1.10.2.js\"></script>
<script src=\"//code.jquery.com/ui/1.11.4/jquery-ui.js\"></script>

";
        // line 14
        echo $this->renderParentBlock("javascripts", $context, $blocks);
        echo "



<!--Reloj digital-->
<script language=\"JavaScript\" type=\"text/javascript\">
\$(document).ready(function(){



    \$(\"input[name=trasladar]\").click(function(){
      var origen = \$('select[name=origen]').val();
      var destino = \$('select[name=destino]').val();
  
        \$.ajax({
          dataType: \"html\",
            url: \"../facturacion/scriptTraslado.php\",
            data: {origen:origen,destino:destino},
            type: \"POST\",
            success:  function (data) {
               //console.log(data);
                \$(\"#capatemporal\").html(data);
                setTimeout(\"location.reload(true);\", 500);
                }

          });  

  });
  //fin

});

</script>

";
    }

    // line 49
    public function block_contenido($context, array $blocks = array())
    {
        // line 50
        echo "\t<div class=\"row\">
\t\t<div class=\"col-lg-6\">
\t\t\t\t<h1>Traslado de Mesa</h1>
\t\t</div>
\t</div>\t



<hr>


  <div class=\"row\">        

  <div class=\"col-lg-6\">
  
  <div class=\"form-group\">
  <label for=\"ocupadas\">Origen:</label>
  <select name=\"origen\" class=\"form-control\">
    
    ";
        // line 69
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getContext($context, 'mesasocupadas'));
        foreach ($context['_seq'] as $context['_key'] => $context['mesasocupada']) {
            // line 70
            echo "    <option value=\"";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, 'mesasocupada'), "idmesa", array(), "any", false), "html");
            echo "\"> Mesa ";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, 'mesasocupada'), "idmesa", array(), "any", false), "html");
            echo " </option>
    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['mesasocupada'], $context['_parent'], $context['loop']);
        $context = array_merge($_parent, array_intersect_key($context, $_parent));
        // line 72
        echo "  </select>
  </div>

  </div>

  <div class=\"col-lg-6\">
  
  <div class=\"form-group\">
  <label for=\"destino\">Destino:</label>
 <select name=\"destino\" class=\"form-control\">
    
    ";
        // line 83
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getContext($context, 'mesaslibres'));
        foreach ($context['_seq'] as $context['_key'] => $context['mesaslibre']) {
            // line 84
            echo "    <option value=\"";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, 'mesaslibre'), "idmesa", array(), "any", false), "html");
            echo "\"> Mesa ";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, 'mesaslibre'), "idmesa", array(), "any", false), "html");
            echo " </option>
    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['mesaslibre'], $context['_parent'], $context['loop']);
        $context = array_merge($_parent, array_intersect_key($context, $_parent));
        // line 86
        echo "  </select>
  </div>

  </div>

  </div>

  <div class=\"row\"> 
  <div class=\"col-lg-6\">
  <form action=\"\" method=\"post\">
  <input type=\"button\" value=\"Trasladar\" class=\"btn btn-primary\" id=\"trasladar\" name=\"trasladar\">
  </form>
  </div>
  </div>

  <br>

   <div class=\"row\">

  <div class=\"col-lg-12\" id=\"capatemporal\" name=\"capatemporal\">

  </div>

   <div class=\"row\">


";
    }

    public function getTemplateName()
    {
        return "mesas/trasladoMesas.twig.php";
    }

    public function isTraitable()
    {
        return false;
    }
}
