<?php
namespace phpintro\examples\oophp;

require_once 'error_handling.php';
/**
 * class to demonstrate the difference of the visibility of define and const
 *
 * give a class name according to PSR-1 in StudlyCaps
 */

class DefineAndConst
{
    // begin of class body

    /**
     * Constant to show visibility of class constants. All UPPER_CASE and words separated by underscore according to PSR-1
     */
    const CLASS_CONST = "I am visible within the class and can be called statically from outside";

    /**
     * DefineAndConst constructor.
     * With some demo code
     */
    public function __construct()
    {
        echo "<h1>dumping constants inside the class</h1>";
        echo "<p><strong>Output of echo DEBUG;</strong></p>";
        echo DEBUG;

        echo "<p><strong>Output of echo self::CLASS_CONST;</strong></p>";
        echo self::CLASS_CONST;
    }

    // end of class body
} // end of class definition

/*
 * create the object
 * the object is named as the class but with camelCase according to PSR-1. This is one choice out of three for properties.
 */
$defineAndConst = new DefineAndConst();

echo "<h1> printing constants outside the class</h1>";
echo "<h2> printing the object with var_dump()</h2> <p><strong>sometimes reveals content of properties partially not visible to others, but no constants</strong></p>";
var_dump($defineAndConst);

echo "<p><strong>Output of echo DEBUG;</strong></p>";
echo DEBUG;

echo "<p><strong>Output of echo \$defineAndConst::CLASS_CONST; called outside the class prints content of constant:</strong></p>";
echo $defineAndConst::CLASS_CONST;

/*
 * TODO comment next two lines to avoid notice in Browser and Warning in PHPStorm
 */
echo "<p><strong>Output of echo CLASS_CONST; prints CLASS_CONST instead of content. CLASS_CONST is handled as string outside the class --> see Notice below!!:</strong></p>";
echo CLASS_CONST;

// The closing tag must be omitted from files containing only PHP according to PSR-2
