<?php    require ("../check.php");    ?>
<?php
include("../config.php");
if(isset($_POST['upass'])) {

        $uid = $_POST['uid'];
        $upass = $_POST['upass'];
        $upass2 = $_POST['upass2'];

        if($upass == $upass2) {
            $sql = " UPDATE tbl_user SET  upass = '$upass'  WHERE `uid` = $uid ";
            $res = mysqli_query($conn, $sql);
            if ($res)
                echo " یک رکورد با موفقیت اصلاح شد ";
            else  echo "error";

            header("location:list.php");
            exit();

        }else  echo " کلمه عبور و تکرار ان یکسان نیست ";
    }
?>
<h2>ویرایش کلمه عبور </h2>
<hr>

<?php
$uid = $_GET['uid'];
$res=mysqli_query($conn , "select * from tbl_user where uid=$uid");
$row=mysqli_fetch_assoc($res);

?>
<form id="form1" name="form1" method="post" action="user/pass.php"
      onSubmit="save(this); return false;">
    <input  type="hiddenس" name="uid" id="uid"  value="<?php  echo $row['uid']; ?>" >

    <table width="516" border="0">
        <tbody>


        <tr>
            <td width="98">نام کاربر</td>
            <td width="402">
            <?php   echo $row['name']   ?>
            </td>
        </tr>


        <tr>
            <td width="98">نام کاربری</td>
            <td width="402">
                <?php   echo $row['uname']   ?>   </td>
        </tr>



        <tr>
            <td width="98"> کلمه عبور جدید  </td>
            <td width="402">
                <input  type="password" name="upass" id="upass"  ></td>
        </tr>

        <tr>
            <td width="98">  تکرار کلمه عبور جدید  </td>
            <td width="402">
                <input  type="password" name="upass2" id="upass2"  ></td>
        </tr>

        <tr>
            <td>&nbsp;&nbsp;</td>
            <td>
                <input type="submit" name="submit" id="submit" value="  ثبت تغیرات"></td>
        </tr>
        </tbody>
    </table>
</form>