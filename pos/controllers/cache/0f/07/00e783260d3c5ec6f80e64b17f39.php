<?php

/* facturacion/modulo_mesas.twig.php */
class __TwigTemplate_0f0700e783260d3c5ec6f80e64b17f39 extends Twig_Template
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

    // line 2
    public function block_title($context, array $blocks = array())
    {
        echo " ";
        echo $this->renderParentBlock("title", $context, $blocks);
        echo " ";
    }

    // line 3
    public function block_stylesheets($context, array $blocks = array())
    {
        // line 4
        echo $this->renderParentBlock("stylesheets", $context, $blocks);
        echo "


<!--<link rel=\"stylesheet\" href=\"//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css\">-->
";
    }

    // line 9
    public function block_javascripts($context, array $blocks = array())
    {
        // line 10
        echo "
<!--<script src=\"//code.jquery.com/jquery-1.10.2.js\"></script>
<script src=\"//code.jquery.com/ui/1.11.4/jquery-ui.js\"></script>-->

";
        // line 14
        echo $this->renderParentBlock("javascripts", $context, $blocks);
        echo "



<!--Reloj digital-->
<script language=\"JavaScript\" type=\"text/javascript\">

\$(document).ready(function() {

    \$(\"#success-alert\").fadeTo(1500, 1500).slideUp(1500, function(){
    \$(\"#success-alert\").alert('close');
    });

});

    function show5(){
        if (!document.layers&&!document.all&&!document.getElementById)
        return

         var Digital=new Date()
         var hours=Digital.getHours()
         var minutes=Digital.getMinutes()
         var seconds=Digital.getSeconds()

        var dn=\"PM\"
        if (hours<12)
        dn=\"AM\"
        if (hours>12)
        hours=hours-12
        if (hours==0)
        hours=12

         if (minutes<=9)
         minutes=\"0\"+minutes
         if (seconds<=9)
         seconds=\"0\"+seconds
        //change font size here to your desire
        myclock=\"<font size='5' color='green' face='Arial' ><b><font size='1'></font>\"+hours+\":\"+minutes+\":\"
         +seconds+\" \"+dn+\"</font>\"
        if (document.layers){
        document.layers.liveclock.document.write(myclock)
        document.layers.liveclock.document.close()
        }
        else if (document.all)
        liveclock.innerHTML=myclock
        else if (document.getElementById)
        document.getElementById(\"liveclock\").innerHTML=myclock
        setTimeout(\"show5()\",1000)
         }


        window.onload=show5
         //-->
     </script>

  <!--<script type=\"text/javascript\" src=\"../../../js/jquery1.js\"></script>
  <script type='text/javascript' src='../../../js/jquery.autocomplete.js'></script>-->
  <!--<script type=\"text/javascript\" src=\"../../../js/facturacion.js\"></script>-->

  <!--<script type=\"text/javascript\" src=\"../../../js/jquery.ui.draggable.js\"></script>

  <script type=\"text/javascript\" src=\"../../../js/jquery.alerts.mod.js\"></script>-->
";
    }

    // line 77
    public function block_contenido($context, array $blocks = array())
    {
        // line 78
        echo "\t<div class=\"row\">
\t\t<div class=\"col-lg-6\">
\t\t\t\t<h1>Facturación</h1>
                <h3>Caja # ";
        // line 81
        echo twig_escape_filter($this->env, $this->getContext($context, 'caja'), "html");
        echo "</h3>
\t\t</div>
        <div class=\"col-lg-6\" align=\"right\">
                <h1>";
        // line 84
        echo twig_escape_filter($this->env, twig_date_format_filter($this->getAttribute($this->getContext($context, 'post'), "published_at", array(), "any", false), "d/m/Y", "America/Bogota"), "html");
        echo "</h1>
                <h3>
                    <span id=\"liveclock\"></span>
                </h3>             
        </div>
\t</div>\t



";
        // line 93
        if (($this->getContext($context, 'msg') == 1)) {
            // line 94
            echo "<div class=\"alert alert-success alert-dismissable\" id=\"success-alert\">
  <a href=\"#\" class=\"close\" data-dismiss=\"alert\" aria-label=\"close\">&times;</a>
  <strong>Registro exitoso!</strong> La transacción se grabó correctamente.
</div>
<div class=\"alert alert-danger alert-dismissable\">
<h4><i><b>Último cambio : ";
            // line 99
            echo twig_escape_filter($this->env, $this->getContext($context, 'cambio'), "html");
            echo "</b></i></h4>
</div>
";
        }
        // line 102
        echo "
<hr>

    <div class=\"row\">        

        ";
        // line 107
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getContext($context, 'mesas'));
        foreach ($context['_seq'] as $context['_key'] => $context['mesa']) {
            // line 108
            echo "
        ";
            // line 109
            if (($this->getAttribute($this->getContext($context, 'mesa'), "idmesa", array(), "any", false) == 0)) {
                // line 110
                echo "
        <div class=\"col-lg-2\">

            ";
                // line 113
                if (($this->getAttribute($this->getContext($context, 'mesa'), "estado", array(), "any", false) == 1)) {
                    // line 114
                    echo "            
            <a href=\"index.php?idmesa=";
                    // line 115
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, 'mesa'), "idmesa", array(), "any", false), "html");
                    echo "\" class=\"btn btn-danger btn-lg active btn-block\" role=\"button\" aria-pressed=\"true\"><div><img src=\"../images/caja.png\"></div><b>Caja Principal</b></a><hr>

            ";
                } else {
                    // line 118
                    echo "
            
            <a href=\"index.php?idmesa=";
                    // line 120
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, 'mesa'), "idmesa", array(), "any", false), "html");
                    echo "\" class=\"btn btn-link btn-lg active btn-block\" role=\"button\" aria-pressed=\"true\"><div><img src=\"../images/caja.png\"></div><b>Caja Principal</b></a><hr>
        

            ";
                }
                // line 124
                echo "
        </div>

        ";
            } elseif (($this->getAttribute($this->getContext($context, 'mesa'), "idmesa", array(), "any", false) < 6)) {
                // line 128
                echo "
        <div class=\"col-lg-2\">

            ";
                // line 131
                if (($this->getAttribute($this->getContext($context, 'mesa'), "estado", array(), "any", false) == 1)) {
                    // line 132
                    echo "
           
            <a href=\"index.php?idmesa=";
                    // line 134
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, 'mesa'), "idmesa", array(), "any", false), "html");
                    echo "\" class=\"btn btn-danger btn-lg active btn-block\" role=\"button\" aria-pressed=\"true\"><b>Cancha: ";
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, 'mesa'), "persona", array(), "any", false), "html");
                    echo "</b><br><b>";
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, 'mesa'), "idmesa", array(), "any", false), "html");
                    echo "</b><div><img src=\"../images/bolo-criollo-ocp.png\"></div></a><hr>

            ";
                } else {
                    // line 137
                    echo "
           
            <a href=\"index.php?idmesa=";
                    // line 139
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, 'mesa'), "idmesa", array(), "any", false), "html");
                    echo "\" class=\"btn btn-link btn-lg active btn-block\" role=\"button\" aria-pressed=\"true\"><b>Cancha: ";
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, 'mesa'), "persona", array(), "any", false), "html");
                    echo "</b><br><b>";
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, 'mesa'), "idmesa", array(), "any", false), "html");
                    echo "</b><div><img src=\"../images/bolo-criollo.png\"></div></a><hr>

            ";
                }
                // line 142
                echo "
        </div>

        ";
            } else {
                // line 146
                echo "
        <div class=\"col-lg-2\">

            ";
                // line 149
                if (($this->getAttribute($this->getContext($context, 'mesa'), "estado", array(), "any", false) == 1)) {
                    // line 150
                    echo "
           
            <a href=\"index.php?idmesa=";
                    // line 152
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, 'mesa'), "idmesa", array(), "any", false), "html");
                    echo "\" class=\"btn btn-danger btn-lg active btn-block\" role=\"button\" aria-pressed=\"true\"><b>Mesa: ";
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, 'mesa'), "persona", array(), "any", false), "html");
                    echo "</b><br><b>";
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, 'mesa'), "idmesa", array(), "any", false), "html");
                    echo "</b><div><img src=\"../images/mesa.png\"></div></a><hr>

            ";
                } else {
                    // line 155
                    echo "
           
            <a href=\"index.php?idmesa=";
                    // line 157
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, 'mesa'), "idmesa", array(), "any", false), "html");
                    echo "\" class=\"btn btn-link btn-lg active btn-block\" role=\"button\" aria-pressed=\"true\"><b>Mesa: ";
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, 'mesa'), "persona", array(), "any", false), "html");
                    echo "</b><br><b>";
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, 'mesa'), "idmesa", array(), "any", false), "html");
                    echo "</b><div><img src=\"../images/mesa.png\"></div></a><hr>

            ";
                }
                // line 160
                echo "
        </div>

            
        ";
            }
            // line 165
            echo "

        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['mesa'], $context['_parent'], $context['loop']);
        $context = array_merge($_parent, array_intersect_key($context, $_parent));
        // line 168
        echo "


        

    </div>

";
    }

    public function getTemplateName()
    {
        return "facturacion/modulo_mesas.twig.php";
    }

    public function isTraitable()
    {
        return false;
    }
}
