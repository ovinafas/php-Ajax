<?php    require ("../check.php");    ?>
  <h2>   لیست دسته بندی ها  </h2>
  <hr>
  
  <a  href="" onClick="show('kala/add.php'); return false;" >
     افزودن کالا </a>
  <br><br>
    <table width="100%"  border="0">
         <tbody>
                 <tr>
                        <th width="122">کد کالا</th>
                        <th width="402">نام کالا</th>
                        <th width="122">  دسته بندی</th>
                        <th width="122"> برند</th>
                        <th width="122"> قیمت</th>
                        <th width="54">&nbsp;</th>

                 </tr>
             <?php
                    require("../config.php");
                    $res = mysqli_query($conn , "select * from tbl_kala");
                    while($row = mysqli_fetch_assoc($res)) {
            ?>
                 <tr>
                       <td><?php echo $row['kid'];  ?></td>
                        <td><?php echo $row['kname']; ?></td>
                       <td><?php echo $row['cid']; ?></td>
                       <td><?php echo $row['bid']; ?></td>
                       <td><?php echo $row['price']; ?></td>

                        <td>   
                                <a href=""  onclick="show('kala/edit.php?kid=<?php echo  $row['kid']; ?>'); return false;"  > ویرایش</a>
                                <a href=""  onclick="show('kala/delete.php?kid=<?php echo  $row['kid']; ?>'); return false;"> حذف </a>
                    
                         </td>
                 </tr>


                    <?php } ?>       



         </tbody>

    </table>


