<?php 
	session_start();
	$cookie_name = $_SESSION["username"];
	$cookie_email = $_SESSION["email"];
	setcookie($cookie_name, $cookie_email, time() + 3600, "/");
?>
<html>
<head>

	<title>Project</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../css/project.css">
    <script src="https://code.jquery.com/jquery-3.4.1.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="
  crossorigin="anonymous"></script>
    <script src="../js/main.js"></script>

</head>

<body style="overflow-x: hidden;">
	<div class = "page-content">

        <div class="ad"></div>
        <div class = "header">
            <div class="top-menu">
                <span class="logo-text"> this is logo</span>
                <?php
					if(strlen($_SESSION["username"]) > 0) {
						if(!isset($_COOKIE[$cookie_name])) {
							echo "<a class= 'header-btn' href='../views/profile.php'>Welcome <span class='user'>".$_SESSION["username"]."</span></a>";
							echo "<a class='header-btn' href='../views/controller.php'>Sign Out</a>";
						} else {
							echo "<a class= 'header-btn' href='../views/profile.php'>Welcome <span class='user'>".$_SESSION["username"]."</span></a>";
							echo "<a class= 'header-btn' href='../views/controller.php'>Sign Out</a>";
						}
					}
				?>
                <a class="header-btn" value="2" name="chart"href='../views/chart.php'>my chart</a>
            </div>
        </div>
        <div class="filter">
            <ul class="filter-menu">
                <li class="filter-menu-detail"><a>Jewelry</a></li>
	            <li class="filter-menu-detail"><a>Love & Engagement</a></li>
	            <li class="filter-menu-detail"><a>Watches</a></li>
	            <li class="filter-menu-detail"><a>Home & Accessories</a></li>
	            <li class="filter-menu-detail"><a>Fragrance</a></li>
	            <li class="filter-menu-detail"><a>Men's</a></li>
	            <li class="filter-menu-detail"><a>Gifts</a></li>
            </ul>
        </div>
        <div class="ad-upload"></div>
        <div class="main-content"> 

            <div class="left"></div>
            <div class="result">
                <form class='upload' action="upload.php" method="post" enctype="multipart/form-data">
					<table class="upload-table">
						<?php 
						session_start();
						$url = strval($_SERVER['REQUEST_URI']);
				        $arr = explode("=", $url);

				        $len = count($arr);

				        $product_id = strval($arr[$len - 1]);
				        $conn = mysqli_connect('localhost','root','root','project');

				        if (!$conn){
				            die('Could not connect: ' . mysqli_error($conn));
				        }

				        $query = "SELECT * FROM product WHERE id='".$product_id."'";

				        $res = mysqli_query($conn, $query);
				        
			        	$row = mysqli_fetch_array($res);

			        	echo "<tr><td><label>Select image to upload:</label></td>";
			    		echo "<td><input type='file' name='fileToUpload' id='fileToUpload' value='".$row['src']."' placeholder='".$row['src']."'></td></tr>";
			    		echo "<tr><td><label>Name:</label></td><td>";
			    		echo "<input type='text' name='productName' id='productName' value='".$row['name']."' placeholder=''></td></tr>";

			    		echo "<tr><td><label>Category:</label></td><td>";
			    		echo "<input type='text' name='productCategory' id='productCategory' value='".$row['category']."' placeholder='".$row['category']."'></td></tr>";

			    		
			    		if(count($row) > 0) {
			    			echo "<tr><td>P_ID:</td><td>";
			    			echo "<input readonly='readonly' type='text' name='productId' id='productId' value= '".$row['id']."' placeholder = '".$row['id']."'></td></tr>";
			    		} 

			    		// else {
			    		// 	echo "<input type='text' name='productId' id='productId' value= '' placeholder = ''></td></tr>";
			    		// }
			    		
			    		echo "<tr><td>Description:</td><td>";
			    		echo "<textarea rows='10' cols='100' name='productDetail' id='productDetail' placeholder = '".$row['description']."'>".$row['description']."</textarea></td></tr>";
			    		echo "<tr><td>Quatity:</td><td>";
			    		echo "<input type='text' name='productQuatity' id='productQuatity'></td></tr>";

			    		echo "<tr><td>Price:</td><td>";
		    			echo "<input type='text' name='productPrice' id='productPrice' value='".$row['price']."' placeholder='".$row['price']."'></td></tr>";
			    	
			    		
					?>
					</table>
				    <input class="upload-btn" type="submit" value="Upload Product Here" name="submit"><br>
				</form>
            </div>
            

            <div class="right"></div>
        </div>
  
        <div class="ad">
        </div>
        <div class="footer">
            <div class="row final">
                <p>Copyright &copy; 2020 UTD-CS6314 TEAM16 Share Project</p>
                <p class="links"><a href="#">Home</a> / <a href="#">About</a> / <a href="#">Contact</a> / <a href="#">Browse</a></p>
            </div>   
        </div>

	</div>

	
</body>

</html>