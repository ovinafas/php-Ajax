<?php    require ("../check.php");    ?>
<?php
      include("../config.php");

      if(isset($_POST['kname']))
      {

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

        $sql = " INSERT INTO  tbl_factor (kname,fdate,phone,addr,pdate,ref_id,sale_ref_id,amount,card_no,status) VALUES('$kname','$fdate','$phone','$addr','$pdate','$ref_id','$sale_ref_id','$amount','$card_no','$status')";

        $res = mysqli_query($conn , $sql);

        if($res)
            echo "1 record added";

        else echo "error";

        include('list.php');
        exit;

      }
        
?>


<form  name="form1"   id="form1"  method="post"  action="factor/add.php"
       onsubmit="save(this);  return false;">
   <h2>     افزودن فاکتور </h2>



    <table  width="516"  border="1">
       <tbody>



       <tr>
            <td width=98> نام خریدار </td>
            <td width="402"> <input   type="text"  name="kname" id="kname"  ></td>
       </tr>


       <tr>
           <td width=98> تاریخ </td>
           <td width="402"> <input   type="text"  name="fdate" id="fdate"  ></td>
       </tr>

       <tr>
           <td width=98> تلفن </td>
           <td width="402"> <input    type="text"  name="phone" id="phone"  ></td>
       </tr>

       <tr>
           <td width=98> ادرس </td>
           <td width="402"> <input     type="text"  name="addr" id="addr"  ></td>
       </tr>

       <tr>
           <td width=98> تاریخ پرداخت </td>
           <td width="402"> <input       type="text"  name="pdate" id="pdate"  ></td>
       </tr>


       <tr>
           <td width=98> شناسه ارجاع </td>
           <td width="402"> <input      type="text"  name="ref_id" id="ref_id"  ></td>
       </tr>

       <tr>
           <td width=98> شناسه ارجاع خرید </td>
           <td width="402"> <input     type="text"  name="sale_ref_id" id="sale_ref_id"  ></td>
       </tr>

       <tr>
           <td width=98> مبلغ </td>
           <td width="402"> <input      type="text"  name="amount" id="amount"  ></td>
       </tr>

       <tr>
           <td width=98> شماره کارت </td>
           <td width="402"> <input     type="text"  name="card_no" id="card_no"  ></td>
       </tr>

       <tr>
           <td width=98>وضعیت </td>
           <td width="402"> <input     type="text"  name="status" id="status"  ></td>
       </tr>

       <tr>
            <td> &nbsp;</td>
            <td><input   type="submit"  name="submit"  id="submit"  value="درج فاکتور"></td>
       </tr>
       </tbody>

    </table>

</form>