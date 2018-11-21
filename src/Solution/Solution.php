<?php
namespace Solution;

use Fhooe\NormForm\Core\AbstractNormForm;
use Fhooe\NormForm\Parameter\GenericParameter;
use Fhooe\NormForm\View\View;
use Utilities\LogWriter;

/**
 * Class Solution provides methods to copy solution files into the exercise templates
 *
 * This class is initialized by htdocs/solution.php, is derived from the class AbstractNormForm and uses TWIG templates.
 *
 * Paths have to be in a certain format for the class to work
 *
 * phpintro and phpintrosolution have to be stored in the same directory
 *
 * The classes for which a solution should be created have to be stored in the folder src/Exercises of phpintro
 *
 * The Marker in the class for which a solution is created has to meet the following criteria
 *
 * //%%<path to/filename for part of solution>
 *
 * This markers are replaced with the content of files,
 * that can be found in phpintrosolution/<path to/filename for part of solution>.inc.php
 *
 * Parts of the code, that are necessary for the template to work without errors, but have fo be replaced for the
 * final solution are marked in the following way:
 *
 * Beginn //##%%
 *
 * End //#%#%
 *
 * These lines and the lines in betwenn are not copied to the final solution file.
 *
 * While creating the solution, a backup <classfilename.backup> is stored in src/Exercises.
 * The name of the final solution is the original class filename.
 *
 * During Restore the backup is copied to the original class filename und the backup file is deleted.
 *
 * @author  Martin Harrer <martin.harrer@fh-hagenberg.at>
 * @package phpintro
 * @version 2018
 */
final class Solution extends AbstractNormForm
{
    /**
     * @var array $actions $actions[0] defines, which solution class to build or which template to restore
     */
    private $current_action;

    /**
     * @var string $logWriter  Instance of monolog to write logs to phpintro.log
     */
    private $logWriter;

    /**
     * @var string $class Current class to create a solution or restore the template
     */
    private $class;

    /**
     * @var array $solutions List of available actions for solutions to create templates to restore
     *
     * c in front stands for create
     * r in front stands for restore
     * The rest is the class name in lowercase
     */
    private $available_classes = [
        "Login",
        "Register",
        "Imprint",
        "Contact"
    ];

    /**
     * DBDemo Constructor.
     *
     * Calls constructor of class AbstractNormForm.
     * Creates a logWriter instance
     *
     * Sends an error message, if folder phpintrosolution, does not exist.
     *
     * @param View $defaultView Holds the initial @View object used for displaying the form.
     *
     * @throws DatabaseException is thrown by all methods of $this->dbAccess and not treated here.
     *         The exception is treated in the try-catch block of the php script, that initializes this class.
     */
    public function __construct(View $defaultView)
    {
        parent::__construct($defaultView);
        $this->logWriter = LogWriter::getInstance();
        if (!file_exists(__DIR__ . '/../../../phpintrosolution')) {
            $this->errorMessages['no_solution_dir'] = "Sorry! No solution folder available";
            $this->currentView->setParameter(new GenericParameter("errorMessages", $this->errorMessages));
        } else {
            $this->currentView->setParameter(new GenericParameter("classArray", $this->available_classes));
        }
    }

    /**
     * Validates the user input
     *
     * Class name is extracted from POST array.
     * Validate, if class is already available
     *
     * @return bool true, if $errorMessages is empty, else false
     */
    protected function isValid(): bool
    {
        $this->current_action = array_keys($_POST);
        $this->class = substr($this->current_action[0], 1, mb_strlen($this->current_action[0])-1);
        if (!in_array($this->class, $this->available_classes)) {
            $this->errorMessages['no_solution'] = "No Solution available for this class $this->class.";
        }
        $this->currentView->setParameter(new GenericParameter("errorMessages", $this->errorMessages));
        return (count($this->errorMessages) === 0);
    }

    /**
     * Process the user input, sent with a POST request
     *
     * Create solution or restore template depending on $action extracted from POST array
     *
     * c create solution
     * r restore template
     */
    protected function business(): void
    {
        $action = substr($this->current_action[0], 0, 1);
        switch ($action) {
        case "c":
            $this->createSolution($this->class);
            break;
        case "r":
            $this->restoreTemplate($this->class);
            break;
        }
        $this->currentView->setParameter(new GenericParameter("statusMessage", $this->statusMessage));
        $this->currentView->setParameter(new GenericParameter("errorMessages", $this->errorMessages));
    }

