<?php    require ("../check.php");    ?>
<?php
include("../config.php");
if(isset($_POST['bname']))
{
    $bid   = $_POST['bid'];
    $bname = $_POST['bname'];
    $country = $_POST['country'];
    $sql="UPDATE tbl_brand SET bname='$bname',country ='$country' WHERE bid=$bid  ";
   // $sql="UPDATE tbl_brand SET bname='$bname',country='$country' WHERE bid=$bid  ";
    $res=mysqli_query($conn , $sql );
    if($res)
        echo "1 record updated";
    else echo "error";
    header("location:list.php");
    exit;
}

?>
<h2> ویرایش برند </h2>
<hr>
<?php
$bid = $_GET['bid'];
$res=mysqli_query($conn , "select * from tbl_brand where bid=$bid");
$row=mysqli_fetch_assoc($res);

?>


<form id="form1" name="form1" method="post" action="brand/edit.php"
      onSubmit="save(this); return false;">
    <table width="516" border="1">
        <tbody>
        <tr>
            <td width="98">کد دسته</td>
            <td width="402">
                <input readonly type="text" name="bid" id="bid" value="<?php echo $row['bid'] ?>"></td>
        </tr>
        <tr>
            <td width="98">نام دسته</td>
            <td width="402">
                <input type="text" name="bname" id="bname" value="<?php echo $row['bname'] ?>"></td>
        </tr>


        <tr>
            <td width=55> نام کشور </td>
            <td width="400"> <input  type="text"  name="country" id="country"  value="<?php echo $row['country'] ?>" ></td>
        </tr>
        <tr>
            <td>&nbsp;</td>
            <td>
                <input type="submit" name="submit" id="submit" value="  ثبت تغییرات"></td>
        </tr>
        </tbody>
    </table>
</form>

