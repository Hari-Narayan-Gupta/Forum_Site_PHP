<?php
//Script to connect to the database 
$server = "localhost";
$username = "root";
$password = "";
$database = "idiscuss";

$conn = mysqli_connect($server, $username, $password, $database);
// if($conn){
//     echo "Connection successful....";
// }
// else{
//     die mysqli_connect_error($conn);
// }
?>