<?php

/* reporteVentasArticulostwig.php */
class __TwigTemplate_a984a3715e549baf11e9337cc7aa7cc9 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->blocks = array(
            'contenido' => array($this, 'block_contenido'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $context = array_merge($this->env->getGlobals(), $context);

        // line 1
        $this->displayBlock('contenido', $context, $blocks);
    }

    public function block_contenido($context, array $blocks = array())
    {
        // line 2
        echo "
<hr>

\t<div class=\"table-responsive\">



\t\t<table width=\"100%\" class=\"table table-striped\" >



\t      <thead>



\t        <tr>



\t      <th>Articulo</th>

\t      <th>Cantidad</th>\t

\t\t  <th>Venta</th>\t

        </tr>



\t      </thead>



\t      <tbody>

\t\t\t";
        // line 37
        $context['total'] = 0;
        // line 38
        echo "

\t        ";
        // line 40
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getContext($context, 'ventas'));
        foreach ($context['_seq'] as $context['_key'] => $context['venta']) {
            // line 41
            echo "


\t\t\t\t<tr>



\t\t          <td>";
            // line 48
            echo twig_escape_filter($this->env, twig_upper_filter($this->env, $this->getAttribute($this->getContext($context, 'venta'), "nombrearticulo", array(), "any", false)), "html");
            echo "</td>

\t\t          <td>";
            // line 50
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, 'venta'), "cantidad", array(), "any", false), "html");
            echo "</td>

\t\t          <td>";
            // line 52
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, 'venta'), "venta", array(), "any", false), "html");
            echo "</td>

\t\t       

\t\t          ";
            // line 56
            $context['total'] = ($this->getContext($context, 'total') + $this->getAttribute($this->getContext($context, 'venta'), "venta", array(), "any", false));
            // line 57
            echo "


\t\t        </tr>

\t\t     ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['venta'], $context['_parent'], $context['loop']);
        $context = array_merge($_parent, array_intersect_key($context, $_parent));
        // line 63
        echo "
\t\t     <tr>
\t\t        <td colspan=\"2\"><b>
              <font size=\"5\">TOTAL</font>
            </td>
            <td>";
        // line 68
        echo twig_escape_filter($this->env, $this->getContext($context, 'total'), "html");
        echo "</font></td>
\t\t     </tr>



\t      </tbody>

\t\t

\t    </table>

\t    \t\t  

\t    </div>



\t<hr>



";
    }

    public function getTemplateName()
    {
        return "reporteVentasArticulostwig.php";
    }

    public function isTraitable()
    {
        return true;
    }
}
