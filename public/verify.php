<?php
include("../config.php");
?>
<h2>   تائید ثبت سفارش  </h2>
<hr>
<?php

$fid = $_GET['fid'];
$res = mysqli_query($conn , "select * from tbl_factor   WHERE fid =$fid");
$row = mysqli_fetch_assoc($res);

?>
<h3>  مشخصات خریدار </h3>
<table  width="90%"  border="0">
    <tbody>

    <tr>
        <th    width="98">  کد سفارش </th>
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


    </tbody>

</table>


<h2> اقلام سفارش </h2>

    <table border="0" width="100%">
        <tbody>
        <tr>
            <th>کد کالا</th>
            <th>نام کالا</th>
            <th>قیمت واحد</th>
            <th>تعداد</th>
            <th>قیمت کل</th>

               <?php

           $res=mysqli_query($conn ,
            "select I.*,K.kname 
						from tbl_item as I,tbl_kala as K
						where I.fid=$fid and I.kid=K.kid");

           $total=0;
        while($row=mysqli_fetch_assoc($res)){
                 $sum = $row['uprice'] * $row['qty'];
                 $total += $sum;

            ?>

                <tr>
                    <td><?php echo $row['kid']; ?></td>
                    <td><?php echo $row['kname']; ?></td>
                    <td><?php echo $row['uprice']; ?></td>
                    <td><?php echo $row['qty']; ?></td>
                    <td><?php echo $row['uprice']*$row['qty']; ?></td>

                </tr>
            <?php }  ?>

        <tr>
            <td  colspan="4"  align="left">  جمع کل قابل پرداخت </td>
            <td  > <?php  echo $total;  ?> </td>

        </tr>


        </tbody>
    </table>
  <button>    پرداخت انلاین  </button>