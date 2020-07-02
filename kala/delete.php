<?php    require ("../check.php");    ?>
<?php
include("../config.php");

    $kid   = $_GET['kid'];

    $sql = "DELETE FROM tbl_kala WHERE kid =$kid ";
    $res=mysqli_query($conn , $sql );
    if($res)
        echo "1 record deleted";
    else echo "error";

     header("location:list.php");
    exit;

?>
