<?php

/* :products:index.html.twig */
class __TwigTemplate_127f59432cc161cc1e1a817536bcabce35b886b049f2929bb1b5e4515f87ede8 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("::base.html.twig", ":products:index.html.twig", 1);
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
        $__internal_64824ad696dc6add67db27a2d7ea8483a725bede8575252d4f6202fef41f787f = $this->env->getExtension("native_profiler");
        $__internal_64824ad696dc6add67db27a2d7ea8483a725bede8575252d4f6202fef41f787f->enter($__internal_64824ad696dc6add67db27a2d7ea8483a725bede8575252d4f6202fef41f787f_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", ":products:index.html.twig"));

        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_64824ad696dc6add67db27a2d7ea8483a725bede8575252d4f6202fef41f787f->leave($__internal_64824ad696dc6add67db27a2d7ea8483a725bede8575252d4f6202fef41f787f_prof);

    }

    // line 3
    public function block_body($context, array $blocks = array())
    {
        $__internal_87d61b42ae3ed1d97c0122edbe26cdde2e2dbea263c7401c494655df99a81235 = $this->env->getExtension("native_profiler");
        $__internal_87d61b42ae3ed1d97c0122edbe26cdde2e2dbea263c7401c494655df99a81235->enter($__internal_87d61b42ae3ed1d97c0122edbe26cdde2e2dbea263c7401c494655df99a81235_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "body"));

        // line 4
        echo "    <h1>PRODUCTOS</h1>
    <ul>
        <li><a href=\"";
        // line 6
        echo $this->env->getExtension('routing')->getPath("app_products_insert");
        echo "\">Insertar Producto</a>   </li>
    </ul>
";
        
        $__internal_87d61b42ae3ed1d97c0122edbe26cdde2e2dbea263c7401c494655df99a81235->leave($__internal_87d61b42ae3ed1d97c0122edbe26cdde2e2dbea263c7401c494655df99a81235_prof);

    }

    public function getTemplateName()
    {
        return ":products:index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  44 => 6,  40 => 4,  34 => 3,  11 => 1,);
    }
}
/* {% extends '::base.html.twig' %}*/
/* */
/* {% block body %}*/
/*     <h1>PRODUCTOS</h1>*/
/*     <ul>*/
/*         <li><a href="{{ path('app_products_insert') }}">Insertar Producto</a>   </li>*/
/*     </ul>*/
/* {% endblock %}*/
