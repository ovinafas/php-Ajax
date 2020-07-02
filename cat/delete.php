<?php    require ("../check.php");    ?>
<?php
include("../config.php");

    $cid   = $_GET['cid'];

    $sql = "DELETE FROM tbl_cat WHERE cid =$cid ";
    $res=mysqli_query($conn , $sql );
    if($res)
        echo "1 record deleted";
    else echo "error";
     header("location:list.php");
    exit;

?>
