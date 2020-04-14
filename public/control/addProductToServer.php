<?php
	$name = $_POST['productName'];
	$title = $_POST['productTitle'];
	$descrp = $_POST['productDetail'];
	$quatity = $_POST['productQuatity'];
	$src = $_FILES["fileToUpload"]["name"];
	$conn = mysqli_connect('localhost','root','root','product');

	if(!$conn) {
		die('Could not connect: ' . mysqli_error($conn));
	}

	$check = "SELECT * FROM products WHERE id='".$title."'";

	$res = mysqli_query($conn, $check);
	$row = mysqli_fetch_array($res);

    if(count($row) == 0) {
    	echo "insert";
    	$query = "INSERT INTO products (id, src, name, description, display) VALUES ('".$name."', '".$src."', '".$title."','".$descrp."', 'true' );";

		if($conn->query($query) === true) {
			header("location: ../index.php");
		} else {
			header("location: productUpdate.php");
		}

    } else {

    	if(strlen($src) == 0) {
    		$query = "UPDATE products SET name='".$name."', description='".$descrp."' WHERE id='".$title."';";
    	} else {
    		$query = "UPDATE products SET name='".$name."', src='".$src."', description='".$descrp."' WHERE id='".$title."';";
    	}

		if($conn->query($query) === true) { 
			header("location: ../index.php");
		} else {
			echo "Error: ". $query. "<br>". $conn->error;
			header("location: productUpdate.php");
		}
    }
	$conn->close();
?>