<?php
/**
 * Einbinden der define-Angaben für Imprint und Contact
*/
require_once 'includes/defines.inc.php';
require_once("../vendor/normform/vendor/smarty/smarty/libs/Smarty.class.php");


/*
 * Das objektorientierte und templatebasierte Impressum setzt eine Seite ohne Formularfelder um.
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
     * @var string $statusMessage An optional status message that can be set in business() when processing data was
     * successful.
     */
    protected $imprint;

    /**
     * Imprint Constructor.
     *
     * Ruft den Constructor der Klasse AbstractNormform auf.
     */
    public function __construct($templateDir = "templates", $compileDir = "templates_c") {
        $compileDir = "templates_c";
        $this->smarty = new Smarty();
        $this->smarty->template_dir = $templateDir;
        $this->smarty->compile_dir = $compileDir;

    }

    public function show()
    {
        //TODO Add your own solution here. Keep code that ist already there. Sometimes it will be part of your solution. Sometimes you will have to discard it. Decide before you finish your work
        /*--
        require SOLUTION . 'imprint/show.inc.php';
        //*/
        //##
        $this->imprint = "<p> Place the requested Imprint here";
        $this->smarty->assign('imprint', $this->imprint);
        $this->smarty->display('imprintMain.tpl');
        //*/
    }
}
/**
 * Instantiieren der Klasse Contact und Aufruf der Methode AbstractNormForm::normForm()
 *
 * Bei PHP-Exception wird vorerst nur auf eine allgemeine Errorpage weitergeleitet
 */
    $imprint = new Imprint();
    $imprint->show();