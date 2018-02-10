<?php
session_start();

require_once("src/defines.inc.php");

require_once UTILITIES;
require_once TNORMFORM;
require_once FILE_ACCESS;
require_once 'src/exercises/register/register.php';
// --- This is the main call of the norm form process
try {
// Defines a new view that specifies the template and the parameters that are passed to the template
    $view = new View("registerMain.tpl", [
        new PostParameter(Register::USERNAME),
        new PostParameter(Register::EMAIL),
        new GenericParameter("passwordKey1", Register::PASSWORD1),
        new GenericParameter("passwordKey2", Register::PASSWORD2)
    ]);

// Creates a new Register object and triggers the NormForm process
    $register = new Register($view);
    $register->normForm();
} catch (FileAccessException $e) {
    echo $e->getMessage();
} catch (Exception $e) {
    if (DEBUG) {
        echo "An error occured in file " . $e->getFile() ." on line " . $e->getLine() .":" . $e->getMessage();
    } else {
        echo "<h2>Something went wrong</h2>";
    }
}
