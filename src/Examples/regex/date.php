<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Date Conversion</title>
</head>
<body>
            <h1>Date Conversion</h1>
            <p>Using Regular Expressions</p>
            <h2>Conversion Result</h2>
            <?php
            if (isset($_POST["date"]) && mb_strlen($_POST["date"]) !== 0) {
                $date = $_POST["date"];

                if (preg_match("/(^[0-9]{4})-([0-9]{1,2})-([[:digit:]]{1,2}$)/", $date, $matches)) {
                    echo "<p>$matches[3].$matches[2].$matches[1]</p>";
                } else {
                    echo "<p>Error: Invalid format \"$date\".</p>";
                }
            } else {
                echo "<p>Error: No input specified.</p>";
            }
            ?>
            <a href="index.html">Start Over</a>
</body>
</html>
