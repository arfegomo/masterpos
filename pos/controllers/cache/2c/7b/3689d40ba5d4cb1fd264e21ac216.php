<?php

/* reporteVentasdiarias.twig.php */
class __TwigTemplate_2c7b3689d40ba5d4cb1fd264e21ac216 extends Twig_Template
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



\t      <th>Fecha</th>

\t\t\t  <th>Venta</th>\t

        </tr>



\t      </thead>



\t      <tbody>

\t\t\t";
        // line 35
        $context['total'] = 0;
        // line 36
        echo "

\t        ";
        // line 38
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getContext($context, 'ventas'));
        foreach ($context['_seq'] as $context['_key'] => $context['venta']) {
            // line 39
            echo "


\t\t\t\t<tr>



\t\t          <td>";
            // line 46
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, 'venta'), "fecha", array(), "any", false), "html");
            echo "</td>

\t\t          <td>";
            // line 48
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, 'venta'), "venta", array(), "any", false), "html");
            echo "</td>

\t\t       

\t\t          ";
            // line 52
            $context['total'] = ($this->getContext($context, 'total') + $this->getAttribute($this->getContext($context, 'venta'), "venta", array(), "any", false));
            // line 53
            echo "


\t\t        </tr>

\t\t     ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['venta'], $context['_parent'], $context['loop']);
        $context = array_merge($_parent, array_intersect_key($context, $_parent));
        // line 59
        echo "
\t\t     <tr>
\t\t        <td colspan=\"1\"><b>
              <font size=\"5\">TOTAL</font>
            </td>
            <td>";
        // line 64
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
        return "reporteVentasdiarias.twig.php";
    }

    public function isTraitable()
    {
        return true;
    }
}
