<?php
// connecting to the Database
$servername = "localhost";
$username = "root";
$password = "password";
$dbname = "shopping_cart";

// Create connection
$conn = mysqli_connect($servername,$username,$password,$dbname);

// Check connection
if(!$conn)
{
    // echo "Connected successfully";
    die ("connection failed : " .mysqli_connect_error($conn));
}

// else{
//     die ("connection failed : " .mysqli_connect_error($conn));
// }

?>