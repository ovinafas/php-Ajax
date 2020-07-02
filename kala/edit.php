<?php    require ("../check.php");    ?>
<?php
include("../config.php");
if(isset($_POST['kname']))
{
    $kid   = $_POST['kid'];
    $kname = $_POST['kname'];
    $cid   = $_POST['cid'];
    $bid =   $_POST['bid'];
    $price = $_POST['price'];
    $dscr = $_POST['dscr'];
    $sql="UPDATE tbl_kala SET kname='$kname' ,cid= '$cid' ,bid =$bid ,price ='$price' , dscr ='$dscr' WHERE kid=$kid  ";
    $res=mysqli_query($conn , $sql );
    if($res)
        echo "یک رکورد با موفقیت اصلاح شد";
    else echo "error";

    header("location:list.php");
    exit;
}
?>
<h2> ویرایش کالا </h2>
<hr>
<?php
$kid = $_GET['kid'];
$res=mysqli_query($conn , "select * from tbl_kala where kid=$kid");
$row=mysqli_fetch_assoc($res);

?>

<form id="form1" name="form1" method="post" action="kala/edit.php"
      onSubmit="save(this); return false;">
    <table width="516" border="1">
        <tbody>
        <tr>
            <td width="98">کد کالا</td>
            <td width="402">
                <input readonly type="text" name="kid" id="kid" value="<?php echo $row['kid'] ?>"></td>
        </tr>
        <tr>
            <td width="98">نام کالا</td>
            <td width="402">
                <input type="text" name="kname" id="kname" value="<?php echo $row['kname'] ?>"></td>
        </tr>

        <tr>
            <td width="98"> دسته بندی</td>
            <td width="402">
               <!-- <input type="text" name="cid" id="cid" value="<?php echo $row['cid'] ?>">  -->
                <select name="cid">

                   <option  value="0">-----</option>

                    <?php
                        $res = mysqli_query($conn , "select * from tbl_cat");

                        while($row1 = mysqli_fetch_assoc($res)) {

                   ?>

                    <option     <?php   if($row['cid'] == $row1['cid'])  echo "selected" ; ?>  value="<?php  echo $row1['cid'];  ?>">  <?php    echo $row1['cname']   ?> </option>

                    <?php } ?>

                </select>


               </td>
        </tr>

        <tr>
            <td width="98"> برند</td>
            <td width="402">
                <select name="bid">

                    <option  value="0">-----</option>

                    <?php
                    $res = mysqli_query($conn , "select * from tbl_brand");

                    while($row1 = mysqli_fetch_assoc($res)) {

                        ?>

                        <option      <?php   if($row['bid'] == $row1['bid'])  echo "selected" ; ?>  value="<?php  echo $row1['bid'];  ?>">  <?php    echo $row1['bname']   ?> </option>

                    <?php } ?>

                </select>


            </td>
        </tr>

        <tr>
            <td width="98"> قیمت</td>
            <td width="402">
                <input type="text" name="price" id="price" value="<?php echo $row['price'] ?>"></td>
        </tr>

        <tr>
            <td width="98"> شرح کالا</td>
            <td width="402">
                <textarea  name="dscr"  cols="50"  rows="10"  value="<?php echo $row['dscr'] ?>"></textarea>
            </td>
        </tr>

        <tr>
            <td>&nbsp;</td>
            <td>
                <input type="submit" name="submit" id="submit" value="  ثبت تغییرات"></td>
        </tr>
        </tbody>
    </table>
</form>