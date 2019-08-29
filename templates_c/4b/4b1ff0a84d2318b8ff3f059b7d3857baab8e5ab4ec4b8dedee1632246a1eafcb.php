<?php

/* errorMessages.html.twig */
class __TwigTemplate_db39b2761feb731e570cf0b0c841eeea554939d66bed2b3bcf3af2ba65651267 extends Twig_Template
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
        if ((array_key_exists("errorMessages", $context) && (twig_length_filter($this->env, ($context["errorMessages"] ?? null)) > 0))) {
            // line 2
            echo "    <div class=\"Error\">
        <ul class=\"Error-list\">
            ";
            // line 4
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(($context["errorMessages"] ?? null));
            foreach ($context['_seq'] as $context["_key"] => $context["error"]) {
                // line 5
                echo "                <li class=\"Error-listItem\">";
                echo twig_escape_filter($this->env, $context["error"], "html", null, true);
                echo "</li>
            ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['error'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 7
            echo "        </ul>
    </div>
";
        }
    }

    public function getTemplateName()
    {
        return "errorMessages.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  42 => 7,  33 => 5,  29 => 4,  25 => 2,  23 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "errorMessages.html.twig", "/home/p20137/public_html/phpintro/templates/errorMessages.html.twig");
    }
}
