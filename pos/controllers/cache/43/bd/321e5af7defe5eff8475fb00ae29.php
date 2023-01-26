<?php

/* tabla/create_tabla.twig.php */
class __TwigTemplate_43bd321e5af7defe5eff8475fb00ae29 extends Twig_Template
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

\t\t\t\t<h1 class=\"page-header\">Crear tabla</h1>

\t\t</div>

\t</div>

\t<br>

\t<div class=\"col-lg-6\">
    
    <form action=\"store.php\" method=\"post\" id=\"\">


    <div class=\"form-group\">
\t<label for=\"nombretabla\">Nombre tabla:</label>
\t<input type=\"text\" placeholder=\"Nombre tabla\" name=\"nombretabla\" class=\"form-control\" id=\"\">
    </div>
    
    <div class=\"form-group\">
\t<label for=\"tabla\">Tabla:</label>
\t<input type=\"text\" placeholder=\"Tabla\" name=\"tabla\" class=\"form-control\" id=\"\">
    </div>
    
    \t</br>

\t<input type=\"submit\" value=\"Crear tabla\" class=\"btn btn-primary\">

</form>

\t</div>

";
    }

    public function getTemplateName()
    {
        return "tabla/create_tabla.twig.php";
    }

    public function isTraitable()
    {
        return false;
    }
}
