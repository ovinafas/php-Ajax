<?php
  require ("../config.php");
    if(isset($_POST['uname']))
    {
         $uname = $_POST['uname'];
         $upass = $_POST['upass'];

         $res = mysqli_query($conn , "SELECT * FROM  tbl_user WHERE  `uname` = '$uname '  and  upass = $upass ");

         $row = mysqli_fetch_assoc($res);

         if($row)
         {
             session_start();
             $_SESSION['uname'] = $uname;
             $_SESSION['uid'] = $row['uid'];
             $_SESSION['name']=$row['name'];

             header("location:../admin.php");


         }
         else   echo  " نام کاربری یا کلمه عبور نامعتبر هست   ";



    }



?>


<h2>   ورود اعضا </h2>
<hr>
<form   method="post" name="form1"  id="form1"  action="user/login.php"   >
    <tbody>
    <table>
        <tbody>

           <tr>

               <td  width="119">  نام کاربری   </td>
               <td  width="287">
               <input  type="text"   name="uname"   id="uname"  >
               </td>


           </tr>


           <tr>

               <td> کلمه عبور   </td>
               <td>
                  <input   type="password"  name="upass"  id="upass"  >
               </td>


           </tr>


           <tr>

               <td> &nbsp; </td>
               <td> <button  type="submit"   name="login"   value="ورود به سیستم"  id="button">  ورود به سیستم </button>   </td>


           </tr>





    </tbody>
    </table>
    </form>



