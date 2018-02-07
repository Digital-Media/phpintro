<?php
include 'error_handling.inc.php';
include 'Methods.php';
/*
 * Class to demonstrate inheritance
 */
class Inheritance extends Methods
{

    public function mySecondPublicMethod()
    {
        echo "<br><br>The protected method of class Method ist called by a public method of subclass Inheritance<br><br>";
        // due to inheritance $this-> can be used
        $this->myProtectedMethod();
        return $this->firstName . " " . $this->lastName;
    }

}

$inheritance = new Inheritance();
$inheritance->mySecondPublicMethod();
