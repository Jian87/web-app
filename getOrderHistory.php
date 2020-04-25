<?php
	session_start();
	$user_id = $_SESSION['user_id'];
	require('db.php');
	$query = "SELECT * FROM order_history WHERE user_id= '".$user_id."';";

	$res = mysqli_query($con, $query);
	
	echo "<h2>Order History</h2>";
	echo "<ul class='user-order-history-display'>";
	while($row = mysqli_fetch_array($res)) {
		echo "<li><p>Cost: ".$row['price']."</p><p>Order Time: ".$row['order_time']."</p></li><hr>";
	}
	echo "</ul>";
?>