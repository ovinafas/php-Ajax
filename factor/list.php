<?php    require ("../check.php");    ?>
  <h2>   لیست فاکتورها </h2>
  <hr>
  
  <a  href="" onClick="show('factor/add.php'); return false;" >
     افزودن فاکتور </a>
  <br><br>
    <table width="100%"  border="0">
         <tbody>
                 <tr>
                        <th >کد فاکتور</th>
                        <th > تاریخ </th>
                        <th > نام خریدار</th>
                        <th > تلفن</th>
                        <th > ادرس</th>
                        <th > وضعیت</th>
                        <th >&nbsp;&nbsp;</th>

                 </tr>
             <?php
                    require("../config.php");
                    $res = mysqli_query($conn , "select * from tbl_factor");
                    while($row = mysqli_fetch_assoc($res)) {
            ?>
                 <tr>
                       <td><?php echo $row['fid'];  ?></td>
                        <td><?php echo $row['fdate']; ?></td>
                        <td><?php echo $row['kname']; ?></td>
                        <td><?php echo $row['phone']; ?></td>
                        <td><?php echo $row['addr']; ?></td>
                         <td><?php echo $row['status']; ?></td>
                        <td>
                                <a href=""  onclick="show('factor/det.php?fid=<?php echo  $row['fid']; ?>'); return false;"> جزئیات </a>
                                | <a href=""  onclick="show('factor/edit.php?fid=<?php echo  $row['fid']; ?>'); return false;"  > ویرایش</a>
                                | <a href=""  onclick="show('factor/delete.php?fid=<?php echo  $row['fid']; ?>'); return false;"> حذف </a>

                         </td>
                 </tr>


                    <?php } ?>       



         </tbody>

    </table>


