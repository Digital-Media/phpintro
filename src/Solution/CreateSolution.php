<?php
ini_set('max_execution_time', 300);
$write = true;
$class = 'OnlineShop';
$solfile = join(DIRECTORY_SEPARATOR, explode("/", __DIR__ . '/../onlineshop/src/Exercises/' . $class . '.php'));
// Backup the original file
$backupfile = join(DIRECTORY_SEPARATOR, explode("/", __DIR__ . '/../onlineshop/src/Exercises/' . $class . '.backup'));
if (file_exists($backupfile)) {
    echo "Solution already built";
    exit();
}
copy($solfile, $backupfile);
$solhandle = fopen($solfile, 'w+') or die($php_errormsg);
$backuphandle = fopen($backupfile, 'r') or die($php_errormsg);
while (!feof($backuphandle)) {
    $line = fgets($backuphandle, 200);
    if (preg_match("-//%%-", $line)) {
        $filename=$line;
        // remove os specific line endings
        // remove marker where the solution should be placed
        // remove spaces
        $filename=str_replace(PHP_EOL, "", str_replace("//%%", "/", str_replace(" ", "", $filename)));
        // rebuild the path with os specific directory separator and add file extension
        $filename = join(DIRECTORY_SEPARATOR, explode("/", __DIR__ . $filename . ".inc.php"));
        if (!file_exists($filename)) {
            echo "File " . $filename . " does not exist!";
            echo "<br><br><div><a href=\"RestoreBackup.php\">Restore</a></div>";
            exit;
        }
        echo "Copying " . $filename . " to solution file <br>";
        $tmphandle = fopen($filename, 'r');
        while (!feof($tmphandle)) {
            $solline = fgets($tmphandle, 200);
            fputs($solhandle, $solline, 200);
        }
        fclose($tmphandle);
        $filename="";
    } elseif (preg_match("-//##%%-", $line)) {
        $write=false;
    } elseif (preg_match("-//#%#%-", $line)) {
        $write = true;
    }
    if ($write && !preg_match("-//%%-", $line) && !preg_match("-//#%#%-", $line)) {
        fputs($solhandle, $line, 200);
    }
}
fclose($backuphandle);
fclose($solhandle);
echo "Solution for " . $class . " created! <br> Solution file is " . $solfile . "<br> Backupfile is " . $backupfile;
?>
<br><br><div><a href="RestoreBackup.php">Restore</a></div>
