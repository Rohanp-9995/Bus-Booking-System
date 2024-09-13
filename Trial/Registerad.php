<html>
<head>
	<title>INSERT RECORD</title>
</head>
<body>
	<form action="" method="POST">
		username<input type="id" name="username"><br>
		Password<input type="text" name="pass"><br>
		<input type="submit" value="SUBMIT" name="submit">
	</form>
<?php

 	include('include/connect.php');


	if($_POST['submit'])
{
		$username=$_POST['username'];
		$pass=$_POST['pass'];
	  $hash = password_hash($pass, PASSWORD_DEFAULT);
  

		if($username!="" && $hash!=""  )
    {
     $query= "INSERT INTO admin VALUES('$username','$hash')";
     $data= mysqli_query($conn, $query);
       if($data)
       {
        echo"Data Inserted successfully!!!!!";
       }else
	    	{
	    		echo"Failed!!!!!!";
	    	}
    }
	
}
	
?>


</body>
</html>

