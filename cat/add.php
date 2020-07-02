<?php    require ("../check.php");    ?>
<?php
      include("../config.php");

      if(isset($_POST['cname']))
      {

        $cname = $_POST['cname'];

        $sql = " INSERT INTO  tbl_cat (cname) VALUES('$cname')";

        $res = mysqli_query($conn , $sql);

        if($res)
            echo "1 record added";

        else echo "error";

          header("location:list.php");
        exit;

      }
        
?>


<form  name="form1"   id="form1"  method="post"  action="cat/add.php"
       onsubmit="save(this);  return false;">
   <h2>     افزودن دسته </h2>
    <table  width="455"  border="1">
       <tbody>
            
       <tr>
            <td width=55> نام دسته </td>
            <td width="400"> <input  type="text"  name="cname" id="cname"  ></td>
       </tr>

       <tr>
            <td> &nbsp;</td>
            <td><input   type="submit"  name="submit"  id="submit"  value="ثبت تغیرات"></td>
       </tr>
       </tbody>

    </table>

</form>