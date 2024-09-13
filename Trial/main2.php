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
	<title>Transport Management System</title>
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
					<li><a href="seats_available.php">Tickets Available</a></li>
					<li><a href="login.php" onclick='return logout()'>LOGOUT</a></li>
				</ul>
			</div>

			<div class="search">
				<input class="srch" type="search" name="search" placeholder="Type to text">
				<a href="#"><button class="btn">Search</button></a>
			</div>
		</div>
<!--motor coach -->
		<div class="content">
			<a href="#" >
				<button class="cn" >
			   		<b>
			   			<?php echo "Welcome $username "; ?>
			   			<!--<?php echo "Welcome $userid "; ?>-->
			   		</b>	
			    </button>
		    </a><br><br><br>
		</div>
	    
		<div>    
		    <a href="booking.php" >
				<button class="cnb" >
			   		<b>
	    				<span></span><span></span><span></span><span></span>
			   			Manage Booking
			   		</b>	
			    </button>
		    </a>
		</div>    
        <div>
		     <a href="checkstat.php" >
				<button class="cnb" >
			   		<b>
			   			<span></span><span></span><span></span><span></span>
			   			Show My Ticket
			   		</b>	
			    </button>
		    </a>
		</div> 
        <div>
		     <a href="ubooking.php" >
				<button class="cnb" >
			   		<b>
			   			<span></span><span></span><span></span><span></span>
			   			Update Booking
			   		</b>	
			    </button>
		    </a>
        </div> 
		<div>
		     <a href="cancelorder.php" >
				<button class="cnb" >
			   		<b>
			   			<span></span><span></span><span></span><span></span>
			   			Cancel Booking 
			   		</b>	
			    </button>
		    </a>

		</div>

	</div>
	<div>
		<div class="tacbox">
		  <label><h3><b>CONDITIONS:</b></h3><br>
		  	<h4>
		  		<p>
		  			<center><b>1.</b>
		  			Cancellation is allowed Only one day prior to the travel <br><br>
		  			<b>2.</b>
		  			Timely departure or arrival of the bus<br><br>
		  			<b>3.</b>
		  			Users are advised to call the bus operator to find out the exact boarding point, or any information which they may need for the purpose of boarding or travel in that trip.
					</center>	  	
		  		</p>
			</h4>	 
		  </label>
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

<!-- Logout part and admin part-->
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
