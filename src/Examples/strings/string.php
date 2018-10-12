<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Crafting Text</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
<header>
    <div>
        <div>
            <h1>Crafting Text</h1>
            <p>Using String Functions</p>
        </div>
    </div>
</header>
<main>
    <section>
        <div>
            <h2>Crafting Results</h2>
            <h3>Trim, Substring & Concatenation</h3>
            <?php
            $output1 = substr(trim($_REQUEST["text1"]), 0, 3);
            $output1 .= " ";
            $output1 .= substr(trim($_REQUEST["text2"]), -4);
            $output1 .= " ";
            $output1 .= substr(trim($_REQUEST["text3"]), -3, -1);

            echo "<p>Substrings of fragments 1, 2 and 3 added together: <strong>$output1</strong></p>";
            ?>

            <h3>Character Replacement & Case Conversion</h3>
            <?php
            $replacement = ["a" => "e", "e" => "i", "i" => "o", "o" => "u", "u" => "a"];
            $output2 = strtr($_REQUEST["text1"], $replacement);
            $output2 = strtoupper($output2);

            echo "<p>Vowels in fragment 1 replaced and converted to upper case: <strong>$output2</strong></p>";
            ?>

            <h3>Comparison</h3>

            <?php
            $comparison = strcmp($_REQUEST["text1"], $_REQUEST["text2"]);

            if ($comparison < 0) {
                $output3 = "less than";
            } elseif ($comparison > 0) {
                $output3 = "greater than";
            } else {
                $output3 = "equal to";
            }

            echo "<p>Compared lexicographically, fragment 1 is <strong>$output3</strong> fragment 2.</p>";
            ?>
            <a href="index.html">Start Over</a>
        </div>
    </section>
    <section>
        <div>
        <header>
            <h2>Demonstrate strings with included variables</h2>
        </header>
        <?php
        $var = "variable";
        echo '$var set to variable<br>';
        $source = <<<SOURCE
'$var within single quotes.'<br>
'This is a ' . $var . " with string concatenation."<br>
"$var within double quotes."<br>
SOURCE;
        echo "<h3>heredoc: </h3>" . $source ."<br><br>";
        $source = <<<'SOURCE'
'$var within single quotes.'<br>
'This is a ' . $var . " with string concatenation."<br>
"$var within double quotes."<br>
SOURCE;
        echo "<h3>nowdoc: </h3>" . $source ."<br><br>";
        echo '<h3>Strings with single and double quotes</h3>';
        echo '$var within single quotes.<br>';
        echo 'This is a ' . $var . " with string concatenation.<br>";
        echo "$var  within double quotes.<br><br>";
        ?>
            </div>
    </section>
</main>
<footer>
    <div>
        <p>Created and maintained by <a href="mailto:martin.harrer@fh-hagenberg.at">Martin Harrer</a> and <a href="mailto:wolfgang.hochleitner@fh-hagenberg.at">Wolfgang Hochleitner</a>.</p>
        <p><a href="https://github.com/Digital-Media/phpue">Crafting Text Version 2018</a></p>
    </div>
</footer>
</body>
</html>
