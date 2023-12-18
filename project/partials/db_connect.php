<?php
$server="localhost";
$username="root";
$password="";
$db = "nike";
$conn = mysqli_connect($server, $username, $password, $db);
if (!$conn){
//     echo "success";
// }
// else{
    die("Error". mysqli_connect_error());
}
?>