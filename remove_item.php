<?php
session_start();
$con = mysqli_connect("localhost", "root", "root", "project");
//$user_id = "27";
$user_id = $_SESSION["user_id"];
$ids = $_GET["product_id"];

$sql = "DELETE FROM chart WHERE product_id = '$ids' and user_id = '$user_id'";
mysqli_query($con, $sql);


header("location:chart.php");
?>