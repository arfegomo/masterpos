<?php

/* articulo/create_articulo.twig.php */
class __TwigTemplate_5b2b5ccaedc6e716fd5e87645fbda329 extends Twig_Template
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

<link rel=\"stylesheet\" href=\"//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css\">

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

<script type=\"text/javascript\" src=\"../../js/articulo.js\"></script>

";
    }

    // line 21
    public function block_contenido($context, array $blocks = array())
    {
        // line 22
        echo "
\t<div class=\"row\">

\t\t<div class=\"col-lg-12\">

\t\t\t\t<h1 class=\"page-header\">Crear artículo</h1>

\t\t</div>

\t</div>

\t<br>

\t<div class=\"col-lg-4\">
    
    <form action=\"store.php\" method=\"post\" id=\"articulo-crear\">

    <div class=\"form-group\">
\t<label for=\"nombrearticulo\">Nombre artículo:</label>
\t<input type=\"text\" placeholder=\"Ingrese el nombre del artículo\" name=\"nombrearticulo\" class=\"form-control\" id=\"nombrearticulo\">
    </div>

    <div class=\"form-group\">
\t<label for=\"codigoarticulo\">Código del artículo:</label>
\t<input type=\"text\" placeholder=\"Ingrese el código del artículo\" name=\"codigoarticulo\" class=\"form-control\" id=\"codigoarticulo\">
    </div>

    <div class=\"form-group\">
\t<label for=\"bloqueanegativos\">Bloquea para negativos:</label>
\t<select name=\"bloqueanegativos\" class=\"form-control\">
\t\t\t<option value=\"1\">Si</option>
\t\t\t<option value=\"0\">No</option>
\t</select>
    </div>

    <div class=\"form-group\">
\t<label for=\"stockminimo\">Stock mínimo:</label>
\t<input type=\"text\" placeholder=\"Stock mínimo\" name=\"stockminimo\" class=\"form-control\">
    </div>
\t
    <div class=\"form-group\">
\t<label for=\"stockmaximo\">Stock máximo:</label>
\t<input type=\"text\" placeholder=\"Stock máximo\" name=\"stockmaximo\" class=\"form-control\">
    </div>

    <div class=\"form-group\">
\t<label for=\"existenciactual\">Existencia actual:</label>
\t<input type=\"text\" readonly=\"readonly\" name=\"existenciactual\" class=\"form-control\">
    </div>

    <div class=\"form-group\">
\t<label for=\"existenciainial\">Existencia inicio de mes:</label>
\t<input type=\"text\" readonly=\"readonly\" name=\"existenciainial\" class=\"form-control\">
    </div>

\t</div>

    <div class=\"col-lg-4\">

    <div class=\"form-group\">
\t<label for=\"costoactual\">Costo actual:</label>
\t<input type=\"text\" readonly=\"readonly\" name=\"costoactual\" class=\"form-control\">
    </div>

    <div class=\"form-group\">
\t<label for=\"costoinicial\">Costo inicio de mes:</label>
\t<input type=\"text\" placeholder=\"Ingrese costo inicio de mes\" name=\"costoinicial\" class=\"form-control\">
    </div>

    <div class=\"form-group\">
\t<label for=\"facturable\">Facturable:</label>
\t<select name=\"facturable\" class=\"form-control\">
\t\t\t<option value=\"1\">Si</option>
\t\t\t<option value=\"0\">No</option>
\t</select>
    </div>

    <div class=\"form-group\">
\t<label for=\"habilitar\">Habilitar:</label>
\t<select name=\"habilitar\" class=\"form-control\">
\t\t\t<option value=\"1\">Si</option>
\t\t\t<option value=\"0\">No</option>
\t</select>
    </div>

    <div class=\"form-group\">
\t<label for=\"idclasificacion1\">Clasificación # 1:</label>
\t<select name=\"idclasificacion1\" class=\"form-control\">
\t";
        // line 110
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getContext($context, 'clasificacion1'));
        foreach ($context['_seq'] as $context['_key'] => $context['clasificacion1']) {
            // line 111
            echo "\t<option value=\"";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, 'clasificacion1'), "idclasificacion1", array(), "any", false), "html");
            echo "\">";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, 'clasificacion1'), "nombreclasificacion1", array(), "any", false), "html");
            echo "</option>
\t";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['clasificacion1'], $context['_parent'], $context['loop']);
        $context = array_merge($_parent, array_intersect_key($context, $_parent));
        // line 113
        echo "\t</select>\t
    </div>

    <div class=\"form-group\">
\t<label for=\"idclasificacion2\">Clasificación # 2:</label>
\t<select name=\"idclasificacion2\" class=\"form-control\">
\t";
        // line 119
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getContext($context, 'clasificacion2'));
        foreach ($context['_seq'] as $context['_key'] => $context['clasificacion2']) {
            // line 120
            echo "\t<option value=\"";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, 'clasificacion2'), "idclasificacion2", array(), "any", false), "html");
            echo "\">";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, 'clasificacion2'), "nombreclasificacion2", array(), "any", false), "html");
            echo "</option>
\t";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['clasificacion2'], $context['_parent'], $context['loop']);
        $context = array_merge($_parent, array_intersect_key($context, $_parent));
        // line 122
        echo "\t</select>\t
    </div>

\t</div>

\t<div class=\"col-lg-4\">

    <div class=\"form-group\"> 
\t<label for=\"precioventa1\">Precio de venta # 1:</label>
\t<input type=\"text\" placeholder=\"Ingrese el precio de venta # 1\" name=\"precioventa1\" id=\"precioventa1\" class=\"form-control\">
    </div>

    <div class=\"form-group\"> 
\t<label for=\"impuestoiva\">IVA:</label>
\t<input type=\"text\" placeholder=\"Ingrese el valor del IVA\" name=\"impuestoiva\" id=\"impuestoiva\" class=\"form-control\">
    </div>

    <div class=\"form-group\"> 
\t<label for=\"impuestoconsumo\">Impuesto al consumo:</label>
\t<input type=\"text\" placeholder=\"Ingrese el valor del impo. consumo\" id=\"impuestoconsumo\" name=\"impuestoconsumo\" class=\"form-control\">
    </div>

    <div class=\"form-group\">
\t<label for=\"idtipoimpuesto\">Tipo de Impuesto:</label>
\t<select name=\"idtipoimpuesto\" class=\"form-control\">
\t\t\t<option value=\"0\">Ninguno</option>
\t\t\t<option value=\"1\">Impuesto Consumo</option>
\t\t\t<option value=\"2\">IVA</option>
\t</select>
    </div>

\t</br>

\t<input type=\"submit\" value=\"Crear artículo\" class=\"btn btn-primary\">

</form>

</div>

";
    }

    public function getTemplateName()
    {
        return "articulo/create_articulo.twig.php";
    }

    public function isTraitable()
    {
        return false;
    }
}
