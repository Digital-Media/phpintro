<?php
namespace phpintro\examples\advancedPHP;

require_once 'error_handling.php';
/**
 * Class to demonstrate visibility of static properties
 */

class StaticProperties
{
    /*
     * $var string public property
     */
    public $publicVar="I am public";

    /*
     * $var string public static property
     */
    public static $publicStaticVar="I am public and static";

    /**
     * Constructor with some demo code
     */
    public function __construct($param)
    {

        echo "<h1>dumping static properties inside the class</h1>";
        echo "<h2>call a non static variable with \$this-></h2>";
        echo "<p><strong>echo \$this->publicVar; gives:</strong></p>";
        echo $this->publicVar;

        echo "<h2>call a static variable with self::</h2>";
        // you must use self:: for static vars
        echo "<p><strong>echo self::\$publicStaticVar; gives:</strong></p>";
        echo self::$publicStaticVar;
    }
}
// no exceptions thrown, therefore no exception handling
$staticProperties = new StaticProperties("I was passed to constructor of the class");

echo "<h1>dumping static properties outside the class</h1>";
echo "<h2> dumping the object with var_dump()</h2>";
echo "<p><strong>reveals content of properties partially not visible to others</strong></p>";
var_dump($staticProperties);

echo "<h2>calling object StaticProperties with object operator -> PHP style!!</h2>";
echo "<p><strong>echo \$defineAndConst->publicVar gives:</strong></p>";
echo $staticProperties->publicVar;

echo "<h2>calling static object StaticProperties with the scope resolution operator ::</h2>";
echo "<p><strong>echo MyClass::\$publicStaticVar gives:</strong></p>";
echo StaticProperties::$publicStaticVar;

echo "<h2>the rest gives fatal errors, uncomment for testing</h2>";
/*
 * without static keyword no static call is possible
 */
echo "<p><strong>echo MyClass::\$publicVar gives a fatal error:</strong></p>";
//echo StaticProperties::$publicVar;
