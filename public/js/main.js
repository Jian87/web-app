$(document).ready(function(){

    var x = 5;    
    var filtertext = "";
    $.get("productController.php", {name:filtertext, productId:""}, function(data){
        $(".product-list").html(data);
        var listItems = $(".product-list li");
        x = display(x, listItems.length, listItems);
    });


    function del(x){
        $(".del-btn").click(function(e){
            // e.preventDefault();
            $(this).parent().hide();
            var title = $(this).parent().find("img").attr("alt");
            x -= 1;
            // soft delete product in server method 2
            $.get("productController.php", {name:filtertext, productId:title}, function(res){
                e.preventDefault();
                $(".product-list").html(res);
                var listItems = $(".product-list li");
                x = display(x, listItems.length, listItems);
                del(x);
                update();
            });
            // $(".admin-display-all-btn").click();
        });
        
    };

    function update(){
        $(".update-btn").click(function(e){
            $(this).parent().hide();
            var title = $(this).parent().find("img").attr("alt");
            // soft delete product in server method 1 
            var nurl = "./control/productUpdate.php?id=" + title;
            window.location.href = nurl;
        });
        
    };
        
    function display(x=5, b, li){

        for(var i = x; i < b; i++) {
            var product = $(li[i]);
            product.hide();
        }
        
        $(".view-more-btn").click(function(e){
            e.preventDefault();
            var end = 0;
            if(x + 5 > b) {
                end = b;
            } else {
                end = x + 5; 
            }
            for(var i = x; i < end; i++) {
                var product = $(li[i]);
                product.show();
            }
            x += 5;
        });
        var user = $(".user").text();
        if(user === 'testuser1') {
            $(".admin-btn").show();
            del();
            update();
        } else {
            $(".admin-btn").hide();
        }
        return x;
    };


    $(".admin-display-all-btn").click(function(){
        $.get("productController.php", {name:filtertext, productId:""}, function(data){
            $(".product-list").html(data);
            var user = $(".user").text();
            if(user === 'testuser1') {
                $(".admin-btn").show();
                del();
                update();
            } else {
                $(".admin-btn").hide();
            }
        });
    });


    $(".logo-text").click(function(){
        window.location.href="http://localhost/te/index.php";
    });

    // search function
    $("#search").focus(function(){
        $(this).attr("placeholder", "");
        $(this).val("");
    });

    $("#search-btn").click(function(event){
        event.preventDefault();
        filtertext = $(this).parent().find("#search").val();
        if(filtertext.length > 0){
            $.get("productController.php", {name: filtertext}, function(data){
                $(".product-list").html(data);
                var listItems = $(".product-list li");
                x = display(x, listItems.length, listItems);
            });
        }
    });
    

    $("#search").keypress(function(event){
        if(event.which == 13) {
            event.preventDefault();
            $("#search-btn").click();
        }
    });


    $("#search").blur(function(){
        $(this).attr("placeholder", "Dimond Vine");
    });

    // filter function
    $(".filter-menu-detail").click(function(event){
        event.preventDefault();
        filtertext = $(this).find("a").text();
        $.get("productController.php", {name: filtertext}, function(data){
            $(".product-list").html(data);
            var listItems = $(".product-list li");
            x = display(x, listItems.length, listItems);
        });
    });

    // product click
    $(".product-list").on("click", "img", function(){
        var pTitle = $(this).attr("alt");
        var nurl = "views/product.php?id=" + pTitle;
        window.location.href = nurl;
    });

    $(".product-list").on("click", ".product-btn", function(){
        var pTitle = $(this).parent().find("img").attr("alt");
        var nurl = "views/product.php?id=" + pTitle;
        window.location.href = nurl;
    });

    $(".admin-add-new-btn").click(function(){
        window.location.href = "control/productUpdate.php";
    });
});
