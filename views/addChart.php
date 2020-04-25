<?php
    session_start();
	$con = mysqli_connect("localhost", "root", "root", "project");

	if ($con) {
        $res = "";
        $user_id = $_SESSION["user_id"];
	    $product_id = $_GET["product_id"];
	    $qty = $_GET["qty"];
	    
        $sql = "SELECT * FROM chart WHERE user_id = '$user_id' and product_id = '$product_id'";
        $result = mysqli_query($con, $sql);
        $rows = mysqli_num_rows($result);
	    if ($rows == 0) {
	        $insert_sql = "INSERT INTO chart(user_id, product_id, product_qty) VALUES('$user_id', '$product_id', '$qty')";
	        $result = mysqli_query($con, $insert_sql);
	    }
	    else {
            $curr = mysqli_fetch_array($result);
            $qty += $curr['product_qty'];

	        $update_sql = "UPDATE chart SET product_qty = '".$qty."' WHERE user_id = '".$user_id."' and product_id = '".$product_id."'";
	        $result = mysqli_query($con, $update_sql);
	    }
        

        echo "Product have been add to your chart successfully!";
	    
	}

?>