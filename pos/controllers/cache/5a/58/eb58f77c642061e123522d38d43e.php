<?php

/* articulo/edit_articulo.twig.php */
class __TwigTemplate_5a58eb58f77c642061e123522d38d43e extends Twig_Template
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

<!--<script type=\"text/javascript\" src=\"../../js/usuario.js\"></script>-->

";
    }

    // line 21
    public function block_contenido($context, array $blocks = array())
    {
        // line 22
        echo "
\t<div class=\"row\">

\t\t<div class=\"col-lg-12\">

\t\t\t\t<h1 class=\"page-header\">Editar artículo</h1>

\t\t</div>

\t</div>

\t<br>

\t<div class=\"col-lg-4\">
    
    <form action=\"update.php\" method=\"post\" id=\"articulo-crear\">
    <input type=\"hidden\" name=\"idarticulo\" value=\"";
        // line 38
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getContext($context, 'articulos'));
        foreach ($context['_seq'] as $context['_key'] => $context['articulo']) {
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, 'articulo'), "idarticulo", array(), "any", false), "html");
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['articulo'], $context['_parent'], $context['loop']);
        $context = array_merge($_parent, array_intersect_key($context, $_parent));
        echo "\">\t

    <div class=\"form-group\">
\t<label for=\"nombrearticulo\">Nombre artículo:</label>
\t<input type=\"text\" name=\"nombrearticulo\" placeholder=\"Ingrese el nombre del artículo\" class=\"form-control\" id=\"nombrearticulo\" value=\"";
        // line 42
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getContext($context, 'articulos'));
        foreach ($context['_seq'] as $context['_key'] => $context['articulo']) {
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, 'articulo'), "nombrearticulo", array(), "any", false), "html");
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['articulo'], $context['_parent'], $context['loop']);
        $context = array_merge($_parent, array_intersect_key($context, $_parent));
        echo "\">
    </div>

    <div class=\"form-group\">
\t<label for=\"codigoarticulo\">Código del artículo:</label>
\t<input type=\"text\" placeholder=\"Ingrese el código del artículo\" name=\"codigoarticulo\" class=\"form-control\" id=\"codigoarticulo\" value=\"";
        // line 47
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getContext($context, 'articulos'));
        foreach ($context['_seq'] as $context['_key'] => $context['articulo']) {
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, 'articulo'), "codigoarticulo", array(), "any", false), "html");
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['articulo'], $context['_parent'], $context['loop']);
        $context = array_merge($_parent, array_intersect_key($context, $_parent));
        echo "\" readonly=\"readonly\">
    </div>

    <div class=\"form-group\">
\t<label for=\"bloqueanegativos\">Bloquea para negativos:</label>
\t<select name=\"bloqueanegativos\" class=\"form-control\">
\t\t";
        // line 53
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getContext($context, 'articulos'));
        foreach ($context['_seq'] as $context['_key'] => $context['articulo']) {
            // line 54
            echo "\t\t\t";
            if (($this->getAttribute($this->getContext($context, 'articulo'), "bloqueanegativos", array(), "any", false) == 1)) {
                // line 55
                echo "\t\t\t<option value=\"1\" selected=\"selected\">Si</option>
\t\t\t<option value=\"0\">No</option>
\t\t\t";
            } else {
                // line 58
                echo "\t\t\t<option value=\"0\" selected=\"selected\">No</option>
\t\t\t<option value=\"1\">Si</option>
\t\t\t";
            }
            // line 61
            echo "\t\t";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['articulo'], $context['_parent'], $context['loop']);
        $context = array_merge($_parent, array_intersect_key($context, $_parent));
        // line 62
        echo "\t</select>
    </div>

    <div class=\"form-group\">
\t<label for=\"stockminimo\">Stock mínimo:</label>
\t<input type=\"text\" placeholder=\"Stock mínimo\" name=\"stockminimo\" class=\"form-control\" value=\"";
        // line 67
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getContext($context, 'articulos'));
        foreach ($context['_seq'] as $context['_key'] => $context['articulo']) {
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, 'articulo'), "stockminimo", array(), "any", false), "html");
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['articulo'], $context['_parent'], $context['loop']);
        $context = array_merge($_parent, array_intersect_key($context, $_parent));
        echo "\">
    </div>
\t
    <div class=\"form-group\">
