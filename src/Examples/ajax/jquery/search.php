<?php
/*
    Load each line of search.txt (php function file()) into $array
    Searches for the given SearchString sent to search.php script via GET or POST.
    Concatenates one string as xmlHttp.responseText
    containing every whole line which contains the search string.
    */
    $output= "";
   // retrieve input sent by getSearchResultPOST() or getSearchResultGET() in search.js
if (isset($_POST["searchStringPOST"])) {
    $searchString = $_POST["searchStringPOST"];
} elseif (isset($_GET["searchStringGET"])) {
    $searchString = $_GET["searchStringGET"];
}
if(!($searchString == "")) {
    // get content of zip.txt. Each line ist one entry in the array $array[]='One line of search.txt'
    if(($array = file("zip.txt")) != null) {
        foreach ($array as $key => $value) {
            // see if searchString is in the line $value
            if(strpos($value, $searchString) !== false) {
                $output = $output . "<span>" . htmlspecialchars($value) . "</span><br>";
            }
        }
        // send xmlHttp.responseText used in search.js
        echo ($output);
    } else {
        echo ("Could not read file.");
    }
}
