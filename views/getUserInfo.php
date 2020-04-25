<?php
	session_start();
	$user_id = $_SESSION['user_id'];
	require('db.php');

	$query = "SELECT * FROM users WHERE id= '".$user_id."';";

	$res = mysqli_query($con, $query);
	$row = mysqli_fetch_array($res);

	echo "<form class='user-info-display-form'><table class='user-info-table'>";
	echo "<h2>User Infomation</h2>";

	echo "<tr><td><label>Name: </label></td>";
	echo "<td><input type='text' name='username' value='".$row['username']."' placeholder='".$row['username']."'></td></tr>";
	echo "<tr><td><label>Contact:</label></td><td>";
	echo "<input type='text' name='useremail' value='".$row['email']."' placeholder='".$row['email']."'></td></tr>";

	echo "<tr><td><label>Register Date:</label></td><td>";
	echo "<input type='text' name='trn_date' value='".$row['trn_date']."' placeholder='".$row['trn_date']."'></td></tr>";

	echo "<tr><td>Password:</td><td>";
	echo "<input type='password' name='userpswd' value='".$row['password']."' placeholder='".$row['password']."'></td></tr>";

	echo "</table></form>";

	exit();
?>