<?php

/* papelerareciclaje/Papelerareciclaje.twig.php */
class __TwigTemplate_2d706a0e5093a06995030f94f6274361 extends Twig_Template
{
    protected $parent;

    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->blocks = array(
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
    public function block_contenido($context, array $blocks = array())
    {
        // line 4
        echo "

  
            
            <div class=\"row\">
                
                  <div class=\"row\">
\t\t<div class=\"col-lg-12\">
\t\t\t\t<h1>Papelera de Reciclaje</h1>
\t\t</div>
    </div>

    
    <hr>

\t<div class=\"table-responsive\">



\t\t<table width=\"100%\" class=\"table table-striped\" >



\t      <thead>



\t        <tr>



\t      <th>Articulo</th>

\t\t\t  <th>Cantidad</th>\t
\t\t\t  <th>Precio</th>
\t\t\t  <th>Descuento(%)</th>
\t\t\t  <th>Iva</th>
\t\t\t  <th>Imp. Consumo</th>
\t\t\t  <th>Fecha</th>
\t\t\t  <th>Mesa</th>

\t\t\t  <th>Total</th>

\t          



\t        </tr>



\t      </thead>



\t      <tbody>

\t\t\t";
        // line 61
        $context['subtotal'] = 0;
        // line 62
        echo "
\t\t\t";
        // line 63
        $context['impuestos'] = 0;
        // line 64
        echo "
\t\t\t";
        // line 65
        $context['total'] = 0;
        // line 66
        echo "
\t\t\t";
        // line 67
        $context['valorArticulo'] = 0;
        echo "\t\t



\t        ";
        // line 71
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getContext($context, 'articulos'));
        foreach ($context['_seq'] as $context['_key'] => $context['articulo']) {
            // line 72
            echo "


\t\t\t\t<tr>



\t\t          <td>";
            // line 79
            echo twig_escape_filter($this->env, twig_upper_filter($this->env, $this->getAttribute($this->getContext($context, 'articulo'), "nombrearticulo", array(), "any", false)), "html");
            echo "</td>

\t\t          <td>";
            // line 81
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, 'articulo'), "cantidad", array(), "any", false), "html");
            echo "</td>

\t\t          <td>";
            // line 83
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, 'articulo'), "baseunitario", array(), "any", false), "html");
            echo "</td>

\t\t          <td>";
            // line 85
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, 'articulo'), "descuento", array(), "any", false), "html");
            echo "</td>

\t\t          <td>";
            // line 87
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, 'articulo'), "impuestoiva", array(), "any", false), "html");
            echo "</td>

\t\t          <td>";
            // line 89
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, 'articulo'), "impuestoconsumo", array(), "any", false), "html");
            echo "</td>

\t\t          <td>";
            // line 91
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, 'articulo'), "fecha", array(), "any", false), "html");
            echo "</td>

\t\t          ";
            // line 93
            if (($this->getAttribute($this->getContext($context, 'articulo'), "idmesa", array(), "any", false) == 0)) {
                // line 94
                echo "
\t\t          <td> ";
                // line 95
                echo "Caja Principal";
                echo " </td>

\t\t          ";
            } else {
                // line 98
                echo "
\t\t          <td>";
                // line 99
                echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, 'articulo'), "idmesa", array(), "any", false), "html");
                echo "</td>

\t\t          ";
            }
            // line 102
            echo "
\t\t          ";
            // line 103
            $context['valorArticulo'] = (($this->getAttribute($this->getContext($context, 'articulo'), "preciounitario", array(), "any", false) * $this->getAttribute($this->getContext($context, 'articulo'), "cantidad", array(), "any", false)) - (($this->getAttribute($this->getContext($context, 'articulo'), "preciounitario", array(), "any", false) * $this->getAttribute($this->getContext($context, 'articulo'), "cantidad", array(), "any", false)) * ($this->getAttribute($this->getContext($context, 'articulo'), "descuento", array(), "any", false) / 100)));
            // line 104
            echo "
\t\t          <td align=\"left\">";
            // line 105
            echo twig_escape_filter($this->env, $this->getContext($context, 'valorArticulo'), "html");
            echo "</td>



\t\t          ";
            // line 109
            $context['subtotal'] = (($this->getContext($context, 'subtotal') + ($this->getAttribute($this->getContext($context, 'articulo'), "baseunitario", array(), "any", false) * $this->getAttribute($this->getContext($context, 'articulo'), "cantidad", array(), "any", false))) - (($this->getAttribute($this->getContext($context, 'articulo'), "baseunitario", array(), "any", false) * $this->getAttribute($this->getContext($context, 'articulo'), "cantidad", array(), "any", false)) * ($this->getAttribute($this->getContext($context, 'articulo'), "descuento", array(), "any", false) / 100)));
            // line 110
            echo "


\t\t          ";
            // line 113
            $context['impuestos'] = (($this->getContext($context, 'impuestos') + ((($this->getAttribute($this->getContext($context, 'articulo'), "baseunitario", array(), "any", false) * $this->getAttribute($this->getContext($context, 'articulo'), "cantidad", array(), "any", false)) - (($this->getAttribute($this->getContext($context, 'articulo'), "baseunitario", array(), "any", false) * $this->getAttribute($this->getContext($context, 'articulo'), "cantidad", array(), "any", false)) * ($this->getAttribute($this->getContext($context, 'articulo'), "descuento", array(), "any", false) / 100))) * ($this->getAttribute($this->getContext($context, 'articulo'), "impuestoconsumo", array(), "any", false) / 100))) + ((($this->getAttribute($this->getContext($context, 'articulo'), "baseunitario", array(), "any", false) * $this->getAttribute($this->getContext($context, 'articulo'), "cantidad", array(), "any", false)) - (($this->getAttribute($this->getContext($context, 'articulo'), "baseunitario", array(), "any", false) * $this->getAttribute($this->getContext($context, 'articulo'), "cantidad", array(), "any", false)) * ($this->getAttribute($this->getContext($context, 'articulo'), "descuento", array(), "any", false) / 100))) * ($this->getAttribute($this->getContext($context, 'articulo'), "impuestoiva", array(), "any", false) / 100)));
            // line 114
            echo "
\t\t          ";
            // line 115
            $context['total'] = ($this->getContext($context, 'total') + $this->getContext($context, 'valorArticulo'));
            // line 116
            echo "


\t\t     



\t\t        </tr>

\t\t     ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['articulo'], $context['_parent'], $context['loop']);
        $context = array_merge($_parent, array_intersect_key($context, $_parent));
        // line 126
        echo "
\t\t     <tr>
\t\t        <td colspan=\"8\"><b><font size=\"8\">TOTAL</font></b></td><td align=\"left\"><b><font size=\"6\">\$";
        // line 128
        echo twig_escape_filter($this->env, $this->getContext($context, 'total'), "html");
        echo "</font></b></td><td></td>
\t\t     </tr>



\t      </tbody>

\t\t

\t    </table>

    </div>


  


                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->



";
    }

    public function getTemplateName()
    {
        return "papelerareciclaje/Papelerareciclaje.twig.php";
    }

    public function isTraitable()
    {
        return false;
    }
}
