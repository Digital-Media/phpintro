<?php
session_start();

require_once("includes/defines.inc.php");

require_once UTILITIES;
require_once TNORMFORM;

/**
 * The main page of the IMAR image archive.
 *
 * This class enables users to upload images together with meta information about the image title and author. These
 * images are then stored. In the course of the semester, this page is protected by a login system and thumbnails are
 * generated to show a small version of the uploaded file instead of a generic one.
 *
 * @author Wolfgang Hochleitner <wolfgang.hochleitner@fh-hagenberg.at>
 * @author Martin Harrer <martin.harrer@fh-hagenberg.at>
 * @version 2017
 */
final class DEMO extends AbstractNormForm
{

    /**
     * Creates a new DEMO object based on AbstractNormForm. Takes a View object that holds the information about which
     * template will be shown and which parameters (e.g. for form fields) are passed on to the template.
     * @param View $defaultView The default View object with information on what will be displayed.
     */
    public function __construct(View $defaultView)
    {
        parent::__construct($defaultView);
    }

    /**
     * Validates user input.
     * @return bool Returns true if no errors occurred and therefore no error messages were set, otherwise false.
     */
    protected function isValid(): bool
    {
        // Nothing to do here. This page is static.
        return (count($this->errorMessages) === 0);
    }

    /**
     * This method is only called when the form input was validated successfully. It adds the newly added image,
     * creates a status message for showing success and updates the View object with the status message and the updated
     * array of images. The form fields for image title and author are updated with an empty parameter so that their
     * content is deleted.
     */
    protected function business()
    {
            $this->statusMessage = "Your file has been uploaded successfully";
            $this->currentView->setParameter(new GenericParameter("statusMessage", $this->statusMessage));
            $this->errorMessages ["demoerror"] = "Error adding image. Please try again";
    }

}

// --- This is the main call of the norm form process

// Use this method call to enable login protection for this page
View::redirectTo('login.php');

// Defines a new view that specifies the template and the parameters that are passed to the template
$view = new View(View::FORM, "indexMain.tpl", [
]);

// Creates a new DEMO object and triggers the NormForm process
$demo = new DEMO($view);
$demo->normForm();
