<?php

/* facturacion/mantenimiento_transacciones.twig.php */
class __TwigTemplate_02fcc5bf4803452b90333edc5072014d extends Twig_Template
{
    protected $parent;

    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'stylesheets' => array($this, 'block_stylesheets'),
            'contenido' => array($this, 'block_contenido'),
            'javascripts' => array($this, 'block_javascripts'),
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
<link rel=\"stylesheet\" href=\"https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css\">
<link rel=\"stylesheet\" href=\"https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css\">
";
    }

    // line 12
    public function block_contenido($context, array $blocks = array())
    {
        // line 13
        echo "\t<div class=\"row\">
\t\t<div class=\"col-lg-12\">
\t\t\t\t<h1 class=\"page-header\">Mantenimiento de transacciones</h1>
\t\t</div>
\t</div>\t

<div class=\"table-responsive\">

\t\t<table width=\"100%\" class=\"table table-striped table-bordered table-hover\" id=\"dataTables-example\">

\t      <thead>

\t        <tr>

\t          <th>Estado</th>
\t          <th>ID Concepto</th>
\t          <th>Concepto</th>
\t          <th>Consecutivo</th>
\t          <th>Documento</th>
\t          <th>Tercero</th>
\t          <th>Fecha</th>
\t          <th>Acciones</th>

\t        </tr>

\t      </thead>

\t      <tbody>

\t    ";
        // line 42
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getContext($context, 'transacciones'));
        foreach ($context['_seq'] as $context['_key'] => $context['transaccion']) {
            // line 43
            echo "
\t\t\t\t<tr>

\t\t          <td>";
            // line 46
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, 'transaccion'), "estado", array(), "any", false), "html");
            echo "</td>
\t\t          <td>";
            // line 47
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, 'transaccion'), "idconceptofacturacion", array(), "any", false), "html");
            echo "</td>
\t\t          <td>";
            // line 48
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, 'transaccion'), "nombreconceptofacturacion", array(), "any", false), "html");
            echo "</td>
\t\t\t\t  <td>";
            // line 49
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, 'transaccion'), "consecutivodian", array(), "any", false), "html");
            echo "</td>
\t\t\t\t  <td>";
            // line 50
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, 'transaccion'), "documento", array(), "any", false), "html");
            echo "</td>
\t\t\t\t  <td>";
            // line 51
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, 'transaccion'), "nombres", array(), "any", false), "html");
            echo " ";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, 'transaccion'), "apellidos", array(), "any", false), "html");
            echo "</td>
\t\t\t\t  <td>";
            // line 52
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, 'transaccion'), "fecha", array(), "any", false), "html");
            echo "</td>
\t\t\t\t  <td>
\t\t\t\t  \t<a href=\"javascript:imprimirCopia(";
            // line 54
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, 'transaccion'), "idconceptofacturacion", array(), "any", false), "html");
            echo ",'";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, 'transaccion'), "consecutivodian", array(), "any", false), "html");
            echo "')\" class=\"btn btn-primary\"><span class=\"glyphicon glyphicon-print\" aria-hidden=\"true\"></span></a>
\t\t\t\t  \t<!--<a href=\"\" data-toggle='modal' class=\"btn btn-primary\" data-target='#miModal'><span class=\"glyphicon glyphicon-trash\" aria-hidden=\"true\"></span></a>-->
\t\t\t\t  \t<!--<div class=\"jumbotron\"><a class=\"btn btn-primary pull-right\" data-toggle=\"modal\" href=\"#myModal\" id=\"modellink\">Show Modal</a></div>-->
\t\t\t\t  \t
\t\t\t\t  \t
\t\t\t\t  \t
\t\t\t\t  </td>

\t\t        </tr>

\t\t\t";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['transaccion'], $context['_parent'], $context['loop']);
        $context = array_merge($_parent, array_intersect_key($context, $_parent));
        // line 65
        echo "\t        

\t      </tbody>

\t    </table>

\t    </div>

<div class=\"container \">
<div class=\"modal-container\"></div>
</div>

";
    }

    // line 79
    public function block_javascripts($context, array $blocks = array())
    {
        // line 80
        echo "
<script src=\"//code.jquery.com/jquery-1.10.2.js\"></script>
<script src=\"//code.jquery.com/ui/1.11.4/jquery-ui.js\"></script>

";
        // line 84
        echo $this->renderParentBlock("javascripts", $context, $blocks);
        echo "

<script type=\"text/javascript\">

function imprimirCopia(idCon,Cons){

  \t\t\$.ajax({
            dataType: \"html\",
            url: \"imprimir_copia.php\",
            data: {Cons:Cons,idCon:idCon},
            type: \"POST\",

            success:function(data){

            \t//window.open(\"duplicado.php\");
            \t//\$(\"#capatemporal\").html(data);
            }
          });
  \t}

</script>

";
    }

    public function getTemplateName()
    {
        return "facturacion/mantenimiento_transacciones.twig.php";
    }

    public function isTraitable()
    {
        return false;
    }
}
