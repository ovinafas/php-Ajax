<?php
session_start();
@include_once ("../config.php");

$kid = $_GET['kid'];

if(isset($_SESSION['sabad'][$kid]))
{
    unset($_SESSION['sabad'][$kid]);


}

header("location:sabad.php");



?>