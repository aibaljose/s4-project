<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "eventbook_db";
$conn = mysqli_connect($servername, $username, $password,$database);
if (!$conn) {
    $sucess =false;
    die("Connection failed: " . mysqli_connect_error());
    
}
else{
    $sucess =true;
}

