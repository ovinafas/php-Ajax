<?php    require ("../check.php");    ?>
<?php
include("../config.php");
if(isset($_POST['uname'])) {

        $uid = $_POST['uid'];
        $uname = $_POST['uname'];
        $name = $_POST['name'];
        $email = $_POST['email'];


        $sql = " UPDATE tbl_user SET  uname = '$uname' ,name = '$name' , email = '$email'  WHERE `uid` = $uid ";

        $res = mysqli_query($conn, $sql);


        if ($res)
            echo " یک رکورد با موفقیت اصلاح شد ";
        else  echo "error";



   // header("location:list.php");
     //  exit();
    }
?>
<h2>ویرایش مشخصات </h2>
<hr>

<?php
$uid = $_SESSION['uid'];
$res=mysqli_query($conn , "select * from tbl_user where uid=$uid");
$row=mysqli_fetch_assoc($res);

?>
<form id="form1" name="form1" method="post" action="user/editm.php"
      onSubmit="save(this); return false;">
    <table width="516" border="1">
        <tbody>

        <tr>
            <td width="98">شناسه کاربر</td>
            <td width="402">
                <input readonly type="text" name="uid" id="uid"  value="<?php  echo $row['uid']; ?>" ></td>
        </tr>

        <tr>
            <td width="98">نام کاربر</td>
            <td width="402">
                <input type="text" name="name" id="name"   value="<?php  echo $row['name']; ?>" ></td>
        </tr>


        <tr>
            <td width="98">نام کاربری</td>
            <td width="402">
                <input  readonly  type="text" name="uname" id="uname" value="<?php  echo $row['uname']; ?>"  ></td>
        </tr>



        <tr>
            <td width="98"> پست الکترونیکی </td>
            <td width="402">
                <input  type="text" name="email" id="email"  value="<?php  echo $row['email']; ?>" ></td>
        </tr>

        <tr>
            <td>&nbsp;&nbsp;</td>
            <td>
                <input type="submit" name="submit" id="submit" value="  ثبت تغیرات"></td>
        </tr>
        </tbody>
    </table>
</form>