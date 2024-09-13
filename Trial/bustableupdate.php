<?php
// Start the session

session_start();

  $rfull_name= " ". $_SESSION["user_name"] ." ";
  $r_id= " ". $_SESSION["user_id"] ." ";
  $bus_d= " ". $_SESSION["bus_d"] ." ";
  $bbs= " ". $_SESSION["bbseatallot"] ." ";
  
    include('include/connect.php');
    error_reporting(0);

        $sql1="UPDATE bus SET seats_booked='$bbs' WHERE bbus_details='$bus_details' ";
        $result1=mysqli_query($conn,$sql1);
        $num1=mysqli_num_rows($result1);

        echo"$bbs $bus_d";
        
        if($num1)
        {
            echo"record inserted of $bbs seats on $bus_d bus";
        }
        else
        {
            echo"failed";
        }

?>