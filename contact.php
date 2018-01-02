<?php
session_start();

/**
 * Einbinden der define-Angaben für SIBUE
 */
require_once 'includes/defines.inc.php';

/**
 * Einbinden einer statischen Hilfsklasse mit Methoden zur Email-Überprüfung, Passwort-Überprüfung, ...
 */
require_once UTILITIES;

/**
 * Einbinden der Klasse TNormform, die die Formularabläufe festlegt. Bindet auch Utilities.php ein.
 */
require_once NORM_FORM;

/*
 * Das objektorientierte und templatebasierte Contact-formular setzt ein Kontaktformular um.
 * *
 * @author Martin Harrer <martin.harrer@fh-hagenberg.at>
 * @package phpue
 * @version 2017
 */
final class Contact extends AbstractNormForm {
    /**
     * Konstanten für ein HTML Attribute z.B:: <input name='pname' id='pname' ... >, <label for='pname' ... >, Keys für $_POST[self::PNAME]..
     *
     * @var string SUBJECT Key für $_POST-Array
     * @var string REQUEST Key für $_POST-Array
     * @var string EMAIL Key für $_POST-Array
     * @var string PRIORITY Key für $_POST-Array
     */
    const SUBJECT = "subject";
    const REQUEST = "request";
    const EMAIL = "email";
    const PRIORITY = "priority";

    /**
     * IMAR Constructor.
     *
     * Ruft den Constructor der Klasse AbstractNormform auf.
     */
    public function __construct(View $defaultView, $templateDir = "templates", $compileDir = "templates_c") {
        parent::__construct($defaultView, $templateDir, $compileDir);
    }

    /**
     * Validiert den Benutzerinput nach dem Abschicken des Formulars.
     *
     * Zur Überprüfung, ob ein Formularfeld leer ist, eine Email und ein Passwort einer passenden REGEX entsprechen,
     * finden sich in @see /phpue/imar/normform/Utilities.php
     *
     * Ob eine Email in /phpue/imar/data/userdata.txt bereits vorhanden ist, wird mit $this->isUniqueEmail geprüft
     *
     * Fehlermeldungen werden im Array $errMsg[] gesammelt.
     *
     * Abstracte Methode in der Klasse AbstractNormForm und muss daher hier implementiert werden
     *
     * @return bool true, wenn $errorMessages leer ist. Ansonsten false
     */
    protected function isValid(): bool {
        //TODO Add your own solution here. Keep code that ist already there. Sometimes it will be part of your solution. Sometimes you will have to discard it. Decide before you finish your work
        /*--
        require SOLUTION . 'contact/isValid.inc.php';
        //*/
        $this->currentView->setParameter(new GenericParameter("errorMessages", $this->errorMessages));
        return (count($this->errorMessages) === 0);
    }

    /**
     * Verarbeitet die Benutzereingaben, die mit POST geschickt wurden
     * Wenn alles gut geganden ist, wird eine Statusmeldung geschrieben, ansonsten eine Fehlermeldung.
     *
     * Abstracte Methode in der Klasse AbstractNormForm und muss daher hier implementiert werden
     */
    protected function business()
    {
        //TODO Add your own solution here. Keep code that ist already there. Sometimes it will be part of your solution. Sometimes you will have to discard it. Decide before you finish your work
        /*--
        require SOLUTION . 'contact/show.inc.php';
        //*/
    }
}

/**
 * Instantiieren der Klasse Contact und Aufruf der Methode AbstractNormForm::normForm()
 *
 * Bei PHP-Exception wird vorerst nur auf eine allgemeine Errorpage weitergeleitet
 */
try {
    $view = new View(View::FORM, "contactMain.tpl", [
        new PostParameter(Contact::SUBJECT),
        new PostParameter(Contact::REQUEST),
        new PostParameter(Contact::EMAIL),
        new PostParameter(Contact::PRIORITY)
    ]);

    $contact = new Contact($view);
    $contact->normForm();
} catch (Exception $e) {
    //header("Location: https://localhost/phpue/includes/errorpage.html");
}