<?php
// Start the session
session_start();

//asigning values for $username and $userid
$username= " ". $_SESSION["user_name"] ." ";
$userid= " ". $_SESSION["user_id"] ." ";

?>
<!DOCTYPE html>
<html>
<head>
	<title>Bus Booking System</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="css1/main.css">
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css">
</head>
<body>
	<div class="main">
		<div class="navbar">
			<div class="icon">
				<h1 class="logo">
					<img src="css1/images/micon.png">
				</h1>
			</div>
			<div class="menu">
				<ul>
					<li><a href="main.php">HOME</a></li>
					<li><a href="main2.php">FEATURES</a></li>
					<li><a href="adlogin.php" onclick='return admin()'>ADMIN</a></li>
					<li><a href="#">CONTACT</a></li>
					<li><a href="login.php" onclick='return logout()'>LOGOUT</a></li>
				</ul>
			</div>
			<div class="search">
				<input class="srch" type="search" name="" placeholder="Type to text">
				<a href="#"><button class="btn">Search</button></a>
			</div>
		</div>

		<div class="content">
			<br><br><br><br><br><br>
			<h1>A bus is a vehicle  
				<br>that runs twice as fast<br>
				<span>
					 
				</span>
			</h1>
		<p class="par">when you are after it <br>as when you are in it.</p>

			
			<a href="#" >
				<button class="cn" >
			   		<b>
			   			<?php echo "Welcome $username "; ?>
			   			<!--<?php echo "Welcome $username "; ?>-->
			   		</b>	
			    </button>
		    </a>
		</div>
	</div>
<script src="http://unpkg.com/ionicons@5.4.0/dist/ionicons.js"></script>





<!-- footer-->

<footer class="footer">
		<div class="container">
			<div class="row">
				<div class="footer-col">
					<h4>company</h4>
						<ul>
							<li><a href="#">About Us</a></li>
							<li><a href="#">Our Service</a></li>
							<li><a href="#">Privacy Policy</a></li>
							<li><a href="#">Future Plans</a></li>
						</ul>
				</div><div class="footer-col">
					<h4>get help</h4>
						<ul>
							<li><a href="#">FAQ</a></li>
							<li><a href="#">Customer Review</a></li>
							<li><a href="#">Contact US</a></li>
							<li><a href="#">Your Activities</a></li>
							<li><a href="#">Payment options</a></li>
						</ul>
				</div><div class="footer-col">
					<h4>online shop</h4>
						<ul>
							<li><a href="#">Bus Booking</a></li>
							<li><a href="#">Bus Enquiry</a></li>
							<li><a href="#">Canceling</a></li>
							<li><a href="#">Show Ticket</a></li>
						</ul>
				</div><div class="footer-col">
					<h4>follow us</h4>
					<div class="social-links">
						<ul>
							<li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
							<li><a href="#"><i class="fab fa-twitter"></i></a></li>
							<li><a href="#"><i class="fab fa-instagram"></i></a></li>
							<li><a href="#"><i class="fab fa-google-plus-g"></i></a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</footer>
<!-- Logout part -->
<script>
function logout()
{
	return confirm('Are you sure you want to logout?');
}

function admin()
{
	return confirm('You want to access Admin Privileges ')
} 
</script>


</body>
</html>
