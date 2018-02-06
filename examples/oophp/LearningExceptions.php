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

    public function __construct() {
        //$this->hugo;
        throw new MyFirstException("Something went wrong");
        //$this->hugo;
        //§this->hugo;
    }
}
/*
new MyFirstClass();
//*/
//*
try {
    new MyFirstClass();
} catch (MyFirstException $e) {
    echo "This is my first Exception" . $e->getFile() . "on line " . $e->getLine() . ": " . $e->getMessage();
} catch (Exception $e) {
    echo "All other Exceptions in " . $e->getFile() . "on line " . $e->getLine() . ": " . $e->getMessage();
}
//*/
