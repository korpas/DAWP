<?php

/* :products:insert.html.twig */
class __TwigTemplate_71ba2675956592f2114723cc86f70175dc4c57c0e1d98d15780216305d0ac1d2 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("::base.html.twig", ":products:insert.html.twig", 1);
        $this->blocks = array(
            'body' => array($this, 'block_body'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "::base.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $__internal_1d0d99a3111976599c0c44db2de07c4743bf7d515b6a1c035dd5af604ca6f099 = $this->env->getExtension("native_profiler");
        $__internal_1d0d99a3111976599c0c44db2de07c4743bf7d515b6a1c035dd5af604ca6f099->enter($__internal_1d0d99a3111976599c0c44db2de07c4743bf7d515b6a1c035dd5af604ca6f099_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", ":products:insert.html.twig"));

        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_1d0d99a3111976599c0c44db2de07c4743bf7d515b6a1c035dd5af604ca6f099->leave($__internal_1d0d99a3111976599c0c44db2de07c4743bf7d515b6a1c035dd5af604ca6f099_prof);

    }

    // line 3
    public function block_body($context, array $blocks = array())
    {
        $__internal_48e0b03d85fe8ce33671c043ac998cb5e8d3421e23d0a650f866088243f91558 = $this->env->getExtension("native_profiler");
        $__internal_48e0b03d85fe8ce33671c043ac998cb5e8d3421e23d0a650f866088243f91558->enter($__internal_48e0b03d85fe8ce33671c043ac998cb5e8d3421e23d0a650f866088243f91558_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "body"));

        // line 4
        echo "    <div>
        ";
        // line 5
        echo         $this->env->getExtension('form')->renderer->renderBlock((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), 'form_start');
        echo "
        ";
        // line 6
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), 'widget');
        echo "
        ";
        // line 7
        echo         $this->env->getExtension('form')->renderer->renderBlock((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), 'form_end');
        echo "
    </div>
";
        
        $__internal_48e0b03d85fe8ce33671c043ac998cb5e8d3421e23d0a650f866088243f91558->leave($__internal_48e0b03d85fe8ce33671c043ac998cb5e8d3421e23d0a650f866088243f91558_prof);

    }

    public function getTemplateName()
    {
        return ":products:insert.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  51 => 7,  47 => 6,  43 => 5,  40 => 4,  34 => 3,  11 => 1,);
    }
}
/* {% extends '::base.html.twig' %}*/
/* */
/* {% block body %}*/
/*     <div>*/
/*         {{ form_start(form) }}*/
/*         {{ form_widget(form) }}*/
/*         {{ form_end(form) }}*/
/*     </div>*/
/* {% endblock %}*/
