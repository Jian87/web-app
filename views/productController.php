<?php
	session_start();

    $name = $_GET['name'];
    $productId = $_GET['productId'];
	$conn = mysqli_connect('localhost','root','root','project');

    if (!$conn){
        die('Could not connect: ' . mysqli_error($conn));
    }

    if(strlen($name) == 0) {
    	$query = "SELECT * FROM product";
    } else {
    	$query = "SELECT * FROM product WHERE category='".$name."'";
    }
    
    if(strlen($productId) > 0) {
        $del = "UPDATE product SET display = 'false' WHERE id='".$productId."';";
        mysqli_query($conn, $del);
    }

    $res = mysqli_query($conn, $query);
    // $products = array();

    while($row = mysqli_fetch_array($res)) {
        
        if($row['display'] === 'true') {
            echo "<li class='product-item' data-price='".$row['price']."'><img class='product-img' src='../images/".$row['src']." 'alt='".$row['id']."'><br>";
            echo "<p>".$row['name']."</p>";
            echo "<button class='product-btn'><span class='price'>$".$row['price']."</span><span class='view-detail'>View Details</span></button><br>";
            echo "<button class='del-btn admin-btn'>Delete</button><button class='update-btn admin-btn'>Update</button></li>";
            // $product = array('src' => $row['src'], 'name' => $row['name'], 'title' => $row['id'], 'price' => $row['price']);
            // $products[] = array('product' => $product);
        }
        
    }

    // echo json_encode($products);
?>