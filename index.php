
<?php 
	session_start();
	$cookie_name = $_SESSION["username"];
	$cookie_email = $_SESSION["email"];
    $cookie_userId = $_SESSION["user_id"];
	setcookie($cookie_name, $cookie_email, $cookie_userId, time() + 3600, "/");
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
	<div class = "page-content" id='top'>

        <div class="ad"></div>
        <div class = "header">
            <div class="top-menu">
                <span class="logo-text"> this is logo</span>
                <?php
					if(strlen($_SESSION["username"]) > 0) {
						if(!isset($_COOKIE[$cookie_name])) {
							echo "<a class= 'header-btn' href='profile.php'>Welcome <span class='user'>".$_SESSION["username"]."</span><span class='userId'>".$_SESSION['user_id']."</span></a>";
							echo "<a class='header-btn' href='controller.php'>Sign Out</a>";
						} else {
							echo "<a class= 'header-btn' href='profile.php'>Welcome <span class='user'>".$_SESSION["username"]."</span><span class='userId'>".$_SESSION['user_id']."</span></a>";
							echo "<a class= 'header-btn' href='controller.php'>Sign Out</a>";
						}
                        echo "<a class='header-btn' href='chart.php'>my chart</a>";
					} else {
						echo "<a class='header-btn' href='login.php' ><span class='user'>Guest</span>, Sign In!<a>";
                        echo "<a class='header-btn' href='login.php'>my chart</a>";
					}
				?>
                <!-- <a class="header-btn" value="2" name="chart">my chart</a> -->
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

        <div class="main-content"> 
            <div class = "searchContainer">
                <form class="search">
                    <input type="text" placeholder="Diamond Vine" name="search" id="search">
                    <button type="submit" id="search-btn">Search</button>
                </form>
            </div>

            <div class="left"></div>
            <div class="result">
                <div class="sort">
                    <span class="sort-text">Enjoy your shopping </span>
                    <span class="sort-option" value="">
                       <!--  <option value="1">Price Low To High</option>
                        <option value="2">Price High To Low</option> -->
                    </span>
                    <button class="admin-btn admin-display-all-btn">Display All Products</button>
                    <button class="admin-btn admin-add-new-btn">Add New Product</button>
                </div>
                <div class="container">
                    <ul class="product-list">
                        <?php
                            $url = strval($_SERVER['REQUEST_URI']);

                            $arr = explode("=", $url);

                            $len = count($arr);

                            $product_category = strval($arr[$len - 1]);
                            if($product_category == "Men's") {
                                $product_category = "mens";
                            } else if($product_category == 'Love%20&%20Engagement') {
                                $product_category = "Love & Engagement";
                            } else if($product_category == "Home%20&%20Accessories") {
                                $product_category = "Home & Accessories";
                            }


                            $conn = mysqli_connect('localhost','root','root','project');

                            if (!$conn){
                                die('Could not connect: ' . mysqli_error($conn));
                            }

                            $query = "SELECT * FROM product WHERE category='".$product_category."'";

                            $res = mysqli_query($conn, $query);

                            while($row = mysqli_fetch_array($res)) {
                                if($row['display'] === 'true') {
                                    echo "<li class='product-item' data-price='".$row['price']."'><img class='product-img' src='../images/".$row['src']." 'alt='".$row['id']."'><br>";
                                    echo "<p>".$row['name']."</p>";
                                    echo "<button class='product-btn'><span class='price'>$".$row['price']."</span><span class='view-detail'>View Details</span></button><br>";
                                    echo "<button class='del-btn admin-btn'>Delete</button><button class='update-btn admin-btn'>Update</button></li>";
                                }
                            }
                        ?>
                    </ul>
                </div>
                <div class="view-more">
                        <button class="view-more-btn">View More</button>
                        <br>
                        <a class="return-top-btn" href="#top">Back To Top</a>
            	</div>
            </div>
            

            <div class="right"></div>
        </div>
        <div class="story">
            <h1 class="story-header">Discover Necklaces & Pendants</h1>
            <p class="story-descrp">Nothing accentuates the neckline like a Tiffany necklace. Discover stunning designs for every day, from shimmering diamond pendants to delicate gold necklaces.</p>
            <ul class="story-option-list">
                <li class="story-option"><a href="storyPlant.php">Planet & Environment</a></li>
                <li class="story-option story-option-right"><a href="storyPeople.php">People & Community</a></li>
                <li class="story-option story-option-right"><a href="storyProduct.php">Product & Make</a></li>
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



