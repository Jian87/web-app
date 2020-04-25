<?php session_start() ?>
<!DOCTYPE html>
<html>
<head>
	<title>Chart</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../css/project.css" charset="utf-8">
    <script src="https://code.jquery.com/jquery-3.4.1.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="
  crossorigin="anonymous"></script>
    <script src="../js/main.js"></script>
</head>
<body>
<div class = "page-content">
    <div class="ad">
    </div>
    <div class = "header">
        <div class="top-menu">
            <span class="logo-text" id="logo">this is logo </span>
            <a class="header-btn" href="profile.php">my account</a>
            <a class="header-btn" href="chart.php">my cart</a>
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

    </br>
    </br>
    <div class="ad">
    </div>
    <div class="main-content">
        <?php

        session_start();

        $con = mysqli_connect("localhost", "root", "root", "project");
        
        $user_id = $_SESSION["user_id"];
        $goods = array();
        $cart_items = "";
        
        $i = 0;
        $subtotal = 0.00;
        if ($con) {
            
            echo "<div class='user-chart'><h2 class='chart-title'>Shopping Bag</h2>";

            $sql = "SELECT * FROM chart, product WHERE user_id = '".$user_id."' and chart.product_id = product.id";

            $query = mysqli_query($con, $sql);
            
            while($row = mysqli_fetch_array($query))
            {		
            	echo "<div class='chart-item-display'><div class='chart-item-img' ><img src='../images/".$row['src']."' alt='".$row['id']."'></div>";
	        	echo "<div class='chart-item-info'><h3 class='product-name'>".$row['name']."</h3>";
	        	echo "<div class ='quantity'><span>Quantity</span><span class='quantity-input'><button class='quantity-button chart-sub-btn'>-</button><input class='input-num' type='text' value='".$row['product_qty']."'><button class='quantity-button chart-add-btn'>+</button></span></div>";
	        	echo "<p class='chart-item-price'>".$row['price']."</p>";
	        	echo "<button class='chart-remove-btn'><span class='remove-from-chart'>Remove</span></button>
	        	</div>";

	        	echo "</div>";
            	
	            $goods[$i]['product_price'] = $row['price'];
	            $goods[$i]['quantity'] = $row['product_qty'];
	            $subtotal += $goods[$i]['product_price'] * $goods[$i]['quantity'];

            }
     		
     		echo "</div>";
            
			$tax = 0.00825 * $subtotal;
            $total = $tax + $subtotal;
            echo "<div class='check-out'><p class='check-out-item'><span class='money-title'>Product Cost: </span><span class='subtotal'>". $subtotal."</p>";
	    	echo "<p class='check-out-item'><span class='money-title'>Tax: </span><span class='tax'>".$tax."</span></p>";
	    	echo "<p class='check-out-item'><span class='money-title'>Total Cost: </span><span class='amount'>".$total."</span></p>";
	    	echo "<button class='check-out-btn'>Check Out</button></div>";
        }
        else {
            echo "Unable to connect to database!";
        }

        ?>

    </div>
    <div class="ad">
    </div>
    <div class="footer">
        <div class="final">
            <p>Copyright &copy; 2020 UTD-CS6314 TEAM16 Share Project</p>
            <p class="links"><a href="#">Home</a> / <a href="#">About</a> / <a href="#">Contact</a> / <a href="#">Browse</a></p>
        </div>
    </div>
</div>
</body>
</html>