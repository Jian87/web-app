<html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>CheckOut</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

    <script type="text/javascript" src="../js/main.js"></script>
    <link rel="stylesheet" href="../css/project.css">

</head>
<body>
<div class = "page-content">
    <div class="ad">
    </div>
    <div class = "header">
        <div class="top-menu">
            <span class="logo-text"  id="logo"> this is logo</span>
            <a class="header-btn" href="profile.php">my account</a>
            <a class="header-btn" id="myCart" href="chart.php">my cart</a>
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
    <div id="container">

        <div class="receipt">
            <?php 
                echo "The total price of your order is $<span class='receipt_amount'>";
                session_start();
                $url = strval($_SERVER['REQUEST_URI']);
                $arr = explode("=", $url);
                $amount = $arr[count($arr) - 1];
                echo $amount;

                echo "</span>, confirm to pay?<br>";
                echo "<div><button id='confirm_order'>Confirm</button></div>";
           ?>
       </div>

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