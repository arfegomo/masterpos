<?php

/* reporteFiscal.twig.php */
class __TwigTemplate_765a399d23a88fef28cf0d05c89622b4 extends Twig_Template
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
        // line 156
        echo " \t\t";
    }

    // line 1
    public function block_contenido($context, array $blocks = array())
    {
        // line 2
        echo "
<script type=\"text/javascript\">
\$(document).ready(function(){

    \$(\"input[name=imprimir]\").click(function(){
      var fecha = \$('input[name=fecha]').val();
      var horainicio = \$('input[name=horainicio]').val();
      var horafin = \$('input[name=horafin]').val();
        \$.ajax({
        \tdataType: \"html\",
            url: \"imprimirTirafiscal.php\",
            data: {fecha:fecha,horainicio:horainicio,horafin:horafin},
            type: \"POST\",
            success:  function (data) {
  
                }

          });
        
  });
});
</script>

<hr>

\t<div class=\"table-responsive\">


\t\t<form action=\"\" method=\"post\">
\t\t\t<input type=\"hidden\" name=\"fecha\" id=\"fecha\" value=\"";
        // line 31
        echo twig_escape_filter($this->env, $this->getContext($context, 'fecha'), "html");
        echo "\">
\t\t\t<input type=\"hidden\" name=\"horainicio\" id=\"horainicio\" value=\"";
        // line 32
        echo twig_escape_filter($this->env, $this->getContext($context, 'horainicio'), "html");
        echo "\">
\t\t\t<input type=\"hidden\" name=\"horafin\" id=\"horafin\" value=\"";
        // line 33
        echo twig_escape_filter($this->env, $this->getContext($context, 'horafin'), "html");
        echo "\">

\t\t<table width=\"100%\" class=\"table table-striped\" >



\t      <thead>



\t        <tr>



\t      <th>Articulo</th>

\t\t\t  <th>Cantidad</th>\t

\t\t\t  <th>Precio</th>

\t\t\t  <th>Descuento(%)</th>

\t\t\t  <th>Iva</th>

\t\t\t  <th>Imp. Consumo</th>

\t\t\t  <th>Total</th>

\t          



\t        </tr>



\t      </thead>



\t      <tbody>

\t\t\t";
        // line 75
        $context['subtotal'] = 0;
        // line 76
        echo "
\t\t\t";
        // line 77
        $context['impuestos'] = 0;
        // line 78
        echo "
\t\t\t";
        // line 79
        $context['total'] = 0;
        // line 80
        echo "
