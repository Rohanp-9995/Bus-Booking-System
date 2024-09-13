
<?php
include('include/connect.php');
error_reporting(0);

if($_POST['submit'])
{

  $tdname= $_POST['tdn'];
  $lno= $_POST['l_no'];
  $vno= $_POST['v_no'];
  $yexp= $_POST['y_exp'];
  
if ($_SERVER["REQUEST_METHOD"] == "POST") 
   {  

//truck driver name  error
       if(empty($tdname) )
      {
       $tdn_err="ERROR: Please provide your Truck Owner name or driver name.";
      }

//license no error
      
      elseif(!preg_match ("/^[A-Za-z0-9_~\-!@#\$%\^&*\(\)]+$/",$lno))
      {  
       $lno_err = "ERROR: Please provide your license number.";   
      }

//vehicle no error
      
      elseif(empty($vno))
      {  
       $vno_err = "ERROR: Please provide your vehicle number.";   
      }


//years of experience error
      
      elseif(empty($yexp))
      {
       $ye_err="ERROR: Please Provide the given detail.";
      }


//inserting form information into data base

      elseif($tdname!="" && $lno!="" && $vno!="" && $yexp!="" )
          {
           $query= "INSERT INTO truck_details VALUES (NULL,'$tdname', '$lno', '$vno','$yexp',NULL)";
           $data= mysqli_query($conn, $query);
  
             if($data)
             {
              header("location: main2.php");
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

?>
<!DOCTYPE html>
<html>
    <head>
        <title>Truck Driver Form</title>
        <link rel="stylesheet" href="css1/Update.css">
    </head>

<body>
             <ul>
                <li><a href="main2.php">Back</a></li>
            </ul>
    <div>
        <h1 class="update">Registration Form</h1>
        <div class="main">
            <form action="" method="post">

                <h2 class="name">Truck Driver Name :</h2>
                    <input class="t_name" type="text" name="tdn">
                    <span>
                        <?php if(isset($tdn_err)) 
                        echo "<font size=3 color =white >$tdn_err</font>"; 
                        ?>  
                    </span> 

                <h2 class="name">License No:</h2>
                    <input class="l_number" type="text" name="l_no">
                     <span>
                        <?php if(isset($lno_err)) 
                        echo "<font size=3 color =white >$lno_err</font>"; 
                        ?>  
                    </span>     

                <h2 class="name">Vehicle Number :</h2>
                    <input class="v_number" type="text" name="v_no">
                     <span>
                        <?php if(isset($vno_err)) 
                        echo "<font size=3 color =white >$vno_err</font>"; 
                        ?>  
                    </span> 

                <h2 class="name">Years Of Experience :</h2>
                    <input class="y_exp" type="text" name="y_exp">
                     <span>
                        <?php if(isset($ye_err)) 
                        echo "<font size=3 color =white >$ye_err</font>"; 
                        ?>  
                    </span> 
                
                <input class="bn" type="submit" value="Submit" name="submit">
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
            </form>
        </div>
    </div>

</body>
</html>