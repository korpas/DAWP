<?php

/* :category:insert.html.twig */
class __TwigTemplate_9f50ef34466be503b615952c77b1f286f996aa8e70799d00a4471e40eb8929dc extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("::base.html.twig", ":category:insert.html.twig", 1);
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
        $__internal_d5027e9fb9c278336929a8f528893d6330f2c8c8bc09342ea96397042123537a = $this->env->getExtension("native_profiler");
        $__internal_d5027e9fb9c278336929a8f528893d6330f2c8c8bc09342ea96397042123537a->enter($__internal_d5027e9fb9c278336929a8f528893d6330f2c8c8bc09342ea96397042123537a_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", ":category:insert.html.twig"));

        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_d5027e9fb9c278336929a8f528893d6330f2c8c8bc09342ea96397042123537a->leave($__internal_d5027e9fb9c278336929a8f528893d6330f2c8c8bc09342ea96397042123537a_prof);

    }

    // line 3
    public function block_body($context, array $blocks = array())
    {
        $__internal_a633d3f69384095a9c4e37c0d0db017ecf1dee63f11e3ab091cf70c1a567e26b = $this->env->getExtension("native_profiler");
        $__internal_a633d3f69384095a9c4e37c0d0db017ecf1dee63f11e3ab091cf70c1a567e26b->enter($__internal_a633d3f69384095a9c4e37c0d0db017ecf1dee63f11e3ab091cf70c1a567e26b_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "body"));

        // line 4
        echo "<div>
    ";
        // line 5
        echo         $this->env->getExtension('form')->renderer->renderBlock((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), 'form_start', array("attr" => array("class" => "my-form-class")));
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
        
        $__internal_a633d3f69384095a9c4e37c0d0db017ecf1dee63f11e3ab091cf70c1a567e26b->leave($__internal_a633d3f69384095a9c4e37c0d0db017ecf1dee63f11e3ab091cf70c1a567e26b_prof);

    }

    public function getTemplateName()
    {
        return ":category:insert.html.twig";
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
/* <div>*/
/*     {{ form_start(form, {'attr': {'class': 'my-form-class'} }) }}*/
/*     {{ form_widget(form) }}*/
/*     {{ form_end(form) }}*/
/* </div>*/
/* {% endblock %}*/
