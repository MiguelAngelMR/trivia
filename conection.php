<?php 
header('Access-Control-Allow-Origin: *'); 
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept"); 
header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE');


$conn = new mysqli("localhost","root","","triviaambipargroup");
// Check connection
if (!$conn) {
      die("Connection failed: " . mysqli_connect_error());
}
return $conn;
// mysqli_close($conn);
