<?php
$class = 'OnlineShop';
$solfile = join(DIRECTORY_SEPARATOR, explode("/", __DIR__ . '/../onlineshop/src/Exercises/' . $class . '.php'));
// Backup the original file
$backupfile = join(DIRECTORY_SEPARATOR, explode("/", __DIR__ . '/../onlineshop/src/Exercises/' . $class . '.backup'));
if (file_exists($backupfile)) {
    copy($backupfile, $solfile);
    unlink($backupfile);
    echo "Template for exercise $class restored <br>";
    echo "Restored file: " . $backupfile . " to " . $solfile . "<br>";
    echo "Deleted file: " . $backupfile;
} else {
    echo "No backup there for " . $solfile;
}
?>
<br><br>
<div>
    <a href="BuildSolution.php">Build Solution</a>
</div>
