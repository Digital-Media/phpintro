<?php

require "../vendor/autoload.php";

use Exercises\Contact;

session_start();

/**
 * include define declarations
 */
require_once '../src/defines.inc.php';

/**
 * Create the class Contact and call the method AbstractNormForm::normForm(), now inherited by Contact
 * In case of inheritance, the object operator can be used for the call.
 */
$contact = new Contact();
$contact->normForm();
