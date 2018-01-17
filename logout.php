<?php
/**
 * logout.php zerstört die Session
 *
 * In diesem File muss für die UE nichts geändert werden
 *
 * @author Martin Harrer <martin.harrer@fh-hagenberg.at>
 * @package dab3
 * @version 2016
 */
session_start();
require_once 'includes/defines.inc.php';
require_once TNORMFORM;
$_SESSION = [];
if (isset($_COOKIE[session_name()])) {
setcookie(session_name(), "", time() - 86400, "/");
}
session_destroy();
// Redirect auf index.php
View::redirectTo('register.php');