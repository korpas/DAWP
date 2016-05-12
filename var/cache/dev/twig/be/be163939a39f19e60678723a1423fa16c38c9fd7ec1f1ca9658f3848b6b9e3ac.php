<?php

/* @WebProfiler/Collector/router.html.twig */
class __TwigTemplate_fe9cd119c1625e8ea6b8d25161ece526798ac3d37c628553b60c19cc33d6bdb0 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("@WebProfiler/Profiler/layout.html.twig", "@WebProfiler/Collector/router.html.twig", 1);
        $this->blocks = array(
            'toolbar' => array($this, 'block_toolbar'),
            'menu' => array($this, 'block_menu'),
            'panel' => array($this, 'block_panel'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "@WebProfiler/Profiler/layout.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $__internal_ad25e4e5eafd254cff25884da664d5e14c06f39af01088198355246a6a46a6d3 = $this->env->getExtension("native_profiler");
        $__internal_ad25e4e5eafd254cff25884da664d5e14c06f39af01088198355246a6a46a6d3->enter($__internal_ad25e4e5eafd254cff25884da664d5e14c06f39af01088198355246a6a46a6d3_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "@WebProfiler/Collector/router.html.twig"));

        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_ad25e4e5eafd254cff25884da664d5e14c06f39af01088198355246a6a46a6d3->leave($__internal_ad25e4e5eafd254cff25884da664d5e14c06f39af01088198355246a6a46a6d3_prof);

    }

    // line 3
    public function block_toolbar($context, array $blocks = array())
    {
        $__internal_0148d9c219bfeffa7d3838adea3e14065337864f764810e83c00b90fe3c20ebf = $this->env->getExtension("native_profiler");
        $__internal_0148d9c219bfeffa7d3838adea3e14065337864f764810e83c00b90fe3c20ebf->enter($__internal_0148d9c219bfeffa7d3838adea3e14065337864f764810e83c00b90fe3c20ebf_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "toolbar"));

        
        $__internal_0148d9c219bfeffa7d3838adea3e14065337864f764810e83c00b90fe3c20ebf->leave($__internal_0148d9c219bfeffa7d3838adea3e14065337864f764810e83c00b90fe3c20ebf_prof);

    }

    // line 5
    public function block_menu($context, array $blocks = array())
    {
        $__internal_323331ecca09504ecd56ad5fe29ea7596875c975eed6dd1bd1f2e66c71bd3cbf = $this->env->getExtension("native_profiler");
        $__internal_323331ecca09504ecd56ad5fe29ea7596875c975eed6dd1bd1f2e66c71bd3cbf->enter($__internal_323331ecca09504ecd56ad5fe29ea7596875c975eed6dd1bd1f2e66c71bd3cbf_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "menu"));

        // line 6
        echo "<span class=\"label\">
    <span class=\"icon\">";
        // line 7
        echo twig_include($this->env, $context, "@WebProfiler/Icon/router.svg");
        echo "</span>
    <strong>Routing</strong>
</span>
";
        
        $__internal_323331ecca09504ecd56ad5fe29ea7596875c975eed6dd1bd1f2e66c71bd3cbf->leave($__internal_323331ecca09504ecd56ad5fe29ea7596875c975eed6dd1bd1f2e66c71bd3cbf_prof);

    }

    // line 12
    public function block_panel($context, array $blocks = array())
    {
        $__internal_d99ec94f4dbdd37ce25a144414faeab87ace37fbedc4c140830324ade0b7e08f = $this->env->getExtension("native_profiler");
        $__internal_d99ec94f4dbdd37ce25a144414faeab87ace37fbedc4c140830324ade0b7e08f->enter($__internal_d99ec94f4dbdd37ce25a144414faeab87ace37fbedc4c140830324ade0b7e08f_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "panel"));

        // line 13
        echo "    ";
        echo $this->env->getExtension('http_kernel')->renderFragment($this->env->getExtension('routing')->getPath("_profiler_router", array("token" => (isset($context["token"]) ? $context["token"] : $this->getContext($context, "token")))));
        echo "
";
        
        $__internal_d99ec94f4dbdd37ce25a144414faeab87ace37fbedc4c140830324ade0b7e08f->leave($__internal_d99ec94f4dbdd37ce25a144414faeab87ace37fbedc4c140830324ade0b7e08f_prof);

    }

    public function getTemplateName()
    {
        return "@WebProfiler/Collector/router.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  73 => 13,  67 => 12,  56 => 7,  53 => 6,  47 => 5,  36 => 3,  11 => 1,);
    }
}
/* {% extends '@WebProfiler/Profiler/layout.html.twig' %}*/
/* */
/* {% block toolbar %}{% endblock %}*/
/* */
/* {% block menu %}*/
/* <span class="label">*/
/*     <span class="icon">{{ include('@WebProfiler/Icon/router.svg') }}</span>*/
/*     <strong>Routing</strong>*/
/* </span>*/
/* {% endblock %}*/
/* */
/* {% block panel %}*/
/*     {{ render(path('_profiler_router', { token: token })) }}*/
/* {% endblock %}*/
/* */
