    $(document).ready(function (){
        $("#searchStringPOST").keyup(function(){
            var txt = $("#searchStringPOST").val();
            $.post("search.php", {searchStringPOST: txt}, function(result){
                $("#searchResultPOST").html(result);
            });
        });
        $("#searchStringGET").keyup(function(){
            var txt = $("#searchStringGET").val();
            $.get("search.php", {searchStringGET: txt}, function(result){
                $("#searchResultGET").html(result);
            });
        });
    });