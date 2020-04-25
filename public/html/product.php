
	<?php 
		session_start();
		// if(strlen($_SESSION["username"]) > 0) {
		// 	if(!isset($_COOKIE[$cookie_name])) {
		// 		echo "<a href='profile.php'>Welcome ".$_SESSION["username"]."</a>";	
		// 	} else {
		// 		echo "Welcome ".$cookie_name;
		// 	}
		// } else {
		// 	echo "<a href='login.php'>Guest, Sign In!<a>";
		// }
		
		// echo "<br>";

	
		// echo "<img src='../images/test.jpg'>";

	?>

<html>	
<head>
	<title>product-test</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../css/project.css" charset="utf-8">
    <script src="https://code.jquery.com/jquery-3.4.1.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="
  crossorigin="anonymous"></script>
    <script src="../js/main.js"></script>
</head>


<body>
	<div class = "page-content">

        <div class="ad"></div>

        <div class = "header">
            <div class="top-menu">
                <span class="logo-text"> this is logo</span>
                <?php
					if(strlen($_SESSION["username"]) > 0) {
						if(!isset($_COOKIE[$cookie_name])) {
							echo "<a class= 'header-btn' href='../views'>Welcome ".$_SESSION["username"]."</a>";
							echo "<a class='header-btn' href='../controller.php'>Sign Out</a>";
						} else {
							echo "<a class= 'header-btn' href='../views'>Welcome ".$_SESSION["username"]."</a>";
							echo "<a class= 'header-btn' href='../controller.php'>Sign Out</a>";
						}
					} else {
						echo "<a class='header-btn' href='../views/login.php' >Guest, Sign In!<a>";
					}
				?>
                <a class="header-btn" value="2" name="chart">my chart</a>
            </div>
        </div>

        <div class="filter">
            <ul class="filter-menu">
                <li class="filter-menu-detail"><a>Jewelry</a></li>
                <li class="filter-menu-detail"><a>Love & Engagement</a></li>
                <li class="filter-menu-detail"><a>Watches</a></li>
                <li class="filter-menu-detail"><a>Home & Accessories</a></li>
                <li class="filter-menu-detail"><a>Fragrance</a></li>
                <li class="filter-menu-detail"><a>Men’s</a></li>
                <li class="filter-menu-detail"><a>Gifts</a></li>
            </ul>
        </div>

        <div class="main-content">
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

                while($row = mysqli_fetch_array($res)) {
                    $src = $row['src'];
                    $name = $row['name'];
                    $descp = $row['description'];
                }

				echo "<div class='product-display'>";
				echo "<div class='product-big-img'><img src='../images/".$src."'></div>";
				echo "<div class='product-buy-info'><h4 class='product-title'>".$title."</h4>";
				echo "<h1 class='product-name'>".$name."</h1>";
				echo "<div class ='quantity'><span>Quantity</span><span class='quantity-input'><button class='quantity-button'>-</button><input type='text' value='1' placeholder='1'><button class='quantity-button'>+</button></span></div>";

				echo "<button class='chart-btn'><span class='price'>$15,5000</span><span class='add-to-chart'>Add To Chart</span></button>";
				echo "<div class='product-descrp'> <h4>Description & Details</h4><p>".$descp."</p></div></div></div>";

				echo "<div class='mayInterest'><h1>You May Also Like</h1><ul class='product-list'>";
			    echo "<li class='interest-item'><img src='test.jpg'><br><p>Tiffany hearwear gold wrap neckplace in 18k gold</p></li>";
			    echo "<li class='interest-item'><img src='test.jpg'><br><p>Tiffany hearwear gold wrap neckplace in 18k gold</p></li>";
			    echo "<li class='interest-item'><img src='test.jpg'><br><p>Tiffany hearwear gold wrap neckplace in 18k gold</p></li>";
			    echo "<li class='interest-item'><img src='test.jpg'><br><p>Tiffany hearwear gold wrap neckplace in 18k gold</p></li></ul></div>";
				
				include 'moresvs.php';
            ?>
        </div>
            
        <div class="story">
            <h1 class="story-header">Discover Necklaces & Pendants</h1>
            <p class="story-descrp">Nothing accentuates the neckline like a Tiffany necklace. Discover stunning designs for every day, from shimmering diamond pendants to delicate gold necklaces.</p>
            <ul class="story-option-list">
                <li class="story-option"><a>Gold Necklaces & Pendants</a></li>
                <li class="story-option story-option-right"><a>Gold Necklaces & Pendants</a></li>
                <li class="story-option story-option-right"><a>Gold Necklaces & Pendants</a></li>
            </ul>
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