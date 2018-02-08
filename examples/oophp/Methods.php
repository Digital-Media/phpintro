<?php
/**
 * Declaring class Methods
 *
 * @author Martin Harrer <martin.harrer@fh-hagenberg.at>
 */
namespace phpintro\examples\oophp;

/**
 * Class to demonstrate visibility of public, protected and private methods
 * Methods allow objects to perform tasks. In this case just sending an echo.
 * Method declarations are similar to function declarations, but need a public, protected or private keyword in front
 * Methods are declared within a class declaration. Functions are declared outside a class declaration
 * This class is the only oophp example that fulfills the requirements of PSR-1 and causes no side-effects
 *
 * MUST be called by call_methods.php!!! Otherwise you see a white screen in the browser. No errors are given.
 */
class Methods
{
    public $firstName="John";
    public $lastName="Doe";
    /**
     * __construct must be public
     * TODO try private or protected for __construct
     */
    public function __construct()
    {
        echo "The constructor is always invoked when a class or subclass is created<br><br>";
    }

    private function _myPrivateMethod()
    {
        echo "A private method can only be accessed within the enclosing class<br>";
        echo "Therefore it is invoked by a public method of this class<br><br>";
    }

    protected function myProtectedMethod()
    {
        echo "A protected method can only be invoked within the enclosing class or subclasses<br>";
        echo "Therefore it is invoked by a public method of a inheriting class<br><br>";
        return $this->firstName . " " . $this->lastName;
    }

    /**
     * If no keyword is given in front, it defaults to public.
     * But according to PSR-2 visibility must be declared explicitly
     * Only the public keyword enables a method to be invoked from outside the current object
     *
     * @return string
     * */
    public function myPublicMethod()
    {
        echo "A public method can be invoked from any context<br><br>";
        $this->_myPrivateMethod();
        return $this->firstName . " " . $this->lastName;
    }
}
