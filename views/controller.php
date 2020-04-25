<?php
	session_start();
	$_SESSION['username'] = $_POST["username"];
	$_SESSION['email'] = $_POST['email'];
	header("location: ../index.php");
	exit();
?>