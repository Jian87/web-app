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
            <div class="result" >
            	<div class="product-story product-story-right product-story-top">
               		<div class="product-story-description">
	                	<div>
	                		<h2>Planet</h2>
	                		<p>We’re committed to protecting the natural world by taking bold action on climate change and conservation.</p>
	                	</div>
                	</div>
                	<div class = "product-story-img"><img src="../images/Plant1.png" style="">
                	</div>
                </div>

                <div class="product-story product-story-left" style="">
                	<div class = "product-story-img" style=""><img src="../images/Planet2.jpg" style="">
                	</div>

               		<div class="product-story-description" style="">
	                	<div style="">
	                		<h2>Achieving Net Zero Emissions</h2>
	                		<p>Tiffany diamonds are sourced with care and consideration. We believe the diamond sector can contribute positive value to communities it operates within—from the moment diamonds are unearthed as rough stones and throughout their journey to polished gemstones. </p>
	                		<br>
							<p>We uphold high standards in quality and for social and environmental practices. For instance, we have long pushed to expand the Kimberley Process definition of “conflict free” diamonds to protect human rights and the environment. When sourcing our diamonds, we go above and beyond the Kimberley Process by asking more of our suppliers, including through our Diamond Source Warranty Protocol.</p>
							<br>
							<p>We also maintain our high standards through leading approaches to diamond traceability. We source the majority of our rough diamonds from five countries—Botswana, Canada, Namibia, Russia and South Africa—and in Fiscal Year 2018, we were able to trace 100%* of our rough diamonds to known mines or responsible suppliers with a limited number of known mines. In 2019, we enhanced our approach to transparency through our Diamond Source Initiative, which shares with our customers the provenance—region or countries of origin—of all newly sourced, individually registered diamonds (0.18 carats and larger). Over the past 15 years, we have implemented a strategy that gives us a strong chain-of-custody process for our diamonds, that in part is because we have direct oversight of our own diamond cutting and polishing workshops, giving us control over the sourcing and conditions.</p>
	                	</div>
                	</div>
                </div>
                <div class="product-story product-story-right">

               		<div class ="product-story-description">
	                	<div>
	                		<h2>Environmental Advocacy and Land Preservation</h2>
	                		<p>For more than two decades, we have made dedicated efforts to responsibly source the precious metals we use in our products, which are primarily gold, platinum and silver. We are able to carefully monitor the sourcing of precious metals—with an emphasis on sustainability—in part because we manufacture the majority of our jewelry in our own facilities.</p>
	                		<br>
							<p>In 2019, we began to source small amounts of artisanally mined metals through a U.S. pilot project that is designed to create environmental benefits while practicing responsible mining techniques. We continue to seek opportunities to increase sourcing from responsible artisanal mines around the world. We believe that promoting responsible practices in the artisanal mining sector has the potential to dramatically improve working conditions and livelihoods for miners, while protecting local environments.</p>
							<br>
							<p>In 2019, we began to source small amounts of artisanally mined metals through a U.S. pilot project that is designed to create environmental benefits while practicing responsible mining techniques. We continue to seek opportunities to increase sourcing from responsible artisanal mines around the world. We believe that promoting responsible practices in the artisanal mining sector has the potential to dramatically improve working conditions and livelihoods for miners, while protecting local environments.</p>
							
	                	</div>
                	</div>
                	<div class="product-story-img" ><img src="../images/Planet3.jpg">
                	</div>
                </div>


                <div class="product-story product-story-left">
                	<div class="product-story-img"><img src="../images/Planet4.jpg"></div>

               		<div class="product-story-description">
	                	<div>
	                		<h2>Environmental Philanthropy</h2>
	                		<p>Tiffany diamonds are sourced with care and consideration. We believe the diamond sector can contribute positive value to communities it operates within—from the moment diamonds are unearthed as rough stones and throughout their journey to polished gemstones. </p>
	                		<br>
							<p>We uphold high standards in quality and for social and environmental practices. For instance, we have long pushed to expand the Kimberley Process definition of “conflict free” diamonds to protect human rights and the environment. When sourcing our diamonds, we go above and beyond the Kimberley Process by asking more of our suppliers, including through our Diamond Source Warranty Protocol.</p>
							<br>
							<p>We also maintain our high standards through leading approaches to diamond traceability. We source the majority of our rough diamonds from five countries—Botswana, Canada, Namibia, Russia and South Africa—and in Fiscal Year 2018, we were able to trace 100%* of our rough diamonds to known mines or responsible suppliers with a limited number of known mines. In 2019, we enhanced our approach to transparency through our Diamond Source Initiative, which shares with our customers the provenance—region or countries of origin—of all newly sourced, individually registered diamonds (0.18 carats and larger). Over the past 15 years, we have implemented a strategy that gives us a strong chain-of-custody process for our diamonds, that in part is because we have direct oversight of our own diamond cutting and polishing workshops, giving us control over the sourcing and conditions.</p>
	                	</div>
                	</div>
                </div>

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