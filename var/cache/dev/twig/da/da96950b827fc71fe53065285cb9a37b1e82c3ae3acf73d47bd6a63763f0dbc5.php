<?php

/* VichUploaderBundle:Form:fields.html.twig */
class __TwigTemplate_533751fa2757b6c09c80cfbe6c0655a3350c49dd94fd540fc96b0c9d8e8a7127 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'vich_file_row' => array($this, 'block_vich_file_row'),
            'vich_file_widget' => array($this, 'block_vich_file_widget'),
            'vich_image_row' => array($this, 'block_vich_image_row'),
            'vich_image_widget' => array($this, 'block_vich_image_widget'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $__internal_ea6ea3d064c533705455ed39e96ead5f184589a1f63f780595e9d43d2f314b4e = $this->env->getExtension("native_profiler");
        $__internal_ea6ea3d064c533705455ed39e96ead5f184589a1f63f780595e9d43d2f314b4e->enter($__internal_ea6ea3d064c533705455ed39e96ead5f184589a1f63f780595e9d43d2f314b4e_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "VichUploaderBundle:Form:fields.html.twig"));

        // line 1
        $this->displayBlock('vich_file_row', $context, $blocks);
        // line 5
        echo "
";
        // line 6
        $this->displayBlock('vich_file_widget', $context, $blocks);
        // line 20
        echo "
";
        // line 21
        $this->displayBlock('vich_image_row', $context, $blocks);
        // line 25
        echo "
";
        // line 26
        $this->displayBlock('vich_image_widget', $context, $blocks);
        
        $__internal_ea6ea3d064c533705455ed39e96ead5f184589a1f63f780595e9d43d2f314b4e->leave($__internal_ea6ea3d064c533705455ed39e96ead5f184589a1f63f780595e9d43d2f314b4e_prof);

    }

    // line 1
    public function block_vich_file_row($context, array $blocks = array())
    {
        $__internal_e673e59c935180999c1f5e37860eca624063b886ba48b6fbc9cf1036e3f7e2aa = $this->env->getExtension("native_profiler");
        $__internal_e673e59c935180999c1f5e37860eca624063b886ba48b6fbc9cf1036e3f7e2aa->enter($__internal_e673e59c935180999c1f5e37860eca624063b886ba48b6fbc9cf1036e3f7e2aa_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "vich_file_row"));

        // line 2
        $context["force_error"] = true;
        // line 3
        $this->displayBlock("form_row", $context, $blocks);
        
        $__internal_e673e59c935180999c1f5e37860eca624063b886ba48b6fbc9cf1036e3f7e2aa->leave($__internal_e673e59c935180999c1f5e37860eca624063b886ba48b6fbc9cf1036e3f7e2aa_prof);

    }

    // line 6
    public function block_vich_file_widget($context, array $blocks = array())
    {
        $__internal_a7cae4e2efe2a111f402eb5fbacf728277857b1aa631cac9fc0b150e40a314d7 = $this->env->getExtension("native_profiler");
        $__internal_a7cae4e2efe2a111f402eb5fbacf728277857b1aa631cac9fc0b150e40a314d7->enter($__internal_a7cae4e2efe2a111f402eb5fbacf728277857b1aa631cac9fc0b150e40a314d7_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "vich_file_widget"));

        // line 7
        ob_start();
        // line 8
        echo "    <div class=\"vich-file\">
        ";
        // line 9
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "file", array()), 'widget');
        echo "
        ";
        // line 10
        if ($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "delete", array(), "any", true, true)) {
            // line 11
            echo "        ";
            echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "delete", array()), 'row');
            echo "
        ";
        }
        // line 13
        echo "
        ";
        // line 14
        if ((array_key_exists("download_uri", $context) && (isset($context["download_uri"]) ? $context["download_uri"] : $this->getContext($context, "download_uri")))) {
            // line 15
            echo "        <a href=\"";
            echo twig_escape_filter($this->env, (isset($context["download_uri"]) ? $context["download_uri"] : $this->getContext($context, "download_uri")), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("download", array(), "VichUploaderBundle"), "html", null, true);
            echo "</a>
        ";
        }
        // line 17
        echo "    </div>