    /**
     * Create solution for class sent in POST array
     *
     * @param $class string class sent in POST array
     */
    private function createSolution($class)
    {
        $backupfile = $this->createFilename($class, '/../Exercises/', '.backup');
        $solfile = $this->createFilename($class, '/../Exercises/', '.php');
        if (!file_exists($backupfile)) {
            copy($solfile, $backupfile);
            $this->mergeSolutionIntoTemplate($solfile, $backupfile);
            $this->logWriter->logInfo("Created backup file:  $backupfile.");
            $this->statusMessage = "Solution for Class $class created";
        } else {
            $this->errorMessages['solution_exists'] = "Solution already created for $class.";
        }
    }

    /**
     * Restore template for class sent in POST array
     *
     * @param $class string class sent in POST array
     */
    private function restoreTemplate($class)
    {
        $backupfile = $this->createFilename($class, '/../Exercises/', '.backup');
        $solfile = $this->createFilename($class, '/../Exercises/', '.php');
        if (file_exists($backupfile)) {
            copy($backupfile, $solfile);
            unlink($backupfile);
            $this->statusMessage = "Template for Class $class restored";
            $this->logWriter->logInfo("Restored file:  $backupfile  to  $solfile.");
            $this->logWriter->logInfo("Deleted file:  $backupfile.");
        } else {
            $this->errorMessages['no_backup'] = "No backup found for class $class.";
        }
    }

    /**
     * @param $class string class to restore or create a solution
     * @param $relative_path string path where class file is stored
     * @param $ext string extension for backup or solution file
     * @return string full filename
     */
    private function createFilename($class, $relative_path, $ext)
    {
        return join(DIRECTORY_SEPARATOR, explode("/", __DIR__ . $relative_path . $class . $ext));
    }

    /**
     * Copy every part of the solution into template and write solution class file
     *
     * case "-//%%-"
     *      merge parts of solution into exercises instead of these lines
     * case "-//##%%-"
     *      do not copy given parts of the solution to final solution file.
     * case -//#%#%-
     *      end of given part of solution. start copying from backup file again.
     *
     * @param $solfile string filename for solution class file
     * @param $backupfile string filename for backup file
     */
    private function mergeSolutionIntoTemplate($solfile, $backupfile)
    {
        $write=true;
        $solhandle = fopen($solfile, 'w+');
        $backuphandle = fopen($backupfile, 'r');
        while (!feof($backuphandle)) {
            $line = fgets($backuphandle, 200);
            if (preg_match("-//%%-", $line)) {
                $filename = $this->createSolutionFilename($line);
                if (!file_exists($filename)) {
                    $this->logWriter->logInfo("File $filename does not exist!");
                    $this->errorMessages['error'] = "File $filename does not exist!";
                } else {
                    $this->logWriter->logInfo("Copying  $filename to $solfile");
                    $this->copySolutionToTemplate($filename, $solhandle);
                }
            } elseif (preg_match("-//##%%-", $line)) {
                $write=false;
            } elseif (preg_match("-//#%#%-", $line)) {
                $write = true;
            }
            if ($write && !preg_match("-//%%-", $line) && !preg_match("-//#%#%-", $line)) {
                fputs($solhandle, $line, 200);
            }
        }
        fclose($backuphandle);
        fclose($solhandle);
    }

    /**
     * remove os specific line endings
     * remove marker where the solution should be placed
     * remove spaces
     *
     * @param  $line string Marker, that solution file has to be copied to this line
     * @return string filename and path to solution file for the given marker
     */
    private function createSolutionFilename($line) 
    {
        $filename=str_replace("\r", "", str_replace("\n", "", str_replace("//%%", "/", str_replace(" ", "", $line))));
        return $this->createFilename($filename, '/../../../phpintrosolution', '.inc.php');

    }

    private function copySolutionToTemplate($filename, $solhandle) 
    {
        $tmphandle = fopen($filename, 'r');
        while (!feof($tmphandle)) {
            $solline = fgets($tmphandle, 200);
            fputs($solhandle, $solline, 200);
        }
        fclose($tmphandle);
    }
}
