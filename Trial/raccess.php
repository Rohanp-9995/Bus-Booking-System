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
				<li><a href="admain.php">Back</a></li>
			</ul>
	</div>
	<div class="table">
		<table>
			<thead>
				<tr>
					<th>Registered Id</th>
					<th>Full Name </th>
					<th>User Name</th>
					<th>Email</th>
					<th>Phone No</th>
					<th>Gender</th>
					<th>Address</th>
				</tr>
			</thead>

			<tbody>
<?php 

	include('include/connect.php');


    $sql="SELECT * FROM register";
    $result=mysqli_query($conn,$sql);
    $num=mysqli_num_rows($result);
    if($num!=0)
        {
        	while($row=mysqli_fetch_assoc($result))
        	{
        			$register_id=" ".$row['r_id']." ";
        		echo"
        		<tr>
        			<td> $register_id </td>
        			<td> ".$row['f_name']." </td>
        			<td> ".$row['u_name']." </td>
           			<td> ".$row['email']." </td>
          			<td> ".$row['phone_no']." </td>
          	 		<td> ".$row['gender']." </td>
            	    <td> ".$row['u_address']." </td>
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