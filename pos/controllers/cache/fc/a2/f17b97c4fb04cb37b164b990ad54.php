<?php

/* layout_principal.twig.php */
class __TwigTemplate_fca2f17b97c4fb04cb37b164b990ad54 extends Twig_Template
{
    protected function doDisplay(array $context, array $blocks = array())
    {
        $context = array_merge($this->env->getGlobals(), $context);

        // line 1
        echo "<!DOCTYPE html>

<html lang=\"en\">



<head>



    <meta charset=\"utf-8\">

    <meta http-equiv=\"X-UA-Compatible\" content=\"IE=edge\">

    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1\">

    <meta name=\"description\" content=\"\">

    <meta name=\"author\" content=\"\">



    <!-- Bootstrap Core CSS -->

    <link href=\"../../bower_components/bootstrap/dist/css/bootstrap.min.css\" rel=\"stylesheet\">



    <!-- MetisMenu CSS -->

    <link href=\"../../bower_components/metisMenu/dist/metisMenu.min.css\" rel=\"stylesheet\">



    <!-- Timeline CSS -->

    <link href=\"../../dist/css/timeline.css\" rel=\"stylesheet\">



    <!-- Custom CSS -->

    <link href=\"../../dist/css/sb-admin-2.css\" rel=\"stylesheet\">



    <!-- Morris Charts CSS -->

    <link href=\"../../bower_components/morrisjs/morris.css\" rel=\"stylesheet\">



    <!-- Custom Fonts -->

    <link href=\"../../bower_components/font-awesome/css/font-awesome.min.css\" rel=\"stylesheet\" type=\"text/css\">



    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->

    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->

    <!--[if lt IE 9]>

        <script src=\"https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js\"></script>

        <script src=\"https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js\"></script>

    <![endif]-->



</head>



<body>



    <div id=\"wrapper\">



        <!-- Navigation -->

        <nav class=\"navbar navbar-default navbar-static-top\" role=\"navigation\" style=\"margin-bottom: 0\">

            <div class=\"navbar-header\">

                <button type=\"button\" class=\"navbar-toggle\" data-toggle=\"collapse\" data-target=\".navbar-collapse\">

                    <span class=\"sr-only\">Toggle navigation</span>

                    <span class=\"icon-bar\"></span>

                    <span class=\"icon-bar\"></span>

                    <span class=\"icon-bar\"></span>

                </button>

                <a class=\"navbar-brand\" href=\"index.html\">Master POS</a>

            </div>

            <!-- /.navbar-header -->



            <ul class=\"nav navbar-top-links navbar-right\">

                <li class=\"dropdown\">

                     <a class=\"dropdown-toggle\" data-toggle=\"dropdown\" href=\"#\">

                       ";
        // line 117
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getContext($context, 'user'));
        foreach ($context['_seq'] as $context['_key'] => $context['user']) {
            // line 118
            echo "
                       ";
            // line 119
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, 'user'), "nombres", array(), "any", false), "html");
            echo "<i class=\"fa fa-user fa-fw\"></i> <i class=\"fa fa-caret-down\"></i>

                       ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['user'], $context['_parent'], $context['loop']);
        $context = array_merge($_parent, array_intersect_key($context, $_parent));
        // line 122
        echo "
                    </a>

                    <ul class=\"dropdown-menu dropdown-user\">

                        <li><a href=\"#\"><i class=\"fa fa-user fa-fw\"></i> User Profile</a>

                        </li>

                        <li><a href=\"#\"><i class=\"fa fa-gear fa-fw\"></i> Settings</a>

                        </li>

                        <li class=\"divider\"></li>

                        <li><a href=\"../../../login.php\"><i class=\"fa fa-sign-out fa-fw\"></i> Logout</a>

                        </li>

                    </ul>

                    <!-- /.dropdown-user -->

                </li>

                <!-- /.dropdown -->

            </ul>

            <!-- /.navbar-top-links -->



            <div class=\"navbar-default sidebar\" role=\"navigation\">

                <div class=\"sidebar-nav navbar-collapse\">

                    <ul class=\"nav\" id=\"side-menu\">

                        <li>

                            <a href=\"#\"><i class=\"fa fa-table fa-fw\"></i> Dashboard </a>

                        </li>

                        ";
        // line 168
        echo "
                        ";
        // line 169
        if (($this->getContext($context, 'rol') == 1)) {
            // line 170
            echo "                        ";
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable($this->getContext($context, 'tablas'));
            $context['_iterated'] = false;
            foreach ($context['_seq'] as $context['_key'] => $context['tabla']) {
                // line 171
                echo "
                                <li>
                                ";
                // line 173
                if (($this->getAttribute($this->getContext($context, 'tabla'), "idtabla", array(), "any", false) == 20)) {
                    // line 174
                    echo "                                <a href='";
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, 'tabla'), "tabla", array(), "any", false), "html");
                    echo "/modulo_mesas.php'><i class=\"fa fa-table fa-fw\"></i> ";
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, 'tabla'), "nombretabla", array(), "any", false), "html");
                    echo " </a>
                                ";
                } else {
                    // line 176
                    echo "                                <a href='";
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, 'tabla'), "tabla", array(), "any", false), "html");
                    echo "'><i class=\"fa fa-table fa-fw\"></i> ";
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, 'tabla'), "nombretabla", array(), "any", false), "html");
                    echo " </a>
                                ";
                }
                // line 178
                echo "                                </li>

                               
                        ";
                $context['_iterated'] = true;
            }
            if (!$context['_iterated']) {
                // line 182
                echo "
                                <li>
                                ";
                // line 184
                if (($this->getAttribute($this->getContext($context, 'tabla'), "idtabla", array(), "any", false) == 20)) {
                    // line 185
                    echo "                                <a href='";
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, 'tabla'), "tabla", array(), "any", false), "html");
                    echo "/modulo_mesas.php'><i class=\"fa fa-table fa-fw\"></i> ";
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, 'tabla'), "nombretabla", array(), "any", false), "html");
                    echo " </a>
                                ";
                } else {
                    // line 187
                    echo "                                <a href='";
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, 'tabla'), "tabla", array(), "any", false), "html");
                    echo "'><i class=\"fa fa-table fa-fw\"></i> ";
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, 'tabla'), "nombretabla", array(), "any", false), "html");
                    echo " </a>
                                ";
                }
                // line 189
                echo "                                </li>

                        ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['tabla'], $context['_parent'], $context['loop']);
            $context = array_merge($_parent, array_intersect_key($context, $_parent));
            // line 191
            echo " 

                         <li>
                            <a href=\"#\"><i class=\"fa fa-wrench fa-fw\"></i> Informes<span class=\"fa arrow\"></span></a>
                            <ul class=\"nav nav-second-level\">
                                <li>
                                    <a href=\"ventas_dia.php\">X Día</a>
                                </li>
                                <li>
                                    <a href=\"ventasReferencia.php\">X Artículo</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>  

                        ";
        } else {
            // line 207
            echo "
                        <li>
                                

                        <li>

                            <!--<a href='../controllers/articulo/'><i class=\"fa fa-table fa-fw\"></i> Articulos</a>
                             <a href='../controllers/persona/index.php'><i class=\"fa fa-table fa-fw\"></i> Personas</a>-->
                                                
                                <a href='../controllers/facturacion/modulo_mesas.php'><i class=\"fa fa-table fa-fw\"></i> Facturación</a>
                                <!--<a href='../mesas/'><i class=\"fa fa-table fa-fw\"></i> Mesas</a>-->
                               
                        </li>
                    
                        </li>

                        ";
        }
        // line 223
        echo "   


                        ";
        // line 226
        echo "                    

                         


                        <li>

                            <a href=\"../../login.php\"><i class=\"fa fa-dashboard fa-fw\"></i> Cerrar sesión</a>

                        </li>

                   </ul>

                </div>

                <!-- /.sidebar-collapse -->

            </div>

            <!-- /.navbar-static-side -->

        </nav>



        <div id=\"page-wrapper\">

            <div class=\"row\" class=\"page-header\">

             

                <!--<div class=\"col-lg-8 col-md-8\">

                    <h1 >@yield('titulo','Dashboard') </h1>

                </div>-->

                <div class=\"col-lg-4 col-md-4\">

                    

                </div>

            </div>



            <div class=\"row\">



            </div>

        </div>



    </div>

    <!-- /#wrapper -->



    <!-- jQuery -->

    <script src=\"../../bower_components/jquery/dist/jquery.min.js\"></script>



    <!-- Bootstrap Core JavaScript -->

    <script src=\"../../bower_components/bootstrap/dist/js/bootstrap.min.js\"></script>



    <!-- Metis Menu Plugin JavaScript -->

    <script src=\"../../bower_components/metisMenu/dist/metisMenu.min.js\"></script>



    <!-- Morris Charts JavaScript -->

    <script src=\"../../bower_components/raphael/raphael-min.js\"></script>

    <script src=\"../../bower_components/morrisjs/morris.min.js\"></script>

    <script src=\"../../js/morris-data.js\"></script>



    <!-- Custom Theme JavaScript -->

    <script src=\"../../dist/js/sb-admin-2.js\"></script>



</body>



</html>

";
    }

    public function getTemplateName()
    {
        return "layout_principal.twig.php";
    }

    public function isTraitable()
    {
        return false;
    }
}
