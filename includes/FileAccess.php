<?php

require_once("FileAccessException.php");

/**
 * Implements base functionality for reading data from a file and writing data back to it.
 *
 * This class is already fully functional with everything in it to create a two dimensional array for images and user
 * data from a JSON file as well as write a JSON file with the same kind of data. This class also handles functionality
 * of uploads. Methods using exception handling are included for demonstration purposes.
 *
 * @author Wolfgang Hochleitner <wolfgang.hochleitner@fh-hagenberg.at>
 * @author Martin Harrer <martin.harrer@fh-hagenberg.at>
 * @version 2017
 */
class FileAccess
{
    /**
     * @var string DATA_DIRECTORY Sets the directory where the meta data (JSON files) for images and users is stored.
     */
    const DATA_DIRECTORY = "data/";

    /**
     * @var string USER_DATA_PATH The full path for the user meta data JSON file.
     */
    const USER_DATA_PATH = self::DATA_DIRECTORY . "userdata.json";

    /**
     * Creates a new FileAccess object.
     */
    public function __construct()
    {
        // Intentionally left empty.
    }

    // Examples on how to use exceptions in some of the above methods

    /**
     * Loads the contents of a JSON file into an according two-dimensional array. Works with both image meta data and
     * user meta data. The method uses file_get_contents to read the whole file into a string and the create an array
     * using json_decode. A file lock has to be obtained since file_get_contents does not implement this by itself.
     * @param string $filename The file that is to be read.
     * @return array Returns a two-dimensional array with the information of the JSON file. The array keys are the JSON
     * keys.
     * @throws FileAccessException Throws an exception if the file could not be locked or does not exist.
     */
    public function loadContents(string $filename): array
    {
        if (file_exists($filename)) {
            $fp = fopen($filename, "r");
            $lock = flock($fp, LOCK_SH);
            if ($lock) {
                $data = json_decode(file_get_contents($filename), true) ?? [];
            } else {
                $message = "Could not get lock on $filename";
                $formattedError = $this->debugFileError($message);
                throw new FileAccessException($formattedError);
            }
            flock($fp, LOCK_UN);
            fclose($fp);
            return $data;
        } else {
            $message = "File $filename is missing.";
            $formattedError = $this->debugFileError($message);
            throw new FileAccessException($formattedError);
        }
    }

    /**
     * Writes a two-dimensional array of data into a JSON file. Works with both image meta data and user meta data. The
     * method uses file_put_contents to write a string into a file that is being created by json_encode. JSON output is
     * pretty printed, an exclusive file lock is obtain to avoid problems with concurrent access.
     * @param string $filename The file to be written.
     * @param array $data The array of data that is read.
     * @return bool Returns true if the operation was successful, otherwise false.
     * @throws FileAccessException Throws an exception when writing was not successful.
     */
    public function storeContents(string $filename, array $data): bool
    {
        $bytes = file_put_contents($filename, json_encode($data, JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT), LOCK_EX);

        if ($bytes > 0) {
            return true;
        }
        $message = "Could not write $filename.";
        $formattedError = $this->debugFileError($message);
        throw new FileAccessException($formattedError);
    }

    /**
     * Formats error messages for DEBUG error pages in a nicer way. Values receive names and the PHP call stack is
     * added. This method redirects to errorpage.html if DEBUG = false is set in defines.inc.php.
     * @param string $message The message to be included in the debug output.
     * @return string The formatted message. If DEBUG = true is set a formatted error page is returned.
     */
    public function debugFileError(string $message): string
    {
        // Write the PHP call stack from the buffer into a temporary variable and clears it so that nothing is shown
        ob_start();
        debug_print_backtrace();
        $out2 = ob_get_contents();
        // Format it in a more readable way
        $phpCallStack = str_replace('#', '<br>#', $out2);
        ob_clean();
        // Create a static DEBUG error page that is shown instead of a template
        $formattedError = <<<ERRORPAGE
        <!DOCTYPE html>
            <html lang="en">
                <head>
                    <meta charset="UTF-8">
                    <title>DEBUG Error Page</title>
                </head>
                <body>
                    <div>
                        <h2> DEBUG Error Page for $_SERVER[SCRIPT_NAME] </h2>
                            <p><strong>To hide error messages and redirect to errorpage.html,
                            set DEBUG = FALSE in define.inc.php</strong></p>
                            <p><strong style='color: #FF0000;'> Please correct the following File Error:</strong><br>
                            $message</p>
                            <p><strong>PHP Call Stack:</strong><br>
                            $phpCallStack</p>
                            <p><strong>For more information see:</strong>
                            <a href='http://www.php.net/manual/en/' target='_blank'>PHP Documentation</a></p>
                    </div>
                </body>
            </html>
ERRORPAGE;

        // Write $formattedError using error_log
        error_log($formattedError, 0);
        // Return $formattedError
        return $formattedError;
    }
}