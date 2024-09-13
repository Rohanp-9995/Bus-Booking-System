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

 	$sql="SELECT * FROM admin WHERE u_name='$username'";
    $result=mysqli_query($conn,$sql);
    $num=mysqli_num_rows($result);
        if($num==1)
        {
        	while($row=mysqli_fetch_assoc($result))
        	{
        		if(password_verify($password, $row['pass']))
        		{
	        	 header("location:admain.php");
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

<html lang="en" dir="ltr">
<head>
	<meta charset="utf-8">
	<title>Admin Login Form</title>
	<link rel="stylesheet" type="text/css" href="css1/adlogin.css">
</head>
<body>
	<div class="main">
			<div class="logo">
				<img src="css1/images/admain.png">
			</div>
			<ul>
				<li><a href="main2.php">Back</a></li>
			</ul>
	</div>
	<form class="box" action="" method="post">
		<h1>Admin</h1>
		<?php  
	 		if(isset($show_err))
	 		 echo "<font size=2 color =white >$show_err</font>";
	 	?>
		<input type="text" name="username" placeholder="Username">
		<?php 
	 		if(isset($username_err)) 
	 			echo "<font size=2 color =white >$username_err </font>"; 
	 	?>
		<input type="password" name="pass" placeholder="pass">
		<?php  
	    	if(isset($pass_err)) 
	    		echo "<font size=2 color =white >$pass_err</font>";  
	    ?>
		<input type="submit" name="submit" value="Access">
	</form>
</body>
</html>

