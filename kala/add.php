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
   // $sql="UPDATE tbl_kala SET kname='$kname' ,cid= '$cid' ,bid =$bid ,price ='$price' WHERE kid=$kid  ";
    $sql = "INSERT INTO tbl_kala (kname,cid,bid,price,dscr) values ('$kname','$cid','$bid','$price','$dscr')";
    $res=mysqli_query($conn , $sql );
    if($res)
        echo "یک رکورد با موفقیت درح شد";
    else echo "error";

    header("location:list.php");
    exit;
}
?>

<form id="form1" name="form1" method="post" action="kala/add.php"
      onSubmit="save(this); return false;">
    <table width="516" border="1">
        <tbody>
        <tr>
            <td width="98">کد کالا</td>
            <td width="402">
                <input readonly type="text" name="kid" id="kid" ></td>
        </tr>
        <tr>
            <td width="98">نام کالا</td>
            <td width="402">
                <input type="text" name="kname" id="kname" ></td>
        </tr>

        <tr>
            <td width="98"> دسته بندی</td>
            <td width="402">
              <!--  <input type="text" name="cid" id="cid" ></td>  -->
                <select  name="cid">
                    <option  value="0">---- </option>
            <?php
            $res = mysqli_query($conn , "SELECT * FROM  tbl_cat");
            while($row1 = mysqli_fetch_assoc($res)) {
            ?>
                <option    value="<?php  echo $row1['cid'] ?>">  <?php  echo $row1['cname'];  ?></option>
            <?php  } ?>
                </select>


        </tr>


        <tr>
            <td width="98">  برند </td>
            <td width="402">

                <select  name="bid">
                    <option value="0">----</option>
                    <?php
                         $res = mysqli_query($conn , "select * from tbl_brand");

                         while($row1 = mysqli_fetch_assoc($res)) {
                             ?>
                                <option    value="<?php  echo $row1['bid']  ?>"> <?php   echo $row1['bname']  ?></option>
                         <?php  } ?>
                </select>

        </tr>


        <tr>
            <td width="98"> قیمت</td>
            <td width="402">
                <input type="text" name="price" id="price" ></td>
        </tr>


        <tr>
            <td width="98"> شرح کالا</td>
            <td width="402">
                <textarea  name="dscr"  cols="50"  rows="10" ></textarea>
            </td>
        </tr>

        <tr>
            <td>&nbsp;</td>
            <td>
                <input type="submit" name="submit" id="submit" value="   درح شد">
            </td>
        </tr>
        </tbody>
    </table>
</form>