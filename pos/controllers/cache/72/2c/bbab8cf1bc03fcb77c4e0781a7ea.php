<?php

/* persona/create_persona.twig.php */
class __TwigTemplate_722cbbab8cf1bc03fcb77c4e0781a7ea extends Twig_Template
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
<!--<script type=\"text/javascript\" src=\"../../js/usuario.js\"></script>-->

";
    }

    // line 33
    public function block_contenido($context, array $blocks = array())
    {
        // line 34
        echo "
\t<div class=\"row\">

\t\t<div class=\"col-lg-12\">

\t\t\t\t<h1 class=\"page-header\">Crear persona</h1>

\t\t</div>

\t</div>

\t<br>

\t<div class=\"col-lg-6\">
    
    <form action=\"store.php\" method=\"post\" id=\"persona-crear\">

    <div class=\"form-group\">
\t<label for=\"documento\">Documento / Nit:</label>
\t<input type=\"text\" placeholder=\"Ingrese el documento\" name=\"documento\" class=\"form-control\" id=\"documento\">
    </div>

    <div class=\"form-group\">
\t<label for=\"documento\">Dígito verificación:</label>
\t<input type=\"text\" placeholder=\"Ingrese el dígito de verificación\" name=\"digitoverificacion\" class=\"form-control\" id=\"digitoverificacion\">
    </div>

    <div class=\"form-group\">
\t<label for=\"nombres\">Nombres:</label>
\t<input type=\"text\" placeholder=\"Ingrese los nombres\" name=\"nombres\" class=\"form-control\" id=\"\">
    </div>


    <div class=\"form-group\">
\t<label for=\"apellidos\">Apellidos:</label>
\t<input type=\"text\" placeholder=\"Ingrese los apellidos\" name=\"apellidos\" class=\"form-control\">
    </div>
\t
    <!--<div class=\"form-group\">
\t<label for=\"fechanacimiento\">Fecha de nacimiento:</label>
\t<input type=\"text\" placeholder=\"Ingresa la fecha de nacimiento\" name=\"fechanacimiento\" class=\"form-control\" id=\"datepicker\">
    </div>-->

    <div class=\"form-group\">
\t<label for=\"email\">Email:</label>
\t<input type=\"text\" placeholder=\"Ingrese el email\" name=\"email\" class=\"form-control\">
    </div>

    \t<div class=\"form-group\">
\t<input type=\"submit\" value=\"Crear persona\" class=\"btn btn-primary\">
\t</div>

\t</div>

\t<div class=\"col-lg-6\">

\t    <div class=\"form-group\">
\t<label for=\"direccion\">Dirección:</label>
\t<input type=\"text\" placeholder=\"Ingrese la dirección\" name=\"direccion\" class=\"form-control\">
    </div>

    <div class=\"form-group\">
\t<label for=\"telefono\">Teléfono:</label>
\t<input type=\"text\" placeholder=\"Ingrese teléfono\" name=\"telefono\" class=\"form-control\">
    </div>


    <div class=\"form-group\">
\t<label for=\"celular\">Celular:</label>
\t<input type=\"text\" placeholder=\"Ingrese el celular\" name=\"celular\" class=\"form-control\">
    </div>

    <div class=\"form-group\">
\t<label for=\"idgenero\">Género:</label>
\t<select name=\"idgenero\" class=\"form-control\">
\t";
        // line 109
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getContext($context, 'generos'));
        foreach ($context['_seq'] as $context['_key'] => $context['genero']) {
            // line 110
            echo "\t<option value=\"";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, 'genero'), "idgenero", array(), "any", false), "html");
            echo "\">";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, 'genero'), "nombregenero", array(), "any", false), "html");
            echo "</option>
\t";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['genero'], $context['_parent'], $context['loop']);
        $context = array_merge($_parent, array_intersect_key($context, $_parent));
        // line 112
        echo "\t</select>\t
    </div>



\t</div>


\t</br>

    <!--<div class=\"form-group\">
\t<label for=\"role\">Rol:</label>
\t<select name=\"id\" class=\"form-control\">
\t";
        // line 125
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getContext($context, 'roles'));
        foreach ($context['_seq'] as $context['_key'] => $context['role']) {
            // line 126
            echo "\t<option value=\"";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, 'role'), "id", array(), "any", false), "html");
            echo "\">";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, 'role'), "display_name", array(), "any", false), "html");
            echo "</option>
\t";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['role'], $context['_parent'], $context['loop']);
        $context = array_merge($_parent, array_intersect_key($context, $_parent));
        // line 128
        echo "\t</select>
    </div>

    <div class=\"form-group\"> 
\t<label for=\"usuario\">Usuario:</label>
\t<input type=\"text\" placeholder=\"Ingrese el usuario\" name=\"usuario\" class=\"form-control\">
    </div>

    <div class=\"form-group\">
\t<label for=\"password\">Password:</label>
\t<input type=\"password\" placeholder=\"Ingrese el password\" name=\"password\" class=\"form-control\" id=\"password\">
</div>

    <div class=\"form-group\">
\t<label for=\"re_password\">Comprobar password:</label>
\t<input type=\"password\" placeholder=\"Ingrese de nuevo el password\" name=\"re_password\" class=\"form-control\">
    </div>

    <div class=\"form-group\">
\t<label for=\"active\">Estado:</label>
\t<select name=\"active\" class=\"form-control\">
\t\t\t<option value=\"1\">Activo</option>
\t\t\t<option value=\"0\">Inactivo</option>
\t</select>
    </div>-->


</form>

</div>

<!--<div id=\"datepicker\"></div>-->

";
    }

    public function getTemplateName()
    {
        return "persona/create_persona.twig.php";
    }

    public function isTraitable()
    {
        return false;
    }
}
