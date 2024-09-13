<?php

include('include/connect.php');
error_reporting(0);

if($_POST['submit'])
{
  $fullname= $_POST['fullname'];
  $username= $_POST['username'];
  $email= $_POST['email'];
  $u_add= $_POST['add'];
  $phone_no= $_POST['phone_no'];

  $pass= $_POST['pass'];
  $hash = password_hash($pass, PASSWORD_DEFAULT);
  $cpass= $_POST['cpass'];

  $gender= $_POST['gender'];

  $pattern = "^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$^";

if ($_SERVER["REQUEST_METHOD"] == "POST") 
   {  

//username must be unique

     $stmt="SELECT * FROM register WHERE u_name='$username'";
     $result=mysqli_query($conn,$stmt);
     $num=mysqli_num_rows($result);

     // checking username already exist or not

      if($num>0)
        {
          $username_err1="Username already exist";
          //echo $username_err1;     
        }

//fullname error
      
      elseif(empty($fullname))
      {
       $fullname_err="ERROR: Please provide your name (*Alphabets).";
      }

//username error
      
      elseif(!preg_match ("/^[A-Za-z0-9_~\-!@#\$%\^&*\(\)]+$/", $username) )
      {
       $username_err="ERROR: Please provide your User name.";
      }

//email error
      
      elseif(!preg_match ($pattern, $email))
      {  
       $email_err = "ERROR: Email is not valid.";   
      }

//user address error
      
      elseif(empty($u_add))
      {  
       $add_err = "ERROR: Please Provide your address.";   
      }

//phone_no error
      
      elseif(!preg_match ("/^[0-9]*$/", $phone_no) )
      {  
       $phone_err = "ERROR: Only numeric value is allowed."; 
      }
      elseif(!preg_match ("/^[6-9]\d{9}$/", $phone_no) )
      {  
       $phone_err1 = "ERROR: Invalid phone no."; 
      }

//password error
      
      elseif(empty($pass))
      {
       $pass_err="ERROR: Please Provide your password.";
      }

      elseif($cpass!=$pass)
      {  
       $pass_err1 = "ERROR: Your Password don't match.";   
      } 

//inserting form information into data base

      elseif($fullname!="" && $username!="" && $email!="" && $u_add!="" && $phone_no!="" && $hash!="" && $gender!="")
          {
           $query= "INSERT INTO register VALUES ('$fullname', '$username', '$email','$phone_no','$gender','$hash',NULL,NULL,'$u_add')";
           $data= mysqli_query($conn, $query);
  
             if($data)
             {
              header("location: login.php");
             }
          }
       else
      {
       $main_err="Something is missing .All things are necessary";
      }
    }
}

?>

<html>
  <head>
    <title>Registration Form</title>
    <link rel="stylesheet" href="css1/registration.css">
   </head>
<body>
            <ul>
                <li><a href="login.php">Back</a></li>
            </ul>
  <div class="container">
    <div class="title">Registration</div>
    <div class="content">
      <!-- form  -->
      <form action="" method="post">
        <div class="user-details">
          <div class="input-box">
            <span class="details">Full Name</span>
            <input type="text" placeholder="Enter your name" name="fullname">
            <span>
              <?php 
              if(isset($fullname_err)) 
                echo "<font size=1 color =red >$fullname_err </font>"; 
              ?>
            </span>
          </div>
          <div class="input-box">
            <span class="details">Username</span>
            <input type="text" placeholder="Enter your username" name="username" >
            <span>
              <?php if(isset($username_err)) 
              echo "<font size=1 color =red >$username_err </font>"; 
              ?>
              </span>
            <span>
              <?php if(isset($username_err1)) 
              echo "<font size=1 color =red >$username_err1 </font>";
               ?></span>
          </div>
          <div class="input-box">
            <span class="details">Email</span>
            <input type="text" placeholder="Enter your email" name="email">
            <span><?php if(isset($email_err)) echo "<font size=1 color =red >$email_err</font>"; ?></span>
          </div>
          
          <div class="input-box">
            <span class="details">Phone Number</span>
            <input type="text" placeholder="Enter your number" name="phone_no">
            <span><?php  if(isset($phone_err)) echo "<font size=1 color =red >$phone_err</font>";  ?></span>
            <span><?php  if(isset($phone_err1)) echo "<font size=1 color =red >$phone_err1</font>";  ?></span>
          </div>
          <div class="input-box">
            <span class="details">Password</span>
            <input type="password" placeholder="Enter your password" name="pass" >
            <span><?php  if(isset($pass_err)) echo "<font size=1 color =red >$pass_err</font>";  ?></span>
          </div>
          <div class="input-box">
            <span class="password">Confirm Password</span>
            <input type="password" placeholder="Confirm your password" name="cpass" >
            <span><?php  if(isset($pass_err1)) echo "<font size=1 color =red >$pass_err1</font>";  ?></span>
          </div>
          <div class="input-box">
            <span class="details">Address</span>
            <input type="text" placeholder="Enter your Address" name="add">
            <span><?php if(isset($add_err)) echo "<font size=1 color =red >$add_err</font>"; ?></span>
          </div>
        </div>
        <div class="gender-details">
          <input type="radio" name="gender" value="Male" id="dot-1">
          <input type="radio" name="gender" value="Female" id="dot-2">
          <input type="radio" name="gender" value="Other" id="dot-3">
          <span class="gender-title">Gender</span>
          <div class="category">
            <label for="dot-1">
            <span class="dot one"></span>
            <span class="gender" value="Male">Male</span>
          </label>
          <label for="dot-2">
            <span class="dot two"></span>
            <span class="gender" value="Female">Female</span>
          </label>
          <label for="dot-3">
            <span class="dot three"></span>
            <span class="gender" value="Other">Prefer not to say</span>
            </label>
          </div>
        </div>
        <div class="button">
          <input type="submit" value="Register" name="submit">
          <span>
            <?php  
            if(isset($main_err)) 
              echo "<font size=4 color =red >$main_err</font>"; 
            ?>
          </span>
        </div>
      </form>
    </div>
  </div>
</body>
</html>