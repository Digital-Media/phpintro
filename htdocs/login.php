<?php
use phpintro\src\exercises\login\Login;

session_start();

require_once("../src/defines.inc.php");

require_once UTILITIES;
require_once SMARTY;
require_once TNORMFORM;
require_once FILE_ACCESS;
require_once '../src/exercises/login/login.php';

// --- This is the main call of the norm form process
try {
// Defines a new view that specifies the template and the parameters that are passed to the template
    $view = new View("loginMain.tpl", [
        new PostParameter(Login::USERNAME),
        new GenericParameter("passwordKey", Login::PASSWORD)
    ]);

// Creates a new Login object and triggers the NormForm process
    $login = new Login($view);
    $login->normForm();
} catch (FileAccessException $e) {
    echo $e->getMessage();
} catch (Exception $e) {
    if (DEBUG) {
        echo "An error occured in file " . $e->getFile() ." on line " . $e->getLine() .":" . $e->getMessage();
    } else {
        echo "<h2>Something went wrong</h2>";
    }
}
