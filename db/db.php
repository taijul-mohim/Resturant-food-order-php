
<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$db="food_order";

// Create connection
$conn = new mysqli($servername, $username, $password,$db);

// Check connection
// if($conn==true){
//   echo "connect";
// }
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
 
?>




