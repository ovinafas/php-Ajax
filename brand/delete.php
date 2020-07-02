<?php    require ("../check.php");    ?>
<?php
include("../config.php");

    $bid   = $_GET['bid'];

    $sql = "DELETE FROM tbl_brand WHERE bid =$bid ";
    $res=mysqli_query($conn , $sql );
    if($res)
        echo "1 record deleted";
    else echo "error";
    header("location:list.php");
    exit;

?>
