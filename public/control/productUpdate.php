<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

	<form action="upload.php" method="post" enctype="multipart/form-data">
		<table>
		<?php 
			session_start();
			$url = strval($_SERVER['REQUEST_URI']);
	        $arr = explode("=", $url);

	        $len = count($arr);

	        $title = strval($arr[$len - 1]);
	        $conn = mysqli_connect('localhost','root','root','product');

	        if (!$conn){
	            die('Could not connect: ' . mysqli_error($conn));
	        }

	        $query = "SELECT * FROM products WHERE id='".$title."'";

	        $res = mysqli_query($conn, $query);
	        
        	$row = mysqli_fetch_array($res);

        	echo "<tr><td><label>Select image to upload:</label></td>";
    		echo "<td><input type='file' name='fileToUpload' id='fileToUpload' value='".$row['src']."' placeholder='".$row['src']."'></td></tr>";
    		echo "<tr><td><label>Name:</label></td><td>";
    		echo "<input type='text' name='productName' id='productName' value='".$row['name']."' placeholder=''></td></tr>";
    		echo "<tr><td>Title:</td><td>";
    		if(count($row) > 0) {
    			echo "<input readonly='readonly' type='text' name='productTitle' id='productTitle' value= '".$row['id']."' placeholder = '".$row['title']."'></td></tr>";
    		} else {
    			echo "<input type='text' name='productTitle' id='productTitle' value= '' placeholder = ''></td></tr>";
    		}
    		
    		echo "<tr><td>Description:</td><td>";
    		echo "<input type='text' name='productDetail' id='productDetail' value='".$row['description']."' placeholder = '".$row['description']."'></td></tr>";
    		echo "<tr><td>Quatity:</td><td>";
    		echo "<input type='text' name='productQuatity' id='productQuatity'></td></tr>";
		?>

	
	    
	</table>
	    <input type="submit" value="Upload Product Here" name="submit"><br>
	</form>


</body>
</html>