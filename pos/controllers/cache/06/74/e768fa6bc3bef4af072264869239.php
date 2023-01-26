<?php

/* consecutivo/list_consecutivo.twig.php */
class __TwigTemplate_0674e768fa6bc3bef4af072264869239 extends Twig_Template
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

\t\t\t\t<h1 class=\"page-header\">Consecutivos</h1>

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
\t\t\t  
\t\t\t  <th>ID</th>
\t          <th>Consecutivo interno</th>
\t          <th>Consecutivo dian</th>


\t          <th>Acciones</th>

\t        </tr>

\t      </thead>

\t      <tbody>

\t        ";
        // line 62
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getContext($context, 'consecutivos'));
        foreach ($context['_seq'] as $context['_key'] => $context['consecutivos']) {
            // line 63
            echo "
\t\t\t\t<tr>

\t\t      

\t\t          <td>";
            // line 68
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, 'consecutivos'), "idconsecutivo", array(), "any", false), "html");
            echo "</td>
\t\t          <td>";
            // line 69
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, 'consecutivos'), "consecutivo", array(), "any", false), "html");
            echo "</td>
\t\t          <td>";
            // line 70
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, 'consecutivos'), "consecutivodian", array(), "any", false), "html");
            echo "</td>

\t\t          <td>
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
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['consecutivos'], $context['_parent'], $context['loop']);
        $context = array_merge($_parent, array_intersect_key($context, $_parent));
        // line 85
        echo "
\t        

\t      </tbody>

\t    </table>

\t    </div>





";
    }

    public function getTemplateName()
    {
        return "consecutivo/list_consecutivo.twig.php";
    }

    public function isTraitable()
    {
        return false;
    }
}
