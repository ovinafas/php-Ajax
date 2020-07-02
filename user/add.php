<?php    require ("../check.php");    ?>
<?php
include("../config.php");
if(isset($_POST['uname']))
{
    $uname = $_POST['uname'];
    $name   = $_POST['name'];
   $upass = $_POST['upass'];
    $upass2 = $_POST['upass2'];
    $email =   $_POST['email'];

     if($upass == $upass2)
     {
         $sql =" INSERT INTO tbl_user (uname,upass,name,email) VALUES('$uname',$upass,'$name','$email') ";
         $res = mysqli_query($conn , $sql);

             if($res)
                 echo " یک رکورد با موفقیت انجام شد ";
             else  echo "error";
     }else  echo "کلمه عبور و تکرار ان مساوی نیست  ";


    header("location:list.php");
        exit();
}
?>
<h2>افزودن کاربر </h2>
<hr>
<form id="form1" name="form1" method="post" action="user/add.php"
      onSubmit="save(this); return false;">
    <table width="516" border="1">
        <tbody>
        <tr>
            <td width="98">نام کاربر</td>
            <td width="402">
                <input  type="text" name="name" id="name" ></td>
        </tr>


        <tr>
            <td width="98">نام کاربری</td>
            <td width="402">
                <input  type="text" name="uname" id="uname" ></td>
        </tr>

        <tr>
            <td width="98"> کلمه عبور </td>
            <td width="402">
                <input  type="password" name="upass" id="upass" ></td>
        </tr>

        <tr>
            <td width="98">  تکرار کلمه عبور </td>
            <td width="402">
                <input  type="password" name="upass2" id="upass2" ></td>
        </tr>

        <tr>
            <td width="98"> پست الکترونیکی </td>
            <td width="402">
                <input  type="text" name="email" id="email" ></td>
        </tr>

        <tr>
            <td>&nbsp;</td>
            <td>
                <input type="submit" name="submit" id="submit" value="   درح کاربر"></td>
        </tr>
        </tbody>
    </table>
</form>