<?php
//*
define ('DEBUG',true);
if (DEBUG) {
    echo "<br>WARNING: Debugging is enabled. Set DEBUG to false for production use in " . __FILE__;
    echo "<br>Connect via SSH and send tail -f /var/log/apache2/error.log to see errors not displayed in Browser<br><br>";
    error_reporting(E_ALL);
    ini_set('html_errors', 1);
    ini_set('display_errors', '1');
    ini_set('display_startup_errors', '1');
}

//*/
require_once("MyFirstException.php");

class MyFirstClass {

    const CLASSCONST = "In der Klasse sichtbar";

    private $firstVar="ich bin privat";

    protected $secondVar="ich bin protected";

    public $thirdVar="ich bin public";

    public function __construct($param) {
        echo "DEBUG = " . DEBUG;
        echo "<br>";
        echo "CLASSCONST = " . self::CLASSCONST;
        echo "<br>";
        echo $param;
        echo "<br>";
        echo $local ="ich bin nur lokal gültig";
        echo "<br>";
        echo $this->firstVar;
        echo "<br>";
        echo $this->secondVar;
        echo "<br>";
        echo $this->thirdVar;
    }
}

try {
    $myFirstClass = new MyFirstClass("ich wurde übergeben");
    echo "<br>";
    echo "DEBUG = " . DEBUG;
    echo "<br>";
    echo $myFirstClass::CLASSCONST;
    echo "CLASSCONST = " . CLASSCONST;
    echo $myFirstClass->$firstVar;
    echo $myFirstClass->$secondVar;
    echo $myFirstClass->$thirdVar;
    echo $myFirstClass::$firstVar;
    echo $myFirstClass::$secondVar;
    echo $myFirstClass::$thirdVar;

} catch (MyFirstException $e) {
    echo "This is my first Exception" . $e->getFile() . "on line " . $e->getLine() . ": " . $e->getMessage();
} catch (Exception $e) {
    echo "All other Exceptions in " . $e->getFile() . "on line " . $e->getLine() . ": " . $e->getMessage();
}
