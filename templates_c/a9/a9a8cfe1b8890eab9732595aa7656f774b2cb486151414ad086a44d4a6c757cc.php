<?php

/* footer.html.twig */
class __TwigTemplate_beeaadceb4118320d3ca774fa5ebdf99cb026a3a23243558e030b39c4577ab8b extends Twig_Template
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
        echo "<footer class=\"Site-footer\">
    <div class=\"Footer Footer--small\">
        <p class=\"Footer-credits\">Created and maintained by
            <a href=\"mailto:martin.harrer@fh-hagenberg.at\">Martin Harrer</a> and
            <a href=\"mailto:wolfgang.hochleitner@fh-hagenberg.at\">Wolfgang Hochleitner</a>.
        </p>
        ";
        // line 7
        if ( !(twig_get_attribute($this->env, $this->source, ($context["_server"] ?? null), "SCRIPT_NAME", array()) === "/code/onlineshop/htdocs/solution.php")) {
            echo " <a href=\"solution.php\"  class=\"Button u-spaceLM\">Create Solution</a> ";
        }
        // line 8
        echo "        <p class=\"Footer-version\"><i class=\"fa fa-picture-o\"></i>
            <a href=\"https://github.com/Digital-Media/phpue\">PHPUE Version 2017</a>
        </p>
    </div>
</footer>
</body>
</html>";
    }

    public function getTemplateName()
    {
        return "footer.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  35 => 8,  31 => 7,  23 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "footer.html.twig", "/home/p20137/public_html/phpintro/templates/footer.html.twig");
    }
}
