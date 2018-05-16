<?php
namespace Defines;

/**
 * This file holds all global constants that are used throughout the PHPIntro application.
 *
 * All global constants that are needed on the various pages are stored here.
 *
 * @author  Wolfgang Hochleitner <wolfgang.hochleitner@fh-hagenberg.at>
 * @author  Martin Harrer <martin.harrer@fh-hagenberg.at>
 * @version 2017
 */

/**
 * Activate Debugging-Messages here for easier testing
 */
define('DEBUG', true);
if (DEBUG) {
    echo "<br>WARNING: Debugging is enabled. Set DEBUG to false for production use in " . __FILE__;
    echo "<br>Connect via SSH and send tail -f /var/log/apache2/error.log";
    echo " to see errors not displayed in Browser<br><br>";
    error_reporting(E_ALL);
    ini_set('html_errors', '1');
    ini_set('display_errors', '1');
    ini_set('display_startup_errors', '1');
}

/**
 * @var string DATA_DIRECTORY Sets the directory where the meta data (JSON files) for users is stored.
 */
define("DATA_DIRECTORY", "../data/");

// Login Handling

/**
 * @var string IS_LOGGED_IN is set in SESSION-Array, if user is logged in successfully.
 */
define("IS_LOGGED_IN", "isloggedin");
