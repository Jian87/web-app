$(document).ready(function(){

    
    // search function
    $("#search").focus(function(){
        $(this).attr("placeholder", "");
    });

    $("#search-btn").click(function(){
        var searchtext = $(this).val();
        $.get("search.php", {name: searchtext}, function(data){
            $(".product-list").html(data);
        });
    });

    $("#search").keypress(function(event){
        if(event.which == 13) {
            $("#search-btn").click();
        }
    });

    // filter function
    $(".filter-menu-detail").click(function(){
        var filtertext = $(this).find("a").text();
        $.get("search.php", {name: filtertext}, function(data){
            $(".product-list").html(data);
        });
    })

    // sort function
    var sorttext = $(".sort-option").val();
    $.get("sort.php", {name: sorttext}, function(data){
        $(".product-list").html(data);
    });

    $(".sort-option").change(function(){
        var changetext = $(this).val();
        $.get("sort.php", {name: changetext}, function(data){
            $(".product-list").html(data);
        });
    })
})
