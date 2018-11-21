<?php

require "../vendor/autoload.php";

/**
 * include define declarations
 */
require_once '../src/defines.inc.php';

session_start();

use Exercises\Login;
use Fhooe\NormForm\Parameter\PostParameter;
use Fhooe\NormForm\View\View;
use Utilities\Utilities;

// --- This is the main call of the norm form process
try {
    if (isset($_SESSION[IS_LOGGED_IN]) && $_SESSION[IS_LOGGED_IN] === Utilities::generateLoginHash()) {
        // Use this method call to enable Login protection for this page
        // redirect before creating object
        $redirect= $_SESSION['redirect'] ?? $redirect='Register.php';
        // equivalent to: isset($_SESSION['redirect']) ? $redirect= $_SESSION['redirect'] : $redirect='Register.php';
        View::redirectTo($redirect);
    }    // Defines a new view that specifies the template and the parameters that are passed to the template
    $view = new View(
        "loginMain.html.twig",
        "../templates",
        "../templates_c",
        [
        new PostParameter(Login::USERNAME),
        new PostParameter(Login::PASSWORD)
        ]
    );

    // Creates a new Login object and triggers the NormForm process
    $login = new Login($view);
    $login->normForm();
} catch (Exception $e) {
    if (DEBUG) {
        echo "An error occured in file " . $e->getFile() ." on line " . $e->getLine() .":" . $e->getMessage();
    } else {
        echo "<h2>Something went wrong</h2>";
    }
}
