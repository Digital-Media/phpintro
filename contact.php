<?php
session_start();

/**
 * include define declarations
 */
require_once 'includes/defines.inc.php';

/**
 * include static helper class with methods to validate email, integer, password ...
 */
require_once UTILITIES;

/**
 * include the class AbstractNormform, that defines the form process.
 */
require_once NORM_FORM;

/*
 * the object-oriented and template based Contact implements a contact form.
 * *
 * @author Martin Harrer <martin.harrer@fh-hagenberg.at>
 * @package phpue
 * @version 2017
 */
final class Contact extends AbstractNormForm {
    /**
     * constants for HTML attributes : <input name='pname' id='pname' ... >, <label for='pname' ... >, keys for $_POST[self::PNAME]..
     *
     * @var string SUBJECT Key for $_POST-Array
     * @var string REQUEST Key for $_POST-Array
     * @var string EMAIL Key for $_POST-Array
     * @var string PRIORITY Key for $_POST-Array
     */
    const SUBJECT = "subject";
    const REQUEST = "request";
    const EMAIL = "email";
    const PRIORITY = "priority";

    /**
     * IMAR Constructor.
     *
     * Calls the constructor of class AbstractNormform.
     */
    public function __construct() {
        $view = new View("contactMain.tpl", [
            new PostParameter(Contact::SUBJECT),
            new PostParameter(Contact::REQUEST),
            new PostParameter(Contact::EMAIL),
            new PostParameter(Contact::PRIORITY)
        ]);
        parent::__construct($view);
    }

    /**
     * Validates the input after sending the form.
     *
     * Examples for REGEX to validate input can be found in includes/Utilities.class.php
     *
     * Abstract methods of class AbstractNormForm have to be implemented here
     *
     * @return bool true, wenn $errorMessages leer ist. Ansonsten false
     */
    protected function isValid(): bool {
        //TODO Add your own solution here. Keep code that ist already there. Sometimes it will be part of your solution. Sometimes you will have to discard it. Decide before you finish your work
        /*--
        require '../wbt2uesolution/contact/isValid.inc.php';
        //*/
        //TODO keep the next two lines
        $this->currentView->setParameter(new GenericParameter("errorMessages", $this->errorMessages));
        return (count($this->errorMessages) === 0);
    }

    /**
     * processes data sent via form
     * shows a status message, when processing data succeeded.
     *
     * abstract methods in AbstractNormForm have to be implemented here
     */
    protected function business()
    {
        //TODO Add your own solution here. Keep code that ist already there. Sometimes it will be part of your solution. Sometimes you will have to discard it. Decide before you finish your work
        //TODO see vendor/normform/NormFormExample
        //TODO Add: Sanitize input before it is sent to template. Use htmlspecialchars, htmlentities, ...
        /*--
        require '../wbt2uesolution/contact/business.inc.php';
        //*/
    }
}

/**
 * Instantiate the class Contact and call the method AbstractNormForm::normForm()
 *
 * PHP exception are forwarded to an error page
 */
try {
    $contact = new Contact($view);
    $contact->normForm();
} catch (Exception $e) {
    //header("Location: https://localhost/phpue/includes/errorpage.html");
}