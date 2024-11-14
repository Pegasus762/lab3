<?php

$servername = "localhost";
$username = "root";
$password = ""; 
$database = "test_db";

//Create connection
//$conn = mysqli_connect($servername, $username, $password, $database);

$conn = new mysqli('localhost', 'root', '', 'test_db', 3307);  // Note the port 3307

//check connection
/*  if(!$conn){
    die("Connection failed: " . mysqli_connect_error());
}else{
    echo "Connected successfully"; 
}

?>  */