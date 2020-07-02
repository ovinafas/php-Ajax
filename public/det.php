<?php
include("../config.php");

?>
<h2> جزئیات کالا </h2>
<hr>
<?php
$kid = $_GET['kid'];
$res=mysqli_query($conn , "select * from tbl_kala where kid=$kid");
$row=mysqli_fetch_assoc($res);

$cats = getList("tbl_cat","cid","cname");
$brands = getList("tbl_brand","bid","bname");

?>


    <table width="100%" border="0s">
        <tbody>
        <tr>
            <td width="98">کد کالا</td>
            <td width="402">
               <?php echo $row['kid'] ?>
            </td>
        </tr>
        <tr>
            <td width="98">نام کالا</td>
            <td width="402">
               <?php echo $row['kname'] ?>
            </td>
        </tr>

        <tr>
            <td width="98"> دسته بندی</td>
            <td width="402">
               <?php  echo  $cats[$row['cid']]  ?>

               </td>
        </tr>

        <tr>
            <td width="98"> برند</td>
            <td width="402">
               <?php   echo   $brands[$row['bid']];   ?>

            </td>
        </tr>

        <tr>
            <td width="98"> قیمت</td>
            <td width="402">

                <?php    echo  $row['price'];   ?>
            </td>
        </tr>

        <tr>
            <td width="98"> شرح کالا</td>
            <td width="402"  valign="top">
               <?php echo nl2br($row['dscr']); ?>
            </td>
        </tr>


        </tbody>
    </table>
</form>