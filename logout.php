<?php
session_start();
require_once("connect.php");


if(session_destroy()==true){

    header("location:login.php");
}

?>