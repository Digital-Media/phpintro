<?php
final class DEMO extends AbstractNormForm
{
    /**
     * Creates a new DEMO object based on AbstractNormForm. Takes a View object that holds the information about which
     * template will be shown and which parameters (e.g. for form fields) are passed on to the template.
     * @param View $defaultView The default View object with information on what will be displayed.
     */
    public function __construct(View $defaultView)
    {
        // invoke parent constructor explicitly, cause it requires one parameter
        // this is not done implicitly while creating the object from this subclass
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
            $this->errorMessages ["demo_error"] = "Error occurred. Please try again";
    }
}
