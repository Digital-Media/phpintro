<?php
/**
 * This file holds all global constants that are used throughout the PHPUE application.
 *
 * All global constants that are needed on the various pages are stored here.
 *
 * @author Wolfgang Hochleitner <wolfgang.hochleitner@fh-hagenberg.at>
 * @author Martin Harrer <martin.harrer@fh-hagenberg.at>
 * @version 2017
 */

// Path and file definitions

/**
 * @var string NORM_DIR The Path to the NormForm library.
 */
define("NORM_DIR", "vendor/normform/");

/**
 * @var string UTILITIES Path to the Utilities class.
 */
define("UTILITIES", "includes/Utilities.php");

/**
 * @var string NORM_FORM Path to the NormForm class.
 */
define("TNORMFORM", NORM_DIR . "AbstractNormForm.php");

/**
 * @var string CSS_DIR Path to the CSS files provided by NormForm.
 */
define("CSS_DIR", NORM_DIR . "css");

/**
 * @var string FILE_ACCESS Path to the FileAccess class.
 */
define("FILE_ACCESS", "includes/FileAccess.php");

// Login Handling

/**
 * @var string IS_LOGGED_IN is set in SESSION-Array, if user is logged in successfully.
 */
define("IS_LOGGED_IN", "isloggedin");


