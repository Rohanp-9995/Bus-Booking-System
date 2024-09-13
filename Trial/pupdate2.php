<?php

// Start the session

session_start();

  $r_id= " ". $_SESSION["user_id"] ." ";
  $bid=" ".$_GET['b']. " ";

  
    include('include/connect.php');
    error_reporting(0);

if($_POST['submit'])
{
    $bus_details=$_POST['bus_details'];
    $full_name=$_POST['f_name'];
    $date=$_POST['date'];
    $hseat=$_POST['hseat'];
    $seat_no=$_POST['seat_no'];
    $sfrom=$_POST['sfrom'];
    $dto=$_POST['dto'];

    $query =    "UPDATE booking 
                    SET bus_details='".$bus_details."',
                        f_name='".$full_name."',
                        date='".$date."',
                        hseat='".$hseat."',
                        seat_no='".$seat_no."',
                        sfrom='".$sfrom."',
                        dto='".$dto."'
                        WHERE r_id='".$r_id."' And b_id='".$bid."' ;
                ";
    $data = mysqli_query($conn, $query);
    if($data)
    {
        header("location:ubooking.php");
    }
    else
    {
        $error="Something is missing!!";
    }
    
}
else
    {
        echo"ERROR!!";
    }

?>