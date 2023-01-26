<?php

/* facturacion/existencias_bodega.twig.php */
class __TwigTemplate_208313506ef807a6401bfe841da9c62d extends Twig_Template
{
    protected $parent;

    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->blocks = array(
            'title' => array($this, 'block_title'),
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

    // line 5
    public function block_title($context, array $blocks = array())
    {
        echo " ";
        echo $this->renderParentBlock("title", $context, $blocks);
        echo " ";
    }

    // line 9
    public function block_contenido($context, array $blocks = array())
    {
        // line 10
        echo "


\t<div class=\"row\">

\t\t<div class=\"col-lg-5\">

\t\t\t\t<h1 class=\"page-header\">Existencias en bodega</h1>
\t\t\t\t<!--<a class=\"btn btn-primary\" href=\"#\" role=\"button\">Actualizar inventario</a>-->

\t\t</div>

\t\t

\t</div>

\t<hr>

\t<div class=\"table-responsive\">

\t\t<table width=\"100%\" class=\"table table-striped table-bordered table-hover\" id=\"dataTables-example\">

\t      <thead>

\t        <tr>

\t          <th>Código artículo</th>\t
\t          <th>Artículos</th>
\t          <th>Precio venta</th>
\t          <th>Costo actual</th>
\t          <th>Existencia actual</th>
\t          <th>Costo total</th>
\t          <th>Rentabilidad</th>

\t        </tr>

\t      </thead>

\t      <tbody>
\t      \t";
        // line 49
        $context['total_existenciactual'] = 0;
        // line 50
        echo "\t      \t";
        $context['total_costoactual'] = 0;
        // line 51
        echo "\t      \t";
        $context['total_costototal'] = 0;
        // line 52
        echo "
\t\t\t";
        // line 53
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getContext($context, 'articulos'));
        foreach ($context['_seq'] as $context['_key'] => $context['articulo']) {
            // line 54
            echo "
\t\t\t\t<tr>

\t\t      
\t\t\t\t  <td>";
            // line 58
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, 'articulo'), "codigoarticulo", array(), "any", false), "html");
            echo "</td>
\t\t          <td>";
            // line 59
            echo twig_escape_filter($this->env, twig_upper_filter($this->env, $this->getAttribute($this->getContext($context, 'articulo'), "nombrearticulo", array(), "any", false)), "html");
            echo "</td>
\t\t          <td>";
            // line 60
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, 'articulo'), "precioventa1", array(), "any", false), "html");
            echo "</td>
\t\t          <td>";
            // line 61
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, 'articulo'), "costoactual", array(), "any", false), "html");
            echo "</td>
\t\t          <td>";
            // line 62
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, 'articulo'), "existenciactual", array(), "any", false), "html");
            echo "</td>
\t\t          <td>";
            // line 63
            echo twig_escape_filter($this->env, ($this->getAttribute($this->getContext($context, 'articulo'), "costoactual", array(), "any", false) * $this->getAttribute($this->getContext($context, 'articulo'), "existenciactual", array(), "any", false)), "html");
            echo "</td>
\t\t          <td>";
            // line 64
            echo twig_escape_filter($this->env, ((($this->getAttribute($this->getContext($context, 'articulo'), "precioventa1", array(), "any", false) - $this->getAttribute($this->getContext($context, 'articulo'), "costoactual", array(), "any", false)) / $this->getAttribute($this->getContext($context, 'articulo'), "precioventa1", array(), "any", false)) * 100), "html");
            echo "%</td>
\t\t          ";
            // line 65
            $context['total_existenciactual'] = ($this->getContext($context, 'total_existenciactual') + $this->getAttribute($this->getContext($context, 'articulo'), "existenciactual", array(), "any", false));
            // line 66
            echo "\t\t          ";
            $context['total_costoactual'] = ($this->getContext($context, 'total_costoactual') + $this->getAttribute($this->getContext($context, 'articulo'), "costoactual", array(), "any", false));
            // line 67
            echo "\t\t          ";
            $context['total_costototal'] = ($this->getContext($context, 'total_costototal') + ($this->getAttribute($this->getContext($context, 'articulo'), "costoactual", array(), "any", false) * $this->getAttribute($this->getContext($context, 'articulo'), "existenciactual", array(), "any", false)));
            // line 68
            echo "\t\t          

\t\t        </tr>

\t\t\t";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['articulo'], $context['_parent'], $context['loop']);
        $context = array_merge($_parent, array_intersect_key($context, $_parent));
        // line 73
        echo "
\t\t</tbody>

\t\t\t<thead>

\t        <tr>

\t          <th colspan=\"4\">Total</th>\t
\t          
\t          <th>";
        // line 82
        echo twig_escape_filter($this->env, $this->getContext($context, 'total_existenciactual'), "html");
        echo "</th>
\t          <th>";
        // line 83
        echo twig_escape_filter($this->env, $this->getContext($context, 'total_costototal'), "html");
        echo "</th>

\t        </tr>

\t      </thead>

\t    </table>

\t    </div>





";
    }

    public function getTemplateName()
    {
        return "facturacion/existencias_bodega.twig.php";
    }

    public function isTraitable()
    {
        return false;
    }
}
