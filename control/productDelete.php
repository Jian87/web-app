<?php
	$url = strval($_SERVER['REQUEST_URI']);

    $arr = explode("=", $url);

    $len = count($arr);

    $title = strval($arr[$len - 1]);
    $conn = mysqli_connect('localhost','root','root','product');

    if (!$conn){
        die('Could not connect: ' . mysqli_error($conn));
    }

    $query = "UPDATE products SET display = 'true' WHERE id='".$title."';";

    mysqli_query($conn, $query);
	header("Location: index.php");
	exit();
?>