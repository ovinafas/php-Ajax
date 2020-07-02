<?php    require ("../check.php");    ?>
<?php
include("../config.php");
if(isset($_POST['cname']))
{
    $cid   = $_POST['cid'];
    $cname = $_POST['cname'];
    $sql="UPDATE tbl_cat SET cname='$cname' WHERE cid=$cid  ";
    $res=mysqli_query($conn , $sql );
    if($res)
        echo "یک رکورد با موفقیت اصلاح شد";
    else echo "error";
    header("location:list.php");
    exit;
}
?>
<h2> ویرایش دسته </h2>
<hr>
<?php
$cid = $_GET['cid'];
$res=mysqli_query($conn , "select * from tbl_cat where cid=$cid");
$row=mysqli_fetch_assoc($res);

?>

<form id="form1" name="form1" method="post" action="cat/edit.php"
      onSubmit="save(this); return false;">
    <table width="516" border="1">
        <tbody>
        <tr>
            <td width="98">کد دسته</td>
            <td width="402">
                <input readonly type="text" name="cid" id="cid" value="<?php echo $row['cid'] ?>"></td>
        </tr>
        <tr>
            <td width="98">نام دسته</td>
            <td width="402">
                <input type="text" name="cname" id="cname" value="<?php echo $row['cname'] ?>"></td>
        </tr>
        <tr>
            <td>&nbsp;</td>
            <td>
                <input type="submit" name="submit" id="submit" value="  ثبت تغییرات"></td>
        </tr>
        </tbody>
    </table>
</form>