<?php

/* facturacion/nombremesa.twig.php */
class __TwigTemplate_a0145bba53f43e34a7b85d58100ccc82 extends Twig_Template
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
<div class=\"row\">

\t\t<div class=\"col-lg-12\">

\t\t\t\t<h1 class=\"page-header\">Asignar nombre del cliente a la mesa # ";
        // line 11
        echo twig_escape_filter($this->env, $this->getContext($context, 'mesa'), "html");
        echo ":</h1>

\t\t</div>

\t</div>

\t<br>

\t<div class=\"col-lg-6\">
    
    <form action=\"store.php\" method=\"post\" id=\"\">
    <input type=\"hidden\" name=\"idmesa\" value=\"";
        // line 22
        echo twig_escape_filter($this->env, $this->getContext($context, 'mesa'), "html");
        echo "\">

    <div class=\"form-group\">
\t<label for=\"persona\">Nombre:</label>
\t<input type=\"text\" placeholder=\"Nombre del cliente\" name=\"persona\" class=\"form-control\" id=\"\">
    </div>
    
    \t</br>

\t<input type=\"submit\" value=\"Asignar mesa\" class=\"btn btn-primary\">

</form>

\t</div>

";
    }

    public function getTemplateName()
    {
        return "facturacion/nombremesa.twig.php";
    }

    public function isTraitable()
    {
        return false;
    }
}
