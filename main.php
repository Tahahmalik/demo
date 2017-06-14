<html>
<head>
	<title> ABC Design - Main Page </title>

	<script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<link rel="stylesheet" type="text/css" href="css/style.css"/>
	<script src="js/MyGuests.js"></script>
	
	
</head>

<?php
   session_start(); //starts the session
   if($_SESSION['user']){ // checks if the user is logged in  
   }
   else{
   	 Print '<script>alert(" You need to log in!") </script>';
      header("location: login.php"); // redirects if user is not logged in
   }
   $user = $_SESSION['user']; //assigns user value
   ?>

<body>
	
	<img id="topbanner" src="images/Top-banner.png"/>
	<p> Hello <?php Print "$user"?> </p>
	<a href="logout.php"> Click here to logout </a> 
	<div id="menubar">
	<ul id="menu">
	<li class="listitem"> Customers </li>
	<li class="listitem"> Cars </li>
	<li class="listitem"> Plates </li>
	</ul>
	</div>
	<iframe id="frame" src="cars.php" height="100%" width="100%"> </iframe>
	
	</body>
	</html>
