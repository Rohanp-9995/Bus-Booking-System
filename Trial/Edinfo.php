<?php
// Start the session
session_start();

//asigning values for $username and $userid
$username= " ". $_SESSION["user_name"] ." ";
$userid= " ". $_SESSION["user_id"] ." ";

?>

<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Table Design</title>

	<link rel="stylesheet" href="css1/edinfo.css">
</head>
<body>
	<div class="content">
			<a href="main2.php" >
				<button class="cn" >
			   		<b>
			   			<?php echo "Welcome $username "; ?>
			   			<!--<?php echo "Welcome $userid "; ?>-->
			   		</b>	
			    </button>
		    </a><br>
		</div>   


	<div class="table">
		<table>
			<thead>
				<tr>
					<th>Truck Details</th>
					<th>Prodcut Details</th>
					<th>Weight</th>
					<th>Distance</th>
					<th>Pick up Point</th>
					<th>Destination</th>
					<th>Action</th>
				</tr>
			</thead>

			<tbody>
<?php 

	include('include/connect.php');


    $sql="SELECT * FROM booking where r_id ='$userid'";
    $result=mysqli_query($conn,$sql);
    $num=mysqli_num_rows($result);
    if($num!=0)
        {
        	while($row=mysqli_fetch_assoc($result))
        	{
        		echo"
        		<tr>
        			<td> ".$row['truck_details']." </td>
           			<td> ".$row['product']." </td>
          			<td> ".$row['weight']." Tons</td>
          	 		<td> ".$row['distance']." km</td>
            	    <td> ".$row['pick_up_point']." </td>
               		<td> ".$row['destination']." </td>
               		<td><span class=action_btn><a href='mupdate.php'>Edit Order<span></a></td>
               	</tr>
               	 ";   
        	}
        }    
?>
					

			</tbody>
		</table>
	</div>
</body>
</html>