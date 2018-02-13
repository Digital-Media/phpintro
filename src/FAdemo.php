<?php
namespace phpintro\src;

use AbstractNormForm;
use phpintro\src\FileAccess;
use GenericParameter;
use PostParameter;
use Utilities;
use View;

/**
 * The demo page for the class FileAccess.
 *
 * @author Wolfgang Hochleitner <wolfgang.hochleitner@fh-hagenberg.at>
 * @author Martin Harrer <martin.harrer@fh-hagenberg.at>
 * @version 2017
 */final class FAdemo extends AbstractNormForm
{
    // trait Utilities can now be used as part of class Login.
    // For Example: $this->sanitizeFilter($string) instead of Utilities::sanitizeFilter($string)
    use Utilities;

    /**
     * @var string DEMO_FIELD Form field constant that defines
     *                        how the form field for holding a demo field is called (id/name).
     */
    const DEMO_FIELD = "demofield";

    /**
     * @var string USER_DATA_PATH The full path for the user meta data JSON file.
     */
    //const USER_DATA_PATH = DATA_DIRECTORY . "testdata.json";

    /**
     * @var FileAccess $fileAccess The object handling all file access operations.
     */
    private $fileAccess;

    /**
     * Creates a new DEMO object based on AbstractNormForm and FileAccess.
     * Takes a View object that holds the information about which
     * template will be shown and which parameters (e.g. for form fields) are passed on to the template.
     *
     * @param View $defaultView The default View object with information on what will be displayed.
     */
    public function __construct(View $defaultView)
    {
        // invoke parent constructor explicitly, cause it requires one parameter
        // this is not done implicitly while creating the object from this subclass
        parent::__construct($defaultView);
        // creating the fileaccess object
        $this->fileAccess = new FileAccess();
        // filling the result array if data exist in the file TEST_DATA_PATH
        if (file_exists(TEST_DATA_PATH)) {
            $this->currentView->setParameter(new GenericParameter("result", $this->readText()));
        }
    }

    /**
     * Validates user input.
     * @return bool Returns true if no errors occurred and therefore no error messages were set, otherwise false.
     */
    protected function isValid(): bool
    {
        if ($this->isEmptyPostField(self::DEMO_FIELD)) {
            $this->errorMessages[self::DEMO_FIELD] = "Please type some text.";
        }
        $this->currentView->setParameter(new GenericParameter("errorMessages", $this->errorMessages));
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
        $this->writeText();
        $this->statusMessage = "Processing successful!";
        $this->currentView->setParameter(new GenericParameter("statusMessage", $this->statusMessage));
        // display the current content of the file TEST_DATA_PATH, including the new entry
        $this->currentView->setParameter(new GenericParameter("result", $this->readText()));
        // Update the three form parameters with empty content so that the form fields are empty upon result display.
        $this->currentView->setParameter(new PostParameter(self::DEMO_FIELD, true));
    }

    protected function readText() {
        $fields = $this->fileAccess->loadContents(TEST_DATA_PATH);
        return $fields;
    }

    protected function writeText() {
        if (!file_exists(DATA_DIRECTORY)) {
            mkdir(DATA_DIRECTORY);
        }

        $demofield = Utilities::sanitizeFilter($_POST[self::DEMO_FIELD]);

        $fields = $this->fileAccess->loadContents(TEST_DATA_PATH);

        $fields[] = [
            "demofield" => $demofield
        ];

        if ($this->fileAccess->storeContents(TEST_DATA_PATH, $fields)) {
            return true;
        }
        return false;
    }
}
