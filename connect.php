<?php

$host="localhost";
$username="root";
$password="";
$dbname="employee";

$conn=new mysqli($host, $username, $password, $dbname);

if($conn->connect_error){
    die('Connection fail!' .$conn->connect_error);
}

?>