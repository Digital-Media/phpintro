<?php

/* statusMessage.html.twig */
class __TwigTemplate_25f5ff12e76d8c5248e0d61119ca3d67e148968bb486bd56c2f32e7e6cf0ed1f extends Twig_Template
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
        if ((array_key_exists("statusMessage", $context) && (twig_length_filter($this->env, ($context["statusMessage"] ?? null)) != 0))) {
            // line 2
            echo "    <div class=\"Status\">
        <p class=\"Status-message\"><i class=\"fas fa-check\"></i>";
            // line 3
            echo twig_escape_filter($this->env, ($context["statusMessage"] ?? null), "html", null, true);
            echo "</p>
    </div>
";
        }
        // line 6
        echo "
";
    }

    public function getTemplateName()
    {
        return "statusMessage.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  34 => 6,  28 => 3,  25 => 2,  23 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "statusMessage.html.twig", "/home/p20137/public_html/phpintro/templates/statusMessage.html.twig");
    }
}
