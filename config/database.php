<?php

//----Connect Database-----------

$servername="localhost";
$username="root";
$data_password="";
$database_name="crescdata";

//-----Create a Connection--------

$conn=mysqli_connect($servername, $username, $data_password,$database_name);

// Die if connection was not successfully

if(!$conn){
    die("Sorry we failed to connect: ".mysqli_connect_error());
}




?>