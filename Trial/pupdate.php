<?php

// Start the session

session_start();

  $r_id= " ". $_SESSION["user_id"] ." ";
  $bid=" ".$_GET['bid']. " ";

  
    include('include/connect.php');
    error_reporting(0);

    $sql="SELECT * FROM booking Where b_id=$bid ";
    $result=mysqli_query($conn,$sql);
    $num=mysqli_num_rows($result);
        if($num!=0)
        {
            while($row=mysqli_fetch_assoc($result))
            {
                $f_name=" ".$row['f_name']." ";
                $date=" ".$row['date']." ";
                $h_seat=" ".$row['hseat']." ";
                $seat_no=" ".$row['seat_no']." ";
                $sfrom=" ".$row['sfrom']." ";
                $dto=" ".$row['dto']." ";
            }
        }


if($_POST['submit'])
{
    $bus_details=$_POST['bus_details'];
    $full_name=$_POST['f_name'];
    $date1=$_POST['date'];
    $hseat=$_POST['hseat'];
    $seat_no1=$_POST['seat_no'];
    $sfrom1=$_POST['sfrom'];
    $dto1=$_POST['dto'];

    $query =    "UPDATE booking 
                    SET bus_details='".$bus_details."',
                        f_name='".$full_name."',
                        date='".$date1."',
                        hseat='".$hseat."',
                        seat_no='".$seat_no1."',
                        sfrom='".$sfrom1."',
                        dto='".$dto1."'
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

<html>
    <head>
        <title>Update Profile Form</title>
        <link rel="stylesheet" href="css1/Update.css">
    </head>

<body>
            <ul>
                <li><a href="ubooking.php">Back</a></li>
            </ul>

    <div>
        <h1 class="update">Update Booking</h1>
        <div class="main">
            <form action="" method="POST">
             
                <h2 class="name">Bus details:</h2>
                <select class="username" name="bus_details" style="height: 45px ; width:350px" >
                    <option value="1" >Motor Coach (Starts From INR:1500)</option>
                    <option value="2" >Sleeper Bus (Starts From INR:1200)</option>
                    <option value="3" >45 Seater Non Ac (Starts From INR:600)</option>
                    <option value="4" >45 Seater Ac (Starts From INR:900)</option>
                    <option value="5" >Shuttle Bus (Starts From INR:1300)</option>
                </select>
                
                <h2 class="name">Full Name :</h2>
                    <input class="fullname" type="text" name="f_name" 
                    value="<?php echo $f_name; ?>" required>
             
                <h2 class="name">Date :</h2>
                    <input class="date" type="text" name="date" 
                    value="<?php echo $date; ?>" required>

                <h2 class="name">seats require :</h2>
                    <input class="hseat" type="text" name="hseat" 
                    value="<?php echo $h_seat; ?>" required>

                <h2 class="name">Seat No :</h2>
                    <input class="seat_no" type="text" name="seat_no" 
                    value="<?php echo $seat_no; ?>" required>

                <h2 class="name">From :</h2>
                    <input class="sfrom" type="text" name="sfrom" 
                    value="<?php echo $sfrom; ?>" required>

                <h2 class="name">To :</h2>
                    <input class="dto" type="text" name="dto" 
                    value="<?php echo $dto; ?>" required>

                <input type="submit" class="bn" value="submit" name="submit">

            </form>
        </div>
    </div>

</body>
</html>