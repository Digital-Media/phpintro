<?php
use phpintro\src\exercises\templates\Imprint;

/**
 * Adding define declarations
*/
require_once '../src/defines.inc.php';
require_once '../vendor/smarty/smarty/libs/Smarty.class.php';
require_once '../src/exercises/using-templates/Imprint.php';

/**
 * Create the class Contact and call its method show()
 */
$imprint = new Imprint();
$imprint->show();
