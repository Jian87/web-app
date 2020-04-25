$(document).ready(function(){

    var x = 10;    
    var filtertext = "";
    // $.get("productController.php", {name:filtertext, productId:""}, function(data){
    //     $(".product-list").html(data);
    //     var listItems = $(".product-list li");
    //     x = display(x, listItems.length, listItems);
    // });

    $(".userId").hide();

    var listItems = $(".product-list li");
    x = display(x, listItems.length, listItems);

    function del(x){
        $(".del-btn").click(function(e){
            // e.preventDefault();
            $(this).parent().hide();
            var product_id = $(this).parent().find("img").attr("alt");
            x -= 1;
            // soft delete product in server method 2
            $.get("productController.php", {name:filtertext, productId:product_id}, function(res){
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
            var nurl = "../control/productUpdate.php?id=" + title;
            window.location.href = nurl;
        });
        
    };
        
    function display(x=10, b, li){

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
        var user = $(".userId").text();
        if(user === '999999') {
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
            var user = $(".userId").text();
            if(user === '999999') {
                $(".admin-btn").show();
                del();
                update();
            } else {
                $(".admin-btn").hide();
            }
        });
    });


    $(".logo-text").click(function(){
        window.location.href="http://localhost/project6314/index.php";
    });

    // search function
    $("#search").focus(function(){
        $(this).attr("placeholder", "");
        $(this).val("");
    });


    // old search function
    // $("#search-btn").click(function(event){
    //     event.preventDefault();
    //     filtertext = $(this).parent().find("#search").val();
    //     if(filtertext.length > 0){
    //         $.get("productController.php", {name: filtertext}, function(data){
    //             $(".product-list").html(data);
    //             var listItems = $(".product-list li");
    //             x = display(x, listItems.length, listItems);
    //         });
    //     }
    // });


    $("#search-btn").click(function(event){
        filtertext = $(this).parent().find("#search").val();
        event.preventDefault();
        if(filtertext == 'love' || filtertext == 'Love' || filtertext == 'ring' || filtertext == 'Ring' || filtertext == 'engagement' || filtertext == 'Engagement') {
            filtertext = "Love & Engagement";
        }

        if(filtertext == 'home' || filtertext == 'Home' || filtertext == 'Accessories' || filtertext == 'accessories') {
            filtertext = 'Home & Accessories';
        }

        if(filtertext == 'watch' || filtertext == 'Wathces') {
            filtertext = 'watches';
        }

        if(filtertext == 'men' || filtertext == 'Men') {
            filtertext = "Men's";
        }

        if(filtertext == 'women' || filtertext == 'Women') {
            filtertext = 'Fragrance';
        }

        if(filtertext == 'gift') {
            filtertext = 'gifts';
        }

        if(filtertext.length > 0){
            currLoc = $(location).attr("href");
            var arr = currLoc.split("=");
            var nurl;
            if(arr.length == 1) {
                nurl = "views/?category="+filtertext;
            } else {
                nurl = "../views/?category="+filtertext;
            }
            window.location.replace(nurl);
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

    // old filter function
    // $(".filter-menu-detail").click(function(event){
    //     event.preventDefault();
    //     filtertext = $(this).find("a").text();
    //     $.get("productController.php", {name: filtertext}, function(data){
    //         $(".product-list").html(data);
    //         var listItems = $(".product-list li");
    //         x = display(x, listItems.length, listItems);
    //     });
    // });

    $(".filter-menu-detail").click(function(){
        filtertext = $(this).find("a").text();

        currLoc = $(location).attr("href");
        var arr = currLoc.split("/");
        var nurl;

        if(arr[arr.length - 1] == 'index.php') {
            nurl = "./views/?category="+filtertext;
        } else {
            nurl = "../views/?category="+filtertext;
        }
        window.location.href = nurl;
    });

    // $(".main-page-left-img").on("click", "a", function(){
    //     filtertext = $(this).find("img").attr("alt");
    //     alert(filtertext);
    //     var nurl = "views/?category="+filtertext;
    //     alert(nurl);
    //     window.location.href = nurl;
    // });

    // product click
    $(".product-list").on("click", "img", function(){
        var pTitle = $(this).attr("alt");
        var nurl = "product.php?id=" + pTitle;
        window.location.href = nurl;
    });

    $(".product-list").on("click", ".product-btn", function(){
        var pTitle = $(this).parent().find("img").attr("alt");
        var nurl = "product.php?id=" + pTitle;
        window.location.href = nurl;
    });

    $(".product-list").on("click", "p", function(){
        var pTitle = $(this).parent().find("img").attr("alt");
        var nurl = "product.php?id=" + pTitle;
        window.location.href = nurl;
    });

    $(".admin-add-new-btn").click(function(){
        window.location.href = "../control/productUpdate.php";
    });

    
    $(".sub-btn").on("click",function(){
        var obj = $(".input-num");
        if (obj.val() <= 1) {
            obj.val(1);
        } else {
            obj.val(parseInt(obj.val()) - 1);
        }
        obj.change();

    });

    $(".add-btn").on("click",function(){
        var obj = $(".input-num");
        obj.val(parseInt(obj.val()) + 1);
        obj.change();
    });

    $(".mayInterest-list").on("click", "img", function(){
        var pTitle = $(this).parent().find("img").attr("alt");
        var nurl = "product.php?id=" + pTitle;
        window.location.href = nurl;
    });

    $(".chart-btn").on("click",function(){
        var product_id = $(".product-big-img").find("img").attr("alt");
        var qty = $(".input-num").val();
        var user = $(".user").text();
        if(user == 'Guest') {
            window.location.href='login.php';
        } else {
            $.get("addChart.php", {product_id: product_id, qty: qty, update: 2}, function(data){
                alert(data);
            });
        }
    });


    // chart page

    $(".chart-sub-btn").on("click",function(event){
        var obj = $(this).parent().find('.input-num');
        var price = $(this).parentsUntil('.chart-item-display').find(".chart-item-price").text();
        
        
        if (obj.val() <= 1) {
            obj.val(1);
        } else {
            obj.val(parseInt(obj.val()) - 1);
            var subtotal = $(".subtotal").text();
            var newSubtotal = parseFloat(subtotal) - parseFloat(price);
            var tax = newSubtotal * 0.00825;
            var total = newSubtotal + parseFloat(tax);
            $(".subtotal").text(newSubtotal);
            $(".tax").text(tax);
            $(".amount").text(total);
        }
        obj.change();
        
        var product_id = $(this).parentsUntil(".user-chart").find(".chart-item-img").find("img").attr("alt");
 
        var qty = obj.val();
        
        $.get("adjustChart.php", {product_id: product_id, product_qty: qty}, function() {
            //no need return result
        }); 
    });

    $(".chart-add-btn").on("click",function(event){
        var obj = $(this).parent().find('.input-num');
        var price = $(this).parentsUntil('.chart-item-display').find(".chart-item-price").text();
        
        var subtotal = $(".subtotal").text();
        var newSubtotal = parseFloat(subtotal) + parseFloat(price);
        var tax = newSubtotal * 0.00825;
        var total = newSubtotal + parseFloat(tax);
        $(".subtotal").text(newSubtotal);
        $(".tax").text(tax);
        $(".amount").text(total);

        obj.val(parseInt(obj.val()) + 1);
        
        obj.change();
        
        var product_id = $(this).parentsUntil(".user-chart").find(".chart-item-img").find("img").attr("alt");
        var qty = obj.val();
        
        $.get("adjustChart.php", {product_id: product_id, product_qty: qty}, function() {
            //no need return result
        }); 
    });

    $(".chart-remove-btn").on("click", function(event) {

        var obj = $(this).parent().find('.input-num');
        var price = $(this).parentsUntil('.chart-item-display').find(".chart-item-price").text();
        var subtotal = $(".subtotal").text();

        var newSubtotal = parseFloat(subtotal) - parseFloat(price) * parseInt(obj.val());
        var tax = newSubtotal * 0.00825;
        var total = newSubtotal + parseFloat(tax);

        $(".subtotal").text(newSubtotal);
        $(".tax").text(tax);
        $(".amount").text(total);
        
        var product_id = $(this).parentsUntil(".user-chart").find(".chart-item-img").find("img").attr("alt");
        
        $.get("remove_item.php",{product_id: product_id}, function(){
        });

        $(this).parentsUntil('.user-chart').hide();
    });



    $(".check-out-btn").on("click",function(){
        var amount = $(this).parent().find('.amount').text();
        // alert(amount);
        if(amount > 0) {
            var nurl = "checkout.php?amount=" + amount;
            window.location.href = nurl;
        } else {
            alert("Please choose a product to check out!");
        }
    });


    //check out 
    $("#confirm_order").on("click",function(){
        var amount = $(".receipt_amount").text();
        $.get("addOrder.php", {total_amount: amount}, function(data){
            $(".receipt").html(data);
        });
    });

    $(".get-personal-info").click(function(){
        $.get("getUserInfo.php", function(data){
            $(".display-demo").html(data);
        })
    });

    $(".get-order-history").click(function(){
        $.get("getOrderHistory.php", function(data){
            $(".display-demo").html(data);
        })
    });


});
