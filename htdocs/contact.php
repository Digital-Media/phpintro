<?php
use phpintro\src\exercises\usingtemplates\Contact;

session_start();
/**
 * include define declarations
 */
require_once '../src/defines.inc.php';

/**
 * include static helper class with methods to validate email, integer, password ...
 */
require_once UTILITIES;

/**
 * include the class AbstractNormform, that defines the form process.
 */
require_once SMARTY;
require_once TNORMFORM;

require_once '../src/exercises/usingtemplates/Contact.php';

/**
 * Create the class Contact and call the method AbstractNormForm::normForm(), now inherited by Contact
 * In case of inheritance, the object operator can be used for the call.
 *
 */
$contact = new Contact();
$contact->normForm();
