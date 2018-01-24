<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset=UTF-8" />
    <title>Result</title>
</head>
<body>
<a href="javascript:history.back()">One Step back in Browserhistory</a><br>
<a href="index.html">Go to index.html</a>
<p>
    <?php
    // case method="post"
    if (isset($_POST['myinput'])) {
        echo "<br>Eingabe POST: " . $_POST['myinput'];
    }
    // case method="get"
    if (isset($_GET['myinput'])) {
        echo "<br>Eingabe GET: " . $_GET['myinput'];
    }
    // method either "post" or "get"
    echo "<br>Eingabe REQUEST: " . $_REQUEST['myinput'];
    ?>
</p>
</body>
</html>