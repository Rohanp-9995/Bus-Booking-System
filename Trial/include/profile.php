<?php
// Start the session
session_start();

//asigning values for $username and $userid
$username= " ". $_SESSION["user_name"] ." ";
$userid= " ". $_SESSION["user_id"] ." ";

?>
<html>
<head>
    <title>Display Records</title>
</head>
<body>
    <table border="2">
        <tr><b>
     
            <th>Full-name</th>
            <th>user-name</th>
            <th>Email-id</th>
            <th>Phone</th>
            <th>gender</th>
            <th>created</th>
            <th>r_id</th>

        </tr></b>
<?php 

    include('connect.php');


    $sql="SELECT * FROM booking where r_id ='$userid'";
    $result=mysqli_query($conn,$sql);
    $num=mysqli_num_rows($result);
    if($num!=0)
        {
            while($row=mysqli_fetch_assoc($result))
            {
                echo"
                <tr>
                    <td> ".$row['truck_details']." </td>
                    <td> ".$row['product']." </td>
                    <td> ".$row['weight']." </td>
                    <td> ".$row['distance']." </td>
                    <td> ".$row['pick_up_point']." </td>
                    <td> ".$row['destination']." </td>
                 ";   
            }
        }    
?>

</table>
</body>
</html>
