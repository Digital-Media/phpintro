<?php

/* registerMain.html.twig */
class __TwigTemplate_7a70b4e3dff97eed4da803bf4e351125682d3d28a4b38c535987f03646388c51 extends Twig_Template
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
        $this->loadTemplate("header.html.twig", "registerMain.html.twig", 1)->display($context);
        // line 2
        $this->loadTemplate("navigation.html.twig", "registerMain.html.twig", 2)->display($context);
        // line 3
        echo "<main class=\"Site-content\">
    <section class=\"Section\">
        <div class=\"Container\">
            <h2 class=\"Section-heading\">Register an PHPIntro Account</h2>
            ";
        // line 7
        $this->loadTemplate("errorMessages.html.twig", "registerMain.html.twig", 7)->display($context);
        // line 8
        echo "            ";
        $this->loadTemplate("statusMessage.html.twig", "registerMain.html.twig", 8)->display($context);
        // line 9
        echo "            <form action=\"";
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["_server"] ?? null), "SCRIPT_NAME", array()), "html", null, true);
        echo "\" method=\"post\" enctype=\"multipart/form-data\">
                <div class=\"Grid Grid--gutters\">
                    <div class=\"InputCombo Grid-full\">
                        <label for=\"";
        // line 12
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["username"] ?? null), "getName", array(), "method"), "html", null, true);
        echo "\" class=\"InputCombo-label\">User Name*</label>
                        <input type=\"text\" id=\"";
        // line 13
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["username"] ?? null), "getName", array(), "method"), "html", null, true);
        echo "\" name=\"";
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["username"] ?? null), "getName", array(), "method"), "html", null, true);
        echo "\"
                               value=\"";
        // line 14
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["username"] ?? null), "getValue", array(), "method"), "html", null, true);
        echo "\" class=\"InputCombo-field\">
                    </div>
                    <div class=\"InputCombo Grid-full\">
                        <label for=\"";
        // line 17
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["email"] ?? null), "getName", array(), "method"), "html", null, true);
        echo "\" class=\"InputCombo-label\">E-mail Address*</label>
                        <input type=\"email\" id=\"";
        // line 18
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["email"] ?? null), "getName", array(), "method"), "html", null, true);
        echo "\" name=\"";
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["email"] ?? null), "getName", array(), "method"), "html", null, true);
        echo "\"
                               value=\"";
        // line 19
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["email"] ?? null), "getValue", array(), "method"), "html", null, true);
        echo "\" class=\"InputCombo-field\">
                    </div>
                    <div class=\"InputCombo Grid-cell\">
                        <label for=\"";
        // line 22
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["password"] ?? null), "getName", array(), "method"), "html", null, true);
        echo "\" class=\"InputCombo-label\">Password*</label>
                        <input type=\"password\" id=\"";
        // line 23
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["password"] ?? null), "getName", array(), "method"), "html", null, true);
        echo "\" name=\"";
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["password"] ?? null), "getName", array(), "method"), "html", null, true);
        echo "\" class=\"InputCombo-field\">
                    </div>
                    <div class=\"InputCombo Grid-cell\">
                        <label for=\"";
        // line 26
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["passwordretype"] ?? null), "getName", array(), "method"), "html", null, true);
        echo "\" class=\"InputCombo-label\">Repeat Password*</label>
                        <input type=\"password\" id=\"";
        // line 27
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["passwordretype"] ?? null), "getName", array(), "method"), "html", null, true);
        echo "\" name=\"";
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["passwordretype"] ?? null), "getName", array(), "method"), "html", null, true);
        echo "\" class=\"InputCombo-field\">
                    </div>
                    <div class=\"Grid-full\">
                        <button type=\"submit\" class=\"Button\">Create my account</button>
                    </div>
                </div>
            </form>
        </div>
    </section>
    <section class=\"Section\">
        <div class=\"Container\">
            <h2 class=\"Section-heading\">Already Registered?</h2>
            <p>Use your existing PHPIntro account to login <a href=\"login.php\">here</a>.</p>
        </div>
    </section>
</main>
";
        // line 43
        $this->loadTemplate("footer.html.twig", "registerMain.html.twig", 43)->display($context);
    }

    public function getTemplateName()
    {
        return "registerMain.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  114 => 43,  93 => 27,  89 => 26,  81 => 23,  77 => 22,  71 => 19,  65 => 18,  61 => 17,  55 => 14,  49 => 13,  45 => 12,  38 => 9,  35 => 8,  33 => 7,  27 => 3,  25 => 2,  23 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "registerMain.html.twig", "/home/p20137/public_html/phpintro/templates/registerMain.html.twig");
    }
}
