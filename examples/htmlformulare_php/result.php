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
    echo "Test this with different Browsers: Chrome, Firefox, ...; javascript enabled or disabled";
    echo "<br><br>Type '&lt;script&gt;alert('Your are hacked')&lt;/script&gt;' into input field in index.html<br><br>";
    // Uncomment next line to see impact of HTML entities
    // echo "<br><br>Type <script>alert('Your are hacked')</script> into input field in index.html";
    if (isset($_POST['myinput'])) {
        echo "<br>Eingabe POST: " . $_POST['myinput'];
    }
    if (isset($_GET['myinput'])) {
        echo "<br>Eingabe GET: " . $_GET['myinput'];
    }
    echo "<br>Eingabe REQUEST: " . $_REQUEST['myinput'];
    ?>
</p>
</body>
</html>