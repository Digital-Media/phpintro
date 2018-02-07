<?php
session_start();

require_once("includes/defines.inc.php");

require_once UTILITIES;
require_once TNORMFORM;
require_once FILE_ACCESS;

/**
 * The registration page of the IMAR image archive.
 *
 * This class enables users to create a new account for the IMAR system. By choosing a user name, providing an e-mail
 * address and a password (as well as a repetition of the latter) a new user is created. Before adding the user to the
 * list of existing accounts the system checks if user name and e-mail address are unique and if (simple) password
 * criteria are met.
 *
 * @author Wolfgang Hochleitner <wolfgang.hochleitner@fh-hagenberg.at>
 * @author Martin Harrer <martin.harrer@fh-hagenberg.at>
 * @version 2017
 */
final class Register extends AbstractNormForm
{
    /**
     * @var string USERNAME Form field constant that defines how the form field for holding the username is called
     * (id/name).
     */
    const USERNAME = "username";

    /**
     * @var string EMAIL Form field constant that defines how the form field for holding the e-mail address is called
     * (id/name).
     */
    const EMAIL = "email";

    /**
     * @var string PASSWORD1 Form field constant that defines how the form field for holding the password is called
     * (id/name).
     */
    const PASSWORD1 = "password1";

    /**
     * @var string PASSWORD2 Form field constant that defines how the form field for holding the password repetition is
     * called (id/name).
     */
    const PASSWORD2 = "password2";

    /**
     * @var string USER_ID Constant used to specify the name of the auto-increment key.
     */
    const USER_ID = "userid";

    /**
     * @var FileAccess $fileAccess The object handling all file access operations.
     */
    private $fileAccess;

    /**
     * Creates a new Register object based on AbstractNormForm. Takes a View object that holds the information about
     * which template will be shown and which parameters (e.g. for form fields) are passed on to the template.
     * The constructor needs to initialize the object for file handling.
     * @param View $defaultView The default View object with information on what will be displayed.
     * @param string $templateDir The Smarty template directory.
     * @param string $compileDir The Smarty compiled template directory.
     */
    public function __construct(View $defaultView)
    {
        parent::__construct($defaultView);

        // TODO: Do the necessary initializations in the constructor.

        /*--
        require '../phpintrosolution/register/construct.inc.php';
        //*/
    }

    /**
     * Validates user input after submitting registration information. The function first has to check if all fields
     * were filled out and then checks for uniqueness of username and e-mail address. The latter also has to be a valid
     * address. Passwords need to correspond to certain criteria and also match.
     * @return bool Returns true if no errors occurred and therefore no error messages were set, otherwise false.
     */
    protected function isValid(): bool
    {
        // TODO: The code for correct form validation goes here. Check for empty fields correct e-mail and passwords.

        /*--
        require '../phpintrosolution/register/isValid.inc.php';
        //*/

        $this->currentView->setParameter(new GenericParameter("errorMessages", $this->errorMessages));

        return (count($this->errorMessages) === 0);
    }

    /**
     * This method is only called when the form input was validated successfully. It adds the newly entered user to the
     * list of existing users and then forwards to the LOGIN page.
     */
    protected function business()
    {
        if ($this->addUser()) {
            View::redirectTo('login.php');
        } else {
            $this->errorMessages["addingUser"] = "The user could not be added.";
        }
    }

    /**
     * Checks for uniqueness of a certain value in the $_POST array. This method is used to check if the user name or
     * e-mail address are unique or already existing. Therefore the existing users are loaded and the array is searched
     * for the supplied value.
     * @param string $name The name of the entry in the $_POST array.
     * @return bool Returns true if no match is found, otherwise false.
     */
    private function isUnique(string $name): bool
    {
        // TODO: Check if the provided user name or password is unique (meaning not already in the data).

        /*--
        return require '../phpintrosolution/register/isUnique.inc.php';
        //*/

        //##
        return true;
        //*/
    }

    /**
     * Adds a new user to the list of existing users. An entry for the two-dimensional user array is created and values
     * for user name, e-mail-address and password are taken from the values in $_POST. Additionally an auto-increment ID
     * is generated and added as well in order to assign a unique user id. After the entry is created, the updated
     * two-dimensional array is stored again in the JSON file.
     * @return bool Returns true if the operation was successful, otherwise false.
     */
    private function addUser(): bool
    {
        // TODO: Add the user (ID, user name, e-mail, password) to the two-dimensional array and store it.

        /*--
        return require '../phpintrosolution/register/addUser.inc.php';
        //*/

        //##
        return true;
        //*/
    }
}

// --- This is the main call of the norm form process
try {
// Defines a new view that specifies the template and the parameters that are passed to the template
    $view = new View("registerMain.tpl", [
        new PostParameter(Register::USERNAME),
        new PostParameter(Register::EMAIL),
        new GenericParameter("passwordKey1", Register::PASSWORD1),
        new GenericParameter("passwordKey2", Register::PASSWORD2)
    ]);

// Creates a new Register object and triggers the NormForm process
    $register = new Register($view);
    $register->normForm();
} catch (FileAccessException $e) {
    echo $e->getMessage();
} catch (Exception $e) {
    if (DEBUG) {
        echo "An error occured in file " . $e->getFile() ." on line " . $e->getLine() .":" . $e->getMessage();
    } else {
        echo "<h2>Something went wrong</h2>";
    }
}

