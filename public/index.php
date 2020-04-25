
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
    <link rel="stylesheet" type="text/css" href="css/project.css">
    <script src="https://code.jquery.com/jquery-3.4.1.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="
  crossorigin="anonymous"></script>
    <script src="js/main.js"></script>

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
							echo "<a class= 'header-btn' href='./views/'>Welcome <span class='user'>".$_SESSION["username"]."</span></a>";
							echo "<a class='header-btn' href='controller.php'>Sign Out</a>";
						} else {
							echo "<a class= 'header-btn' href='./views/'>Welcome <span class='user'>".$_SESSION["username"]."</span></a>";
							echo "<a class= 'header-btn' href='controller.php'>Sign Out</a>";
						}
					} else {
						echo "<a class='header-btn' href='views/login.php' ><span class='user'>Guest</span>, Sign In!<a>";
					}
				?>
                <a class="header-btn" value="2" name="chart">my chart</a>
            </div>
        </div>
        <div class="filter">
            <ul class="filter-menu">
                <li class="filter-menu-detail"><a>Ring</a></li>
                <li class="filter-menu-detail"><a>Love & Engagement</a></li>
                <li class="filter-menu-detail"><a>Watches</a></li>
                <li class="filter-menu-detail"><a>Home & Accessories</a></li>
                <li class="filter-menu-detail"><a>Fragrance</a></li>
                <li class="filter-menu-detail"><a>Men’s</a></li>
                <li class="filter-menu-detail"><a>Gift</a></li>
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
                        
                    </ul>
                </div>
                <div class="view-more">
                        <button class="view-more-btn">View More</button>
                        <br>
                        <button class="return-top-btn">Back To Top</button>
            	</div>
            </div>
            

            <div class="right"></div>
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

