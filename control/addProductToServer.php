<?php
	$name = $_POST['productName'];
	$product_id = $_POST['productId'];
	$descrp = $_POST['productDetail'];
	$quatity = $_POST['productQuatity'];
	$price = $_POST['productPrice'];
	$src = $_FILES["fileToUpload"]["name"];
	$category = $_POST['productCategory'];
	$conn = mysqli_connect('localhost','root','root','project');

	if(!$conn) {
		die('Could not connect: ' . mysqli_error($conn));
	}
	
	if(count($product_id) == 0) {
		$query = "INSERT INTO product (src, name, description, display, category, price) VALUES ('".$src."', '".$name."','".$descrp."', 'true', '".$category."', '".$price."' );";
		if($conn->query($query) === true) {
			header("location: ../index.php");
		} else {
			header("location: productUpdate.php");
		}
	} else {
		
    	if(strlen($src) == 0) {
    		$query = "UPDATE product SET name='".$name."', description='".$descrp."', category='".$category."', price='".$price."' WHERE id='".$product_id."';";
    		echo $query;
    	} else {
    		$query = "UPDATE product SET name='".$name."', src='".$src."', description='".$descrp."', category='".$category."', price='".$price."' WHERE id='".$product_id."';";
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