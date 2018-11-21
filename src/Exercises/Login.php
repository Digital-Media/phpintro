<?php
namespace Exercises;

use Fhooe\NormForm\Core\AbstractNormForm;
use Fhooe\NormForm\Parameter\GenericParameter;
use Fhooe\NormForm\Parameter\PostParameter;
use Fhooe\NormForm\View\View;
use FileAccess\FileAccess;
use Utilities\Utilities;

/**
 * The Login page of phpintro.
 *
 * This class enables users to log in to the system with a provided user name and password. Both items are match with
 * stored credentials. If they match, a Login hash is stored in the session that acts as a token for a successful Login.
 * Other pages can then use LoginSystem::protectPage() to check for this token before the site is initialized. If no
 * hash is present the Login system redirects and prevents accessing the page.
 *
 * @author  Wolfgang Hochleitner <wolfgang.hochleitner@fh-hagenberg.at>
 * @author  Martin Harrer <martin.harrer@fh-hagenberg.at>
 * @version 2017
 */
final class Login extends AbstractNormForm
{
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
     * @param View   $defaultView The default View object with information on what will be displayed.
     * @param string $templateDir The Smarty template directory.
     * @param string $compileDir  The Smarty compiled template directory.
     */
    public function __construct(View $defaultView)
    {
        parent::__construct($defaultView);

        // TODO: Create the FileAccess object and assign it to $fileAccess;
        // TODO: @see src/FAdemo.php for this

        //%%login/construct
    }

    /**
     * Validates user input after submitting login credentials. The function first has to check if both fields were
     * filled out and then checks the result of authenticateUser() to see if the credentials match others that are
     * already stored in the system.
     *
     * @return bool Returns true if no errors occurred and therefore no error messages were set, otherwise false.
     */
    protected function isValid(): bool
    {
        // TODO: The code for correct form validation goes here. Check for empty fields and correct authentication.
        // TODO: @see src/FAdemo.php for this

        //%%login/isValid
        //##%%
        $this->authenticateUser();
        //#%#%

        $this->currentView->setParameter(new GenericParameter("errorMessages", $this->errorMessages));
        return (count($this->errorMessages) === 0);
    }

    /**
     * This method is only called when the form input was validated successfully.
     * It stores the username in the session for further use (e.g. in the template).
     * It then forwards to the Register page.
     */
    protected function business(): void
    {
        // TODO: Save the username in $_SESSION. Replace John Doe with the username used to login
        $_SESSION['username']= "John Doe";
        //%%login/business
        $_SESSION[IS_LOGGED_IN] = Utilities::generateLoginHash();
        // using the null coalesce operator
        $redirect= $_SESSION['redirect'] ?? $redirect='Register.php';
        // equivalent to: isset($_SESSION['redirect']) ? $redirect= $_SESSION['redirect'] : $redirect='Register.php';
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
        // TODO: Validate the password associated with the username with
        // TODO: PHP function password_verify() against the value in $_POST
        // TODO: return true or false, depending on result of verification

        //##%%
        return true;
        //#%#%

        //%%login/authenticateUser
        $users = $this->fileAccess->loadContents(self::USER_DATA_PATH);

        foreach ($users as $user) {
            if ($user[self::USERNAME] === $_POST[self::USERNAME] && password_verify($_POST[self::PASSWORD], $user[self::PASSWORD])) {
                return true;
            }
        }
        return false;
    }
}
