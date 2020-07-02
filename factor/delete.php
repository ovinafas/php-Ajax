<?php    require ("../check.php");    ?>
<?php
include("../config.php");

    $fid   = $_GET['fid'];

    $sql = "DELETE FROM tbl_factor WHERE fid =$fid ";
    $res=mysqli_query($conn , $sql );
    if($res)
        echo "1 record deleted";
    else echo "error";
    include("list.php");
    exit;

?>
