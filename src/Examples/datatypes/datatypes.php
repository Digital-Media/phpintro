<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Datatypes Demo</title>
</head>
<body>
<h1>Data Type Conversion</h1>
<p>Demonstrate the impact of implicit data type conversion and different HTML-input types</p>
<hr>
<?php
$v=null;
$sum=0;
$stringconcat="";
echo "Only fields of the form submitted are in \$_POST. The fields of the other forms do not appear!!!";
var_dump($_POST);
echo "<hr>";
// first form to test strings
if (isset($_POST['submittext'])) {
    echo "<br>Text submitted<br>";
    if (is_string($_POST['textinput'])) {
        $v = var_export($_POST['textinput'], true);
        echo "textinput $v is of type string";
    }
}
// second form for testing numbers
if (isset($_POST['submitnumber'])) {
    echo "<br>Numbers submitted<br>";
    if (is_string($_POST['numberinput'])) {
        $v = var_export($_POST['numberinput'], true);
        echo "numberinput $v is of type string<br>";
    }
    if (!is_int($_POST['numberinput'])) {
        $v = var_export($_POST['numberinput'], true);
        echo "numberinput $v is <strong>NOT</strong> of type <strong>integer</strong>. All values in \$_POST are of type string<br>";
    }
    if (is_numeric($_POST['numberinput'])) {
        $v = var_export($_POST['numberinput'], true);
        echo "numberinput $v is of type numeric though it is a string. Implicit Type Conversion if string starts with a valid number!!<br><hr>";
    }
    //
    if (is_string($_POST['stringnumberinput'])) {
        $v = var_export($_POST['stringnumberinput'], true);
        echo "stringnumberinput $v is of type string<br>";
    }
    if (is_int($_POST['stringnumberinput'])) {
        $v = var_export($_POST['stringnumberinput'], true);
        echo "stringnumberinput $v is of type integer. All values in \$_POST are of type string<br>";
    } else {
        $v = var_export($_POST['stringnumberinput'], true);
        echo "stringnumberinput $v is <strong>NOT</strong> of type integer. All values in \$_POST are of type string<br>";
    }
    if (is_numeric($_POST['stringnumberinput'])) {
        $v = var_export($_POST['stringnumberinput'], true);
        echo "stringnumberinput $v is of type numeric though it is a string. Implicit Type Conversion if string starts with a valid number!!<br><hr>";
    } else {
        $v = var_export($_POST['stringnumberinput'], true);
        echo "stringnumberinput $v is <strong>NOT</strong> of type numeric though it is a string. Implicit Type Conversion if string starts with a valid number!!<br><hr>";
    }
    // demonstrating type comparison
    if ($_POST['stringnumberinput'] == 0) {
        echo "comparison \$_POST['stringinputnumber'] == 0 gives true. An empty String is converted to 0!!!<br>";
    }
    if ($_POST['stringnumberinput'] == false) {
        echo "comparison \$_POST['stringinputnumber'] == false gives true. An empty String is converted to 0, which is equal to false!!!<br>";
    }
    if (!($_POST['stringnumberinput'] === 0)) {
        echo "comparison \$_POST['stringinputnumber'] === 0 gives false. If empty string \"\" is given it doesn't compare to 0, that is of type int. Types are not equal!!<br>";
    }
    if ($_POST['stringnumberinput'] === "10") {
        echo "comparison \$_POST['stringinputnumber'] === \"10\" gives true. Type and content are equal!!";
    }

    $sum = $_POST['numberinput'] + $_POST['stringnumberinput'];
    echo '<hr>$sum = $_POST[numberinput] + $_POST[stringnumberinput] gives: ' . $sum  . '<br>';
    $stringconcat = $_POST['numberinput'] . $_POST['stringnumberinput'];
    echo '$stringconcat = $_POST[numberinput] . $_POST[stringnumberinput] gives: ' . $stringconcat  . '<br>';
    // $demoadd is neither declared nor initialized. Bad programming style but possible in PHP
    $demoadd = "1a" + "1a";
    echo '$demoadd = "1a" + "1a" gives: ' . $demoadd . '<br>';
    // $democoncat is neither declared nor initialized. Bad programming style but possible in PHP
    $democoncat = "1a" . "1a";
    echo '$democoncat = "1a" . "1a" gives: ' . $democoncat . '<br>';
}
// third form to test arrays
if (isset($_POST['submitarray'])) {
    echo "<br>Array submitted<br>";
    if (is_string($_POST['arrayinput'])) {
        $v = var_export($_POST['arrayinput'], true);
        echo "arrayinput $v is of type string";
    } else {
        $v = var_export($_POST['arrayinput'], true);
        echo "arrayinput $v is <strong>NOT</strong> of type string<br>";
    }
    if (is_array($_POST['arrayinput'])) {
        $v = var_export($_POST['arrayinput'], true);
        echo "arrayinput $v is of type array<hr>";
    }
    foreach ($_POST['arrayinput'] as $number) {
        if (is_string($number)) {
            echo "each entry in \$_POST['arrayinput'] is of type string: '$number'<br>";
        }
        $sum += $number;
    }
    echo "But you can sum (+, +=) up strings, that contain valid numbers. Sum is: ". number_format($sum, 2, ',', '.');
}

?>
<br><br><hr>
<a href="index.html">Start Over</a>
</body>
</html>
