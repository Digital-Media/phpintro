<?php
namespace phpintro\examples\oophp;

require_once 'error_handling.php';
/**
 * Class to demonstrate setting object properties
 */

class SettingProperties
{
    /*
     * $var string public property
     */
    public $publicStringVar="";

    /*
     * $var number public property
     */
    public $publicNumberVar=0;
}

$settingProperties = new SettingProperties();

echo "<h1>setting properties outside the class</h1>";
echo "<h2>dumping the object with var_dump()</h2>";
echo "<p><strong>reveals content of properties partially not visible to others</strong></p>";
var_dump($settingProperties);

echo "<h2>calling object property with object operator -> PHP style!!</h2>";
echo "<p><strong>echo \$defineAndConst->publicStringVar gives nothing:</strong></p>";
echo $settingProperties->publicStringVar;
echo "<p><strong>echo \$defineAndConst->publicNumberVar gives:</strong></p>";
echo $settingProperties->publicNumberVar;

echo "<h2>setting object property and display it again</h2>";
echo "<p><strong>\$defineAndConst->publicStringVar='Not empty any longer'</strong></p>";
$settingProperties->publicStringVar="Not empty any longer";
echo $settingProperties->publicStringVar;

echo "<p><strong>\$defineAndConst->publicNumberVar=12</strong></p>";
$settingProperties->publicNumberVar=12;
echo $settingProperties->publicNumberVar;

echo "<h2>dumping the object with var_dump()</h2>";
echo "<p><strong>reveals content of properties partially not visible to others</strong></p>";
var_dump($settingProperties);

echo "<h2>setting a new object property and display it again</h2>";
echo "<p><strong>\$defineAndConst->publicNewVar='Now new in Object'</strong></p>";
$settingProperties->publicNewVar="Now new in Object";
var_dump($settingProperties);
