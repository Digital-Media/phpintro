<?php

require "../vendor/autoload.php";

/**
 * include define declarations
 */
require_once '../src/defines.inc.php';

session_start();

use Exercises\Register\Register;
use Fhooe\NormForm\Parameter\PostParameter;
use Fhooe\NormForm\Parameter\GenericParameter;
use Fhooe\NormForm\View\View;

// --- This is the main call of the norm form process
try {
    // Defines a new view that specifies the template and the parameters that are passed to the template
    $view = new View(
        "registerMain.html.twig",
        "../templates",
        "../templates_c",
        [
        new PostParameter(Exercises\Register\Register::USERNAME),
        new PostParameter(Exercises\Register\Register::EMAIL),
        new PostParameter(Exercises\Register\Register::PASSWORD),
        new PostParameter(Exercises\Register\Register::PASSWORD_RETYPE)
        ]
    );

    // Creates a new Register object and triggers the NormForm process
    $register = new Register($view);
    $register->normForm();
} catch (Exception $e) {
    if (DEBUG) {
        echo "An error occured in file " . $e->getFile() ." on line " . $e->getLine() .":" . $e->getMessage();
    } else {
        echo "<h2>Something went wrong</h2>";
    }
}
