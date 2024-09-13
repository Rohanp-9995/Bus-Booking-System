<?php
// Start the session
session_start();

  $user_name= " ". $_SESSION["user_name"] ." ";
  $user_id= " ". $_SESSION["user_id"] ." ";

?>
<?php
include('include/connect.php');
error_reporting(0);

if($_POST['submit'])
{
  $bus_details= $_POST['bus_details'];
  $fname= $_POST['fname'];
  $date= $_POST['date'];
  $hseat= $_POST['hseat'];
  $seat_no= $_POST['seat_no'];
  $from= $_POST['from'];
  $to= $_POST['to'];
  
  
if ($_SERVER["REQUEST_METHOD"] == "POST") 
   {  

//seat_no must be unique

     $stmt="SELECT * FROM booking WHERE seat_no='$seat_no'";
     $result=mysqli_query($conn,$stmt);
     $num=mysqli_num_rows($result);

     // checking seat_no already exist or not

      if($num>0)
        {
          $seat_no_err3="Your selected Seat is already booked";
        }
//fullname error
       elseif(empty($fname) )
      {
       $fname_err="ERROR: Please provide your Your name.";
      }

//date error
      
      elseif(!preg_match ("/[0-9]{2}\/[0-9]{2}\/[0-9]{4}/", $date))
      {  
       $date_err = "ERROR: Invalid Format";   
      }

//seat no error
      
    
      elseif(empty($seat_no) )
      {
       $seat_no_err2="ERROR: Please provide your seat no.";
      }

// hseat error
      elseif(empty($hseat) )
      {
       $hseat_err="ERROR: Please provide how many seats you want to book.";
      }
      elseif(!preg_match ("/^[0-9]*$/", $hseat) )
      {  
       $hseat_err2 = "ERROR: Only in numeric format .";   
      }


//from error
      
      elseif(empty($from))
      {
       $from_err="ERROR: Enter your Starting point.";
      }

//to error
      
      elseif(empty($to))
      {
       $to_err="ERROR: Enter your destination.";
      }


//inserting form information into data base

      elseif($bus_details!="" && $fname!="" && $date!="" && $hseat!="" && $seat_no!="" && $from!="" && $to!="" && $user_id!="")
          {
           $query= "INSERT INTO booking VALUES (NULL,'$bus_details', '$fname', '$date','$hseat','$seat_no','$from','$to',NULL,'$user_id')";
           $data= mysqli_query($conn, $query);
  
             if($data)
             {
                header("location: pay.php?seatsallot=$hseat");
                $_SESSION["bus_d"] = "$bus_details";
             }
             else{
                $cancel_err="cannot run query";
             }
          }
       else
      {
       $main_err="Something is missing .All things are necessary";
      }
    }
}

/*
$stmt1="SELECT * FROM booking WHERE date='$date' ";
     $result1=mysqli_query($conn,$stmt1);
     $num1=mysqli_num_rows($result1);

     // checking date already exist or not

      if($num1>0)
        {
          $date_err2="Date is already selected";
        }
        */
?>


<html>
    <head>
        <link rel="stylesheet" href="css1/booking.css">
    </head>
<body>
            <ul>
                <li><a href="main2.php">Back</a></li>
            </ul>
    <div class="container1">
        <div class="title1">Bus Booking</div>
        <form action="" method="post">
            <div class="input-box1">
                <span class="details1" >Bus Details </span>
                <select name="bus_details" style="height: 45px ; width:350px" >
                    <option value="1" >Motor Coach (Starts From INR:1500)</option>
                    <option value="2" >Sleeper Bus (Starts From INR:1200)</option>
                    <option value="3" >45 Seater Non Ac (Starts From INR:600)</option>
                    <option value="4" >45 Seater Ac (Starts From INR:900)</option>
                    <option value="5" >Shuttle Bus (Starts From INR:1300)</option>
                </select>
            </div>
            
            <div class="input-box1">
                <span class="details1">Your Name:</span>
                    <span>
                        <?php if(isset($fname_err)) 
                        echo "<font size=3 color =white >$fname_err</font>"; 
                        ?>  
                    </span>    
                <input type="text" placeholder="Enter your Full name" name="fname" >
            </div>
            <div class="input-box1">
                <span class="details1">Date:</span>
                <span>
                    <?php if(isset($date_err)) 
                    echo "<font size=3 color =white >$date_err</font>"; 
                    ?>
                    <?php if(isset($date_err2)) 
                    echo "<font size=3 color =white >$date_err2</font>"; 
                    ?>
                </span>    
                <input type="text" placeholder="Enter the Date in dd/mm/yyyy Format" name="date" >
            </div>
            <div class="input-box1">
                <span class="details1">How many seats:</span>
                <span>
                    <?php if(isset($hseat_err)) 
                    echo "<font size=3 color =white >$hseat_err</font>"; 
                    ?>
                </span>
                <span>
                    <?php if(isset($hseat_err2)) 
                    echo "<font size=3 color =white >$hseat_err2</font>"; 
                    ?>
                </span>

                <input type="text" placeholder="How many seats do you require" name="hseat" >
            </div>
            <div class="input-box1">
                <span class="details1">seat no:</span>
                <span>
                    <?php if(isset($seat_no_err)) 
                    echo "<font size=3 color =white >$seat_no_err</font>"; 
                    ?>
                </span> 
        
                <span>
                    <?php if(isset($seat_no_err3)) 
                    echo "<font size=3 color =white >$seat_no_err3</font>"; 
                    ?>
                </span>  
                <input type="text" placeholder="Enter your seat no" name="seat_no" >
                
            </div>
            <div class="input-box1">
                <span class="details1">From:</span>
                <span>
                    <?php if(isset($from_err)) 
                    echo "<font size=3 color =white >$from_err</font>"; 
                    ?>
                </span>    
                <input type="text" placeholder="Your Starting Point " name="from" >
            </div>
            <div class="input-box1">
                <span class="details1">To:</span>
                <span>
                    <?php if(isset($purpose_err)) 
                    echo "<font size=3 color =white >$to_err</font>"; 
                    ?>
                </span>    
                <input type="text" placeholder="Your destination" name="to" >
            </div>
            <div class="button1">
                <input type="submit" value="Pay here" name="submit">
                <span>
                    <?php  if(isset($main_err)) 
                    echo "<font size=4 color =white >$main_err</font>"; 
                    ?>
                </span>
                <span>
                    <?php  if(isset($cancel_err)) 
                    echo "<font size=4 color =white >$cancel_err</font>"; 
                    ?>
                </span>
            </div>
        </form>
    </div>
    </body>
</html>