 var xmlHttp = null;

function getSearchResultPOST(searchStringPOST)
{

    xmlHttp = new XMLHttpRequest();
    if (xmlHttp) {
        // Call search.php to process data
        xmlHttp.open("POST", "search.php", true);
        //Send the proper header information along with the request
        xmlHttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xmlHttp.setRequestHeader("Content-length", searchStringPOST.length);
        xmlHttp.setRequestHeader("Connection", "close");
        // */
        // Define which function to call to fulfill request
        xmlHttp.onreadystatechange = DisplayResultPOST;
        // input parameter null, cause data where sent with GET
        // POST would allow to send data in Body of Request, which are given with input parameter of send
        xmlHttp.send("searchStringPOST=" + encodeURIComponent(searchStringPOST));
        //xmlHttp.send(null);
    }
}

function getSearchResultGET(searchStringGET)
{

    xmlHttp = new XMLHttpRequest();
    if (xmlHttp) {
        // Call search.php to process data, true sends request asynchronous, false sends request synchronous
        // with false Website is blocked until response is processed
        xmlHttp.open("GET", "search.php?searchStringGET=" + encodeURIComponent(searchStringGET), true);
        // Define which function to call to fulfill request
        xmlHttp.onreadystatechange = DisplayResultGET;
        // input parameter null, cause data where sent with GET
        // POST would allow to send data in Body of Request, which are given with input parameter of send
        xmlHttp.send(null);
    }
}


function DisplayResultGET()
{
    /*
     * Get the response text and puts it into existing html page
     */
    //alert(xmlHttp.responseText);
    if (xmlHttp.readyState == 4 && xmlHttp.status == 200) {
        document.getElementById("searchResultGET").innerHTML = xmlHttp.responseText;
    }
}

function DisplayResultPOST()
{
    /*
    * Get the response text and puts it into existing html page
    */
    //alert(xmlHttp.responseText);
    if (xmlHttp.readyState == 4 && xmlHttp.status == 200) {
        document.getElementById("searchResultPOST").innerHTML = xmlHttp.responseText;
    }
}
