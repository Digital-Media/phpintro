<?php
include 'error_handling.inc.php';
include 'Methods.php';
/*
 * This file causes the side-effects avoided by Methods.php according to PSR-1
 */
$methods = new Methods();
echo "This class was written by " . $methods->myPublicMethod();
// TODO uncomment next line to see, that it doesn't work
//$methods->myPrivateMethod();
// TODO uncomment next line to see, that it doesn't work
//$methods->myProtectedMethod();