";
        echo trim(preg_replace('/>\s+</', '><', ob_get_clean()));
        
        $__internal_a7cae4e2efe2a111f402eb5fbacf728277857b1aa631cac9fc0b150e40a314d7->leave($__internal_a7cae4e2efe2a111f402eb5fbacf728277857b1aa631cac9fc0b150e40a314d7_prof);

    }

    // line 21
    public function block_vich_image_row($context, array $blocks = array())
    {
        $__internal_6978d18d9411e97c6f182a76b7fd44bf3dea79eef152deb9eea0bdec0aedbacb = $this->env->getExtension("native_profiler");
        $__internal_6978d18d9411e97c6f182a76b7fd44bf3dea79eef152deb9eea0bdec0aedbacb->enter($__internal_6978d18d9411e97c6f182a76b7fd44bf3dea79eef152deb9eea0bdec0aedbacb_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "vich_image_row"));

        // line 22
        $context["force_error"] = true;
        // line 23
        $this->displayBlock("form_row", $context, $blocks);
        
        $__internal_6978d18d9411e97c6f182a76b7fd44bf3dea79eef152deb9eea0bdec0aedbacb->leave($__internal_6978d18d9411e97c6f182a76b7fd44bf3dea79eef152deb9eea0bdec0aedbacb_prof);

    }

    // line 26
    public function block_vich_image_widget($context, array $blocks = array())
    {
        $__internal_71d4a371e17c9d5038587dbf65bb86e30ed618df8876ed0c965997b410e16eb9 = $this->env->getExtension("native_profiler");
        $__internal_71d4a371e17c9d5038587dbf65bb86e30ed618df8876ed0c965997b410e16eb9->enter($__internal_71d4a371e17c9d5038587dbf65bb86e30ed618df8876ed0c965997b410e16eb9_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "vich_image_widget"));

        // line 27
        ob_start();
        // line 28
        echo "    <div class=\"vich-image\">
        ";
        // line 29
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "file", array()), 'widget');
        echo "
        ";
        // line 30
        if ($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "delete", array(), "any", true, true)) {
            // line 31
            echo "        ";
            echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "delete", array()), 'row');
            echo "
        ";
        }
        // line 33
        echo "
        ";
        // line 34
        if ((array_key_exists("download_uri", $context) && (isset($context["download_uri"]) ? $context["download_uri"] : $this->getContext($context, "download_uri")))) {
            // line 35
            echo "         <a href=\"";
            echo twig_escape_filter($this->env, (isset($context["download_uri"]) ? $context["download_uri"] : $this->getContext($context, "download_uri")), "html", null, true);
            echo "\"><img src=\"";
            echo twig_escape_filter($this->env, (isset($context["download_uri"]) ? $context["download_uri"] : $this->getContext($context, "download_uri")), "html", null, true);
            echo "\" alt=\"\" /></a>
        ";
        }
        // line 37
        echo "        ";
        if ((((isset($context["show_download_link"]) ? $context["show_download_link"] : $this->getContext($context, "show_download_link")) && array_key_exists("download_uri", $context)) && (isset($context["download_uri"]) ? $context["download_uri"] : $this->getContext($context, "download_uri")))) {
            // line 38
            echo "        <a href=\"";
            echo twig_escape_filter($this->env, (isset($context["download_uri"]) ? $context["download_uri"] : $this->getContext($context, "download_uri")), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("download", array(), "VichUploaderBundle"), "html", null, true);
            echo "</a>
        ";
        }
        // line 40
        echo "    </div>
";
        echo trim(preg_replace('/>\s+</', '><', ob_get_clean()));
        
        $__internal_71d4a371e17c9d5038587dbf65bb86e30ed618df8876ed0c965997b410e16eb9->leave($__internal_71d4a371e17c9d5038587dbf65bb86e30ed618df8876ed0c965997b410e16eb9_prof);

    }

    public function getTemplateName()
    {
        return "VichUploaderBundle:Form:fields.html.twig";
    }

    public function getDebugInfo()
    {
        return array (  170 => 40,  162 => 38,  159 => 37,  151 => 35,  149 => 34,  146 => 33,  140 => 31,  138 => 30,  134 => 29,  131 => 28,  129 => 27,  123 => 26,  116 => 23,  114 => 22,  108 => 21,  99 => 17,  91 => 15,  89 => 14,  86 => 13,  80 => 11,  78 => 10,  74 => 9,  71 => 8,  69 => 7,  63 => 6,  56 => 3,  54 => 2,  48 => 1,  41 => 26,  38 => 25,  36 => 21,  33 => 20,  31 => 6,  28 => 5,  26 => 1,);
    }
}
/* {% block vich_file_row -%}*/
/*     {% set force_error = true %}*/
/*     {{- block('form_row') }}*/
/* {%- endblock %}*/
/* */
/* {% block vich_file_widget %}*/
/* {% spaceless %}*/
/*     <div class="vich-file">*/
/*         {{ form_widget(form.file) }}*/
/*         {% if form.delete is defined %}*/
/*         {{ form_row(form.delete) }}*/
/*         {% endif %}*/
/* */
/*         {% if download_uri is defined and download_uri %}*/
/*         <a href="{{ download_uri }}">{{ 'download'|trans({}, 'VichUploaderBundle') }}</a>*/
/*         {% endif %}*/
/*     </div>*/
/* {% endspaceless %}*/
/* {% endblock %}*/
/* */
/* {% block vich_image_row -%}*/
/*     {% set force_error = true %}*/
/*     {{- block('form_row') }}*/
/* {%- endblock %}*/
/* */
/* {% block vich_image_widget %}*/
/* {% spaceless %}*/
/*     <div class="vich-image">*/
/*         {{ form_widget(form.file) }}*/
/*         {% if form.delete is defined %}*/
/*         {{ form_row(form.delete) }}*/
/*         {% endif %}*/
/* */
/*         {% if download_uri is defined and download_uri %}*/
/*          <a href="{{ download_uri }}"><img src="{{ download_uri }}" alt="" /></a>*/
/*         {% endif %}*/
/*         {% if show_download_link and download_uri is defined and download_uri%}*/
/*         <a href="{{ download_uri }}">{{ 'download'|trans({}, 'VichUploaderBundle') }}</a>*/
/*         {% endif %}*/
/*     </div>*/
/* {% endspaceless %}*/
/* {% endblock %}*/
/* */
