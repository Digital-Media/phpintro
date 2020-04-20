<?php
namespace phpintro\examples\oophp;

require_once 'error_handling.php';
require_once 'Methods.php';
/**
 * Class to demonstrate inheritance
 */
class Inheritance extends Methods
{
    /**
     * @return string
     */
    public function mySecondPublicMethod()
    {
        echo "<br><br>A protected method of class Method ist called by a public method of subclass Inheritance<br><br>";
        // due to inheritance $this-> can be used
        $this->myProtectedMethod();
        echo $this->firstName . " " . $this->lastName;
        return $this->firstName . " " . $this->lastName;
    }
}

$inheritance = new Inheritance();
$string = $inheritance->mySecondPublicMethod();
echo $string;
