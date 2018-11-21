<?php
namespace Exercises;

use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Error\SyntaxError;
use Twig\Loader\FilesystemLoader;

/*
 * The object-oriented and template based Imprint shows the implementation of a static page.
 * *
 * @author Martin Harrer <martin.harrer@fh-hagenberg.at>
 * @package phpue
 * @version 2017
 */
final class Imprint
{
    /**
     * The name of the view (the template file that is to be rendered).
     *
     * @var string
     */
    private $templateName;

    /**
     * The relative path to the directory where the template files are stored.
     *
     * @var string
     */
    private $templateDirectory;

    /**
     * The relative path where cached/compiled templates are to be stored.
     *
     * @var string
     */
    private $templateCacheDirectory;

    /**
     * The Twig loader instance.
     *
     * @var FilesystemLoader
     */
    private $loader;

    /**
     * The main instance of the Twig template engine (environment).
     *
     * @var Environment
     */
    private $twig;


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
    public function __construct()
    {
        $this->templateName = "ImprintMain.html.twig";
        $this->templateDirectory = "../templates";
        $this->templateCacheDirectory = "../templates_c";

        $this->loader = new FilesystemLoader($this->templateDirectory);
        $this->twig = new Environment(
            $this->loader,
            [
            "cache" => $this->templateCacheDirectory,
            "auto_reload" => true
            ]
        );
        $this->twig->addGlobal("_server", $_SERVER);
    }

    public function show()
    {
        // TODO Replace the text in $this->imprint with a imprint of your own using valid HTML5 syntax
        // TODO Use string operator .= or heredoc for concating the lines
        // For a small site the imprint has to contain
        // name/company name
        // purpose of the site
        // address of the owner of the site

        //##%%
        $this->imprint = "<p> Place the requested Imprint here </p>";
        //#%#%
        //%%imprint/show
        $templateParameters['imprint'] =  $this->imprint;
        try {
            $this->twig->display($this->templateName, $templateParameters);
        } catch (LoaderError $e) {
            trigger_error($e->getMessage(), E_USER_ERROR);
            error_log($e->getMessage());
        } catch (RuntimeError $e) {
            trigger_error($e->getMessage(), E_USER_ERROR);
            error_log($e->getMessage());
        } catch (SyntaxError $e) {
            trigger_error($e->getMessage(), E_USER_ERROR);
            error_log($e->getMessage());
        }
    }
}
