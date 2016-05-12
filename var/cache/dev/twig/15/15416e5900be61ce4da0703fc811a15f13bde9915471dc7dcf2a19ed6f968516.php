<?php

/* @WebProfiler/Profiler/header.html.twig */
class __TwigTemplate_4a14d1693445dfebab4564544b6975b811fbcf35d2bf473a8caac97b9f54817c extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $__internal_7e573cb6a52b0d47323aa753ef540cf1046c2afdb5d6de5c0040ad8df6dc3a1f = $this->env->getExtension("native_profiler");
        $__internal_7e573cb6a52b0d47323aa753ef540cf1046c2afdb5d6de5c0040ad8df6dc3a1f->enter($__internal_7e573cb6a52b0d47323aa753ef540cf1046c2afdb5d6de5c0040ad8df6dc3a1f_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "@WebProfiler/Profiler/header.html.twig"));

        // line 1
        echo "<div id=\"header\">
    <div class=\"container\">
        <h1>";
        // line 3
        echo twig_include($this->env, $context, "@WebProfiler/Icon/symfony.svg");
        echo " Symfony <span>Profiler</span></h1>

        <div class=\"search\">
            <form method=\"get\" action=\"https://symfony.com/search\" target=\"_blank\">
                <div class=\"form-row\">
                    <input name=\"q\" id=\"search-id\" type=\"search\" placeholder=\"search on symfony.com\">
                    <button type=\"submit\" class=\"btn\">Search</button>
                </div>
           </form>
        </div>
    </div>
</div>
";
        
        $__internal_7e573cb6a52b0d47323aa753ef540cf1046c2afdb5d6de5c0040ad8df6dc3a1f->leave($__internal_7e573cb6a52b0d47323aa753ef540cf1046c2afdb5d6de5c0040ad8df6dc3a1f_prof);

    }

    public function getTemplateName()
    {
        return "@WebProfiler/Profiler/header.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  26 => 3,  22 => 1,);
    }
}
/* <div id="header">*/
/*     <div class="container">*/
/*         <h1>{{ include('@WebProfiler/Icon/symfony.svg') }} Symfony <span>Profiler</span></h1>*/
/* */
/*         <div class="search">*/
/*             <form method="get" action="https://symfony.com/search" target="_blank">*/
/*                 <div class="form-row">*/
/*                     <input name="q" id="search-id" type="search" placeholder="search on symfony.com">*/
/*                     <button type="submit" class="btn">Search</button>*/
/*                 </div>*/
/*            </form>*/
/*         </div>*/
/*     </div>*/
/* </div>*/
/* */
