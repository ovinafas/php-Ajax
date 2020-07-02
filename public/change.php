<?php
session_start();
@include_once ("../config.php");

$kid = $_GET['kid'];

$qty = $_GET['qty'];

if(isset($_SESSION['sabad'][$kid]))
{
    $_SESSION['sabad'][$kid] = $qty;


}

header("location:sabad.php");



?>