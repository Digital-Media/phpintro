<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><!-- TODO: Place a title here --></title>
</head>
<body>
<?php

// TODO: see Examples/regex for an example, how to implement this exercise

// TODO: Declare and initialize a variable, that holds the sum of EUROs

// TODO: Get the data from the form in index.html. Check if the given key exists in $_POST (isset())

// TODO: Create a regular expression that matches the required criteria using preg_match_all (see PHP Documentation)
// TODO: @see https://regex101.com/ for an explanation
// TODO: Use the text snippet in teststring.txt to test your regex on http://www.phpliveregex.com/.
// TODO: It shows all valid and invalid test cases and they should sum up to 1000 EUR, if your regex is accurate.

// TODO: Build the sum of all valid amounts.
// TODO: Either loop with foreach or in a similar way over matching amounts of money in the result of preg_match_all()
// TODO: or build a regex in a way, that you can use array_sum().
// TODO: If needed, use var_dump() to see, what $matches returned by preg_match_all() looks like.
// TODO: @see output of phpliveregex.com.

// TODO: Additional hints for building the sum.
// TODO: Use str_replace() to change commas "," to decimal points "." to be able to sum up the money in PHP
// TODO: Depending on your regular expression, you may need to replace " EUR" with "" to get plain numbers.
// TODO: OPTIONAL challenge: You can do both steps at once with preg_replace_callback_array() (see PHP Documentation)

// TODO: Finally display the text used for testing and the resulting amount (echo).
// TODO: Use number_format() for formatting the sum.
// TODO: Use htmlentities() or a similar function to avoid XSS.

?>
    <a href="index.html">Start Over</a>
</body>
</html>
