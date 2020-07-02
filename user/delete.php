<?php    require ("../check.php");    ?>
<?php
include("../config.php");

    $uid = $_GET['uid'];

    $sql = "DELETE FROM tbl_user WHERE uid =$uid ";
    $res=mysqli_query($conn , $sql );
    if($res)
        echo "1 record deleted";
    else echo "error";

     header("location:list.php");
    exit;

?>
