<?php

/* usuario/edit_user.twig.php */
class __TwigTemplate_0160a5c4989c2b1774c5d91236c2b3df extends Twig_Template
{
    protected $parent;

    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'stylesheets' => array($this, 'block_stylesheets'),
            'javascripts' => array($this, 'block_javascripts'),
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
    public function block_stylesheets($context, array $blocks = array())
    {
        // line 6
        echo "
";
        // line 7
        echo $this->renderParentBlock("stylesheets", $context, $blocks);
        echo "

<link rel=\"stylesheet\" href=\"//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css\">

";
    }

    // line 13
    public function block_javascripts($context, array $blocks = array())
    {
        // line 14
        echo "
  ";
        // line 15
        echo $this->renderParentBlock("javascripts", $context, $blocks);
        echo "
<script type=\"text/javascript\">
\$(document).ready(function(){
  \$(function(){
    \t\$(\"#datepicker\").datepicker({
    \t\tdateFormat:\"yy-mm-dd\",
    \t\tchangeMonth: true,
      \t\tchangeYear: true,
      \t\tyearRange: \"-100:+0\"
    \t});
    });
});
</script>
  <!--<script type=\"text/javascript\" src=\"../../../../js/usuario.js\"></script>-->

";
    }

    // line 32
    public function block_contenido($context, array $blocks = array())
    {
        // line 33
        echo "
\t<div class=\"row\">

\t\t<div class=\"col-lg-12\">

\t\t\t\t<h1 class=\"page-header\">Editar usuario</h1>

\t\t</div>

\t</div>

\t<br>

\t<div class=\"col-lg-6\">
    
    <form action=\"update.php\" method=\"post\" id=\"usuario-crear\">

    <div class=\"form-group\">
\t<label for=\"documento\">Documento:</label>
\t<input type=\"text\" name=\"documento\" class=\"form-control\" value=\"";
        // line 52
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getContext($context, 'user'));
        foreach ($context['_seq'] as $context['_key'] => $context['user']) {
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, 'user'), "documento", array(), "any", false), "html");
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['user'], $context['_parent'], $context['loop']);
        $context = array_merge($_parent, array_intersect_key($context, $_parent));
        echo "\" readonly=\"readonly\">
    </div>

    <div class=\"form-group\">
\t<label for=\"nombres\">Nombres:</label>
\t<input type=\"text\" name=\"nombres\" class=\"form-control\" value=\"";
        // line 57
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getContext($context, 'user'));
        foreach ($context['_seq'] as $context['_key'] => $context['user']) {
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, 'user'), "nombres", array(), "any", false), "html");
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['user'], $context['_parent'], $context['loop']);
        $context = array_merge($_parent, array_intersect_key($context, $_parent));
        echo "\">
    </div>

    <div class=\"form-group\">
\t<label for=\"apellidos\">Apellidos:</label>
\t<input type=\"text\" name=\"apellidos\" class=\"form-control\" value=\"";
        // line 62
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getContext($context, 'user'));
        foreach ($context['_seq'] as $context['_key'] => $context['user']) {
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, 'user'), "apellidos", array(), "any", false), "html");
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['user'], $context['_parent'], $context['loop']);
        $context = array_merge($_parent, array_intersect_key($context, $_parent));
        echo "\">
    </div>
\t
    <div class=\"form-group\">
\t<label for=\"fechanacimiento\">Fecha de nacimiento:</label>
\t<input type=\"text\" name=\"fechanacimiento\" class=\"form-control\" id=\"datepicker\" value=\"";
        // line 67
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getContext($context, 'user'));
        foreach ($context['_seq'] as $context['_key'] => $context['user']) {
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, 'user'), "fechanacimiento", array(), "any", false), "html");
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['user'], $context['_parent'], $context['loop']);
        $context = array_merge($_parent, array_intersect_key($context, $_parent));
        echo "\">
</div>

    <div class=\"form-group\">
\t<label for=\"email\">Email:</label>
\t<input type=\"text\" name=\"email\" class=\"form-control\" value=\"";
        // line 72
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getContext($context, 'user'));
        foreach ($context['_seq'] as $context['_key'] => $context['user']) {
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, 'user'), "email", array(), "any", false), "html");
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['user'], $context['_parent'], $context['loop']);
        $context = array_merge($_parent, array_intersect_key($context, $_parent));
        echo "\">
    </div>
    
    <div class=\"form-group\">
\t<label for=\"direccion\">Dirección:</label>
\t<input type=\"text\" name=\"direccion\" class=\"form-control\" value=\"";
        // line 77
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getContext($context, 'user'));
        foreach ($context['_seq'] as $context['_key'] => $context['user']) {
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, 'user'), "direccion", array(), "any", false), "html");
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['user'], $context['_parent'], $context['loop']);
        $context = array_merge($_parent, array_intersect_key($context, $_parent));
        echo "\">
    </div>

    <div class=\"form-group\">
\t<label for=\"telefonofijo\">Teléfono:</label>
\t<input type=\"text\" name=\"telefonofijo\" class=\"form-control\" value=\"";
        // line 82
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getContext($context, 'user'));
        foreach ($context['_seq'] as $context['_key'] => $context['user']) {
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, 'user'), "telefonofijo", array(), "any", false), "html");
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['user'], $context['_parent'], $context['loop']);
        $context = array_merge($_parent, array_intersect_key($context, $_parent));
        echo "\">
    </div>   

    <div class=\"form-group\">
