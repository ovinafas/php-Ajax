<?php    require ("../check.php");    ?>
<?php
      include("../config.php");

      if(isset($_POST['kname']))
      {
          $fid = $_POST['fid'];
          $kname = $_POST['kname'];
          $fdate = $_POST['fdate'];
          $phone = $_POST['phone'];
          $addr = $_POST['addr'];
          $pdate = $_POST['pdate'];
          $ref_id = $_POST['ref_id'];
          $sale_ref_id = $_POST['sale_ref_id'];
          $amount = $_POST['amount'];
          $card_no = $_POST['card_no'];
          $status = $_POST['status'];



          $sql="UPDATE tbl_factor  SET kname='$kname',
	               fdate='$fdate',
	                phone='$phone',addr='$addr'
	               ,pdate='$pdate',ref_id='$ref_id',sale_ref_id='$sale_ref_id',
	                amount='$amount',card_no='$card_no',status='$status' WHERE fid='$fid' ";
          $res=mysqli_query($conn , $sql );
          if($res)
              echo "یک رکورد با موفقیت ویرایش شد";
          else echo "error";
          include("list.php");
          exit;

      }
        
?>
<h2>     ویرایش  فاکتور </h2>
<?php

$fid = $_GET['fid'];
$res = mysqli_query($conn , "select * from tbl_factor   WHERE fid =$fid");
$row = mysqli_fetch_assoc($res);

?>





<form  name="form1"   id="form1"  method="post"  action="factor/edit.php"
       onsubmit="save(this);  return false;">



    <table  width="516"  border="1">
       <tbody>

       <tr>
           <td width=98> کد فاکتور </td>
           <td width="402"> <input readonly  value="<?php  echo $row['fid']  ?>" type="text"  name="fid" id="fid"  ></td>
       </tr>




       <tr>
            <td width=98> نام خریدار </td>
            <td width="402"> <input   value="<?php  echo $row['kname']  ?>"    type="text"  name="kname" id="kname"  ></td>
       </tr>


       <tr>
           <td width=98> تاریخ </td>
           <td width="402"> <input    value="<?php  echo $row['fdate']  ?>"  type="text"  name="fdate" id="fdate"  ></td>
       </tr>

       <tr>
           <td width=98> تلفن </td>
           <td width="402"> <input   value="<?php  echo $row['phone']  ?>" type="text"  name="phone" id="phone"  ></td>
       </tr>

       <tr>
           <td width=98> ادرس </td>
           <td width="402"> <input    value="<?php  echo $row['addr']  ?>"  type="text"  name="addr" id="addr"  ></td>
       </tr>

       <tr>
           <td width=98> تاریخ پرداخت </td>
           <td width="402"> <input    value="<?php  echo $row['pdate']  ?>" type="text"  name="pdate" id="pdate"  ></td>
       </tr>


       <tr>
           <td width=98> شناسه ارجاع </td>
           <td width="402"> <input   value="<?php  echo $row['ref_id']  ?>" type="text"  name="ref_id" id="ref_id"  ></td>
       </tr>

       <tr>
           <td width=98> شناسه ارجاع خرید </td>
           <td width="402"> <input    value="<?php  echo $row['sale_ref_id']  ?>"  type="text"  name="sale_ref_id" id="sale_ref_id"  ></td>
       </tr>

       <tr>
           <td width=98> مبلغ </td>
           <td width="402"> <input   value="<?php  echo $row['amount']  ?>"  type="text"  name="amount" id="amount"  ></td>
       </tr>

       <tr>
           <td width=98> شماره کارت </td>
           <td width="402"> <input   value="<?php  echo $row['card_no']  ?>"   type="text"  name="card_no" id="card_no"  ></td>
       </tr>

       <tr>
           <td width=98>وضعیت </td>
           <td width="402"> <input     value="<?php  echo $row['status']  ?>"   type="text"  name="status" id="status"  ></td>
       </tr>

       <tr>
            <td> &nbsp;</td>
            <td><input   type="submit"  name="submit"  id="submit"  value="ثبت تغیرات"></td>
       </tr>
       </tbody>

    </table>

</form>