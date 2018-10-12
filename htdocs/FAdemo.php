<?php

require "../vendor/autoload.php";

/**
 * include define declarations
 */
require_once '../src/defines.inc.php';

session_start();

use FileAccess\FAdemo;
use Fhooe\NormForm\Parameter\PostParameter;
use Fhooe\NormForm\View\View;
use Utilities\Utilities;

// --- This is the main call of the norm form process
try {
    // Store current page in SESSION array. Login.php uses this entry to redirect back after successful Login.
    $_SESSION['redirect']=basename($_SERVER["SCRIPT_NAME"]);
    if (!isset($_SESSION[IS_LOGGED_IN]) || $_SESSION[IS_LOGGED_IN] !== Utilities::generateLoginHash()) {
        // Use this method call to enable Login protection for this page
        // redirect before creating object
        View::redirectTo('Login.php');
    }

    // Defines a new view that specifies the template and the parameters that are passed to the template
    $view = new View(
        "fademoMain.html.twig",
        "../templates",
        "../templates_c",
        [
        new PostParameter(FAdemo::DEMO_FIELD)
        ]
    );

    // Creates a new FAdemo object and triggers the NormForm process
    $demo = new FAdemo($view);
    $demo->normForm();
} catch (Exception $e) {
    if (DEBUG) {
        echo "An error occured in file " . $e->getFile() ." on line " . $e->getLine() .":" . $e->getMessage();
    } else {
        echo "<h2>Something went wrong</h2>";
    }
}
