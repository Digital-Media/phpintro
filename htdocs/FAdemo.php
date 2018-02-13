<?php
use phpintro\src\FAdemo;

session_start();
require_once("../src/defines.inc.php");
require_once UTILITIES;
require_once SMARTY;
require_once TNORMFORM;
require_once FILE_ACCESS;
require_once '../src/FAdemo.php';

// --- This is the main call of the norm form process
try {
    // Store current page in SESSION array. login.php uses this entry to redirect back after successful login.
    $_SESSION['redirect']=basename($_SERVER["SCRIPT_NAME"]);
    if (!isset($_SESSION[IS_LOGGED_IN]) || $_SESSION[IS_LOGGED_IN] !== Utilities::generateLoginHash()) {
        // Use this method call to enable login protection for this page
        // redirect before creating object
        View::redirectTo('login.php');
    }

// Defines a new view that specifies the template and the parameters that are passed to the template
    $view = new View("FAdemoMain.tpl", [
        new PostParameter(FAdemo::DEMO_FIELD),
    ]);

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
