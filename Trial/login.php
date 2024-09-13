<?php
// Start the session 
session_start();
?>
<?php 
 
 if($_SERVER["REQUEST_METHOD"]=="POST")
 {
 	include('include/connect.php');
 	$username=$_POST["username"];
 	$password=$_POST["pass"];

 	if(!preg_match ("/^[A-Za-z0-9_~\-!@#\$%\^&*\(\)]+$/", $username) )
   {
    $username_err="ERROR: Please provide your User name.";
   }

 	$sql="SELECT * FROM register WHERE u_name='$username'";
    $result=mysqli_query($conn,$sql);
    $num=mysqli_num_rows($result);
        if($num==1)
        {
        	while($row=mysqli_fetch_assoc($result))
        	{
        		if(password_verify($password, $row['pass']))
        		{
        		 
                 // Seting session variables
                 $_SESSION["user_name"] = "$username";
                 $_SESSION["user_id"] = " ".$row['r_id']." ";

	        	 header("location:main.php");
        		}
        		else
            {
            	$pass_err="ERROR: Password doesn't match";
            }

        	}	 
        }
        else
            {
            	$show_err="ERROR: Invalid Credentials";
            }

 }


?>
<html>
<head>
	<title>Transport Management System</title>
	<link rel="stylesheet" type="text/css" href="css1/login.css">
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css">
</head>
<body>
	<div class="main">
		<div class="navbar">
			<div class="icon">
				<h1 class="logo">BBS</h1>
			</div>
			<div class="menu">
				<ul>
					<li><a href="#">HOME</a></li>
					<li><a href="#">FEATURES</a></li>
					<li><a href="#">ADMIN</a></li>
					<li><a href="#">CONTACT</a></li>
					<li><a href="http://localhost/PHP/BBS%20project/Trial/">EXIT</a></li>
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

			<div class="form">
      <!-- form -->
	<form action="login.php" method="post">
	 	<h2>Login here</h2>
	 	<span>
	 		<?php  
	 		if(isset($show_err))
	 		 echo "<font size=2 color =white >$show_err</font>";
	 	    ?>
	 	</span>
	 	<input type="text" name="username" placeholder="Enter username">
	 	<span>
	 		<?php 
	 		if(isset($username_err)) 
	 			echo "<font size=2 color =white >$username_err </font>"; 
	 	    ?>
	 	</span>
	    <input type="password" name="pass" placeholder="Enter password">
	    <span>
	    	<?php  
	    	if(isset($pass_err)) 
	    		echo "<font size=2 color =white >$pass_err</font>";  
	        ?>
	    </span>
	 		<div class="button"><center>
	 			<input type="submit" value="login" name="submit">
	 		</div>
	 		<p class="link">Don't have an account<br>
	 			<a href="registration.php">Sign up here</a></p>
				</form>
			</div>
		</div>
	</div>
<script src="http://unpkg.com/ionicons@5.4.0/dist/ionicons.js"></script>

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
					<h4>online service</h4>
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
</body>
</html>