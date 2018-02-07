<?php

/**
 * Implements an exception for demonstration purposes
 */
class MyException extends Exception
{
    /**
     * Creates a new Exception. The constructor is redefined in order to make the message parameter mandatory.
     * @param string $message The exception message.
     * @param int $code An optional exception code.
     * @param Exception|null $previous The previous exception used for the exception chaining.
     */
    public function __construct(string $message, int $code = 0, Exception $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }

    /**
     * Creates a string representation of this exception.
     * @return string The string representation.
     */
    public function __toString(): string
    {
        return __CLASS__ . ": [{$this->code}]: {$this->message}\n";
    }
}
