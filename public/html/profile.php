<?php
	session_start();
?>

<html>
<head>
	<title>user-test</title>
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
                <span class="logo-text">this is logo</span>
                <button class="header-btn" >my account</button>
                <button class="header-btn" >my chart</button>
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
        	<div class="personal-container">
             <div class="welcome-content" style="height: 5em;"> <div class="hello-msg" ><?php echo "<h2>Welcome ".$_SESSION['username']."!</h2>"; ?>
             </div> <div class="personal-sign-out"><a href="../controller.php">Sign Out</a></div></div>

             <div class="personal-info">
                 <button class ="personal-btn" id="personal-order-history">Test</button>
                 <button class ="personal-btn" id="personal-order-chart">Test</button>
                 <button class ="personal-btn" id="personal-info">Test</button>

                 <button class ="personal-btn" id="personal-favorite-list">Test</button>
                 <button class ="personal-btn" id="personal-gift-cards">Test</button>
                 <button class ="personal-btn" id="personal-membership">Test</button>
             </div>
            </div>

            <div class="more-svs">
                <div class="service-item">
                    <h3>Complimentary Shipping & Returns</h3>
                    <p>Purchases made online can be returned or exchanged within 60 days, plus shipping is on us.</p>
                    <button>learn more</button>
                </div>
                <div class="service-item">
                    <h3>Complimentary Shipping & Returns</h3>
                    <p>Purchases made online can be returned or exchanged within 60 days, plus shipping is on us.</p>
                    <button>learn more</button>
                </div>
                <div class="service-item">
                    <h3>Complimentary Shipping & Returns</h3>
                    <p>Purchases made online can be returned or exchanged within 60 days, plus shipping is on us.</p>
                    <button>learn more</button>
                </div>
            </div>
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