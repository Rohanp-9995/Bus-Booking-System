
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Table Design</title>

  <link rel="stylesheet" href="css1/edinfo.css">
</head>
<body>
   <div class="main">
      <ul>
        <li><a href="admain.php">Back</a></li>
      </ul>
  </div>
  <div class="table">
    <table>
      <thead>
        <tr>
          <th>Bus Details</th>
          <th>Booking Id</th>
          <th>Register Id</th>
          <th>F_name</th>
          <th>Date</th>
          <th>seat no</th>
          <th>hseat</th>
          <th>sfrom</th>
          <th>dto</th>
          <th>Action</th>
      </thead>

      <tbody>
<?php 

  include('include/connect.php');

if($_POST['submit'])
{
  $des= $_POST['destination'];

    $sql="SELECT * FROM booking where dto='$des' ";
    $result=mysqli_query($conn,$sql);
    $num=mysqli_num_rows($result);
    if($num!=0)
        {
          while($row=mysqli_fetch_assoc($result))
          {
              $booking_id=" ".$row['b_id']." ";
            echo"
            <tr>
              <td> ".$row['bus_details']." </td>
              <td> ".$row['b_id']." </td>
              <td> ".$row['r_id']." </td>
                <td> ".$row['f_name']." </td>
                <td> ".$row['date']." </td>
                <td> ".$row['seat_no']." </td>
                  <td> ".$row['hseat']." </td>
                  <td> ".$row['sfrom']." </td>
                  <td> ".$row['dto']." </td>
                  <td><span class=action_btn><a href='access2.php?bid=$booking_id'>Show Receipt<span></a></td>
                </tr>
                 ";  

          }
        }  
}  
?>
          

      </tbody>
    </table>
  </div>
</body>
</html>