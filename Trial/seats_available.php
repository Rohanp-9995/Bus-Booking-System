<?php

// Start the session
session_start();

//asigning values for $username and $userid
$username= " ". $_SESSION["user_name"] ." ";
$userid= " ". $_SESSION["user_id"] ." ";

include('include/connect.php');

//motor coach
    $sql1="SELECT sum(hseat),bus_details from booking where bus_details='1' ";
    $result1=mysqli_query($conn,$sql1);
    $num1=mysqli_num_rows($result1);
    if($num1!=0)
        {
        	while($row1=mysqli_fetch_assoc($result1))
        	{
        			$a1=" ".$row1['bus_details']." ";
        			$a2=" ".$row1['sum(hseat)']." ";
        	}
            if($a1==1)
            {
                $bus_name1="Motor Coach";
                $seats_are1="48";
            }
        }

    $bus1a="$bus_name1 Seats Booked are: $a2";
    $a3=$seats_are1-intval($a2);
    $bus1b="$bus_name1 Seats Available are: $a3";

//sleeper bus
    $sql2="SELECT sum(hseat),bus_details from booking where bus_details='2' ";
    $result2=mysqli_query($conn,$sql2);
    $num2=mysqli_num_rows($result2);
    if($num2!=0)
        {
            while($row2=mysqli_fetch_assoc($result2))
            {
                    $b1=" ".$row2['bus_details']." ";
                    $b2=" ".$row2['sum(hseat)']." ";
            }
            if($b1==2)
            {
                $bus_name2="Sleeper Bus";
                $seats_are2="24";
            }
        }

    $bus2a="$bus_name2 Seats Booked are: $b2";
    $b3=$seats_are2-intval($b2);
    $bus2b="$bus_name2 Seats Available are: $b3";

   

//45 seater Non Ac 
    $sql3="SELECT sum(hseat),bus_details from booking where bus_details='3' ";
    $result3=mysqli_query($conn,$sql3);
    $num3=mysqli_num_rows($result3);
    if($num3!=0)
        {
            while($row3=mysqli_fetch_assoc($result3))
            {
                    $c1=" ".$row3['bus_details']." ";
                    $c2=" ".$row3['sum(hseat)']." ";
            }
            if($c1==3 )
            {
                $bus_name3="45 Seater Non Ac";
                $seats_are3="45";
            }
        }

    $bus3a="$bus_name3 Seats Booked are: $c2";
    $c3=$seats_are3-intval($c2);
    $bus3b="$bus_name3 Seats Available are: $c3";



//45 seater  Ac 
    $sql4="SELECT sum(hseat),bus_details from booking where bus_details='4' ";
    $result4=mysqli_query($conn,$sql4);
    $num4=mysqli_num_rows($result4);
    if($num4!=0)
        {
            while($row4=mysqli_fetch_assoc($result4))
            {
                    $d1=" ".$row4['bus_details']." ";
                    $d2=" ".$row4['sum(hseat)']." ";
            }
            if($d1==4 )
            {
                $bus_name4="45 Seater Ac";
                $seats_are4="45";
            }
        }

    $bus4a="$bus_name4 Seats Booked are: $d2";
    $d3=$seats_are4-intval($d2);
    $bus4b="$bus_name4 Seats Available are: $d3";


//Shuttle Bus 
    $sql5="SELECT sum(hseat),bus_details from booking where bus_details='5' ";
    $result5=mysqli_query($conn,$sql5);
    $num5=mysqli_num_rows($result5);
    if($num5!=0)
        {
            while($row5=mysqli_fetch_assoc($result5))
            {
                    $e1=" ".$row5['bus_details']." ";
                    $e2=" ".$row5['sum(hseat)']." ";
            }
            if($e1==5 )
            {
                $bus_name5="Shuttle Bus";
                $seats_are5="48";
            }
        }

    $bus5a="$bus_name5 Seats Booked are: $e2";
    $e3=$seats_are5-intval($e2);
    $bus5b="$bus_name5 Seats Available are: $e3";

    
?>




<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Table Design</title>

    <link rel="stylesheet" href="css1/edinfo.css">
</head>
<body>
            <ul>
                <li><a href="main2.php">Back</a></li>
            </ul>


    <div class="table">
        <table>
            <thead>
                <tr>
                    <th>Seats Booked</th>
                    <th>Seats available</th>
                    <th>Totals Seats are</th>
                    <th>Seats are</th>
                </tr>
            </thead>

            <tbody>
                    <tr>
                        <th><h2><font color="red"><?php echo"$bus1a"; ?></font></h2></th>
                        <th><h2><font color="green"><?php echo"$bus1b"; ?></font></h2></th>
                        <th><h2><b><font color="Purple"><?php echo"48"; ?></font></b></h2></th>
                    </tr>
                    <tr>
                        <th><h2><font color="red"><?php echo"$bus2a"; ?></font></h2></th>
                        <th><h2><font color="green"><?php echo"$bus2b"; ?></font></h2></th>
                        <th><h2><b><font color="Purple"><?php echo"24"; ?></font></b></h2></th>
                    </tr>
                    <tr>
                        <th><h2><font color="red"><?php echo"$bus3a"; ?></font></h2></th>
                        <th><h2><font color="green"><?php echo"$bus3b"; ?></font></h2></th>
                        <th><h2><b><font color="Purple"><?php echo"45"; ?></font></b></h2></th>
                    </tr>
                    <tr>
                        <th><h2><font color="red"><?php echo"$bus4a"; ?></font></h2></th>
                        <th><h2><font color="green"><?php echo"$bus4b"; ?></font></h2></th>
                        <th><h2><b><font color="Purple"><?php echo"45"; ?></font></b></h2></th>
                    </tr>
                    <tr>
                        <th><h2><font color="red"><?php echo"$bus5a"; ?></font></h2></th>
                        <th><h2><font color="green"><?php echo"$bus5b"; ?></font></h2></th>
                        <th><h2><b><font color="Purple"><?php echo"48"; ?></font></b></h2></th>
                    </tr>        
            </tbody>
                
        </table>
    </div>
</body>
</html>