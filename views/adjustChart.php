<?php
	session_start();
	$con = mysqli_connect("localhost", "root", "root", "project");
	$user_id = $_SESSION["user_id"];
	$product_id = $_GET["product_id"];
	$qty = $_GET["product_qty"];
    $num_sql = "UPDATE chart SET product_qty = '".$qty."' WHERE user_id = '".$user_id."' and product_id = '".$product_id."'";
    $result = mysqli_query($con, $num_sql);
?>