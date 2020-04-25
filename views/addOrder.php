<?php
	session_start();
	$con = mysqli_connect("localhost", "root", "root", "project");

	$user_id = $_SESSION["user_id"];
	$amount = $_GET['total_amount'];

	//add order
	$sql = "INSERT INTO Order_history(user_id, price, order_time, order_id) values($user_id, $amount, now(), UNIX_TIMESTAMP(NOW()))";
	mysqli_query($con, $sql);

	// remove cart
	$remove_cart_sql = "DELETE FROM chart WHERE user_id = '$user_id' ";
	mysqli_query($con, $remove_cart_sql);

	echo "<h2>Receipt</h2>";
	echo "<p>The Total Cost is: ".$amount."</p>";
	echo "<p>Thank You Very Much For Shoping!</p>";
	echo "<a href='../'>Go Back Home And Enjoy Your Shopping!</p>";

?>