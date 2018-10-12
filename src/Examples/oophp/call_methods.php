<?php
/**
 * This file causes the side-effects avoided by Methods.php according to PSR-1
 *
 * @package Phpintro
 * @author  Martin Harrer <martin.harrer@fh-hagenberg.at>
 * @license MIT License
 */
namespace phpintro\examples\oophp;

require_once 'error_handling.php';
require_once 'Methods.php';

$methods = new Methods();
echo "This class was written by " . $methods->myPublicMethod();
// TODO uncomment next line to see, that it doesn't work
//$methods->myPrivateMethod();
// TODO uncomment next line to see, that it doesn't work
//$methods->myProtectedMethod();
