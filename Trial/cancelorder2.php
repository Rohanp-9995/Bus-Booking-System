<?php

include("include/connect.php");

  $bid=" ".$_GET['bid']. " ";

$query = "DELETE FROM payment WHERE b_id='".$bid."' ";
$data = mysqli_query($conn, $query);
 if($data)
 {
 	$stmt="DELETE FROM booking WHERE b_id='".$bid."' ";
    $result = mysqli_query($conn, $stmt);
    if($result)
    {
    	echo "<script>alert('Booking Canceled your refund will be transfered within 7days.') </script>";	
		?>
	<META HTTP-EQUIV="Refresh" CONTENT="0;URL=http://localhost/PHP/BBS%20project/Trial/cancelorder.php">
		<?php	
    }

	
 }
else
 {
	echo "<center><font color= 'red'><b>Delete process failed!!</b><center>";
 }
 
?>