<?php

/* articulo/verkardex.twig.php */
class __TwigTemplate_dfc776f4048488aa70967de1820f421a extends Twig_Template
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

\t\t<div class=\"col-lg-12\">

\t\t\t\t<h1 class=\"page-header\">Kardex: ";
        // line 17
        echo twig_escape_filter($this->env, $this->getContext($context, 'articulo'), "html");
        echo "</h1>

\t\t</div>

\t</div>



\t<div class=\"row\">

\t\t<div class=\"col-lg-12\">

\t<div align=\"right\"><a href=\"index.php\" class=\"btn btn-primary btn-xs\">Regresar</a></div>

\t\t</div>

\t</div>



\t<br>



\t<div class=\"table-responsive\">

\t\t<table width=\"100%\" class=\"table table-striped table-bordered table-hover\" id=\"dataTables-example\">

\t      <thead>

\t        <tr>

\t          <th>Fecha</th>\t
\t          <th>Transacción</th>
\t          <th>Tercero</th>
\t          <th>Documento</th>
\t          <th>Doc.Ref</th>
\t          <th>Entradas</th>
\t          <th>Salidas</th>
\t          <th>Valor unidad</th>
\t          <th>Costo venta</th>
\t          <th>Costo promedio</th>
\t          <th>Saldo actual</th>

\t        </tr>

\t      </thead>

\t      <tbody>
\t      \t";
        // line 66
        $context['saldo'] = 0;
        // line 67
        echo "\t      \t";
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getContext($context, 'kardexs'));
        foreach ($context['_seq'] as $context['_key'] => $context['kardex']) {
            // line 68
            echo "
\t\t\t\t<tr>

\t\t      
\t\t\t\t  <td>";
            // line 72
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, 'kardex'), "fechacreacion", array(), "any", false), "html");
            echo "</td>
\t\t          <td>";
            // line 73
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, 'kardex'), "nombreconceptofacturacion", array(), "any", false), "html");
            echo "</td>
\t\t          <td>";
            // line 74
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, 'kardex'), "documento", array(), "any", false), "html");
            echo "</td>
\t\t          <td>";
            // line 75
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, 'kardex'), "consecutivodian", array(), "any", false), "html");
            echo "</td>
\t\t          <td>";
            // line 76
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, 'kardex'), "documentoreferencia", array(), "any", false), "html");
            echo "</td>

\t\t          ";
            // line 78
            if (($this->getAttribute($this->getContext($context, 'kardex'), "idtipotransaccion", array(), "any", false) == 1)) {
                // line 79
                echo "\t\t          \t\t
\t\t          \t\t<td>0</td>\t\t
\t\t   \t\t\t\t<td>";
                // line 81
                echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, 'kardex'), "cantidad", array(), "any", false), "html");
                echo "</td>
\t\t   \t\t\t\t";
                // line 82
                $context['saldo'] = ($this->getContext($context, 'saldo') - $this->getAttribute($this->getContext($context, 'kardex'), "cantidad", array(), "any", false));
                // line 83
                echo "\t\t   \t\t\t\t
\t\t   \t\t\t\t";
            } elseif (($this->getAttribute($this->getContext($context, 'kardex'), "idtipotransaccion", array(), "any", false) == 2)) {
                // line 85
                echo "
\t\t   \t\t\t\t<td>";
                // line 86
                echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, 'kardex'), "cantidad", array(), "any", false), "html");
                echo "</td>\t\t
\t\t   \t\t\t\t<td>0</td>
\t\t   \t\t\t\t";
                // line 88
                $context['saldo'] = ($this->getContext($context, 'saldo') + $this->getAttribute($this->getContext($context, 'kardex'), "cantidad", array(), "any", false));
                // line 89
                echo "
\t\t   \t\t\t\t";
            } elseif (($this->getAttribute($this->getContext($context, 'kardex'), "idtipotransaccion", array(), "any", false) == 3)) {
                // line 91
                echo "
\t\t   \t\t\t\t<td>";
                // line 92
                echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, 'kardex'), "cantidad", array(), "any", false), "html");
                echo "</td>\t\t
