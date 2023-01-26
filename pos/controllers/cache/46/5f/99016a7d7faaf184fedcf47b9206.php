<?php

/* conceptofacturacion/list_conceptosfacturacion.twig.php */
class __TwigTemplate_465f99016a7d7faaf184fedcf47b9206 extends Twig_Template
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

    // line 3
    public function block_title($context, array $blocks = array())
    {
        echo " ";
        echo $this->renderParentBlock("title", $context, $blocks);
        echo " ";
    }

    // line 5
    public function block_contenido($context, array $blocks = array())
    {
        // line 6
        echo "


\t<div class=\"row\">

\t\t<div class=\"col-lg-12\">

\t\t\t\t<h1 class=\"page-header\">Conceptos de facturación</h1>

\t\t</div>

\t</div>



\t<div class=\"row\">

\t\t<div class=\"col-lg-12\">

\t<div align=\"right\"><a href=\"create.php\" class=\"btn btn-primary btn-xs\">Nuevo</a></div>

\t\t</div>

\t</div>



\t<br>



\t<div class=\"table-responsive\">

\t\t<table width=\"100%\" class=\"table table-striped table-bordered table-hover\" id=\"dataTables-example\">

\t      <thead>

\t        <tr>

\t          <th>Tipo transaccion</th>
\t          <th>ID consecutivo</th>


\t          <th>Acciones</th>

\t        </tr>

\t      </thead>

\t      <tbody>

\t        ";
        // line 57
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getContext($context, 'conceptosfacturacion'));
        foreach ($context['_seq'] as $context['_key'] => $context['conceptosfacturacion']) {
            // line 58
            echo "
\t\t\t\t<tr>

\t\t      

\t\t          <td>";
            // line 63
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, 'conceptosfacturacion'), "nombreconceptofacturacion", array(), "any", false), "html");
            echo "</td>
\t\t          <td>";
            // line 64
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, 'conceptosfacturacion'), "idconsecutivo", array(), "any", false), "html");
            echo "</td>

\t\t           <td>
                  <a href=\"\"><button class=\"btn btn-xs btn-info\">
\t\t\t\t\t\t\t     <i class=\"ace-icon fa fa-pencil bigger-120\"></i>
\t\t\t\t\t             </button></a>
                                 
                      <a href=\"\"><button class=\"btn btn-xs btn-danger\">
\t\t\t\t\t             <i class=\"ace-icon fa fa-trash-o bigger-120\"></i>
\t\t\t\t\t             </button></a>
                                 </td>

\t\t        </tr>

\t\t\t";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['conceptosfacturacion'], $context['_parent'], $context['loop']);
        $context = array_merge($_parent, array_intersect_key($context, $_parent));
        // line 79
        echo "
\t        

\t      </tbody>

\t    </table>

\t    </div>





";
    }

    public function getTemplateName()
    {
        return "conceptofacturacion/list_conceptosfacturacion.twig.php";
    }

    public function isTraitable()
    {
        return false;
    }
}
