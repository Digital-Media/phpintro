<?php
include 'error_handling.inc.php';
require_once("MyException.php");

class ExceptionsVersusErrors
{
    // the constructor is always invoked, when the object is created
    public function __construct()
    {
        // TODO uncomment commented lines and see which echos disappear to find out differences between exceptions errors and parse problems
        //$this->hugo; // Gives a Notice: Reached before exception is thrown PHP continues
        //$x=1/0; // Gives a warning: Reached before exception is thrown PHP continues
        // TODO try this together with both versions of creating the objects. With and without try-catch block
        // TODO comment this line and see what happens
        throw new MyException("Something went wrong");
        //$this->hugo; // Never reached due to thrown exception
        //§this->hugo; // Gives HTTP Status 500: Page not working. Error only seen in /var/log/apache2/error.log -> File can't be parsed correctly
    }
}
// TODO try both versions, uncomment only one and see what's the difference
// TODO see how multi line comments are used here. Only change /* to //* and the other way round to see what happens.
/*
new MyFirstClass();
//*/
//*
try {
    new ExceptionsVersusErrors();
    // TODO uncomment to see fatal errors and see which echos disappear
    //echo MyExceptionClass::$fatalError;
} catch (MyException $e) {
    echo "This is my first Exception" . $e->getFile() . "on line " . $e->getLine() . ": " . $e->getMessage();
} catch (Exception $e) {
    echo "All other Exceptions in " . $e->getFile() . "on line " . $e->getLine() . ": " . $e->getMessage();
} finally {
    // for example close open files in case of file error exceptions
    echo "<br>reached in case of any exception";
}
//*/
echo "<br>only reached without fatal PHP error";