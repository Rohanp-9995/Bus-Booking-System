<?php

// Start the session

session_start();

  $rfull_name= " ". $_SESSION["user_name"] ." ";
  $r_id= " ". $_SESSION["user_id"] ." ";
  
    include('include/connect.php');
    error_reporting(0);

    $sql="SELECT * FROM register Where r_id=$r_id ";
    $result=mysqli_query($conn,$sql);
    $num=mysqli_num_rows($result);
        if($num!=0)
        {
            while($row=mysqli_fetch_assoc($result))
            {
                $email=" ".$row['email']." ";
                $fname=" ".$row['f_name']." ";
                $uname=" ".$row['u_name']." ";
                $uadd=" ".$row['u_address']." ";
                $gender=" ".$row['gender']." ";
                $Created=" ".$row['created']." ";
                $phn=" ".$row['phone_no']." ";
            }
        }


?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <!---<title> Responsive Registration Form | CodingLab </title>--->
        <link rel="stylesheet" href="css1/vprofile.css">
       </head>
<body>
            <ul>
                <li><a href="main2.php">Back</a></li>
            </ul>
    <div class="container">
        <div class="brand-section">
            <div class="row">
                <div class="col-6">
                    <h1 class="text-white">PROFILE</h1>
                </div>
                <div class="col-6">
                    <div class="company-details">
                        <p class="text-white"><?php echo "$email"; ?></p>
                        <p class="text-white"><?php echo "$phn"; ?></p>
                    </div>
                </div>
            </div>
        </div>

        <div class="body-section">
            <div class="row">
                <div class="col-6">
                    <div class="logo">
                        <img src="css1/images/profile.png">
                            <a href="pupdate.php">
                                <div class="bn">
                                    <button class="cn">
                                        <p>
                                            <?php echo "Update Profile"; ?>
                                            <!--<?php echo "Welcome $r_id "; ?>-->
                                        </p>
                                    </button>
                                </div>
                            </a>
                            <a href="rdelete.php?" onclick="rdelete()">
                                <div class="bn">
                                    <button class="cn">
                                        <p>
                                            Delete Profile
                                        </p>
                                    </button>
                                </div>
                            </a>
                    </div>
                </div>
                <div class="col-6">
                    <p class="sub-heading"><b>Full Name:</b><?php echo $fname; ?></p>
                    <p class="sub-heading"><b>User Name:</b><?php echo $uname; ?></p>
                    <p class="sub-heading"><b>Address:</b><?php echo $uadd; ?></p>
                    <p class="sub-heading"><b>Email Address:</b><?php echo $email; ?></p>
                    <p class="sub-heading"><b>Phone Number:</b><?php echo $phn; ?></p>
                    <p class="sub-heading"><b>Created at:</b><?php echo $Created; ?></p>
                </div>
            </div>
        </div>         
    </div>

<!-- delete registered user part -->

<script>

    function rdelete()
    {
        return confirm('If You want to delete your profile then all the bookings related to this profile will be canceled and you will be loged out!!');
    }

</script>

</body>
</html>