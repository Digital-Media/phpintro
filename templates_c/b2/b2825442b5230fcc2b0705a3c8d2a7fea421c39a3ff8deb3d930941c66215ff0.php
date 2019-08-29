<?php

/* navigation.html.twig */
class __TwigTemplate_bbb0dc0b464263ad6583891f3e4ec80cedecda82ecf496b1e8e69764f1281c5d extends Twig_Template
{
    private $source;

    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = array(
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<!-- Styles not needed for NormFormDemo, therefore not in css. So its easier to reuse NormFormDemo -->
<style type=\"text/css\">
        .Navigation {
            text-align: left;
        }
</style>
<div class=\"Header Navigation\">
    <nav class=\"Container\">
        <span class=\"u-spaceRS\" > ";
        // line 9
        if ( !(twig_get_attribute($this->env, $this->source, ($context["_server"] ?? null), "SCRIPT_NAME", array()) === "/code/phpintro/htdocs/register.php")) {
            echo " <a href=\"register.php\">Register</a> ";
        }
        echo " </span>
        <span class=\"u-spaceRS\" > ";
        // line 10
        if ( !(twig_get_attribute($this->env, $this->source, ($context["_server"] ?? null), "SCRIPT_NAME", array()) === "/code/phpintro/htdocs/imprint.php")) {
            echo " <a href=\"imprint.php\">Imprint</a> ";
        }
        echo " </span>
        <span class=\"u-spaceRS\" > ";
        // line 11
        if ( !(twig_get_attribute($this->env, $this->source, ($context["_server"] ?? null), "SCRIPT_NAME", array()) === "/code/phpintro/htdocs/contact.php")) {
            echo " <a href=\"contact.php\">Contact</a> ";
        }
        echo " </span>
        <span class=\"u-spaceRS\" > ";
        // line 12
        if ( !(twig_get_attribute($this->env, $this->source, ($context["_server"] ?? null), "SCRIPT_NAME", array()) === "/code/phpintro/htdocs/fademo.php")) {
            echo " <a href=\"fademo.php\">File Access Demo</a> ";
        }
        echo " </span>
        <span class=\"u-spaceRS\" > ";
        // line 13
        if ( !(twig_get_attribute($this->env, $this->source, ($context["_server"] ?? null), "SCRIPT_NAME", array()) === "/code/phpintro/htdocs/normFormDemoCSS.php")) {
            echo " <a href=\"normFormDemoCSS.php\">Normform Demo with CSS</a> ";
        }
        echo " </span>
        <span class=\"u-spaceRS\" > ";
        // line 14
        if ( !(twig_get_attribute($this->env, $this->source, ($context["_server"] ?? null), "SCRIPT_NAME", array()) === "/code/phpintro/htdocs/normFormDemoNoCSS.php")) {
            echo " <a href=\"normFormDemoNoCSS.php\">NormForm Demo No CSS</a> ";
        }
        echo " </span>
    </nav>
</div>
";
    }

    public function getTemplateName()
    {
        return "navigation.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  63 => 14,  57 => 13,  51 => 12,  45 => 11,  39 => 10,  33 => 9,  23 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "navigation.html.twig", "/home/p20137/public_html/phpintro/templates/navigation.html.twig");
    }
}
