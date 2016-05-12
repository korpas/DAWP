<?php

/* FOSUserBundle::layout.html.twig */
class __TwigTemplate_c18e989e0c5541578801c08a78670944208fec73cf76b058f22870c4c552dcd8 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("::base.html.twig", "FOSUserBundle::layout.html.twig", 1);
        $this->blocks = array(
            'body' => array($this, 'block_body'),
            'fos_user_content' => array($this, 'block_fos_user_content'),
            'sidebar' => array($this, 'block_sidebar'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "::base.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $__internal_7e6d68e76c98b92b630a73c8e24f0160ec0aa44b7adc828006cdfa6c11518993 = $this->env->getExtension("native_profiler");
        $__internal_7e6d68e76c98b92b630a73c8e24f0160ec0aa44b7adc828006cdfa6c11518993->enter($__internal_7e6d68e76c98b92b630a73c8e24f0160ec0aa44b7adc828006cdfa6c11518993_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "FOSUserBundle::layout.html.twig"));

        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_7e6d68e76c98b92b630a73c8e24f0160ec0aa44b7adc828006cdfa6c11518993->leave($__internal_7e6d68e76c98b92b630a73c8e24f0160ec0aa44b7adc828006cdfa6c11518993_prof);

    }

    // line 3
    public function block_body($context, array $blocks = array())
    {
        $__internal_6442fe67336fffed7de0229eacb54d3caf5e4764d54732339a89f1450a438bb3 = $this->env->getExtension("native_profiler");
        $__internal_6442fe67336fffed7de0229eacb54d3caf5e4764d54732339a89f1450a438bb3->enter($__internal_6442fe67336fffed7de0229eacb54d3caf5e4764d54732339a89f1450a438bb3_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "body"));

        // line 4
        echo "    ";
        if ($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "request", array()), "hasPreviousSession", array())) {
            // line 5
            echo "        ";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "session", array()), "flashbag", array()), "all", array(), "method"));
            foreach ($context['_seq'] as $context["type"] => $context["messages"]) {
                // line 6
                echo "            ";
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable($context["messages"]);
                foreach ($context['_seq'] as $context["_key"] => $context["message"]) {
                    // line 7
                    echo "                <div class=\"flash-";
                    echo twig_escape_filter($this->env, $context["type"], "html", null, true);
                    echo "\">
                    ";
                    // line 8
                    echo twig_escape_filter($this->env, $context["message"], "html", null, true);
                    echo "
                </div>
            ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['message'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 11
                echo "        ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['type'], $context['messages'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 12
            echo "    ";
        }
        // line 13
        echo "
    <div class=\"container\">
        <div class=\"row\">
            <div class=\"col-md-8\">
                ";
        // line 17
        $this->displayBlock('fos_user_content', $context, $blocks);
        // line 19
        echo "            </div>
        </div>
    </div>
";
        
        $__internal_6442fe67336fffed7de0229eacb54d3caf5e4764d54732339a89f1450a438bb3->leave($__internal_6442fe67336fffed7de0229eacb54d3caf5e4764d54732339a89f1450a438bb3_prof);

    }

    // line 17
    public function block_fos_user_content($context, array $blocks = array())
    {
        $__internal_fdd37b40f442056bfd65025e213128840ce7b5ae61a8761a5c434eb25f5b3e8b = $this->env->getExtension("native_profiler");
        $__internal_fdd37b40f442056bfd65025e213128840ce7b5ae61a8761a5c434eb25f5b3e8b->enter($__internal_fdd37b40f442056bfd65025e213128840ce7b5ae61a8761a5c434eb25f5b3e8b_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "fos_user_content"));

        // line 18
        echo "                ";
        
        $__internal_fdd37b40f442056bfd65025e213128840ce7b5ae61a8761a5c434eb25f5b3e8b->leave($__internal_fdd37b40f442056bfd65025e213128840ce7b5ae61a8761a5c434eb25f5b3e8b_prof);

    }

    // line 24
    public function block_sidebar($context, array $blocks = array())
    {
        $__internal_c1325a3191ceb51ca01589931a16e6ce2334da868163a85e446d0be59ac5feed = $this->env->getExtension("native_profiler");
        $__internal_c1325a3191ceb51ca01589931a16e6ce2334da868163a85e446d0be59ac5feed->enter($__internal_c1325a3191ceb51ca01589931a16e6ce2334da868163a85e446d0be59ac5feed_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "sidebar"));

        
        $__internal_c1325a3191ceb51ca01589931a16e6ce2334da868163a85e446d0be59ac5feed->leave($__internal_c1325a3191ceb51ca01589931a16e6ce2334da868163a85e446d0be59ac5feed_prof);

    }

    public function getTemplateName()
    {
        return "FOSUserBundle::layout.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  109 => 24,  102 => 18,  96 => 17,  86 => 19,  84 => 17,  78 => 13,  75 => 12,  69 => 11,  60 => 8,  55 => 7,  50 => 6,  45 => 5,  42 => 4,  36 => 3,  11 => 1,);
    }
}
/* {% extends '::base.html.twig' %}*/
/* */
/* {% block body %}*/
/*     {% if app.request.hasPreviousSession %}*/
/*         {% for type, messages in app.session.flashbag.all() %}*/
/*             {% for message in messages %}*/
/*                 <div class="flash-{{ type }}">*/
/*                     {{ message }}*/
/*                 </div>*/
/*             {% endfor %}*/
/*         {% endfor %}*/
/*     {% endif %}*/
/* */
/*     <div class="container">*/
/*         <div class="row">*/
/*             <div class="col-md-8">*/
/*                 {% block fos_user_content %}*/
/*                 {% endblock fos_user_content %}*/
/*             </div>*/
/*         </div>*/
/*     </div>*/
/* {% endblock %}*/
/* */
/* {% block sidebar %}{% endblock %}*/