\t\t\t";
        // line 81
        $context['valorArticulo'] = 0;
        // line 82
        echo "

      ";
        // line 84
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getContext($context, 'articulos'));
        foreach ($context['_seq'] as $context['_key'] => $context['articulo']) {
            // line 85
            echo "


        <tr>



              <td>";
            // line 92
            echo twig_escape_filter($this->env, twig_upper_filter($this->env, $this->getAttribute($this->getContext($context, 'articulo'), "nombrearticulo", array(), "any", false)), "html");
            echo "</td>

              <td>";
            // line 94
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, 'articulo'), "cantidad", array(), "any", false), "html");
            echo "</td>

              <td>";
            // line 96
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, 'articulo'), "baseunitario", array(), "any", false), "html");
            echo "</td>

              <td>";
            // line 98
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, 'articulo'), "descuento", array(), "any", false), "html");
            echo "</td>

              <td>";
            // line 100
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, 'articulo'), "impuestoiva", array(), "any", false), "html");
            echo "</td>

              <td>";
            // line 102
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, 'articulo'), "impuestoconsumo", array(), "any", false), "html");
            echo "</td>

              ";
            // line 104
            $context['valorArticulo'] = (($this->getAttribute($this->getContext($context, 'articulo'), "preciounitario", array(), "any", false) * $this->getAttribute($this->getContext($context, 'articulo'), "cantidad", array(), "any", false)) - (($this->getAttribute($this->getContext($context, 'articulo'), "preciounitario", array(), "any", false) * $this->getAttribute($this->getContext($context, 'articulo'), "cantidad", array(), "any", false)) * ($this->getAttribute($this->getContext($context, 'articulo'), "descuento", array(), "any", false) / 100)));
            // line 105
            echo "
              <td align=\"left\">";
            // line 106
            echo twig_escape_filter($this->env, $this->getContext($context, 'valorArticulo'), "html");
            echo "</td>



              ";
            // line 110
            $context['subtotal'] = (($this->getContext($context, 'subtotal') + ($this->getAttribute($this->getContext($context, 'articulo'), "baseunitario", array(), "any", false) * $this->getAttribute($this->getContext($context, 'articulo'), "cantidad", array(), "any", false))) - (($this->getAttribute($this->getContext($context, 'articulo'), "baseunitario", array(), "any", false) * $this->getAttribute($this->getContext($context, 'articulo'), "cantidad", array(), "any", false)) * ($this->getAttribute($this->getContext($context, 'articulo'), "descuento", array(), "any", false) / 100)));
            // line 111
            echo "


              ";
            // line 114
            $context['impuestos'] = (($this->getContext($context, 'impuestos') + ((($this->getAttribute($this->getContext($context, 'articulo'), "baseunitario", array(), "any", false) * $this->getAttribute($this->getContext($context, 'articulo'), "cantidad", array(), "any", false)) - (($this->getAttribute($this->getContext($context, 'articulo'), "baseunitario", array(), "any", false) * $this->getAttribute($this->getContext($context, 'articulo'), "cantidad", array(), "any", false)) * ($this->getAttribute($this->getContext($context, 'articulo'), "descuento", array(), "any", false) / 100))) * ($this->getAttribute($this->getContext($context, 'articulo'), "impuestoconsumo", array(), "any", false) / 100))) + ((($this->getAttribute($this->getContext($context, 'articulo'), "baseunitario", array(), "any", false) * $this->getAttribute($this->getContext($context, 'articulo'), "cantidad", array(), "any", false)) - (($this->getAttribute($this->getContext($context, 'articulo'), "baseunitario", array(), "any", false) * $this->getAttribute($this->getContext($context, 'articulo'), "cantidad", array(), "any", false)) * ($this->getAttribute($this->getContext($context, 'articulo'), "descuento", array(), "any", false) / 100))) * ($this->getAttribute($this->getContext($context, 'articulo'), "impuestoiva", array(), "any", false) / 100)));
            // line 115
            echo "
              ";
            // line 116
            $context['total'] = ($this->getContext($context, 'total') + $this->getContext($context, 'valorArticulo'));
            // line 117
            echo "

            </tr>

         ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['articulo'], $context['_parent'], $context['loop']);
        $context = array_merge($_parent, array_intersect_key($context, $_parent));
        // line 122
        echo "


\t        

\t\t     <tr>
\t\t        <td colspan=\"6\">
\t\t        \t<b><font size=\"8\">TOTAL</font></b>
\t\t        </td>
\t\t       
\t\t        <td align=\"left\"><b><font size=\"6\">\$";
        // line 132
        echo twig_escape_filter($this->env, $this->getContext($context, 'total'), "html");
        echo "</font></b>
\t\t        </td>
\t\t       
\t\t     </tr>



\t      </tbody>


\t\t

\t    </table>
\t    
\t    

\t\t<div class=\"col-lg-12\">
\t    \t<input type=\"button\" value=\"Imprimir\" class=\"btn btn-primary\" id=\"imprimir\" name=\"imprimir\">
\t    </div>

\t\t
    \t</div>
    \t</form>

\t   ";
    }

    public function getTemplateName()
    {
        return "reporteFiscal.twig.php";
    }

    public function isTraitable()
    {
        return true;
    }
}