\t\t   \t\t\t\t<td>0</td>
\t\t   \t\t\t\t";
                // line 94
                $context['saldo'] = ($this->getContext($context, 'saldo') + $this->getAttribute($this->getContext($context, 'kardex'), "cantidad", array(), "any", false));
                // line 95
                echo "
\t\t   \t\t\t\t";
            } elseif (($this->getAttribute($this->getContext($context, 'kardex'), "idtipotransaccion", array(), "any", false) == 4)) {
                // line 97
                echo "
\t\t   \t\t\t\t<td>0</td>\t\t
\t\t   \t\t\t\t<td>";
                // line 99
                echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, 'kardex'), "cantidad", array(), "any", false), "html");
                echo "</td>
\t\t   \t\t\t\t";
                // line 100
                $context['saldo'] = ($this->getContext($context, 'saldo') - $this->getAttribute($this->getContext($context, 'kardex'), "cantidad", array(), "any", false));
                // line 101
                echo "
\t\t   \t\t\t\t";
            } elseif (($this->getAttribute($this->getContext($context, 'kardex'), "idtipotransaccion", array(), "any", false) == 5)) {
                // line 103
                echo "
\t\t   \t\t\t\t<td>";
                // line 104
                echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, 'kardex'), "cantidad", array(), "any", false), "html");
                echo "</td>\t\t
\t\t   \t\t\t\t<td>0</td>
\t\t   \t\t\t\t";
                // line 106
                $context['saldo'] = ($this->getContext($context, 'saldo') + $this->getAttribute($this->getContext($context, 'kardex'), "cantidad", array(), "any", false));
                // line 107
                echo "
\t\t   \t\t\t\t";
            } elseif (($this->getAttribute($this->getContext($context, 'kardex'), "idtipotransaccion", array(), "any", false) == 6)) {
                // line 109
                echo "
\t\t   \t\t\t\t<td>0</td>\t\t
\t\t   \t\t\t\t<td>";
                // line 111
                echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, 'kardex'), "cantidad", array(), "any", false), "html");
                echo "</td>
\t\t   \t\t\t\t";
                // line 112
                $context['saldo'] = ($this->getContext($context, 'saldo') - $this->getAttribute($this->getContext($context, 'kardex'), "cantidad", array(), "any", false));
                // line 113
                echo "
\t\t   \t\t  ";
            }
            // line 114
            echo "\t

\t\t          <td>";
            // line 116
            echo twig_escape_filter($this->env, ($this->getAttribute($this->getContext($context, 'kardex'), "preciounitario", array(), "any", false) - ($this->getAttribute($this->getContext($context, 'kardex'), "preciounitario", array(), "any", false) * ($this->getAttribute($this->getContext($context, 'kardex'), "descuento", array(), "any", false) / 100))), "html");
            echo "</td>
\t\t          <td>";
            // line 117
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, 'kardex'), "costoventa", array(), "any", false), "html");
            echo "</td>
\t\t          <td>";
            // line 118
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, 'kardex'), "costopromedio", array(), "any", false), "html");
            echo "</td>
\t\t          <td>";
            // line 119
            echo twig_escape_filter($this->env, $this->getContext($context, 'saldo'), "html");
            echo "</td>

\t\t       

\t\t        </tr>

\t\t\t";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['kardex'], $context['_parent'], $context['loop']);
        $context = array_merge($_parent, array_intersect_key($context, $_parent));
        // line 126
        echo "
\t      </tbody>

\t    </table>

\t    </div>

\t<div class=\"row\">

\t\t<div class=\"col-lg-12\">

\t\t\t\t<h2 class=\"page-header\">Costo actual: ";
        // line 137
        echo twig_escape_filter($this->env, $this->getContext($context, 'costoactual'), "html");
        echo "</h2>
\t\t\t\t
\t\t\t\t<h3 class=\"page-header\">Existencia actual: ";
        // line 139
        echo twig_escape_filter($this->env, $this->getContext($context, 'saldo'), "html");
        echo "</h3>

\t\t</div>

\t</div>



";
    }

    public function getTemplateName()
    {
        return "articulo/verkardex.twig.php";
    }

    public function isTraitable()
    {
        return false;
    }
}
