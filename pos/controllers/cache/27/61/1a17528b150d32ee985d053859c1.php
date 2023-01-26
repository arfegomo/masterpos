<?php

/* persona/list_persona.twig.php */
class __TwigTemplate_27611a17528b150d32ee985d053859c1 extends Twig_Template
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

\t\t\t\t<h1 class=\"page-header\">Personas</h1>

\t\t</div>

\t</div>



\t<div class=\"row\">

\t\t<div class=\"col-lg-12\">

\t<div align=\"right\"><a href=\"create.php\" class=\"btn btn-primary btn-xs\">Crear persona</a></div>

\t\t</div>

\t</div>



\t<br>



\t<div class=\"table-responsive\">

\t\t<table width=\"100%\" class=\"table table-striped table-bordered table-hover\" id=\"dataTables-example\">

\t      <thead>

\t        <tr>

\t          <th>Nombres</th>
              
              <th>Email</th>

\t          <th>Acciones</th>

\t        </tr>

\t      </thead>

\t      <tbody>

\t        ";
        // line 61
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getContext($context, 'personas'));
        foreach ($context['_seq'] as $context['_key'] => $context['personas']) {
            // line 62
            echo "
\t\t\t\t<tr>

\t\t      

\t\t          <td>";
            // line 67
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, 'personas'), "nombres", array(), "any", false), "html");
            echo " </td>
                  
                  <td>";
            // line 69
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, 'personas'), "email", array(), "any", false), "html");
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
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['personas'], $context['_parent'], $context['loop']);
        $context = array_merge($_parent, array_intersect_key($context, $_parent));
        // line 84
        echo "
\t        

\t      </tbody>

\t    </table>

\t    </div>





";
    }

    public function getTemplateName()
    {
        return "persona/list_persona.twig.php";
    }

    public function isTraitable()
    {
        return false;
    }
}
