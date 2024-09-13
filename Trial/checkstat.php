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
			<ul>
                <li><a href="main2.php">Back</a></li>
            </ul>


	<div class="table">
		<table>
			<thead>
				<tr>
					<th>Booking Id</th>
					<th>Full Name</th>
					<th>Date</th>
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
        			$booking_id=" ".$row['b_id']." ";
        		echo"
        		<tr>
        			<td> ".$row['b_id']." </td>
        			<td> ".$row['f_name']." </td>
           			<td> ".$row['date']." </td>
               		<td><span class=action_btn><a href='receipt2.php?bid=$booking_id'>Receipt<span></a></td>
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