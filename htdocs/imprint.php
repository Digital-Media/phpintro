<?php

require "../vendor/autoload.php";

use Exercises\UsingTemplates\Imprint;

/**
 * Adding define declarations
*/
require_once '../src/defines.inc.php';

/**
 * Create the class Contact and call its method show()
 */
$imprint = new Imprint();
$imprint->show();
