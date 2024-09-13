<?php
// Start the session
session_start();

  $user_name= " ". $_SESSION["user_name"] ." ";
  $user_id= " ". $_SESSION["user_id"] ." ";
  $bus_d= " ". $_SESSION["bus_d"] ." ";
  $bid=$user_id;
  
  $seat_allot=" ".$_GET['seatsallot']. " ";

//generating amount 
    if($bus_d==1)
    {
        $ad=intval($seat_allot)*1500;
    }
    elseif($bus_d==2)
    {
        $ad=intval($seat_allot)*1200;
    }
    elseif($bus_d==3)
    {
        $ad=intval($seat_allot)*600;
    }
    elseif($bus_d==4)
    {
        $ad=intval($seat_allot)*900;
    }
    elseif($bus_d==5)
    {
        $ad=intval($seat_allot)*1300;
    }
    else
    {
        $ad="Something is missing!";
    }
  
include('include/connect.php');
error_reporting(0);

if($_POST['submit'])
{
  $chn= $_POST['chn'];
  $cvv= $_POST['cvv'];
  $c_number= $_POST['c_number'];
  $amount= $_POST['amount'];
  $months= $_POST['months'];
  $years= $_POST['years'];


if ($_SERVER["REQUEST_METHOD"] == "POST") 
   {  


    $sql="SELECT * FROM booking WHERE r_id='$bid'";
    $result=mysqli_query($conn,$sql);
    $num=mysqli_num_rows($result);
        if($num!=0)
        {
            while($row=mysqli_fetch_assoc($result))
            {
                $b_id=" ".$row['b_id']." ";
            }
        }


//card holder error
    if(empty($chn) )
      {
       $card_holder_name_err="ERROR: Please provide your card holder name.";
      }

//cvv error
      
    elseif(empty($cvv))
      {
       $cvv_err="ERROR: This is a required field";
      }
    elseif(!preg_match ("/^[0-9]*$/", $cvv) )
      {  
       $cvv_err1 = "ERROR: Only numeric value is allowed."; 
      }

//card number error
      
    elseif(empty($c_number))
      {
       $card_number_err="ERROR: Please Provide your card number.";
      }
    elseif(!preg_match ("/^[0-9]*$/", $c_numebr) )
      {  
       $card_number_err1 = "ERROR: Only numeric value is allowed ."; 
      }

//inserting form information into data base

      elseif($chn!="" && $cvv!="" && $c_number!="" && $amount!="" && $months!="" && $years!="" &&$user_id!="" &&$b_id!="")
          {
           $query= "INSERT INTO payment VALUES (NULL,'$chn', '$cvv', '$c_number','$amount','$months','$years',NULL,'$user_id','$b_id')";
           $data= mysqli_query($conn, $query);
  
             if($data)
             {
                header("location: Receipt.php");
                $_SESSION["bbseatallot"] = "$seat_allot";
             }
             else{
                $cancel_err="cannot run query";
             }
          }
       else
      {
       $main_err="Something is missing .";
      }
    }
}

?>



<html>
<head>
    <title>Payment Form</title>
    <link rel="stylesheet" href="css1/Payment.css">
</head>
<body>
            <ul>
                <li><a href="booking.php">Back</a></li>
            </ul>
<form action="" method="post">
    <div class="container">
        <h1>Confirm Your Payment</h1>
                <?php //echo "$bus_d & $seat_allot"; ?>
        <div class="first-row">
            <div class="owner">
                <h3>Owner</h3>
                <div class="input-field">
                    <input type="text" placeholder="Enter Card Holders Name" name="chn">
                     <span>
                        <?php if(isset($card_holder_name_err)) 
                        echo "<font size=1 color =red >$card_holder_name_err</font>"; 
                        ?>  
                    </span>
                </div>
            </div>
            <div class="cvv">
                <h3>CVV</h3>
                <div class="input-field">
                    <input type="password" placeholder="XXX" name="cvv">
                     <span>
                        <?php if(isset($cvv_err)) 
                        echo "<font size=1 color =red >$cvv_err</font>"; 
                        ?>  
                    </span>
                     <span>
                        <?php if(isset($cvv_err1)) 
                        echo "<font size=1 color =red >$cvv_err1</font>"; 
                        ?>  
                    </span>
                </div>
            </div>
        </div>
        <div class="second-row">
            <div class="card-number">
                <h3>Card Number</h3>
                <div class="input-field">
                    <input type="text" placeholder="XXXX XXXX XXXX XXXX" name="c_number">
                     <span>
                        <?php if(isset($card_number_err)) 
                        echo "<font size=1 color =red >$card_number_err</font>"; 
                        ?>  
                    </span>
                    <span>
                        <?php if(isset($card_number1_err)) 
                        echo "<font size=1 color =red >$card_number1_err</font>"; 
                        ?>  
                    </span>
                </div>
            </div>
             <div class="card-number">
                <h3>Amount:</h3>
                <div class="input-field">
                    <input type="text"  name="amount" value="<?php echo "$ad"; ?>">
                    <b>
                        <?php 
                            echo " Amount to be paid  : $ad Rs "; 
                        ?>
                    </b>    
                     <span>
                        <?php if(isset($amount_err)) 
                        echo "<font size=1 color =red >$amount_err</font>"; 
                        ?>  
                    </span>
                </div>
            </div>
        </div>
        <div class="third-row">
            <h3>Expiry Date</h3>
            <div class="selection">
                <div class="date">
                    <select name="months" >
                        <option value="Jan">Jan</option>
                        <option value="Feb">Feb</option>
                        <option value="Mar">Mar</option>
                        <option value="Apr">Apr</option>
                        <option value="May">May</option>
                        <option value="Jun">Jun</option>
                        <option value="Jul">Jul</option>
                        <option value="Aug">Aug</option>
                        <option value="Sep">Sep</option>
                        <option value="Oct">Oct</option>
                        <option value="Nov">Nov</option>
                        <option value="Dec">Dec</option>
                      </select>
                      <select name="years" >
                        <option value="2021">2021</option>
                        <option value="2022">2022</option>
                        <option value="2023">2023</option>
                        <option value="2024">2024</option>
                        <option value="2025">2025</option>
                        <option value="2026">2026</option>
                        <option value="2027">2027</option>
                        <option value="2028">2028</option>
                        <option value="2029">2029</option>
                        <option value="2030">2030</option>
                        <option value="2031">2031</option>
                        <option value="2032">2032</option>
                        <option value="2033">2033</option>
                        <option value="2034">2034</option>
                        <option value="2035">2035</option>
                      </select>
                </div>
                <div class="cards">
                    <img src="css1/images/mc.png" >
                    <img src="css1/images/vi.png" >
                    <img src="css1/images/pp.png" >
                </div>
            </div>    
        </div>
    </div>
            <div class="button1">
                    <span>
                        <?php  if(isset($main_err)) 
                        echo "<font size=4 color =red >$main_err</font>"; 
                        ?>
                    </span>
                    <span>
                        <?php  if(isset($cancel_err)) 
                        echo "<font size=4 color =red >$cancel_err</font>"; 
                        ?>
                </span>
                <input type="submit" value="Pay now" name="submit">
            </div>
</form>
</body>
</html>