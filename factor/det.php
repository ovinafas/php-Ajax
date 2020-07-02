<?php    require ("../check.php");    ?>
<?php
      include("../config.php");


        
?>


<h2>    جزئیات  فاکتور </h2>
<hr>
<?php

$fid = $_GET['fid'];
$res = mysqli_query($conn , "select * from tbl_factor   WHERE fid =$fid");
$row = mysqli_fetch_assoc($res);

?>

    <table  width="90%"  border="0">
       <tbody>

       <tr>
           <th    width="98">  کد فاکتور </th>
           <th width="402"> <?php  echo $row['fid']  ?></th>
       </tr>




       <tr>
            <td width=98> نام خریدار </td>
            <td width="402"> <?php  echo $row['kname']  ?></td>
       </tr>


       <tr>
           <td width=98> تاریخ </td>
           <td width="402"> <?php  echo $row['fdate']  ?></td>
       </tr>

       <tr>
           <td width=98> تلفن </td>
           <td width="402"> <?php  echo $row['phone']  ?></td>
       </tr>

       <tr>
           <td width=98> ادرس </td>
           <td width="402"> <?php  echo $row['addr']  ?></td>
       </tr>

       <tr>
           <td width=98> تاریخ پرداخت </td>
           <td width="402"> <?php  echo $row['pdate']  ?></td>
       </tr>


       <tr>
           <td width=98> شناسه ارجاع </td>
           <td width="402"> <?php  echo $row['ref_id']  ?></td>
       </tr>

       <tr>
           <td width=98> شناسه ارجاع خرید </td>
           <td width="402"> <?php  echo $row['sale_ref_id']  ?></td>
       </tr>

       <tr>
           <td width=98> مبلغ </td>
           <td width="402"> <?php  echo $row['amount']  ?></td>
       </tr>

       <tr>
           <td width=98> شماره کارت </td>
           <td width="402"> <?php  echo $row['card_no']  ?></td>
       </tr>

       <tr>
           <td width=98>وضعیت </td>
           <td width="402"> <?php  echo $row['status']  ?></td>
       </tr>

       <tr>
            <td  colspan="2"   id="items">
              <?php  include("items.php");  ?>

            </td>

       </tr>
       </tbody>

    </table>

