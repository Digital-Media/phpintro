<?php
/*
 * The object-oriented and template based Imprint shows the implementation of a static page.
 * *
 * @author Martin Harrer <martin.harrer@fh-hagenberg.at>
 * @package phpue
 * @version 2017
 */
final class Imprint {
    /**
     * @var Smarty $smarty Hold the reference to the Smarty template engine.
     */
    protected $smarty;

    /**
     * @var string $imprint Holds the imprint defined in the method show()
     * successful.
     */
    protected $imprint;

    /**
     * Imprint constructor.
     *
     * Creates a new Smarty Object and sets default templates and compiled templates directories
     */
    public function __construct($templateDir = "templates", $compileDir = "templates_c") {
        $this->smarty = new Smarty();
        $this->smarty->template_dir = $templateDir;
        $this->smarty->compile_dir = $compileDir;

    }

    public function show()
    {
        // TODO Add your own solution here. Keep code that ist already there. Sometimes it will be part of your solution. Sometimes you will have to discard it. Decide before you finish your work
        /*--
        require '../phpintrosolution/imprint/show.inc.php';
        //*/
        // TODO Replace the text below with a imprint of your own using valid HTML5 syntax
        //##
        $this->imprint = "<p> Place the requested Imprint here </p>";
        //*/
        // TODO keep these two lines.
        // Assigning the PHP variable $this->imprint to the Smarty variable imprint
        $this->smarty->assign('imprint', $this->imprint);
        // Defining the Smarty template to use. See __construct for template directory
        // TODO Have a look at the template code and figure out, how it works
        $this->smarty->display('imprintMain.tpl');

    }
}
