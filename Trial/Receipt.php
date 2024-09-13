<?php

// Start the session

session_start();

  $rfull_name= " ". $_SESSION["user_name"] ." ";
  $r_id= " ". $_SESSION["user_id"] ." ";
  $bus_d= " ". $_SESSION["bus_d"] ." ";
  $bbs= " ". $_SESSION["bbseatallot"] ." ";
  
    include('include/connect.php');
    error_reporting(0);


    $sql="SELECT * FROM payment p,register r,booking b WHERE p.r_id=r.r_id AND p.b_id=b.b_id AND r.r_id=$r_id ";
    $result=mysqli_query($conn,$sql);
    $num=mysqli_num_rows($result);
        if($num!=0)
        {    


            while($row=mysqli_fetch_assoc($result))
            {
                $b_id=" ".$row['b_id']." ";
                $bus_details=" ".$row['bus_details']." ";
                $f_name=" ".$row['f_name']." ";
                $date=" ".$row['date']." ";
                $h_seat=" ".$row['hseat']." ";
                $seat_no=" ".$row['seat_no']." ";
                $sfrom=" ".$row['sfrom']." ";
                $dto=" ".$row['dto']." ";
                $booking_time=" ".$row['booking_time']." ";
                $email=" ".$row['email']." ";
                $uadd=" ".$row['u_address']." ";
                $phn=" ".$row['phone_no']." ";
                $amount=" ".$row['amount']." ";
            }
        }

if($bus_details==1)
{
    $bus_name=" Motor Coach";
    $perseat="1500";
}
elseif($bus_details==2)
{
    $bus_name=" Sleeper Bus";
    $perseat="1200";
}
elseif($bus_details==3)
{
    $bus_name=" 45 Seater Non Ac";
    $perseat="600";
}
elseif($bus_details==4)
{
    $bus_name=" 45 Seater Ac";
    $perseat="900";
}
elseif($bus_details==5)
{
    $bus_name=" Shuttle Bus";
    $perseat="1300";
}
else
{
    $bus_name="not selected";
}



    $sql1="SELECT * FROM bus Where bbus_details = $bus_details ";
    $result1=mysqli_query($conn,$sql1);
    $num1=mysqli_num_rows($result1);
        if($num1!=0)
        {    


            while($row1=mysqli_fetch_assoc($result1))
            {
                $busnum=" ".$row1['bus_number']." ";
            }
        }

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <!---<title> Responsive Registration Form | CodingLab </title>--->
        <link rel="stylesheet" href="css1/Receipt.css">
       </head>
<body>
    
            <ul>
                <li><a href="main2.php">Home</a></li>
            </ul>
    
    <div class="container">
        <div class="brand-section">
            <div class="row">
                <div class="col-6">
                    <h1 class="text-white"><i>Bus Booking System</i></h1>
                </div>
                <div class="col-6">
                    <div class="company-details">
                        <p class="text-white">bbstravels@gmail.com</p>
                        <p class="text-white">+91 7375619356</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="body-section">
            <div class="row">
                <div class="col-6">
                    <h2 class="heading">Seat no:<?php echo "$seat_no"; ?></h2>
                    <p class="sub-heading"><b>Booking Time:</b><?php echo $booking_time; ?></p>
                    <p class="sub-heading"><b>Bus Type:</b><?php echo $bus_name; ?></p>
                    <p class="sub-heading"><b>From:</b><?php echo $sfrom; ?></p>
                    <p class="sub-heading"><b>To:</b><?php echo $dto; ?></p>
                    <p class="sub-heading"><b>Bus Number:</b><?php echo "$busnum"; ?></p>
                </div>
                <div class="col-6">
                    <p class="sub-heading"><b>Full Name:</b><?php echo $f_name; ?></p>
                    <p class="sub-heading"><b>Address:</b><?php echo $uadd; ?></p>
                    <p class="sub-heading"><b>Email Address:</b><?php echo $email; ?></p>
                    <p class="sub-heading"><b>Phone Number:</b><?php echo $phn; ?></p>
                </div>
            </div>
        </div>

        <div class="body-section">
            <h3 class="heading">Booking Charges</h3>
            <br>
            <table class="table-bordered">
                <thead>
                    <tr>
                        <th>Seat No:</th>
                        <th class="w-20">Amount Per Seat</th>
                        <th class="w-20">Seats Booked</th>
                        <th class="w-20">Grandtotal</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><?php echo $seat_no; ?></td>
                        <td><?php echo $perseat ?></td>
                        <td><?php echo $h_seat; ?></td>
                        <td><?php $tot= $h_seat*$perseat;  echo $tot ?></b></td>
                    </tr>
                    <tr>
                        <td colspan="3" class="text-left">GST Charges</td>
                        <td>    <?php $gst=$tot*0.14; echo $gst; ?></b></td>
                    </tr>
                    <tr>
                        <td colspan="3" class="text-left">Tax Total </td>
                        <td> <?php $tax=$tot*0.1; echo $tax; ?></td>
                    </tr>
                    <tr>
                        <td colspan="3" class="text-left">Final Amount</td>
                        <td><b><?php echo $tot+$gst+$tax; ?>/-<b></td>
                    </tr>
                </tbody>
            </table>
            <br>
            <h3 class="heading">Payment Status: Paid</h3>
            <h3 class="heading">Departure Date:<?php echo $date; ?></h3>

        </div>

        <div class="body-section">
            <p>&copy; Copyright 2021 - bbstravels. All rights reserved. 
                <a href="https://www.bbstravels.com/" class="float-right">www.bbstravels.com</a>
            </p>
        </div>      
    </div>

</body>
</html>