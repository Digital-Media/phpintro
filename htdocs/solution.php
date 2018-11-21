<?php

require "../vendor/autoload.php";

/**
 * Include global constants
 */
require_once '../src/defines.inc.php';

session_start();

use Solution\Solution;
use Fhooe\NormForm\Parameter\PostParameter;
use Fhooe\NormForm\View\View;

/* --- This is the main call of the norm form process
 *
 * Database exceptions are caught only here. A DEBUG page formatted in DBAccess::debugSQL() will be displayed
 * PHP exception are redirected to a common error page
 */
try {
    // Defines a new view that specifies the template and the parameters that are passed to the template
    $view = new View(
        "solutionMain.html.twig",
        "../templates",
        "../templates_c",
        [
        ]
    );
    // Creates a new Shop object and triggers the NormForm process
    $solution = new Solution($view);
    $solution->normForm();
} catch (Exception $e) {
    echo "<h2>Something went wrong</h2>";
}