\t<label for=\"celular\">Celular:</label>
\t<input type=\"text\" name=\"celular\" class=\"form-control\" value=\"";
        // line 87
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getContext($context, 'user'));
        foreach ($context['_seq'] as $context['_key'] => $context['user']) {
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, 'user'), "celular", array(), "any", false), "html");
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['user'], $context['_parent'], $context['loop']);
        $context = array_merge($_parent, array_intersect_key($context, $_parent));
        echo "\">
    </div>

\t</div>

\t<div class=\"col-lg-6\">

    <div class=\"form-group\">
\t<label for=\"idgenero\">Género:</label>
\t<select name=\"idgenero\" class=\"form-control\">
\t\t";
        // line 97
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getContext($context, 'generos'));
        foreach ($context['_seq'] as $context['_key'] => $context['genero']) {
            // line 98
            echo "\t\t\t";
            if (($this->getAttribute($this->getContext($context, 'genero'), "idgenero", array(), "any", false) == $this->getAttribute($this->getContext($context, 'user'), "idgenero", array(), "any", false))) {
                // line 99
                echo "\t\t\t<option value=\"";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, 'genero'), "idgenero", array(), "any", false), "html");
                echo "\" selected=\"selected\">";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, 'genero'), "nombregenero", array(), "any", false), "html");
                echo "</option>
\t\t\t";
            } else {
                // line 101
                echo "\t\t\t<option value=\"";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, 'genero'), "idgenero", array(), "any", false), "html");
                echo "\">";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, 'genero'), "nombregenero", array(), "any", false), "html");
                echo "</option>
\t\t\t";
            }
            // line 103
            echo "\t\t";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['genero'], $context['_parent'], $context['loop']);
        $context = array_merge($_parent, array_intersect_key($context, $_parent));
        // line 104
        echo "\t</select>\t
    </div>

    <div class=\"form-group\">
\t<label for=\"role\">Role:</label>
\t<select name=\"id\" class=\"form-control\">
\t\t";
        // line 110
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getContext($context, 'roles'));
        foreach ($context['_seq'] as $context['_key'] => $context['role']) {
            // line 111
            echo "\t\t\t";
            if (($this->getAttribute($this->getContext($context, 'role'), "id", array(), "any", false) == $this->getAttribute($this->getContext($context, 'user'), "idrole", array(), "any", false))) {
                // line 112
                echo "\t\t\t<option value=\"";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, 'role'), "id", array(), "any", false), "html");
                echo "\" selected=\"selected\">";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, 'role'), "display_name", array(), "any", false), "html");
                echo "</option>
\t\t\t";
            } else {
                // line 114
                echo "\t\t\t<option value=\"";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, 'role'), "id", array(), "any", false), "html");
                echo "\">";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, 'role'), "display_name", array(), "any", false), "html");
                echo "</option>
\t\t\t";
            }
            // line 116
            echo "\t\t";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['role'], $context['_parent'], $context['loop']);
        $context = array_merge($_parent, array_intersect_key($context, $_parent));
        // line 117
        echo "\t</select>
    </div>

    <div class=\"form-group\">
\t<label for=\"usuario\">Usuario:</label>
\t<input type=\"text\" name=\"usuario\" class=\"form-control\" value=\"";
        // line 122
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getContext($context, 'user'));
        foreach ($context['_seq'] as $context['_key'] => $context['user']) {
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, 'user'), "usuario", array(), "any", false), "html");
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['user'], $context['_parent'], $context['loop']);
        $context = array_merge($_parent, array_intersect_key($context, $_parent));
        echo "\">
    </div>

    <div class=\"form-group\">
\t<label for=\"password\">Password:</label>
\t<input type=\"password\" name=\"password\" class=\"form-control\" id=\"password\" value=\"";
        // line 127
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getContext($context, 'user'));
        foreach ($context['_seq'] as $context['_key'] => $context['user']) {
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, 'user'), "password", array(), "any", false), "html");
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['user'], $context['_parent'], $context['loop']);
        $context = array_merge($_parent, array_intersect_key($context, $_parent));
        echo "\">
    </div>

    <div class=\"form-group\">
\t<label for=\"re_password\">Comprobar password:</label>
\t<input type=\"password\" name=\"re_password\" class=\"form-control\" value=\"";
        // line 132
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getContext($context, 'user'));
        foreach ($context['_seq'] as $context['_key'] => $context['user']) {
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, 'user'), "password", array(), "any", false), "html");
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['user'], $context['_parent'], $context['loop']);
        $context = array_merge($_parent, array_intersect_key($context, $_parent));
        echo "\">
    </div>

    <div class=\"form-group\">
\t<label for=\"active\">Estado:</label>
\t<select name=\"active\" class=\"form-control\">
\t\t";
        // line 138
        if (($this->getAttribute($this->getContext($context, 'user'), "active", array(), "any", false) == 1)) {
            // line 139
            echo "\t\t\t<option value=\"1\" selected=\"selected\">Activo</option>
\t\t\t<option value=\"0\">Inactivo</option>
\t\t";
        } else {
            // line 142
            echo "\t\t\t<option value=\"1\">Activo</option>
\t\t\t<option value=\"0\" selected=\"selected\">Inactivo</option>
\t\t";
        }
        // line 145
        echo "\t</select>
    </div>

\t</br>

\t<input type=\"submit\" value=\"Editar usuario\" class=\"btn btn-primary\">

</form>

</div>

<div id=\"datepicker\"></div>

";
    }

    public function getTemplateName()
    {
        return "usuario/edit_user.twig.php";
    }

    public function isTraitable()
    {
        return false;
    }
}
