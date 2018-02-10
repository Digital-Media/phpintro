<?php
session_start();
require_once("src/defines.inc.php");
require_once UTILITIES;
require_once TNORMFORM;
require_once 'src/demo.php';

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
    $view = new View("demoMain.tpl", [
    ]);

// Creates a new DEMO object and triggers the NormForm process
    $demo = new DEMO($view);
    $demo->normForm();
} catch (Exception $e) {
    if (DEBUG) {
        echo "An error occured in file " . $e->getFile() ." on line " . $e->getLine() .":" . $e->getMessage();
    } else {
        echo "<h2>Something went wrong</h2>";
    }
}
