<?php 
/*-------------------------------------
# Database connection
--------------------------------------*/
$conn= new mysqli('localhost','root','','food_shala')or die("Could not connect to mysql".mysqli_error($con));

// $conn= new mysqli('localhost','id16860329_root','Pass@123456789','id16860329_food_shala')or die("Could not connect to mysql".mysqli_error($con));

// $server = "localhost";
// $user = "id16860329_root";
// $password = "Pass@123456789";
// $database = "id16860329_food_shala";
// $conn = mysqli_connect("$server","$user","$password") or die('Could not connect: ' . mysqli_error());
// mysqli_select_db($conn,"$database") or die('Query failed: ' . mysqli_error());
?>
