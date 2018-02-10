<?php
/**
 * logout.php zerstört die Session
 *
 * In diesem File muss für die UE nichts geändert werden
 *
 * @author Martin Harrer <martin.harrer@fh-hagenberg.at>
 * @package onlineshop
 * @version 2018
 */
session_start();
require_once '../src/defines.inc.php';
require_once SMARTY;
require_once TNORMFORM;
$_SESSION = [];
if (isset($_COOKIE[session_name()])) {
    setcookie(session_name(), "", time() - 86400, "/");
}
session_destroy();
View::redirectTo('register.php');
