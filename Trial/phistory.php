<?php
// Start the session

session_start();

  $r_id= " ". $_SESSION["user_id"] ." ";
  
?>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Table Design</title>

	<link rel="stylesheet" href="css1/edinfo.css">
</head>
<body>
	 <div class="main">
			<ul>
				<li><a href="main2.php">Back</a></li>
			</ul>
	</div>
	<div class="table">
		<table>
			<thead>
				<tr>
					<th>Card Holder Name</th>
					<th>Card Number</th>
					<th>CVV</th>
					<th>Amount Paid</th>
					<th>Payment Time</th>
				</tr>
			</thead>

			<tbody>
<?php 

	include('include/connect.php');


    $sql="SELECT * FROM payment p WHERE r_id= $r_id";
    $result=mysqli_query($conn,$sql);
    $num=mysqli_num_rows($result);
    if($num!=0)
        {
        	while($row=mysqli_fetch_assoc($result))
        	{
        			$payment_id=" ".$row['p_id']." ";
        			$t_amount=" ".$row['amount']." ";
        		echo"
        		<tr>
        			<td> ".$row['card_holder_name']." </td>
        			<td> ".$row['card_number']." </td>
        			<td> ".$row['cvv']." </td>
        			<td> ".$row['amount']." </td>
          			<td> ".$row['payment_time']." </td>
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