\t<label for=\"stockmaximo\">Stock máximo:</label>
\t<input type=\"text\" placeholder=\"Stock máximo\" name=\"stockmaximo\" class=\"form-control\" value=\"";
        // line 72
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getContext($context, 'articulos'));
        foreach ($context['_seq'] as $context['_key'] => $context['articulo']) {
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, 'articulo'), "stockmaximo", array(), "any", false), "html");
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['articulo'], $context['_parent'], $context['loop']);
        $context = array_merge($_parent, array_intersect_key($context, $_parent));
        echo "\">
    </div>

    <div class=\"form-group\">
\t<label for=\"existenciactual\">Existencia actual:</label>
\t<input type=\"text\" readonly=\"readonly\" name=\"existenciactual\" class=\"form-control\" value=\"";
        // line 77
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getContext($context, 'articulos'));
        foreach ($context['_seq'] as $context['_key'] => $context['articulo']) {
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, 'articulo'), "existenciactual", array(), "any", false), "html");
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['articulo'], $context['_parent'], $context['loop']);
        $context = array_merge($_parent, array_intersect_key($context, $_parent));
        echo "\">
    </div>

    <div class=\"form-group\">
\t<label for=\"existenciainial\">Existencia inicio de mes:</label>
\t<input type=\"text\" readonly=\"readonly\" name=\"existenciainial\" class=\"form-control\" value=\"";
        // line 82
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getContext($context, 'articulos'));
        foreach ($context['_seq'] as $context['_key'] => $context['articulo']) {
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, 'articulo'), "existenciainial", array(), "any", false), "html");
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['articulo'], $context['_parent'], $context['loop']);
        $context = array_merge($_parent, array_intersect_key($context, $_parent));
        echo "\">
    </div>

\t</div>

    <div class=\"col-lg-4\">

    <div class=\"form-group\">
\t<label for=\"costoactual\">Costo actual:</label>
\t<input type=\"text\" name=\"costoactual\" class=\"form-control\" value=\"";
        // line 91
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getContext($context, 'articulos'));
        foreach ($context['_seq'] as $context['_key'] => $context['articulo']) {
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, 'articulo'), "costoactual", array(), "any", false), "html");
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['articulo'], $context['_parent'], $context['loop']);
        $context = array_merge($_parent, array_intersect_key($context, $_parent));
        echo "\">
    </div>

    <div class=\"form-group\">
\t<label for=\"costoinicial\">Costo inicio de mes:</label>
\t<input type=\"text\" placeholder=\"Ingrese costo inicio de mes\" name=\"costoinicial\" class=\"form-control\" value=\"";
        // line 96
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getContext($context, 'articulos'));
        foreach ($context['_seq'] as $context['_key'] => $context['articulo']) {
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, 'articulo'), "costoinicial", array(), "any", false), "html");
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['articulo'], $context['_parent'], $context['loop']);
        $context = array_merge($_parent, array_intersect_key($context, $_parent));
        echo "\">
    </div>

    <div class=\"form-group\">
\t<label for=\"facturable\">Facturable:</label>
\t<select name=\"facturable\" class=\"form-control\">
\t\t";
        // line 102
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getContext($context, 'articulos'));
        foreach ($context['_seq'] as $context['_key'] => $context['articulo']) {
            // line 103
            echo "\t\t\t";
            if (($this->getAttribute($this->getContext($context, 'articulo'), "facturable", array(), "any", false) == 1)) {
                // line 104
                echo "\t\t\t<option value=\"1\" selected=\"selected\">Si</option>
\t\t\t<option value=\"0\">No</option>
\t\t\t";
            } else {
                // line 107
                echo "\t\t\t<option value=\"0\" selected=\"selected\">No</option>
\t\t\t<option value=\"1\">Si</option>
\t\t\t";
            }
            // line 110
            echo "\t\t";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['articulo'], $context['_parent'], $context['loop']);
        $context = array_merge($_parent, array_intersect_key($context, $_parent));
        // line 111
        echo "\t</select>
    </div>

    <div class=\"form-group\">
