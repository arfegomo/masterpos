<?php

/* index_principal.twig.php */
class __TwigTemplate_4f4890bf9c46c56f20ce7acdfb8e2c6d extends Twig_Template
{
    protected $parent;

    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->blocks = array(
            'subtitulo' => array($this, 'block_subtitulo'),
            'contenido' => array($this, 'block_contenido'),
        );
    }

    public function getParent(array $context)
    {
        if (null === $this->parent) {
            $this->parent = $this->env->loadTemplate("layout_principal.twig.php");
        }

        return $this->parent;
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $context = array_merge($this->env->getGlobals(), $context);

        $this->getParent($context)->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_subtitulo($context, array $blocks = array())
    {
        // line 4
        echo "\t
";
    }

    // line 7
    public function block_contenido($context, array $blocks = array())
    {
        // line 8
        echo "\t
";
    }

    public function getTemplateName()
    {
        return "index_principal.twig.php";
    }

    public function isTraitable()
    {
        return false;
    }
}
