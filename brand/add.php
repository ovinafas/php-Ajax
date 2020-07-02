<?php    require ("../check.php");    ?>
<?php
      include('../config.php');

      if(isset($_POST['bname']))
      {

        $bname = $_POST['bname'];
        $country = $_POST['country'];

        $sql = " INSERT INTO  tbl_brand (bname,country) VALUES('$bname','$country')";

        $res = mysqli_query($conn , $sql);

        if($res)
            echo "1 record added";

        else echo "error";

          header("location:list.php");
        exit;

      }
        
?>



<form  name="form1"   id="form1"  method="post"  action="brand/add.php"
       onsubmit="save(this);  return false;">
   <h2>     افزودن برند </h2>
    <table  width="455"  border="1">
       <tbody>
            
       <tr>
            <td width=55> نام برند </td>
            <td width="400"> <input  type="text"  name="bname" id="bname"  ></td>
       </tr>

       <tr>
           <td width=55> نام کشور </td>
           <td width="400"> <input  type="text"  name="country" id="country"  ></td>
       </tr>

       <tr>
            <td> &nbsp;</td>
            <td><input   type="submit"  name="submit"  id="submit"  value="ثبت تغیرات"></td>
       </tr>
       </tbody>

    </table>

</form>



