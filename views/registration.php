<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Registration</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../css/project.css" charset="utf-8">
    <script src="https://code.jquery.com/jquery-3.4.1.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="
  crossorigin="anonymous"></script>
    <script src="../js/main.js"></script>
</head>
<body>

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
			require('db.php');
			// If form submitted, insert values into the database.
			if (isset($_REQUEST['username'])){
			        // removes backslashes
			 //参数
			 $username = stripslashes($_REQUEST['username']);
			        //escapes special characters in a string
			 $username = mysqli_real_escape_string($con,$username);
			 $email = stripslashes($_REQUEST['email']);
			 $email = mysqli_real_escape_string($con,$email);
			 $password = stripslashes($_REQUEST['password']);
			 $password = mysqli_real_escape_string($con,$password);
			 $trn_date = date("Y-m-d H:i:s");
			 //插入数据库
			        $query = "INSERT into `users` (username, password, email, trn_date)
			VALUES ('$username', '".md5($password)."', '$email', '$trn_date')";
			        $result = mysqli_query($con,$query);
			        if($result){
			            echo "<div class='register-form'>
			<h3>You are registered successfully.</h3>
			<br/>Click here to <a href='login.php'>Login</a></div>";
			        }
			    }else{
			?>
			<div class="register-form">
			<h1>Registration</h1>

			<form class='register-body'name="registration" action="" method="post">
			<input type="text" name="username" placeholder="Username" required /><br>
			<input type="email" name="email" placeholder="Email" required /><br>
			<input type="password" name="password" placeholder="Password" required /><br>
			<input type="submit" name="submit" value="Register" />
			</form>
			</div>
			<?php } ?>


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