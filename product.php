
	<?php 
		session_start();
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
                            echo "<a class= 'header-btn' href='profile.php'>Welcome <span class='user'>".$_SESSION["username"]."</span></a>";
                            echo "<a class='header-btn' href='controller.php'>Sign Out</a>";
                        } else {
                            echo "<a class= 'header-btn' href='profile.php'>Welcome <span class='user'>".$_SESSION["username"]."</span></a>";
                            echo "<a class= 'header-btn' href='controller.php'>Sign Out</a>";
                        }
                        echo "<a class='header-btn' href='chart.php'>my chart</a>";
                    } else {
                        echo "<a class='header-btn' href='login.php' ><span class='user'>Guest</span>, Sign In!<a>";
                        echo "<a class='header-btn' href='login.php'>my chart</a>";
                    }
				?>
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

                while($row = mysqli_fetch_array($res)) {
                    $src = $row['src'];
                    $name = $row['name'];
                    $descp = $row['description'];
                    $category = $row['category'];
                    $price = $row['price'];

                }

				echo "<div class='product-display'>";
				echo "<div class='product-big-img'><img src='../images/".$src."' alt='".$product_id."'></div>";
				echo "<div class='product-buy-info'><h3 class='product-title'>".$category."</h3>";
				echo "<h1 class='product-name'>".$name."</h1>";
				echo "<div class ='quantity'><span>Quantity</span><span class='quantity-input'><button class='quantity-button sub-btn'>-</button><input class='input-num' type='text' value='1' placeholder='1'><button class='quantity-button add-btn'>+</button></span></div>";

				echo "<button class='chart-btn'><span class='price'>$ ".$price."</span><span class='add-to-chart'>Add To Chart</span></button>";
				echo "<div class='product-descrp'> <h4>Description & Details</h4><p>".$descp."</p></div></div></div>";

				echo "<div class='mayInterest'><h1>You May Also Like</h1><ul class='product-list mayInterest-list'>";

                $x = 0;
                $query2 = "SELECT * FROM product WHERE category='".$category."' AND display='true' AND NOT id='".$product_id."'";
                $res2 = mysqli_query($conn, $query2);

                while($row = mysqli_fetch_array($res2)) {
                    echo "<li class='interest-item'><img src='../images/".$row['src']."'  alt='".$row['id']."'><br><p>".$row['name']."</p></li>";
                    $x++;
                    if($x == 4) break;
                }

			    echo "</ul></div>";
				
				include 'moresvs.php';
            ?>
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