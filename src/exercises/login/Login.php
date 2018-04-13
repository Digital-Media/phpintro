<?php
namespace phpintro\src\exercises\login;

use AbstractNormForm;
use phpintro\src\FileAccess;
use GenericParameter;
use Utilities;
use View;

/**
 * The login page of phpintro.
 *
 * This class enables users to log in to the system with a provided user name and password. Both items are match with
 * stored credentials. If they match, a login hash is stored in the session that acts as a token for a successful login.
 * Other pages can then use LoginSystem::protectPage() to check for this token before the site is initialized. If no
 * hash is present the login system redirects and prevents accessing the page.
 *
 * @author Wolfgang Hochleitner <wolfgang.hochleitner@fh-hagenberg.at>
 * @author Martin Harrer <martin.harrer@fh-hagenberg.at>
 * @version 2017
 */
final class Login extends AbstractNormForm
{
    // trait Utilities can now be used as part of class Login.
    // For Example: $this->sanitizeFilter($string) instead of Utilities::sanitizeFilter($string)
    use Utilities;

    /**
     * @var string USERNAME Form field constant that defines how the form field for holding the username is called
     * (id/name).
     */
    const USERNAME = "username";

    /**
     * @var string PASSWORD Form field constant that defines how the form field for holding the password is called
     * (id/name).
     */
    const PASSWORD = "password";

    /**
     * @var string USER_DATA_PATH The full path for the user meta data JSON file.
     */
    const USER_DATA_PATH = DATA_DIRECTORY . "userdata.json";

    /**
     * @var FileAccess $fileAccess The object handling all file access operations.
     */
    private $fileAccess;

    /**
     * Creates a new Login object based on AbstractNormForm. Takes a View object that holds the information about which
     * template will be shown and which parameters (e.g. for form fields) are passed on to the template.
     * The constructor needs initialize the object for file handling.
     *
     * @param View $defaultView The default View object with information on what will be displayed.
     * @param string $templateDir The Smarty template directory.
     * @param string $compileDir The Smarty compiled template directory.
     */
    public function __construct(View $defaultView)
    {
        parent::__construct($defaultView);

        // TODO: Create the class FileAccess and assign it to $fileAccess;
        // TODO: @see src/FAdemo.php for this

        /*--
        require '../../phpintrosolution/login/construct.inc.php';
        //*/
    }

    /**
     * Validates user input after submitting login credentials. The function first has to check if both fields were
     * filled out and then checks the result of authenticateUser() to see if the credentials match others that are
     * already stored in the system.
     * @return bool Returns true if no errors occurred and therefore no error messages were set, otherwise false.
     */
    protected function isValid(): bool
    {
        // TODO: The code for correct form validation goes here. Check for empty fields and correct authentication.
        // TODO: @see src/FAdemo.php for this

        /*--
        require '../../phpintrosolution/login/isValid.inc.php';
        //*/
        $this->authenticateUser();

        $this->currentView->setParameter(new GenericParameter("errorMessages", $this->errorMessages));
        return (count($this->errorMessages) === 0);
    }

    /**
     * This method is only called when the form input was validated successfully.
     * It stores the username in the session for further use (e.g. in the template).
     * It then forwards to the register page.
     */
    protected function business()
    {
        // TODO: Save the username in $_SESSION. Replace John Doe with the username used to login
        $_SESSION['username']= "John Doe";
        /*--
        require '../../phpintrosolution/login/business.inc.php';
        //*/
        $_SESSION[IS_LOGGED_IN] = $this->generateLoginHash();
        // using the null coalesce operator
        $redirect= $_SESSION['redirect'] ?? $redirect='register.php';
        // equivalent to: isset($_SESSION['redirect']) ? $redirect= $_SESSION['redirect'] : $redirect='register.php';
        View::redirectTo($redirect);
    }

    /**
     * Authenticates a user by matching the entered username and password with the stored records. If the username is
     * present and the entered password matches the stored password, a valid login is assumed and stored in $_SESSION
     *
     * @return bool Returns true if the combination of username and password is valid, otherwise false.
     */
    private function authenticateUser(): bool
    {
        // TODO: Check if the provided user name and password combination is correct.
        // TODO: See src/FileAcess.php loadcontents and FAdemo.php for calling it
        // TODO: @see src/FAdemo.php for this
        // TODO: load whole file USER_DATA_PATH: user1 and user2 have password "geheim"
        // TODO: Step throw the array with foreach
        // TODO: Compare each username with the value in $_POST
        // TODO: Validate the password associated with the username with password_verify() against the value in $_POST
        // TODO: return true or false, depending on result of verification

        //##
        return true;
        //*/
        /*--
        require '../../phpintrosolution/login/authenticateUser.inc.php';
        //*/

    }
}