\t<label for=\"habilitar\">Habilitar:</label>
\t<select name=\"habilitar\" class=\"form-control\">
\t\t";
        // line 117
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getContext($context, 'articulos'));
        foreach ($context['_seq'] as $context['_key'] => $context['articulo']) {
            // line 118
            echo "\t\t\t";
            if (($this->getAttribute($this->getContext($context, 'articulo'), "habilitar", array(), "any", false) == 1)) {
                // line 119
                echo "\t\t\t<option value=\"1\" selected=\"selected\">Si</option>
\t\t\t<option value=\"0\">No</option>
\t\t\t";
            } else {
                // line 122
                echo "\t\t\t<option value=\"0\" selected=\"selected\">No</option>
\t\t\t<option value=\"1\">Si</option>
\t\t\t";
            }
            // line 125
            echo "\t\t";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['articulo'], $context['_parent'], $context['loop']);
        $context = array_merge($_parent, array_intersect_key($context, $_parent));
        // line 126
        echo "\t</select>
    </div>

    <div class=\"form-group\">
\t<label for=\"idclasificacion1\">Clasificación # 1:</label>
\t<select name=\"idclasificacion1\" class=\"form-control\">
\t";
        // line 132
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getContext($context, 'clasificacion1'));
        foreach ($context['_seq'] as $context['_key'] => $context['clasificacion1']) {
            // line 133
            echo "\t\t";
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable($this->getContext($context, 'articulos'));
            foreach ($context['_seq'] as $context['_key'] => $context['articulo']) {
                // line 134
                echo "\t\t\t";
                if (($this->getAttribute($this->getContext($context, 'articulo'), "idclasificacion1", array(), "any", false) == $this->getAttribute($this->getContext($context, 'clasificacion1'), "idclasificacion1", array(), "any", false))) {
                    // line 135
                    echo "\t\t\t\t<option value=\"";
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, 'clasificacion1'), "idclasificacion1", array(), "any", false), "html");
                    echo "\" selected=\"selected\">";
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, 'clasificacion1'), "nombreclasificacion1", array(), "any", false), "html");
                    echo "</option>
\t\t\t";
                } else {
                    // line 137
                    echo "\t\t\t\t<option value=\"";
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, 'clasificacion1'), "idclasificacion1", array(), "any", false), "html");
                    echo "\">";
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, 'clasificacion1'), "nombreclasificacion1", array(), "any", false), "html");
                    echo "</option>
\t\t\t";
                }
                // line 139
                echo "\t\t";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['articulo'], $context['_parent'], $context['loop']);
            $context = array_merge($_parent, array_intersect_key($context, $_parent));
            // line 140
            echo "\t";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['clasificacion1'], $context['_parent'], $context['loop']);
        $context = array_merge($_parent, array_intersect_key($context, $_parent));
        // line 141
        echo "\t</select>\t
    </div>

    <div class=\"form-group\">
\t<label for=\"idclasificacion2\">Clasificación # 2:</label>
\t<select name=\"idclasificacion2\" class=\"form-control\">
\t";
        // line 147
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getContext($context, 'clasificacion2'));
        foreach ($context['_seq'] as $context['_key'] => $context['clasificacion2']) {
            // line 148
            echo "\t\t";
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable($this->getContext($context, 'articulos'));
            foreach ($context['_seq'] as $context['_key'] => $context['articulo']) {
                // line 149
                echo "\t\t\t";
                if (($this->getAttribute($this->getContext($context, 'articulo'), "idclasificacion2", array(), "any", false) == $this->getAttribute($this->getContext($context, 'clasificacion2'), "idclasificacion2", array(), "any", false))) {
                    // line 150
                    echo "\t\t\t\t<option value=\"";
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, 'clasificacion2'), "idclasificacion2", array(), "any", false), "html");
                    echo "\" selected=\"selected\">";
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, 'clasificacion2'), "nombreclasificacion2", array(), "any", false), "html");
                    echo "</option>
\t\t\t";
                } else {
                    // line 152
                    echo "\t\t\t\t<option value=\"";
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, 'clasificacion2'), "idclasificacion2", array(), "any", false), "html");
                    echo "\">";
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, 'clasificacion2'), "nombreclasificacion2", array(), "any", false), "html");
                    echo "</option>
\t\t\t";
                }
                // line 154
                echo "\t\t";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['articulo'], $context['_parent'], $context['loop']);
            $context = array_merge($_parent, array_intersect_key($context, $_parent));
            // line 155
            echo "\t";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['clasificacion2'], $context['_parent'], $context['loop']);
        $context = array_merge($_parent, array_intersect_key($context, $_parent));
        // line 156
        echo "\t</select>\t
    </div>

\t</div>

\t<div class=\"col-lg-4\">

    <div class=\"form-group\"> 
