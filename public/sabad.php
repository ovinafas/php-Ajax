<?php   session_start();  ?>
<h2>      سبد خرید   </h2>
<hr>

    <table width="100%"  border="0">
         <tbody>
                 <tr>
                        <th width="122">کد کالا</th>
                        <th width="302">نام کالا</th>
                        <th width="122">  دسته بندی</th>
                        <th width="122"> برند</th>
                        <th width="122">  قیمت واحد </th>
                         <th width="122"> تعداد </th>
                        <th width="122">  قیمت کل </th>
                        <th width="54">&nbsp;</th>

                 </tr>
             <?php
                    @include_once("config.php");
                    @include_once("../config.php");

                    $cats = getList("tbl_cat" , "cid" , "cname");
                    $brands = getList("tbl_brand","bid","bname");

                     $temp = array_keys($_SESSION['sabad']);
                     $kids = implode(",",$temp);

                     $sql = " SELECT * FROM tbl_kala WHERE kid  in  ($kids)";
                     $res = mysqli_query($conn , $sql);

                    $total =0;
                    while($row = mysqli_fetch_assoc($res)) {

                    $sum =  $_SESSION['sabad'][$row['kid']] * $row['price'];
                    $total += $sum;
            ?>
                 <tr>
                       <td><?php echo $row['kid'];  ?></td>
                        <td><?php echo $row['kname']; ?></td>

                     <td> <?php  if(isset( $cats[$row['cid']]))

                         echo  $cats[$row['cid']];
                       else echo " نامشخص ";
                         ?></td>

                     <td> <?php  if(isset( $brands[$row['bid']]))

                             echo  $brands[$row['bid']];
                         else echo " نامشخص ";
                         ?></td>


                       <td><?php echo $row['price']; ?></td>

                     <td>

                        <input   size="5" type="number"  value="<?php echo $_SESSION['sabad'][$row['kid']] ; ?>"
                                  name="qty"   onchange="show('public/change.php?kid=<?php  echo $row['kid']; ?>&qty='+this.value);" >






                     </td>

                     <td>
                            <?php   echo $sum;   ?>

                     </td>

                        <td>
                            <a href=""  onclick="show('public/canc2.php?kid=<?php  echo $row['kid']; ?>'); return false;"  > حذف</a>
                         </td>
                 </tr>


                    <?php } ?>

         <tr>

             <td colspan="6"  align="left" >      جمع کل فاکتور   </td>

             <td>   <?php   echo $total;  ?>   </td>
             <td>    ریال  </td>



         </tr>



         </tbody>

    </table>




<h2>    مشخصات خریدار </h2>

<form  name="form1"   id="form1"  method="post"  action="public/add.php"
     onsubmit="save(this);  return false;"  >

    <table  width="100%"  border="0">
        <tbody>



        <tr>
            <td width=98> نام خریدار </td>
            <td width="402"> <input   type="text"  name="kname" id="kname"  ></td>
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
            <td> &nbsp;</td>
            <td><input   type="submit"  name="submit"  id="submit"  value=" قطعی کردن خرید "></td>
        </tr>
        </tbody>

    </table>

</form>

