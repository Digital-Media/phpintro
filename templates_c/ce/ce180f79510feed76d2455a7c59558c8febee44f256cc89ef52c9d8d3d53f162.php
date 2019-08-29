<?php

/* header.html.twig */
class __TwigTemplate_4022b141ecdbda630350dfdfaec04bbf5f1d1743dd34db3f188f558a4253f7b3 extends Twig_Template
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
        echo "<!DOCTYPE html>
<html lang=\"en\">
<head>
    <meta charset=\"UTF-8\">
    <title>PHPUE &mdash;Introduction to PHP</title>
    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">
    <link rel=\"stylesheet\" href=\"https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,300,700\">
    <link rel=\"stylesheet\" href=\"https://use.fontawesome.com/releases/v5.0.10/css/all.css\"
          integrity=\"sha384-+d0P83n9kaQMCwj8F4RJB66tzIwOKmrdb46+porD/OvrJ+37WqIM7UoBtwHO6Nlg\" crossorigin=\"anonymous\">
    <link rel=\"stylesheet\" href=\"css/main.css\">
</head>
<body class=\"Site\">
<header class=\"Site-header\">
    <div class=\"Header Header--small\">
        <div class=\"Header-titles\">
            <h1 class=\"Header-title\">PHPIntro</h1>
            <p class=\"Header-subtitle\">Introduction to PHP</p>
        </div>
        ";
        // line 19
        if (twig_get_attribute($this->env, $this->source, ($context["_session"] ?? null), "isloggedin", array(), "any", true, true)) {
            // line 20
            echo "                <div class=\"Header-logout\">
                     You are logged in as  ";
            // line 21
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["_session"] ?? null), "username", array()), "html", null, true);
            echo " <a href=\"logout.php\" class=\"Button u-spaceLM\">Logout</a>
                </div>
        ";
        }
        // line 24
        echo "    </div>
</header>";
    }

    public function getTemplateName()
    {
        return "header.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  54 => 24,  48 => 21,  45 => 20,  43 => 19,  23 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "header.html.twig", "/home/p20137/public_html/phpintro/templates/header.html.twig");
    }
}
