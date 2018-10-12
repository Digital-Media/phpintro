<?php
namespace FileAccess;

use Exception;

/**
 * Implements an exception used for file access errors.
 *
 * This exception can be used whenever file access problems occur. This might be in the case of a missing or empty
 * file, a file that can't be read due to technical problems or similar reasons.
 *
 * @author  Wolfgang Hochleitner <wolfgang.hochleitner@fh-hagenberg.at>
 * @author  Martin Harrer <martin.harrer@fh-hagenberg.at>
 * @version 2017
 */
class FileAccessException extends Exception
{
    /**
     * Creates a new FileAccessException. The constructor is redefined in order to make the message parameter mandatory.
     *
     * @param string         $message  The exception message.
     * @param int            $code     An optional exception code.
     * @param Exception|null $previous The previous exception used for the exception chaining.
     */
    public function __construct(string $message, int $code = 0, Exception $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }

    /**
     * Creates a string representation of this exception.
     *
     * @return string The string representation.
     */
    public function __toString(): string
    {
        return __CLASS__ . ": [{$this->code}]: {$this->message}\n";
    }
}
