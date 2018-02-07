<?php
include 'error_handling.inc.php';
/*
 * class to demonstrate visibility of constants and variables
 * properties allow objects to store data
 *
 */

class PublicProtectedPrivateProperties
{

    /*
     * $var string private property written in camelCase
     * This is one choice in PSR-1 out of three: $StudlyCaps, $camelCase or $under_score
     */
    private $privateVar="I am private";

    /*
     * $var string protected property written in camelCase
     */
    protected $protectedVar="I am protected";

    /*
     * $var string public property written in camelCase
     */
    public $publicVar="I am public";

    public function __construct($param)
    {

        echo "<h1> dumping properties and variables inside the class</h1>";
        echo "<h2>variables are not preceded by \$this-> </h2>";
        echo "<p><strong>echo \$param; gives:</strong></p>";
        echo  $param;

        // local variables must be initialized before usage
        $local="I am only visible locally in the constructor";
        echo "<p><strong>echo \$local; gives:</strong></p>";
        echo $local;

        echo "<h2> calling class properties preceded by \$this-></h2>";
        // $this references methods and variables defined for "this" class
        // You can replace $this with the phrase "The current instance"
        echo "<p><strong>echo \$this->privateVar; gives:</strong></p>";
        echo $this->privateVar;

        echo "<p><strong>echo \$this->protectedVar; gives:</strong></p>";
        echo $this->protectedVar;

        echo "<p><strong>echo \$this->publicVar; gives:</strong></p>";
        echo $this->publicVar;

    }
}

$publicProtectedPrivateProperties = new PublicProtectedPrivateProperties("I was passed to the constructor of the class");

echo "<h1> dumping properties outside the class</h1>";
echo "<h2> dumping the object with var_dump()</h2> <p><strong>reveals content of properties partially not visible to others</strong></p>";
var_dump($publicProtectedPrivateProperties);

echo "<h2>calling object properties with object operator -> PHP style!!</h2>";
echo "<p><strong>echo \$defineAndConst->publicVar gives:</strong></p>";
echo $publicProtectedPrivateProperties->publicVar;

echo "<h2>the rest gives fatal errors, uncomment for testing</h2>";
/*
 * private properties can only be seen inside class
 */
echo "<p><strong>echo \$defineAndConst->privateVar gives a fatal error:</strong></p>";
//echo $publicProtectedPrivateProperties->privateVar;
/*
 * protected properties can only be seen inside another class, that inherits from this class
 */
echo "<p><strong>echo \$defineAndConst->protectedVar gives a fatal error:</strong></p>";
//echo $publicProtectedPrivateProperties->protectedVar;