\t<label for=\"precioventa1\">Precio de venta # 1:</label>
\t<input type=\"text\" placeholder=\"Ingrese el precio de venta # 1\" name=\"precioventa1\" id=\"precioventa1\" class=\"form-control\" value=\"";
        // line 165
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getContext($context, 'articulos'));
        foreach ($context['_seq'] as $context['_key'] => $context['articulo']) {
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, 'articulo'), "precioventa1", array(), "any", false), "html");
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['articulo'], $context['_parent'], $context['loop']);
        $context = array_merge($_parent, array_intersect_key($context, $_parent));
        echo "\">
    </div>

    <div class=\"form-group\"> 
\t<label for=\"impuestoiva\">IVA:</label>
\t<input type=\"text\" placeholder=\"Ingrese el valor del IVA\" name=\"impuestoiva\" id=\"impuestoiva\" class=\"form-control\" value=\"";
        // line 170
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getContext($context, 'articulos'));
        foreach ($context['_seq'] as $context['_key'] => $context['articulo']) {
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, 'articulo'), "impuestoiva", array(), "any", false), "html");
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['articulo'], $context['_parent'], $context['loop']);
        $context = array_merge($_parent, array_intersect_key($context, $_parent));
        echo "\">
    </div>

    <div class=\"form-group\"> 
\t<label for=\"impuestoconsumo\">Impuesto al consumo:</label>
\t<input type=\"text\" placeholder=\"Ingrese el valor del impo. consumo\" id=\"impuestoconsumo\" name=\"impuestoconsumo\" class=\"form-control\" value=\"";
        // line 175
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getContext($context, 'articulos'));
        foreach ($context['_seq'] as $context['_key'] => $context['articulo']) {
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, 'articulo'), "impuestoconsumo", array(), "any", false), "html");
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['articulo'], $context['_parent'], $context['loop']);
        $context = array_merge($_parent, array_intersect_key($context, $_parent));
        echo "\">
    </div>

    <div class=\"form-group\">
\t<label for=\"idtipoimpuesto\">Tipo de Impuesto:</label>
\t<select name=\"idtipoimpuesto\" class=\"form-control\">
\t\t";
        // line 181
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getContext($context, 'articulos'));
        foreach ($context['_seq'] as $context['_key'] => $context['articulo']) {
            // line 182
            echo "\t\t\t";
            if (($this->getAttribute($this->getContext($context, 'articulo'), "idtipoimpuesto", array(), "any", false) == 0)) {
                // line 183
                echo "\t\t\t<option value=\"0\" selected=\"selected\">Ninguno</option>
\t\t\t<option value=\"1\">Excluido</option>
\t\t\t<option value=\"2\">Exento</option>
\t\t\t<option value=\"3\">Gravable</option>
\t\t\t";
            } elseif (($this->getAttribute($this->getContext($context, 'articulo'), "idtipoimpuesto", array(), "any", false) == 1)) {
                // line 188
                echo "\t\t\t<option value=\"0\">Ninguno</option>
\t\t\t<option value=\"1\" selected=\"selected\">Excluido</option>
\t\t\t<option value=\"2\">Exento</option>
\t\t\t<option value=\"3\">Gravable</option>
\t\t\t";
            } elseif (($this->getAttribute($this->getContext($context, 'articulo'), "idtipoimpuesto", array(), "any", false) == 2)) {
                // line 193
                echo "\t\t\t<option value=\"0\">Ninguno</option>
\t\t\t<option value=\"1\">Excluido</option>
\t\t\t<option value=\"2\" selected=\"selected\">Exento</option>
\t\t\t<option value=\"3\">Gravable</option>
\t\t\t";
            } else {
                // line 198
                echo "\t\t\t<option value=\"0\">Ninguno</option>
\t\t\t<option value=\"1\">Impuesto Consumo</option>
\t\t\t<option value=\"2\">IVA</option>
\t\t\t";
            }
            // line 202
            echo "\t\t";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['articulo'], $context['_parent'], $context['loop']);
        $context = array_merge($_parent, array_intersect_key($context, $_parent));
        // line 203
        echo "\t</select>
    </div>

\t</br>

\t<input type=\"submit\" value=\"Modificar artículo\" class=\"btn btn-primary\">

</form>

</div>

";
    }

    public function getTemplateName()
    {
        return "articulo/edit_articulo.twig.php";
    }

    public function isTraitable()
    {
        return false;
    }
}
