<?php

session_start();

  $rfull_name= " ". $_SESSION["user_name"] ." ";
  $r_id= " ". $_SESSION["user_id"] ." ";
  
  include("include/connect.php");


  $stmt1 = "DELETE FROM payment WHERE r_id='".$r_id."' ";
  $data1 = mysqli_query($conn, $stmt1);
 
 if($data1)
 {
  
    $query ="DELETE FROM booking WHERE r_id='".$r_id."' ";
    $result=mysqli_query($conn,$query);

    if($result)
    {
      $sql="DELETE FROM register WHERE r_id='".$r_id."' ";
      $output=mysqli_query($conn,$sql);

        if($output)
        {

          echo "<script>alert('Profile Deleted') </script>"; 

?>
          
          <META HTTP-EQUIV="Refresh" 
                CONTENT="0;URL=http://localhost/PHP/TMS%20Project/Trial/login.php">
<?php 
        }
    }
 }
else
 {
	echo "<center><font color= 'red'><b>Delete process failed!!</b><center>";
 }
 
?>